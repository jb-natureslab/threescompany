<?php
	
	if (!$CurrentUser->has_priv('natures_laboratory.staff')) exit;
	
	$NaturesLaboratoryStaff = new Natures_Laboratory_Staff_Members($API);    
    
    $HTML = $API->get('HTML');
    $Form = $API->get('Form');
    
    $StaffMember = array();
    $details = array();

    if($Form->submitted()) {
    
        $staffID = (int) $_GET['id'];  
		$StaffMember = $NaturesLaboratoryStaff->find($staffID, true);
		
		$StaffMember->delete();
		$deleted = true;
		$message = $HTML->success_message('Staff member has been successfully deleted. Return to %sStaff%s', '<a href="'.$API->app_path().'/staff/">', '</a>'); 
        
    }else{
	    $deleted = false;
	    $message = $HTML->warning_message('Are you sure you want to delete this staff member?', '', ''); 
    }