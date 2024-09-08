<?php

require_once 'CRM/Core/Page.php';

define('DIR_SPOOL',  '/var/www/html/sites/default/files/civicrm/lp/spool');
define('DIR_STORE',  '/var/www/html/sites/default/files/civicrm/lp/store');
define('DIR_TEMP',   '/var/www/html/sites/default/files/civicrm/lp/tmp');

class CRM_Lp_Page_Namer extends CRM_Core_Page {
  function run() {

    if(isset($_POST)) {
      if(array_key_exists('batchname', $_POST)) {
	$file = '/tmp/'.$_POST['file'];
    

	$ph = popen('/usr/local/bin/splitletters.sh '.$file.' '.$_POST['batchname'].' '.$_POST['batchsize'], 'r');
	echo fgets($ph);
	echo $file;
	pclose($ph);

	unlink($file);

	
	header('Location: /civicrm/lp-admin');
	exit;
      }
    }

    if(isset($_GET)) {
      if(!array_key_exists('file', $_GET)) {
	header('Location: /civicrm/lp-admin');
	exit;
      }
    } 



    $this->assign('file',$_GET['file']);
    // Example: Set the page-title dynamically; alternatively, declare a static title in xml/Menu/*.xml
    CRM_Utils_System::setTitle(ts('CiviCRM LPAdmin'));



    // Example: Assign a variable for use in a template

    parent::run();
  }
}
