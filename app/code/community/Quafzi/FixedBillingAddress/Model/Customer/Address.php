<?php
/**
 * @category   Customer
 * @package    Quafzi_FixedBillingAddress
 * @license    http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 * @author     Thomas Birke <tbirke@netextreme.de>
 */
class Quafzi_FixedBillingAddress_Model_Customer_Address
    extends Mage_Customer_Model_Address
{
    public function setIsDefaultBilling($value)
    {
        if (false === $this->_isFixed()) {
            parent::setIsDefaultBilling($value);
        }
        return $this;
    }

    protected function _isFixed()
    {
        return Mage::helper('quafzi_fixedbillingaddress/data')->isAddressFixed();
    }
}
