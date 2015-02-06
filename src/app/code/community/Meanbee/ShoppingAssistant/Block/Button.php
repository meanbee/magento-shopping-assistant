<?php
/**
 * Class Meanbee_ShoppingAssistant_Block_Button
 */
class Meanbee_ShoppingAssistant_Block_Button extends Mage_Core_Block_Template
{

    /**
     * Return the name of the service
     *
     * @return string
     */
    public function getToolName()
    {
        return $this->__('Shopping Assistant');
    }

    /**
     * Get website name for use in the shopping assistant popup
     *
     * @return string
     */
    public function getWebsiteName()
    {
        return Mage::app()->getWebsite()->getName();
    }

    /**
     * Get email address of either the admin user or logged in customer.
     *
     * @return string
     */
    public function getEmail()
    {
        if($user = $this->getCurrentUser()) {
            return $user->getEmail();
        }

        return '';
    }

    /**
     * Get name of user
     *
     * @return string
     */
    public function getName()
    {
        if($user = $this->getCurrentUser()) {
            return sprintf("%s %s", $user->getFirstname(), $user->getLastname());
        }

        return '';
    }

    /**
     * Return hex code for user as user colour
     *
     * @return string
     */
    public function getColour()
    {
        return "#" . substr(md5(rand()), 0, 6);
    }

    /**
     * Get URL of user avatar
     *
     * @return string
     */
    public function getAvatarUrl()
    {
        if($user = $this->getCurrentUser()) {
            return sprintf("http://www.gravatar.com/avatar/%s", md5(strtolower($user->getEmail())));
        }

        return '';
    }

    /**
     * Return either customer user
     *
     * @return Mage_Customer_Model_Customer
     */
    protected function getCurrentUser()
    {
        /** @var Mage_Customer_Model_Session $adminSession */
        $customerSession = Mage::getSingleton('customer/session');
        if ($customerSession->isLoggedIn()) {
            return $customerSession->getCustomer();
        }
    }
}