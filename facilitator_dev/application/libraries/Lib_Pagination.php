<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Lib_Pagination
{
    /**
     * __construct
     */
    function __construct()
    {
        $this->ci = &get_instance();
    }

    /**
     * pagination
     *
     * @param string $strBaseUrl
     * @param integer $nTotalRows
     * @param integer $nPerPage
     * @param integer $nUriSegment
     * @param string $strSuffix
     * @return string
     */
    function pagination($strBaseUrl, $nTotalRows, $nPerPage, $nUriSegment, $strSuffix = null)
    {
        // Pagination config
        $arrPagination['first_link'] = 'First';
        $arrPagination['first_tag_open'] = '<li>';
        $arrPagination['first_tag_close'] = '</li>';

        $arrPagination['cur_tag_open'] = '<li class="active disabled"><a class="" href="#">';
        $arrPagination['cur_tag_close'] = '</a></li>';

        $arrPagination['prev_link'] = '&laquo;';
        $arrPagination['prev_tag_open'] = '<li>';
        $arrPagination['prev_tag_close'] = '</li>';

        $arrPagination['next_link'] = '&raquo;';
        $arrPagination['next_tag_open'] = '<li>';
        $arrPagination['next_tag_close'] = '</li>';

        $arrPagination['num_tag_open'] = '<li>';
        $arrPagination['num_tag_close'] = '</li>';

        $arrPagination['last_link'] = 'Last';
        $arrPagination['last_tag_open'] = '<li>';
        $arrPagination['last_tag_close'] = '</li>';

        // Pagination config
        $arrPagination['base_url'] = $strBaseUrl;
        $arrPagination['total_rows'] = $nTotalRows;
        $arrPagination['per_page'] = $nPerPage;
        $arrPagination['uri_segment'] = $nUriSegment;

        $arrPagination['use_page_numbers'] = TRUE;

        // Suffix
        $arrPagination += ($strSuffix != null) ? array('page_query_string' => true, 'enable_query_strings' => true, 'query_string_segment' => 'page', 'first_url' => $strBaseUrl, 'use_page_numbers' => true) : array();

        // Load pagination library
        $this->ci->load->library('pagination');

        // Initialize pagination
        $this->ci->pagination->initialize($arrPagination);

        return $this->ci->pagination->create_links();
    }
}

/* End of file Lib_Pagination.php */
/* Location: ./application/libraries/Lib_Pagination.php */