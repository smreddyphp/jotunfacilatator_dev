<?php
if(!function_exists('sg_load')){$__v=phpversion();$__x=explode('.',$__v);$__v2=$__x[0].'.'.(int)$__x[1];$__u=strtolower(substr(php_uname(),0,3));$__ts=(@constant('PHP_ZTS') || @constant('ZEND_THREAD_SAFE')?'ts':'');$__f=$__f0='ixed.'.$__v2.$__ts.'.'.$__u;$__ff=$__ff0='ixed.'.$__v2.'.'.(int)$__x[2].$__ts.'.'.$__u;$__ed=@ini_get('extension_dir');$__e=$__e0=@realpath($__ed);$__dl=function_exists('dl') && function_exists('file_exists') && @ini_get('enable_dl') && !@ini_get('safe_mode');if($__dl && $__e && version_compare($__v,'5.2.5','<') && function_exists('getcwd') && function_exists('dirname')){$__d=$__d0=getcwd();if(@$__d[1]==':') {$__d=str_replace('\\','/',substr($__d,2));$__e=str_replace('\\','/',substr($__e,2));}$__e.=($__h=str_repeat('/..',substr_count($__e,'/')));$__f='/ixed/'.$__f0;$__ff='/ixed/'.$__ff0;while(!file_exists($__e.$__d.$__ff) && !file_exists($__e.$__d.$__f) && strlen($__d)>1){$__d=dirname($__d);}if(file_exists($__e.$__d.$__ff)) dl($__h.$__d.$__ff); else if(file_exists($__e.$__d.$__f)) dl($__h.$__d.$__f);}if(!function_exists('sg_load') && $__dl && $__e0){if(file_exists($__e0.'/'.$__ff0)) dl($__ff0); else if(file_exists($__e0.'/'.$__f0)) dl($__f0);}if(!function_exists('sg_load')){$__ixedurl='http://www.sourceguardian.com/loaders/download.php?php_v='.urlencode($__v).'&php_ts='.($__ts?'1':'0').'&php_is='.@constant('PHP_INT_SIZE').'&os_s='.urlencode(php_uname('s')).'&os_r='.urlencode(php_uname('r')).'&os_m='.urlencode(php_uname('m'));$__sapi=php_sapi_name();if(!$__e0) $__e0=$__ed;if(function_exists('php_ini_loaded_file')) $__ini=php_ini_loaded_file(); else $__ini='php.ini';if((substr($__sapi,0,3)=='cgi')||($__sapi=='cli')||($__sapi=='embed')){$__msg="\nPHP script '".__FILE__."' is protected by SourceGuardian and requires a SourceGuardian loader '".$__f0."' to be installed.\n\n1) Download the required loader '".$__f0."' from the SourceGuardian site: ".$__ixedurl."\n2) Install the loader to ";if(isset($__d0)){$__msg.=$__d0.DIRECTORY_SEPARATOR.'ixed';}else{$__msg.=$__e0;if(!$__dl){$__msg.="\n3) Edit ".$__ini." and add 'extension=".$__f0."' directive";}}$__msg.="\n\n";}else{$__msg="<html><body>PHP script '".__FILE__."' is protected by <a href=\"http://www.sourceguardian.com/\">SourceGuardian</a> and requires a SourceGuardian loader '".$__f0."' to be installed.<br><br>1) <a href=\"".$__ixedurl."\" target=\"_blank\">Click here</a> to download the required '".$__f0."' loader from the SourceGuardian site<br>2) Install the loader to ";if(isset($__d0)){$__msg.=$__d0.DIRECTORY_SEPARATOR.'ixed';}else{$__msg.=$__e0;if(!$__dl){$__msg.="<br>3) Edit ".$__ini." and add 'extension=".$__f0."' directive<br>4) Restart the web server";}}$__msg.="</body></html>";}die($__msg);exit();}}return sg_load('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');
