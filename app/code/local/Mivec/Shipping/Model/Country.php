<?php
class Mivec_Shipping_Model_Country extends Mage_Core_Model_Abstract
{
	public function _construct()
	{
		parent::_construct();
		$this->_init('shipping/country');
	}
}