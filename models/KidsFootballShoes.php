<?php

namespace models;

use core\Model;
use core\Utils;
use Imagick;

class KidsFootballShoes extends Model
{
    /**
     * Додавання та редагування фото
     * @param $id
     * @param $file
     * @return void
     */
    public function ChangePhoto($id, $file)
    {
        $folder = 'files/kidsfootballshoes/';
        $file_path = pathinfo($folder.$file);
        $file_big = $file_path['filename'].'_b';
        $file_middle =$file_path['filename'].'_m';
        $file_small = $file_path['filename'].'_s';

        $kidsfootballshoes = $this->GetKidsFootballShoesById($id);
        if(is_file($folder.$kidsfootballshoes['photo'].'_b.jpg') &&  is_file($folder.$file))
            unlink($folder.$kidsfootballshoes['photo'].'_b.jpg');

        if(is_file($folder.$kidsfootballshoes['photo'].'_m.jpg') &&  is_file($folder.$file))
            unlink($folder.$kidsfootballshoes['photo'].'_m.jpg');

        if(is_file($folder.$kidsfootballshoes['photo'].'_s.jpg') &&  is_file($folder.$file))
            unlink($folder.$kidsfootballshoes['photo'].'_s.jpg');
        $kidsfootballshoes['photo'] = $file_path['filename'];

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

        $this->UpdateKidsFootballShoes($kidsfootballshoes, $id);
    }
    /**
     * Отримання останніх товарів
     * @param $count
     * @return array|false
     */
    public function GetLastKidsFootballShoes($count)
    {
        return \core\Core::getInstance()->getDB()->select('kidsfootballshoes','*', null,['datetime' => 'DESC'], $count);
    }

    /**
     * Повернення товару по id
     * @param $id
     * @return array|bool
     */
    public function GetKidsFootballShoesById($id)
    {
        $kidsfootballshoes = \core\Core::getInstance()->getDB()->select('kidsfootballshoes','*', ['id' => $id]);
        if(!empty($kidsfootballshoes))
            return $kidsfootballshoes[0];
        else
            return null;
    }

    /**
     * Додавання товару
     * @param $row
     * @return array|bool
     */
    public function AddKidsFootballShoes($row)
    {
        $userModel = new \models\Users();

        $user = $userModel->GetCurrentUser();
        if($user == null) {
            $result = [
                'error' => true,
                'messages' => ['Користувач не аутентифікований']
            ];
            return $result;
        }

        $validateResult = $this->Validate($row);

        if(is_array($validateResult)) {
            $result = [
                'error' => true,
                'messages' => $validateResult
            ];
            return $result;
        }

        $fields = ['title','short_text','price','article','brand','size'];
        $rowFiltered = Utils::ArrayFilter($row, $fields);
        $rowFiltered['datetime'] = date('Y-m-d H:i:s');
        $rowFiltered['user_id'] = $user['id'];
        $rowFiltered['photo'] = '...photo...';
        $id = \core\Core::getInstance()->getDB()->insert('kidsfootballshoes',$rowFiltered);
        return [
            'error' => false,
            'id' => $id
        ];
    }

    /**
     * Редагування товару
     */
    public function UpdateKidsFootballShoes($row, $id)
    {

        $userModel = new \models\Users();

        $user = $userModel->GetCurrentUser();
        if($user == null)
            return false;

        $validateResult = $this->Validate($row);
        if(is_array($validateResult))
            return $validateResult;

        $fields = ['title','short_text','price','article','brand','size','photo'];
        $rowFiltered = Utils::ArrayFilter($row, $fields);
        $rowFiltered['datetime_lastedit'] = date('Y-m-d H:i:s');
        \core\Core::getInstance()->getDB()->update('kidsfootballshoes', $rowFiltered, ['id' => $id]);
        return true;
    }

    /**
     * Валідація певної категорії товару(перевірка на порожність)
     */
    public function Validate($row)
    {
        $errors = [];
        if(empty($row['title']))
            $errors []= 'Поле "Заголовок товару" не може бути порожнім';
        if(empty($row['short_text']))
            $errors []= 'Поле "Короткий текст про товар" не може бути порожнім';
        if(empty($row['price']))
            $errors []= 'Поле "Ціна" не може бути порожнім';
        if(empty($row['article']))
            $errors []= 'Поле "Артикул" не може бути порожнім';
        if(empty($row['brand']))
            $errors []= 'Поле "Brand" не може бути порожнім';

        if(count($errors) > 0)
            return $errors;
        else
            return true;
    }

    /**
     * Видалення товару
     */
    public function DeleteKidsFootballShoes($id)
    {
        $kidsfootballshoes = $this->GetKidsFootballShoesById($id);
        $userModel = new \models\Users();

        $user = $userModel->GetCurrentUser();
        if(empty($kidsfootballshoes) || empty($user) || $user['id'] != $kidsfootballshoes['user_id'])
            return false;
        \core\Core::getInstance()->getDB()->delete('kidsfootballshoes', ['id' => $id]);
        return true;
    }

    /**
     * Отримую дані по id
     * @param $id
     * @return mixed|null
     */
    public function GetKidsFootballShoe($id)
    {
        $kidsfootshoes = \core\Core::getInstance()->getDB()->select('kidsfootballshoes', '*',['id' => $id]);

        if(!empty($kidsfootshoes))
            return $kidsfootshoes[0];
        else
            return null;
    }

    /**
     * Отримую відгуки по id
     * @param $id
     * @return array|null
     */
    public function GetComment($id)
    {
        $comments = \core\Core::getInstance()->getDB()->select('response_for_kids_football_shoes', '*',['tovar_id' => $id]);

        if(!empty($comments))
            return $comments;
        else
            return null;
    }
}