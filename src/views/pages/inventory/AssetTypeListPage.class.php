<?php
/**
 * LLR Technologies & Associated Services
 * Information Systems Development
 *
 * Mercury InfoScape
 *
 * User: lromero
 * Date: 4/13/2019
 * Time: 12:13 PM
 */


namespace views\pages\inventory;


use views\pages\MainDocument;

class AssetTypeListPage extends MainDocument
{
    public function __construct()
    {
        parent::__construct("itsm_inventory-commodities-r", 'inventory');

        $this->setVariable("tabTitle", "Asset Types");
        $this->setVariable("content", self::templateFileContents("inventory/AssetTypeList", self::TEMPLATE_PAGE));
    }
}