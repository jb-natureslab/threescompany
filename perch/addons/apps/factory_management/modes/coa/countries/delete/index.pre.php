<?php
	
	if (!$CurrentUser->has_priv('factory_management.coa')) exit;
	
	$FactoryManagementCountries = new Factory_Management_COA_Countries($API);   
    
    $HTML = $API->get('HTML');
    $Form = $API->get('Form');

    if($Form->submitted()) {
    
        $countryID = (int) $_GET['id'];  
		$Country = $FactoryManagementCountries->find($countryID, true);
		
		$Country->delete();
		$deleted = true;
		$message = $HTML->success_message('Country has been successfully deleted. Return to %sCountries%s', '<a href="'.$API->app_path().'/coa/countries/">', '</a>'); 
        
    }else{
	    $deleted = false;
	    $message = $HTML->warning_message('Are you sure you want to delete this Country?', '', ''); 
    }