<p>Приветствую! Товар {{ $product->name }} пришел</p>
<p><a href="{{ route('product', [$product->category->code, $product->code]) }}">{{ $product->name }}</a></p>
