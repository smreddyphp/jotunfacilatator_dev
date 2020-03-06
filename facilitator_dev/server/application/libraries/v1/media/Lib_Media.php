<?php defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH .'/libraries/v1/media/Media_Constants.php';

class Lib_Media
{
    /**
     * __construct method
     */
    function __construct() 
    {
        // CI
        $this->ci = &get_instance();

        // Load media config
        $this->ci->load->config('v1/media');

        // Load lang config
        $this->ci->lang->load('v1/media', $this->ci->lib_api->lang);

        // Load mediam model
        $this->ci->load->model('v1/mediam');
    }

    /**
     * addMedia method
     *
     * @param string[] $p_arrMedia
     * @return integer
     */
    public function addMedia($p_arrMedia)
    {
        return $this->ci->mediam->addMedia($p_arrMedia);
    }

    /**
     * updateMedia method
     *
     * @param string[] $p_arrMedia
     * @param integer $p_nID
     * @return boolean
     */
    public function updateMedia($p_arrMedia, $p_nID)
    {
        return $this->ci->mediam->updateMedia($p_arrMedia, $p_nID);
    }

     /**
     * checkMediaExistByID method
     *
     * @param integer $p_nID
     * @return object
     */
    public function checkMediaExistByID($p_nID)
    {
        return $this->ci->mediam->checkMediaExistByID($p_nID);
    }

    /**
     * getMediaByID method
     *
     * @param integer $p_nID
     * @return object
     */
    public function getMediaByID($p_nID)
    {
        return $this->ci->mediam->getMediaByID($p_nID);
    }

    /**
     * getMediaForPagination method
     *
     * @param integer $p_nLimit
     * @param integer $p_nOffset
     * @param integer $p_strSearch
     * @param integer $p_nStatus
     * @return object
     */
    public function getMediaForPagination($p_nLimit = NULL, $p_nOffset = NULL, $p_strSearch = NULL, $p_nStatus = NULL)
    {
        return $this->ci->mediam->getMediaForPagination($p_nLimit, $p_nOffset, $p_strSearch, $p_nStatus);
    }

    /**
     * getNoOfMedia method
     *
     * @param integer $p_strSearch
     * @param integer $p_nStatus
     * @return integer
     */
    public function getNoOfMedia($p_strSearch = NULL, $p_nStatus = NULL)
    {
        return $this->ci->mediam->getNoOfMedia($p_strSearch, $p_nStatus);
    }

    /**
     * deleteMedia method
     *
     * @param integer $p_nID
     * @return boolean
     */
    public function deleteMedia($p_nID)
    {
        return $this->ci->mediam->deleteMedia($p_nID);
    }
}

/* End of file lib_media.php */
/* Location: ./application/libraries/v1/media/lib_media.php */