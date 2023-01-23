<h1>Подтвердите почту</h1>

Отправить еще раз

<form action="{{ route('verification.send') }}" method="post">
    @csrf
    <button type="submit">Отправить еще раз</button>
</form>
