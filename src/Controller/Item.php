<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 11/10/17
 * Time: 16:07
 */

namespace Controller;


class Item extends AbstractController
{
    public function index(){
        return 'L\'item';

    }
    public function details($id){
        return 'Item numéro ' . $id;
    }
}