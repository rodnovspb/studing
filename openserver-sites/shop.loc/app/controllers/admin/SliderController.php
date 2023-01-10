<?php


namespace app\controllers\admin;


class SliderController extends AppController
{
    public function indexAction() {
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $this->model->update_slider();
            $_SESSION['success'] = "Обновлено";
            redirect();
        }
        $gallery = $this->model->get_slides();
        $title = 'Управление слайдером';
        $this->setMeta("Админка :: {$title}");
        $this->set(compact('title', 'gallery'));
    }
}