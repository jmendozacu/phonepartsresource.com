<?php
class Mivec_Shipping_Block_Adminhtml_Carrier_Edit extends Mage_Adminhtml_Block_Widget_Form_Container
{
	public function __construct()
	{
        parent::__construct();
                 
        $this->_objectId = 'id';
        $this->_blockGroup = 'shipping';
        $this->_controller = 'adminhtml_carrier';
        
        $this->_updateButton('save', 'label', 'Save');
        $this->_updateButton('delete', 'label', 'Delete');
		
        $this->_addButton('saveandcontinue', array(
            'label'     => Mage::helper('adminhtml')->__('Save And Continue Edit'),
            'onclick'   => 'saveAndContinueEdit()',
            'class'     => 'save',
        ), -100);

        $this->_formScripts[] = "
            function toggleEditor() {
                if (tinyMCE.getInstanceById('producttags_content') == null) {
                    tinyMCE.execCommand('mceAddControl', false, 'producttags_content');
                } else {
                    tinyMCE.execCommand('mceRemoveControl', false, 'producttags_content');
                }
            }
            function saveAndContinueEdit(){
                editForm.submit($('edit_form').action+'back/edit/');
            }
        ";
	}
	
    public function getHeaderText()
    {
        if( Mage::registry('carrier_data') && Mage::registry('carrier_data')->getId() ) {
            return Mage::helper('shipping')->__("Edit Carrier '%s'" , Mage::registry('carrier_data')->getCarrierName());
        } else {
            return Mage::helper('shipping')->__('');
        }
    }
}