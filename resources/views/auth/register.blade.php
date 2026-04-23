@extends('layouts.app')

@section('title', 'Ro‘yhatdan o‘tish')

@section('content')
    <div class="card" style="max-width: 560px; margin: 0 auto;">
        <h1>Ro‘yhatdan o‘tish</h1>
        <p style="color: #475569; margin-bottom: 1.5rem;">Yangi hisob ochish uchun ma'lumotlaringizni kiriting.</p>

        <form method="POST" action="{{ route('register') }}" class="stack">
            @csrf

            <div class="input-group">
                <label for="name">Ism</label>
                <input id="name" type="text" name="name" value="{{ old('name') }}" required autofocus>
                @error('name')<p class="text-danger">{{ $message }}</p>@enderror
            </div>

            <div class="input-group">
                <label for="email">Email</label>
                <input id="email" type="email" name="email" value="{{ old('email') }}" required>
                @error('email')<p class="text-danger">{{ $message }}</p>@enderror
            </div>

            <div class="grid grid-2">
                <div class="input-group">
                    <label for="password">Parol</label>
                    <input id="password" type="password" name="password" required>
                    @error('password')<p class="text-danger">{{ $message }}</p>@enderror
                </div>

                <div class="input-group">
                    <label for="password_confirmation">Parolni takrorlang</label>
                    <input id="password_confirmation" type="password" name="password_confirmation" required>
                </div>
            </div>

            <button type="submit" class="button">Ro‘yxatdan o‘tish</button>
            <p style="margin: 0.75rem 0 0; color: #64748b;">Ro‘yxatdan o‘tganmisiz? <a href="{{ route('login') }}">Kirish</a>.</p>
        </form>
    </div>
@endsection
