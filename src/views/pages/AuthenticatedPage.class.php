<?php
/**
 * LLR Technologies & Associated Services
 * Information Systems Development
 *
 * Mercury InfoScape
 *
 * User: lromero
 * Date: 4/07/2019
 * Time: 5:53 PM
 */


namespace views\pages;


use exceptions\SecurityException;
use models\HTTPResponse;
use models\User;
use utilities\InfoCentralConnection;
use views\View;

abstract class AuthenticatedPage extends View
{
    protected $user;

    /**
     * AuthenticatedPage constructor.
     * @param string|null $permission
     * @throws SecurityException
     * @throws \exceptions\InfoCentralException
     */
    public function __construct(string $permission = NULL)
    {
        // Verify user is logged in
        $response = InfoCentralConnection::getResponse(InfoCentralConnection::GET, "currentUser");

        if($response->getResponseCode() !== HTTPResponse::OK)
            throw new SecurityException(SecurityException::MESSAGE[SecurityException::USER_NOT_LOGGED_IN], SecurityException::USER_NOT_LOGGED_IN);

        $this->user = new User($response->getBody());

        if($permission !== NULL)
        {
            $response = InfoCentralConnection::getResponse(InfoCentralConnection::GET, "currentUser/permissions");

            if(!in_array($permission, $response->getBody()))
                throw new SecurityException(SecurityException::MESSAGE[SecurityException::USER_DOES_NOT_HAVE_PERMISSION], SecurityException::USER_DOES_NOT_HAVE_PERMISSION);
        }


    }
}