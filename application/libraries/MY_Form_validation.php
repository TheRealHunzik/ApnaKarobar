<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class MY_Form_validation extends CI_Form_validation {

    public function __construct($rules = array())
    {
        parent::__construct($rules);
    }
   public function first_error($prefix = '', $suffix = '')
   {
       // No errrors, validation passes!
       if (count($this->_error_array) === 0)
       {
           return '';
       }
   
       if ($prefix == '')
       {
           $prefix = $this->_error_prefix;
       }
   
       if ($suffix == '')
       {
           $suffix = $this->_error_suffix;
       }
   
       // Generate the error string
       $str = '';
       foreach ($this->_error_array as $val)
       {
           if ($val != '')
           {
               return $prefix.$val.$suffix."\n";
           }
       }
   
       return $str;
   }
}
