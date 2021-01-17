<?php

// remove classes on fields
add_filter('woocommerce_form_field_country', 'clean_checkout_fields_class_attribute_values', 20, 4);
add_filter('woocommerce_form_field_state', 'clean_checkout_fields_class_attribute_values', 20, 4);
add_filter('woocommerce_form_field_textarea', 'clean_checkout_fields_class_attribute_values', 20, 4);
add_filter('woocommerce_form_field_checkbox', 'clean_checkout_fields_class_attribute_values', 20, 4);
add_filter('woocommerce_form_field_password', 'clean_checkout_fields_class_attribute_values', 20, 4);
add_filter('woocommerce_form_field_text', 'clean_checkout_fields_class_attribute_values', 20, 4);
add_filter('woocommerce_form_field_email', 'clean_checkout_fields_class_attribute_values', 20, 4);
add_filter('woocommerce_form_field_tel', 'clean_checkout_fields_class_attribute_values', 20, 4);
add_filter('woocommerce_form_field_number', 'clean_checkout_fields_class_attribute_values', 20, 4);
add_filter('woocommerce_form_field_select', 'clean_checkout_fields_class_attribute_values', 20, 4);
add_filter('woocommerce_form_field_radio', 'clean_checkout_fields_class_attribute_values', 20, 4);
function clean_checkout_fields_class_attribute_values( $field, $key, $args, $value ){
    if( is_checkout() ){
        // remove "form-row"
        $field = str_replace( array('<p class="form-row ', '<p class="form-row'), array('<p class="', '<p class="'), $field);
    }

    return $field;
}

// add our classes to fields
add_filter('woocommerce_checkout_fields', 'custom_checkout_fields_class_attribute_value', 20, 1);

function custom_checkout_fields_class_attribute_value( $fields ){
    foreach( $fields as $fields_group_key => $group_fields_values ){
        foreach( $group_fields_values as $field_key => $field ){
            // Remove other classes (or set yours)
            $fields[$fields_group_key][$field_key]['class'] = array('form-group'); 
        }
    }

    return $fields;
}

// remove company fields
add_filter( 'woocommerce_checkout_fields' , 'custom_override_checkout_fields' );

function custom_override_checkout_fields( $fields ) {
     unset($fields['billing']['billing_company']);
     unset($fields['shipping']['shipping_company']);
     return $fields;
}

// move email fields to top 
 add_filter( 'woocommerce_billing_fields', 'move_my_email_fields', 10, 1 );
function move_my_email_fields( $address_fields ) {
  $address_fields['billing_email']['priority'] = 9;
  
  return $address_fields;
}

// move coupon code field

remove_action( 'woocommerce_before_checkout_form', 'woocommerce_checkout_coupon_form', 10 );

add_action( 'woocommerce_after_checkout_form', 'woocommerce_checkout_coupon_form' );
 