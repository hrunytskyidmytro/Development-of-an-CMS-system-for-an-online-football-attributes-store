<?php

namespace controllers;

use core\Controller;

class Users extends Controller
{
    protected $userModel;
    function __construct()
    {
        $this->userModel = new \models\Users();
    }

    function actionLogout()
    {
        $title = 'Вихід з аккаунту';
        unset($_SESSION['user']);
        return $this->renderMessage('ok', 'Ви вийшли з Вашого аккаунту',null,
            [
                'PageTitle'=>$title,
                'MainTitle'=>$title
            ]);
    }

    function actionLogin()
    {
        $title = 'Вхід на сайт';
        if(isset($_SESSION['user']))
            return $this->renderMessage('ok', 'Ви вже увійшли на сайт',null,
                [
                    'PageTitle'=>$title,
                    'MainTitle'=>$title
                ]);

        if ($this->isPost())
        {
            $user = $this->userModel->AuthUser($_POST['login'],$_POST['password']);
            if(!empty($user))
            {
                $_SESSION['user'] = $user;
                return $this->renderMessage('ok', 'Ви успішно увійшли на сайт',null,
                    [
                        'PageTitle'=>$title,
                        'MainTitle'=>$title
                    ]);
            }else
                return $this->render('login',null, [
                'PageTitle'=>$title,
                'MainTitle'=>$title,
                'MessageText'=>'Неправильний логін або пароль',
                'MessageClass'=>'danger'
            ]);
        } else
        {
            $params = [
                'PageTitle'=>$title,
                'MainTitle'=>$title
            ];
            return $this->render('login',null, $params);
        }
    }

    function actionRegister()
    {
        if ($this->isPost())
        {
            $result = $this->userModel->AddUser($_POST);
            if($result === true) {
                return $this->renderMessage('ok', 'Користувач успішно зареєстрований',null,
                    [
                        'PageTitle'=>'Реєстрація на сайті',
                        'MainTitle'=>'Реєстрація на сайті',
                    ]);
            }
            else
            {
                $message = implode('<br/>',$result);
                return $this->render('register',null, [
                    'PageTitle'=>'Реєстрація на сайті',
                    'MainTitle'=>'Реєстрація на сайті',
                    'MessageText'=>$message,
                    'MessageClass'=>'danger'
                ]);
            }
        } else
        {
            $params = [
                'PageTitle'=>'Реєстрація на сайті',
                'MainTitle'=>'Реєстрація на сайті',
            ];
            return $this->render('register',null, $params);
        }

    }
}

