<?php
	
	if (!$CurrentUser->has_priv('natures_laboratory.goodsin')) exit;

	$NaturesLaboratoryGoodsIn = new Natures_Laboratory_Goods_Ins($API);
	$NaturesLaboratoryGoodsStock = new Natures_Laboratory_Goods_Stocks($API); 
	$NaturesLaboratoryGoodsSuppliers = new Natures_Laboratory_Goods_Suppliers($API);    
	$NaturesLaboratoryCOACountries = new Natures_Laboratory_COA_Countries($API);  
    
    $HTML = $API->get('HTML');
    $Form = $API->get('Form');
    
    $Goods = array();
    $details = array();
    
    $stock = $NaturesLaboratoryGoodsStock->all();
    $supplier = $NaturesLaboratoryGoodsSuppliers->all();
    
    $goodsID = (int) $_GET['id'];  
    $Goods = $NaturesLaboratoryGoodsIn->find($goodsID, true);
    $details = $Goods->to_array();
    $country = $NaturesLaboratoryCOACountries->all();

    if($Form->submitted()) {
    
        //FOR ITEMS PROGRAMMATICALLY ADDED TO FORM
        $postvars = array('staff','productCode','dateIn_day','dateIn_month','dateIn_year','supplier','qty','unit','bags','bagsList','suppliersBatch','bbe_day','bbe_month','bbe_year','noBBE','noCOA','qa','notes');	   
    	$data = $Form->receive($postvars);   
    	
    	$product = explode(" | ", $data['productCode']);
    	$data['productCode'] = $product[0];
    	$data['productDescription'] = $product[1];   
    	
    	$data['dateIn'] = "$data[dateIn_year]-$data[dateIn_month]-$data[dateIn_day]";
    	unset($data['dateIn_year']);
    	unset($data['dateIn_month']);
    	unset($data['dateIn_day']);
    	
    	if($data['noBBE']=='skip'){
	    	$data['bbe']='1970-01-01';
	    }else{
	    	$data['bbe'] = "$data[bbe_year]-$data[bbe_month]-$data[bbe_day]";
    	}
    	
    	unset($data['bbe_year']);
    	unset($data['bbe_month']);
    	unset($data['bbe_day']);
    	unset($data['noBBE']);

        $new_goods = $Goods->update($data);

        // SHOW RELEVANT MESSAGE
        if ($new_goods) {
            $message = $HTML->success_message('Goods In has been successfully updated. Return to %sGoods In%s', '<a href="'.$API->app_path().'/goods-in/">', '</a>'); 
        }else{
            $message = $HTML->failure_message('Sorry, Goods In could not be updated.');
        }
        
    }