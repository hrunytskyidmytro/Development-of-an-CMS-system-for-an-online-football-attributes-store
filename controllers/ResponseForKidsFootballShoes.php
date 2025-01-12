<?php

namespace controllers;

use core\Controller;

/**
 * Контролер для модуля ResponseForKidsFootballShoes
 */
class ResponseForKidsFootballShoes extends Controller
{
    protected $user;
    protected $responseKFSModel;
    protected $userModel;
    public function __construct()
    {
        $this->userModel = new \models\Users();
        $this->responseKFSModel = new \models\ResponseForKidsFootballShoes();
        $this->user =$this->userModel->GetCurrentUser();
    }
    /**
     * Відображення початкової сторінки модуля
     */
    public function actionIndex()
    {
        global $Config;
        $title = 'Відгуки про футбольне взуття - FootballFan.Shop - футбольний магазин';
        $lastResponse = $this->responseKFSModel->GetLastResponses($Config['ResponseCount']);
        return $this->render('index',['lastResponse' => $lastResponse],[
            'PageTitle'=>$title,
            'MainTitle'=>$title
        ]);
    }

    /**
     * Перегляд відгуку
     * @return void
     */
    public function actionView()
    {
        $id = $_GET['id'];
        $response = $this->responseKFSModel->GetResponsesById($id);
        $title = $response['title'];
        return $this->render('view',['model' => $response],[
            'PageTitle'=>$title,
            'MainTitle'=>$title,
        ]);
    }

    /**
     * Додавання відгуку
     * @return void
     */
    public function actionAdd()
    {
        $title = 'Додавання відгуку';
        if($this->isPost())
        {
            $result = $this->responseKFSModel->AddResponse($_POST);
            if($result['error'] === false) {
                return $this->renderMessage('ok', 'Відгук додано',null,
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
     * Редагування відгуку
     * @return void
     */
    public function actionEdit()
    {
        $id = $_GET['id'];
        $response = $this->responseKFSModel->GetResponsesById($id);
        $titleForbidden = 'Доступ заборонено';
        if(empty($this->user) || $response['user_id'] != $this->userModel->GetCurrentUser()['id'])
            return $this->render('forbidden',null,[
                'PageTitle' => $titleForbidden,
                'MainTitle' => $titleForbidden
            ]);
        $title = 'Редагування відгука';
        if($this->isPost())
        {
            $result = $this->responseKFSModel->UpdateResponse($_POST,$id);
            if($result === true) {
                return $this->renderMessage('ok', 'Відгук відредаговано',null,
                    [
                        'PageTitle'=>$title,
                        'MainTitle'=>$title
                    ]);
            }
            else
            {
                $message = implode('<br/>',$result);
                return $this->render('form',['model'=>$response], [
                    'PageTitle'=>$title,
                    'MainTitle'=>$title,
                    'MessageText'=>$message,
                    'MessageClass'=>'danger'
                ]);
            }
        }else
            return $this->render('form',['model'=>$response],[
                'PageTitle' => $title,
                'MainTitle' => $title
            ]);
    }


    /**
     * Видалення відгуку
     * @return void
     */
    public function actionDelete()
    {
        $title = 'Видалення відгуку';
        $id = $_GET['id'];
        if(isset($_GET['confirm']) && $_GET['confirm'] == 'yes')
        {
            $result = $this->responseKFSModel->DeleteResponse($id);
            if($result == true)
                header('Location: /kidsfootballshoes/');
            else
                return $this->renderMessage('error', 'Помилка видалення',null,
                    [
                        'PageTitle'=>$title,
                        'MainTitle'=>$title
                    ]);

        }
        $response = $this->responseKFSModel->GetResponsesById($id);
        return $this->render('delete',['model' => $response],[
            'PageTitle'=>$title,
            'MainTitle'=>$title,
        ]);
    }
}