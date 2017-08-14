<?php
class Mivec_Product_Block_Quote_List extends Mivec_Product_Block_Quote_Abstract
{
    protected function _prepareLayout()
    {
        parent::_prepareLayout();
    }

    public function getProductQuotes()
    {
        $collection = Mage::getModel("product/quote")
            ->getCollection();

        if ($_groupId = $this->getRequest()->getParam("group")) {
            $collection->addAttributeToFilter("customer_group" , $_groupId);
        }

        $collection->setOrder("id" , "DESC");

        $toolbar = $this->getLayout()->createBlock('page/html_pager');
        //$toolbar = $this->getLayout()->createBlock('customer/order_list_toolbar');
        $toolbar->setCollection($collection);

        $quoteCollection = new stdClass;
        $quoteCollection->toolbar = $toolbar;
        $quoteCollection->items = '';

        if ($collection->count()) {
            $data = array();
            foreach ($collection->getItems() as $_quote) {
                $_groupData = $this->helper("product/group")->getGroup($_quote["customer_group"]);
                //print_r($_countryData);exit;
                $data[] = array(
                    'id'	=> $_quote['id'],
                    "title"     => $_quote["title"],
                    "group_id"  => $_quote["customer_group"],
                    "group"     => $_groupData["customer_group_code"],
                    'updated_at'	=> $_quote['updated_at']
                );
            }
            $quoteCollection->items = $data;
            return $quoteCollection;
        }
    }
}