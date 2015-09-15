<?php 
namespace Artcats\Model;

 class Artcat
 {
     public $ac_id;
     public $ac_name;


     public function exchangeArray($data)
     {
         $this->ac_id     = (!empty($data['ac_id'])) ? $data['ac_id'] : null;
         $this->ac_name = (!empty($data['ac_name'])) ? $data['ac_name'] : null;
     }
 }
?>