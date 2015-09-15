<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2015 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Artcats\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class IndexController extends AbstractActionController
{
	 protected $ArtcatTable;
	 public function getArtcatTable()
     {
         if (!$this->ArtcatTable) {
             $sm = $this->getServiceLocator();
             $this->ArtcatTable = $sm->get('Artcats\Model\artcatTable');
         }
         return $this->ArtcatTable;
     }

    public function indexAction()
    {
    	
         return new ViewModel(array(
             'Artcat' => $this->getArtcatTable()->fetchAll(),
         ));
    }
}
