<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Lib_Rest_Designations extends Lib_Api
{
    /**
     * __construct method
     */
    function __construct() 
    {
        // CI
        $this->ci = &get_instance();

        // Load Lib_Designations Library
        $this->ci->load->library('v1/designations/Lib_Designations');
    }

    /**
     * @return string[]
     */
    public function postDesignation()
    {
        // Input
        $arrDesignation = array(
            'code' => $this->ci->post('code'),
            'name' => $this->ci->post('name'),
            'description' => $this->ci->post('description'),
            'status' => $this->ci->post('status'),
'created_by' => $this->ci->post('created_by')
        );

        // Set data
        $this->ci->form_validation->set_data($arrDesignation);

        // Set rules
        $this->ci->form_validation->set_rules('code', 'code', 'required|is_unique[designations.code, 0]');
        $this->ci->form_validation->set_rules('name', 'name', 'required|is_unique[designations.name, 0]');
        $this->ci->form_validation->set_rules('description', 'description', '');
        $this->ci->form_validation->set_rules('status', 'status', 'required|numeric');

        // Run
        /*if($this->ci->form_validation->run() == false)
            return $this->throws($this->ci->form_validation->get_errors('Designations_Constants'), Restserver\Libraries\REST_Controller::HTTP_OK);*/

        // Add designation
        $nDesignationID = $this->ci->lib_designations->addDesignation($arrDesignation);

        if(!$nDesignationID)
            return $this->throws(
                array(Designations_Constants::DESIGNATION_NOT_CREATED => sprintf($this->ci->lang->line('designation_not_created'))),
                Restserver\Libraries\REST_Controller::HTTP_OK);


        return array(
            'response' => array(
                'success' => true,
                'result' => array(
                    'id' => $nDesignationID,
                    'message' => sprintf($this->ci->lang->line('designation_created_successfully'), $nDesignationID)
                )
            ),
            'HTTPCode' => Restserver\Libraries\REST_Controller::HTTP_CREATED
        );
    }

    /**
     * @return string[]
     */
    public function putDesignation($nID)
    {
        // Check designation exist by ID
        if(!$this->ci->lib_designations->checkDesignationExistByID($nID))
            return $this->throws(
                array(Designations_Constants::DESIGNATION_NOT_AVAIL => sprintf($this->ci->lang->line('designation_not_available'))),
                Restserver\Libraries\REST_Controller::HTTP_NOT_FOUND);

        // Put method
        $arrDesignation = $this->ci->put();

        // Set data
        $this->ci->form_validation->set_data($arrDesignation);

        // Set rules
        $this->ci->form_validation->set_rules('code', 'code', 'required|is_unique[designations.code, '.$nID.']');
        $this->ci->form_validation->set_rules('name', 'name', 'required|is_unique[designations.name, '.$nID.']');
        $this->ci->form_validation->set_rules('description', 'description', '');
        $this->ci->form_validation->set_rules('status', 'status', 'required|numeric');

        // Validate
        if($this->ci->form_validation->validate() == false)
            return $this->throws($this->ci->form_validation->get_errors('Designations_Constants'), Restserver\Libraries\REST_Controller::HTTP_OK);

        // Update designation by ID
        $bValue = $this->ci->lib_designations->updateDesignation($arrDesignation, $nID);
        if(!$bValue)
            return $this->throws(
                array(Designations_Constants::DESIGNATION_NOT_UPDATED => sprintf($this->ci->lang->line('designation_not_updated'))),
                Restserver\Libraries\REST_Controller::HTTP_OK);

        return array(
            'response' => array(
                'success' => true,
                'result'  => array(
                    'id' => $nID,
                    'message' => sprintf($this->ci->lang->line('designation_updated_successfully'), $nID)
                )
            ),
            'HTTPCode' => Restserver\Libraries\REST_Controller::HTTP_OK
        );
    }

    /**
     * @return string[]
     */
    public function getDesignations($nID = NULL)
    {
        // Set
        $nLimit = ($this->ci->get('limit')) ? (int)$this->ci->get('limit') : NULL;
        $nOffset = ($this->ci->get('offset')) ? (int)$this->ci->get('offset') : NULL;
        $strSearch = ($this->ci->get('search')) ? (int)$this->ci->get('search') : NULL;
        $nStatus = ($this->ci->get('status')) ? (int)$this->ci->get('status') : 'all';

        switch(1)
        {
            case ($nID != NULL):

                // Get designation by id
                $objDesignation = $this->ci->lib_designations->getDesignationByID($nID)->row();

                // Check empty
                if (empty($objDesignation))
                    return $this->throws(
                        array(Designations_Constants::DESIGNATION_NOT_AVAIL => sprintf($this->ci->lang->line('designation_not_available'))),
                        Restserver\Libraries\REST_Controller::HTTP_NOT_FOUND);

                // Result
                $arrResult = array(
                    'success' => true,
                    'result' => array($objDesignation),
                    'totalCount' => 1
                );

                break;

            // Check limit and offset
            default:

                // Get designations for pagination
                $objDesignations = $this->ci->lib_designations->getDesignationsForPagination($nLimit, $nOffset, $strSearch, $nStatus)->result();

                // Check empty
                if(empty($objDesignations))
                    return $this->throws(
                        array(Designations_Constants::DESIGNATION_LIST_NOT_AVAIL => sprintf($this->ci->lang->line('designation_list_not_available'))),
                        Restserver\Libraries\REST_Controller::HTTP_OK);

                // Result
                $arrResult = array(
                    'success' => true,
                    'result' => $objDesignations,
                    'totalCount' => $this->ci->lib_designations->getNoOfDesignations($strSearch, $nStatus)->count
                );

                break;
        }

        return array(
            'response' => $arrResult,
            'HTTPCode' => Restserver\Libraries\REST_Controller::HTTP_OK
        );
    }

    /**
     * @param integer $p_nID
     * @return string[]
     */
    public function deleteDesignation($p_nID)
    {
        // Check designation exist by ID
        if(!$this->ci->lib_designations->checkDesignationExistByID($p_nID))
            return $this->throws(
                array(Designations_Constants::DESIGNATION_NOT_AVAIL => sprintf($this->ci->lang->line('designation_not_available'))),
                Restserver\Libraries\REST_Controller::HTTP_NOT_FOUND);

        // Delete designation by id
        $bValue = $this->ci->lib_designations->deleteDesignation($p_nID);
        if(!$bValue)
            return $this->throws(
                array(Designations_Constants::DESIGNATION_NOT_DELETED => sprintf($this->ci->lang->line('designation_not_deleted'))),
                Restserver\Libraries\REST_Controller::HTTP_OK);

        return array(
            'response' => [
                'success' => true,
                'result'  => array(
                    'id' => $p_nID,
                    'message' => sprintf($this->ci->lang->line('designation_deleted_successfully'), $p_nID)
                )
            ],
            'HTTPCode' => Restserver\Libraries\REST_Controller::HTTP_OK
        );
    }
}

/* End of file lib_designations.php */
/* Location: ./application/libraries/v1/designations/lib_designations.php */