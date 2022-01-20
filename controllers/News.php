<?php

namespace controllers;

use core\Controller;

/**
 * Контролер для модуля News
 * @package controllers
 */
class News extends Controller
{
    protected $user;
    protected $newsModel;
    protected $userModel;
    public function __construct()
    {
        $this->userModel = new \models\Users();
        $this->newsModel = new \models\News();
        $this->user =$this->userModel->GetCurrentUser();
    }
    /**
     * Відображення початкової сторінки модуля
     */
   public function actionIndex()
   {
       global $Config;
       $title = 'Новини - FootballFan.Shop - футбольний магазин';
       $lastNews = $this->newsModel->GetLastNews($Config['NewsCount']);
       return $this->render('index',['lastNews' => $lastNews],[
           'PageTitle'=>$title,
           'MainTitle'=>$title
           ]);
   }

    /**
     * Перегляд новини
     * @return void
     */
    public function actionView()
    {
        $id = $_GET['id'];
        $news = $this->newsModel->GetNewsById($id);
        $title = $news['title'];
        return $this->render('view',['model' => $news],[
            'PageTitle'=>$title,
            'MainTitle'=>$title,
            ]);
    }

    /**
     * Додавання новини
     * @return void
     */
    public function actionAdd()
    {
        $titleForbidden = 'Доступ заборонено';
        if(empty($this->user))
            return $this->render('forbidden',null,[
                'PageTitle' => $titleForbidden,
                'MainTitle' => $titleForbidden
            ]);
        $title = 'Додавання новини';
        if($this->isPost())
        {
            $result = $this->newsModel->AddNews($_POST);
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
                    move_uploaded_file($_FILES['file']['tmp_name'],'files/news/'.$name);
                    $this->newsModel->ChangePhoto($result['id'],$name);
                }


                return $this->renderMessage('ok', 'Новину успішно додано',null,
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
     * Редагування новини
     * @return void
     */
    public function actionEdit()
    {
        $id = $_GET['id'];
        $news = $this->newsModel->GetNewsById($id);
        $titleForbidden = 'Доступ заборонено';
        if(empty($this->user) || $news['user_id'] != $this->userModel->GetCurrentUser()['id'])
            return $this->render('forbidden',null,[
                'PageTitle' => $titleForbidden,
                'MainTitle' => $titleForbidden
            ]);
        $title = 'Редагування новини';
        if($this->isPost())
        {
            $result = $this->newsModel->UpdateNews($_POST,$id);
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
                    move_uploaded_file($_FILES['file']['tmp_name'],'files/news/'.$name);
                    $this->newsModel->ChangePhoto($id,$name);
                }
                return $this->renderMessage('ok', 'Новину успішно збережено',null,
                    [
                        'PageTitle'=>$title,
                        'MainTitle'=>$title
                    ]);
            }
            else
            {
                $message = implode('<br/>',$result);
                return $this->render('form',['model'=>$news], [
                    'PageTitle'=>$title,
                    'MainTitle'=>$title,
                    'MessageText'=>$message,
                    'MessageClass'=>'danger'
                ]);
            }
        }else
            return $this->render('form',['model'=>$news],[
                'PageTitle' => $title,
                'MainTitle' => $title
            ]);
    }


    /**
     * Видалення новини
     * @return void
     */
    public function actionDelete()
    {
        $title = 'Видалення новини';
        $id = $_GET['id'];
        if(isset($_GET['confirm']) && $_GET['confirm'] == 'yes')
        {
            if($this->newsModel->DeleteNews($id))
                header('Location: /news/');
            else
                return $this->renderMessage('error', 'Помилка видалення новини',null,
                    [
                        'PageTitle'=>$title,
                        'MainTitle'=>$title
                    ]);

        }
        $news = $this->newsModel->GetNewsById($id);
        return $this->render('delete',['model' => $news],[
            'PageTitle'=>$title,
            'MainTitle'=>$title,
            ]);
    }
}