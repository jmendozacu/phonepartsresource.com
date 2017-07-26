<?php
class Mivec_Shipping_Model_Mysql4_Carrier extends Mage_Core_Model_Mysql4_Abstract
{
	public function _construct()
	{
		$this->_init("shipping/carrier" , "carrier_id");
	}
}