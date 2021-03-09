<?php

add_filter( 'woocommerce_account_menu_items', 'custom_remove_downloads_my_account', 999 );
 
function custom_remove_downloads_my_account( $items ) {
unset($items['downloads']);
return $items;
}

add_filter ( 'woocommerce_account_menu_items', 'misha_one_more_link' );
function misha_one_more_link( $menu_links ){

    // we will hook "anyuniquetext123" later
    $new = array( 'instructions' => 'Instructions' );

    // or in case you need 2 links
    // $new = array( 'link1' => 'Link 1', 'link2' => 'Link 2' );

    // array_slice() is good when you want to add an element between the other ones
    $menu_links = array_slice( $menu_links, 0, 1, true ) 
    + $new 
    + array_slice( $menu_links, 1, NULL, true );


    return $menu_links;
}

add_filter( 'woocommerce_get_endpoint_url', 'misha_hook_endpoint', 10, 4 );
function misha_hook_endpoint( $url, $endpoint, $value, $permalink ){

    if( $endpoint === 'instructions' ) {

        // ok, here is the place for your custom URL, it could be external
        $url = site_url() . '/instructions';

    }
    return $url;

}