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

}