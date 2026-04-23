@extends('layouts.app')

@section('title', 'Kirish')

@section('content')
    <div class="card" style="max-width: 560px; margin: 0 auto;">
        <h1>Kirish</h1>
        <p style="color: #475569; margin-bottom: 1.5rem;">Elektron pochtangiz va parolingiz bilan tizimga kiring.</p>

        <form method="POST" action="{{ route('login') }}" class="stack">
            @csrf

            <div class="input-group">
                <label for="email">Email</label>
                <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus>
                @error('email')<p class="text-danger">{{ $message }}</p>@enderror
            </div>

            <div class="input-group">
                <label for="password">Parol</label>
                <input id="password" type="password" name="password" required>
                @error('password')<p class="text-danger">{{ $message }}</p>@enderror
            </div>

            <button type="submit" class="button">Kirish</button>
            <p style="margin: 0.75rem 0 0; color: #64748b;">Hisobingiz yo‘qmi? <a href="{{ route('register') }}">Ro‘yxatdan o‘ting</a>.</p>
        </form>
    </div>
@endsection
