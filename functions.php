add_filter( 'woocommerce_cart_item_name', 'codeithub_cart_item_category', 9999, 3 );
 
function codeithub_cart_item_category( $name, $cart_item, $cart_item_key ) {
 
   $product = $cart_item['data'];
   if ( $product->is_type( 'variation' ) ) {
      $product = wc_get_product( $product->get_parent_id() );
   }
 
   $cat_ids = $product->get_category_ids();
 
   if ( $cat_ids ) $name .= '<br>' . wc_get_product_category_list( $product->get_id(), ', ', '<span class="posted_in">' . _n( 'Category:', 'Categories:', count( $cat_ids ), 'woocommerce' ) . ' ', '</span>' );
 
   return $name;
 
}
