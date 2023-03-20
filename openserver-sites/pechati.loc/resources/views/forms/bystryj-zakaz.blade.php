<form action="#" method="post" enctype="multipart/form-data" class="order-form">
  @csrf
  <section class="section section_fast-order">
    <div class="requisites__wrapper fast-order">
      @include('parts.attach-files')

      <textarea name="requisites__other" class="form-input" rows="3" placeholder="Описание заказа и контакты"></textarea>

      <input type="hidden" name="page_hidden" value="{{ $data->meta_title }}" id="inp_order_page">
      <button class="order-btn__button order-btn__send" type="submit">Заказать</button>
    </div>
  </section>



</form>
