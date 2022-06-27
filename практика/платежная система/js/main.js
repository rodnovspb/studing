$(".buy").click(function (){
  let price = $(this).data('price')
  let product = $(this).data('product')
  $('#price').val(price)
  $('#product').val(product)
  $('#cart').modal('show')
  return false

})