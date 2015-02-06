<?php

class Meanbee_ShoppingAssistant_Helper_Config extends Mage_Core_Helper_Abstract
{
    const XML_PATH_ENABLED = "meanbee_shoppingassistant/general/enabled";

    /**
     * Check if the extension is enabled for the given store. Check for
     * the current store if none specified.
     *
     * @param Mage_Core_Model_Store|int|null $store
     *
     * @return bool
     */
    public function isEnabled($store = null)
    {
        return Mage::getStoreConfigFlag(static::XML_PATH_ENABLED, $store);
    }
}
