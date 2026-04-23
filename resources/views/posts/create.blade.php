@extends('layouts.app')

@section('title', 'Post yaratish')

@section('content')
    <div class="card" style="max-width: 780px; margin-top: 2rem; margin-left: auto; margin-right: auto;">
        <h1>Yangi post yaratish</h1>
        <p style="color: #475569; margin-bottom: 1.5rem;">Fikrlaringizni yozing va hamjamiyat bilan bo‘lishing.</p>

        <form action="{{ route('posts.store') }}" method="POST" class="stack">
            @csrf

            <div class="input-group">
                <label for="title">Sarlavha</label>
                <input id="title" type="text" name="title" value="{{ old('title') }}" required>
                @error('title')<p class="text-danger">{{ $message }}</p>@enderror
            </div>

            <div class="input-group">
                <label for="content">Matn</label>
                <textarea id="content" name="content" required>{{ old('content') }}</textarea>
                @error('content')<p class="text-danger">{{ $message }}</p>@enderror
            </div>

            <div style="display: flex; gap: 1rem; flex-wrap: wrap;">
                <button type="submit" class="button">Saqlash</button>
                <a class="button secondary" href="{{ route('posts.index') }}">Orqaga</a>
            </div>
        </form>
    </div>
@endsection
