<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 * @filters
 *  Auth        - Checks user login
 *  ModuleAuth  - Checks user login and module access
 */

// Home page
$routes->get('/', 'Home::index', ['filter' => 'ModuleAuth']);
$routes->get('home/(:any)', 'Home::$1', ['filter' => 'ModuleAuth']);

// Login module
$routes->get('login', [App\Controllers\User\Login::class, 'index']);
$routes->get('login/(:any)', [App\Controllers\User\Login::class, '$1']);
$routes->post('login/(:any)', [App\Controllers\User\Login::class, '$1']);

// Profile
$routes->get('profile', [App\Controllers\User\Profile::class, 'index'], ['filter' => 'Auth']);
$routes->get('profile/(:any)', [App\Controllers\User\Profile::class, '$1'], ['filter' => 'Auth']);
$routes->post('profile/(:any)', [App\Controllers\User\Profile::class, '$1'], ['filter' => 'Auth']);

// Project module
$routes->get('project', [App\Controllers\InvoiceTracking\Project::class, 'index'], ['filter' => 'ModuleAuth']);
$routes->get('project/(:any)', [App\Controllers\InvoiceTracking\Project::class, '$1'], ['filter' => 'ModuleAuth']);
$routes->post('project/(:any)', [App\Controllers\InvoiceTracking\Project::class, '$1'], ['filter' => 'ModuleAuth']);

// Invoice module
$routes->get('invoice', [App\Controllers\InvoiceTracking\Invoice::class, 'index'], ['filter' => 'ModuleAuth']);
$routes->get('invoice/(:any)', [App\Controllers\InvoiceTracking\Invoice::class, '$1'], ['filter' => 'ModuleAuth']);
$routes->post('invoice/(:any)', [App\Controllers\InvoiceTracking\Invoice::class, '$1'], ['filter' => 'ModuleAuth']);

// Bank Guarantee module
$routes->get('bankGuarantee', [App\Controllers\InvoiceTracking\BankGuarantee::class, 'index'], ['filter' => 'ModuleAuth']);
$routes->get('bankGuarantee/(:any)', [App\Controllers\InvoiceTracking\BankGuarantee::class, '$1'], ['filter' => 'ModuleAuth']);
$routes->post('bankGuarantee/(:any)', [App\Controllers\InvoiceTracking\BankGuarantee::class, '$1'], ['filter' => 'ModuleAuth']);

// Location Module
$routes->get('location', [App\Controllers\InvoiceTracking\Location::class, 'index'], ['filter' => 'ModuleAuth']);
$routes->get('location/(:any)', [App\Controllers\InvoiceTracking\Location::class, '$1'], ['filter' => 'ModuleAuth']);
$routes->post('location/(:any)',[App\Controllers\InvoiceTracking\Location::class, '$1'], ['filter' => 'ModuleAuth']);

// Deductions Module
$routes->get('deduction', [App\Controllers\InvoiceTracking\Deduction::class,'index'], ['filter' => 'ModuleAuth']);
$routes->get('deduction/(:any)', [App\Controllers\InvoiceTracking\Deduction::class, '$1'], ['filter' => 'ModuleAuth']);
$routes->post('deduction/(:any)', [App\Controllers\InvoiceTracking\Deduction::class, '$1'], ['filter' => 'ModuleAuth']);

// Payment Module
$routes->get('paymentType', [App\Controllers\InvoiceTracking\PaymentType::class, 'index'], ['filter' => 'ModuleAuth']);
$routes->get('paymentType/(:any)', [App\Controllers\InvoiceTracking\PaymentType::class, '$1'], ['filter' => 'ModuleAuth']);
$routes->post('paymentType/(:any)', [App\Controllers\InvoiceTracking\PaymentType::class, '$1'], ['filter' => 'ModuleAuth']);

// Bank Guarantee Types  Module
$routes->get('bankGuaranteeType', [App\Controllers\InvoiceTracking\BankGuaranteeType::class, 'index'], ['filter' => 'ModuleAuth']);
$routes->get('bankGuaranteeType/(:any)', [App\Controllers\InvoiceTracking\BankGuaranteeType::class, '$1'], ['filter' => 'ModuleAuth']);
$routes->post('bankGuaranteeType/(:any)', [App\Controllers\InvoiceTracking\BankGuaranteeType::class, '$1'], ['filter' => 'ModuleAuth']);

// File type Module
$routes->get('fileType', [App\Controllers\InvoiceTracking\FileType::class, 'index'], ['filter' => 'ModuleAuth']);
$routes->get('fileType/(:any)', [App\Controllers\InvoiceTracking\FileType::class, '$1'], ['filter' => 'ModuleAuth']);
$routes->post('fileType/(:any)', [App\Controllers\InvoiceTracking\FileType::class, '$1'], ['filter' => 'ModuleAuth']);

// Users Module
$routes->get('user', [App\Controllers\User\User::class, 'index'], ['filter' => 'ModuleAuth']);
$routes->get('user/(:any)', [App\Controllers\User\User::class, '$1'], ['filter' => 'ModuleAuth']);
$routes->post('user/(:any)', [App\Controllers\User\User::class, '$1'], ['filter' => 'ModuleAuth']);

// Roles Module
$routes->get('role', [App\Controllers\User\Roles::class, 'index'], ['filter' => 'ModuleAuth']);
$routes->get('role/(:any)', [App\Controllers\User\Roles::class, '$1'], ['filter' => 'ModuleAuth']);
$routes->post('role/(:any)', [App\Controllers\User\Roles::class, '$1'], ['filter' => 'ModuleAuth']);

