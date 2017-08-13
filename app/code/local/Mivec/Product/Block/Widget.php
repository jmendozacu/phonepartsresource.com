<?php
class Mivec_Product_Block_Widget extends Mage_Core_Block_Template
{
    protected function _prepareLayout()
    {
        //print_r($this);
    }

    public function getProdutQuote()
    {
        $collection = Mage::getModel("product/quote")
            ->getCollection()
            ->setPageSize(10)
            ->setOrder("id" , "DESC");
        return $collection;
    }
}