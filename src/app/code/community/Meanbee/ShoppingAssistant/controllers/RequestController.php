<?php

class Meanbee_ShoppingAssistant_RequestController extends Mage_Core_Controller_Front_Action
{
    public function createAction()
    {
        $response = array(
            'response' => "",
            'errors' => array()
        );

        if (!Mage::helper("meanbee_shoppingassistant/config")->isEnabled()) {
            $response['errors'][] = "Cannot submit shopping assistant requests at this time";
        } else if ($this->getRequest()->isPost()) {
            $request = Mage::getModel("meanbee_shoppingassistant/request");

            $request->setData(array(
                "name" => $this->getRequest()->getPost("name"),
                "url"  => $this->getRequest()->getPost("url")
            ));

            if ($email = $this->getRequest()->getPost('email')) {
                $customer = Mage::getModel('customer/customer');
                $customer->setWebsiteId(Mage::app()->getWebsite()->getId());
                $customer->loadByEmail($email);

                if ($customer->getId()) {
                    $request->setCustomerId($customer->getId());
                }
            }

            $request->save();

            $response['response'] = "Assistant on their way";
        } else {
            $response['errors'][] = "Request not submitted through post";
        }

        $this->getResponse()->clearHeaders()->setHeader('Content-type','application/json',true);
        $this->getResponse()->setBody(json_encode($response));
    }
}
