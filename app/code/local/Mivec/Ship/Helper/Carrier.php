<?php
class Mivec_Ship_Helper_Carrier extends Mage_Core_Helper_Abstract
{
	public function getCarrierCollection($_key="", $_value="")
	{
		$_collection = Mage::getModel('ship/carrier')
			->getCollection();
		return $_collection;
	}
	
	public function getCarriers($_key = array(), $_value = array())
	{
		if ($_collection = $this->getCarrierCollection()) {
			if (is_array($_key)) {
				$i = 0;
				foreach ($_key as $_field) {
					$_collection->addAttributeToFilter($_field , array("eq" => $_value[$i]));
					$i++;
				}
			}
			$data = array();
			foreach ($_collection->getItems() as $_item) {
				//print_r($_item->getData());exit;
				$data[$_item->getCarrier_id()] = $_item->getCarrier_name();
			}
			return $data;
		}
	}
}