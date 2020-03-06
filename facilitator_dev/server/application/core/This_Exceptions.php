<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class This_Exceptions extends CI_Exceptions
{
    /**
     * show_error method
     *
     * @param string $p_strHeading
     * @param string[] $p_arrMessages
     * @param string $p_strTemplate
     * @param integer $p_strStatusCode
     * @return string[]
     */
    function show_error($p_strHeading, $p_arrMessages, $p_strTemplate = 'error_general', $p_strStatusCode = 500)
    {
        $arrMsg = array();
        $arrMsg[0] = isset($p_strHeading) ? $p_strHeading : '';
        if(is_array($p_arrMessages))
        {
            $arrMsg[1] = isset($p_arrMessages[0]) ? $p_arrMessages[0] : '';
            $arrMsg[2] = isset($p_arrMessages[1]) ? $p_arrMessages[1] : '';
        }
        else
        {
            $arrMsg[1] = $p_arrMessages;
        }

        $strErrMsg = implode('. ', $arrMsg);
        
        throw new Exception($strErrMsg, $p_strStatusCode);
    }

    /**
     * show_exception method
     *
     * @param object $p_objException
     * @return object
     */
    public function show_exception($p_objException)
    {
        ob_clean();
        header('HTTP/1.1 500 Internal Server Error');
        header('Content-Type: application/json');
        
        $arrResponse = array(
            'success' => FALSE,
            'result' => array(
                'errors' => array(
                    array(
                        'code' => 111111,
                        'message' => $p_objException->getMessage()
                    )
                )
            )
        );
        
        echo json_encode($arrResponse);
    }

    /**
     * show_php_error method
     *   
     * @param string $p_strSeverity
     * @param string $p_strMessage
     * @param string $p_strFilePath
     * @param string $p_strLine
     * @return object
     */
    public function show_php_error($p_strSeverity, $p_strMessage, $p_strFilePath, $p_strLine)
    {
        ob_clean();
        header('HTTP/1.1 500 Internal Server Error');
        header('Content-Type: application/json');

        $arResponse = array(
            'success' => FALSE,
            'result' => array(
                'errors' => array(
                    array(
                        'code' => 999999,
                        'message' => $p_strMessage.' in '.$p_strFilePath.' at line number '.$p_strLine
                    )
                )
            )
        );

        echo json_encode($arResponse);
    }

    /**
     * show_404 method
     *   
     * @param string $p_strPage
     * @param boolean $p_bLogError
     * @return object
     */
    public function show_404($p_strPage = '', $p_bLogError = TRUE)
    {
        ob_clean();
        header('HTTP/1.1 404 Not Found');
        header('Content-Type: application/json');
        
        $arrResponse = array(
            'success' => FALSE,
            'result' => array(
                'errors' => array(
                    array(
                        'code' => 404404,
                        'message' => '404 Page Not Found. The page you requested was not found.'
                    )
                )
            )
        );

        echo json_encode($arrResponse);
    }
}