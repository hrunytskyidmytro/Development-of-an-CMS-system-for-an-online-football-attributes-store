<?php

namespace controllers;

use core\Controller;

class AboutUs extends Controller
{
    public function actionIndex()
    {
        $title = 'Про нас - FootballFan.Shop - футбольний магазин';
        return $this->render('index',null,[
            'PageTitle'=>$title,
            'MainTitle'=>$title
        ]);
    }
}