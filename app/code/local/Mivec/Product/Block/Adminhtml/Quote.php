<?php
class Mivec_Product_Block_Adminhtml_Quote extends Mage_Adminhtml_Block_Widget_Grid_Container
{
    public function __construct()
    {
        $this->_controller = "adminhtml_quote";
        $this->_blockGroup = "product";
        $this->_headerText = "Product Quotes";

        return parent::__construct();
    }
}