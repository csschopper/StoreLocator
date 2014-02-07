<?php

class Sparx_Storelocator_Block_Adminhtml_Storelocator_Grid extends Mage_Adminhtml_Block_Widget_Grid
{

		public function __construct()
		{
				parent::__construct();
				$this->setId("storelocatorGrid");
				$this->setDefaultSort("storelocator_id");
				$this->setDefaultDir("ASC");
				$this->setSaveParametersInSession(true);
		}

		protected function _prepareCollection()
		{
				$collection = Mage::getModel("storelocator/storelocator")->getCollection();
				$this->setCollection($collection);
				return parent::_prepareCollection();
		}
		protected function _prepareColumns()
		{
				$this->addColumn("storelocator_id", array(
				"header" => Mage::helper("storelocator")->__("ID"),
				"align" =>"right",
				"width" => "50px",
			    "type" => "number",
				"index" => "storelocator_id",
				));
                
				$this->addColumn("locname", array(
				"header" => Mage::helper("storelocator")->__("Title"),
				"index" => "locname",
				));
				$this->addColumn("lng", array(
				"header" => Mage::helper("storelocator")->__("Longitude"),
				"index" => "lng",
				));
				$this->addColumn("lat", array(
				"header" => Mage::helper("storelocator")->__("Latitude"),
				"index" => "lat",
				));
				$this->addColumn("city", array(
				"header" => Mage::helper("storelocator")->__("City"),
				"index" => "city",
				));
				$this->addColumn("state", array(
				"header" => Mage::helper("storelocator")->__("State"),
				"index" => "state",
				));
				/*$this->addColumn("postal", array(
				"header" => Mage::helper("storelocator")->__("Postal Code"),
				"index" => "postal",
				));
				$this->addColumn("phone", array(
				"header" => Mage::helper("storelocator")->__("Phone"),
				"index" => "phone",
				));*/
				$this->addColumn("web", array(
				"header" => Mage::helper("storelocator")->__("Website URL"),
				"index" => "web",
				));
				/*$this->addColumn("email", array(
				"header" => Mage::helper("storelocator")->__("Email"),
				"index" => "email",
				));*/
				/*$this->addColumn("hours1", array(
				"header" => Mage::helper("storelocator")->__("Time Duration"),
				"index" => "hours1",
				));
				$this->addColumn("hours2", array(
				"header" => Mage::helper("storelocator")->__("Time Duration"),
				"index" => "hours2",
				));
				$this->addColumn("hours3", array(
				"header" => Mage::helper("storelocator")->__("Time Duration"),
				"index" => "hours3",
				));*/
				$this->addColumn('status', array(
				'header' => Mage::helper('storelocator')->__('Status'),
				'index' => 'status',
				'type' => 'options',
				'options'=>Sparx_Storelocator_Block_Adminhtml_Storelocator_Grid::getOptionArray15(),				
				));
						
			$this->addExportType('*/*/exportCsv', Mage::helper('sales')->__('CSV')); 
			$this->addExportType('*/*/exportExcel', Mage::helper('sales')->__('Excel'));

				return parent::_prepareColumns();
		}

		public function getRowUrl($row)
		{
			   return $this->getUrl("*/*/edit", array("id" => $row->getId()));
		}


		
		protected function _prepareMassaction()
		{
			$this->setMassactionIdField('storelocator_id');
			$this->getMassactionBlock()->setFormFieldName('storelocator_ids');
			$this->getMassactionBlock()->setUseSelectAll(true);
			$this->getMassactionBlock()->addItem('remove_storelocator', array(
					 'label'=> Mage::helper('storelocator')->__('Remove Storelocator'),
					 'url'  => $this->getUrl('*/adminhtml_storelocator/massRemove'),
					 'confirm' => Mage::helper('storelocator')->__('Are you sure?')
				));
			return $this;
		}
			
		static public function getOptionArray15()
		{
            $data_array=array(); 
			$data_array[0]='Active';
			$data_array[1]='Inactive';
            return($data_array);
		}
		static public function getValueArray15()
		{
            $data_array=array();
			foreach(Sparx_Storelocator_Block_Adminhtml_Storelocator_Grid::getOptionArray15() as $k=>$v){
               $data_array[]=array('value'=>$k,'label'=>$v);		
			}
            return($data_array);

		}
		

}
