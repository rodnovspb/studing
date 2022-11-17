<?php
/** @var $this \wfm\View */
/** @var $category array */
/** @var $products array */
/** @var $total int */
/** @var $pagination object */
/** @var $breadcrumbs string */
?>
<div class="container">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb bg-light p-2">
            <?= $breadcrumbs ?>
        </ol>
    </nav>
</div>

<div class="container py-3">
    <div class="row">

        <div class="col-lg-12 category-content">
            <h3 class="section-title"><?= $category['title'] ?></h3>
    
            <?php if (!empty($category['content'])): ?>
                <div class="category-desc">
                    <?= $category['content'] ?>
                </div>
            <?php endif; ?>

            <div class="row">
                <div class="col-sm-6">
                    <div class="input-group mb-3">
                        <label class="input-group-text" for="input-sort">Сортировка:</label>
                        <select class="form-select" id="input-sort">
                            <option selected="">По умолчанию</option>
                            <option value="1">Название (А - Я)</option>
                            <option value="2">Название (Я - А)</option>
                            <option value="3">Цена (низкая &gt; высокая)</option>
                            <option value="3">Цена (высокая &gt; низкая)</option>
                        </select>
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="input-group mb-3">
                        <label class="input-group-text" for="input-sort">Показать:</label>
                        <select class="form-select" id="input-sort">
                            <option selected="">15</option>
                            <option value="1">25</option>
                            <option value="2">50</option>
                            <option value="3">75</option>
                            <option value="3">100</option>
                        </select>
                    </div>
                </div>
            </div>

            <div class="row">
                <?php if (!empty($products)): ?>
                    <?php $this->getPart('parts/products_loop', compact('products')); ?>
                <?php else: ?>
                    <p><?php __('category_view_no_products'); ?></p>
                <?php endif; ?>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <nav aria-label="Page navigation example">
                        <ul class="pagination">
                            <li class="page-item"><a class="page-link" href="#">Previous</a></li>
                            <li class="page-item active"><a class="page-link" href="#">1</a></li>
                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item"><a class="page-link" href="#">Next</a></li>
                        </ul>
                    </nav>
                </div>

            </div>

        </div>

    </div>
</div>

