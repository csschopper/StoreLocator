<?php
class Sparx_Storelocator_Adminhtml_StorelocatorbackendController extends Mage_Adminhtml_Controller_Action
{
	public function indexAction()
    {
       $this->loadLayout();
	   $this->_title($this->__("Store Locations"));
	   $this->renderLayout();
    }
}