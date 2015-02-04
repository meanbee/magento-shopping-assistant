<?php

class Meanbee_ShoppingAssistant_Block_Adminhtml_Request extends Mage_Adminhtml_Block_Widget_Grid_Container
{
    public function __construct()
    {
        parent::__construct();

        $this->_blockGroup = "meanbee_shoppingassistant";
        $this->_controller = "adminhtml_request";
        $this->_headerText = $this->__("Shopping Assistant Requests");

        $this->_removeButton('add');
    }
}
