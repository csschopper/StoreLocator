<?php
class Sparx_Storelocator_Block_Adminhtml_Storelocator_Edit_Tab_Form extends Mage_Adminhtml_Block_Widget_Form
{
		protected function _prepareForm()
		{

				$form = new Varien_Data_Form();
				$this->setForm($form);
				$fieldset = $form->addFieldset("storelocator_form", array("legend"=>Mage::helper("storelocator")->__("Item information")));

				
						$fieldset->addField("locname", "text", array(
						"label" => Mage::helper("storelocator")->__("Title"),					
						"class" => "required-entry",
						"required" => true,
						"name" => "locname",
						));
					
						$fieldset->addField("lng", "text", array(
						"label" => Mage::helper("storelocator")->__("Longitude"),					
						"class" => "required-entry",
						"required" => true,
						"name" => "lng",
						));
					
						$fieldset->addField("lat", "text", array(
						"label" => Mage::helper("storelocator")->__("Latitude"),					
						"class" => "required-entry",
						"required" => true,
						"name" => "lat",
						));						
						
						$fieldset->addField("web", "text", array(
						"label" => Mage::helper("storelocator")->__("Website URL"),					
						"class" => "required-entry",
						"required" => true,
						"name" => "web",
						));
					
						$fieldset->addField("email", "text", array(
						"label" => Mage::helper("storelocator")->__("Email"),
						"name" => "email",
						));
						
						$fieldset->addField("country", "text", array(
						"label" => Mage::helper("storelocator")->__("Country"),
						"name" => "country",
						));
						
						$fieldset->addField("state", "text", array(
						"label" => Mage::helper("storelocator")->__("State"),
						"name" => "state",
						));
					
						$fieldset->addField("city", "text", array(
						"label" => Mage::helper("storelocator")->__("City"),
						"name" => "city",
						));
						
						$fieldset->addField("address", "textarea", array(
						"label" => Mage::helper("storelocator")->__("Address"),
						"name" => "address",
						));
					
						$fieldset->addField("address2", "textarea", array(
						"label" => Mage::helper("storelocator")->__("Address 2"),
						"name" => "address2",
						));
						
						$fieldset->addField("postal", "text", array(
						"label" => Mage::helper("storelocator")->__("Postal Code"),
						"class" => "required-entry",
						"required" => true,
						"name" => "postal",
						));
					
						$fieldset->addField("phone", "text", array(
						"label" => Mage::helper("storelocator")->__("Phone"),
						"name" => "phone",
						));											
					
						$fieldset->addField("hours1", "text", array(
						"label" => Mage::helper("storelocator")->__("Time Duration 1"),
						"name" => "hours1",
						));
					
						$fieldset->addField("hours2", "text", array(
						"label" => Mage::helper("storelocator")->__("Time Duration 2"),
						"name" => "hours2",
						));
					
						$fieldset->addField("hours3", "text", array(
						"label" => Mage::helper("storelocator")->__("Time Duration 3"),
						"name" => "hours3",
						));
									
						 $fieldset->addField('status', 'select', array(
						'label'     => Mage::helper('storelocator')->__('Status'),
						'values'   => Sparx_Storelocator_Block_Adminhtml_Storelocator_Grid::getValueArray15(),
						'name' => 'status',
						));

				if (Mage::getSingleton("adminhtml/session")->getStorelocatorData())
				{
					$form->setValues(Mage::getSingleton("adminhtml/session")->getStorelocatorData());
					Mage::getSingleton("adminhtml/session")->setStorelocatorData(null);
				} 
				elseif(Mage::registry("storelocator_data")) {
				    $form->setValues(Mage::registry("storelocator_data")->getData());
				}
				return parent::_prepareForm();
		}
}
