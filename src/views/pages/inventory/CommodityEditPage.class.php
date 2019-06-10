<?php
/**
 * LLR Technologies & Associated Services
 * Information Systems Development
 *
 * Mercury InfoScape
 *
 * User: lromero
 * Date: 4/13/2019
 * Time: 10:37 AM
 */


namespace views\pages\inventory;


use views\forms\inventory\CommodityForm;
use views\pages\ModelPage;

class CommodityEditPage extends ModelPage
{
    public function __construct(?string $commodityId)
    {
        parent::__construct("commodities/$commodityId", "itsm_inventory-commodities-r", 'inventory');

        $details = $this->response->getBody();

        $this->setVariable("tabTitle", "Commodity - " . $details['name'] . " (Edit)");

        $form = new CommodityForm($details);

        $this->setVariable("content", $form->getTemplate());
        $this->setVariable("cancelLink", "{{@baseURI}}inventory/commodities/{{@id}}");
        $this->setVariable("formScript", "return saveChanges('{{@id}}')");
        $this->setVariable('id', $commodityId);
    }
}