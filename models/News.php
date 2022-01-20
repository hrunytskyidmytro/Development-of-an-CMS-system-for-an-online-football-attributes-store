<?php

namespace models;

use core\Model;
use core\Utils;
use Imagick;

class News extends Model
{

    /**
     * Додавання та редагування фото
     * @param $id
     * @param $file
     * @return void
     */
    public function ChangePhoto($id, $file)
    {
        $folder = 'files/news/';
        $file_path = pathinfo($folder.$file);
        $file_big = $file_path['filename'].'_b';
        $file_middle =$file_path['filename'].'_m';
        $file_small = $file_path['filename'].'_s';

        $news = $this->GetNewsById($id);
        if(is_file($folder.$news['photo'].'_b.jpg') &&  is_file($folder.$file))
            unlink($folder.$news['photo'].'_b.jpg');

        if(is_file($folder.$news['photo'].'_m.jpg') &&  is_file($folder.$file))
            unlink($folder.$news['photo'].'_m.jpg');

        if(is_file($folder.$news['photo'].'_s.jpg') &&  is_file($folder.$file))
            unlink($folder.$news['photo'].'_s.jpg');
        $news['photo'] = $file_path['filename'];

        //        -----------
        $im_b = new Imagick();
        $im_b->readImage($_SERVER['DOCUMENT_ROOT'].'/'.$folder.$file);
        $im_b->cropThumbnailImage(1280, 1024, true);
        $im_b->writeImage($_SERVER['DOCUMENT_ROOT'].'/'.$folder.'/'.$file_big.'.jpg');
        //        -----------
        $im_m = new Imagick();
        $im_m->readImage($_SERVER['DOCUMENT_ROOT'].'/'.$folder.$file);
        $im_m->cropThumbnailImage(300, 200, true);
        $im_m->writeImage($_SERVER['DOCUMENT_ROOT'].'/'.$folder.'/'.$file_middle.'.jpg');
        //        -----------
        $im_s = new Imagick();
        $im_s->readImage($_SERVER['DOCUMENT_ROOT'].'/'.$folder.$file);
        $im_s->cropThumbnailImage(180, 180, true);
        $im_s->writeImage($_SERVER['DOCUMENT_ROOT'].'/'.$folder.'/'.$file_small .'.jpg');

        unlink($folder.$file);

        $this->UpdateNews($news, $id);
    }

    /**
     * Додавання новини
     * @param $row
     * @return array|bool
     */
    public function AddNews($row)
    {
        $userModel = new \models\Users();

        $user = $userModel->GetCurrentUser();
        if($user == null) {
            $result = [
                'error' => true,
                'messages' => ['Користувач не аутентифікований']
            ];
            return $result;
        }

        $validateResult = $this->Validate($row);

        if(is_array($validateResult)) {
            $result = [
                'error' => true,
                'messages' => $validateResult
            ];
            return $result;
        }

        $fields = ['title','short_text','text'];
        $rowFiltered = Utils::ArrayFilter($row, $fields);
        $rowFiltered['datetime'] = date('Y-m-d H:i:s');
        $rowFiltered['user_id'] = $user['id'];
        $rowFiltered['photo'] = '...photo...';
        $id = \core\Core::getInstance()->getDB()->insert('news',$rowFiltered);
        return [
            'error' => false,
            'id' => $id
        ];
    }

    /**
     * Отримання останніх новин
     * @param $count
     * @return array|false
     */
    public function GetLastNews($count)
    {
        return \core\Core::getInstance()->getDB()->select('news','*', null,['datetime' => 'DESC'], $count);
    }

    /**
     * Повернення новини
     * @param $id
     * @return array|bool
     */
    public function GetNewsById($id)
    {
        $news = \core\Core::getInstance()->getDB()->select('news','*', ['id' => $id]);
        if(!empty($news))
            return $news[0];
        else
            return null;
    }

    /**
     * Редагування новини
     */
    public function UpdateNews($row, $id)
    {

        $userModel = new \models\Users();

        $user = $userModel->GetCurrentUser();
        if($user == null)
            return false;

        $validateResult = $this->Validate($row);
        if(is_array($validateResult))
            return $validateResult;

        $fields = ['title','short_text','text','photo'];
        $rowFiltered = Utils::ArrayFilter($row, $fields);
        $rowFiltered['datetime_lastedit'] = date('Y-m-d H:i:s');
        \core\Core::getInstance()->getDB()->update('news', $rowFiltered, ['id' => $id]);
        return true;
    }

    /**
     * Видалення новини
     */
    public function DeleteNews($id)
    {
        $news = $this->GetNewsById($id);
        $userModel = new \models\Users();

        $user = $userModel->GetCurrentUser();
        if(empty($news) || empty($user) || $user['id'] != $news['user_id'])
            return false;
        \core\Core::getInstance()->getDB()->delete('news', ['id' => $id]);
        return true;
    }

    /**
     * Валідація певної новини(перевірка на порожність)
     */
    public function Validate($row)
    {
        $errors = [];
        if(empty($row['title']))
            $errors []= 'Поле "Заголовок новини" не може бути порожнім';
        if(empty($row['short_text']))
            $errors []= 'Поле "Короткий текст новини" не може бути порожнім';
        if(empty($row['text']))
            $errors []= 'Поле "Повний текст новини" не може бути порожнім';

        if(count($errors) > 0)
            return $errors;
        else
            return true;
    }
}