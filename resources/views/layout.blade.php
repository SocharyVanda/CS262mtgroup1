<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>@yield('title', 'STEMBODIAN')</title>

    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <script src="{{ asset('js/tailwind.config.js') }}"></script>

    {{--3. Google Fonts --}}
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;600;700&family=Inter:wght@400;600&family=Noto+Sans+Khmer:wght@400&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet">


    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>


    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>



<body class="bg-background text-on-background font-body-md min-h-screen flex flex-col pt-16">

<nav class="bg-surface dark:bg-inverse-surface shadow-sm fixed top-0 left-0 w-full z-50 h-16 border-b border-surface-container-low dark:border-surface-variant">
    
    <div class="w-full h-full px-6 md:px-12 flex justify-between items-center">
        
        <div class="flex items-center">
            <span class="text-headline-md font-headline-md font-bold text-primary dark:text-primary-fixed-dim tracking-tight">STEMBODIAN</span>
        </div>
        <div class="hidden md:flex gap-md">
            <a class="text-primary dark:text-primary-fixed-dim border-b-2 border-primary dark:border-primary-fixed-dim pb-1 font-bold text-body-md font-body-md transition-all duration-200 active:scale-95 hover:bg-surface-container-low dark:hover:bg-surface-variant px-2 rounded-t-sm" href="http://cs262mtgroup1.test">Home</a>
            <a class="text-on-surface-variant dark:text-outline-variant hover:text-primary dark:hover:text-primary-fixed-dim transition-colors text-body-md font-body-md transition-all duration-200 active:scale-95 hover:bg-surface-container-low dark:hover:bg-surface-variant px-2 rounded-sm pb-1" href="http://cs262mtgroup1.test/dashboard">Dashboard</a>
            <a class="nav-item nav-link link-body-emphasis" href="http://cs262mtgroup1.test/signup">sign up</a>

            <div class="btn-group">
                <button type="button" class="btn btn-danger dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                    Danger
                </button>
<ul class="dropdown-menu">
    <li><a class="dropdown-item" href="{{ url('http://cs262mtgroup1.test/science ') }}">SCIENCE</a></li>
    <li><a class="dropdown-item" href="{{ url('http://cs262mtgroup1.test/technology') }}">TECHNOLOGY</a></li>
    <li><a class="dropdown-item" href="{{ url('http://cs262mtgroup1.test/engineering') }}">ENGINEERING</a></li>
    <li><hr class="dropdown-divider"></li>
    <li><a class="dropdown-item" href="{{ url('http://cs262mtgroup1.test/mathematics') }}">MATHEMATICS</a></li>
</ul>
            </div>
        </div>
    </nav>



    @hasSection('page-title')
    <div class="page" id="page-@yield('page-id', 'generic')">
        <div class="cat-page-header py-4 bg-surface-container border-b border-outline-variant">
            <div class="container mx-auto px-gutter">
                <div class="cat-page-title-row flex items-center gap-md">
                    <span class="cat-big-icon text-4xl">@yield('page-icon', '🔬')</span>
                    <div>
                        <div class="cat-page-title text-headline-md font-bold" style="color: var(--@yield('page-color-var', 'primary'))">
                            @yield('page-title')
                        </div>
                        <div class="cat-page-desc text-secondary text-body-md">
                            @yield('page-description')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endif





    <main class="flex-1">
        @yield('content')
    </main>

<footer class="bg-surface-container-low dark:bg-inverse-surface border-t border-outline-variant dark:border-outline w-full rounded-none">
    <div class="max-w-container-max mx-auto px-margin-mobile md:px-margin-desktop py-6">
        
        <!-- Grid Layout for Desktop, Stacked for Mobile -->
        <div class="grid grid-cols-1 md:grid-cols-4 gap-gutter mb-6">
            <div class="space-y-4 col-span-full">
                
                <!-- Logo & Brand Header -->
                <div class="flex items-center gap-2">
                    <span class="material-symbols-outlined text-primary dark:text-primary-fixed-dim" style="font-size: 24px;">school</span>
                    <span class="font-title-md text-title-md font-bold text-on-surface dark:text-on-primary-container">STEMBODIAN</span>
                </div>
                
                <!-- Description -->
                <p class="font-body-md text-body-md text-on-surface-variant dark:text-surface-variant leading-relaxed max-w-xl">
                    Empowering Cambodia's next generation through accessible STEM education.
                </p>
                
                <!-- Navigation Links -->
                <div class="flex flex-wrap gap-6 pt-2">
                    <a class="font-label-md text-label-md text-on-surface-variant hover:text-primary transition-colors" href="#">Home</a>
                    <a class="font-label-md text-label-md text-on-surface-variant hover:text-primary transition-colors" href="#">Programs</a>
                    <a class="font-label-md text-label-md text-on-surface-variant hover:text-primary transition-colors" href="#">Contact</a>
                    <a class="font-label-md text-label-md text-on-surface-variant hover:text-primary transition-colors" href="#">Privacy</a>
                </div>
 
            </div>
        </div>
        
        <!-- Bottom Bar -->
        <div class="pt-8 border-t border-outline-variant dark:border-outline flex flex-col md:flex-row justify-between items-center gap-4">
            <p class="font-body-md text-body-md text-on-surface-variant dark:text-surface-variant text-center md:text-left">
                &copy; 2026 STEMBODIAN.
            </p>
            <div class="flex items-center gap-6">
                <div class="flex items-center gap-1">
                    <span class="material-symbols-outlined text-secondary" style="font-size: 18px;">location_on</span>
                    <span class="font-label-md text-label-md text-on-surface-variant dark:text-surface-variant">Phnom Penh, Cambodia</span>
                </div>
            </div>
        </div>

    </div>
</footer>

</body>
</html>