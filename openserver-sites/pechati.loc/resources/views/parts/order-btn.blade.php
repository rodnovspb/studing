<div class="order-btn">
  @include('parts.errors')
   <div class="order-btn__wrapper">
     <h3 class="order-btn__cost">Стоимость: &nbsp;<span id="order_sum"></span><span id="add_delivery" class="dn"></span></h3>
     <input type="hidden" name="price_hidden" value="" id="inp_order_sum">
     <div class="order-btn__block">
       <button class="order-btn__button order-btn__send" type="submit">Заказать</button>
     </div>
   </div>
</div>
