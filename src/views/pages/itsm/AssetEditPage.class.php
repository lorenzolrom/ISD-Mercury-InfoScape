<?php
/**
 * LLR Technologies & Associated Services
 * Information Systems Development
 *
 * Mercury Merlot
 *
 * User: lromero
 * Date: 4/26/2019
 * Time: 8:48 AM
 */


namespace views\pages\itsm;


use views\forms\itsm\AssetForm;
use views\pages\ModelPage;

class AssetEditPage extends ModelPage
{
    public function __construct(?string $assetTag)
    {
        parent::__construct("assets/$assetTag", 'itsm_inventory-assets-w', 'inventory');

        $details = $this->response->getBody();

        $this->setVariable('tabTitle', 'Asset - ' . $details['assetTag'] . ' (Edit)');

        $form = new AssetForm($details);

        $this->setVariable("content", $form->getTemplate());
    }
}