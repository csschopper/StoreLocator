<?php
class Sparx_Storelocator_IndexController extends Mage_Core_Controller_Front_Action{
    public function IndexAction() {
      
	  $this->loadLayout();   
	  $this->getLayout()->getBlock("head")->setTitle($this->__("Retailers"));
	        $breadcrumbs = $this->getLayout()->getBlock("breadcrumbs");
      $breadcrumbs->addCrumb("home", array(
                "label" => $this->__("Home Page"),
                "title" => $this->__("Home Page"),
                "link"  => Mage::getBaseUrl()
		   ));

      $breadcrumbs->addCrumb("retailers", array(
                "label" => $this->__("Retailers"),
                "title" => $this->__("Retailers")
		   ));

      $this->renderLayout(); 
	  
    }
    
    public function infowindowdescriptionAction(){
			echo '{{#location}}
			<div class="loc-name">{{name}}</div>
			<div>{{address}}</div>
			<div>{{address2}}</div>
			<div>{{city}}, {{state}} {{postal}}</div>
			<div>{{hours1}}</div>
			<div>{{hours2}}</div>
			<div>{{hours3}}</div>
			<div>{{phone}}</div>
			<div><a href="http://{{web}}" target="_blank">{{web}}</a></div>
			{{/location}}';
	}
	
	public function locationlistdescriptionAction(){
			echo '
				{{#location}}
				<li data-markerid="{{markerid}}">
					<div class="list-label">{{marker}}</div>
					<div class="list-details">
						<div class="list-content">
							<div class="loc-name">{{name}}</div>
							<div class="loc-addr">{{address}}</div> 
							<div class="loc-addr2">{{address2}}</div> 
							<div class="loc-addr3">{{city}}, {{state}} {{postal}}</div> 
							<div class="loc-phone">{{phone}}</div>
							<div class="loc-web"><a href="http://{{web}}" target="_blank">{{web}}</a></div>
							{{#if distance}}<div class="loc-dist">{{distance}} {{length}}</div>
							<div class="loc-directions"><a href="http://maps.google.com/maps?saddr={{origin}}&amp;daddr={{address}} {{address2}} {{city}}, {{state}} {{postal}}" target="_blank">Directions</a></div>{{/if}}
						</div>
					</div>
				</li>
				{{/location}}';
	}
	
	public function locationAction(){
			$xml = '<?xml version="1.0"?>
			<markers>';
			$storeCol = Mage::getModel('storelocator/storelocator')->getCollection()
				->addFieldToFilter('status',0);
			foreach($storeCol as $storeData){				
				$xml.='<marker name="'.$storeData->getLocname().'" lat="'.$storeData->getLat().'" lng="'.$storeData->getLng().'" category="'.$storeData->getCategory().'" address="'.$storeData->getAddress().'" address2="'.$storeData->getAddress2().'" city="'.$storeData->getCity().'" state="'.$storeData->getState().'" postal="'.$storeData->getPostal().'" country="'.$storeData->getCountry().'" phone="'.$storeData->getPhone().'" email="'.$storeData->getEmail().'" web="'.$storeData->getWeb().'" hours1="'.$storeData->getHours1().'" hours2="'.$storeData->getHours2().'" hours3="'.$storeData->getHours3().'" featured="" />';
			}			
			echo $xml.='</markers>';			
	}
		
	public function searchlocationAction(){
		$params = $this->getRequest()->getParams();		
		
		$storeCol = Mage::getResourceModel('storelocator/storelocator')->getSearchResult($params['zipcode']);		
											
		if($params['zipcode'] && count($storeCol) > 0){
			$xml = '<?xml version="1.0"?>
			<markers>';			
			foreach($storeCol as $storeData){				
				$xml.='<marker name="'.$storeData['locname'].'" lat="'.$storeData['lat'].'" lng="'.$storeData['lng'].'" category="'.$storeData['category'].'" address="'.$storeData['address'].'" address2="'.$storeData['address2'].'" city="'.$storeData['city'].'" state="'.$storeData['state'].'" postal="'.$storeData['postal'].'" country="'.$storeData['country'].'" phone="'.$storeData['phone'].'" email="'.$storeData['email'].'" web="'.$storeData['web'].'" hours1="'.$storeData['hours1'].'" hours2="'.$storeData['hours2'].'" hours3="'.$storeData['hours3'].'" featured="" />';
			}			
			echo $xml.='</markers>';			
		}else{
			echo $xml = '<?xml version="1.0"?>
			<markers><marker name="No Record Found."/></markers>';				
		}
	}
}
