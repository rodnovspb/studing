<!-- Single Catagory -->
<div class="single-products-catagory clearfix">
    <a href="@makeUrl($data['id'])">
        <img src="{{ $data['product_mainphoto'] }}" alt="">
        <!-- Hover Content -->
        <div class="hover-content">
            <div class="line"></div>
            <p>{{ $data['product_price'] }}</p>
            <h4>{{ $data['pagetitle'] }}</h4>
        </div>
    </a>
</div>
