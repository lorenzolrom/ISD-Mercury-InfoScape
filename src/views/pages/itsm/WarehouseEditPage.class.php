<?php
/**
 * LLR Technologies & Associated Services
 * Information Systems Development
 *
 * Mercury Merlot
 *
 * User: lromero
 * Date: 4/14/2019
 * Time: 12:15 PM
 */


namespace views\pages\itsm;


use views\forms\itsm\WarehouseForm;
use views\pages\ModelPage;

class WarehouseEditPage extends ModelPage
{
    public function __construct(?string $warehouseId)
    {
        parent::__construct("warehouses/$warehouseId", 'itsm_inventory-warehouses-r', 'inventory');

        $details = $this->response->getBody();

        $this->setVariable("tabTitle", "Warehouse - " . $details['name'] . " (Edit)");

        $form = new WarehouseForm($details);

        $this->setVariable("content", $form->getTemplate());
        $this->setVariable("cancelLink", "{{@baseURI}}inventory/warehouses");
        $this->setVariable("formScript", "return saveChanges('{{@id}}')");
        $this->setVariable("id", $warehouseId);
    }
}