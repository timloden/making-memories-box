<?php
/**
 * Single Product Image
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/product-image.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.5.1
 */

defined( 'ABSPATH' ) || exit;

// Note: `wc_get_gallery_image_html` was added in WC 3.3.2 and did not exist prior. This check protects against theme overrides being used on older versions of WC.
if ( ! function_exists( 'wc_get_gallery_image_html' ) ) {
	return;
}

global $product;

$columns           = apply_filters( 'woocommerce_product_thumbnails_columns', 4 );
$post_thumbnail_id = $product->get_image_id();
$wrapper_classes   = apply_filters(
	'woocommerce_single_product_image_gallery_classes',
	array(
		'woocommerce-product-gallery',
		'woocommerce-product-gallery--' . ( $product->get_image_id() ? 'with-images' : 'without-images' ),
		'woocommerce-product-gallery--columns-' . absint( $columns ),
		'images',
	)
);
?>
<div class="<?php echo esc_attr( implode( ' ', array_map( 'sanitize_html_class', $wrapper_classes ) ) ); ?>"
    data-columns="<?php echo esc_attr( $columns ); ?>" style="opacity: 0; transition: opacity .25s ease-in-out;">
    <figure class="woocommerce-product-gallery__wrapper">
        <?php
		if ( $product->get_image_id() && !$product->get_gallery_image_ids() ) {
			$html = wc_get_gallery_image_html( $post_thumbnail_id, true );
		}
		elseif ($product->get_image_id() && $product->get_gallery_image_ids()) {
			
			// our main slider
			echo '<div class="product-gallery">';
			
			$gallery_images = $product->get_gallery_image_ids();
			//array_push($gallery_images, $product->get_image_id());

			foreach ( $gallery_images as $image ) {
				$image_url = wp_get_attachment_url($image, 'full');
				echo '<img class="img-fluid" src="' . $image_url . '"/>';
			}

			echo '</div>';

			// our thumbnails
			echo '<div class="product-gallery-thumbs d-flex flex-wrap justify-content-center">';
			foreach ( $gallery_images as $image ) {
				$image_thumb_url = wp_get_attachment_thumb_url($image);
				echo '<div><img width="100" class="img-fluid p-2" src="' . $image_thumb_url . '"/></div>';
			}
			echo '</div>';

		}
	 	else {
			$html  = '<div class="woocommerce-product-gallery__image--placeholder">';
			$html .= sprintf( '<img src="%s" alt="%s" class="wp-post-image" />', esc_url( wc_placeholder_img_src( 'woocommerce_single' ) ), esc_html__( 'Awaiting product image', 'woocommerce' ) );
			$html .= '</div>';
		}
		
		//do_action( 'woocommerce_product_thumbnails' );
		?>
    </figure>
</div>