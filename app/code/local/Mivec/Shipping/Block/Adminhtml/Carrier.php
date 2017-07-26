<?php
class Mivec_Shipping_Block_Adminhtml_Carrier extends Mage_Adminhtml_Block_Widget_Grid_Container
{
	public function __construct()
	{
		$this->_controller = 'adminhtml_carrier';
		$this->_blockGroup = 'shipping';
		$this->_headerText = "Shipping Carrier List";
		parent::__construct();
	}
}