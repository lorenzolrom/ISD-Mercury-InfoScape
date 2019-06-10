<?php
/**
 * LLR Technologies & Associated Services
 * Information Systems Development
 *
 * Mercury InfoScape
 *
 * User: lromero
 * Date: 5/06/2019
 * Time: 9:36 AM
 */


namespace views\pages\monitor;


use views\pages\MainDocument;

class HostCategoryListPage extends MainDocument
{
    public function __construct()
    {
        parent::__construct('itsmmonitor-hosts-w', 'monitor');

        $this->setVariable('tabTitle', 'Monitor Configuration');
        $this->setVariable('content', self::templateFileContents('monitor/HostCategoryListPage', self::TEMPLATE_PAGE));
    }
}