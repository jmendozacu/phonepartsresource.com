<?php
class Mivec_Product_Helper_Group extends Mage_Core_Helper_Abstract
{
    public function getGroupCollection()
    {
        $_groupCollection = Mage::getModel("customer/group")
            ->getCollection();
        //print_r($_groupCollection->getFirstItem()->getData());
        return $_groupCollection;
    }

    public function toOptions()
    {
        if ($_collection = $this->getGroupCollection()) {
            $_collection->setOrder('customer_group_id' , "ASC");
            $data = array();
            foreach ($_collection->getItems() as $_item) {
                $data[$_item->getData("customer_group_id")] = $_item->getData("customer_group_code");
            }
            return $data;
        }
    }
}