<?php
/**
 * @category   Customer
 * @package    Quafzi_FixedBillingAddress
 * @license    http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 * @author     Thomas Birke <tbirke@netextreme.de>
 */
class Quafzi_FixedBillingAddress_Block_Customer_Address_Edit
    extends Mage_Customer_Block_Address_Edit
{
    public function canSetAsDefaultBilling()
    {
        if (Mage::helper('quafzi_fixedbillingaddress/data')->isAddressFixed()) {
            return false;
        }
        return parent::canSetAsDefaultBilling();
    }
}
