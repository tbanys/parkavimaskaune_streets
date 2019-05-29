<?php
/**
 * @package  asaZones
 */
namespace Inc\Base;

class SettingsLinks
{

	public function register() 
	{
    add_action( 'init',  array($this, 'register_kauno_adresai_post_type' ));
	}
	public function register_kauno_adresai_post_type() 
	{
    array(
      'labels' => array(
      'name' => __( 'Kauno Adresai' ),
      'singular_name' => __( 'Adresas' )
      ),
      'public' => false,
      'has_archive' => false,
      'exclude_from_search' => true,
      'show_ui'             => true,
      'show_in_menu'        => true,
      'show_in_nav_menus'   => true,
      'show_in_admin_bar'   => true,
      'supports'            => array( 'title', 'editor', 'revisions' ),
      'rewrite' => array('slug' => 'kauno-adresai'),
    );
      register_post_type( 'address', $args );
	}
}

