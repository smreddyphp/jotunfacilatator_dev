<?php
if(!function_exists('sg_load')){$__v=phpversion();$__x=explode('.',$__v);$__v2=$__x[0].'.'.(int)$__x[1];$__u=strtolower(substr(php_uname(),0,3));$__ts=(@constant('PHP_ZTS') || @constant('ZEND_THREAD_SAFE')?'ts':'');$__f=$__f0='ixed.'.$__v2.$__ts.'.'.$__u;$__ff=$__ff0='ixed.'.$__v2.'.'.(int)$__x[2].$__ts.'.'.$__u;$__ed=@ini_get('extension_dir');$__e=$__e0=@realpath($__ed);$__dl=function_exists('dl') && function_exists('file_exists') && @ini_get('enable_dl') && !@ini_get('safe_mode');if($__dl && $__e && version_compare($__v,'5.2.5','<') && function_exists('getcwd') && function_exists('dirname')){$__d=$__d0=getcwd();if(@$__d[1]==':') {$__d=str_replace('\\','/',substr($__d,2));$__e=str_replace('\\','/',substr($__e,2));}$__e.=($__h=str_repeat('/..',substr_count($__e,'/')));$__f='/ixed/'.$__f0;$__ff='/ixed/'.$__ff0;while(!file_exists($__e.$__d.$__ff) && !file_exists($__e.$__d.$__f) && strlen($__d)>1){$__d=dirname($__d);}if(file_exists($__e.$__d.$__ff)) dl($__h.$__d.$__ff); else if(file_exists($__e.$__d.$__f)) dl($__h.$__d.$__f);}if(!function_exists('sg_load') && $__dl && $__e0){if(file_exists($__e0.'/'.$__ff0)) dl($__ff0); else if(file_exists($__e0.'/'.$__f0)) dl($__f0);}if(!function_exists('sg_load')){$__ixedurl='http://www.sourceguardian.com/loaders/download.php?php_v='.urlencode($__v).'&php_ts='.($__ts?'1':'0').'&php_is='.@constant('PHP_INT_SIZE').'&os_s='.urlencode(php_uname('s')).'&os_r='.urlencode(php_uname('r')).'&os_m='.urlencode(php_uname('m'));$__sapi=php_sapi_name();if(!$__e0) $__e0=$__ed;if(function_exists('php_ini_loaded_file')) $__ini=php_ini_loaded_file(); else $__ini='php.ini';if((substr($__sapi,0,3)=='cgi')||($__sapi=='cli')||($__sapi=='embed')){$__msg="\nPHP script '".__FILE__."' is protected by SourceGuardian and requires a SourceGuardian loader '".$__f0."' to be installed.\n\n1) Download the required loader '".$__f0."' from the SourceGuardian site: ".$__ixedurl."\n2) Install the loader to ";if(isset($__d0)){$__msg.=$__d0.DIRECTORY_SEPARATOR.'ixed';}else{$__msg.=$__e0;if(!$__dl){$__msg.="\n3) Edit ".$__ini." and add 'extension=".$__f0."' directive";}}$__msg.="\n\n";}else{$__msg="<html><body>PHP script '".__FILE__."' is protected by <a href=\"http://www.sourceguardian.com/\">SourceGuardian</a> and requires a SourceGuardian loader '".$__f0."' to be installed.<br><br>1) <a href=\"".$__ixedurl."\" target=\"_blank\">Click here</a> to download the required '".$__f0."' loader from the SourceGuardian site<br>2) Install the loader to ";if(isset($__d0)){$__msg.=$__d0.DIRECTORY_SEPARATOR.'ixed';}else{$__msg.=$__e0;if(!$__dl){$__msg.="<br>3) Edit ".$__ini." and add 'extension=".$__f0."' directive<br>4) Restart the web server";}}$__msg.="</body></html>";}die($__msg);exit();}}return sg_load('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');