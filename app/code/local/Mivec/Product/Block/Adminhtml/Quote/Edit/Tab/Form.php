<?php
class Mivec_Product_Block_Adminhtml_Quote_Edit_Tab_Form extends Mage_Adminhtml_Block_Widget_Form
{

    protected function _prepareForm()
    {
        $form = new Varien_Data_Form();
        $this->setForm($form);
        $form->setHtmlIdPrefix('quote_');

        $fieldset = $form->addFieldset("quote_form" , array("legend"   => "Product Quotes"));

        $formData = Mage::registry("quote_data")->getData();
        //print_r($formData);exit;

        //WYSIWYG config
        $config = Mage::getSingleton('cms/wysiwyg_config')->getConfig(
            array(
                'a‌​dd_variables' => false,
                'add_widgets' => false,
                'files_browser_window_url' => $this->getBaseUrl().'admin‌​/cms_wysiwyg_images/‌​index/')
        );
        //print_r($config);exit;

        $fieldset->addField("title" , "text",array(
            "name"      => "title",
            "label"     => "title",
            'class'     => 'required-entry',
            'required'  => true,
            'value'     => $formData["title"],
        ));

        $_group = $this->helper("product/group");
        $fieldset->addField(
            "customer_group" ,
            "select" ,
            array(
            "name"      => "Customer Group",
            'label'     => "customer_group",
            "required"  => true,
            "value"     => $formData['customer_group'],
            'options'   => $_group->toOptions(),
            'after_element_html' => '<span class="hint"><small>Set permit to who can view this Quotes.<br>
                The Customer\'s group level must greater than current value.</small></span>
            ',
        ));
        $fieldset->addField(
            'quote_content',
            'editor',
            array(
                'name'   => 'quote_content',
                "label"  => "Content",
                'title'  => 'Content',
                //'value'  => $formData["content"],
                'required'  => true,
                'style'  => 'width:500px; height:500px;',
                'config'    => $config,
                'wysiwyg'   => true,
            )
        );

        if ( Mage::getSingleton('adminhtml/session')->getQuoteData() )
        {
            $form->setValues(Mage::getSingleton('adminhtml/session')->getQuoteData());
            Mage::getSingleton('adminhtml/session')->getQuoteData(null);
        } elseif ( Mage::registry('quote_data') ) {
            $form->setValues(Mage::registry('quote_data')->getData());
        }
        return parent::_prepareForm();
    }
}