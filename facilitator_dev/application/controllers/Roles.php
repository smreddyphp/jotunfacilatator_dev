<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Roles extends CI_Controller
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

        // Load Lib_Roles Library
        $this->load->library('Lib_Roles');
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

        // Get roles for pagination
        $arrData += $this->lib_roles->getRolesForPagination($nLimit, $nOffset);

        // Load Lib_Pagination library
        $this->load->library('Lib_Pagination');

        // Pagination
        $strBaseUrl = base_url($this->config->item('roles_index_uri'));
        $nTotalRows = $arrData['nTotalRows'];
        $arrData['strPagination'] = $this->lib_pagination->pagination($strBaseUrl, $nTotalRows, $nLimit, 4);

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

        // Role
        $arrRole = array(
            'code' => $this->input->post('code'),
            'name' => $this->input->post('name'),
            'description' => $this->input->post('description'),
            'status' => $this->input->post('status')
        );

        // Add role
        $objResult = $this->lib_roles->addRole($arrRole);
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
        // Get role by ID
        $arrData['objRole'] = $objRole = $this->lib_roles->getRoleByID($nID);

        // Check status
        if (!$objRole)
        {
            $this->session->set_flashdata('flash_failure', $this->lib_roles->strFlashMessage);
            redirect($this->config->item('roles_index_uri'));
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
            // Get role by ID
            $arrData['objRole'] = $objRole = $this->lib_roles->getRoleByID($nID);

            // Check status
            if (!$objRole)
            {
                $this->session->set_flashdata('flash_failure', $this->lib_roles->strFlashMessage);
                redirect($this->config->item('roles_index_uri'));
            }

            return $this->load->view($this->config->item('template_view'), $arrData);
        }

        // Role
        $arrRole = array(
            'code' => $this->input->post('code'),
            'name' => $this->input->post('name'),
            'description' => $this->input->post('description'),
            'status' => $this->input->post('status')
        );

        // Update role
        $objResult = $this->lib_roles->updateRole($arrRole, $nID);
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
        // Delete role
        $objResult = $this->lib_roles->deleteRole($nID);
        echo json_encode($objResult);
        return;
    }

    /**
     * ajax_get_roles_by_search method
     *
     * @param integer $nOffset
     * @return void
     */
    public function ajax_get_roles_by_search($nOffset = 1)
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

        // Get roles by search
        $arrData += $this->lib_roles->getRolesForPagination($nLimit, $nOffset, $strSearch);

        // Load Lib_Pagination library
        $this->load->library('Lib_Pagination');

        // Pagination
        $strBaseUrl = base_url($this->config->item('roles_ajax_get_roles_by_search_uri'));
        $nTotalRows = $arrData['nTotalRows'];
        $arrData['strPagination'] = $this->lib_pagination->pagination($strBaseUrl, $nTotalRows, $nLimit, 5, '?'.http_build_query($_GET, '', '&'));

        // Result
        $arrResult = array(
            'result' => array(
                'success' => true,
                'view' => $this->load->view($this->config->item('roles_table_view'), $arrData, true),
                'pagination' => $this->load->view($this->config->item('pagination_view'), $arrData, true)
            )
        );

        echo json_encode($arrResult);
        return;
    }
}

/* End of file roles.php */
/* Location: ./application/controllers/roles.php */

