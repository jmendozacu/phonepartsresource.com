<?php
class Mivec_Shipping_Adminhtml_CarrierController extends Mage_Adminhtml_Controller_Action
{
	public function _initAction()
	{
		$this->loadLayout()
			->_setActiveMenu("shipping/carrier")
			->_addBreadcrumb("Shipping Carrier" , "");
		
		return $this;
	}
	
	public function indexAction()
	{
		$this->_initAction()
			->renderLayout();
			
	}
	
	public function editAction()
	{
		$id     = $this->getRequest()->getParam('id');
		$model  = Mage::getModel('shipping/carrier')->load($id);

		if ($model->getId() || $id == 0) {
			$data = Mage::getSingleton('adminhtml/session')->getFormData(true);
			if (!empty($data)) {
				$model->setData($data);
			}

			Mage::register('carrier_data', $model);

			$this->loadLayout();
			$this->_setActiveMenu('shipping/carrier');

			$this->getLayout()->getBlock('head')->setCanLoadExtJs(true);

			$this->_addContent($this->getLayout()->createBlock('shipping/adminhtml_carrier_edit'))
				->_addLeft($this->getLayout()->createBlock('shipping/adminhtml_carrier_edit_tabs'));

			$this->renderLayout();
		} else {
			Mage::getSingleton('adminhtml/session')->addError('Item does not exist');
			$this->_redirect('*/*/');
		}
	}
	
	public function newAction()
	{
			
	}
}