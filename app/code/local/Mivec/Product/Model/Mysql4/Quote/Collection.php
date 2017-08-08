<?php
class Mivec_Product_Model_Mysql4_Quote_Collection extends Mage_Core_Model_Mysql4_Collection_Abstract
{
    public function _construct()
    {
        parent::_construct();
        $this->_init('product/quote');
    }

    public function addAttributeToFilter($key , $value , $method = 'and')
    {
        switch($method) {
            case "in":
                if (is_array($value)) {
                    $_str = "";
                    foreach ($value as $val) {
                        $_str .= $val . ",";
                    }
                    $_str = trim($_str , ',');
                    $this->getSelect()->where($key . " IN($_str)");
                }
                break;

            case "like" :
                $this->getSelect()->orWhere($key . " LIKE ?", "%" .$value . "%");
                break;

            default:
                if (is_array($value)) {
                    foreach ($value as $val) {
                        $this->_select = $method == "and" ? $this->getSelect()->where($key . '=?' , $val) : $this->getSelect()->orwhere($key . '=?' , $val);
                    }
                }else{
                    $this->_select = $this->getSelect()->where($key . '=?' , $value);
                }
        }
        return $this;
    }
}