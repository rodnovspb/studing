<?php


namespace app\controllers\admin;


use RedBeanPHP\R;
use wfm\Pagination;

class OrderController extends AppController
{
    public function indexAction() {
        $status = get('status', 's');
        $status = ($status === 'new') ? ' status = 0 ' : '';
        
        $page = get('page');
        $perpage = 20;
        $total = R::count('orders', $status);
        $pagination = new Pagination($page, $perpage, $total);
        $start = $pagination->getStart();
        
        $orders = $this->model->get_orders($start, $perpage, $status);
    
        $title = 'Список заказов';
        $this->setMeta("Админка :: {$title}");
        $this->set(compact('title', 'orders', 'pagination', 'total'));
    }
    
    public function editAction() {
        $id = get('id');
        
        if(isset($_GET['status'])){
            $status = get('status');
            if($this->model->change_status($id, $status)){
                $_SESSION['success'] = 'Статус изменен';
            } else {
                $_SESSION['errors'] = 'Ошибка изменения статуса';
            }
        }
        
        $order = $this->model->get_order($id);
        if(!$order){
            throw new \Exception('Не найден заказ', 404);
        }
        $title = "Заказ №{$id}";
        $this->setMeta("Админка :: {$title}");
        $this->set(compact('title', 'order'));
    }

}























