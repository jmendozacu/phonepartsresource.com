<?php
class Mivec_Shipping_Model_Carrier extends Mage_Core_Model_Abstrct
{
	public function _construct()
	{
		parent::_construct();
		$this->_init('shipping/carrier');
	}
}