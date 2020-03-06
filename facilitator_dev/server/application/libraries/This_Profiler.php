<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class This_Profiler extends CI_Profiler
{
    /**
     * run method
     *
     *@return string[]
     */
    public function run()
    {
        return array(
            'dbqueries' => $this->_compile_queries(),
            'benchmarks' => $this->_compile_benchmarks(),
            'memoryUsed' => $this->_compile_memory_usage(),
            //'sessionData' => ,
        );
    }

    /**
     * _compile_queries Queries
     *
     * @return string[]
     */
    protected function _compile_queries()
    {
        // Database connections
        $arrDBs = array();

        // Let's determine which databases are currently connected to
        foreach (get_object_vars($this->CI) as $strDBName => $objDB)
        {
            if (is_object($objDB))
            {
                if ($objDB instanceof CI_DB)
                {
                    $arrDBs[get_class($this->CI).':$'.$strDBName] = $objDB;
                }
                elseif ($objDB instanceof CI_Model)
                {
                    foreach (get_object_vars($objDB) as $strModelName => $objModel)
                    {
                        if ($objModel instanceof CI_DB)
                        {
                            $arrDBs[get_class($cobject).':$'.$strModelName] = $objModel;
                        }
                    }
                }
            }
        }

        $nQueryCounter = 0;
        $nQueryTimesCounter = 0;
        $nTotalQueryCounter = 0;
        $arrDBQueries = array();
        $arrDBQueryTimes = array();

        foreach ($arrDBs as $strName => $objDB)
        {
            foreach($objDB->queries as $query)
            {
                $nQueryCounter++;
                $arrDBQueries["Query ".($nQueryCounter)] = $query;
            }

            foreach($objDB->query_times as $query_time)
            {
                $nQueryTimesCounter++;
                $arrDBQueryTimes["Query ".($nQueryTimesCounter)] = $query_time;
            }

            $nTotalQueryCounter = $nTotalQueryCounter + $objDB->query_count;
        }

        return array(
            'query_count' => $nTotalQueryCounter,
            'queries' => $arrDBQueries,
            'query_times' => $arrDBQueryTimes,
        );
    }

    /**
     * Auto Profiler
     *
     * This function cycles through the entire array of mark points and
     * matches any two points that are strNamed identically (ending in "_start"
     * and "_end" respectively).  It then compiles the execution times for
     * all points and returns it as an array
     *
     * @return string[]
     */
    protected function _compile_benchmarks()
    {
        $arrProfiles = array();
        foreach ($this->CI->benchmark->marker as $strKey => $val)
        {
            // We match the "end" marker so that the list ends
            // up in the order that it was defined
            if (preg_match('/(.+?)_end$/i', $strKey, $arrMatch)
                && isset($this->CI->benchmark->marker[$arrMatch[1].'_end'], $this->CI->benchmark->marker[$arrMatch[1].'_start']))
            {
                $arrProfiles[$arrMatch[1]] = $this->CI->benchmark->elapsed_time($arrMatch[1].'_start', $strKey);
            }
        }

        return $arrProfiles;
    }

    /**
     * Compile memory usage
     *
     * Display total used memory
     *
     * @return	string
     */
    protected function _compile_memory_usage()
    {
        // Memory usage
        $strUsage = memory_get_usage();
            
        return (($strUsage) ? number_format($strUsage) : 0).' bytes';
    }

    /**
     * Compile session userdata
     *
     * @return 	string
     */
    protected function _compile_session_data()
    {
        return (isset($this->CI->session)) ? $this->CI->session->userdata() : array();
    }
}

/* End of file This_Form_Validation.php */
/* Location: ./application/libraries/This_Form_Validation.php */