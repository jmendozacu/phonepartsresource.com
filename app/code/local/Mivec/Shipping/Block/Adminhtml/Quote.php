<?php
class Mivec_Shipping_Block_Adminhtml_Quote extends Mage_Adminhtml_Block_Widget_Grid_Container
{
	public function __construct()
	{
		$this->_controller = "adminhtml_quote";
		$this->_blockGroup = "shipping";
		$this->_headerText = "Shipping Quotes";
		
		return parent::__construct();
	}
}