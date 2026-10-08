<!DOCTYPE html> 
 
<html lang="pt-BR"> 
 
<head> 
 
    <meta charset="UTF-8"> 
    <meta 
        name="viewport" content="width=device-width, initial-scale=1.0"> 
 
    <title> 
        @yield('title', 'MarketWatch') 
    </title> 
 
    <link 
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" 
        rel="stylesheet" > 
 
    <style> 
 
        body { 
            background: #0b0f19; 
            color: #f3f4f6; 
            min-height: 100vh; 
            padding-top: 80px; 
        } 

        .card-custom { 
            background: #151c2c; 
            border: 1px solid #2a3447; 
            border-radius: 12px; 
        } 
 
        .text-cyan { 
            color: #06b6d4; 
        } 
 
        .btn-cyan { 
            background: #06b6d4; 
            border: none; 
            color: #000; 
        } 
 
    </style> 
 
</head> 
 
<body> 
 
<main class="container"> 
 
    @if(session('success')) 
 
        <div class="alert alert-success"> 
            {{ session('success') }} 
        </div> 
 
    @endif 
 
    @yield('content') 
 
</main> 
</body> 
</html>
