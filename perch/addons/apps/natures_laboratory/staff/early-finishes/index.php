<?php
	
/*
	ini_set('display_errors', 1);
	ini_set('display_startup_errors', 1);
	error_reporting(E_ALL);
*/
	
    # include the API
    include('../../../../../core/inc/api.php');
    
    $API  = new PerchAPI(1.0, 'natures_laboratory');

    # include your class files
    include('../../Natures_Laboratory.class.php');
    include('../../Natures_Laboratorys.class.php');
    include('../../Natures_Laboratory.staffmember.class.php');
    include('../../Natures_Laboratory.staffmembers.class.php');
    include('../../Natures_Laboratory.staffmember.time.class.php');
    include('../../Natures_Laboratory.staffmember.times.class.php');
    include('../../Natures_Laboratory.staffmember.earlyfinish.class.php');
    include('../../Natures_Laboratory.staffmember.earlyfinishes.class.php');
    include('../../Natures_Laboratory.staffmember.bankholiday.class.php');
    include('../../Natures_Laboratory.staffmember.bankholidays.class.php');
    include('../../Natures_Laboratory.staffmember.holiday.class.php');
    include('../../Natures_Laboratory.staffmember.holidays.class.php');
    
    # Grab an instance of the Lang class for translations
    $Lang = $API->get('Lang');

    # Set the page title
    $Perch->page_title = 'Nature\'s Laboratory';
    
    # Set Subnav
    include('../../modes/_subnav.php');


    # Do anything you want to do before output is started
    include('../../modes/staff/early-finishes/index.pre.php');
    
    
    # Top layout
    include(PERCH_CORE . '/inc/top.php');

    
    # Display your page
    include('../../modes/staff/early-finishes/index.post.php');
    
    
    # Bottom layout
    include(PERCH_CORE . '/inc/btm.php');
