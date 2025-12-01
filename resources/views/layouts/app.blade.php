<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Sistema de Monitoria') - FATEC Praia Grande</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        :root {
            --color-background: #fafafa;
            --color-surface: #ffffff;
            --color-primary: #0f172a;
            --color-secondary: #64748b;
            --color-border: #e2e8f0;
            --color-hover: #f8fafc;
            --color-success: #10b981;
            --font-sans: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif;
            --radius: 12px;
        }

        body {
            font-family: var(--font-sans);
            background-color: var(--color-background);
            color: var(--color-primary);
            line-height: 1.6;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        .header {
            background: var(--color-surface);
            border-bottom: 1px solid var(--color-border);
            padding: 0 24px;
            position: sticky;
            top: 0;
            z-index: 100;
        }

        .header-container {
            max-width: 1400px;
            margin: 0 auto;
            display: flex;
            align-items: center;
            justify-content: space-between;
            height: 64px;
            gap: 24px;
        }

        .logo-text {
            font-size: 1.125rem;
            font-weight: 600;
            color: var(--color-primary);
            text-decoration: none;
            display: flex;
            align-items: center;
            gap: 8px;
            flex-shrink: 0;
        }

        .logo-icon {
            width: 24px;
            height: 24px;
            color: var(--color-secondary);
        }

        .nav {
            display: flex;
            align-items: center;
            gap: 4px;
            flex: 1;
        }

        .nav-link {
            padding: 8px 16px;
            color: var(--color-secondary);
            text-decoration: none;
            font-size: 0.9375rem;
            font-weight: 500;
            border-radius: 8px;
            transition: all 0.15s ease;
            white-space: nowrap;
        }

        .nav-link:hover {
            color: var(--color-primary);
            background: var(--color-hover);
        }

        .nav-link.active {
            color: var(--color-primary);
            background: var(--color-hover);
        }

        .auth-section {
            display: flex;
            align-items: center;
            gap: 12px;
            flex-shrink: 0;
        }

        .btn-login {
            padding: 8px 16px;
            color: var(--color-primary);
            text-decoration: none;
            font-size: 0.9375rem;
            font-weight: 500;
            border-radius: 8px;
            border: none;
            background: none;
            cursor: pointer;
            transition: all 0.15s ease;
        }

        .btn-login:hover {
            color: var(--color-primary);
            background: var(--color-hover);
        }

        .btn-signup {
            padding: 8px 16px;
            color: var(--color-surface);
            background: var(--color-primary);
            text-decoration: none;
            font-size: 0.9375rem;
            font-weight: 500;
            border-radius: 8px;
            border: none;
            cursor: pointer;
            transition: all 0.15s ease;
        }

        .btn-signup:hover {
            background: #1e293b;
            opacity: 0.9;
        }

        .user-menu {
            position: relative;
        }

        .user-menu-button {
            padding: 8px 12px;
            display: flex;
            align-items: center;
            gap: 8px;
            background: var(--color-hover);
            border: 1px solid var(--color-border);
            border-radius: 8px;
            cursor: pointer;
            font-size: 0.9375rem;
            color: var(--color-primary);
            transition: all 0.15s ease;
        }

        .user-menu-button:hover {
            background: var(--color-border);
        }

        .user-avatar {
            width: 24px;
            height: 24px;
            border-radius: 6px;
            background: #e2e8f0;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 0.75rem;
            font-weight: 600;
            color: var(--color-primary);
        }

        .user-dropdown {
            position: absolute;
            top: 100%;
            right: 0;
            background: var(--color-surface);
            border: 1px solid var(--color-border);
            border-radius: 8px;
            min-width: 180px;
            margin-top: 8px;
            box-shadow: 0 4px 12px rgba(15, 23, 42, 0.08);
            opacity: 0;
            visibility: hidden;
            transform: translateY(-4px);
            transition: all 0.2s ease;
            z-index: 1000;
        }

        .user-menu.active .user-dropdown {
            opacity: 1;
            visibility: visible;
            transform: translateY(0);
        }

        .dropdown-item {
            display: block;
            padding: 12px 16px;
            color: var(--color-secondary);
            text-decoration: none;
            font-size: 0.9375rem;
            transition: all 0.15s ease;
            border: none;
            background: none;
            width: 100%;
            text-align: left;
            cursor: pointer;
        }

        .dropdown-item:hover {
            color: var(--color-primary);
            background: var(--color-hover);
        }

        .dropdown-item.danger {
            color: #ef4444;
        }

        .dropdown-item.danger:hover {
            background: #fee2e2;
        }

        .dropdown-divider {
            height: 1px;
            background: var(--color-border);
            margin: 4px 0;
        }

        .mobile-menu-button {
            display: none;
            padding: 8px;
            border: none;
            background: none;
            cursor: pointer;
            color: var(--color-primary);
            flex-shrink: 0;
        }

        .mobile-menu-icon {
            width: 24px;
            height: 24px;
        }

        main {
            flex: 1;
        }

        .footer {
            background: var(--color-surface);
            border-top: 1px solid var(--color-border);
            padding: 32px 24px;
            margin-top: auto;
        }

        .footer-container {
            max-width: 1400px;
            margin: 0 auto;
            display: flex;
            align-items: center;
            justify-content: space-between;
            flex-wrap: wrap;
            gap: 16px;
        }

        .footer-text {
            color: var(--color-secondary);
            font-size: 0.875rem;
        }

        .footer-links {
            display: flex;
            gap: 24px;
        }

        .footer-link {
            color: var(--color-secondary);
            text-decoration: none;
            font-size: 0.875rem;
            transition: color 0.15s ease;
        }

        .footer-link:hover {
            color: var(--color-primary);
        }

        @media (max-width: 768px) {
            .header-container {
                height: 56px;
                gap: 12px;
            }

            .nav {
                display: none;
            }

            .mobile-menu-button {
                display: block;
            }

            .auth-section {
                gap: 8px;
            }

            .btn-login,
            .btn-signup {
                padding: 6px 12px;
                font-size: 0.875rem;
            }

            .user-menu-button {
                padding: 6px 10px;
                font-size: 0.875rem;
            }

            .footer-container {
                flex-direction: column;
                text-align: center;
            }

            .footer-links {
                flex-direction: column;
                gap: 12px;
            }
        }
    </style>

    @yield('styles')
</head>

<body>
    @if(session('error'))
    <div style="
        background: #fee2e2;
        color: #b91c1c;
        padding: 12px;
        margin: 10px;
        border-radius: 8px;
        text-align: center;
        font-weight: 600;
    ">
        {{ session('error') }}
    </div>
    @endif

    <header class="header">
        <div class="header-container">
            <a href="{{ url('/') }}" class="logo-text">
                <svg class="logo-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                </svg>
                Sistema de Monitoria
            </a>

            <nav class="nav">
                <a href="{{ url('/') }}" class="nav-link {{ Request::is('/') ? 'active' : '' }}">
                    Início
                </a>
                <a href="{{ url('/sessions') }}" class="nav-link {{ Request::is('sessions*') ? 'active' : '' }}">
                    Sessões
                </a>
                <a href="{{ url('/availabilities') }}" class="nav-link {{ Request::is('availabilities*') ? 'active' : '' }}">
                    Disponibilidades
                </a>
                <a href="{{ url('/monitors') }}" class="nav-link {{ Request::is('monitors*') ? 'active' : '' }}">
                    Monitores
                </a>
                <a href="{{ url('/subjects') }}" class="nav-link {{ Request::is('subjects*') ? 'active' : '' }}">
                    Matérias
                </a>
            </nav>

            <div class="auth-section">
                @auth
                <div class="user-menu" id="userMenu">
                    <button class="user-menu-button" onclick="document.getElementById('userMenu').classList.toggle('active')">
                        <div class="user-avatar">
                            {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                        </div>
                        <span>{{ Auth::user()->name }}</span>
                        <svg width="16" height="16" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7 7m0 0l-7-7m7 7V3" />
                        </svg>
                    </button>
                    <div class="user-dropdown">
                        <a href="{{ route('profile.edit') }}" class="dropdown-item">Perfil</a>
                        <div class="dropdown-divider"></div>
                        <form method="POST" action="{{ route('logout') }}" style="margin: 0;">
                            @csrf
                            <button type="submit" class="dropdown-item danger">Sair</button>
                        </form>
                    </div>
                </div>
                @else
                <a href="{{ route('login') }}" class="btn-login">Login</a>
                <a href="{{ route('register') }}" class="btn-signup">Cadastro</a>
                @endauth
            </div>
        </div>
    </header>

    <main>
        @yield('content')
    </main>

    <footer class="footer">
        <div class="footer-container">
            <p class="footer-text">
                &copy; {{ date('Y') }} FATEC Praia Grande - Sistema de Monitoria
            </p>
            <div class="footer-links">
                <a href="#" class="footer-link">Suporte</a>
                <a href="#" class="footer-link">Documentação</a>
                <a href="{{ route('about') }}" class="footer-link">Sobre</a>
            </div>
        </div>
    </footer>

    <script>
        document.addEventListener('click', function(event) {
            const userMenu = document.getElementById('userMenu');
            if (userMenu && !userMenu.contains(event.target)) {
                userMenu.classList.remove('active');
            }
        });
    </script>

    @yield('scripts')
</body>

</html>