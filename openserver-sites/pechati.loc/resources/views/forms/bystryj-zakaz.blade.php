<form action="{{ route('store-order', [$data->uri]) }}" method="post" enctype="multipart/form-data" class="order-form">
  @csrf
  <section class="section section_fast-order">
    <div class="requisites__wrapper fast-order">
      @include('parts.attach-files')

      <textarea name="requisites__other" maxlength="1000"  class="form-input @error('requisites__other') error @enderror" rows="3" placeholder="Описание заказа и контакты"></textarea>
      <button class="order-btn__button order-btn__send" type="submit">Заказать</button>
    </div>
  </section>



</form>
