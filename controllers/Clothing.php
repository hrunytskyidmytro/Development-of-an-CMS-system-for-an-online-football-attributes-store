<?php

namespace controllers;

use core\Controller;

/**
 * Контролер для модуля Clothing
 */
class Clothing extends Controller
{
    protected $user;
    protected $clothingModel;
    protected $userModel;
    public function __construct()
    {
        $this->userModel = new \models\Users();
        $this->clothingModel = new \models\Clothing();
        $this->user = $this->userModel->GetCurrentUser();
    }

    /**
     * Відображення початкової сторінки модуля
     */
    public function actionIndex()
    {
        global $Config;
        $title = 'Футбольний одяг - FootballFan.Shop - футбольний магазин';
        $lastClothing = $this->clothingModel->GetLastClothing($Config['ClothingCount']);

        if(isset($_GET['orderBy']))
            if($_GET['orderBy'] == 'asc')
                $orderBy = $this->clothingModel->GetAsc('clothing');
            if($_GET['orderBy'] == 'desc')
                $orderBy = $this->clothingModel->GetDesc('clothing');

        if(!empty($orderBy))
            $lastClothing = $orderBy;

        return $this->render('index',['lastClothing' => $lastClothing],[
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
        $clothing = $this->clothingModel->GetClothingById($id);
        $title = $clothing['title'];
        $comments = $this->clothingModel->GetComment($id);
        return $this->render('view',
            [
                'model' => $clothing,
                'comments' => $comments
            ]
            ,
            [
            'PageTitle'=>$title,
            'MainTitle'=>$title,
        ]);
    }

    /**
     * Додавання одного товару
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
            $result = $this->clothingModel->AddClothing($_POST);
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
                    move_uploaded_file($_FILES['file']['tmp_name'],'files/clothing/'.$name);
                    $this->clothingModel->ChangePhoto($result['id'],$name);
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
        $clothing = $this->clothingModel->GetClothingById($id);
        $titleForbidden = 'Доступ заборонено';
        if(empty($this->user) || $clothing['user_id'] != $this->userModel->GetCurrentUser()['id'])
            return $this->render('forbidden',null,[
                'PageTitle' => $titleForbidden,
                'MainTitle' => $titleForbidden
            ]);
        $title = 'Редагування товару';
        if($this->isPost())
        {
            $result = $this->clothingModel->UpdateClothing($_POST,$id);
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
                    move_uploaded_file($_FILES['file']['tmp_name'],'files/clothing/'.$name);
                    $this->clothingModel->ChangePhoto($id,$name);
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
                return $this->render('form',['model'=>$clothing], [
                    'PageTitle'=>$title,
                    'MainTitle'=>$title,
                    'MessageText'=>$message,
                    'MessageClass'=>'danger'
                ]);
            }
        }else
            return $this->render('form',['model'=>$clothing],[
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
            if($this->clothingModel->DeleteClothing($id))
                header('Location: /clothing/');
            else
                return $this->renderMessage('error', 'Помилка видалення товару',null,
                    [
                        'PageTitle'=>$title,
                        'MainTitle'=>$title
                    ]);

        }
        $news = $this->clothingModel->GetClothingById($id);
        return $this->render('delete',['model' => $news],[
            'PageTitle'=>$title,
            'MainTitle'=>$title,
        ]);
    }
}