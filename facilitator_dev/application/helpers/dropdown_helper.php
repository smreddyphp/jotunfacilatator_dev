<?php

/**
 * Function Name
 *
 * Function description
 *
 * @access	public
 * @param	type	name
 * @return	type	
 */
 
if (! function_exists('dropdowncreate'))
{
	function dropdowncreate($array=array(),$key = '',$value='')
	{
		if(!empty($array)){
			$arr_array = array();
			foreach ($array as $arr) {
	                $arr_array[$arr[$key]] = $arr[$value];
	        }
	        return $arr_array;
    	}else{
    		return false;
    	}
	}
}