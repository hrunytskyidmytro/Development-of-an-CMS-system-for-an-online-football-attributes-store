<?php

namespace controllers;

use core\Controller;

class Basket extends Controller
{
    protected $user;
    protected $basketModel;
    protected $userModel;
    public function __construct()
    {
        $this->userModel = new \models\Users();
        $this->basketModel = new \models\Basket();
        $this->user =$this->userModel->GetCurrentUser();
    }
    /**
     * Відображення початкової сторінки модуля
     */
    public function actionIndex()
    {
        global $Config;
        $title = 'Кошик';
        $tableName = $_GET['tableName'];
        $id = $_GET['id'];
        if (isset($_GET['id']) && isset($_GET['type']) && isset($_GET['tableName'])) {
            $count = \core\Core::getInstance()->getDB()->select('basket', 'tovar_count', ['id' => $id,'name_category' =>$tableName]);
            $count = $count[0]['tovar_count'];
            if ($_GET['type'] == 'add') {
                $count = (int)$count + 1;
            }
            else {
                if ($_GET['type'] == 'del')
                    {
                        if ($count != 1)
                            $count = (int)$count - 1;
                    }
            }
            \core\Core::getInstance()->getDB()->update('basket', ['tovar_count'=>$count], ['id' => $id,'name_category' =>$tableName]);
        }
        $lastBasket = $this->basketModel->GetLastBasket($Config['BasketCount']);
        return $this->render('index',['lastBasket' => $lastBasket],[
            'PageTitle'=>$title,
            'MainTitle'=>$title
        ]);
    }

    /**
     * Перегляд кошика
     * @return void
     */
    public function actionView()
    {
        $id = $_GET['id'];
        $basket = $this->basketModel->GetBasketById($id);
        $title = $basket['title'];
        return $this->render('view',['model' => $basket],[
            'PageTitle'=>$title,
            'MainTitle'=>$title,
        ]);
    }

    /**
     * Додавання товару в кошик
     * @return void
     */
    public function actionAdd()
    {
        $id = $_GET['id'];
        $tableName = $_GET['tableName'];
        $titleForbidden = 'Доступ заборонено';
        if(empty($this->user))
            return $this->render('forbidden',null,[
                'PageTitle' => $titleForbidden,
                'MainTitle' => $titleForbidden
            ]);
        $title = 'Додавання в кошик';
        if($this->isGet())
        {
            $result = $this->basketModel->InsertBasket($tableName, $id);
            if($result['error'] === false) {
                $allowed_types = ['image/png','image/jpeg'];
                if(is_file($_FILES['file']['tmp_name']) && in_array($_FILES['file']['type'], $allowed_types))
                {
                    switch ($_FILES['file']['type'])
                    {
                        case'image/png':
                            $extension = 'png';
                            break;
                        default:
                            $extension = 'jpg';
                    }
                    $name = $result['id'].'_'.uniqid().'.'.$extension;
                    move_uploaded_file($_FILES['file']['tmp_name'],'files/basket/'.$name);
                    $this->basketModel->ChangePhoto($result['id'],$name);
                }


                return $this->renderMessage('ok', 'Товар успішно додано в кошик',null,
                    [
                        'PageTitle'=>$title,
                        'MainTitle'=>$title
                    ]);
            }
            else
            {
                $message = implode('<br/>',$result['messages']);

                return $this->render('form',['model'=>$_GET], [
                    'PageTitle'=>$title,
                    'MainTitle'=>$title,
                    'MessageText'=>$message,
                    'MessageClass'=>'danger'
                ]);
            }
        }else
            return $this->render('form',['model'=>$_GET],[
                'PageTitle' => $title,
                'MainTitle' => $title
            ]);
    }



    /**
     * Редагування кошику
     * @return void
     */
    public function actionEdit()
    {
        $id = $_GET['id'];
        $basket = $this->basketModel->GetBasketById($id);
        $titleForbidden = 'Доступ заборонено';
        if(empty($this->user) || $basket['user_id'] != $this->userModel->GetCurrentUser()['id'])
            return $this->render('forbidden',null,[
                'PageTitle' => $titleForbidden,
                'MainTitle' => $titleForbidden
            ]);
        $title = 'Редагування корзини';
        if($this->isPost())
        {
            $result = $this->basketModel->UpdateBasket($_POST,$id);
            if($result === true) {
                $allowed_types = ['image/png','image/jpeg'];
                if(is_file($_FILES['file']['tmp_name']) && in_array($_FILES['file']['type'], $allowed_types))
                {
                    switch ($_FILES['file']['type'])
                    {
                        case'image/png':
                            $extension = 'png';
                            break;
                        default:
                            $extension = 'jpg';
                    }
                    $name = $id.'_'.uniqid().'.'.$extension;
                    move_uploaded_file($_FILES['file']['tmp_name'],'basket/basket/'.$name);
                    $this->basketModel->ChangePhoto($id,$name);
                }
                return $this->renderMessage('ok', 'успішно збережено',null,
                    [
                        'PageTitle'=>$title,
                        'MainTitle'=>$title
                    ]);
            }
            else
            {
                $message = implode('<br/>',$result);
                return $this->render('form',['model'=>$basket], [
                    'PageTitle'=>$title,
                    'MainTitle'=>$title,
                    'MessageText'=>$message,
                    'MessageClass'=>'danger'
                ]);
            }
        }else
            return $this->render('form',['model'=>$basket],[
                'PageTitle' => $title,
                'MainTitle' => $title
            ]);
    }


    /**
     * Видалення товару з кошика
     * @return void
     */
    public function actionDelete()
    {
        $title = 'Видалення товару з кошика';
        $id = $_GET['id'];
        if(isset($_GET['confirm']) && $_GET['confirm'] == 'yes')
        {
            if($this->basketModel->DeleteBasket($id))
                header('Location: /basket/');
            else
                return $this->renderMessage('error', 'Помилка видалення новини',null,
                    [
                        'PageTitle'=>$title,
                        'MainTitle'=>$title
                    ]);

        }
        $basket = $this->basketModel->GetBasketById($id);
        return $this->render('delete',['model' => $basket],[
            'PageTitle'=>$title,
            'MainTitle'=>$title,
        ]);
    }
}