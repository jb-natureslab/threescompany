<?php
	
	if (!$CurrentUser->has_priv('natures_laboratory.coa')) exit;
	
	$NaturesLaboratoryCOA = new Natures_Laboratory_COA_Capsules($API);
	$NaturesLaboratoryCOASpec = new Natures_Laboratory_COA_Capsules_Specs($API);
	$NaturesLaboratoryGoodsIn = new Natures_Laboratory_Goods_Ins($API);
	$NaturesLaboratoryGoodsStock = new Natures_Laboratory_Goods_Stocks($API);
	$NaturesLaboratoryCOACountries = new Natures_Laboratory_COA_Capsules_Countries($API);
    
    $HTML = $API->get('HTML');
    $Form = $API->get('Form');
    $Template = $API->get('Template');
    
    $Template->set('natures_laboratory/coa-capsule.html','nl');
    
    $spec = $NaturesLaboratoryCOASpec->all();
    $batch = $NaturesLaboratoryGoodsIn->all();
    $stock = $NaturesLaboratoryGoodsStock->all();
    $country = $NaturesLaboratoryCOACountries->all();
    
    $Goods = array();
    $details = array();
    
    $coaID = (int) $_GET['id'];  
    $COA = $NaturesLaboratoryCOA->find($coaID, true);
    $details = $COA->to_array();

    if($Form->submitted()) {
    
        //FOR ITEMS PROGRAMMATICALLY ADDED TO FORM
        $postvars = array('dateEntered_day','dateEntered_month','dateEntered_year','dateManufacture_day','dateManufacture_month','dateManufacture_year','bbe_day','bbe_month','bbe_year','spec','ourBatch','countryOfOrigin','colour','odour','taste','pH','gravity');	   
    	$data = $Form->receive($postvars);   
    	
    	$data['dateEntered'] = "$data[dateEntered_year]-$data[dateEntered_month]-$data[dateEntered_day]";
    	unset($data['dateEntered_year']);
    	unset($data['dateEntered_month']);
    	unset($data['dateEntered_day']);
    	
    	$data['dateManufacture'] = "$data[dateManufacture_year]-$data[dateManufacture_month]-$data[dateManufacture_day]";
    	unset($data['dateManufacture_year']);
    	unset($data['dateManufacture_month']);
    	unset($data['dateManufacture_day']);
    	
    	$data['bbe'] = "$data[bbe_year]-$data[bbe_month]-$data[bbe_day]";
    	unset($data['bbe_year']);
    	unset($data['bbe_month']);
    	unset($data['bbe_day']);
    	
    	$dynamic_fields = $Form->receive_from_template_fields($Template, $previous_values, $NaturesLaboratoryCOASpec, $Spec);
        $data['natures_laboratory_coa_capsuleDynamicFields'] = PerchUtil::json_safe_encode($dynamic_fields); 

        $new_coa = $COA->update($data);

        // SHOW RELEVANT MESSAGE
        if ($new_coa) {
            $message = $HTML->success_message('COA has been successfully updated. Return to %sCOAs%s', '<a href="'.$API->app_path().'/coa-capsules/">', '</a>'); 
        }else{
            $message = $HTML->failure_message('Sorry, COA could not be updated.');
        }
        
    }