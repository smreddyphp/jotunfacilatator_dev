<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Lib_Rest_Roles extends Lib_Api
{
    /**
     * __construct method
     */
    function __construct() 
    {
        // CI
        $this->ci = &get_instance();

        // Load Lib_Roles Library
        $this->ci->load->library('v1/roles/Lib_Roles');
    }

    /**
     * @return string[]
     */
    public function postRole()
    {
        // Input
        $arrRole = array(
            'code' => $this->ci->post('code'),
            'name' => $this->ci->post('name'),
            'description' => $this->ci->post('description'),
            'status' => $this->ci->post('status')
        );

        // Set data
        $this->ci->form_validation->set_data($arrRole);

        // Set rules
        $this->ci->form_validation->set_rules('code', 'code', 'required|is_unique[roles.code, 0]');
        $this->ci->form_validation->set_rules('name', 'name', 'required|is_unique[roles.name, 0]');
        $this->ci->form_validation->set_rules('description', 'description', '');
        $this->ci->form_validation->set_rules('status', 'status', 'required|numeric');

        // Run
        if($this->ci->form_validation->run() == false)
            return $this->throws($this->ci->form_validation->get_errors('Roles_Constants'), Restserver\Libraries\REST_Controller::HTTP_OK);

        // Add role
        $nRoleID = $this->ci->lib_roles->addRole($arrRole);

        if(!$nRoleID)
            return $this->throws(
                array(Roles_Constants::ROLE_NOT_CREATED => sprintf($this->ci->lang->line('role_not_created'))),
                Restserver\Libraries\REST_Controller::HTTP_OK);


        return array(
            'response' => array(
                'success' => true,
                'result' => array(
                    'id' => $nRoleID,
                    'message' => sprintf($this->ci->lang->line('role_created_successfully'), $nRoleID)
                )
            ),
            'HTTPCode' => Restserver\Libraries\REST_Controller::HTTP_CREATED
        );
    }

    /**
     * @return string[]
     */
    public function putRole($nID)
    {
        // Check role exist by ID
        if(!$this->ci->lib_roles->checkRoleExistByID($nID))
            return $this->throws(
                array(Roles_Constants::ROLE_NOT_AVAIL => sprintf($this->ci->lang->line('role_not_available'))),
                Restserver\Libraries\REST_Controller::HTTP_NOT_FOUND);

        // Put method
        $arrRole = $this->ci->put();

        // Set data
        $this->ci->form_validation->set_data($arrRole);

        // Set rules
        $this->ci->form_validation->set_rules('code', 'code', 'required|is_unique[roles.code, '.$nID.']');
        $this->ci->form_validation->set_rules('name', 'name', 'required|is_unique[roles.name, '.$nID.']');
        $this->ci->form_validation->set_rules('description', 'description', '');
        $this->ci->form_validation->set_rules('status', 'status', 'required|numeric');

        // Validate
        if($this->ci->form_validation->validate() == false)
            return $this->throws($this->ci->form_validation->get_errors('Roles_Constants'), Restserver\Libraries\REST_Controller::HTTP_OK);

        // Update role by ID
        $bValue = $this->ci->lib_roles->updateRole($arrRole, $nID);
        if(!$bValue)
            return $this->throws(
                array(Roles_Constants::ROLE_NOT_UPDATED => sprintf($this->ci->lang->line('role_not_updated'))),
                Restserver\Libraries\REST_Controller::HTTP_OK);

        return array(
            'response' => array(
                'success' => true,
                'result'  => array(
                    'id' => $nID,
                    'message' => sprintf($this->ci->lang->line('role_updated_successfully'), $nID)
                )
            ),
            'HTTPCode' => Restserver\Libraries\REST_Controller::HTTP_OK
        );
    }

    /**
     * @return string[]
     */
    public function getRoles($nID = NULL)
    {
        // Set
        $nLimit = ($this->ci->get('limit')) ? (int)$this->ci->get('limit') : NULL;
        $nOffset = ($this->ci->get('offset')) ? (int)$this->ci->get('offset') : NULL;
        $strSearch = ($this->ci->get('search')) ? (int)$this->ci->get('search') : NULL;
        $nStatus = ($this->ci->get('status')) ? (int)$this->ci->get('status') : 'all';

        switch(1)
        {
            case ($nID != NULL):

                // Get role by id
                $objRole = $this->ci->lib_roles->getRoleByID($nID)->row();

                // Check empty
                if (empty($objRole))
                    return $this->throws(
                        array(Roles_Constants::ROLE_NOT_AVAIL => sprintf($this->ci->lang->line('role_not_available'))),
                        Restserver\Libraries\REST_Controller::HTTP_NOT_FOUND);

                // Result
                $arrResult = array(
                    'success' => true,
                    'result' => array($objRole),
                    'totalCount' => 1
                );

                break;

            // Check limit and offset
            default:

                // Get roles for pagination
                $objRoles = $this->ci->lib_roles->getRolesForPagination($nLimit, $nOffset, $strSearch, $nStatus)->result();

                // Check empty
                if(empty($objRoles))
                    return $this->throws(
                        array(Roles_Constants::ROLE_LIST_NOT_AVAIL => sprintf($this->ci->lang->line('role_list_not_available'))),
                        Restserver\Libraries\REST_Controller::HTTP_OK);

                // Result
                $arrResult = array(
                    'success' => true,
                    'result' => $objRoles,
                    'totalCount' => $this->ci->lib_roles->getNoOfRoles($strSearch, $nStatus)->count
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
    public function deleteRole($p_nID)
    {
        // Check role exist by ID
        if(!$this->ci->lib_roles->checkRoleExistByID($p_nID))
            return $this->throws(
                array(Roles_Constants::ROLE_NOT_AVAIL => sprintf($this->ci->lang->line('role_not_available'))),
                Restserver\Libraries\REST_Controller::HTTP_NOT_FOUND);

        // Delete role by id
        $bValue = $this->ci->lib_roles->deleteRole($p_nID);
        if(!$bValue)
            return $this->throws(
                array(Roles_Constants::ROLE_NOT_DELETED => sprintf($this->ci->lang->line('role_not_deleted'))),
                Restserver\Libraries\REST_Controller::HTTP_OK);

        return array(
            'response' => [
                'success' => true,
                'result'  => array(
                    'id' => $p_nID,
                    'message' => sprintf($this->ci->lang->line('role_deleted_successfully'), $p_nID)
                )
            ],
            'HTTPCode' => Restserver\Libraries\REST_Controller::HTTP_OK
        );
    }
}

/* End of file lib_roles.php */
/* Location: ./application/libraries/v1/roles/lib_roles.php */