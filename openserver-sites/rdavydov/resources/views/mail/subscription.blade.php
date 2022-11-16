<p>Приветствую! Товар {{ $product->__('name') }} пришел</p>
<p><a href="{{ route('product', [$product->category->code, $product->code]) }}">{{ $product->name }}</a></p>
