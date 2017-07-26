<?php
class Mivec_Shipping_Model_Mysql4_Country extends Mage_Core_Model_Mysql4_Abstract
{
	public function _construct()
	{
		$this->_init("shipping/country" , "id");
	}
}