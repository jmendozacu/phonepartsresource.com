<?php
class Mivec_Shipping_Helper_Quote extends Mage_Core_Helper_Abstract
{
	
	public function getShippingCollection($_key = "" , $_value = "")
	{
		$_quoteCollection = Mage::getModel("shipping/quote")
			->getCollection();
		if ($_key) {
			$_collection->addAttributeToFilter($_key , array("eq" => $_value));
		}
		return $_collection;
	}
	
	public function getShippingQuote($_key = "" , $_value = "" , $_pageSize , $_sort = "" , $_dir = "DESC")
	{
		$_quoteCollection = $this->getShippingCollection($_key , $_value);
		if (!empty($_pageSize)) $_quoteCollection->setPageSize($_pageSize);
		if (!empty($_sort)) $_quoteCollection->setOrder($_sort , $_dir);
		if ($_quoteCollection->count() > 0) {
			return $_quoteCollection->getItems();
		}
		return false;
	}
	
	public function checkQuotes($_key , $_value)
	{
		$_quoteCollection = $this->getShippingCollection($_key , $_value);
		return $_quoteCollection->count();
	}
}