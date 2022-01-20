<?php

namespace models;

use core\Model;
use core\Utils;

class Orders extends Model
{
    /**
     * Додавання товару
     * @param $row
     * @return array|bool
     */
    public function AddOrders($row)
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

        $fields = ['title','short_text','text'];
        $rowFiltered = Utils::ArrayFilter($row, $fields);
        $rowFiltered['datetime'] = date('Y-m-d H:i:s');
        $rowFiltered['user_id'] = $user['id'];
        $rowFiltered['photo'] = '...photo...';
        $id = \core\Core::getInstance()->getDB()->insert('orders',$rowFiltered);
        return [
            'error' => false,
            'id' => $id
        ];
    }

    /**
     * Отримання останніх товарів
     * @param $count
     * @return array|false
     */
    public function GetLastOrders($count)
    {
        return \core\Core::getInstance()->getDB()->select('orders','*', null,['datetime' => 'DESC'], $count);
    }

    /**
     * Повернення товару
     * @param $id
     * @return array|bool
     */
    public function GetOrdersById($id)
    {
        $news = \core\Core::getInstance()->getDB()->select('orders','*', ['id' => $id]);
        if(!empty($news))
            return $news[0];
        else
            return null;
    }

    /**
     * Редагування товару
     */
    public function UpdateOrders($row, $id)
    {

        $userModel = new \models\Users();

        $user = $userModel->GetCurrentUser();
        if($user == null)
            return false;

        $validateResult = $this->Validate($row);
        if(is_array($validateResult))
            return $validateResult;

        $fields = ['title','short_text','text','photo'];
        $rowFiltered = Utils::ArrayFilter($row, $fields);
        $rowFiltered['datetime_lastedit'] = date('Y-m-d H:i:s');
        \core\Core::getInstance()->getDB()->update('orders', $rowFiltered, ['id' => $id]);
        return true;
    }

    /**
     * Видалення новини
     */
    public function DeleteOrders($id)
    {
        $news = $this->GetOrdersById($id);
        $userModel = new \models\Users();

        $user = $userModel->GetCurrentUser();
        if(empty($news) || empty($user) || $user['id'] != $news['user_id'])
            return false;
        \core\Core::getInstance()->getDB()->delete('news', ['id' => $id]);
        return true;
    }

    /**
     * Валідація певної новини(перевірка на порожність)
     */
    public function Validate($row)
    {
        $errors = [];
        if(empty($row['title']))
            $errors []= 'Поле "Заголовок новини" не може бути порожнім';
        if(empty($row['short_text']))
            $errors []= 'Поле "Короткий текст новини" не може бути порожнім';
        if(empty($row['text']))
            $errors []= 'Поле "Повний текст новини" не може бути порожнім';

        if(count($errors) > 0)
            return $errors;
        else
            return true;
    }
}