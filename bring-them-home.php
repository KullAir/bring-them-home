
<?php
/*
Plugin Name: Bring Them Home 
Description: A clock that counts the time that has passed since the brutal and inhuman attack by Hamas, the time in which people, old women and children are held by the murderous and abominable organization.
Plugin URI: http://www.kull-air.com
Author: Asaf Kuller
Version: 1.1 // add suport for categories.
Text Domain: bring-them-home
Domain Path: /languages
Author URI: http://www.kull-air.com
*/

if( ! defined( 'ABSPATH') ){
    exit;
}


function bth_custom_script_and_styles(){
   
    wp_enqueue_style('bth_style',plugin_dir_url(__FILE__).'public/css/style.css',array(),null,'screen') ;

    wp_enqueue_script( 'btn_script',plugin_dir_url(__FILE__).'public/js/script.js',array(),null,false) ;
       
    wp_enqueue_style('assistantFonts', 'https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap',false);

}
add_action( 'wp_enqueue_scripts','bth_custom_script_and_styles');


function add_bth_counter_to_header() { 
    ?>
    
        <button id="bth-show-button" aria-label= "<?php _e('Show Timer','bring-them-home'); ?>" ><span aria-hidden="true"></span></button>    
        <div id="bring-them-home" class="bth-show">
            <div class="bth-inner">
                <button id="bth-hide-button" aria-label= "<?php _e('Hide Timer','bring-them-home'); ?>" ><span aria-hidden="true">x</span></button>
                <div class="bth-header">
                    <h2><a href="https://stories.bringthemhomenow.net/" target="_blaank"><?php _e('Bring Them Home <span class="now">Now!</span>','bring-them-home'); ?></a></h2>
                </div>
                <div class="bth-row">
                    <div class="bth-col bth-days" >
                        <div class="bth-number" id="bth-number-days">00</div>
                        <div class="bth-label"><?php _e('days','bring-them-home'); ?></div>
                    </div> 
                    <div class="bth-col bth-hours">
                        <div class="bth-number" id="bth-number-hours">00</div>
                        <div aria-label= "<?php  _e('Hours','bring-them-home'); ?>"  class="bth-label"><?php _e('hrs','bring-them-home'); ?></div>
                    </div> 
                    <div class="bth-col bth-minute">
                        <div class="bth-number" id="bth-number-minutes">00</div>
                        <div aria-label= "<?php _e('Minutess','bring-them-home'); ?>" class="bth-label"><?php _e('min','bring-them-home'); ?></div>
                    </div> 
                    <div class="bth-col bth-scounds">
                        <div class="bth-number" id="bth-number-secounds">00</div>
                        <div aria-label= "<?php _e('Seconds','bring-them-home'); ?>" class="bth-label"><?php _e('sec','bring-them-home'); ?></div>
                    </div>            

                </div>
                <div class="bth-footer">
                    <?php _e('Since being taken hostage by Hamas','bring-them-home'); ?>
                </div>

            </div>
        </div>
        
    <?php
}

add_action('wp_head', 'add_bth_counter_to_header'); 

/*
* Load plugin textdomain.
*/
function bth_plugin_load_textdomain() {

    $langboolo = load_plugin_textdomain( 'bring-them-home', false, basename( dirname( __FILE__ ) ) . "/languages/" );

}


add_action( 'init', 'bth_plugin_load_textdomain' );

