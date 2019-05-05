<?php
/**
 * LLR Technologies & Associated Services
 * Information Systems Development
 *
 * Mercury Merlot
 *
 * User: lromero
 * Date: 5/04/2019
 * Time: 10:32 PM
 */


namespace views\pages\admin;


use utilities\InfoCentralConnection;
use views\forms\admin\RoleForm;
use views\pages\ModelPage;

class RoleEditPage extends ModelPage
{
    public function __construct(?string $param)
    {
        parent::__construct("roles/$param", 'settings', 'admin');

        $details = $this->response->getBody();

        $permissions = InfoCentralConnection::getResponse(InfoCentralConnection::GET, "roles/$param/permissions")->getBody();
        $details['permissions'] = $permissions;

        $this->setVariable('tabTitle', "Role - {$details['name']} (Edit)");

        $form = new RoleForm($details);

        $this->setVariable('content', $form->getTemplate());
        $this->setVariable('formScript', "return save('$param')");
    }
}