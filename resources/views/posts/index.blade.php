@extends('layouts.app')

@section('title', 'Postlar')

@section('content')
    <div class="card" style="margin-top: 2rem; margin-left: auto; margin-right: auto;">
        <div style="display: flex; justify-content: space-between; align-items: center; flex-wrap: wrap; gap: 1rem; margin-bottom: 1.5rem;">
            <div>
                <h1>Postlar</h1>
                <p style="color: #475569; margin: 0.5rem 0 0;">Yaratilgan barcha postlarni ko‘ring va o‘zingizga tegishli postlarni boshqaring.</p>
            </div>
            <a class="button" href="{{ route('posts.create') }}">Yangi post</a>
        </div>

        @if($posts->isEmpty())
            <div class="card" style="background: #f8fafc; border-color: #e2e8f0;">
                <p>Hozircha hech qanday post mavjud emas. Yangi post yaratishingiz mumkin.</p>
            </div>
        @else
            <table class="table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Post</th>
                        <th>Muallif</th>
                        <th>Yaratilgan</th>
                        <th>Harakatlar</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($posts as $post)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>
                                <strong>{{ $post->title }}</strong>
                                <p class="author">{{ \Illuminate\Support\Str::limit($post->content, 90) }}</p>
                            </td>
                            <td>
                                <span class="pill">{{ $post->user?->name ?? "Noma'lum" }}</span>
                            </td>
                            <td>{{ $post->created_at->format('Y-m-d') }}</td>
                            <td>
                                <div class="actions">
                                    <a class="button secondary" href="{{ route('posts.show', $post) }}">Ko'rish</a>
                                    @if($post->user_id === auth()->id())
                                        <a class="button" href="{{ route('posts.edit', $post) }}">Tahrirlash</a>
                                        <form action="{{ route('posts.destroy', $post) }}" method="POST" style="display: inline-block; margin: 0;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="button danger">O'chirish</button>
                                        </form>
                                    @endif
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
@endsection
