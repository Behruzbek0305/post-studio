@extends('layouts.app')

@section('title', 'Postni tahrirlash')

@section('content')
    <div class="card" style="max-width: 780px; margin-top: 2rem; margin-left: auto; margin-right: auto;">
        <h1>Postni tahrirlash</h1>
        <p style="color: #475569; margin-bottom: 1.5rem;">Post tarkibini tahrirlash va yangilash.</p>

        <form action="{{ route('posts.update', $post) }}" method="POST" class="stack">
            @csrf
            @method('PUT')

            <div class="input-group">
                <label for="title">Sarlavha</label>
                <input id="title" type="text" name="title" value="{{ old('title', $post->title) }}" required>
                @error('title')<p class="text-danger">{{ $message }}</p>@enderror
            </div>

            <div class="input-group">
                <label for="content">Matn</label>
                <textarea id="content" name="content" required>{{ old('content', $post->content) }}</textarea>
                @error('content')<p class="text-danger">{{ $message }}</p>@enderror
            </div>

            <div style="display: flex; gap: 1rem; flex-wrap: wrap;">
                <button type="submit" class="button">Yangilash</button>
                <a class="button secondary" href="{{ route('posts.index') }}">Orqaga</a>
            </div>
        </form>
    </div>
@endsection
