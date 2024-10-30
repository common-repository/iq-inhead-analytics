<?php
namespace IQA\Plugin;
/*
Plugin Name: IQ Analytics Tracking Code In Head 
Plugin URI: http://www.omnileads.nl/
Description: Copy and paste your Analytics tracking code. Thats all.
Author: Daniël Mulder
Version: 0.2.1
Author URI: http://www.omnileads.nl/daniel-mulder-all-star/
*/

/** load.php loads plugin config and sets constants */
require_once 'includes/load.php';

/*
 * Create new instance of IQA_PluginController to add plugin behaviour.
 * Create new instance of IQA_SettingsController to create options page.
*/


if(is_admin()){ 
    /** load admin dashboad actions */ 
    require_once 'iqasettings.ctrl.php';
    $iqaSettingsCtrl = new IQA_SettingsController();
}else { 
  /** business end of plugin */
  require_once 'iqaplugin.ctrl.php';
  $iqaPluginCtrl = new IQA_PluginController();
}


