<?php
namespace ZGM\Plugin\Classes;

use Carbon_Fields\Container;
use Carbon_Fields\Field;

final class PluginCarbonFields
{

	private $class_methods;


	public function register_fields()
	{

		$this->class_methods = get_class_methods($this);

		foreach($this->class_methods as $method){
			add_action('carbon_fields_register_fields', array($this, $method));
		}

	}

	public function gutenberg()
	{

		include(plugin_dir_path(dirname(__FILE__)).'callbacks/fields/Gutenberg.php');

	}	

}