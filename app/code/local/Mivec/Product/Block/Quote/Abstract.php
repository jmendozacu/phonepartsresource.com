<?php
abstract class Mivec_Product_Block_Quote_Abstract extends Mage_Core_Block_Template
{
    protected function _prepareLayout()
    {
        $this->_params = $this->getRequest()->getParams();

        if ($head = $this->getLayout()->getBlock('head')) {
            $head->setTitle('Product Quotes');
        }

        if ($breadCrumb = $this->getLayout()->getBlock('breadcrumbs')) {
            $breadCrumb->addCrumb('home' , array(
                'label'	=> 'Home',
                'link'	=> Mage::getBaseUrl()
            ))
            ->addCrumb('product_quote' , array(
                'label'	=> 'Product Quotes',
                'link'	=> Mage::getUrl("product/quote/list")
            ));
        }

        return parent::_prepareLayout();
    }

    protected function getCustomerSession()
    {
        $this->_seesion = Mage::getSingleton('customer/session');
        return $this->_seesion;
    }
}