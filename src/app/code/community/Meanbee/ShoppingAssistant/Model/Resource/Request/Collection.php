<?php

class Meanbee_ShoppingAssistant_Model_Resource_Request_Collection extends Mage_Core_Model_Resource_Db_Collection_Abstract
{
    public function _construct()
    {
        $this->_init("meanbee_shoppingassistant/request");
    }
}
