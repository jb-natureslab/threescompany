<?php
	
/*
	ini_set('display_errors', 1);
	ini_set('display_startup_errors', 1);
	error_reporting(E_ALL);
*/
	
    # include the API
    include('../../../../../../../core/inc/api.php');
    
    $API  = new PerchAPI(1.0, 'factory_management');

    # include your class files
    foreach (glob("../../../../classes/*.php") as $filename)
	{
	    include $filename;
	}
    
    # Grab an instance of the Lang class for translations
    $Lang = $API->get('Lang');

    # Set the page title
    $Perch->page_title = 'Supplier';
    
    
    # Set Subnav
    include('../../../../modes/_subnav.php');


    # Do anything you want to do before output is started
    include('../../../../modes/suppliers/manage/po/manage/index.pre.php');
    
    
    # Top layout
    include(PERCH_CORE . '/inc/top.php');

    
    # Display your page
    include('../../../../modes/suppliers/manage/po/manage/index.post.php');
    
    
    # Bottom layout
    include(PERCH_CORE . '/inc/btm.php');
