<?php
/**
 * @package  asaZones
 */
namespace Inc\Base;

class Taxonomies
{

	public function register() 
	{
    add_action( 'init', array($this, 'create_zones_taxonomy' ));
	}
	public function create_zones_taxonomy() 
	{
    $args = array(
      'label' => __( 'Parkavimo Zonos' ),
      'public' => false,
      'rewrite' => false,
      'hierarchical' => true,
      'query_var'         => true,
      'show_ui'           => true,
      'show_admin_column' => true,
    );
    register_taxonomy( 'city-zones', array( 'kauno_street' ), $args );
	}
}

