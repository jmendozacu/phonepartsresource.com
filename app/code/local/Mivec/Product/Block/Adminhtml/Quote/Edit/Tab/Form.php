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

        //Use WYSIWYG config
        $config = Mage::getSingleton("cms/wysiwyg_config")->getConfig();
        //override directives_url
        $config->setData(
            Mage::helper('product')->recursiveReplace(
            '/product/',
            '/' . (string)Mage::app()->getConfig()->getNode('admin/routers/adminhtml/args/frontName') . '/',
            $config->getData()
        ));
        //print_r($config->getData());exit;

        $fieldset->addField(
            "title" ,
            "text",
            array(
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
                'name'  => "customer_group",
                'label'     => "Customer Group",
                "required"  => true,
                "value"     => $formData['customer_group'],
                'options'   => $_group->toOptions(),
                'after_element_html' => '<br><span class="hint"><small>Specific permit to who can view this Quotes.
                    The Customer\'s group level must greater than current value.</small></span>
                ',
        ));

        $outputFormat = Mage::app()->getLocale()->getDateTimeFormat(Mage_Core_Model_Locale::FORMAT_TYPE_SHORT);
        $fieldset->addField(
            'updated_at',
            'date',
            array(
                'label' => 'Updated',
                'readonly' => 'yes',
                'format'    => $outputFormat,
                'image'  => $this->getSkinUrl('images/grid-cal.gif'),
                'value' => $formData['updated_at'],
                'time'  => true,
            )
        );

        $fieldset->addField(
            'quote_content',
            'editor',
            array(
                'name'   => 'quote_content',
                "label"  => "Content",
                'value'  => $formData["quote_content"],
                'required'  => true,
                'style'  => 'width:600px; height:500px;',
                'config'    => $config,
                //'wysiwyg'   => true,
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