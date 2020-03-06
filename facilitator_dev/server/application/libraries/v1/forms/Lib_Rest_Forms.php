<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Lib_Rest_Forms extends Lib_Api
{
    /**
     * __construct method
     */
    function __construct() 
    {
        // CI
        $this->ci = &get_instance();

        // Load Lib_Forms Library
        $this->ci->load->library('v1/forms/Lib_Forms');
    }

    /**
     * @return string[]
     */
    public function postForm()
    {
        // Input
        $arrForm = array(
            'name' => $this->ci->post('name'),
            'description' => $this->ci->post('description'),
            'status' => $this->ci->post('status')
        );

        // Set data
        $this->ci->form_validation->set_data($arrForm);

        // Set rules
        $this->ci->form_validation->set_rules('name', 'name', 'required|is_unique[forms.name, 0]');
        $this->ci->form_validation->set_rules('description', 'description', '');
        $this->ci->form_validation->set_rules('status', 'status', 'required|numeric');

        // Run
        if($this->ci->form_validation->run() == false)
            return $this->throws($this->ci->form_validation->get_errors('Forms_Constants'), Restserver\Libraries\REST_Controller::HTTP_OK);

        // Add form
        $nFormID = $this->ci->lib_forms->addForm($arrForm);
        if(!$nFormID)
            return $this->throws(array(
                'code' => Forms_Constants::FORM_NOT_CREATED,
                'message' => $this->ci->lang->line('form_not_created')
            ), Restserver\Libraries\REST_Controller::HTTP_OK);

        return array(
            'response' => array(
                'result' => array(
                    'id' => $nFormID,
                    'message' => sprintf($this->ci->lang->line('form_created_successfully'), $nFormID)
                ),
                'success' => true,
            ),
            'HTTPCode' => Restserver\Libraries\REST_Controller::HTTP_CREATED
        );
    }

    /**
     * @param integer $p_nID
     * @return string[]
     */
    public function putForm($p_nID)
    {
        // Check form exist by ID
        if(!$this->ci->lib_forms->checkFormExistByID($p_nID))
            return $this->throws(
                array(Forms_Constants::FORM_NOT_AVAIL => sprintf($this->ci->lang->line('form_not_available'))),
                Restserver\Libraries\REST_Controller::HTTP_NOT_FOUND);

        // Put method
        $arrForm = $this->ci->put();

        // Set data
        $this->ci->form_validation->set_data($arrForm);

        // Set rules
        $this->ci->form_validation->set_rules('name', 'name', 'trim|required|is_unique[forms.name, '.$p_nID.']');
        $this->ci->form_validation->set_rules('description', 'description', 'trim');
        $this->ci->form_validation->set_rules('status', 'status', 'trim|required|numeric');

        // Validate
        if($this->ci->form_validation->validate() == false)
            return $this->throws($this->ci->form_validation->get_errors('Forms_Constants'), Restserver\Libraries\REST_Controller::HTTP_OK);

        // Update form by ID
        $bValue = $this->ci->lib_forms->updateForm($arrForm, $p_nID);
        if(!$bValue)
            return $this->throws(
                array(Forms_Constants::FORM_NOT_UPDATED => sprintf($this->ci->lang->line('form_not_updated'))),
                Restserver\Libraries\REST_Controller::HTTP_OK);


        return array(
            'response' => array(
                'success' => true,
                'result'  => array(
                    'id' => $p_nID,
                    'message' => $this->ci->lang->line('form_updated_successfully')
                )
            ),
            'HTTPCode' => Restserver\Libraries\REST_Controller::HTTP_OK
        );
    }

    /**
     * @return string[]
     */
    public function getForms($nID = NULL)
    {
        // Set
        $nLimit = ($this->ci->get('limit')) ? (int)$this->ci->get('limit') : NULL;
        $nOffset = ($this->ci->get('offset')) ? (int)$this->ci->get('offset') : NULL;
        $strSearch = ($this->ci->get('search')) ? (int)$this->ci->get('search') : NULL;
        $nStatus = ($this->ci->get('status')) ? (int)$this->ci->get('status') : 'all';

        switch(1)
        {
            case ($nID != NULL):

                // Get form by id
                $objForm = $this->ci->lib_forms->getFormByID($nID)->row();

                // Check empty
                if (empty($objForm))
                    return $this->throws(
                        array(Forms_Constants::FORM_NOT_AVAIL => sprintf($this->ci->lang->line('form_not_available'))),
                        Restserver\Libraries\REST_Controller::HTTP_NOT_FOUND);

                // Result
                return array(
                    'response' => array(
                        'success' => true,
                        'result' => array($objForm),
                        'totalCount' => 1
                    ),
                    'HTTPCode' => Restserver\Libraries\REST_Controller::HTTP_OK
                );

                break;

            // Check limit and offset
            default:

                // Get forms for pagination
                $objForms = $this->ci->lib_forms->getFormsForPagination($nLimit, $nOffset, $strSearch, $nStatus)->result();

                // Check empty
                if(empty($objForms))
                    return $this->throws(
                        array(Forms_Constants::FORM_LIST_NOT_AVAIL => sprintf($this->ci->lang->line('form_list_not_available'))),
                        Restserver\Libraries\REST_Controller::HTTP_OK);

                // Result
                return array(
                    'response' => array(
                        'result' => $objForms,
                        'totalCount' => $this->ci->lib_forms->getNoOfForms($strSearch, $nStatus)->count,
                        'success' => true
                    ),
                    'HTTPCode' => Restserver\Libraries\REST_Controller::HTTP_OK
                );

                break;
        }
    }

    /**
     * @return string[]
     */
    public function deleteForm($nID)
    {
        // Check form exist by ID
        if(!$this->ci->lib_forms->checkFormExistByID($nID))
            return $this->throws(
                array(Forms_Constants::FORM_NOT_AVAIL => sprintf($this->ci->lang->line('form_not_available'))),
                Restserver\Libraries\REST_Controller::HTTP_NOT_FOUND);

        // Delete form by id
        $bValue = $this->ci->lib_forms->deleteForm($nID);
        if(!$bValue)
            return $this->throws(
                array(Forms_Constants::FORM_NOT_DELETED => sprintf($this->ci->lang->line('form_not_deleted'))),
                Restserver\Libraries\REST_Controller::HTTP_OK);

        return array(
            'response' => [
                'success' => true,
                'result'  => array(
                    'id' => $nID,
                    'message' => sprintf($this->ci->lang->line('form_deleted_successfully'), $nID)
                )
            ],
            'HTTPCode' => Restserver\Libraries\REST_Controller::HTTP_OK
        );
    }
}

/* End of file lib_rest_forms.php */
/* Location: ./application/libraries/v1/forms/lib_rest_forms.php */