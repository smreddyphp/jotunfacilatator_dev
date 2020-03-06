<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Designations extends CI_Controller
{
    public $api;

    /**
     * __construct method
     */
    function __construct()
    {
        parent::__construct();

        // Check login
        $this->lib_auth->checkUriPermissions();

        // Load Lib_Designations Library
        $this->load->library('Lib_Designations');
    }

    /**
     * _remap method
     *
     * @param string $strMethod
     * @param string[] $arrParams
     * @return void
     */
    public function _remap($strMethod, $arrParams = array())
    {
        if(method_exists($this, $strMethod))
            return call_user_func_array(array($this, $strMethod), $arrParams);

        return show_404();
    }

    /**
     * index method
     *
     * @param integer $nOffset
     * @return void
     */
    public function index($nOffset = 1)
    { 
        // Limit
        $arrData['nLimit'] = $nLimit = 10;
        $arrData['nOffset'] = $nOffset;

        // Offset
        $nOffset = $nLimit * ($nOffset - 1);

        // Get designations for pagination
        $arrData += $this->lib_designations->getDesignationsForPagination($nLimit, $nOffset);

        // Load Lib_Pagination library
        $this->load->library('Lib_Pagination');

        // Pagination
        //$strBaseUrl = base_url($this->config->item('designations_index_uri'));
        //Modified by eswar 20-4-2017
$strBaseUrl = base_url().'index.php/designations/'.$this->uri->segment(2);
        $nTotalRows = $arrData['nTotalRows'];
        $arrData['strPagination'] = $this->lib_pagination->pagination($strBaseUrl, $nTotalRows, $nLimit, 3);

        return $this->load->view($this->config->item('template_view'), $arrData);
    }

    /**
     * add method
     *
     * @return void
     */
    public function add()
    {
        // Check ajax request
        if (!$this->input->is_ajax_request())
            return $this->load->view($this->config->item('template_view'));
$created_by = $this->lib_auth->getUserID();
        // Designation
        $arrDesignation = array(
            'code' => $this->input->post('code'),
            'name' => $this->input->post('name'),
            'description' => $this->input->post('description'),
            'status' => $this->input->post('status'),
            'created_by' => $created_by
        );

        // Add designation
        $objResult = $this->lib_designations->addDesignation($arrDesignation);
        echo json_encode($objResult);
        return;
    }

    /**
     * view method
     *
     * @param integer $nID
     * @return void
     */
    public function view($nID)
    {
        // Get designation by ID
        $arrData['objDesignation'] = $objDesignation = $this->lib_designations->getDesignationByID($nID);

        // Check status
        if (!$objDesignation)
        {
            $this->session->set_flashdata('flash_failure', $this->lib_designations->strFlashMessage);
            redirect($this->config->item('designations_index_uri'));
        }

        return $this->load->view($this->config->item('template_view'), $arrData);
    }

    /**
     * edit method
     *
     * @param integer $nID
     * @return void
     */
    public function edit($nID)
    {
        // Check ajax request
        if (!$this->input->is_ajax_request())
        {
            // Get designation by ID
            $arrData['objDesignation'] = $objDesignation = $this->lib_designations->getDesignationByID($nID);

            // Check status
            if (!$objDesignation)
            {
                $this->session->set_flashdata('flash_failure', $this->lib_designations->strFlashMessage);
                redirect($this->config->item('designations_index_uri'));
            }

            return $this->load->view($this->config->item('template_view'), $arrData);
        }

        // Designation
        $arrDesignation = array(
            'code' => $this->input->post('code'),
            'name' => $this->input->post('name'),
            'description' => $this->input->post('description'),
            'status' => $this->input->post('status')
        );

        // Update designation
        $objResult = $this->lib_designations->updateDesignation($arrDesignation, $nID);
        echo json_encode($objResult);
        return;
    }

    /**
     * delete method
     *
     * @param integer $nID
     * @return void
     */
    public function delete($nID)
    {
        // Delete designation
        $objResult = $this->lib_designations->deleteDesignation($nID);
        echo json_encode($objResult);
        return;
    }

    /**
     * ajax_get_designations_by_search method
     *
     * @param integer $nOffset
     * @return void
     */
    public function ajax_get_designations_by_search($nOffset = 1)
    {
        // Check the ajax request
        if (!$this->input->is_ajax_request())
        {
            $arrResult = array(
                'result' => array(
                    'success' => false,
                    'message' => 'This method not allowed.'
                )
            );
            echo json_encode($arrResult);
            return;
        }

        // Input
        $strSearch = $this->input->get('search');

        // Limit
        $arrData['nLimit'] = $nLimit = 10;
        $arrData['nOffset'] = $nOffset;

        // Offset
        $nOffset = $nLimit * ($nOffset - 1);

        // Get designations by search
        $arrData += $this->lib_designations->getDesignationsForPagination($nLimit, $nOffset, $strSearch);

        // Load Lib_Pagination library
        $this->load->library('Lib_Pagination');

        // Pagination
        $strBaseUrl = base_url($this->config->item('designations_ajax_get_designations_by_search_uri'));
        $nTotalRows = $arrData['nTotalRows'];
        $arrData['strPagination'] = $this->lib_pagination->pagination($strBaseUrl, $nTotalRows, $nLimit, 5, '?'.http_build_query($_GET, '', '&'));

        // Result
        $arrResult = array(
            'result' => array(
                'success' => true,
                'view' => $this->load->view($this->config->item('designations_table_view'), $arrData, true),
                'pagination' => $this->load->view($this->config->item('pagination_view'), $arrData, true)
            )
        );

        echo json_encode($arrResult);
        return;
    }
}

/* End of file designations.php */
/* Location: ./application/controllers/designations.php */

