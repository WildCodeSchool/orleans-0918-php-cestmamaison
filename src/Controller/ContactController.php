<?php
/**
 * Created by PhpStorm.
 * User: wilder22
 * Date: 19/10/18
 * Time: 11:22
 */

namespace Controller;


class ContactController
{
    public function index()
    {
        return $this->twig->render('Contact/index.html.twig');
    }
}