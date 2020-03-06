<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Lib_Rest_Media extends Lib_Api
{
    /**
     * __construct method
     */
    function __construct() 
    {
        // CI
        $this->ci = &get_instance();

        // Load Lib_Media Library
        $this->ci->load->library('v1/media/Lib_Media');
    }

    /**
     * @return string[]
     */
    public function postMedia()
    {
        // isset || empty
        if(!isset($_FILES) || empty($_FILES))
            return $this->throws(array(),
                Restserver\Libraries\REST_Controller::HTTP_OK);

        // Loop
        $arrNewFiles = array();

        // Loop
        foreach($_FILES as $nKey => $arrFiles)
        {
            if(is_array($arrFiles))
            {
                foreach($arrFiles as $nKey1 => $arrFile)
                {
                    if(is_array($arrFile))
                    {
                        foreach($arrFile as $nKey2 => $strFile)
                            $arrNewFiles['file'.(1+$nKey2)] = array(
                                'name' => $_FILES[$nKey]['name'][$nKey2],
                                'type' => $_FILES[$nKey]['type'][$nKey2],
                                'tmp_name' => $_FILES[$nKey]['tmp_name'][$nKey2],
                                'error' => $_FILES[$nKey]['error'][$nKey2],
                                'size' => $_FILES[$nKey]['size'][$nKey2]
                            );
                    }
                    else
                    {
                        $arrNewFiles[$nKey] = $arrFiles;
                    }
                }
            }
        }

        // Result
        $arrResults = array();

        // Loop
        foreach($arrNewFiles as $strKey => $arrFile)
        {
            // Set
            $_FILES = array();
            $_FILES[$strKey] = $arrFile;

            // Set rules
            $this->ci->form_validation->set_rules($strKey, $strKey, 'callback_file_upload[media.'.$strKey.', 1]');

            // Run
            if($this->ci->form_validation->run() == false)
                $arrResults[$strKey] = array(
                    'success' => false,
                    'result' => array(
                        'errors' => $this->ci->form_validation->get_errors('Media_Constants')
                    )
                );

            // Media
            $arrMedia = array(
                'code' => $_POST[$strKey.'_code'],
                'key' => $_POST[$strKey.'_key'],
                'name' => $_POST[$strKey],
                'type' => $_POST[$strKey.'_type'],
                'ext' => $_POST[$strKey.'_ext'],
                'size' => $_POST[$strKey.'_size'],
                'auth_token' => $this->ci->input->server('HTTP_P_AUTH_TOKEN')
            );

            // Add media
            $nMediaID = $this->ci->lib_media->addMedia($arrMedia);

            if(!$nMediaID)
                $arrResults[$strKey] = array(
                    'success' => false,
                    'result' => array(
                        'errors' => array(
                            'code' => Media_Constants::MEDIA_NOT_CREATED,
                            'message' => $this->ci->lang->line('media_not_created')
                        )
                    )
                );

            $arrResults[$strKey] = array(
                'success' => true,
                'result' => array(
                    'id' => $nMediaID,
                    'key' => $arrMedia['key'],
                    'message' => sprintf($this->ci->lang->line('form_created_successfully'), $nMediaID)
                )
            );
        }

        return array(
            'response' => array(
                'success' => true,
                'result' => $arrResults
            ),
            'HTTPCode' => Restserver\Libraries\REST_Controller::HTTP_CREATED
        );
    }

    /**
     * @return string[]
     */
    public function getMedia($nID = NULL)
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
                $objMedia = $this->ci->lib_media->getMediaByID($nID)->row();

                // Check empty
                if (empty($objMedia))
                    return $this->throws(
                        array(Media_Constants::MEDIA_NOT_AVAIL => sprintf($this->ci->lang->line('media_not_available'))),
                        Restserver\Libraries\REST_Controller::HTTP_NOT_FOUND);

                // Result
                return array(
                    'response' => array(
                        'result' => array($objMedia),
                        'totalCount' => 1,
                        'success' => true
                    ),
                    'HTTPCode' => Restserver\Libraries\REST_Controller::HTTP_OK
                );

                break;

            // Check limit and offset
            default:

                // Get media for pagination
                $objMedia = $this->ci->lib_media->getMediaForPagination($nLimit, $nOffset, $strSearch, $nStatus)->result();

                // Check empty
                if(empty($objMedia))
                    return $this->throws(
                        array(Media_Constants::MEDIA_LIST_NOT_AVAIL => sprintf($this->ci->lang->line('media_list_not_available'))),
                        Restserver\Libraries\REST_Controller::HTTP_OK);

                // Result
                return array(
                    'response' => array(
                        'result' => $objMedia,
                        'totalCount' => $this->ci->lib_media->getNoOfMedia($strSearch, $nStatus)->count,
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
    public function deleteMedia($nID = NULL)
    {
        // Check form exist by ID
        if(!$this->ci->lib_media->checkMediaExistByID($nID))
            return $this->throws(
                array(Media_Constants::MEDIA_NOT_AVAIL => sprintf($this->ci->lang->line('media_not_available'))),
                Restserver\Libraries\REST_Controller::HTTP_NOT_FOUND);

        // Delete form by id
        $bValue = $this->ci->lib_media->deleteMedia($nID);
        if(!$bValue)
            $this->throws(
                array(Media_Constants::MEDIA_NOT_DELETED => sprintf($this->ci->lang->line('media_not_deleted'))),
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

/* End of file lib_rest_media.php */
/* Location: ./application/libraries/v1/media/lib_rest_media.php */