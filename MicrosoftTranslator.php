<?php 

/**
 * Microsoft Translator Api
 * @author Mohamed Ali Musa - (XC0d3rZ);
 * @since  2015-10-06;
 * @version  3.0;
 * @modified 00-00-00;
 * @copyright 2013 - 2015 XC0d3rZ;
 * @githup https://github.com/x-c0d3rz;
 * @facebook https://fb.com/mr.face.king;
 * @doc https://msdn.microsoft.com/en-us/library/hh847649.aspx;
 **/

class MicrosoftTranslator
{

var $username; // Use your live login as username 
var $azure_key; // Azure account key
var $to;  // Translate Language  
var $from; // Language code for text // looking here https://msdn.microsoft.com/en-us/library/hh456380.aspx
var $text; // Text 
// Setter 
  function set($array){
  $this->username  = $array['username'];
  $this->azure_key = $array['key'];
  $this->text      = $array['text']; 
  $this->to        = $array['to'];
  $this->from      = $array['from'];
  } 
  
// Processing 
Private function get_translation($xml){
   preg_match('/<d:Text m:type="Edm\\.String">(.*?)<\/d:Text>/',$xml,$translation);
   return $this->translation = $translation[0];
  }
Private function query(){
  $query_url = "https://api.datamarket.azure.com/Bing/MicrosoftTranslator/v1/Translate?Text='".rawurlencode($this->text)."'&To='".$this->to."'&From='".$this->from."'";
  $query = curl_init();
  $is_https = (substr($query_url, 0, 5) == 'https');
  if($is_https && extension_loaded('openssl')) {
  curl_setopt($query, CURLOPT_SSL_VERIFYPEER, false);
  curl_setopt($query, CURLOPT_SSL_VERIFYHOST, false);
   }
  curl_setopt($query, CURLOPT_URL,$query_url);
  curl_setopt($query, CURLOPT_TIMEOUT, 30); //timeout after 30 seconds
  curl_setopt($query, CURLOPT_RETURNTRANSFER,1);
  curl_setopt($query, CURLOPT_HTTPAUTH, CURLAUTH_ANY);
  curl_setopt($query, CURLOPT_USERPWD, "$this->username:$this->azure_key");
  $result = curl_exec ($query);
  // Catch Error
  if(curl_errno($query))
   {
    echo 'error:' . curl_error($query);
   }
   if(preg_match('/Parameter:/', $result)){
   	$return  = $result;
   }
   elseif ($result=='The authorization type you provided is not supported. Only Basic and OAuth are supported') {
   	$return = $result;
   }
   else{
    $return = $this->get_translation($result);
   }
   return $return;
  }
function translate(){
return $this->query();
}

}
