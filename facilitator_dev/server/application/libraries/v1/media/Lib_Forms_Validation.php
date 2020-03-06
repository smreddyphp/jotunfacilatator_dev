<?php

class Lib_Forms_Validation
{
    public $arrRules;

    /**
     * __construct method
     */
    function __construct() 
    {
        // Rules
        $this->arrRules = array(
            'post' => array(
                array(
                    'field' => 'name',
                    'label' => 'name',
                    'rules' => 'required'
                ),
                array(
                        'field' => 'description',
                        'label' => 'description',
                        'rules' => 'required'
                ),
                array(
                        'field' => 'status',
                        'label' => 'status',
                        'rules' => 'required'
                )
            )
        );
    }

    /**
     * @return string[]
     */
    public function postForm()
    {
        
    }

    /**
     * @return string[]
     */
    public function putForm($nID)
    {
        // Input
        $arrForm = array(
            'name' => $this->ci->put('name'),
            'description' => $this->ci->put('description'),
            'status' => $this->ci->put('status')
        );

        // Check form exist by ID
        if(!$this->ci->lib_forms->checkFormExistByID($nID))
            return array(
                'response' => array(
                    'success' => false,
                    'result'  => array(
                        'errors' => array(
                            array(
                                'code' => Forms_Constants::FORM_NOT_AVAIL,
                                'message' => $this->ci->lang->line('form_not_available')
                            )
                        )
                    )
                ),
                'HTTPCode' => Restserver\Libraries\REST_Controller::HTTP_NOT_FOUND
            );

        // Update form by ID
        $bValue = $this->ci->lib_forms->updateForm($arrForm, $nID);
        if($bValue)
            return array(
                'response' => array(
                    'success' => true,
                    'result'  => array(
                        'id' => $nID,
                        'message' => $this->ci->lang->line('form_updated_successfully')
                    )
                ),
                'HTTPCode' => Restserver\Libraries\REST_Controller::HTTP_OK
            );

        return array(
            'response' => array(
                'success' => false,
                'result'  => array(
                    'errors' => array(
                        array(
                            'code' => Forms_Constants::FORM_NOT_UPDATED,
                            'message' => $this->ci->lang->line('form_not_updated')
                        )
                    )
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
                    return array(
                        'response' => array(
                            'result' => array(
                                'errors' => array(
                                    array(
                                        'code' => Forms_Constants::SERVICE_NOT_AVAIL,
                                        'message' => $this->ci->lang->line('form_not_available')
                                    )
                                )
                            ),
                            'success' => false
                        ),
                        'HTTPCode' => Restserver\Libraries\REST_Controller::HTTP_NOT_FOUND
                    );

                // Result
                return array(
                    'response' => array(
                        'result' => array($objForm),
                        'totalCount' => 1,
                        'success' => true
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
                    return array(
                        'response' => array(
                            'success' => false,
                            'result'  => array(
                                'errors' => array(
                                    array(
                                        'code' => Forms_Constants::SERVICE_LIST_NOT_AVAIL,
                                        'message' => $this->ci->lang->line('form_list_not_available')
                                    )
                                )
                            )
                        ),
                        'HTTPCode' => Restserver\Libraries\REST_Controller::HTTP_OK
                    );

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
    public function deleteForm($nID = NULL)
    {
        // Check form exist by ID
        if(!$this->ci->lib_forms->checkFormExistByID($nID))
            return array(
            'response' => array(
                'success' => false,
                'result'  => array(
                    'errors' => array(
                        array(
                            'code' => Forms_Constants::SERVICE_NOT_AVAIL,
                            'message' => $this->ci->lang->line('form_not_available')
                        )
                    )
                )
            ),
            'HTTPCode' => Restserver\Libraries\REST_Controller::HTTP_NOT_FOUND
        );

        // Delete form by id
        $bValue = $this->ci->lib_forms->deleteForm($nID);
        if($bValue)
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

        return array(
            'response' => array(
                'success' => false,
                'result'  => array(
                    'errors' => array(
                        array(
                            'code' => Forms_Constants::SERVICE_NOT_DELETED,
                            'message' => $this->ci->lang->line('form_not_deleted')
                        )
                    )
                )
            ),
            'HTTPCode' => Restserver\Libraries\REST_Controller::HTTP_NOT_FOUND
        );
    }
}

/* End of file lib_rest_forms.php */
/* Location: ./application/libraries/v1/forms/lib_rest_forms.php */