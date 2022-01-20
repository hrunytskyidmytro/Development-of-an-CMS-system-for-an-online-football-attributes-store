<?php

namespace controllers;

use core\Controller;

/**
 * Контролер для модуля FootballShoes
 */
class FootballShoes extends Controller
{
    protected $user;
    protected $footballShoesModel;
    protected $userModel;
    public function __construct()
    {
        $this->userModel = new \models\Users();
        $this->footballShoesModel = new \models\FootballShoes();
        $this->user = $this->userModel->GetCurrentUser();
    }

    /**
     * Відображення початкової сторінки модуля
     */
    public function actionIndex()
    {
        global $Config;
        $title = 'Футбольне взуття - FootballFan.Shop - футбольний магазин';
        $lastFootballShoes = $this->footballShoesModel->GetLastFootballShoes($Config['FootballShoesCount']);
        if(isset($_GET['orderBy']))
            if($_GET['orderBy'] == 'asc')
                $orderBy = $this->footballShoesModel->GetAsc('footballshoes');
            if($_GET['orderBy'] == 'desc')
                $orderBy = $this->footballShoesModel->GetDesc('footballshoes');

        if(!empty($orderBy))
            $lastFootballShoes = $orderBy;

        return $this->render('index',['lastFootballShoes' => $lastFootballShoes],[
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
        $footballshoes = $this->footballShoesModel->GetFootballShoesById($id);
        $comments = $this->footballShoesModel->GetComment($id);
        $title = $footballshoes['title'];
        return $this->render('view',
            [
                'model' => $footballshoes,
                'comments' => $comments
            ],
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
            $result = $this->footballShoesModel->AddFootballShoes($_POST);
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
                    move_uploaded_file($_FILES['file']['tmp_name'],'files/footballshoes/'.$name);
                    $this->footballShoesModel->ChangePhoto($result['id'],$name);
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
        $footballshoes = $this->footballShoesModel->GetFootballShoesById($id);
        $titleForbidden = 'Доступ заборонено';
        if(empty($this->user) || $footballshoes['user_id'] != $this->userModel->GetCurrentUser()['id'])
            return $this->render('forbidden',null,[
                'PageTitle' => $titleForbidden,
                'MainTitle' => $titleForbidden
            ]);
        $title = 'Редагування товару';
        if($this->isPost())
        {
            $result = $this->footballShoesModel->UpdateFootballShoes($_POST,$id);
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
                    move_uploaded_file($_FILES['file']['tmp_name'],'files/footballshoes/'.$name);
                    $this->footballShoesModel->ChangePhoto($id,$name);
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
                return $this->render('form',['model'=>$footballshoes], [
                    'PageTitle'=>$title,
                    'MainTitle'=>$title,
                    'MessageText'=>$message,
                    'MessageClass'=>'danger'
                ]);
            }
        }else
            return $this->render('form',['model'=>$footballshoes],[
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
            if($this->footballShoesModel->DeleteFootballShoes($id))
                header('Location: /footballshoes/');
            else
                return $this->renderMessage('error', 'Помилка видалення товару',null,
                    [
                        'PageTitle'=>$title,
                        'MainTitle'=>$title
                    ]);

        }
        $news = $this->footballShoesModel->GetFootballShoesById($id);
        return $this->render('delete',['model' => $news],[
            'PageTitle'=>$title,
            'MainTitle'=>$title,
        ]);
    }
}