<?php
/*
Plugin Name: Flat 101 CPT
Plugin URI: https://www.flat101.es/
Description: This plugin creates a custom post called "Tiendas" with custom fields. Enjoy and be happy!!
Version: 0.0.1
Author URI: https://www.flat101.es/
*/


add_action( 'init', 'shop_custom_post' ); // Inicialize the function

//******************************* ADD CUSTOM POST TYPE ************************************************
function shop_custom_post() {
	register_post_type( 'tiendas', // Custom Post Name
		array(
			'labels'      => array(
				'name'               => _x( 'Tiendas', 'flat_101' ),
				'singular_name'      => _x( 'Tienda', 'flat_101' ),
				'add_new'            => __( 'Añadir nueva tienda','flat_101' ),
				'add_new_item'       => __( 'Nueva tienda','flat_101' ),
				'edit_item'          => __( 'Editar tienda','flat_101' ),
				'new_item'           => __( 'Nueva tienda','flat_101' ),
				'all_items'          => __( 'Todas las tiendas','flat_101' ),
				'view_item'          => __( 'Ver tienda','flat_101'),
				'search_items'       => __( 'Buscar tienda','flat_101'),
				'not_found'          => __( 'Tienda no encontrada!','flat_101' ),
				'not_found_in_trash' => __( 'Tienda no encontrada en la papelera','flat_101' ),

			),
			'public' 				=> true,
			'has_archive'        	=> true,
			'menu_position' 		=> 26,
			'supports' 				=> array( 'title', 'editor', 'comments', 'thumbnail' ),
			'taxonomies' 			=> array( '' ),
			'menu_icon'          	=> 'dashicons-cart',
			'show_in_rest'     	=> true, // show REST API and gutenberg support
		)
	);
}


//******************************* REGISTERING Custom Metabox (custom fields) ************************************************

add_action( 'admin_init', 'my_admin' ); 

function my_admin() {
	add_meta_box( 'info_meta_box', // Metabox ID
		'Información de la Tienda', // Metabox label on dashboard
		'display_info_meta_box',
		'tiendas', 'normal', 'high' // Custom Post Name
	);
}


//******************************* DISPLAY the meta box ************************************************

function display_info_meta_box( $shop_info ) { // Metabox ID shop info


	$shop_name = esc_html( get_post_meta( $shop_info->ID, 'shop_name', true ) );// MetaField name and MetaBox ID
	$shop_address = esc_html( get_post_meta( $shop_info->ID, 'shop_address', true ) );// MetaField name and MetaBox ID
	$shop_description = esc_html( get_post_meta( $shop_info->ID, 'shop_description', true ) );// MetaField name and MetaBox ID
	

		echo '<p><label for="shop_name_label">Nombre de la tienda</label>
			<input type="text" name="shop_name" id="shop_name" value="'. $shop_name .'" /></p>';

		echo '<p><label for="shop_address_label">Dirección</label>
			<input type="text" name="shop_address" id="shop_address" value="'. $shop_address .'" /></p>';

		echo '<p><label for="shop_address_label">Descripcion</label>
			<input type="textarea" rows="4" cols="50" name="shop_description" id="shop_description" value="'. $shop_description .'" /></p>';

	?>
	<?php
}

//******************************* SAVING POST ************************************************

add_action( 'save_post', 'add_fields', 10, 2 );

// Implementation of the function

function add_fields( $shop_cpt, $shop_info ) {

	if ( $shop_info->post_type == 'tiendas' ) { // Custom Post Name

		if ( isset( $_POST['shop_name'] ) && $_POST['shop_name'] != '' ) { // Field name and ID
			update_post_meta( $shop_cpt, 'shop_name', $_POST['shop_name'] ); 
		}

		if ( isset( $_POST['shop_address'] ) && $_POST['shop_address'] != '' ) { // Field name and ID
			update_post_meta( $shop_cpt, 'shop_address', $_POST['shop_address'] ); 
		}

		if ( isset( $_POST['shop_description'] ) && $_POST['shop_description'] != '' ) { // Field name and ID
			update_post_meta( $shop_cpt, 'shop_description', $_POST['shop_description'] ); 
		}


	}
}