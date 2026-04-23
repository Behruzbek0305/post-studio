@extends('layouts.app')

@section('title', 'Postni ko‘rish')

@section('content')
    <div class="card" style="max-width: 780px; margin-top: 2rem; margin-left: auto; margin-right: auto;">
        <div style="display: flex; justify-content: space-between; align-items: flex-start; gap: 1rem; flex-wrap: wrap;">
            <div>
                <h1>{{ $post->title }}</h1>
                <div class="meta-row">
                    <span class="pill">Muallif: {{ $post->user?->name ?? "Noma'lum" }}</span>
                    <span>{{ $post->created_at->format('Y-m-d') }}</span>
                </div>
            </div>
            @if($post->user_id === auth()->id())
                <div class="actions">
                    <a class="button" href="{{ route('posts.edit', $post) }}">Tahrirlash</a>
                    <form action="{{ route('posts.destroy', $post) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="button secondary" style="background: #ef4444; color: #fff;">O'chirish</button>
                    </form>
                </div>
            @endif
        </div>

        <div style="margin-top: 1.75rem; white-space: pre-line; line-height: 1.8; color: #334155;">{{ $post->content }}</div>

        <a class="button secondary" href="{{ route('posts.index') }}" style="margin-top: 1.75rem;">Orqaga</a>
    </div>
@endsection
