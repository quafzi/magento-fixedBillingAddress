<?php
class Quafzi_FixedBillingAddress_Model_Observer
{
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

    protected function _isCustomerLoggedIn()
    {
        return Mage::getSingleton('customer/session')->isLoggedIn();
    }

    protected function _getCustomer()
    {
        return Mage::getSingleton('customer/session')->getCustomer();
    }
}
