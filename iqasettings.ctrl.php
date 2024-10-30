<?php
namespace IQA\Plugin;
/*
 * IQ In Head Settings Controller
 * Creates and manages admin settings page
*/

class IQA_SettingsController{
    
    private $iqa_trackingcode;
    private $iqa_track_loggedin;
    private $iqa_track_admin;
    
    public function __construct() {  
        /** add admin settings menu for plugin */
        add_action( 'admin_menu', array($this, 'iqa_plugin_menu') );
        /** load settings page  */
        if(IQA_LOAD_SETTINGS_PAGE){
            add_action('admin_init', array($this, '__iqa_init_options') );
        }
    }
    
    function __iqa_init_options(){       
        /** register and get settings */
        register_setting( 'iqa_trackingcode', array($this, 'iqa_trackingcode' ) );
        register_setting( 'iqa_track_loggedin', array($this, 'iqa_track_loggedin' ) );
        register_setting( 'iqa_track_admin', array($this, 'iqa_track_admin' ) );
        /** populate settings values */
        $this->iqa_trackingcode = wp_unslash(get_option('iqa_trackingcode'));
        $this->iqa_track_loggedin = get_option('iqa_track_loggedin');
        $this->iqa_track_admin = get_option('iqa_track_admin');
    }
    
    function iqa_plugin_menu() {
        /** create admin options menu */
        add_options_page('IQ In Head Analytics Code',
                         'IQ Analytics','manage_options',
                         IQA_SETTINGS_PAGE,array( $this, 
                         'iqa_plugin_options' ) );
    }
    
    function iqa_plugin_options() {
        /** set admin settings page options */
        if ( !current_user_can( 'manage_options' ) )  {
         wp_die( __( 'You do not have sufficient permissions to access this page.' ) );
        }
        
        //process settings form on submit
        if($_SERVER['REQUEST_METHOD'] == 'POST'){            
            /** process user input and update script */
            $replace = "<script>";
            $_POST['iqa_trackingcode'] = trim(str_replace($replace, "", $_POST['iqa_trackingcode']));
            $replace = '</script>';
            $_POST['iqa_trackingcode'] = trim(str_replace($replace, "", $_POST['iqa_trackingcode']));
            
            /* write script to file and option value */
            $this->iqa_trackingcode = $_POST['iqa_trackingcode'];
            update_option('iqa_trackingcode', $this->iqa_trackingcode );
            
            //eval option value set to on / off
            if(isset($_POST['iqa_track_loggedin']) && $_POST['iqa_track_loggedin'] == "on" ){
                $this->iqa_track_loggedin = "on";
                update_option('iqa_track_loggedin', $this->iqa_track_loggedin);
            }else{
                $this->iqa_track_loggedin = '';
                update_option('iqa_track_loggedin', $this->iqa_track_loggedin);
            }
            if(isset($_POST['iqa_track_admin']) && $_POST['iqa_track_admin'] == "on" ){
                $this->iqa_track_admin = "on";
                update_option('iqa_track_admin', $this->iqa_track_admin);
            }else{
                $this->iqa_track_admin = '';
                update_option('iqa_track_admin', $this->iqa_track_admin);
            }
        }
        
        /** view file with html form */
        include( IQA_PLUGIN_ABSPATH.'/settings.ctp.php');
    }
    
}


