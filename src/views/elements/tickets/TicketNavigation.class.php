<?php
/**
 * LLR Technologies & Associated Services
 * Information Systems Development
 *
 * Mercury MAP InfoScape
 *
 * User: lromero
 * Date: 5/13/2019
 * Time: 2:37 PM
 */


namespace views\elements\tickets;

use views\elements\Navigation;

/**
 * Class TicketNavigation
 *
 * Navigation menu for the ticket module
 *
 * @package views\elements\tickets
 */
class TicketNavigation extends Navigation
{
    public const BASE_URI = 'tickets/';

    public const LINKS = array(
        'requests' => array(
            'title' => 'Requests',
            'permission' => 'tickets-customer',
            'link' => 'requests',
            'icon' => 'help.png'
        ),
        'agent' => array(
            'title' => 'Agent',
            'permission' => 'tickets-agent',
            'icon' => 'business.png',
            'pages' => array(
                array(
                    'title' => 'Service Desk',
                    'link' => 'agent',
                    'icon' => 'ticket.png',
                    'permission' => 'tickets-agent'
                ),
//                array(
//                    'title' => 'New Ticket',
//                    'link' => 'agent/new',
//                    'icon' => 'ticket.png',
//                    'operation' => 'add',
//                    'permission' => 'tickets-agent'
//                ),
                array(
                    'title' => 'Advanced Search',
                    'link' => 'agent/search',
                    'icon' => 'ticket.png',
                    'operation' => 'search',
                    'permission' => 'tickets-agent'
                )
            )
        ),
        'admin' => array(
            'title' => 'Admin',
            'permission' => 'tickets-admin',
            'icon' => 'admin.png',
            'pages' => array(
                array(
                    'title' => 'Workspaces',
                    'permission' => 'tickets-admin',
                    'icon' => 'report.png',
                    'link' => 'admin/workspaces'
                ),
                array(
                    'title' => 'Teams',
                    'permission' => 'tickets-admin',
                    'icon' => 'group.png',
                    'link' => 'admin/teams'
                )
            )
        )
    );

    /**
     * TicketNavigation constructor.
     * @throws \exceptions\InfoCentralException
     * @throws \exceptions\ViewException
     */
    public function __construct()
    {
        parent::__construct(self::BASE_URI, self::LINKS);
    }
}