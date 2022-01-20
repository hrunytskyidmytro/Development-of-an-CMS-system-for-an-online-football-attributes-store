<?php

namespace controllers;

use core\Controller;

class Site extends Controller
{
    public function actionIndex()
    {
        $title = 'FootballFan.Shop - футбольний магазин';
        $titlePage = '';
        return $this->render('index',null,[
            'MainTitle'=> $title,
            'PageTitle'=> $titlePage
        ]);
    }
}