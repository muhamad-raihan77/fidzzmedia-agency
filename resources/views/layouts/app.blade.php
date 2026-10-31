<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $settings['meta_title'] ?? 'FidzzTeck — Agensi Digital & Pengembangan Software' }}</title>
    <meta name="description" content="{{ $settings['meta_description'] ?? 'FidzzTeck merancang dan membangun website, aplikasi web, dan solusi digital kustom modern.' }}">
    
    @php
        $favicon = !empty($settings['site_favicon']) ? asset('storage/' . $settings['site_favicon']) : asset('favicon.svg');
    @endphp
    <link rel="icon" type="image/svg+xml" href="{{ $favicon }}">

    <!-- Google Fonts: Plus Jakarta Sans -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&family=Caveat:wght@600;700&display=swap" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        .font-handwriting {
            font-family: 'Caveat', cursive;
        }
        [x-cloak] { display: none !important; }
    </style>
</head>
<body class="bg-white text-slate-800 antialiased selection:bg-blue-600 selection:text-white font-sans overflow-x-hidden">

    <!-- Toast Notification -->
    @if(session('success'))
        <div id="toast-success" class="fixed top-24 right-5 z-50 flex items-center p-4 mb-4 max-w-md text-slate-900 bg-white rounded-xl shadow-2xl border-l-4 border-emerald-500 transition-all duration-500 ease-out">
            <div class="inline-flex items-center justify-center flex-shrink-0 w-8 h-8 text-emerald-500 bg-emerald-100 rounded-lg">
                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path></svg>
            </div>
            <div class="ml-3 text-sm font-medium">{{ session('success') }}</div>
            <button type="button" onclick="document.getElementById('toast-success').remove()" class="ml-auto -mx-1.5 -my-1.5 text-slate-400 hover:text-slate-900 rounded-lg p-1.5">
                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
            </button>
        </div>
        <script>
            setTimeout(() => {
                const toast = document.getElementById('toast-success');
                if (toast) toast.remove();
            }, 6000);
        </script>
    @endif

    <!-- Content -->
    @yield('content')

</body>
</html>

