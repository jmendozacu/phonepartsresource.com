<?php
class Mivec_Product_Adminhtml_QuoteController extends Mage_Adminhtml_Controller_Action
{
    protected function _init()
    {
        $this->loadLayout()
            ->_setActiveMenu("product/quote")
            ->_addBreadcrumb("Product Quotes");
        return $this;
    }

    public function indexAction()
    {
        $this->_init()
            ->renderLayout();
    }

    public function editAction()
    {
        $id = $this->getRequest()->getParam('id');
        $model = Mage::getModel("product/quote")->load($id);

        if ($model->getId() || $id == 0) {
            $data = Mage::getSingleton('adminhtml/session')->getFormData(true);
            if (!empty($data)) {
                $model->setData($data);
            }

            Mage::register('quote_data', $model);

            $this->loadLayout();
            $this->_setActiveMenu('product/quote');

            $this->getLayout()->getBlock('head')->setCanLoadExtJs(true);

            $this->_addContent($this->getLayout()->createBlock('product/adminhtml_quote_edit'))
                ->_addLeft($this->getLayout()->createBlock('product/adminhtml_quote_edit_tabs'));

            $this->renderLayout();
        } else {
            Mage::getSingleton('adminhtml/session')->addError('Item does not exist');
            $this->_redirect('*/*/');
        }
    }

    public function newAction()
    {
        $this->_forward("edit");
    }

    public function saveAction()
    {
        //print_r($this->getRequest()->getPost());exit;
        if ($data = $this->getRequest()->getPost()) {
            $model = Mage::getModel('ship/quote');

            $data['content'] = $data["quote_content"];
            $data['updated_at'] = date("Y-m-d");
            unset($data['quote_content']);
            //print_r($data);exit;

            $model->setData($data)
                ->setId($this->getRequest()->getParam('id'));

            try {
                $model->save();
                Mage::getSingleton('adminhtml/session')->addSuccess('It was successfully saved');
                Mage::getSingleton('adminhtml/session')->setFormData(false);

                if ($this->getRequest()->getParam('back')) {
                    $this->_redirect('*/*/edit', array('id' => $model->getId()));
                    return;
                }
                $this->_redirect('*/*/');
                return;
            } catch (Exception $e) {
                Mage::getSingleton('adminhtml/session')->addError($e->getMessage());
                Mage::getSingleton('adminhtml/session')->setFormData($data);
                $this->_redirect('*/*/edit', array('id' => $this->getRequest()->getParam('id')));
                return;
            }
        }
        Mage::getSingleton('adminhtml/session')->addError('Unable to find item to save');
        $this->_redirect('*/*/');
    }

    public function deleteAction()
    {
        if( $this->getRequest()->getParam('id') > 0 ) {
            try {
                $model = Mage::getModel('ship/quote');

                $model->setId($this->getRequest()->getParam('id'))
                    ->delete();

                Mage::getSingleton('adminhtml/session')->addSuccess('It was successfully deleted');
                $this->_redirect('*/*/');
            } catch (Exception $e) {
                Mage::getSingleton('adminhtml/session')->addError($e->getMessage());
                $this->_redirect('*/*/edit', array('id' => $this->getRequest()->getParam('id')));
            }
        }
        $this->_redirect('*/*/');
    }
}