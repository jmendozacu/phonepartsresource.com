<?php
class Mivec_Product_Model_Mysql4_Quote extends Mage_Core_Model_Mysql4_Abstract
{
    public function _construct()
    {
        $this->_init("product/quote" , "id");
    }
}