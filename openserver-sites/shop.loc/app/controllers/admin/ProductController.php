<?php


namespace app\controllers\admin;


use RedBeanPHP\R;
use wfm\App;
use wfm\Pagination;

class ProductController extends AppController
{
    public function indexAction() {
        $lang = App::$app->getProperty('language');
        $page = get('page');
        $perpage = 3;
        $total = R::count('product');
        $pagination = new Pagination($page, $perpage, $total);
        $start = $pagination->getStart();
        
        $products = $this->model->get_products($lang, $start, $perpage);
        $title = 'Список товаров';
        $this->setMeta("Админка :: {$title}");
        $this->set(compact('title', 'products', 'pagination', 'total'));
    }
    
    public function addAction() {
        if(!empty($_POST)){
            if($this->model->product_validate()){
                if($this->model->save_product()){
                    $_SESSION['success'] = 'Товар добавлен';
                } else {
                    $_SESSION['errors'] = 'Ошибка добавления товара';
                }
            }
            redirect();
        }
        $title = 'Новый товар';
        $this->setMeta("Админка :: {$title}");
        $this->set(compact('title'));
    }
    
    public function editAction() {
        $id = get('id');
        if(!empty($_POST)){
            if($this->model->product_validate()){
                if($this->model->update_product($id)){
                    $_SESSION['success'] = 'Товар обновлен';
                } else {
                    $_SESSION['errors'] = 'Ошибка обновления товара';
                }
            }
            redirect();
        }
        $product = $this->model->getProduct($id);
        if(!$product){
            throw new \Exception('Not found product', 404);
        }
        
        $gallery = $this->model->get_gallery($id);
    
        $lang = App::$app->getProperty('language')['id'];
        App::$app->setProperty('parent_id', $product[$lang]['category_id']);
        $title = 'Редактирование товара';
        $this->setMeta("Админка :: {$title}");
        $this->set(compact('product', 'gallery'));
    }
    
    public function getDownloadAction() {
        $q = get('q', 's');
        $downloads = $this->model->get_downloads($q);
        echo json_encode($downloads);
        die();
    }

}












