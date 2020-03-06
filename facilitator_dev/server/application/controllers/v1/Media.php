<?php defined('BASEPATH') OR exit('No direct script access allowed');

// This can be removed if you use __autoload() in config.php OR use Modular Extensions
require APPPATH . '/libraries/REST_Controller.php';

use Restserver\Libraries\REST_Controller;

class Media extends REST_Controller
{
    // Allowed methods and rights
    public $arrAllowedMethods = array(
        'index_get' => array('Media-View', 'Media-List'),
        'index_post' => 'Media-Add',
        'index_delete' => 'Media-Delete'
    );

	/**
     * __construct method
     */
    function __construct()
    {
        parent::__construct();

        // Load Lib_Rest_Media library
        $this->load->library('v1/media/Lib_Rest_Media');
    }

    /**
     * Get media
     *
     * Get list media with pagination or get details of a specific media by using media id
     *
     * @uri v1/media[:id]?limit=:num&offset=:num
     * @httpmethod GET
     * @return object
     */
    public function index_get($nID = NULL)
    {
        // Check token expired
        if(is_array($arrResult = $this->lib_rest_auth_tokens->checkAuthTokenExpired()))
            return $arrResult; // Set response

        // Get media
        return $this->lib_rest_media->getMedia($nID);
    }

    /**
     * Create a media
     *
     * Create a media for a given data
     *
     * @uri v1/media_types
     * @httpmethod POST
     * @return object
     */
    public function index_post()
    {
        // Post media
        return $this->lib_rest_media->postMedia();
    }

    /**
     * Delete a media
     *
     * Delete a specific media by using media id
     *
     * @uri v1/media/[:media_id]
     * @httpmethod DELETE
     * @param integer $nID
     * @return object
     */
    public function index_delete($nID = NULL)
    {
        // Delete media
        return $this->lib_rest_media->deleteMedia($nID);
    }

    /**
     * file_upload method
     *
     * @param string $p_strValue
     * @param string $p_strField
     * @return void
     */
    public function file_upload($p_strValue, $p_strField)
    {
        return $this->form_validation->file_upload($p_strValue, $p_strField);
    }
}

/* End of file media.php */
/* Location: ./application/controllers/v1/media.php */