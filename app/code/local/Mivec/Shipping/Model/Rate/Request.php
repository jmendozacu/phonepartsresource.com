<?php
class Mivec_Shipping_Model_Rate_Request extends Mage_Shipping_Model_Carrier_Abstract implements Mage_Shipping_Model_Carrier_Interface
{
    protected $_code = 'mivec_shipping';
	protected $_quoteHelper;

    protected $_methods;

    protected function _initSetup()
    {
		//helper
		$this->_quoteHelper = Mage::helper('mivec_shipping/quote');
		
		$this->_methods['code'] = array();
		
/*        $this->_methods['code'] = array(
            'shipcarrier_airmail', 'shipcarrier_ups' , 'shipcarrier_dhl','shipcarrier_fedex'
        );
        $this->_methods['title'] = array(
            'Registered Airmail With Tracking Number' , 'UPS Express' , 'DHL Express' ,'Fedex Express'
        );
*/
		$this->setEnableCarrier();
        return $this;
    }

	protected function setEnableCarrier()
	{
		//get carriers
		$_carriers = Mage::helper('mivec_shipping/carrier')->getCarriers();
		if (count($_carriers) > 0) {
			foreach ($_carriers as $_id => $_carrier) {
				//check
				if ($this->_quoteHelper->checkCarrierQuote("carrier_id" , $_id)) {
					array_push($this->_methods['code'] , $_carrier);
				}
			}
		}
	}
	
    public function getAllowedMethods()
    {
       // return $this->_methods;
    }

    public function collectRates(Mage_Shipping_Model_Rate_Request $request)
    {
		$this->_initSetup();
		print_r($this->_methods);exit;
		
        $result = Mage::getModel('shipping/rate_result');
		//$result->append($this->_getAirmailRate($request));
		
/*		foreach ($this->_methods['code'] as $_code) {
			//$this->getShippingRate(Mage_Shipping_Model_Rate_Request $request , $_code);
		}*/
		
        //$result->append($this->_getEmsRate($request));
/*        $result->append($this->_getDhlRate($request));
        $result->append($this->_getFedexRate($request));
        $result->append($this->_getUpsRate($request));
		$result->append($this->_getAirmailRate($request));*/
		
        return $result;
    }

    protected function getShippingCost(Mage_Shipping_Model_Rate_Request $request , $_carrierCode)
    {
        $mivec = new stdClass;
        $mivec->soap_url = $this->getConfigData('gateway_url');
        $request->setDestCountry(Mage::getModel('directory/country')->load($request->getDestCountryId())->getIso2Code());
		
		
		$allowedCurrencies = Mage::getModel('directory/currency')
                           ->getConfigAllowCurrencies();    
		$currencyRates = Mage::getModel('directory/currency')
                        ->getCurrencyRates('CNY', array_values($allowedCurrencies));
		
		$_currencyRate = (1 / $currencyRates['USD']);
		//echo $_currencyRate;
		
        $params['carrier'] = $_carrierCode;
        $params['country'] = $request->getDestCountry();
        $params['weight']  = $request->getPackageWeight();
        $params['tax']	   = $this->getConfigData('tax_fee');
        $params['currency'] = $_currencyRate;
		if ($_carrierCode == 'airmail') {
			$params['type'] = $_carrierCode;
		}
		//print_r($params);

		$shippingPrice = 0;
        try {
            $client = new SoapClient($this->getConfigData('gateway_url'));
            $_result = $client->getFreightData($params);
            $_result = unserialize($_result);
			//$_result['price'];//$_result['price_orgi'];
			$shippingPrice = $_result['price'];
			//echo $shippingPrice;
			//print_r($_result);
			
        } catch (Exception $e) {
            echo "Line:" . $e->getLine() ." ". $e->getMessage();
        }

        if ($this->getConfigData('discount_fee')) {
            $shippingPrice = $shippingPrice * (1 - $this->getConfigData('discount_fee')); //discount
        }
        //减小包的价格
        //$airmailPrice = 100 * $request->getPackageWeight();
        //$shippingPrice = $shippingPrice - ($airmailPrice / $params['currency']);
        return $shippingPrice;
    }
	
    protected function _getAirmailRate(Mage_Shipping_Model_Rate_Request $request)
    {
        $this->_initSetup();

		if ($request->getPackageWeight() < 10) {
			$rate = Mage::getModel('shipping/rate_result_method');
	
			$rate->setCarrier($this->_code);
			$rate->setCarrierTitle($this->getConfigData('title'));
			$rate->setMethod("airmail");
			$rate->setMethodTitle("Registered Airmail With Tracking Number");
	
			//$shippingPrice = $this->getShippingCost($request , 'airmail');
			$shippingPrice = 2;
			if ($shippingPrice > 0) {
				$rate->setPrice($shippingPrice);
				return $rate;
			}
		}
    }
	
    protected function _getDhlRate(Mage_Shipping_Model_Rate_Request $request)
    {
        $this->_initSetup();

        $rate = Mage::getModel('shipping/rate_result_method');

        $rate->setCarrier($this->_code);
        $rate->setCarrierTitle($this->getConfigData('title'));
        $rate->setMethod($this->_methods['code'][2]);
        $rate->setMethodTitle($this->_methods['title'][2]);

        $shippingPrice = $this->getShippingCost($request , 'dhl');
		if ($shippingPrice > 0) {
			$rate->setPrice($shippingPrice);
			return $rate;
		}
    }

    protected function _getFedexRate(Mage_Shipping_Model_Rate_Request $request)
    {
        $this->_initSetup();

        $rate = Mage::getModel('shipping/rate_result_method');

        $rate->setCarrier($this->_code);
        $rate->setCarrierTitle($this->getConfigData('title'));
        $rate->setMethod($this->_methods['code'][3]);
        $rate->setMethodTitle($this->_methods['title'][3]);
		
        $shippingPrice = $this->getShippingCost($request , 'fedex');
		if ($shippingPrice > 0) {
			$rate->setPrice($shippingPrice);
			return $rate;
		}
    }
	
    protected function _getUpsRate(Mage_Shipping_Model_Rate_Request $request)
    {
        $this->_initSetup();

        $rate = Mage::getModel('shipping/rate_result_method');

        $rate->setCarrier($this->_code);
        $rate->setCarrierTitle($this->getConfigData('title'));
        $rate->setMethod($this->_methods['code'][1]);
        $rate->setMethodTitle($this->_methods['title'][1]);

        $shippingPrice = $this->getShippingCost($request , 'ups');
		if ($shippingPrice > 0) {
			$rate->setPrice($shippingPrice);
			return $rate;
		}
    }

}