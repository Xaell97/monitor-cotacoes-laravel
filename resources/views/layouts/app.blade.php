<!DOCTYPE html> 
<html lang="pt-BR"> 
 
<head> 
    <meta charset="UTF-8"> 
 
    <meta 
        name="viewport" 
        content="width=device-width, initial-scale=1.0" 
    > 
 
    <title> 
        @yield( 
            'title', 
            'MarketWatch Analytics' 
        ) 
    </title> 
 
    <link 
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" 
        rel="stylesheet" 
    > 
 
    <link 
        href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css" 
        rel="stylesheet" 
    > 
 
    <style> 
        :root { 
            --bg-dark: #0b0f19; 
            --card-dark: #151c2c; 
            --border-dark: #2a3447; 
            --cyan-primary: #06b6d4; 
            --cyan-hover: #0891b2; 
            --gold-accent: #f59e0b; 
            --text-main: #f3f4f6; 
            --text-muted: #9ca3af; 
            --up-color: #10b981; 
            --down-color: #ef4444; 
        } 
 
        body { 
            font-family: 'Segoe UI', sans-serif; 
            background-color: var(--bg-dark); 
            color: var(--text-main); 
            min-height: 100vh; 
        } 
 
        .navbar-custom { 
            background-color: var(--card-dark); 
            border-bottom: 1px solid var(--border-dark); 
        } 
 
        .brand-text { 
            color: var(--cyan-primary); 
            font-weight: 700; 
        } 

        .card-custom { 
            background-color: var(--card-dark); 
            border: 1px solid var(--border-dark); 
            border-radius: 12px; 
        } 
 
        .text-cyan { 
            color: var(--cyan-primary) !important; 
        } 
 
        .text-gold { 
            color: var(--gold-accent) !important; 
        } 
 
        .text-up { 
            color: var(--up-color) !important; 
        } 
 
        .text-down { 
            color: var(--down-color) !important; 
        } 
 
        .btn-cyan { 
            background-color: var(--cyan-primary); 
            color: #000; 
            font-weight: 600; 
            border: none; 
        } 
 
        .btn-cyan:hover { 
            background-color: var(--cyan-hover); 
            color: #000; 
        } 
 
        .btn-outline-cyan { 
            border: 1px solid var(--cyan-primary); 
            color: var(--cyan-primary); 
        } 
 
        .btn-outline-cyan:hover { 
            background-color: var(--cyan-primary); 
            color: #000; 
        } 
 
        .form-control, 
        .form-select { 
            background-color: #0f172a; 
            border: 1px solid var(--border-dark); 
            color: var(--text-main); 
        } 
 
        .form-control:focus, 
        .form-select:focus { 
            background-color: #0f172a; 
            color: var(--text-main); 
            border-color: var(--cyan-primary); 
        } 
 
        .table-dark-custom { 
            color: var(--text-main); 
        } 
 
        .table-dark-custom th { 
            background-color: #0f172a; 
            color: var(--text-muted); 
        } 
 
        .table-dark-custom td { 
            background-color: transparent; 
            border-color: var(--border-dark); 
        } 
    </style> 
</head> 
 
<body> 
 
<nav class="navbar navbar-expand-lg navbar-custom py-3 mb-4"> 
 
    <div class="container"> 
 
        <a 
            class="navbar-brand" href="{{ route('assets.index') }}" > 
            <span class="brand-text"> 
                MarketWatch 
            </span> 
        </a> 
 
        <button 
            class="navbar-toggler" type="button" data-bs-toggle="collapse" 
            data-bs-target="#navbarNav" > 
            <span class="navbar-toggler-icon"></span> 
        </button> 
 
        <div 
            class="collapse navbar-collapse" 
            id="navbarNav" 
        > 
 
            <ul class="navbar-nav me-auto"> 
 
                <li class="nav-item"> 
                    <a 
                        class="nav-link text-light" 
                        href="{{ route('assets.index') }}" 
                    > 
                        Dashboard 
                    </a> 
                </li> 
 
                <li class="nav-item"> 
                    <a 
                        class="nav-link text-light" 
                        href="{{ route('alerts.index') }}" 
                    > 
                        Alertas 
                    </a> 
                </li> 
            </ul> 
            
            <div class="d-flex align-items-center gap-2"> 
 
                <span class="text-muted small"> 
                    {{ auth()->user()->name }} 
                </span> 
 
                <form 
                    action="{{ route('logout') }}" 
                    method="POST" 
                > 
                    @csrf 
 
                    <button 
                        type="submit" class="btn btn-outline-light btn-sm" > Sair 
                    </button> 
                </form> 
            </div> 
        </div> 
    </div> 
</nav> 
 
<main class="container mb-5"> 
 
    @if(session('success')) 
        <div class="alert alert-success"> 
            {{ session('success') }} 
        </div> 
    @endif 
 
    @if(session('error')) 
        <div class="alert alert-danger"> 
            {{ session('error') }} 
        </div> 
    @endif 
 
    @if(session('info')) 
        <div class="alert alert-info"> 
            {{ session('info') }} 
        </div> 
    @endif 
 
    @yield('content') 
 
</main> 
 
<script 
    src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" 
></script> 
 
</body> 
</html>
