<?php
	
	if (!$CurrentUser->has_priv('natures_laboratory.staff')) exit;
	
	$NaturesLaboratoryStaff = new Natures_Laboratory_Staff_Members($API); 
	$NaturesLaboratoryStaffTimes = new Natures_Laboratory_Staff_Member_Times($API); 
	$NaturesLaboratoryStaffEarlyFinish = new Natures_Laboratory_Staff_Member_Earlyfinishes($API); 
	$NaturesLaboratoryStaffBankholiday = new Natures_Laboratory_Staff_Member_Bankholidays($API);
	$NaturesLaboratoryStaffSickday = new Natures_Laboratory_Staff_Member_Sickdays($API);  
	$NaturesLaboratoryStaffCompassionateday = new Natures_Laboratory_Staff_Member_Compassionatedays($API);    
    
    $HTML = $API->get('HTML');
    $Form = $API->get('Form');
    $Template = $API->get('Template');

    $staffID = (int) $_GET['id'];  
    $StaffMember = $NaturesLaboratoryStaff->find($staffID, true);
    $details = $StaffMember->to_array();
    
    $compassionatedays = $NaturesLaboratoryStaffCompassionateday->getDays($staffID);