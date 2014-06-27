<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
if ( ! function_exists('root')){
    function root(){
            $root = "http://".$_SERVER['HTTP_HOST'];
            $root .= str_replace(basename($_SERVER['SCRIPT_NAME']),"",$_SERVER['SCRIPT_NAME']);
            return $root;
    }
}

<<<<<<< HEAD
if ( ! function_exists('getBrowser')){
        function getBrowser() {
=======
if ( ! function_exists('root2')){
    function root2(){
            $_assets ="";
            $_assets .= "../../";
            return $_assets;
    }
}

if ( ! function_exists('root3')){
    function root3(){
            $_assets ="";
            $_assets .= "../../../";
            return $_assets;
    }
}

if ( ! function_exists('assets')){
    function assets(){
            $_assets ="";
            $_assets .= root()."_asset/";
            return $_assets;
    }
}

if ( ! function_exists('fancybox')){
    function fancybox(){
            $_assets ="";
            $_assets .= root()."_source/fancybox/";
            return $_assets;
    }
}

if ( ! function_exists('form_harga')){
    function form_harga(){
            $_assets ="";
            $_assets .= root()."_source/form_harga/";
            return $_assets;
    }
}

if ( ! function_exists('auto')){
    function auto(){
            $_assets ="";
            $_assets .= root()."_source/auto/";
            return $_assets;
    }
}

if ( ! function_exists('ui')){
    function ui(){
            $_assets ="";
            $_assets .= root()."_source/ui/";
            return $_assets;
    }
}

if ( ! function_exists('datepick')){
    function datepick(){
            $_assets ="";
            $_assets .= root()."_source/datepick/";
            return $_assets;
    }
}

if ( ! function_exists('icon')){
    function icon(){
            $_assets ="";
            $_assets .= root()."files/icon/";
            return $_assets;
    }
}

if ( ! function_exists('romawi')){
    function romawi($bulan){
            if($bulan=='01')
			{
				$bulan2='I';
			}
			elseif($bulan=='02')
			{
				$bulan2='II';
			}
			elseif($bulan=='03')
			{
				$bulan2='III';
			}
			elseif($bulan=='04')
			{
				$bulan2='IV';
			}
			elseif($bulan=='05')
			{
				$bulan2='V';
			}
			elseif($bulan=='06')
			{
				$bulan2='VI';
			}
			elseif($bulan=='07')
			{
				$bulan2='VII';
			}
			elseif($bulan=='08')
			{
				$bulan2='VIII';
			}
			elseif($bulan=='09')
			{
				$bulan2='IX';
			}
			elseif($bulan=='10')
			{
				$bulan2='X';
			}
			elseif($bulan=='11')
			{
				$bulan2='XI';
			}
			elseif($bulan=='12')
			{
				$bulan2='XII';
			}
            return $bulan2;
    }
}

if ( ! function_exists('tanggal_format_indonesia')){
    function tanggal_format_indonesia($tgl){
	$tanggal = substr($tgl,8,2);
	$bulan = getBulan(substr($tgl,5,2));
	$tahun = substr($tgl,0,4);
	return $tanggal.' '.$bulan.' '.$tahun;
	}
	function getBulan($bln){
	switch ($bln){
	case 1:
	return "Januari";
	break;
	case 2:
	return "Februari";
	break;
	case 3:
	return "Maret";
	break;
	case 4:
	return "April";
	break;
	case 5:
	return "Mei";
	break;
	case 6:
	return "Juni";
	break;
	case 7:
	return "Juli";
	break;
	case 8:
	return "Agustus";
	break;
	case 9:
	return "September";
	break;
	case 10:
	return "Oktober";
	break;
	case 11:
	return "November";
	break;
	case 12:
	return "Desember";
	break;
	}
	}
}

if ( ! function_exists('myurl')){
    function myurl($str, $separator = 'dash', $lowercase = TRUE){
            if ($separator == 'dash')
        {
            $search        = '_';
            $replace    = '-';
        }
        else
        {
            $search        = '-';
            $replace    = '_';
        }
        $trans = array(
                        '&\#\d+?;'            => '',
                        '&\S+?;'            => '',
                        '\s+'                => $replace,
                        '[^a-z0-9\-\._]'        => '',
                        $replace.'+'            => $replace,
                        $replace.'$'            => $replace,
                        '^'.$replace            => $replace,
                        '\.+$'                => ''
                      );

        $str = strip_tags($str);
        foreach ($trans as $key => $val)
        {
            $str = preg_replace("#".$key."#i", $val, $str);
        }
        if ($lowercase === TRUE)
        {
            $str = strtolower($str);
        }
        return trim(stripslashes($str));
    }
}

if ( ! function_exists('curPageURL')){
    function curPageURL() {
         $pageURL = 'http';
         $pageURL .= "://";
         $pageURL .= $_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
        
         return $pageURL;
    }
}

if ( ! function_exists('tiny')){
    function tiny() {
       $output ='';
       $output .='
        <!-- TinyMCE -->
            <script language="javascript" type="text/javascript" src="'.source().'tiny/tiny_mce.js"></script>
            <script language="javascript" type="text/javascript">
                    tinyMCE.init({
                            mode : "textareas",
                            theme : "advanced",
                            plugins : "table,save,advhr,advimage,advlink,emotions,iespell,insertdatetime,preview,zoom,flash,searchreplace,print,paste,directionality,fullscreen,noneditable,contextmenu",
                            theme_advanced_buttons1_add_before : "save,newdocument,separator",
                            theme_advanced_buttons1_add : "fontselect,fontsizeselect",
                            theme_advanced_buttons2_add : "separator,insertdate,inserttime,preview,zoom,separator,forecolor,backcolor,liststyle",
                            theme_advanced_buttons2_add_before: "cut,copy,paste,pastetext,pasteword,separator,search,replace,separator",
                            theme_advanced_buttons3_add_before : "tablecontrols,separator",
                            theme_advanced_buttons3_add : "emotions,iespell,flash,advhr,separator,print,separator,ltr,rtl,separator",
                            theme_advanced_toolbar_location : "top",
                            theme_advanced_toolbar_align : "center",
                            theme_advanced_statusbar_location : "bottom",
                            plugin_insertdate_dateFormat : "%Y-%m-%d",
                            plugin_insertdate_timeFormat : "%H:%M:%S",
                            extended_valid_elements : "hr[class|width|size|noshade]",
                            file_browser_callback : "fileBrowserCallBack",
                            paste_use_dialog : false,
                            theme_advanced_resizing : true,
                            theme_advanced_resize_horizontal : false,
                            theme_advanced_link_targets : "_something=My somthing;_something2=My somthing2;_something3=My somthing3;",
                            apply_source_formatting : true
                    });

                    function fileBrowserCallBack(field_name, url, type, win) {
                            var connector = "'.source().'tiny/filemanager/browser.html?Connector=connectors/php/connector.php";
                            var enableAutoTypeSelection = true;

                            var cType;
                            tinyfck_field = field_name;
                            tinyfck = win;

                            switch (type) {
                                    case "image":
                                            cType = "Image";
                                            break;
                                    case "flash":
                                            cType = "Flash";
                                            break;
                                    case "file":
                                            cType = "File";
                                            break;
                            }

                            if (enableAutoTypeSelection && cType) {
                                    connector += "&Type=" + cType;
                            }

                            window.open(connector, "tinyfck", "modal,width=600,height=400");
                    }
            </script>
            <!-- /TinyMCE -->
        ';
       return $output;
    }
}

if ( ! function_exists('tiny_simple')){
    function tiny_simple() {
       $output ='';
       $output .='
        <!-- TinyMCE -->
            <script language="javascript" type="text/javascript" src="'.source().'tiny/tiny_mce.js"></script>
            <script language="javascript" type="text/javascript">
                    tinyMCE.init({
                            mode : "textareas",
                            theme : "advanced",
                            plugins : "table,save,advhr,advimage,advlink,emotions,iespell,insertdatetime,preview,zoom,flash,searchreplace,print,paste,directionality,fullscreen,noneditable,contextmenu",
                            theme_advanced_buttons1_add_before : "save,newdocument,separator",
                            theme_advanced_buttons1_add : "fontselect,fontsizeselect",
                            theme_advanced_buttons2_add : "separator,insertdate,inserttime,preview,zoom,separator,forecolor,backcolor,liststyle",
                            theme_advanced_buttons2_add_before: "cut,copy,paste,pastetext,pasteword,separator,search,replace,separator",
                            theme_advanced_buttons3_add_before : "tablecontrols,separator",
                            theme_advanced_buttons3_add : "emotions,iespell,flash,advhr,separator,print,separator,ltr,rtl,separator",
                            theme_advanced_toolbar_location : "top",
                            theme_advanced_toolbar_align : "left",
                            theme_advanced_statusbar_location : "bottom",
                            plugin_insertdate_dateFormat : "%Y-%m-%d",
                            plugin_insertdate_timeFormat : "%H:%M:%S",
                            extended_valid_elements : "hr[class|width|size|noshade]",
                            file_browser_callback : "fileBrowserCallBack",
                            paste_use_dialog : false,
                            theme_advanced_resizing : true,
                            theme_advanced_resize_horizontal : false,
                            theme_advanced_link_targets : "_something=My somthing;_something2=My somthing2;_something3=My somthing3;",
                            apply_source_formatting : true
                    });

                    function fileBrowserCallBack(field_name, url, type, win) {
                            var connector = "'.source().'tiny/filemanager/browser.html?Connector=connectors/php/connector.php";
                            var enableAutoTypeSelection = true;

                            var cType;
                            tinyfck_field = field_name;
                            tinyfck = win;

                            switch (type) {
                                    case "image":
                                            cType = "Image";
                                            break;
                                    case "flash":
                                            cType = "Flash";
                                            break;
                                    case "file":
                                            cType = "File";
                                            break;
                            }

                            if (enableAutoTypeSelection && cType) {
                                    connector += "&Type=" + cType;
                            }

                            window.open(connector, "tinyfck", "modal,width=600,height=400");
                    }
            </script>
            <!-- /TinyMCE -->
        ';

       return $output;
    }
}


if ( ! function_exists('getBrowser')){
        function getBrowser()
    {
>>>>>>> 31ee3d139fbb0c2633ae4d66276a4d8f2bc3bfff
        $u_agent = $_SERVER['HTTP_USER_AGENT'];
        $bname = 'Unknown';
        $platform = 'Unknown';
        $version= "";

        //First get the platform?
        if (preg_match('/linux/i', $u_agent)) {
            $platform = 'linux';
        }
        elseif (preg_match('/macintosh|mac os x/i', $u_agent)) {
            $platform = 'mac';
        }
        elseif (preg_match('/windows|win32/i', $u_agent)) {
            $platform = 'windows';
        }
       
        // Next get the name of the useragent yes seperately and for good reason
        if(preg_match('/MSIE/i',$u_agent) && !preg_match('/Opera/i',$u_agent))
        {
            $bname = 'Internet Explorer';
            $ub = "MSIE";
        }
        elseif(preg_match('/Firefox/i',$u_agent))
        {
            $bname = 'Mozilla Firefox';
            $ub = "Firefox";
        }
        elseif(preg_match('/Chrome/i',$u_agent))
        {
            $bname = 'Google Chrome';
            $ub = "Chrome";
        }
        elseif(preg_match('/Safari/i',$u_agent))
        {
            $bname = 'Apple Safari';
            $ub = "Safari";
        }
        elseif(preg_match('/Opera/i',$u_agent))
        {
            $bname = 'Opera';
            $ub = "Opera";
        }
        elseif(preg_match('/Netscape/i',$u_agent))
        {
            $bname = 'Netscape';
            $ub = "Netscape";
        }
       
        // finally get the correct version number
        $known = array('Version', $ub, 'other');
        $pattern = '#(?<browser>' . join('|', $known) .
        ')[/ ]+(?<version>[0-9.|a-zA-Z.]*)#';
        if (!preg_match_all($pattern, $u_agent, $matches)) {
            // we have no matching number just continue
        }
       
        // see how many we have
        $i = count($matches['browser']);
        if ($i != 1) {
            //we will have two since we are not using 'other' argument yet
            //see if version is before or after the name
            if (strripos($u_agent,"Version") < strripos($u_agent,$ub)){
                $version= $matches['version'][0];
            }
            else {
                $version= $matches['version'][1];
            }
        }
        else {
            $version= $matches['version'][0];
        }
       
        // check if we have a number
        if ($version==null || $version=="") {$version="?";}
       
        return array(
            'userAgent' => $u_agent,
            'name'      => $bname,
            'version'   => $version,
            'platform'  => $platform,
            'pattern'    => $pattern
        );
    }
	
<<<<<<< HEAD
	function encrypt($stringArray, $key = "rKjH1g7GZPVj4CaZx1RjAL5xKFFNUVx8") {
=======
	function convertTgl($date)
	{
		$explode = explode('/',$date);
		$tgl = $explode[0];
		$bln = $explode[1];
		$thn = $explode[2];
		$dates = $bln.'/'.$tgl.'/'.$thn;
		return $dates;
	}
	
	function convertTgl2($date)
	{
		$explode = explode('-',$date);
		$tgl = $explode[2];
		$bln = $explode[1];
		$thn = $explode[0];
		$dates = $tgl.'/'.$bln.'/'.$thn;
		return $dates;
	}
	
	function encrypt($stringArray, $key = "ed45rtfg") 
	{
>>>>>>> 31ee3d139fbb0c2633ae4d66276a4d8f2bc3bfff
		 $s = base64_encode(strtr(base64_encode(mcrypt_encrypt(MCRYPT_RIJNDAEL_256, md5($key), serialize($stringArray), MCRYPT_MODE_CBC, md5(md5($key)))), '+/=', '-_,'));
		 return $s;
	}
	
<<<<<<< HEAD
	function decrypt($stringArray, $key = "rKjH1g7GZPVj4CaZx1RjAL5xKFFNUVx8") {
=======
	function decrypt($stringArray, $key = "ed45rtfg") {
>>>>>>> 31ee3d139fbb0c2633ae4d66276a4d8f2bc3bfff
		$a = base64_decode($stringArray);
		$s = unserialize(rtrim(mcrypt_decrypt(MCRYPT_RIJNDAEL_256, md5($key), base64_decode(strtr($a, '-_,', '+/=')), MCRYPT_MODE_CBC, md5(md5($key))), "\0"));
		if($s===FALSE)
		{
			redirect('error_page');
		}
		else
		{
			return $s;
		}
	}
	
<<<<<<< HEAD
	function dateDb() {
		$timezone = "Asia/Jakarta";
		if(function_exists('date_default_timezone_set')) date_default_timezone_set($timezone);
		$date = date('Y-m-d H:i:s');	
		return $date;
	}
	
}

=======
	function encrypt_key($stringArray, $key) 
	{
		 $s = base64_encode(strtr(base64_encode(mcrypt_encrypt(MCRYPT_RIJNDAEL_256, md5($key), serialize($stringArray), MCRYPT_MODE_CBC, md5(md5($key)))), '+/=', '-_,'));
		 return $s;
	}
	
	function decrypt_key($stringArray, $key) {
		$a = base64_decode($stringArray);
		$s = unserialize(rtrim(mcrypt_decrypt(MCRYPT_RIJNDAEL_256, md5($key), base64_decode(strtr($a, '-_,', '+/=')), MCRYPT_MODE_CBC, md5(md5($key))), "\0"));
		if($s===FALSE)
		{
			//redirect('error_page');
                        return 'err';
		}
		else
		{
			return $s;
		}
	}
	
	function encrypts($text,$key = "E4HD9h4DhS23DYfhHemkS3Nf",$iv = "fYfhHeDm",$bit_check = 8) 
	{
		$text_num =str_split($text,$bit_check);
		$text_num = $bit_check-strlen($text_num[count($text_num)-1]);
		for ($i=0;$i<$text_num; $i++) {$text = $text . chr($text_num);}
		$cipher = mcrypt_module_open(MCRYPT_TRIPLEDES,'','cbc','');
		mcrypt_generic_init($cipher, $key, $iv);
		$decrypted = mcrypt_generic($cipher,$text);
		mcrypt_generic_deinit($cipher);
		return base64_encode($decrypted);
	}
	
	function decrypts($encrypted_text,$key = "E4HD9h4DhS23DYfhHemkS3Nf",$iv = "fYfhHeDm",$bit_check = 8)
	{
		$cipher = mcrypt_module_open(MCRYPT_TRIPLEDES,'','cbc','');
		mcrypt_generic_init($cipher, $key, $iv);
		$decrypted = mdecrypt_generic($cipher,base64_decode($encrypted_text));
		mcrypt_generic_deinit($cipher);
		$last_char=substr($decrypted,-1);
		for($i=0;$i<$bit_check-1; $i++){
			if(chr($i)==$last_char){
				$decrypted=substr($decrypted,0,strlen($decrypted)-$i);
				break;
			}
		}
		return $decrypted;
	}
	
	function encryptInvisible($value){
		   $key = 'SECUREKEY';
		   $text = $value;
		   $iv_size = mcrypt_get_iv_size(MCRYPT_RIJNDAEL_256, MCRYPT_MODE_ECB);
		   $iv = mcrypt_create_iv($iv_size, MCRYPT_RAND);
		   $crypttext = mcrypt_encrypt(MCRYPT_RIJNDAEL_256, $key, $text, MCRYPT_MODE_ECB, $iv);
		   return $crypttext;
	}
		
	function decryptInvisible($value){
		   $key = 'SECUREKEY';
		   $crypttext = $value;
		   $iv_size = mcrypt_get_iv_size(MCRYPT_RIJNDAEL_256, MCRYPT_MODE_ECB);
		   $iv = mcrypt_create_iv($iv_size, MCRYPT_RAND);
		   $decrypttext = mcrypt_decrypt(MCRYPT_RIJNDAEL_256, $key, $crypttext, MCRYPT_MODE_ECB, $iv);
		   return trim($decrypttext);
	}
	
	
	
	
	function uploadImages($path,$fieldname,$codecover)
	{
		$im = $_FILES[$fieldname]['name'];
		
		$a = strlen($im);
		$b = substr($im, $a-4, 4);
		$z = substr($im, $a-4, 4);
		
		//$arr = explode('.',$im);
//		// extentation
//		$b = $arr[1];
//		$z = $arr[1];
		//echo $b;
		if(strtoupper($b)=='.JPG' or strtoupper($b)=='.PNG' or strtoupper($b)=='.GIF' or strtoupper($b)=='JPEG' )
		{
			//echo "masuk";
			if(isset($_FILES[$fieldname]['name']) )
			{
				$codelenght = 10;
				$newcode_length = 1;
				$newcodecover= $codecover;
				while($newcode_length < $codelenght) 
				{
					$x=1;
					$y=3;
					$part = rand($x,$y);
					if($part==1){$a=48;$b=57;}  // Numbers
					if($part==2){$a=65;$b=90;}  // UpperCase
					if($part==3){$a=97;$b=122;} // LowerCase
					$code_part=chr(rand($a,$b));
					$newcode_length = $newcode_length + 1;
					$newcodecover = $newcodecover.$code_part;
				}
				$handlecover = new upload($_FILES[$fieldname]);
				if ($handlecover->uploaded) 
				{
					$handlecover->file_new_name_body   = $newcodecover;
					$handlecover->image_resize         = false;
					$handlecover->process('.'.$path);
					if ($handlecover->processed) 
					{
						$handlecover->file_new_name_body   = $newcodecover;
						$handlecover->image_resize         = true;
						$handlecover->image_ratio_crop     = true;
						$handlecover->image_x              = 200;
						$handlecover->image_y              = 200;
					}
					else 
					{
						echo 'error : ' . $handlecover->error;
					}
				}
			}
			else
			{
				$newcodecover = "";
			}
			if($newcodecover!='')
			{
				$image=$newcodecover;
				if(strtoupper($z)=='JPEG' )
				{
					$rename = $image.'.'.strtolower($z);
				}
				else
				{
					$rename = $image.strtolower($z);
				}
				$final =  $rename;
				smart_resize_image('.'.$path.'/'.$final,500,0,true); 
				return $final;
			}
			else
			{
				$final = '';
				return $final;	
			}
		}
		else 
		{
			$final = 'False';
			return $final;	
		}
	}
	
	function uploadFile($path,$fieldname,$codecover)
	{
		$im = $_FILES[$fieldname]['name'];
		$type = $_FILES[$fieldname]['type'];
	
		if($type=='application/vnd.openxmlformats-officedocument.spreadsheetml.sheet' || $type == 'application/vnd.ms-excel')
		{
			//echo "masuk";
			if(isset($_FILES[$fieldname]['name']) )
			{
				$codelenght = 10;
				$newcode_length = 1;
				$newcodecover= $codecover;
				while($newcode_length < $codelenght) 
				{
					$x=1;
					$y=3;
					$part = rand($x,$y);
					if($part==1){$a=48;$b=57;}  // Numbers
					if($part==2){$a=65;$b=90;}  // UpperCase
					if($part==3){$a=97;$b=122;} // LowerCase
					$code_part=chr(rand($a,$b));
					$newcode_length = $newcode_length + 1;
					$newcodecover = $newcodecover.$code_part;
				}
				
				$handlecover = new upload($_FILES[$fieldname]);
				
				if ($handlecover->uploaded) 
				{
					$handlecover->file_new_name_body   = $newcodecover;
					
					$handlecover->process('.'.$path);
					if ($handlecover->processed) 
					{
						$handlecover->file_new_name_body   = $newcodecover;
						
					}
					else 
					{
						echo 'error : ' . $handlecover->error;
					}
					return $newcodecover;	
				}
			}
			else
			{
				$newcodecover = "";
			}
			
			
		}
		else 
		{
			$final = 'False';
			return $final;	
		}
	}
	
	
	function uploadImages2($path,$fieldname,$codecover,$path2)
	{
		$im = $_FILES[$fieldname]['name'];
		
		$a = strlen($im);
		$b = substr($im, $a-4, 4);
		$z = substr($im, $a-4, 4);
		
		//$arr = explode('.',$im);
//		// extentation
//		$b = $arr[1];
//		$z = $arr[1];
		//echo $b;
		if(strtoupper($b)=='.JPG' or strtoupper($b)=='.PNG' or strtoupper($b)=='.GIF' or strtoupper($b)=='JPEG' )
		{
			//echo "masuk";
			if(isset($_FILES[$fieldname]['name']) )
			{
				$codelenght = 10;
				$newcode_length = 1;
				$newcodecover= $codecover;
				while($newcode_length < $codelenght) 
				{
					$x=1;
					$y=3;
					$part = rand($x,$y);
					if($part==1){$a=48;$b=57;}  // Numbers
					if($part==2){$a=65;$b=90;}  // UpperCase
					if($part==3){$a=97;$b=122;} // LowerCase
					$code_part=chr(rand($a,$b));
					$newcode_length = $newcode_length + 1;
					$newcodecover = $newcodecover.$code_part;
				}
				$handlecover = new upload($_FILES[$fieldname]);
				$handlecover2 = new upload($_FILES[$fieldname]);
				if ($handlecover->uploaded) 
				{
					$handlecover->file_new_name_body   = $newcodecover;
					$handlecover->image_resize         = false;
					$handlecover->process('.'.$path);
					if ($handlecover->processed) 
					{
						$handlecover->file_new_name_body   = $newcodecover;
						$handlecover->image_resize         = true;
						$handlecover->image_ratio_crop     = true;
						$handlecover->image_x              = 200;
						$handlecover->image_y              = 200;
					}
					else 
					{
						echo 'error : ' . $handlecover->error;
					}
					$handlecover2->file_new_name_body   = $newcodecover;
					$handlecover2->image_resize         = false;
					$handlecover2->process('.'.$path2);
					if ($handlecover2->processed) 
					{
						$handlecover2->file_new_name_body   = $newcodecover;
						$handlecover2->image_resize         = true;
						$handlecover2->image_ratio_crop     = true;
						$handlecover2->image_x              = 200;
						$handlecover2->image_y              = 200;
					}
					else 
					{
						echo 'error : ' . $handlecover2->error;
					}
				}
			}
			else
			{
				$newcodecover = "";
			}
			if($newcodecover!='')
			{
				$image=$newcodecover;
				if(strtoupper($z)=='JPEG' )
				{
					$rename = $image.'.'.strtolower($z);
				}
				else
				{
					$rename = $image.strtolower($z);
				}
				$final =  $rename;
				smart_resize_image('.'.$path.'/'.$final,500,0,true); 
				smart_resize_image('.'.$path2.'/'.$final,30,0,true);
				return $final;
			}
			else
			{
				$final = '';
				return $final;	
			}
		}
		else 
		{
			$final = 'False';
			return $final;	
		}
	}

  
        
        
        
        
  function uploadImagesResize($path,$fieldname,$codecover, $sizew, $sizeh){
        
        $im = $_FILES[$fieldname]['name'];
	
	$a = strlen($im);
	$b = substr($im, $a-4, 4);
	$z = substr($im, $a-4, 4);

	if(strtoupper($b)=='.JPG' or strtoupper($b)=='.PNG' or strtoupper($b)=='.GIF' or strtoupper($b)=='JPEG' )
	{
		//echo "masuk";
		if(isset($_FILES[$fieldname]['name']) )
		{
			$codelenght = 10;
			$newcode_length = 1;
			$newcodecover= $codecover;
			while($newcode_length < $codelenght) 
			{
				$x=1;
				$y=3;
				$part = rand($x,$y);
				if($part==1){$a=48;$b=57;}  // Numbers
				if($part==2){$a=65;$b=90;}  // UpperCase
				if($part==3){$a=97;$b=122;} // LowerCase
				$code_part=chr(rand($a,$b));
				$newcode_length = $newcode_length + 1;
				$newcodecover = $newcodecover.$code_part;
			}
			$handlecover = new upload($_FILES[$fieldname]);
			if ($handlecover->uploaded) 
			{
				$handlecover->file_new_name_body   = $newcodecover;
				$handlecover->image_resize         = false;
                                    
                                    $handlecover->process('.'.$path);
                                    
				if ($handlecover->processed){
                                    $handlecover->image_resize         = true;
				    $handlecover->image_ratio_crop     = true;
				    $handlecover->image_x              = 600;
				    $handlecover->image_y              = 400;
			        }
				else 
				{
					echo 'error : ' . $handlecover->error;
				}
			}
		}
		else
		{
			$newcodecover = "";
		}
		if($newcodecover!='')
		{
			$image=$newcodecover;
			if(strtoupper($z)=='JPEG' )
			{
				$rename = $image.'.'.strtolower($z);
			}
			else
			{
				$rename = $image.strtolower($z);
			}
			$final =  $rename;
                            smart_resize_image('.'.$path.$final,$sizew,0,true);
                            
			return $final;
		}
		else
		{
			$final = '';
			return $final;	
		}
	}
	else 
	{
		$final = 'False';
		return $final;	
	}
        
        
    }
        
        
  function smart_resize_image($file,
                              $width = 0,
                              $height = 0,
                              $proportional = false,
                              $output = 'file',
                              $delete_original = true,
                              $use_linux_commands = false )
    {
        if ( $height <= 0 && $width <= 0 ) {
            return false;
        }
        $info = getimagesize($file);
        $image = '';

        $final_width = 0;
        $final_height = 0;
        list($width_old, $height_old) = $info;

        if ($proportional) {
            if ($width == 0) $factor = $height/$height_old;
            elseif ($height == 0) $factor = $width/$width_old;
            else $factor = min ( $width / $width_old, $height / $height_old);  
            $final_width = round ($width_old * $factor);
            $final_height = round ($height_old * $factor);

        }
        else {       
            $final_width = ( $width <= 0 ) ? $width_old : $width;
            $final_height = ( $height <= 0 ) ? $height_old : $height;
        }

        switch ($info[2] ) {
            case IMAGETYPE_GIF:
                $image = imagecreatefromgif($file);
            break;
            case IMAGETYPE_JPEG:
                $image = imagecreatefromjpeg($file);
            break;
            case IMAGETYPE_PNG:
                $image = imagecreatefrompng($file);
            break;
            default:
                return false;
        }
       
        $image_resized = imagecreatetruecolor( $final_width, $final_height );
               
        if ( ($info[2] == IMAGETYPE_GIF) || ($info[2] == IMAGETYPE_PNG) ) {
            $trnprt_indx = imagecolortransparent($image);
            // If we have a specific transparent color
            if ($trnprt_indx >= 0) {
                // Get the original image's transparent color's RGB values
                $trnprt_color    = imagecolorsforindex($image, $trnprt_indx);
                // Allocate the same color in the new image resource
                $trnprt_indx    = imagecolorallocate($image_resized, $trnprt_color['red'], $trnprt_color['green'], $trnprt_color['blue']);
                // Completely fill the background of the new image with allocated color.
                imagefill($image_resized, 0, 0, $trnprt_indx);
                // Set the background color for new image to transparent
                imagecolortransparent($image_resized, $trnprt_indx);
            }
            // Always make a transparent background color for PNGs that don't have one allocated already
            elseif ($info[2] == IMAGETYPE_PNG) {
                // Turn off transparency blending (temporarily)
                imagealphablending($image_resized, false);
                // Create a new transparent color for image
                $color = imagecolorallocatealpha($image_resized, 0, 0, 0, 127);
  
                // Completely fill the background of the new image with allocated color.
                imagefill($image_resized, 0, 0, $color);
  
                // Restore transparency blending
                imagesavealpha($image_resized, true);
            }
        }

        imagecopyresampled($image_resized, $image, 0, 0, 0, 0, $final_width, $final_height, $width_old, $height_old);
   
        if ( $delete_original ) {
            if ( $use_linux_commands )
                exec('rm '.$file);
            else
                @unlink($file);
        }
       
        switch ( strtolower($output) ) {
            case 'browser':
                $mime = image_type_to_mime_type($info[2]);
                header("Content-type: $mime");
                $output = NULL;
            break;
            case 'file':
                $output = $file;
            break;
            case 'return':
                return $image_resized;
            break;
            default:
            break;
        }

        switch ($info[2] ) {
            case IMAGETYPE_GIF:
                imagegif($image_resized, $output);
            break;
            case IMAGETYPE_JPEG:
                imagejpeg($image_resized, $output);
            break;
            case IMAGETYPE_PNG:
                imagepng($image_resized, $output);
            break;
            default:
                return false;
        }

        return true;
    }  
	
	function rome($N){
        $c='IVXLCDM';
        for($a=5,$b=$s='';$N;$b++,$a^=7)
                for($o=$N%$a,$N=$N/$a^0;$o--;$s=$c[$o>2?$b+$N-($N&=-2)+$o=1:$b].$s);
        return $s;
	} 
	
	function tglindonesia()
	{
		setlocale(LC_ALL, 'id_ID.UTF8', 'id_ID.UTF-8', 'id_ID.8859-1', 'id_ID', 'IND.UTF8', 'IND.UTF-8', 'IND.8859-1', 'IND', 'Indonesian.UTF8', 'Indonesian.UTF-8', 'Indonesian.8859-1', 'Indonesian', 'Indonesia', 'id', 'ID', 'en_US.UTF8', 'en_US.UTF-8', 'en_US.8859-1', 'en_US', 'American', 'ENG', 'English');
		$date = strftime("%m/%d/%Y");
		return $date;
	}
	
	function getBulan2($bln){
		switch ($bln){
		case 1:
		return "January";
		break;
		case 2:
		return "February";
		break;
		case 3:
		return "March";
		break;
		case 4:
		return "April";
		break;
		case 5:
		return "May";
		break;
		case 6:
		return "June";
		break;
		case 7:
		return "July";
		break;
		case 8:
		return "August";
		break;
		case 9:
		return "September";
		break;
		case 10:
		return "October";
		break;
		case 11:
		return "November";
		break;
		case 12:
		return "December";
		break;
		}
	}
	
	function stri_replace( $find, $replace, $string )
    {
		$parts = explode( strtolower($find), strtolower($string) );
	
		$pos = 0;
	
		foreach( $parts as $key=>$part )
			{
			$parts[ $key ] = substr($string, $pos, strlen($part));
			$pos += strlen($part) + strlen($find);
			}
	
		return( join( $replace, $parts ) );
	} 


}
>>>>>>> 31ee3d139fbb0c2633ae4d66276a4d8f2bc3bfff
?>