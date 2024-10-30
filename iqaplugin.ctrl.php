<?php
namespace IQA\Plugin;
/*
 * Plugin controller 
 * Adds tracking code to source 
*/

class IQA_PluginController{
    
    private $iqa_trackingcode;
    private $iqa_track_loggedin;
    private $iqa_track_admin;
    
    public function __construct(){   
        /* If not logged in add code */
        add_action( 'wp_head', array($this, '__iqa_eval'));   
    }
    
    public function __iqa_eval(){ 
        
        $this->iqa_trackingcode = get_option('iqa_trackingcode'); 
        if($this->iqa_trackingcode == ''){ return; }
        
        /* Eval inclusion rules logged in users */
        if(!is_user_logged_in()){
            # not logged so add code
            $this->iqa_out_trackingcode();
        }
        else{
            if(!is_admin_logged_in()){
                # user is logged in
                $this->iqa_track_loggedin = get_option('iqa_track_loggedin');
                # eval track logged in option
                if($this->iqa_track_loggedin){
                    $this->iqa_out_trackingcode();
                }
            }
            else{  
                # admin is logged in 
                $this->iqa_track_admin = get_option('iqa_track_admin');
                # eval track admin option
                if($this->iqa_track_admin){
                    $this->iqa_out_trackingcode();
                }
            }   
        }
 
    }
    
    private function iqa_out_trackingcode(){
        echo '<script>'.PHP_EOL;
        echo wp_unslash($this->iqa_trackingcode).PHP_EOL;
        echo '</script>'.PHP_EOL;
    }
    
}

