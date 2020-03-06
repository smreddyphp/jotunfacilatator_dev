<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Shops extends CI_Controller
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

        // Load Lib_Shops Library
        $this->load->library(array('Lib_Shops','Lib_Shop_Types'));
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

        // Get shoptypes list
        $arrData['arrShopTypes'] = $this->lib_shop_types->getShopTypesList();

        // Get shops for pagination
        $arrData += $this->lib_shops->getShopsForPagination($nLimit, $nOffset);

        // Load Lib_Pagination library
        $this->load->library('Lib_Pagination');

        // Pagination
        $strBaseUrl = base_url($this->config->item('shops_index_uri'));
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
        {
            // Get shop types list
            $arrData['arrShopTypes'] = $this->lib_shop_types->getShopTypesList();                   

            return $this->load->view($this->config->item('template_view'), $arrData);
        }

        /*// Set rules
        $this->form_validation->set_rules('image', 'Image', 'callback_file_upload[shops.image, 2]');

        // Run validation
        if($this->form_validation->run() == false) 
        {
            $arrResult = array(
                'success' => false,
                'result' => array(
                    'validations' => array(
                        'image' => form_error('image', '<label class="error">', '</label>')
                    )
                )
            );

            echo json_encode($arrResult);
            return;
        }*/

        // Shop
        $arrShop = array(
            'name' => $this->input->post('name'),
            'address' => $this->input->post('address'),
            'latitude' => $this->input->post('latitude'),
            'longitude' => $this->input->post('longitude'),
            'last_evaluation' => $this->input->post('last_evaluation'),
            'shop_type_id' => $this->input->post('shop_type_id'),
            'acc_no' => $this->input->post('acc_no'),
            'email' => $this->input->post('email'),
            'image' => $this->input->post('image')
        );

        // Add shop
        $objResult = $this->lib_shops->addShop($arrShop);

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
        // Get shop by ID
        $arrData['objShop'] = $objShop = $this->lib_shops->getShopByID($nID);

        // Check status
        if (!$objShop)
        {
            $this->session->set_flashdata('flash_failure', $this->lib_shops->strFlashMessage);
            redirect($this->config->item('shops_index_uri'));
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
            // Get shop by ID
            $arrData['objShop'] = $objShop = $this->lib_shops->getShopByID($nID);

            // Get shop types list
            $arrData['arrShopTypes'] = $this->lib_shop_types->getShopTypesList();

            // Check status
            if (!$objShop)
            {
                $this->session->set_flashdata('flash_failure', $this->lib_shops->strFlashMessage);
                redirect($this->config->item('shops_index_uri'));
            }

            return $this->load->view($this->config->item('template_view'), $arrData);
        }

        /*// Set rules
        $this->form_validation->set_rules('image', 'Image', 'callback_file_upload[shops.image, 2]');

        // Run validation
        if($this->form_validation->run() == false) {

            $arrResult['success'] = false;
            $arrResult['validations'] = array();
            $arrResult['validations']['image'] = form_error('image', '<label class="error">', '</label>');

            echo json_encode($arrResult);
            return;
        }*/

        // Shop
        $arrShop = array(
            'name' => $this->input->post('name'),
            'address' => $this->input->post('address'),
            'latitude' => $this->input->post('latitude'),
            'longitude' => $this->input->post('longitude'),
            'last_evaluation' => $this->input->post('last_evaluation'),
            'shop_type_id' => $this->input->post('shop_type_id'),
            'acc_no' => $this->input->post('acc_no'),
            'email' => $this->input->post('email')
        );

        // Image
        $arrShop += ($this->input->post('image')) ? array('image' => $this->input->post('image')) : array();

        // Update shop
        $objResult = $this->lib_shops->updateShop($arrShop, $nID);

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
        // Delete shop
        $objResult = $this->lib_shops->deleteShop($nID);
        echo json_encode($objResult);
        return;
    }

    /**
     * ajax_get_shops_by_search method
     *
     * @param integer $nOffset
     * @return void
     */
    public function ajax_get_shops_by_search($nOffset = 1)
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

        // Get shops by search
        $arrData += $this->lib_shops->getShopsForPagination($nLimit, $nOffset, $strSearch);

        // Load Lib_Pagination library
        $this->load->library('Lib_Pagination');

        // Pagination
        $strBaseUrl = base_url($this->config->item('shops_ajax_get_shops_by_search_uri'));
        $nTotalRows = $arrData['nTotalRows'];
        $arrData['strPagination'] = $this->lib_pagination->pagination($strBaseUrl, $nTotalRows, $nLimit, 5, '?'.http_build_query($_GET, '', '&'));
        $arrData['nIsAjax'] = 1;

        // Result
        $arrResult = array(
            'result' => array(
                'success' => true,
                'view' => $this->load->view($this->config->item('shops_table_view'), $arrData, true),
                'pagination' => $this->load->view($this->config->item('pagination_view'), $arrData, true)
            )
        );

        echo json_encode($arrResult);
        return;
    }

/**
 * file_upload method
 *
 * @return void
 */
    public function file_upload($value, $field) 
    {
        return $this->form_validation->file_upload($value, $field);
    }
}

/* End of file shops.php */
/* Location: ./application/controllers/shops.php */

