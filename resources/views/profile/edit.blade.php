@extends('layouts.app')

@section('title', 'Profil sozlamalari')

@section('content')
    <div class="grid grid-2" style="gap: 2rem;">
        <div class="card">
            <h2>Profil ma'lumotlari</h2>
            <p style="color: #475569;">Ismingiz va email manzilingizni o‘zgartiring.</p>

            <form method="POST" action="{{ route('profile.update') }}" class="stack">
                @csrf
                @method('PUT')

                <div class="input-group">
                    <label for="name">Ism</label>
                    <input id="name" type="text" name="name" value="{{ old('name', auth()->user()->name) }}" required>
                    @error('name')<p class="text-danger">{{ $message }}</p>@enderror
                </div>

                <div class="input-group">
                    <label for="email">Email</label>
                    <input id="email" type="email" name="email" value="{{ old('email', auth()->user()->email) }}" required>
                    @error('email')<p class="text-danger">{{ $message }}</p>@enderror
                </div>

                <button type="submit" class="button">Saqlash</button>
            </form>
        </div>

        <div class="card">
            <h2>Parolni yangilash</h2>
            <p style="color: #475569;">Joriy parolingizni kiriting va yangi parol belgilang.</p>

            <form method="POST" action="{{ route('profile.password') }}" class="stack">
                @csrf
                @method('PUT')

                <div class="input-group">
                    <label for="current_password">Joriy parol</label>
                    <input id="current_password" type="password" name="current_password" required>
                    @error('current_password')<p class="text-danger">{{ $message }}</p>@enderror
                </div>

                <div class="input-group">
                    <label for="password">Yangi parol</label>
                    <input id="password" type="password" name="password" required>
                    @error('password')<p class="text-danger">{{ $message }}</p>@enderror
                </div>

                <div class="input-group">
                    <label for="password_confirmation">Parolni tasdiqlash</label>
                    <input id="password_confirmation" type="password" name="password_confirmation" required>
                </div>

                <button type="submit" class="button">Yangilash</button>
            </form>
        </div>
    </div>
@endsection
