<?php

class TreasuryPayment
{
protected $dept_id="";
protected $merchant_code="";
protected $service_code="";
protected $post_url="";
protected $return_url="";
protected $DDO="";
protected $head="";

/**
* this function is used to initialize the class variable

*/
function __construct($deptID="",$merchantCode="",$serviceCode="",$Head="",$ddo="",$postUrl="",$returnUrl="")
{
//if(empty($deptID) || empty($merchantCode) || empty($serviceCode) || empty($postUrl) || empty($returnUrl) || empty($Head) || empty($ddo))
//throw new Exception("parameters are missing.", 400);
$this->dept_id=$deptID;
$this->merchant_code=$merchantCode;
$this->service_code=$serviceCode;
$this->post_url=$postUrl;
$this->return_url=$returnUrl;
$this->head=$Head;
$this->DDO=$ddo;
}
/**
* this function is used to calculate the checksum of the created mstring

*@param string mStringForCheckSum
*@return string checksum
*/
function calcCheckSum($mStringForCheckSum){



}
/**
* this function is used to encrypt the string without ivParameter, althought this function is not used in the payment gateway,written for future use

*@param string $str, bin $key
*@return string
*/
function encryptWithOutIV($str,$key){
$block = mcrypt_get_block_size('rijndael_128', 'ecb');
$pad = $block - (strlen($str) % $block);
$str .= str_repeat(chr($pad), $pad);
return base64_encode(mcrypt_encrypt(MCRYPT_RIJNDAEL_128, $key, $str, MCRYPT_MODE_ECB));
}

function addPadding($str){
		$block = mcrypt_get_block_size('rijndael_128', 'ecb');
		$pad = $block - (strlen($str) % $block);
		$str .= str_repeat(chr($pad), $pad);
		return $str;
	}

/**
* this function is used to encrypt the string with ivParameter

*@param String $str, bin key
*@return string
*/
function getEncryptedString($str,$key){
		$iv=$key;
		$cipher = mcrypt_module_open(MCRYPT_RIJNDAEL_128,'','cbc',$iv);
		mcrypt_generic_init($cipher, $key, $iv);
		$str=$this->addPadding($str);
		$enCryptedSring=base64_encode(mcrypt_generic($cipher,$str));
		mcrypt_generic_deinit($cipher);
		return $enCryptedSring;
	}
/**
* this function is used to generate the encrypted string

*@param String $str, bin key
*@return string
*/
function genEncryptedString($mString){
$encryption_key = $this->getKey(getcwd()."/echallan.key");
return $this->getEncryptedString($mString,$encryption_key);
}
/**
* this function is used to generate the checksum of the generated string.
* Checksum is the md5 hash of the generated string.

*@param String mString
*@return string
*/
function genCheckSum($genString){
return md5($genString);
}
/**
* this function is used to generate the requested string with all the requested parameters.

*@param double amount, bigint referenceNum, int application_id, string name_of_applicant
*@return string
*/
function constructRequestedString($amount=0,$referenceNum,$subId,$fullName,$PeriodFrom,$PeriodTo){
//    echo $PeriodFrom.'\n'.$PeriodTo;die;
if($amount<=0)
throw new Exception("Amount must be greater than 0.", 401);
$mString="DeptID=".$this->dept_id."|DeptRefNo=".$referenceNum."|TotalAmount=".$amount."|TenderBy=".$fullName."|AppRefNo=".$subId."|Head1=".$this->head."|Amount1=".$amount."|Ddo=".$this->DDO."|PeriodFrom=$PeriodFrom|PeriodTo=$PeriodTo|Service_code=".$this->service_code."|return_url=".$this->return_url;
$mString.="|checkSum=".$this->genCheckSum($mString);
return $mString;
}
/**
* this function is used to generate the get the key used for the treasury payment.

*@param String keyPath (path of the key.)
*@return string
*/
function getKey($keyPath){
$key=file_get_contents($keyPath);
$keyByte= substr($key, 0, 16);
return $keyByte;
}
/**
* this function is used to generate the decrypt string.

*@param String encryptedString
*@return String
*/
function genDecryptedString($encryptedString){
$key=$this->getKey(getcwd()."/echallan.key");
return $this->getDecryptedString($key,$encryptedString);
}
/**
* this function is used to the decrypted string from the encrypted String

*@param String Key, String encryptString
*@return String
*/
function getDecryptedString($key,$encryptedString){
		$iv=$key;
		$cipher = mcrypt_module_open(MCRYPT_RIJNDAEL_128,'','cbc',$iv);
		mcrypt_generic_init($cipher, $key, $iv);
		$decryptedString = mdecrypt_generic($cipher,base64_decode($encryptedString));
		mcrypt_generic_deinit($cipher);
		$decryptedString=$this->removePadding($decryptedString);
		return $decryptedString;
	}
	
	function removePadding($str){
		$str=substr($str, 0, -3);
		return $str;
	}
}
?>
