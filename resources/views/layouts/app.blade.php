<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Post App')</title>
    <style>
        :root {
            color-scheme: light;
            font-family: Inter, ui-sans-serif, system-ui, sans-serif;
            background: #f3f4f6;
            color: #111827;
        }

        * { box-sizing: border-box; }

        body { margin: 0; min-height: 100vh; background: linear-gradient(180deg, #eef2ff 0%, #f8fafc 100%); }
        a { text-decoration: none; }

        .container { width: min(1200px, 100% - 2rem); margin: 0 auto; padding: 0.5rem 0; }
        header { background: #1f2937; color: #f9fafb; }
        header .bar { display: flex; justify-content: space-between; align-items: center; gap: 1rem; padding: 0.75rem 0; }
        .brand { font-size: 1.35rem; font-weight: 700; letter-spacing: -0.03em; }
        .brand span { color: #60a5fa; }
        .nav-links, .auth-links { display: flex; flex-wrap: wrap; gap: 0.75rem; align-items: center; }
        .nav-links a, .auth-links a, .auth-links button { color: #f8fafc; font-weight: 500; }
        .nav-links a:hover, .auth-links a:hover, .auth-links button:hover { color: #bfdbfe; }
        .auth-links button { border: none; background: transparent; cursor: pointer; font: inherit; }

        .hero { padding: 2rem 0; margin: ; }
        .card { background: #ffffffee; border: 1px solid rgba(148,163,184,0.22); border-radius: 1rem; box-shadow: 0 25px 80px rgba(15,23,42,0.08); padding: 2rem; }
        .alert { padding: 1rem 1.25rem; border-radius: 0.85rem; margin-bottom: 1.5rem; background: #d1fae5; color: #065f46; border: 1px solid #a7f3d0; }
        .button, .btn { display: inline-flex; align-items: center; justify-content: center; gap: 0.5rem; border-radius: 999px; padding: 0.85rem 1.4rem; font-weight: 600; transition: transform .15s ease, background .15s ease; }
        .button { background: #2563eb; color: #fff; }
        .button:hover { transform: translateY(-1px); background: #1d4ed8; }
        .button.secondary { background: #f8fafc; color: #1f2937; border: 1px solid #cbd5e1; }
        .button.secondary:hover { background: #e2e8f0; }
        .button.danger { background: #ef4444; color: #fff; }
        .button.danger:hover { background: #dc2626; }
        .button.ghost { background: transparent; color: #fff; border: 1px solid rgba(248,250,252,.3); }
        .card h1, .card h2 { margin-top: 0; }

        .stack { display: grid; gap: 1.25rem; }
        .grid { display: grid; gap: 1.5rem; margin-top: 2rem; }
        .grid-2 { grid-template-columns: repeat(2, minmax(0, 1fr)); }
        .input-group { margin-bottom: 1.25rem; }
        label { display: block; font-size: 0.95rem; margin-bottom: 0.5rem; font-weight: 600; color: #475569; }
        input, textarea { width: 100%; padding: 0.95rem 1rem; border: 1px solid #cbd5e1; border-radius: 0.85rem; font-size: 1rem; background: #fff; color: #111827; }
        input:focus, textarea:focus { outline: none; border-color: #60a5fa; box-shadow: 0 0 0 4px rgba(59,130,246,0.12); }
        textarea { min-height: 180px; resize: vertical; }
        .text-danger { color: #dc2626; margin-top: 0.5rem; font-size: 0.95rem; }

        .table { width: 100%; border-collapse: collapse; }
        .table th, .table td { padding: 1rem 1rem; border-bottom: 1px solid #e2e8f0; }
        .table th { text-align: left; color: #475569; background: #f8fafc; font-weight: 700; }
        .table tbody tr:hover { background: #f8fafc; }
        .pill { padding: 0.35rem 0.8rem; border-radius: 999px; background: #e0f2fe; color: #0369a1; font-size: 0.9rem; font-weight: 600; }
        .author { color: #475569; font-size: 0.95rem; }

        .meta-row { display: flex; flex-wrap: wrap; gap: 1rem; color: #64748b; font-size: 0.95rem; margin-top: 1rem; }
        .actions { display: flex; flex-wrap: wrap; gap: 0.5rem; }

        @media (max-width: 900px) {
            .bar { flex-direction: column; align-items: stretch; }
            .grid-2 { grid-template-columns: 1fr; }
        }
    </style>
</head>
<body>
    <header>
        <div class="container">
            <div class="bar">
                <div class="brand"><span>Post</span> Studio</div>
                <div class="nav-links">
                    <a href="{{ route('index') }}">Bosh sahifa</a>
                    @auth
                        <a href="{{ route('posts.index') }}">Postlar</a>
                    @endauth
                </div>
                <div class="auth-links">
                    @auth
                        <span>{{ auth()->user()->name }}</span>
                        <a href="{{ route('profile.edit') }}">Profil</a>
                        <form method="POST" action="{{ route('logout') }}" style="display: inline;">
                            @csrf
                            <button type="submit" class="button danger">Chiqish</button>
                        </form>
                    @else
                        <a class="button ghost" href="{{ route('login') }}">Kirish</a>
                        <a class="button secondary" href="{{ route('register') }}">Ro'yxatdan o'tish</a>
                    @endauth
                </div>
            </div>
        </div>
    </header>
    <main class="container">
        @if(session('success'))
            <div id="flash-alert" class="alert">
                {{ session('success') }}
            </div>
        @endif

        @yield('content')
    </main>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const alert = document.getElementById('flash-alert');
            if (alert) {
                // 3000ms = 3 sekund kutish
                setTimeout(() => {
                    // Sekin yo'qolish effekti
                    alert.style.transition = "opacity 0.6s ease";
                    alert.style.opacity = "0";
                    
                    // Elementni butunlay o'chirish
                    setTimeout(() => {
                        alert.remove();
                    }, 600);
                }, 3000);
            }
        });
    </script>
</body>
</html>
</body>
</html>
