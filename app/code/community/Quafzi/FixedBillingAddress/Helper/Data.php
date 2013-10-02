<?php
/**
 * @category   Customer
 * @package    Quafzi_FixedBillingAddress
 * @license    http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 * @author     Thomas Birke <tbirke@netextreme.de>
 */
class Quafzi_FixedBillingAddress_Helper_Data
    extends Mage_Core_Helper_Abstract
{
    public function isAddressFixed()
    {
        $isAdmin = Mage::getSingleton('admin/session')->isLoggedIn();
        $isChangeable = (bool)(int)Mage::getStoreConfig('customer/address/change_billing_allowed');

        return (false === $isAdmin && false === $isChangeable);
    }
}
