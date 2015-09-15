<?php 
namespace Hwi\Form;

 use Zend\Form\Form;
class AdminForm extends Form
{
	public function __construct($name=null)
	{
		parent::__construct('Admin');

		$this->add(array(
				'name'=>'ad_id',
				'type'=>'Hidden',
			));

		$this->add(array(
				'name'=>'ad_name',
				'type'=>'Text',
				'options'=>array(
						'lable'=>'ad_name',
					),
			));

		$this->add(array(
				'name'=>'ad_password',
				'type'=>'Text',
				'options'=>array(
						'lable'=>'ad_password',
					),
			));

		 $this->add(array(
             'name' => 'submit',
             'type' => 'Submit',
             'attributes' => array(
                 'value' => 'Go',
                 'id' => 'submitbutton',
             ),
         ));
	}
}
?>