<?php

namespace controllers;

use core\Controller;

/**
 * Контролер для модуля Accessories
 */
class Accessories extends Controller
{
    protected $user;
    protected $accessoriesModel;
    protected $userModel;
    public function __construct()
    {
        $this->userModel = new \models\Users();
        $this->accessoriesModel = new \models\Accessories();
        $this->user = $this->userModel->GetCurrentUser();
    }
    /**
     * Відображення початкової сторінки модуля
     */
    public function actionIndex()
    {
        global $Config;
        $title = 'Аксесуари - FootballFan.Shop - футбольний магазин';
        $lastAccessories = $this->accessoriesModel->GetLastAccessories($Config['AccessoriesCount']);

        if(isset($_GET['orderBy']))
            if($_GET['orderBy'] == 'asc')
                $orderBy = $this->accessoriesModel->GetAsc('accessories');
            if($_GET['orderBy'] == 'desc')
                $orderBy = $this->accessoriesModel->GetDesc('accessories');

        if(!empty($orderBy))
            $lastAccessories = $orderBy;



        return $this->render('index',['lastAccessories' => $lastAccessories],[
            'PageTitle'=>$title,
            'MainTitle'=>$title
        ]);
    }

    /**
     * Перегляд одного товару
     * @return void
     */
    public function actionView()
    {
        $id = $_GET['id'];
        $accessories = $this->accessoriesModel->GetAccessoriesById($id);
        $comments = $this->accessoriesModel->GetComment($id);
        $title = $accessories['title'];
        return $this->render('view',
            [
                'model' => $accessories,
                'comments' => $comments
            ]
            ,
            [
            'PageTitle'=>$title,
            'MainTitle'=>$title,
        ]);
    }

    /**
     * Додавання товару
     * @return array|mixed|null
     */
    public function actionAdd()
    {
        $titleForbidden = 'Доступ заборонено';
        if(empty($this->user))
            return $this->render('forbidden',null,[
                'PageTitle' => $titleForbidden,
                'MainTitle' => $titleForbidden
            ]);
        $title = 'Додавання товару';
        if($this->isPost())
        {
            $result = $this->accessoriesModel->AddAccessories($_POST);
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
                    move_uploaded_file($_FILES['file']['tmp_name'],'files/accessories/'.$name);
                    $this->accessoriesModel->ChangePhoto($result['id'],$name);
                }


                return $this->renderMessage('ok', 'Товар успішно додано',null,
                    [
                        'PageTitle'=>$title,
                        'MainTitle'=>$title
                    ]);
            }
            else
            {
                $message = implode('<br/>',$result['messages']);
                return $this->render('form',['model'=>$_POST], [
                    'PageTitle'=>$title,
                    'MainTitle'=>$title,
                    'MessageText'=>$message,
                    'MessageClass'=>'danger'
                ]);
            }
        }else
            return $this->render('form',['model'=>$_POST],[
                'PageTitle' => $title,
                'MainTitle' => $title
            ]);
    }

    /**
     * Редагування товару
     * @return void
     */
    public function actionEdit()
    {
        $id = $_GET['id'];
        $accessories = $this->accessoriesModel->GetAccessoriesById($id);
        $titleForbidden = 'Доступ заборонено';
        if(empty($this->user) || $accessories['user_id'] != $this->userModel->GetCurrentUser()['id'])
            return $this->render('forbidden',null,[
                'PageTitle' => $titleForbidden,
                'MainTitle' => $titleForbidden
            ]);
        $title = 'Редагування товару';
        if($this->isPost())
        {
            $result = $this->accessoriesModel->UpdateAccessories($_POST,$id);
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
                    move_uploaded_file($_FILES['file']['tmp_name'],'files/accessories/'.$name);
                    $this->accessoriesModel->ChangePhoto($id,$name);
                }
                return $this->renderMessage('ok', 'Товар успішно збережено',null,
                    [
                        'PageTitle'=>$title,
                        'MainTitle'=>$title
                    ]);
            }
            else
            {
                $message = implode('<br/>',$result);
                return $this->render('form',['model'=>$accessories], [
                    'PageTitle'=>$title,
                    'MainTitle'=>$title,
                    'MessageText'=>$message,
                    'MessageClass'=>'danger'
                ]);
            }
        }else
            return $this->render('form',['model'=>$accessories],[
                'PageTitle' => $title,
                'MainTitle' => $title
            ]);
    }

    /**
     * Видалення товару
     * @return void
     */
    public function actionDelete()
    {
        $title = 'Видалення товару';
        $id = $_GET['id'];
        if(isset($_GET['confirm']) && $_GET['confirm'] == 'yes')
        {
            if($this->accessoriesModel->DeleteAccessories($id))
                header('Location: /accessories/');
            else
                return $this->renderMessage('error', 'Помилка видалення товару',null,
                    [
                        'PageTitle'=>$title,
                        'MainTitle'=>$title
                    ]);

        }
        $news = $this->accessoriesModel->GetAccessoriesById($id);
        return $this->render('delete',['model' => $news],[
            'PageTitle'=>$title,
            'MainTitle'=>$title,
        ]);
    }
}