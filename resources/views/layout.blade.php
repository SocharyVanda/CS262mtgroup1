<!DOCTYPE html>
<html class="light" lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>@yield('title', 'STEM Cambodia')</title>
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <link
        href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;600;700&family=Inter:wght@400;600&family=Noto+Sans+Khmer:wght@400&display=swap"
        rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap"
        rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous">
    </script>
    <script id="tailwind-config">
        tailwind.config = {
            darkMode: "class",
            theme: {
                extend: {
                    "colors": {
                        "primary-fixed-dim": "#4edea3",
                        "on-primary-fixed": "#002113",
                        "surface-container-low": "#eff4ff",
                        "surface-bright": "#f8f9ff",
                        "outline-variant": "#bbcabf",
                        "inverse-primary": "#4edea3",
                        "on-error": "#ffffff",
                        "outline": "#6c7a71",
                        "on-error-container": "#93000a",
                        "background": "#f8f9ff",
                        "on-primary": "#ffffff",
                        "on-secondary-fixed-variant": "#3f465c",
                        "primary-container": "#10b981",
                        "tertiary-container": "#71a1ff",
                        "on-background": "#0b1c30",
                        "on-tertiary-fixed-variant": "#004395",
                        "surface-tint": "#006c49",
                        "on-secondary-fixed": "#131b2e",
                        "inverse-on-surface": "#eaf1ff",
                        "surface-variant": "#d3e4fe",
                        "on-tertiary-container": "#00367a",
                        "inverse-surface": "#213145",
                        "surface": "#f8f9ff",
                        "tertiary-fixed-dim": "#adc6ff",
                        "on-secondary": "#ffffff",
                        "surface-container": "#e5eeff",
                        "surface-dim": "#cbdbf5",
                        "on-primary-fixed-variant": "#005236",
                        "secondary": "#565e74",
                        "surface-container-highest": "#d3e4fe",
                        "on-tertiary": "#ffffff",
                        "secondary-container": "#dae2fd",
                        "error-container": "#ffdad6",
                        "on-surface-variant": "#3c4a42",
                        "primary": "#006c49",
                        "secondary-fixed-dim": "#bec6e0",
                        "tertiary": "#005ac2",
                        "primary-fixed": "#6ffbbe",
                        "secondary-fixed": "#dae2fd",
                        "error": "#ba1a1a",
                        "on-primary-container": "#00422b",
                        "on-surface": "#0b1c30",
                        "surface-container-high": "#dce9ff",
                        "surface-container-lowest": "#ffffff",
                        "tertiary-fixed": "#d8e2ff",
                        "on-tertiary-fixed": "#001a42",
                        "on-secondary-container": "#5c647a"
                    },
                    "borderRadius": {
                        "DEFAULT": "0.25rem",
                        "lg": "0.5rem",
                        "xl": "0.75rem",
                        "full": "9999px"
                    },
                    "spacing": {
                        "md": "24px",
                        "base": "8px",
                        "lg": "48px",
                        "xl": "80px",
                        "xs": "4px",
                        "sm": "12px",
                        "gutter": "24px",
                        "container-max": "1280px"
                    },
                    "fontFamily": {
                        "headline-md": ["Plus Jakarta Sans"],
                        "body-md": ["Inter"],
                        "display-lg-mobile": ["Plus Jakarta Sans"],
                        "label-sm": ["Inter"],
                        "khmer-body": ["Noto Sans Khmer"],
                        "body-lg": ["Inter"],
                        "display-lg": ["Plus Jakarta Sans"]
                    },
                    "fontSize": {
                        "headline-md": ["24px", {
                            "lineHeight": "1.3",
                            "fontWeight": "600"
                        }],
                        "body-md": ["16px", {
                            "lineHeight": "1.5",
                            "fontWeight": "400"
                        }],
                        "display-lg-mobile": ["32px", {
                            "lineHeight": "1.2",
                            "fontWeight": "700"
                        }],
                        "label-sm": ["12px", {
                            "lineHeight": "1",
                            "letterSpacing": "0.05em",
                            "fontWeight": "600"
                        }],
                        "khmer-body": ["16px", {
                            "lineHeight": "1.8",
                            "fontWeight": "400"
                        }],
                        "body-lg": ["18px", {
                            "lineHeight": "1.6",
                            "fontWeight": "400"
                        }],
                        "display-lg": ["48px", {
                            "lineHeight": "1.2",
                            "letterSpacing": "-0.02em",
                            "fontWeight": "700"
                        }]
                    }
                }
            }
        }
    </script>
    <style>
        .ambient-shadow:hover {
            box-shadow: 0 10px 15px -3px rgba(86, 94, 116, 0.1), 0 4px 6px -2px rgba(86, 94, 116, 0.05);
        }

        .glass-panel {
            background: rgba(255, 255, 255, 0.7);
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
            border: 1px solid rgba(255, 255, 255, 0.3);
        }

        .btn-glass {
            background: rgba(255, 255, 255, 0.2);
            /* Semi-transparent background */
            backdrop-filter: blur(8px);
            /* The blur effect that creates the "frosted" look */
            border: 1px solid rgba(255, 255, 255, 0.3);
            /* A subtle border adds depth */
            box-shadow: 0 4px 30px rgba(0, 0, 0, 0.1);
            /* Soft shadow for a "floating" effect */
            color: rgb(34, 24, 24);
        }
    </style>
</head>

<body class="bg-background text-on-background font-body-md min-h-screen flex flex-col pt-16">

    <nav
        class="bg-surface dark:bg-inverse-surface shadow-sm fixed top-0 left-0 w-full z-50 flex justify-between items-center px-gutter h-16 max-w-container-max mx-auto">
        <div class="flex items-center gap-sm">
            <span class="text-headline-md font-headline-md font-bold text-primary dark:text-primary-fixed-dim">STEM
                Cambodia</span>
        </div>
        <div class="hidden md:flex gap-md">
            <a class="text-primary dark:text-primary-fixed-dim border-b-2 border-primary dark:border-primary-fixed-dim pb-1 font-bold text-body-md font-body-md transition-all duration-200 active:scale-95 hover:bg-surface-container-low dark:hover:bg-surface-variant px-2 rounded-t-sm"
                href="{{ url('') }}">Home</a>
            <a class="text-on-surface-variant dark:text-outline-variant hover:text-primary dark:hover:text-primary-fixed-dim transition-colors text-body-md font-body-md transition-all duration-200 active:scale-95 hover:bg-surface-container-low dark:hover:bg-surface-variant px-2 rounded-sm pb-1"
                href="#">News</a>
            <a class="text-on-surface-variant dark:text-outline-variant hover:text-primary dark:hover:text-primary-fixed-dim transition-colors text-body-md font-body-md transition-all duration-200 active:scale-95 hover:bg-surface-container-low dark:hover:bg-surface-variant px-2 rounded-sm pb-1"
                href="#">Bookmarks</a>
            <a class="nav-item nav-link link-body-emphasis" href="/signup">sign up</a>
            <a class="nav-item nav-link link-body-emphasis" href="/dashboard">Profile</a>

        </div>
    </nav>

    @yield('content')


</body>

</html>
