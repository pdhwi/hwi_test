<?php 
namespace Art\Model;

 class Article
 {
     public $art_title;
     public $art_author;
     public $art_time;
     public $art_type;
     public $art_content;

     public function exchangeArray($data)
     {
         $this->art_title     = (!empty($data['art_title'])) ? $data['art_title'] : null;
         $this->art_author = (!empty($data['art_author'])) ? $data['art_author'] : null;
         $this->art_time = (!empty($data['art_time'])) ? $data['art_time'] : null;
         $this->art_type = (!empty($data['art_type'])) ? $data['art_type'] : null;
         $this->art_content  = (!empty($data['art_content'])) ? $data['art_content'] : null;
     }
 }
?>