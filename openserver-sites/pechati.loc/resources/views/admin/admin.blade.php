<x-guest-layout>
    <!-- Session Status -->

    <form method="POST" action="{{ route('check_login') }}" class="admin-form">
        @csrf
        @if(Session::has('status')) <div>{{ session('status') }}</div> @endif
        <h2 style="font-size: 24px; text-align: center; margin-bottom: 15px;">Форма входа</h2>
        <!-- Email Address -->
        <div>
            <input type="text" name="email" value="{{ old('email') }}" placeholder="Почта" required>
            @error('email')<div class="admin-form-error">{{ $message }}</div>@enderror
        </div>

        <!-- Password -->
        <div>
            <input type="password" name="password" placeholder="Пароль" required autocomplete="current-password">
            @error('password')<div class="admin-form-error">{{ $message }}</div>@enderror
        </div>

        <div>
            <button type="submit" class="admin-form-btn">Войти</button>
        </div>

    </form>
</x-guest-layout>

