<?php
class Mivec_Product_Block_Home_Widget extends Mage_Core_Block_Template
{
    public function getProdutQuote()
    {
        $collection = Mage::getModel("product/quote")
            ->getCollection()
            ->setPageSize(10)
            ->setOrder("id" , "DESC");
        return $collection;
    }
}