<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2015 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Hwi\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

 use Hwi\Model\admin;
 use Hwi\Form\adminForm;

class IndexController extends AbstractActionController
{
	 protected $adminTable;
	 public function getadminTable()
     {
         if (!$this->adminTable) {
             $sm = $this->getServiceLocator();
             $this->adminTable = $sm->get('\Hwi\Model\adminTable');
         }
         return $this->adminTable;
     }



    public function indexAction()
    {
      /*  $result=$this->getadminTable()->fetchAll();

        print_r($result);
        foreach($result as $val){
            print_r( $val);
        }*/
        return new ViewModel(array(
               'admin'=>$this->getadminTable()->fetchAll(),
               'a' =>'aaa',
            ));
    }

    public function addAction()
     {
         $form = new AdminForm();
         $form->get('submit')->setValue('Add');

         $request = $this->getRequest();
         if ($request->isPost()) {
             $Admin = new Admin();
             $form->setInputFilter($Admin->getInputFilter());
             $form->setData($request->getPost());

             if ($form->isValid()) {
                 $Admin->exchangeArray($form->getData());
                 $this->getAdminTable()->saveAdmin($Admin);

                 // Redirect to list of Admins
                 return $this->redirect()->toRoute('Hwi');
             }
         }
         return array('form' => $form);
     
     }

     public function successAction()
     {
       
         return new ViewModel();
      }
}
