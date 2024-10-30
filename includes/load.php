<?php
namespace IQA\Plugin;
defined( 'ABSPATH' ) or die( 'This action is not allowed.' );

$abspath = getcwd();
$abspath = dirname ( realpath ( __FILE__ ) );
$abspath = preg_replace('/\/includes$/', '', $abspath);

define( 'IQA_PLUGIN_ABSPATH', $abspath );

define( 'IQA_PLUGIN_BASEDIR', basename($abspath) );

define('IQA_SETTINGS_PAGE', IQA_PLUGIN_BASEDIR);

define('IQA_PLUGIN_FILE', IQA_PLUGIN_BASEDIR.'.php');

define('IQA_PLUGIN_BASENAME', IQA_ABSPATH.'/'.IQA_PLUGIN_FILE);

define('IQA_SCRIPT_URL', WP_PLUGIN_URL.'/'.IQA_PLUGIN_BASEDIR);

if(file_exists(IQA_PLUGIN_ABSPATH.'/includes/common.php')){
    include_once(IQA_PLUGIN_ABSPATH.'/includes/common.php');
}

/* Is request uri is for settings page then load page is true */
if(isset($_GET['page']) && $_GET['page'] == IQA_SETTINGS_PAGE){
    define('IQA_LOAD_SETTINGS_PAGE', 1);
}

 
