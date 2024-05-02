<?php

namespace App\Controllers;

/**
 * Home controller
 */
class Home extends BaseController
{
    protected $clientModel;
    protected $projectModel;
    protected $invoiceModel;
    protected $bankGuaranteeModel;

    /**
     * Constructor
     */
    public function __construct()
    {
        // Load modals
        $this->clientModel = model('App\Models\InvoiceTracking\ClientModel');
        $this->projectModel = model('App\Models\InvoiceTracking\ProjectModel');
        $this->invoiceModel = model('App\Models\InvoiceTracking\InvoiceModel');
        $this->bankGuaranteeModel = model('App\Models\InvoiceTracking\BankGuaranteeModel');
    }

    /**
     * Index method
     * Dashboard data
     */
    public function index(): string
    {
        /*// Get counts
        $data['clients'] = $this->clientModel->countAllResults();
        $data['invoices'] = $this->invoiceModel->countAllResults();
        $data['projects'] = $this->projectModel->countAllResults();
        $data['bgs'] = $this->bankGuaranteeModel->countAllResults();
        // Project totals
        $data['project_data'] = $this->projectModel->select('id, code, name, (contract_value_inr + (contract_value * ex_rate)) as contract_value')->orderBy('code', 'ASC')->findAll();
        $data['project_totals'] = $this->invoiceModel->getProjectInvoiceTotals();
        // Financial data
        $data['fy'] = (date('m') > 3) ? date('Y') : (date('Y') - 1);
        $data['financial_totals'] = $this->invoiceModel->getFinancialTotals($data['fy']);*/

        // Set template parameters
        $data['page'] = array(
            'title' => 'Dashboard',
            'page_title' => 'Dashboard',
            'layout' => 1,
        );        
        return view('pims/dashboard/dashboard', $data);
    }

    /**
     * Dashbard
     * Financial data
     */
    public function financialData() : string
    {
        $data['fy'] = $this->request->getGet('fy');
        // $data['financial_totals'] = $this->invoiceModel->getFinancialTotals($data['fy']);

        return view('pims/dashboard/financial_data', $data);
    }
}