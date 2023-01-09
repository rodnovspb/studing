<?php


namespace app\controllers\admin;


use RedBeanPHP\R;
use wfm\App;
use wfm\Pagination;

class PageController extends AppController
{
    public function indexAction() {
        $lang = App::$app->getProperty('language');
        $page = get('page');
        $perpage = 20;
        $total = R::count('page');
        $pagination = new Pagination($page, $perpage, $total);
        $start = $pagination->getStart();
        
        $pages = $this->model->get_pages($lang, $start, $perpage);
        $title = 'Список страниц';
        $this->setMeta("Админка :: {$title}");
        $this->set(compact('title', 'pages', 'pagination', 'total'));
    }
    
    public function deleteAction() {
        $id = get('id');
        if($this->model->delete_page($id)){
            $_SESSION['success'] = 'Удалена';
        } else {
            $_SESSION['errors'] = 'Ошибка';
        }
        redirect();
    }
}