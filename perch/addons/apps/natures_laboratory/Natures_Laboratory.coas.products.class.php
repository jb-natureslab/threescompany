<?php

class Natures_Laboratory_COA_Products extends PerchAPI_Factory
{
    protected $table     = 'natures_laboratory_coa_products';
	protected $pk        = 'natures_laboratory_coa_productID';
	protected $singular_classname = 'Natures_Laboratory_COA_Product';
	
	protected $default_sort_column = 'natures_laboratory_coa_productID';
	
	public $static_fields = array('natures_laboratory_coa_productID','spec','dateEntered','ourBatch','countryOfOrigin','colour','odour','taste','natures_laboratory_coa_productDynamicFields');	
	
	public function getCOAs(){
		
		$today = date('Y-m-d');
		$date = strtotime($today.' -1 year');
		$date = date('Y-m-d', $date);
		
		$sql = 'SELECT * FROM perch3_natures_laboratory_coa_products WHERE dateEntered>="'.$date.'" ORDER BY natures_laboratory_coa_productID DESC';
		$data = $this->db->get_rows($sql);
		return $data;
		
	}
	
	public function updateCOAs(){
		$sql = 'SELECT * FROM perch3_natures_laboratory_coa_products WHERE dateEntered>="'.$date.'" ORDER BY natures_laboratory_coa_productID DESC';
		$data = $this->db->get_rows($sql);
		foreach($data as $item){
			$date = $item['dateEntered'];
			$dates = explode("/",$date);
			$newDate = "$dates[2]-$dates[1]-$dates[0]";
			$sql = 'UPDATE perch3_natures_laboratory_coa_products SET dateEntered="'.$newDate.'" WHERE natures_laboratory_coa_productID='.$item['natures_laboratory_coaID'];
			echo $sql;
			$update = $this->db->execute($sql);
		}
	}
	
	public function byBatch($batch){
		
		$sql = 'SELECT * FROM perch3_natures_laboratory_coa_products WHERE ourBatch="'.$batch.'"';
		$data = $this->db->get_row($sql);
		return $data;
		
	}
	
}