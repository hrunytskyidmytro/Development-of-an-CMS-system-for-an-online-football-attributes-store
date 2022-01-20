<?php

namespace controllers;

use core\Controller;

/**
 * Контролер для модуля Orders
 */
class Orders extends Controller
{
    protected $user;
    protected $ordersModel;
    protected $userModel;
    public function __construct()
    {
        $this->userModel = new \models\Users();
        $this->ordersModel = new \models\Orders();
        $this->user =$this->userModel->GetCurrentUser();
    }
    /**
     * Відображення початкової сторінки модуля
     */
    public function actionIndex()
    {
        global $Config;
        $title = 'Придбані товари';
        $lastOrders = $this->ordersModel->GetLastOrders($Config['NewsCount']);
        return $this->render('index',['lastOrders' => $lastOrders],[
            'PageTitle'=>$title,
            'MainTitle'=>$title
        ]);
    }

    /**
     * Перегляд
     * @return void
     */
    public function actionView()
    {
        $id = $_GET['id'];
        $orders = $this->ordersModel->GetOrdersById($id);
        $title = $orders['title'];
        return $this->render('view',['model' => $orders],[
            'PageTitle'=>$title,
            'MainTitle'=>$title,
        ]);
    }

    /**
     * Додавання
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
        $title = 'Купівля товару';
        if($this->isGet())
        {
            $result = $this->ordersModel->InsertOrders();
            if($result['error'] === false) {
                return $this->renderMessage('ok', 'Товар куплено',null,
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
     * Редагування
     * @return void
     */
    public function actionEdit()
    {
        $id = $_GET['id'];
        $orders = $this->ordersModel->GetOrdersById($id);
        $titleForbidden = 'Доступ заборонено';
        if(empty($this->user) || $orders['user_id'] != $this->userModel->GetCurrentUser()['id'])
            return $this->render('forbidden',null,[
                'PageTitle' => $titleForbidden,
                'MainTitle' => $titleForbidden
            ]);
        $title = 'Редагування при купівлі товару';
        if($this->isPost())
        {
            $result = $this->ordersModel->UpdateOrders($_POST,$id);
            if($result === true) {
                return $this->renderMessage('ok', 'Товар куплено',null,
                    [
                        'PageTitle'=>$title,
                        'MainTitle'=>$title
                    ]);
            }
            else
            {
                $message = implode('<br/>',$result);
                return $this->render('form',['model'=>$orders], [
                    'PageTitle'=>$title,
                    'MainTitle'=>$title,
                    'MessageText'=>$message,
                    'MessageClass'=>'danger'
                ]);
            }
        }else
            return $this->render('form',['model'=>$orders],[
                'PageTitle' => $title,
                'MainTitle' => $title
            ]);
    }


    /**
     * Видалення
     * @return void
     */
    public function actionDelete()
    {
        $title = 'Видалення товару';
        $id = $_GET['id'];
        if(isset($_GET['confirm']) && $_GET['confirm'] == 'yes')
        {
            if($this->ordersModel->DeleteOrders($id))
                header('Location: /site/');
            else
                return $this->renderMessage('error', 'Помилка видалення товару',null,
                    [
                        'PageTitle'=>$title,
                        'MainTitle'=>$title
                    ]);

        }
        $news = $this->ordersModel->GetOrdersById($id);
        return $this->render('delete',['model' => $news],[
            'PageTitle'=>$title,
            'MainTitle'=>$title,
        ]);
    }
}