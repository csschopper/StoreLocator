<?php
class Sparx_Storelocator_Model_Mysql4_Storelocator extends Mage_Core_Model_Mysql4_Abstract
{
    protected function _construct()
    {
        $this->_init("storelocator/storelocator", "storelocator_id");
    }
    
    public function getSearchResult($zipcode){
		$where = "status=0 AND ((postal like '%".$zipcode."%') OR (city like '%".$zipcode."%') OR (state like '%".$zipcode."%') OR (phone like '%".$zipcode."%') OR (country like '%".$zipcode."%'))";
		$sql = $this->_getReadAdapter()->select()->from($this->getMainTable())->where($where); 
		return $this->_getReadAdapter()->fetchAll($sql);		
	}
}
