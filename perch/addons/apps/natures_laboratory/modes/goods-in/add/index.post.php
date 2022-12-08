 <?php
    echo $HTML->side_panel_start();
    
    echo $HTML->side_panel_end();
    
    echo $HTML->title_panel([
    'heading' => 'Goods In',
    'button'  => [
            'text' => $Lang->get('Goods In'),
            'link' => $API->app_nav().'/goods-in/add',
            'icon' => 'core/plus',
        ],
    ], $CurrentUser);

    $Smartbar = new PerchSmartbar($CurrentUser, $HTML, $Lang);

	$Smartbar->add_item([
	    'active' => true,
	    'title' => 'Goods In',
	    'link'  => $API->app_nav().'/goods-in/',
	]);
	
	$Smartbar->add_item([
	    'active' => false,
	    'title' => 'Stock',
	    'link'  => $API->app_nav().'/goods-in/stock/',
	]);
	
	$Smartbar->add_item([
	    'active' => false,
	    'title' => 'Suppliers',
	    'link'  => $API->app_nav().'/goods-in/suppliers/',
	]);
	
	echo $Smartbar->render();

    echo $HTML->main_panel_start();
    
    if (isset($message)){ 
	    
	    echo $message;
	    
	}else{
		
		echo $Form->form_start();

		echo $Form->hidden('staff',$_SESSION['userID']);
		$stockList[] = array('label'=>'Please Select', 'value'=>0);
		foreach($stock as $Stock){
			$stockList[] = array('label'=>$Stock->stockCode()." | ".$Stock->description(), 'value'=>$Stock->stockCode()." | ".$Stock->description());
		}
		echo $Form->select_field("productCode","Product Code",$stockList,'');
		
		echo $Form->date_field("dateIn","Date In",'');
		
		$supplierList[] = array('label'=>'Please Select', 'value'=>0);
		foreach($supplier as $Supplier){
			$supplierList[] = array('label'=>$Supplier->name(), 'value'=>$Supplier->natures_laboratory_goods_suppliersID());
		}
		echo $Form->select_field("supplier","Supplier",$supplierList,'');
		
		$countryList[] = array('label'=>'Please Select', 'value'=>0);
		foreach($country as $Country){
			$countryList[] = array('label'=>$Country->country(), 'value'=>$Country->country());
		}
		echo $Form->select_field("countryOfOrigin","Country Of Origin",$countryList,'');
		
		echo $Form->text_field("qty","Quantity",'');
		
		$units[] = array('label'=>"KG", 'value'=>'KG');
		$units[] = array('label'=>"G", 'value'=>'G');
		$units[] = array('label'=>"L", 'value'=>'L');
		$units[] = array('label'=>"ML", 'value'=>'ML');
		$units[] = array('label'=>"1000 CAPSULES", 'value'=>'1000 CAPSULES');
		echo $Form->select_field('unit','Unit',$units,'');
		
		echo $Form->text_field("bags","Bags",'');
		
		echo $Form->text_field("bagsList","Bags List (Comma Seperated, like 10,3,5)",'');
		
		echo $Form->text_field("suppliersBatch","Supplier's Batch",'');
		
		echo $Form->date_field("bbe","BBE",'');
		echo $Form->checkbox_field("noBBE","No BBE",'skip','');
		echo $Form->checkbox_field("noCOA","COA Not Required",'TRUE','');
		
		$qa[] = array('label'=>"No", 'value'=>'FALSE');
		$qa[] = array('label'=>"Yes", 'value'=>'TRUE');
		$qa[] = array('label'=>"Not Required", 'value'=>'NOT REQUIRED');
		$qa[] = array('label'=>"Rejected", 'value'=>'Rejected');
		$qa[] = array('label'=>"Quarantine", 'value'=>'Quarantine');
		echo $Form->select_field('qa','QA Check',$qa,'');
		
		echo $Form->text_field("notes","Notes",'');
		    
		echo $Form->submit_field('btnSubmit', 'Add Goods In', $API->app_path());
		
		echo $Form->form_end();
	
	}

    echo $HTML->main_panel_end();