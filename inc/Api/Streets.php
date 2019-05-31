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
      'posts_per_page'   => -1,
      'orderby'=> 'title',
      'order'            => 'ASC'
    );
    $posts = get_posts( $args );

    $steets = [];
    
    if (!empty($posts)) {
      $i = 0;
      foreach($posts as $post) {
        $steets[$i]['title'] = $post->post_title;
        $steets[$i]['zone'] = wp_get_post_terms($post->ID, 'city-zones', array("fields" => "names"))[0];

        $term_id_list = wp_get_post_terms($post->ID, 'city-zones', array("fields" => "ids"));

        $zone_post_id = get_term_meta($term_id_list[0], 'parkavimo_zona', true);

        $steets[$i]['color'] = get_post_meta($zone_post_id, 'spalva', true);
        $steets[$i]['working'] = get_post_meta($zone_post_id, 'kuriomis_dienomis', true);
        $steets[$i]['zone_id'] = $zone_post_id;

        $time_price = [];
        $time_price_meta = get_post_meta($zone_post_id, 'laikai_ir_kainos', true);

        if ($time_price_meta) {
          for ($j=0; $j<$time_price_meta; $j++) {
            $kaina_key = 'laikai_ir_kainos_'.$j.'_kaina';
            $icon_key = 'laikai_ir_kainos_'.$j.'_icon';
            $sub_kaina_value = get_post_meta($zone_post_id, $kaina_key, true);
            $sub_icon_value = get_post_meta($zone_post_id, $icon_key, true);
            $time_price[$j]['price'] = $sub_kaina_value;
            $time_price[$j]['icon'] = $sub_icon_value;
          }
        }

        $steets[$i]['time_pirce'] = $time_price;

        $i++;
      }
    }
  
    return $steets;
  }

}