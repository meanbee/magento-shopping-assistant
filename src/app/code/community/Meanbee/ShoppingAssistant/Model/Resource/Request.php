<?php

class Meanbee_ShoppingAssistant_Model_Resource_Request extends Mage_Core_Model_Resource_Db_Abstract
{
    public function _construct()
    {
        $this->_init("meanbee_shoppingassistant/request", "entity_id");
    }
}
