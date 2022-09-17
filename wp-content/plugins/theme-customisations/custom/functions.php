<?php
/**
 * Functions.php
 *
 * @package  Theme_Customisations
 * @author   WooThemes
 * @since    1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * functions.php
 * Add PHP snippets here
 */
add_action('wp_enqueue_scripts', function() {
    wp_enqueue_style('style', get_stylesheet_uri(), array(), time() );
    wp_enqueue_script('script', get_template_directory_uri() . '/script.js', array(), null, true );
    wp_enqueue_script('jquery');
    wp_enqueue_media();
});

add_action('admin_enqueue_scripts', function() {
    wp_enqueue_script('admin-script', get_template_directory_uri() . '/script.js', array(), null, true );
    wp_enqueue_media();
    wp_enqueue_script('jquery');
});

add_theme_support( 'title-tag' );

add_action( 'add_meta_boxes', 'upload_media_meta_box' );

add_filter( 'get_post_thumbnail_id', 'test_custom_post_thumbnail' );

function upload_media_meta_box() {
    add_meta_box(
        'product-media-upload-metabox',
        'Add Info',
        'product_options_callback',
        'product',
        'normal',
        'high',
        array( '__back_compat_meta_box' => true )
    );
}

function test_add_custom_thumbnail_html($thumbnail_id = null, $post = null) {
    $upload_link = esc_url( get_upload_iframe_src( 'image', $post->ID ) );
    $your_img_id = get_post_meta( $post->ID, '_your_img_id', true );
    $your_img_src = wp_get_attachment_image_src( $your_img_id, 'full' );
    $you_have_img = is_array( $your_img_src );
    //var_dump($your_img_src);
    ?>

    <div class="custom-img-container">
        <?php if ( $you_have_img ) : ?>
            <img src="<?php echo $your_img_src[0] ?>" alt="" style="max-width:300px;">
        <?php endif; ?>
    </div>
    <p class="hide-if-no-js">
        <a class="upload-custom-img <?php if ( $you_have_img  ) { echo 'hidden'; } ?>" 
        href="<?php echo $upload_link ?>">
            <?php _e('Set custom image') ?>
        </a>
        <a class="delete-custom-img <?php if ( ! $you_have_img  ) { echo 'hidden'; } ?>" 
        href="#">
            <?php _e('Remove this image') ?>
        </a>
    </p>
    <input class="custom-img-id" name="custom-img-id" type="hidden" value="<?php echo esc_attr( $your_img_id ); ?>" />

    <?php
    if ($you_have_img) {
        function test_custom_post_thumbnail($your_img_id) {
            return $your_img_id;
        }
    }
    set_post_thumbnail($post->ID, $your_img_id );
}

function product_options_callback( $post ) {
    $thumbnail_id = get_post_meta( $post->ID, 'test_thumbnail_id', true );
    if ($thumbnail_id) {
        wp_get_attachment_image( $thumbnail_id );
    }
    echo test_add_custom_thumbnail_html($thumbnail_id, $post);
    
    woocommerce_form_field('test_created', array(
        'class' => 'test-created',
        'input_class' => ['short'],
        'type' => 'date',
        'label' => 'Product created',
    ), get_post_meta($post->ID, 'test_created', true));

    woocommerce_form_field('prod_type', array(
        'class' => 'form-field',
        'input_class' => ['short'],
        'type' => 'select',
        'options' => array('' => '', 'Rare' => 'Rare', 'Frequent' => 'Frequent', 'Unusual' => 'Unusual'),
        'label' => 'Product Type',
    ), get_post_meta($post->ID, 'prod_type', true));
    echo '<input type="reset" id="clear_all" value="Clear all" style="cursor:pointer">';
    echo '<input type="submit" name="publish" id="publish" class="my_submit" value="Submit">';
}

add_action('woocommerce_process_product_meta', 'test_custom_fields_save', 10 );

function test_custom_fields_save($post_id) {
    update_post_meta($post_id, 'prod_type', $_POST['prod_type']);
    update_post_meta($post_id, 'test_created', $_POST['test_created']);
    update_post_meta($post_id, '_your_img_id', $_POST['custom-img-id']);
}

add_action('init', 'register_myclass');
function register_myclass()
{
    class WC_ProductExtended extends WC_Product
    {
        function __construct() {
            parent::__construct();
            if (!array_key_exists("_your_img_id", $this->data)) {
                $this->data["_your_img_id"] = "";
            }
            if (!array_key_exists("test_created", $this->data)) {
                $this->data["test_created"] = "";
            }
            if (!array_key_exists("prod_type", $this->data)) {
                $this->data["_your_img_id"] = "";
            }
        }
        public function set_prod_img($_your_img_id)
        {
            $this->update_meta_data( '_your_img_id', $_your_img_id );
        }
        public function set_prod_type($prod_type)
        {
            $this->update_meta_data( 'prod_type', $prod_type );
        }
        public function set_created($test_created)
        {
            $this->update_meta_data( 'test_created', $test_created );
        }
    }
}

add_action( 'woocommerce_before_add_to_cart_form', 'art_get_text_field_before_add_card' );
function art_get_text_field_before_add_card() {

    $product = wc_get_product();

    $date_field      = $product->get_meta( 'test_created', true );
    $select_field = $product->get_meta( 'prod_type', true );

    if ( $date_field ) : ?>
        <div class="date-field">
            <strong>Date field: </strong>
            <?php echo $date_field; ?>
        </div>
    <?php endif;
    if ( $select_field ) : ?>
        <div class="select_field">
            <strong>select_field: </strong>
            <?php echo $select_field; ?>
        </div>
    <?php
    endif;
}