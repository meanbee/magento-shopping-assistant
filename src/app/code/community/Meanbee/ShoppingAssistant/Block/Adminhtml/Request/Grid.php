<?php

class Meanbee_ShoppingAssistant_Block_Adminhtml_Request_Grid extends Mage_Adminhtml_Block_Widget_Grid
{
    public function __construct()
    {
        parent::__construct();
        $this->setId("meanbee_shoppingassistant_request_grid");
        $this->setDefaultSort("created_at");
        $this->setDefaultDir("DESC");
    }

    protected function _prepareCollection()
    {
        $collection = Mage::getModel("meanbee_shoppingassistant/request")->getCollection();

        $this->setCollection($collection);

        return parent::_prepareCollection();
    }

    protected function _prepareColumns()
    {
        $this->addColumn("created_at", array(
            "header" => $this->__("Requested At"),
            "index"  => "created_at",
            "type"   => "datetime",
            "width"  => "100px",
        ));

        $this->addColumn("action", array(
            "header"   => $this->__("Action"),
            "type"     => "action",
            "getter"   => "getUrl",
            "actions"  => array(
                array(
                    "caption" => $this->__("Attend"),
                    "title"   => $this->__("Attend"),
                    "url"     => "",
                    "target"  => "_blank",
                )
            ),
            "width"    => "50px",
            "filter"   => false,
            "sortable" => false,
        ));

        return parent::_prepareColumns();
    }
}
