<?php

namespace models;

use core\Model;
use core\Utils;
use Imagick;

class Basket extends Model
{
    /**
     * Додавання та редагування фото
     * @param $id
     * @param $file
     * @return void
     */
    public function ChangePhoto($id, $file)
    {
        $folder = 'files/basket/';
        $file_path = pathinfo($folder.$file);
        $file_big = $file_path['filename'].'_b';
        $file_middle =$file_path['filename'].'_m';
        $file_small = $file_path['filename'].'_s';

        $basket = $this->GetBasketById($id);
        if(is_file($folder.$basket['photo']) &&  is_file($folder.$file))
            unlink($folder.$basket['photo']);

        if(is_file($folder.$basket['photo']) &&  is_file($folder.$file))
            unlink($folder.$basket['photo']);

        if(is_file($folder.$basket['photo']) &&  is_file($folder.$file))
            unlink($folder.$basket['photo']);
        $basket['photo'] = $file;

        //        -----------
        $im_b = new Imagick();
        $im_b->readImage($_SERVER['DOCUMENT_ROOT'].'/'.$folder.$file);
        $im_b->cropThumbnailImage(1280, 1024, true);
        $im_b->writeImage($_SERVER['DOCUMENT_ROOT'].'/'.$folder.'/'.$file_big.'.jpg');
        //        -----------
        $im_m = new Imagick();
        $im_m->readImage($_SERVER['DOCUMENT_ROOT'].'/'.$folder.$file);
        $im_m->cropThumbnailImage(300, 200, true);
        $im_m->writeImage($_SERVER['DOCUMENT_ROOT'].'/'.$folder.'/'.$file_middle.'.jpg');
        //        -----------
        $im_s = new Imagick();
        $im_s->readImage($_SERVER['DOCUMENT_ROOT'].'/'.$folder.$file);
        $im_s->cropThumbnailImage(180, 180, true);
        $im_s->writeImage($_SERVER['DOCUMENT_ROOT'].'/'.$folder.'/'.$file_small .'.jpg');

        unlink($folder.$file);

        $this->UpdateBasket($basket, $id);
    }

    /**
     * Додавання товару в кошик
     * @param $row
     * @return array|bool
     */
    public function AddBasket($id)
    {
        $userModel = new \models\Users();

        $footModel = new \models\FootballShoes();

        $user = $userModel->GetCurrentUser();
        if($user == null) {
            $result = [
                'error' => true,
                'messages' => ['Користувач не аутентифікований']
            ];
            return $result;
        }

        $rowFiltered['datetime'] = date('Y-m-d H:i:s');
        $rowFiltered['user_id'] = $user['id'];
        $rowFiltered['user_lastname'] = $user['lastname'];
        $rowFiltered['user_firstname'] = $user['firstname'];
        $id = \core\Core::getInstance()->getDB()->insert('basket',$rowFiltered);
        return [
            'error' => false,
            'id' => $id
        ];
    }

    /**
     * Отримання останніх товарів(кількість)
     * @param $count
     * @return array|false
     */
    public function GetLastBasket($count)
    {
        return \core\Core::getInstance()->getDB()->select('basket','*', null,['datetime' => 'DESC'], $count);
    }

    /**
     * Повернення товару по id
     * @param $id
     * @return array|bool
     */
    public function GetBasketById($id)
    {
        $basket = \core\Core::getInstance()->getDB()->select('basket','*', ['id' => $id]);
        if(!empty($basket))
            return $basket[0];
        else
            return null;
    }

    /**
     * Редагування товару
     */
    public function UpdateBasket($row, $id)
    {
        $userModel = new \models\Users();
        $user = $userModel->GetCurrentUser();
        if($user == null)
            return false;

        $fields = ['tovar_title','tovar_price','tovar_photo'];
        $rowFiltered = Utils::ArrayFilter($row, $fields);
        $rowFiltered['datetime_lastedit'] = date('Y-m-d H:i:s');
        \core\Core::getInstance()->getDB()->update('basket', $rowFiltered, ['id' => $id]);
        return true;
    }

    /**
     * Видалення товару
     */
    public function DeleteBasket($id)
    {
        $basket = $this->GetBasketById($id);
        $userModel = new \models\Users();

        $user = $userModel->GetCurrentUser();
        if(empty($basket) || empty($user) || $user['id'] != $basket['user_id'])
            return false;
        \core\Core::getInstance()->getDB()->delete('basket', ['id' => $id]);
        return true;
    }

}