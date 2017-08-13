<?php
abstract class Mivec_Product_Block_Abstract extends Mage_Core_Block_Template
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
                ->addCrumb('ship_quote' , array(
                    'label'	=> 'Shipping Quotes',
                    'link'	=> Mage::getUrl("product/quote")
                ));
        }

        return parent::_prepareLayout();
    }
}