// Modules Module
$routes->get('module', [App\Controllers\Settings\Modules::class, 'index'], ['filter' => 'ModuleAuth']);
$routes->get('module/(:any)', [App\Controllers\Settings\Modules::class, '$1'], ['filter' => 'ModuleAuth']);
$routes->post('module/(:any)', [App\Controllers\Settings\Modules::class, '$1'], ['filter' => 'ModuleAuth']);

// Configuration Module
$routes->get('configuration', [App\Controllers\Settings\Configuration::class, 'index'], ['filter' => 'ModuleAuth']);
$routes->get('configuration/(:any)', [App\Controllers\Settings\Configuration::class, '$1'], ['filter' => 'ModuleAuth']);
$routes->post('configuration/(:any)', [App\Controllers\Settings\Configuration::class, '$1'], ['filter' => 'ModuleAuth']);

// Invoice Deduction Report Module
$routes->get('reports', [App\Controllers\InvoiceTracking\Reports::class, 'index'], ['filter' => 'ModuleAuth']);
$routes->get('reports/(:any)', [App\Controllers\InvoiceTracking\Reports::class, '$1'], ['filter' => 'ModuleAuth']);
$routes->post('reports/(:any)', [App\Controllers\InvoiceTracking\Reports::class, '$1'], ['filter' => 'ModuleAuth']);

// Command line
$routes->cli('cli/bg/reminder1', [App\Controllers\InvoiceTracking\Cli\Bg::class, 'reminder1']);

// Vendor Module
$routes->get('vendor', [App\Controllers\pims\Vendor::class, 'index'], ['filter' => 'ModuleAuth']);
$routes->get('vendor/(:any)', [App\Controllers\pims\Vendor::class, '$1'], ['filter' => 'ModuleAuth']);
$routes->post('vendor/(:any)', [App\Controllers\pims\Vendor::class, '$1'], ['filter' => 'ModuleAuth']);

// Projects Module
$routes->get('projects', [App\Controllers\pims\Projects::class, 'index'], ['filter' => 'ModuleAuth']);
$routes->get('projects/(:any)', [App\Controllers\pims\Projects::class, '$1'], ['filter' => 'ModuleAuth']);
$routes->post('projects/(:any)', [App\Controllers\pims\Projects::class, '$1'], ['filter' => 'ModuleAuth']);

// Document Revisions Module
$routes->get('documentRevisions', [App\Controllers\pims\DocumentRevisions::class, 'index'], ['filter' => 'ModuleAuth']);
$routes->get('documentRevisions/(:any)', [App\Controllers\pims\DocumentRevisions::class, '$1'], ['filter' => 'ModuleAuth']);
$routes->post('documentRevisions/(:any)', [App\Controllers\pims\DocumentRevisions::class, '$1'], ['filter' => 'ModuleAuth']);

// Disciplines Module
$routes->get('discipline', [App\Controllers\pims\Discipline::class, 'index'], ['filter' => 'ModuleAuth']);
$routes->get('discipline/(:any)', [App\Controllers\pims\Discipline::class, '$1'], ['filter' => 'ModuleAuth']);
$routes->post('discipline/(:any)', [App\Controllers\pims\Discipline::class, '$1'], ['filter' => 'ModuleAuth']);


// Client module
$routes->get('client', [App\Controllers\pims\Client::class, 'index'], ['filter' => 'ModuleAuth']);
$routes->get('client/(:any)', [App\Controllers\pims\Client::class, '$1'], ['filter' => 'ModuleAuth']);
$routes->post('client/(:any)', [App\Controllers\pims\Client::class, '$1'], ['filter' => 'ModuleAuth']);


// Document Types module
$routes->get('documentType', [App\Controllers\pims\DocumentType::class, 'index'], ['filter' => 'ModuleAuth']);
$routes->get('documentType/(:any)', [App\Controllers\pims\DocumentType::class, '$1'], ['filter' => 'ModuleAuth']);
$routes->post('documentType/(:any)', [App\Controllers\pims\DocumentType::class, '$1'], ['filter' => 'ModuleAuth']);

// Document Types module
$routes->get('documents', [App\Controllers\pims\Documents::class, 'index'], ['filter' => 'ModuleAuth']);
$routes->get('documents/(:any)', [App\Controllers\pims\Documents::class, '$1'], ['filter' => 'ModuleAuth']);
$routes->post('documents/(:any)', [App\Controllers\pims\Documents::class, '$1'], ['filter' => 'ModuleAuth']);

// Document Purposes module
$routes->get('documentPurposes', [App\Controllers\pims\DocumentPurposes::class,'index'], ['filter' => 'ModuleAuth']);
$routes->get('documentPurposes/(:any)', [App\Controllers\pims\DocumentPurposes::class, '$1'], ['filter' => 'ModuleAuth']);
$routes->post('documentPurposes/(:any)', [App\Controllers\pims\DocumentPurposes::class, '$1'], ['filter' => 'ModuleAuth']);

// Document Types module
$routes->get('documentStatus', [App\Controllers\pims\DocumentStatus::class, 'index'], ['filter' => 'ModuleAuth']);
$routes->get('documentStatus/(:any)', [App\Controllers\pims\DocumentStatus::class, '$1'], ['filter' => 'ModuleAuth']);
$routes->post('documentStatus/(:any)', [App\Controllers\pims\DocumentStatus::class, '$1'], ['filter' => 'ModuleAuth']);
