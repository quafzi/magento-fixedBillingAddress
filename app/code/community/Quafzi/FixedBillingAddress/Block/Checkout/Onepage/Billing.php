<?php
class Quafzi_FixedBillingAddress_Block_Checkout_Onepage_Billing
    extends Mage_Checkout_Block_Onepage_Billing
{
    public function getAddressesHtmlSelect($type)
    {
        if ('billing' !== $type) {
            return parent::getAddressesHtmlSelect($type);
        }
        $selectId = 'billing-address-select';
        $js = '<script type="text/javascript">$("' . $selectId . '").parentElement.previousElementSibling.hide()</script>';
        return '<input id="' . $selectId . '" type="hidden" value="' . $this->getAddress()->getAddressId() . '">'
            . $this->_getBillingAddressHtml() . $js;
    }

    protected function _getBillingAddressHtml()
    {
        $address = $this->getCustomer()->getPrimaryBillingAddress();
        if ($address instanceof Varien_Object) {
            return $address->format('html');
        }
    }
}
