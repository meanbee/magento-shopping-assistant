<?php

class Meanbee_ShoppingAssistant_Adminhtml_Shopping_AssistantController extends Mage_Adminhtml_Controller_Action
{
    public function indexAction()
    {
        $this->_title(Mage::helper("adminhtml")->__("Customers"))->_title($this->__("Shopping Assistant Requests"));
        $this->loadLayout();

        $this->_setActiveMenu("customer/meanbee_shoppingassistant");

        $this->_addContent(
            $this->getLayout()->createBlock("meanbee_shoppingassistant/adminhtml_request", "meanbee_shoppingassistant_request")
        );

        $this->_addBreadcrumb(Mage::helper("adminhtml")->__("Customers"), Mage::helper("adminhtml")->__("Customers"));
        $this->_addBreadcrumb($this->__("Manage Customers"), $this->__("Shopping Assistant Requests"));

        $this->renderLayout();
    }

    protected function _isAllowed()
    {
        return Mage::getSingleton("admin/session")->isAllowed("customer/meanbee_shoppingassistant");
    }
}
