<?php

class Factory_Management_COA_Countries extends PerchAPI_Factory
{
    protected $table     = 'fm_countries';
	protected $pk        = 'countryID';
	protected $singular_classname = 'Factory_Management_COA_Country';
	
	protected $default_sort_column = 'country';
	
	public $static_fields = array('countryID,','country');	
	
}