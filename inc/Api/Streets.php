<?php 
/**
 * @package  asaZones
 */
namespace Inc\Api;

/**
* 
*/
class Streets
{

  public function register() 
	{
    add_action( 'rest_api_init', array($this, 'register_streets_endpoint'));
  }

  public function register_streets_endpoint() {
    register_rest_route( 'parkavimas', 'streets', array(
      'methods' => 'GET',
      'callback' => array( $this, 'get_streets')
    ) );
  }
  
  public function get_streets() {

    $args = array(
      'post_type'        => 'kauno_street',
      'post_status'      => 'publish',
      'posts_per_page' => -1
    );
    $posts = get_posts( $args );

    $steets = [];
    
    if (!empty($posts)) {
      $i = 0;
      foreach($posts as $post) {
        $steets[$i]['title'] = $post->post_title;
        $steets[$i]['zone'] = wp_get_post_terms($post->ID, 'city-zones', array("fields" => "names"))[0];

        $term_id_list = wp_get_post_terms($post->ID, 'city-zones', array("fields" => "ids"));
        $steets[$i]['color'] = wp_strip_all_tags(term_description( $term_id_list[0], 'city-zones' ));
        $i++;
      }
    }
  
    return $steets;
  }

}