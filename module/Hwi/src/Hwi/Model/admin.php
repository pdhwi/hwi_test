<?php 
namespace Hwi\Model;

 use Zend\InputFilter\InputFilter;
 use Zend\InputFilter\InputFilterAwareInterface;
 use Zend\InputFilter\InputFilterInterface;

 class Admin implements InputFilterAwareInterface
 {
     public $ad_id;
     public $ad_name;
     public $ad_password;
     protected $inputFilter;

     public function exchangeArray($data)
     {
         $this->ad_id     = (!empty($data['ad_id'])) ? $data['ad_id'] : null;
         $this->ad_name = (!empty($data['ad_name'])) ? $data['ad_name'] : null;
         $this->ad_password  = (!empty($data['ad_password'])) ? $data['ad_password'] : null;
     }

     public function setInputFilter(InputFilterInterface $inputFilter)
     {
         throw new \Exception("Not used");
     }

      public function getInputFilter()
     {
     	if(!$this->InputFilter){
     		$InputFilter = new InputFilter;

     		$InputFilter->add(array(
     				'name'		=>'ad_id',
     				'require'	=>true,
     				'filters'	=>array(
     					array('name'=>'Int'),
     					),
     			));

     		$InputFilter->add(array(
     				'name'		=>'ad_name',
     				'require'	=>true,
     				'filters'	=>array(
     					array('name'=>'StringLength'),
     					array('name'=>'stringTrim'),
     					),
     				'validators'=>array(
     					array(
     							'name'=>'StringLength',
     							'options'=>array(
     									'encodeing' => 'UTF-8',
     									'min' => '1',
     									'max' => '100',
     								),
     						),
     					),
     			));

     		$inputFilter->add(array(
                 'name'     => 'ad_password',
                 'required' => true,
                 'filters'  => array(
                     array('name' => 'StripTags'),
                     array('name' => 'StringTrim'),
                 ),
                 'validators' => array(
                     array(
                         'name'    => 'StringLength',
                         'options' => array(
                             'encoding' => 'UTF-8',
                             'min'      => 1,
                             'max'      => 100,
                         ),
                     ),
                 ),
             ));

             $this->inputFilter = $inputFilter;

     	}
            return $this->inputFilter;
     }

    
 }
?>