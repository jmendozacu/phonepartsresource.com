<?php
class Mivec_Shipping_Helper_Carrier extends Mage_Core_Helper_Abstract
{
	public function getCollection($_key="", $_value="")
	{
		$_collection = Mage::getModel('shipping/carrier')
			->getCollection();
		if ($_key) {
			$_collection->addAttributeToFilter($_key , array("eq" => $_value));
		}
		return $_collection;
	}
	
	public function getCarriers()
	{
		if ($_collection = $this->getCollection()) {
			$data = array();
			foreach ($_collection->getItems() as $_item) {
				//print_r($_item->getData());exit;
				$data[$_item->getCarrier_id()] = $_item->getCarrier_name();
			}
			return $data;
		}
	}
}