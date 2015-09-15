<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2015 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Art\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class IndexController extends AbstractActionController
{
	 protected $ArticleTable;
	 public function getArticleTable()
     {
         if (!$this->ArticleTable) {
             $sm = $this->getServiceLocator();
             $this->ArticleTable = $sm->get('Art\Model\articleTable');
         }
         return $this->ArticleTable;
     }

    public function indexAction()
    {
    	
         return new ViewModel(array(
             'article' => $this->getArticleTable()->fetchAll(),
         ));
    }
}
