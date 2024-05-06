<?php 
namespace App\Controllers\Settings;
use App\Controllers\BaseController;
/**
 * Modules For the Configuration
 */
class Configuration extends BaseController
{
	/**
	 * To get Constant Details
	 */ 
	public function index()
	{
		/**
		 * This is for the Configuration Module.
		 */ 
		$data['page'] = array(
            'title' => 'Configuration Details',
            'page_title' => 'Configuration Details',
        );
        echo view('template/template_admin',$data);
	}
}
