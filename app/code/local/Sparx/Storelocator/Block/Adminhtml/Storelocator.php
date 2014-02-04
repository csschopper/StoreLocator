<?php


class Sparx_Storelocator_Block_Adminhtml_Storelocator extends Mage_Adminhtml_Block_Widget_Grid_Container{

	public function __construct()
	{

	$this->_controller = "adminhtml_storelocator";
	$this->_blockGroup = "storelocator";
	$this->_headerText = Mage::helper("storelocator")->__("Storelocator Manager");
	$this->_addButtonLabel = Mage::helper("storelocator")->__("Add New Item");
	
	/*$this->_addButton('button1', array(
            'label'     => Mage::helper('storelocator')->__('Generate XML'),
            'onclick'   => 'setLocation(\'' . $this->getUrl('storelocator/adminhtml_storelocator/generateXML') .'\')',
            'class'     => 'add',
    ));*/
    
	parent::__construct();
	
	}

}
