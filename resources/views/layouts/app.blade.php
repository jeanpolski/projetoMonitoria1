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
        
        /* Header */
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
        }
        
        .logo-text {
            font-size: 1.125rem;
            font-weight: 600;
            color: var(--color-primary);
            text-decoration: none;
            display: flex;
            align-items: center;
            gap: 8px;
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
        }
        
        .nav-link {
            padding: 8px 16px;
            color: var(--color-secondary);
            text-decoration: none;
            font-size: 0.9375rem;
            font-weight: 500;
            border-radius: 8px;
            transition: all 0.15s ease;
        }
        
        .nav-link:hover {
            color: var(--color-primary);
            background: var(--color-hover);
        }
        
        .nav-link.active {
            color: var(--color-primary);
            background: var(--color-hover);
        }
        
        /* Mobile Menu */
        .mobile-menu-button {
            display: none;
            padding: 8px;
            border: none;
            background: none;
            cursor: pointer;
            color: var(--color-primary);
        }
        
        .mobile-menu-icon {
            width: 24px;
            height: 24px;
        }
        
        /* Main Content */
        main {
            flex: 1;
        }
        
        /* Footer */
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
        
        /* Responsive */
        @media (max-width: 768px) {
            .header-container {
                height: 56px;
            }
            
            .nav {
                display: none;
            }
            
            .mobile-menu-button {
                display: block;
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
            
            <button class="mobile-menu-button" aria-label="Menu">
                <svg class="mobile-menu-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                </svg>
            </button>
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
    
    @yield('scripts')
</body>
</html>
