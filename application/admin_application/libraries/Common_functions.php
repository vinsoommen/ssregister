<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Common_functions {

var $CI;
var $encryption_key = '';
var $_hash_type = 'sha1';
var $_mcrypt_exists = TRUE;
var $_mcrypt_cipher;
var $_mcrypt_mode;
public function __construct()
{
$this->CI =& get_instance();
$this->CI->load->library('encrypt');
$this->CI->load->library('session');
$this->CI->load->database();
}
/*---------encrypt fields for  redirection/url-----------*/
public function url_encode($field)
{
/*-----First encrypt with defined keys in config----- */
$encrypted_value  = $this->CI->encrypt->encode($field);
$encrypted_value  = base64_encode($encrypted_value);
return $encrypted_value;
}
/*---------encrypt fields for  redirection/url-----------*/
public function xor_encode($field)
{
/*-----First encrypt with defined keys in config----- */
$encrypted_value  = $this->CI->encrypt->encode($field);
$encrypted_value  = base64_encode($encrypted_value);
return $encrypted_value;
}
/*---------Decrypt fields for  processing-----------*/
public function url_decode($field)
{
$decrypted_value  = base64_decode($field);
$decrypted_value  =  $this->CI->encrypt->decode($decrypted_value);
return $decrypted_value;
}
/*---------Decrypt fields for  processing-----------*/
public function xor_decode($field)
{
$decrypted_value  = base64_decode($field);
$decrypted_value  =  $this->CI->encrypt->decode($decrypted_value);
return $decrypted_value;
}
}
?>