<?php
/**
 * @package  asaZones
 */
namespace Inc\Base;

class PostTypes
{

	public function register() 
	{
    add_action( 'init',  array($this, 'register_kauno_adresai_post_type' ));
	}
	public function register_kauno_adresai_post_type() 
	{
    $args = array(
      'labels' => array(
      'name' => __( 'Kauno gatvės' ),
      'singular_name' => __( 'Gatvė' )
      ),
      'public' => false,
      'has_archive' => false,
      'exclude_from_search' => true,
      'show_ui'             => true,
      'show_in_menu'        => true,
      'show_in_nav_menus'   => true,
      'show_in_admin_bar'   => true,
      'supports'            => array( 'title', 'editor', 'revisions' ),
      'rewrite' => array('slug' => 'kauno-street'),
      'menu_icon'           => 'dashicons-clipboard'
    );
      register_post_type( 'kauno_street', $args );
	}
}

