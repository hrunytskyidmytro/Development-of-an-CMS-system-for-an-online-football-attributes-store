<?php

namespace models;

use core\Model;
use core\Utils;

class ResponseForClothing extends Model
{
    /**
     * Додавання відгуку
     * @param $row
     * @return array|bool
     */
    public function AddResponse($row)
    {
        $userModel = new \models\Users();

        $clothingModel = new \models\Clothing();

        $foot = $clothingModel->GetClothing($_GET['id']);

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

        $fields = ['text'];
        $rowFiltered = Utils::ArrayFilter($row, $fields);
        $rowFiltered['datetime'] = date('Y-m-d H:i:s');
        $rowFiltered['user_id'] = $user['id'];
        $rowFiltered['user_lastname'] = $user['lastname'];
        $rowFiltered['user_firstname'] = $user['firstname'];
        $rowFiltered['tovar_id'] = $foot['id'];
        $rowFiltered['tovar_title'] = $foot['title'];
        $id = \core\Core::getInstance()->getDB()->insert('response_for_clothing',$rowFiltered);
        return [
            'error' => false,
            'id' => $id
        ];
    }

    /**
     * Отримання останніх відгуків
     * @param $count
     * @return array|false
     */
    public function GetLastResponses($count)
    {
        return \core\Core::getInstance()->getDB()->select('response_for_clothing','*', null,['datetime' => 'DESC'], $count);
    }

    /**
     * Отримання відгуку по id
     * @param $id
     * @return array|bool
     */
    public function GetResponsesById($id)
    {
        $response = \core\Core::getInstance()->getDB()->select('response_for_clothing','*',['id' => $id]);
        if(!empty($response))
            return $response[0];
        else
            return null;
    }

    /**
     * Редагування відгуку
     */
    public function UpdateResponse($row, $id)
    {

        $userModel = new \models\Users();

        $user = $userModel->GetCurrentUser();
        if($user == null)
            return false;

        $validateResult = $this->Validate($row);
        if(is_array($validateResult))
            return $validateResult;

        $fields = ['text'];
        $rowFiltered = Utils::ArrayFilter($row, $fields);
        $rowFiltered['datetime_lastedit'] = date('Y-m-d H:i:s');
        \core\Core::getInstance()->getDB()->update('response_for_clothing', $rowFiltered, ['id' => $id]);
        return true;
    }

    /**
     * Видалення відгуку
     */
    public function DeleteResponse($id)
    {
        $response = $this->GetResponsesById($id);
        $userModel = new \models\Users();

        $user = $userModel->GetCurrentUser();
        if(empty($response) || empty($user) || $user['id'] != $response['user_id'])
            return false;
        \core\Core::getInstance()->getDB()->delete('response_for_clothing', ['id' => $id]);
        return true;
    }

    /**
     * Валідація відгуку(перевірка на порожність)
     */
    public function Validate($row)
    {
        $errors = [];

        if(empty($row['text']))
            $errors []= 'Поле "Текст" не може бути порожнім';

        if(count($errors) > 0)
            return $errors;
        else
            return true;
    }
}