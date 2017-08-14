<?php
class Mivec_Product_QuoteController extends Mage_Core_Controller_Front_Action
{
    protected function _init()
    {
        return $this;
    }

    public function listAction()
    {
        $this->_init()
            ->loadLayout()
            ->renderLayout();
    }

    public function viewAction()
    {
        $this->_init()
            ->loadLayout()
            ->renderLayout();
    }
}