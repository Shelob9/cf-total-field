<?php
/**
 Plugin Name: CF Total Field
 * Text Domain: cf-total-field
 */

/**
 * Full path to this directory
 *
 * Use to set path to template files
 *
 * @since 0.1.0
 */
define('CF_TOTAL_FIELD_PATH', plugin_dir_path(__FILE__));

add_action( 'caldera_forms_includes_complete', 'cf_total_field_init' );

/**
 * Load plugin
 *
 * @since 0.1.0
 *
 * @uses "caldera_forms_includes_complete" action
 */
function cf_total_field_init(){
	add_filter( 'caldera_forms_get_field_types', 'cf_total_field_init_field', 15 );

}


/**
 * Add custom field type
 *
 * @since 0.1.0
 *
 * @uses "caldera_forms_get_field_types" filter
 *
 * @param array $fields
 *
 * @return array
 */
function cf_total_field_init_field( $fields ){
    $fields[ 'total' ]             = array(
        "field"       => __( 'Total Field', 'cf-total-field' ),
        "description" => __( 'Single Line Text', 'cf-total-field' ),
        "file"        => CF_TOTAL_FIELD_PATH . "field.php",
        "category"    => __( 'Special', 'caldera-forms' ),
        "setup"       => array(
            "template" => CF_TOTAL_FIELD_PATH . "/config.php",
            "preview"  => CF_TOTAL_FIELD_PATH . "/preview.php"
        ),

    );

    return $fields;
}

/**
 * Find total for field, use in field template to display value
 *
 * @since 0.1.0
 *
 * @param array $field Field config
 * @param array $form Form config
 *
 * @return bool|int
 */
function cf_total_field_get_total_field( array $field, array $form ){
    $field_id = ! empty( $field[ 'config' ][ 'total' ] ) ? strip_tags( $field[ 'config' ][ 'total' ] ) : null;
    if( $field_id ){
        return cf_total_field_get_total( $field_id );
    }else{
        return Caldera_Forms_Field_Util::get_default( $field, $form, true );
    }

}

/**
 * Get the total value of all entries to a field
 *
 * @since 0.1.0
 *
 * @param string $field_id Field ID to get the total value for
 *
 * @return int
 */
function cf_total_field_get_total( $field_id ){
	//This is a photo of my dog - https://www.instagram.com/p/BOIT7MYj0zU/?hl=en&taken-by=pollockjosh
	global $wpdb;
	$table = $wpdb->prefix . 'cf_form_entry_values';
	$r = $wpdb->get_results(
		$wpdb->prepare( "SELECT SUM( `value` ) FROM $table WHERE `field_id` = '%s'", trim($field_id) ),
		ARRAY_A
	);

	if( isset( $r[0], $r[0]['SUM( `value` )'])){
		$total = $r[0]['SUM( `value` )'];
	}else{
		$total = 0;
	}
	return $total;
}