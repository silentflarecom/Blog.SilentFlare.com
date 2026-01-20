<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'SilentFlare') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Instrument+Sans:ital,wght@0,400..700;1,400..700&display=swap" rel="stylesheet">

    <!-- Styles / Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
</head>
<body class="bg-sf-bg text-sf-text font-sans antialiased selection:bg-sf-accent selection:text-sf-bg min-h-screen flex flex-col">
    <!-- Navbar -->
    <header x-data="{ mobileMenuOpen: false, searchOpen: false }" class="fixed w-full top-0 z-50 glass-panel border-b border-sf-border/50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16">
                <!-- Logo & Desktop Nav -->
                <div class="flex">
                    <div class="shrink-0 flex items-center">
                        <a href="{{ route('home') }}" class="text-2xl font-bold tracking-tight group">
                            <span class="text-sf-text group-hover:text-sf-accent transition duration-300">Silent</span><span class="text-sf-accent group-hover:text-sf-text transition duration-300">Flare</span>
                        </a>
                    </div>
                    <div class="hidden sm:ml-10 sm:flex sm:space-x-8">
                        <x-nav-link href="{{ route('home') }}" :active="request()->routeIs('home')">
                            Home
                        </x-nav-link>
                        <x-nav-link href="#" :active="request()->routeIs('categories')">
                            Categories
                        </x-nav-link>
                        <x-nav-link href="#" :active="request()->routeIs('archives')">
                            Archives
                        </x-nav-link>
                         <x-nav-link href="#" :active="request()->routeIs('friends')">
                            Friends
                        </x-nav-link>
                    </div>
                </div>

                <!-- Right Side Icons -->
                <div class="hidden sm:ml-6 sm:flex sm:items-center space-x-4">
                     <!-- Search Trigger -->
                     <button @click="searchOpen = !searchOpen" class="p-2 text-sf-text-muted hover:text-sf-accent transition-colors focus:outline-none">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                    </button>
                    
                    <!-- Monitoring Icon (Mock) -->
                     <a href="#" class="p-2 text-sf-text-muted hover:text-sf-success transition-colors" title="System Normal">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path></svg>
                    </a>
                </div>

                <!-- Mobile Menu Button -->
                <div class="-mr-2 flex items-center sm:hidden">
                    <button @click="mobileMenuOpen = ! mobileMenuOpen" class="inline-flex items-center justify-center p-2 rounded-md text-sf-text-muted hover:text-sf-text hover:bg-sf-card focus:outline-none transition duration-150 ease-in-out">
                        <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                            <path :class="{'hidden': mobileMenuOpen, 'inline-flex': ! mobileMenuOpen }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                            <path :class="{'hidden': ! mobileMenuOpen, 'inline-flex': mobileMenuOpen }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>

        <!-- Mobile Menu -->
        <div :class="{'block': mobileMenuOpen, 'hidden': ! mobileMenuOpen}" class="hidden sm:hidden glass-panel border-t border-sf-border">
            <div class="pt-2 pb-3 space-y-1">
                <a href="{{ route('home') }}" class="block pl-3 pr-4 py-2 border-l-4 {{ request()->routeIs('home') ? 'border-sf-accent text-sf-accent bg-sf-accent/10' : 'border-transparent text-sf-text-muted hover:text-sf-text hover:bg-sf-card hover:border-sf-text-muted' }} text-base font-medium transition duration-150 ease-in-out">
                    Home
                </a>
                <a href="#" class="block pl-3 pr-4 py-2 border-l-4 border-transparent text-sf-text-muted hover:text-sf-text hover:bg-sf-card hover:border-sf-text-muted text-base font-medium transition duration-150 ease-in-out">Categories</a>
                <a href="#" class="block pl-3 pr-4 py-2 border-l-4 border-transparent text-sf-text-muted hover:text-sf-text hover:bg-sf-card hover:border-sf-text-muted text-base font-medium transition duration-150 ease-in-out">Archives</a>
                <a href="#" class="block pl-3 pr-4 py-2 border-l-4 border-transparent text-sf-text-muted hover:text-sf-text hover:bg-sf-card hover:border-sf-text-muted text-base font-medium transition duration-150 ease-in-out">Friends</a>
            </div>
        </div>

        <!-- Search Overlay -->
        <div x-cloak x-show="searchOpen" @keydown.escape.window="searchOpen = false" class="absolute inset-x-0 top-16 p-4 glass-panel border-b border-sf-border animate-slide-down">
            <div class="max-w-3xl mx-auto">
                <input type="text" placeholder="Search articles..." class="w-full bg-sf-card border border-sf-border rounded-lg py-3 px-4 text-sf-text placeholder-sf-text-muted focus:outline-none focus:border-sf-accent focus:ring-1 focus:ring-sf-accent transition-all neon-border">
            </div>
        </div>
    </header>

    <!-- Main Content -->
    <main class="flex-grow pt-24 pb-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex flex-col lg:flex-row gap-8">
                <!-- Content Area -->
                <div class="w-full lg:w-3/4">
                    {{ $slot }}
                </div>
                
                <!-- Sidebar -->
                <div class="w-full lg:w-1/4">
                    <x-widgets.sidebar />
                </div>
            </div>
        </div>
    </main>

    <!-- Footer -->
    <footer class="glass-panel border-t border-sf-border mt-auto">
        <div class="max-w-7xl mx-auto py-8 px-4 sm:px-6 lg:px-8">
            <div class="md:flex md:items-center md:justify-between">
                <div class="text-center md:text-left">
                    <p class="text-base text-sf-text-muted">
                        &copy; {{ date('Y') }} SilentFlare. All rights reserved.
                    </p>
                </div>
                <div class="mt-4 flex justify-center md:mt-0 space-x-6">
                    <a href="#" class="text-sf-text-muted hover:text-sf-accent transition-colors">Twitter</a>
                    <a href="#" class="text-sf-text-muted hover:text-sf-accent transition-colors">GitHub</a>
                </div>
            </div>
        </div>
    </footer>

    @livewireScripts
</body>
</html>
