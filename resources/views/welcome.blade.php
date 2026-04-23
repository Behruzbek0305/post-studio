@extends('layouts.app')

@section('title', 'Post Studio')

@section('content')
    <section class="hero">
        <div class="grid grid-2" style="align-items: center; gap: 2rem;">
            <div>
                <p class="pill">Modern loyiha uchun toʻliq CRUD va auth</p>
                @guest
                    <h1 style="font-size: clamp(2.5rem, 5vw, 4rem); line-height: 1.02; margin: 0.8rem 0;">Roʻyxatdan oʻting, kiriting va postlaringizni boshqaring.</h1>
                    <p style="max-width: 620px; color: #475569; font-size: 1.05rem; line-height: 1.8;">Ushbu loyihada foydalanuvchi registratsiyasi, kirish, profilni yangilash, parolni o‘zgartirish va zamonaviy post CRUD imkoniyatlari mavjud.</p>

                    <div style="display: flex; flex-wrap: wrap; gap: 1rem; margin-top: 1.5rem;">
                        <a class="button" href="{{ route('register') }}">Ro'yxatdan o'tish</a>
                        <a class="button secondary" href="{{ route('login') }}">Kirish</a>
                    </div>
                @else
                    <h1 style="font-size: clamp(2.5rem, 5vw, 4rem); line-height: 1.02; margin: 0.8rem 0;">Xush kelibsiz, {{ auth()->user()->name }}!</h1>
                    <p style="max-width: 620px; color: #475569; font-size: 1.05rem; line-height: 1.8;">Hozir post yaratishni boshlang yoki profil sozlamalaringizni yangilang.</p>

                    <div style="display: flex; flex-wrap: wrap; gap: 1rem; margin-top: 1.5rem;">
                        <a class="button" href="{{ route('posts.create') }}">Post yaratish</a>
                        <a class="button secondary" href="{{ route('profile.edit') }}">Profil</a>
                    </div>
                @endguest
            </div>

            <div class="card" style="background: linear-gradient(180deg, #ffffff 0%, #eff6ff 100%); border: 1px solid rgba(59,130,246,0.16);">
                <h2>Asosiy imkoniyatlar</h2>
                <ul style="list-style: none; padding: 0; margin: 1rem 0 0; display: grid; gap: 1rem;">
                    <li style="display: flex; gap: 0.75rem; align-items: center;"><span style="width: 12px; height: 12px; border-radius: 999px; background: #2563eb;"></span> Foydalanuvchi ro‘yxatdan o‘tadi va tizimga kiradi</li>
                    <li style="display: flex; gap: 0.75rem; align-items: center;"><span style="width: 12px; height: 12px; border-radius: 999px; background: #2563eb;"></span> Post yaratish, o‘qish, tahrirlash va o‘chirish</li>
                    <li style="display: flex; gap: 0.75rem; align-items: center;"><span style="width: 12px; height: 12px; border-radius: 999px; background: #2563eb;"></span> Profil maʼlumotlarini va parolni yangilash</li>
                    <li style="display: flex; gap: 0.75rem; align-items: center;"><span style="width: 12px; height: 12px; border-radius: 999px; background: #2563eb;"></span> Zamonaviy, professional interfeys</li>
                </ul>
            </div>
        </div>
    </section>
@endsection
