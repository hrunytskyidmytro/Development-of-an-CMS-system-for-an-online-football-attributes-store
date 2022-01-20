<?php

namespace core;

class Model
{
    public function GetAllGoods()
    {
        $getFS =  \core\Core::getInstance()->getDB()->select('footballshoes', '*');
        $getKFS =  \core\Core::getInstance()->getDB()->select('kidsfootballshoes', '*');
        $getC =  \core\Core::getInstance()->getDB()->select('clothing', '*');
        $getA =  \core\Core::getInstance()->getDB()->select('accessories', '*');

        foreach ($getFS as $item)
            $getAllcategories [] = $item;

        foreach ($getKFS as $item)
            $getAllcategories [] = $item;

        foreach ($getC as $item)
            $getAllcategories [] = $item;

        foreach ($getA as $item)
            $getAllcategories [] = $item;

        if(empty($getAllcategories))
            return null;
        else
            return $getAllcategories;

    }

    public function InsertBasket($tableName, $id)
    {
        $tovar = \core\Core::getInstance()->getDB()->select($tableName, '*',['id' => $id]);

        if(!isset($_SESSION['user']))
            return false;

        if(!empty($tovar))
            $tovar = $tovar[0];
        else
            return false;

        $row ['user_id'] = $_SESSION['user']['id'];
        $row ['user_lastname'] = $_SESSION['user']['lastname'];
        $row ['user_firstname'] = $_SESSION['user']['firstname'];
        $row ['tovar_id'] = $tovar['id'];
        $row ['tovar_title'] = $tovar['title'];
        $row ['tovar_photo'] = $tovar['photo'];
        $row ['tovar_price'] = $tovar['price'];
        $row['datetime'] = date('Y-m-d H:i:s');
        $row ['tovar_size'] = $tovar['size'];
        $row ['name_category'] = $tableName;
        $row ['tovar_count'] = 1;
        $id = \core\Core::getInstance()->getDB()->insert('basket',$row);
        return [
            'error' => false,
            'id' => $id
        ];
    }


    public function InsertOrders()
    {
        $id = $_SESSION['user']['id'];
        $tovar = \core\Core::getInstance()->getDB()->select('basket', '*',['user_id'=>$id]);

        if(!isset($_SESSION['user']))
            return false;

        for($i = 0; $i < count($tovar); $i++)
        {
            $row ['user_id'] = $_SESSION['user']['id'];
            $row ['user_lastname'] = $_SESSION['user']['lastname'];
            $row ['user_firstname'] = $_SESSION['user']['firstname'];
            $row ['tovar_id'] = $tovar[$i]['tovar_id'];
            $row ['tovar_title'] = $tovar[$i]['tovar_title'];
            $row ['tovar_photo'] = $tovar[$i]['tovar_photo'];
            $row ['tovar_price'] = $tovar[$i]['tovar_price'];
            $row ['tovar_size'] = $tovar[$i]['tovar_size'];
            $row ['tovar_count'] = 1;
            $row['datetime'] = date('Y-m-d H:i:s');
            $row ['name_category'] = $tovar[$i]['name_category'];
            $id = \core\Core::getInstance()->getDB()->insert('orders',$row);
        }

        \core\Core::getInstance()->getDB()->delete('basket', ['user_id'=>$_SESSION['user']['id']]);

        return [
            'error' => false,
            'id' => $id
        ];
    }

    public function GetAsc($tableName)
    {
        $asc = \core\Core::getInstance()->getDB()->select($tableName,'*',null,['price'=>'asc']);

        if(!empty($asc))
            return $asc;
        else
            return null;

    }

    public function GetDesc($tableName)
    {
        $desc = \core\Core::getInstance()->getDB()->select($tableName,'*',null,['price'=>'desc']);

        if(!empty($desc))
            return $desc;
        else
            return null;
    }

}