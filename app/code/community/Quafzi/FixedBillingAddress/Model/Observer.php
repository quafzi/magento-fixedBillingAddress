<?php
/**
 * @category   Customer
 * @package    Quafzi_FixedBillingAddress
 * @license    http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 * @author     Thomas Birke <tbirke@netextreme.de>
 */
class Quafzi_FixedBillingAddress_Model_Observer
{
    /**
     * force default billing address in checkout
     */
    public function controller_action_predispatch_checkout_onepage_saveBilling($observer)
    {
        if (false === Mage::helper('quafzi_fixedbillingaddress/data')->isAddressFixed()) {
            return;
        }
        $request = $observer->getControllerAction()->getRequest();
        if ($request->isPost() && $this->_isCustomerLoggedIn()) {
            $billingAddressId = $this->_getCustomer()->getDefaultBilling();
            $request->setPost('billing_address_id', $billingAddressId);
        }
    }

    /**
     * deny change of default billing address in customer account
     */
    public function controller_action_predispatch_customer_address_formPost($observer)
    {
        $request = $observer->getControllerAction()->getRequest();
        if (Mage::helper('quafzi_fixedbillingaddress/data')->isAddressFixed()
            && $request->isPost()
            && $this->_isCustomerLoggedIn()
            && $this->_getCustomer()->getDefaultBilling() == $request->getParam('id')
        ) {
            // trigger create instead of change
            $request->setParam('id', null);
        }

    }

    /**
     * if customer is logged in
     *
     * @return boolean
     */
    protected function _isCustomerLoggedIn()
    {
        return Mage::getSingleton('customer/session')->isLoggedIn();
    }

    /**
     * get current user
     *
     * @return Mage_Customer_Model_Customer
     */
    protected function _getCustomer()
    {
        return Mage::getSingleton('customer/session')->getCustomer();
    }
}
