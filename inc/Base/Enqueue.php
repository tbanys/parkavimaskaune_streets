<?php 
/**
 * @package  asaZones
 */
namespace Inc\Base;

use \Inc\Base\BaseController;

/**
* 
*/
class Enqueue extends BaseController
{
	public function register() {
    add_action( 'admin_enqueue_scripts', array($this, 'enqueue_admin') );
    add_action( 'wp_enqueue_scripts', array($this, 'enqueue_public') );
  }
  
  function enqueue_admin() {
    wp_enqueue_script( 'mypluginscript', $this->plugin_url . 'assets/myscript.js' );
  }

  function enqueue_public() {
    wp_enqueue_script('vue', 'https://unpkg.com/vue@latest');
    wp_enqueue_script('vue-select', 'https://unpkg.com/vue-select@latest');
    wp_enqueue_style( 'vue-select-style', 'https://unpkg.com/vue-select@latest/dist/vue-select.css' );
    wp_enqueue_script( 'zones-app', $this->plugin_url . 'assets/app.js', ['vue'], '1', true );
    wp_enqueue_style( 'zeones-app-styles', $this->plugin_url . 'assets/style.css' );
  }
}