<?php
/**
 * @package  asaZones
 */
namespace Inc\Base;

class Shortcodes
{

	public function register() 
	{
    add_shortcode( 'streets', array( $this, 'create_streets_shortcode' ));
	}
	public function create_streets_shortcode() 
	{
    ob_start();
    ?>
    <div id="search-street">
      <div class="separator"></div>
      <div id="search-street-ins">
        <div class="container">
					<div class="row">
            <div class="colums_3 clear_each_fourth">
              <div class="around_rinkleva_block">
                <h2><?php _e('Stovėjimo zonos paieška') ?></h2>
                <h2><?php _e('pagal gatvę') ?></h2>
              </div>
            </div>
            <div class="colums_3 clear_each_fourth"></div>
            <div class="colums_6 clear_each_fourth search_column">
              <div class="around_rinkleva_block">
                <v-select :options="streets" @input="setSelected" label="title" placeholder="Įrašykite gatvės pavadinimą">
                  <template slot="no-options"><?php _e('Atsiprašome, tokios gatvės nėra') ?></template>]
                </v-select>
              </div>
            </div>
            <div  v-if="selected" class="colums_3 clear_each_fourth" style="float: right;">
              <div class="around_rinkleva_block">
								<div class="zonos_aprasymas" v-bind:style="{'background': selected.color}" style="padding: 19px 10px;">
                  <h4 class="zonos_title">{{selected.zone}}</h4>
                  <!-- <br>
                  <p>{{selected.title}}</p> -->
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="separator"></div>
    </div>
    <?php
    return ob_get_clean();
	}
}