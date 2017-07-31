<?php
class Mivec_Ship_Helper_Carrier extends Mage_Core_Helper_Abstract
{
	public function getCarrierCollection($_key="", $_value="")
	{
		$_collection = Mage::getModel('ship/carrier')
			->getCollection();
			
		if ($_key) {
			$_collection->addAttributeToFilter($_key , array("eq" => $_value));
		}
		return $_collection;
	}
	
	public function getCarriers()
	{
		if ($_collection = $this->getCarrierCollection()) {
			$data = array();
			foreach ($_collection->getItems() as $_item) {
				//print_r($_item->getData());exit;
				$data[$_item->getCarrier_id()] = $_item->getCarrier_name();
			}
			return $data;
		}
	}
	
	public function getCarrier($_key,$_value)
	{
		$_collection = $this->getCarrierCollection($_key , $_value);
		return $_collection->getData()[0];
	}
}