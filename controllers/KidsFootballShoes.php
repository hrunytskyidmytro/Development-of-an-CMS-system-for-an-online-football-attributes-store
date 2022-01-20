<?php

namespace controllers;

use core\Controller;

/**
 * Контролер для модуля KidsFootballShoes
 */
class KidsFootballShoes extends Controller
{
    protected $user;
    protected $KidsFootballShoesModel;
    protected $userModel;
    public function __construct()
    {
        $this->userModel = new \models\Users();
        $this->KidsFootballShoesModel = new \models\KidsFootballShoes();
        $this->user = $this->userModel->GetCurrentUser();
    }

    /**
     * Відображення початкової сторінки модуля
     */
    public function actionIndex()
    {
        global $Config;
        $title = 'Дитяче взуття - FootballFan.Shop - футбольний магазин';
        $lastKidsFootballShoes = $this->KidsFootballShoesModel->GetLastKidsFootballShoes($Config['kidsFootballShoesCount']);

        if(isset($_GET['orderBy']))
            if($_GET['orderBy'] == 'asc')
                $orderBy = $this->KidsFootballShoesModel->GetAsc('kidsfootballshoes');
            if($_GET['orderBy'] == 'desc')
                $orderBy = $this->KidsFootballShoesModel->GetDesc('kidsfootballshoes');

        if(!empty($orderBy))
            $lastKidsFootballShoes = $orderBy;

        return $this->render('index',['lastKidsFootballShoes' => $lastKidsFootballShoes],[
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
        $kidsfootballshoes = $this->KidsFootballShoesModel->GetKidsFootballShoesById($id);
        $comments = $this->KidsFootballShoesModel->GetComment($id);
        $title = $kidsfootballshoes['title'];
        return $this->render('view',
            [
            'model' => $kidsfootballshoes,
            'comments' => $comments
            ]
            ,
            [
            'PageTitle'=>$title,
            'MainTitle'=>$title,
        ]
        );
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
            $result = $this->KidsFootballShoesModel->AddKidsFootballShoes($_POST);
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
                    move_uploaded_file($_FILES['file']['tmp_name'],'files/kidsfootballshoes/'.$name);
                    $this->KidsFootballShoesModel->ChangePhoto($result['id'],$name);
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
        $kidsfootballshoes = $this->KidsFootballShoesModel->GetKidsFootballShoesById($id);
        $titleForbidden = 'Доступ заборонено';
        if(empty($this->user) || $kidsfootballshoes['user_id'] != $this->userModel->GetCurrentUser()['id'])
            return $this->render('forbidden',null,[
                'PageTitle' => $titleForbidden,
                'MainTitle' => $titleForbidden
            ]);
        $title = 'Редагування товару';
        if($this->isPost())
        {
            $result = $this->KidsFootballShoesModel->UpdateKidsFootballShoes($_POST,$id);
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
                    move_uploaded_file($_FILES['file']['tmp_name'],'files/kidsfootballshoes/'.$name);
                    $this->KidsFootballShoesModel->ChangePhoto($id,$name);
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
                return $this->render('form',['model'=>$kidsfootballshoes], [
                    'PageTitle'=>$title,
                    'MainTitle'=>$title,
                    'MessageText'=>$message,
                    'MessageClass'=>'danger'
                ]);
            }
        }else
            return $this->render('form',['model'=>$kidsfootballshoes],[
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
            if($this->KidsFootballShoesModel->DeleteKidsFootballShoes($id))
                header('Location: /footballshoes/');
            else
                return $this->renderMessage('error', 'Помилка видалення товару',null,
                    [
                        'PageTitle'=>$title,
                        'MainTitle'=>$title
                    ]);

        }
        $kidsfootballshoes = $this->KidsFootballShoesModel->GetKidsFootballShoesById($id);
        return $this->render('delete',['model' => $kidsfootballshoes],[
            'PageTitle'=>$title,
            'MainTitle'=>$title,
        ]);
    }
}