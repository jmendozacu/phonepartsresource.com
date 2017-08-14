<?php
class Mivec_Product_Block_Quote_View extends Mivec_Product_Block_Quote_Abstract
{
    protected function _prepareLayout()
    {
        parent::_prepareLayout();
        if ($breadCrumbs = $this->getLayout()->getBlock('breadcrumbs')) {
            $breadCrumbs->addCrumb("view_quote" , array(
                "label"     => "View Quote",
            ));
        }
        $this->_session = Mage::getSingleton("customer/session");
    }

    public function getProductQuote()
    {
        //print_r($this->_session);
        $id = $this->getRequest()->getParam("id");
        if (!$id) {
            die('<p class="error-msg">Access Denied</p>');
        }

        $quote = Mage::getModel("product/quote")->load($id);
        $_group = $this->helper("product/group")->getGroup($quote["customer_group"]);
        //print_r($_group);exit;

        $data = array(
            "id"    => $quote["id"],
            "title" => $quote['title'],
            "group_id" => $quote["customer_group"],
            "group_code"    => $_group["customer_group_code"],
            "updated"   => $quote["updated_at"],
            "content"   => $quote["quote_content"]
        );
        return $data;
        //print_r($quote->getData());exit;
    }

    public function getCustomerGroup()
    {
        if ($_customerId = $this->_session->getId()) {
            //get group
            $_customer = Mage::getModel("customer/customer")->load($_customerId);
            return $_customer->getGroupId();
        }
        return false;
    }
}