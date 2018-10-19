<?php
/**
 * Created by PhpStorm.
 * User: wilder22
 * Date: 19/10/18
 * Time: 11:22
 */

namespace Controller;


class ContactController  extends AbstractController
{
    public function index()
    {
        return $this->twig->render('/Visitor/Contact/index.html.twig');
    }
}
