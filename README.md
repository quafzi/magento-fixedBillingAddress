# Quafzi_FixedBillingAddress

This Magento extension denies logged-in customers to change their billing address.
Therefor edit links are hidden, and billing address drop-down is replaced by a simple address output in checkout.

## Installation

Require it in your `composer.json`

    composer require "quafzi/fixed-billing-address" "dev-master"

or install using modman

    modman clone git@github.com:quafzi/magento-fixedBillingAddress.git

or just copy it into your Magento root folder.

## Configuration

There is only one configuration setting for this extension: You can switch it on/off on website level at
`System`→`Configuration`→`Customer`→`Name and Address Options`→`Customer is allowed to change his billing address`.
