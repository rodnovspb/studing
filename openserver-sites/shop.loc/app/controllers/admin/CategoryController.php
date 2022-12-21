<?php


namespace app\controllers\admin;


use RedBeanPHP\R;

class CategoryController extends AppController
{
    public function indexAction() {
        $title = 'Категории';
        $this->setMeta("Админка :: {$title}");
        $this->set(compact('title'));
    }
    
    public function deleteAction() {
        $id = get('id');
        $errors = '';
        $children = R::count('category', 'parent_id = ?', [$id] );
        $products = R::count('product', 'category_id = ?', [$id]);
        if($children){
            $errors .= 'Ошибка, в категории есть вложенные категории<br>';
        }
        if($products){
            $errors .= 'Ошибка, в категории есть товары<br>';
        }
        if($errors){
            $_SESSION['errors'] = $errors;
        } else {
            R::exec("DELETE FROM category WHERE id = ?", [$id]);
            R::exec("DELETE FROM category_description WHERE category_id = ?", [$id]);
            $_SESSION['success'] = 'Категория удалена';
        }
        redirect();
    }
    
    public function addAction() {
        if(!empty($_POST)){
            if($this->model->category_validate()){
                $_SESSION['success'] = 'Категория сохранена';
            } else {
            
            }
            redirect();
        }
        $title = 'Добавление категории';
        $this->setMeta("Админка :: {$title}");
        $this->set(compact('title'));
    }
}