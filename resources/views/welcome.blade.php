<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>FIS</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet"/>

    <!-- Styles -->
    <style>
        /* ! tailwindcss v3.2.4 | MIT License | https://tailwindcss.com */
        *, ::after, ::before {
            box-sizing: border-box;
            border-width: 0;
            border-style: solid;
            border-color: #e5e7eb
        }

        ::after, ::before {
            --tw-content: ''
        }

        html {
            line-height: 1.5;
            -webkit-text-size-adjust: 100%;
            -moz-tab-size: 4;
            tab-size: 4;
            font-family: Figtree, sans-serif;
            font-feature-settings: normal
        }

        body {
            margin: 0;
            line-height: inherit
        }

        hr {
            height: 0;
            color: inherit;
            border-top-width: 1px
        }

        abbr:where([title]) {
            -webkit-text-decoration: underline dotted;
            text-decoration: underline dotted
        }

        h1, h2, h3, h4, h5, h6 {
            font-size: inherit;
            font-weight: inherit
        }

        a {
            color: inherit;
            text-decoration: inherit
        }

        b, strong {
            font-weight: bolder
        }

        code, kbd, pre, samp {
            font-family: ui-monospace, SFMono-Regular, Menlo, Monaco, Consolas, "Liberation Mono", "Courier New", monospace;
            font-size: 1em
        }

        small {
            font-size: 80%
        }

        sub, sup {
            font-size: 75%;
            line-height: 0;
            position: relative;
            vertical-align: baseline
        }

        sub {
            bottom: -.25em
        }

        sup {
            top: -.5em
        }

        table {
            text-indent: 0;
            border-color: inherit;
            border-collapse: collapse
        }

        button, input, optgroup, select, textarea {
            font-family: inherit;
            font-size: 100%;
            font-weight: inherit;
            line-height: inherit;
            color: inherit;
            margin: 0;
            padding: 0
        }

        button, select {
            text-transform: none
        }

        [type=button], [type=reset], [type=submit], button {
            -webkit-appearance: button;
            background-color: transparent;
            background-image: none
        }

        :-moz-focusring {
            outline: auto
        }

        :-moz-ui-invalid {
            box-shadow: none
        }

        progress {
            vertical-align: baseline
        }

        ::-webkit-inner-spin-button, ::-webkit-outer-spin-button {
            height: auto
        }

        [type=search] {
            -webkit-appearance: textfield;
            outline-offset: -2px
        }

        ::-webkit-search-decoration {
            -webkit-appearance: none
        }

        ::-webkit-file-upload-button {
            -webkit-appearance: button;
            font: inherit
        }

        summary {
            display: list-item
        }

        blockquote, dd, dl, figure, h1, h2, h3, h4, h5, h6, hr, p, pre {
            margin: 0
        }

        fieldset {
            margin: 0;
            padding: 0
        }

        legend {
            padding: 0
        }

        menu, ol, ul {
            list-style: none;
            margin: 0;
            padding: 0
        }

        textarea {
            resize: vertical
        }

        input::placeholder, textarea::placeholder {
            opacity: 1;
            color: #9ca3af
        }

        [role=button], button {
            cursor: pointer
        }

        :disabled {
            cursor: default
        }

        audio, canvas, embed, iframe, img, object, svg, video {
            display: block;
            vertical-align: middle
        }

        img, video {
            max-width: 100%;
            height: auto
        }

        [hidden] {
            display: none
        }

        *, ::before, ::after {
            --tw-border-spacing-x: 0;
            --tw-border-spacing-y: 0;
            --tw-translate-x: 0;
            --tw-translate-y: 0;
            --tw-rotate: 0;
            --tw-skew-x: 0;
            --tw-skew-y: 0;
            --tw-scale-x: 1;
            --tw-scale-y: 1;
            --tw-pan-x: ;
            --tw-pan-y: ;
            --tw-pinch-zoom: ;
            --tw-scroll-snap-strictness: proximity;
            --tw-ordinal: ;
            --tw-slashed-zero: ;
            --tw-numeric-figure: ;
            --tw-numeric-spacing: ;
            --tw-numeric-fraction: ;
            --tw-ring-inset: ;
            --tw-ring-offset-width: 0px;
            --tw-ring-offset-color: #fff;
            --tw-ring-color: rgb(59 130 246 / 0.5);
            --tw-ring-offset-shadow: 0 0 #0000;
            --tw-ring-shadow: 0 0 #0000;
            --tw-shadow: 0 0 #0000;
            --tw-shadow-colored: 0 0 #0000;
            --tw-blur: ;
            --tw-brightness: ;
            --tw-contrast: ;
            --tw-grayscale: ;
            --tw-hue-rotate: ;
            --tw-invert: ;
            --tw-saturate: ;
            --tw-sepia: ;
            --tw-drop-shadow: ;
            --tw-backdrop-blur: ;
            --tw-backdrop-brightness: ;
            --tw-backdrop-contrast: ;
            --tw-backdrop-grayscale: ;
            --tw-backdrop-hue-rotate: ;
            --tw-backdrop-invert: ;
            --tw-backdrop-opacity: ;
            --tw-backdrop-saturate: ;
            --tw-backdrop-sepia:
        }

        ::-webkit-backdrop {
            --tw-border-spacing-x: 0;
            --tw-border-spacing-y: 0;
            --tw-translate-x: 0;
            --tw-translate-y: 0;
            --tw-rotate: 0;
            --tw-skew-x: 0;
            --tw-skew-y: 0;
            --tw-scale-x: 1;
            --tw-scale-y: 1;
            --tw-pan-x: ;
            --tw-pan-y: ;
            --tw-pinch-zoom: ;
            --tw-scroll-snap-strictness: proximity;
            --tw-ordinal: ;
            --tw-slashed-zero: ;
            --tw-numeric-figure: ;
            --tw-numeric-spacing: ;
            --tw-numeric-fraction: ;
            --tw-ring-inset: ;
            --tw-ring-offset-width: 0px;
            --tw-ring-offset-color: #fff;
            --tw-ring-color: rgb(59 130 246 / 0.5);
            --tw-ring-offset-shadow: 0 0 #0000;
            --tw-ring-shadow: 0 0 #0000;
            --tw-shadow: 0 0 #0000;
            --tw-shadow-colored: 0 0 #0000;
            --tw-blur: ;
            --tw-brightness: ;
            --tw-contrast: ;
            --tw-grayscale: ;
            --tw-hue-rotate: ;
            --tw-invert: ;
            --tw-saturate: ;
            --tw-sepia: ;
            --tw-drop-shadow: ;
            --tw-backdrop-blur: ;
            --tw-backdrop-brightness: ;
            --tw-backdrop-contrast: ;
            --tw-backdrop-grayscale: ;
            --tw-backdrop-hue-rotate: ;
            --tw-backdrop-invert: ;
            --tw-backdrop-opacity: ;
            --tw-backdrop-saturate: ;
            --tw-backdrop-sepia:
        }

        ::backdrop {
            --tw-border-spacing-x: 0;
            --tw-border-spacing-y: 0;
            --tw-translate-x: 0;
            --tw-translate-y: 0;
            --tw-rotate: 0;
            --tw-skew-x: 0;
            --tw-skew-y: 0;
            --tw-scale-x: 1;
            --tw-scale-y: 1;
            --tw-pan-x: ;
            --tw-pan-y: ;
            --tw-pinch-zoom: ;
            --tw-scroll-snap-strictness: proximity;
            --tw-ordinal: ;
            --tw-slashed-zero: ;
            --tw-numeric-figure: ;
            --tw-numeric-spacing: ;
            --tw-numeric-fraction: ;
            --tw-ring-inset: ;
            --tw-ring-offset-width: 0px;
            --tw-ring-offset-color: #fff;
            --tw-ring-color: rgb(59 130 246 / 0.5);
            --tw-ring-offset-shadow: 0 0 #0000;
            --tw-ring-shadow: 0 0 #0000;
            --tw-shadow: 0 0 #0000;
            --tw-shadow-colored: 0 0 #0000;
            --tw-blur: ;
            --tw-brightness: ;
            --tw-contrast: ;
            --tw-grayscale: ;
            --tw-hue-rotate: ;
            --tw-invert: ;
            --tw-saturate: ;
            --tw-sepia: ;
            --tw-drop-shadow: ;
            --tw-backdrop-blur: ;
            --tw-backdrop-brightness: ;
            --tw-backdrop-contrast: ;
            --tw-backdrop-grayscale: ;
            --tw-backdrop-hue-rotate: ;
            --tw-backdrop-invert: ;
            --tw-backdrop-opacity: ;
            --tw-backdrop-saturate: ;
            --tw-backdrop-sepia:
        }

        .relative {
            position: relative
        }

        .mx-auto {
            margin-left: auto;
            margin-right: auto
        }

        .mx-6 {
            margin-left: 1.5rem;
            margin-right: 1.5rem
        }

        .ml-4 {
            margin-left: 1rem
        }

        .mt-16 {
            margin-top: 4rem
        }

        .mt-6 {
            margin-top: 1.5rem
        }

        .mt-4 {
            margin-top: 1rem
        }

        .-mt-px {
            margin-top: -1px
        }

        .mr-1 {
            margin-right: 0.25rem
        }

        .flex {
            display: flex
        }

        .inline-flex {
            display: inline-flex
        }

        .grid {
            display: grid
        }

        .h-16 {
            height: 4rem
        }

        .h-7 {
            height: 1.75rem
        }

        .h-6 {
            height: 1.5rem
        }

        .h-5 {
            height: 1.25rem
        }

        .min-h-screen {
            min-height: 100vh
        }

        .w-auto {
            width: auto
        }

        .w-16 {
            width: 4rem
        }

        .w-7 {
            width: 1.75rem
        }

        .w-6 {
            width: 1.5rem
        }

        .w-5 {
            width: 1.25rem
        }

        .max-w-7xl {
            max-width: 80rem
        }

        .shrink-0 {
            flex-shrink: 0
        }

        .scale-100 {
            --tw-scale-x: 1;
            --tw-scale-y: 1;
            transform: translate(var(--tw-translate-x), var(--tw-translate-y)) rotate(var(--tw-rotate)) skewX(var(--tw-skew-x)) skewY(var(--tw-skew-y)) scaleX(var(--tw-scale-x)) scaleY(var(--tw-scale-y))
        }

        .grid-cols-1 {
            grid-template-columns:repeat(1, minmax(0, 1fr))
        }

        .items-center {
            align-items: center
        }

        .justify-center {
            justify-content: center
        }

        .gap-6 {
            gap: 1.5rem
        }

        .gap-4 {
            gap: 1rem
        }

        .self-center {
            align-self: center
        }

        .rounded-lg {
            border-radius: 0.5rem
        }

        .rounded-full {
            border-radius: 9999px
        }

        .bg-gray-100 {
            --tw-bg-opacity: 1;
            background-color: rgb(243 244 246 / var(--tw-bg-opacity))
        }

        .bg-white {
            --tw-bg-opacity: 1;
            background-color: rgb(255 255 255 / var(--tw-bg-opacity))
        }

        .bg-red-50 {
            --tw-bg-opacity: 1;
            background-color: rgb(254 242 242 / var(--tw-bg-opacity))
        }

        .bg-dots-darker {
            background-image: url("data:image/svg+xml,%3Csvg width='30' height='30' viewBox='0 0 30 30' fill='none' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M1.22676 0C1.91374 0 2.45351 0.539773 2.45351 1.22676C2.45351 1.91374 1.91374 2.45351 1.22676 2.45351C0.539773 2.45351 0 1.91374 0 1.22676C0 0.539773 0.539773 0 1.22676 0Z' fill='rgba(0,0,0,0.07)'/%3E%3C/svg%3E")
        }

        .from-gray-700\/50 {
            --tw-gradient-from: rgb(55 65 81 / 0.5);
            --tw-gradient-to: rgb(55 65 81 / 0);
            --tw-gradient-stops: var(--tw-gradient-from), var(--tw-gradient-to)
        }

        .via-transparent {
            --tw-gradient-to: rgb(0 0 0 / 0);
            --tw-gradient-stops: var(--tw-gradient-from), transparent, var(--tw-gradient-to)
        }

        .bg-center {
            background-position: center
        }

        .stroke-red-500 {
            stroke: #ef4444
        }

        .stroke-gray-400 {
            stroke: #9ca3af
        }

        .p-6 {
            padding: 1.5rem
        }

        .px-6 {
            padding-left: 1.5rem;
            padding-right: 1.5rem
        }

        .text-center {
            text-align: center
        }

        .text-right {
            text-align: right
        }

        .text-xl {
            font-size: 1.25rem;
            line-height: 1.75rem
        }

        .text-sm {
            font-size: 0.875rem;
            line-height: 1.25rem
        }

        .font-semibold {
            font-weight: 600
        }

        .leading-relaxed {
            line-height: 1.625
        }

        .text-gray-600 {
            --tw-text-opacity: 1;
            color: rgb(75 85 99 / var(--tw-text-opacity))
        }

        .text-gray-900 {
            --tw-text-opacity: 1;
            color: rgb(17 24 39 / var(--tw-text-opacity))
        }

        .text-gray-500 {
            --tw-text-opacity: 1;
            color: rgb(107 114 128 / var(--tw-text-opacity))
        }

        .underline {
            -webkit-text-decoration-line: underline;
            text-decoration-line: underline
        }

        .antialiased {
            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale
        }

        .shadow-2xl {
            --tw-shadow: 0 25px 50px -12px rgb(0 0 0 / 0.25);
            --tw-shadow-colored: 0 25px 50px -12px var(--tw-shadow-color);
            box-shadow: var(--tw-ring-offset-shadow, 0 0 #0000), var(--tw-ring-shadow, 0 0 #0000), var(--tw-shadow)
        }

        .shadow-gray-500\/20 {
            --tw-shadow-color: rgb(107 114 128 / 0.2);
            --tw-shadow: var(--tw-shadow-colored)
        }

        .transition-all {
            transition-property: all;
            transition-timing-function: cubic-bezier(0.4, 0, 0.2, 1);
            transition-duration: 150ms
        }

        .selection\:bg-red-500 *::selection {
            --tw-bg-opacity: 1;
            background-color: rgb(239 68 68 / var(--tw-bg-opacity))
        }

        .selection\:text-white *::selection {
            --tw-text-opacity: 1;
            color: rgb(255 255 255 / var(--tw-text-opacity))
        }

        .selection\:bg-red-500::selection {
            --tw-bg-opacity: 1;
            background-color: rgb(239 68 68 / var(--tw-bg-opacity))
        }

        .selection\:text-white::selection {
            --tw-text-opacity: 1;
            color: rgb(255 255 255 / var(--tw-text-opacity))
        }

        .hover\:text-gray-900:hover {
            --tw-text-opacity: 1;
            color: rgb(17 24 39 / var(--tw-text-opacity))
        }

        .hover\:text-gray-700:hover {
            --tw-text-opacity: 1;
            color: rgb(55 65 81 / var(--tw-text-opacity))
        }

        .focus\:rounded-sm:focus {
            border-radius: 0.125rem
        }

        .focus\:outline:focus {
            outline-style: solid
        }

        .focus\:outline-2:focus {
            outline-width: 2px
        }

        .focus\:outline-red-500:focus {
            outline-color: #ef4444
        }

        .group:hover .group-hover\:stroke-gray-600 {
            stroke: #4b5563
        }

        @media (prefers-reduced-motion: no-preference) {
            .motion-safe\:hover\:scale-\[1\.01\]:hover {
                --tw-scale-x: 1.01;
                --tw-scale-y: 1.01;
                transform: translate(var(--tw-translate-x), var(--tw-translate-y)) rotate(var(--tw-rotate)) skewX(var(--tw-skew-x)) skewY(var(--tw-skew-y)) scaleX(var(--tw-scale-x)) scaleY(var(--tw-scale-y))
            }
        }

        @media (prefers-color-scheme: dark) {
            .dark\:bg-gray-900 {
                --tw-bg-opacity: 1;
                background-color: rgb(17 24 39 / var(--tw-bg-opacity))
            }

            .dark\:bg-gray-800\/50 {
                background-color: rgb(31 41 55 / 0.5)
            }

            .dark\:bg-red-800\/20 {
                background-color: rgb(153 27 27 / 0.2)
            }

            .dark\:bg-dots-lighter {
                background-image: url("data:image/svg+xml,%3Csvg width='30' height='30' viewBox='0 0 30 30' fill='none' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M1.22676 0C1.91374 0 2.45351 0.539773 2.45351 1.22676C2.45351 1.91374 1.91374 2.45351 1.22676 2.45351C0.539773 2.45351 0 1.91374 0 1.22676C0 0.539773 0.539773 0 1.22676 0Z' fill='rgba(255,255,255,0.07)'/%3E%3C/svg%3E")
            }

            .dark\:bg-gradient-to-bl {
                background-image: linear-gradient(to bottom left, var(--tw-gradient-stops))
            }

            .dark\:stroke-gray-600 {
                stroke: #4b5563
            }

            .dark\:text-gray-400 {
                --tw-text-opacity: 1;
                color: rgb(156 163 175 / var(--tw-text-opacity))
            }

            .dark\:text-white {
                --tw-text-opacity: 1;
                color: rgb(255 255 255 / var(--tw-text-opacity))
            }

            .dark\:shadow-none {
                --tw-shadow: 0 0 #0000;
                --tw-shadow-colored: 0 0 #0000;
                box-shadow: var(--tw-ring-offset-shadow, 0 0 #0000), var(--tw-ring-shadow, 0 0 #0000), var(--tw-shadow)
            }

            .dark\:ring-1 {
                --tw-ring-offset-shadow: var(--tw-ring-inset) 0 0 0 var(--tw-ring-offset-width) var(--tw-ring-offset-color);
                --tw-ring-shadow: var(--tw-ring-inset) 0 0 0 calc(1px + var(--tw-ring-offset-width)) var(--tw-ring-color);
                box-shadow: var(--tw-ring-offset-shadow), var(--tw-ring-shadow), var(--tw-shadow, 0 0 #0000)
            }

            .dark\:ring-inset {
                --tw-ring-inset: inset
            }

            .dark\:ring-white\/5 {
                --tw-ring-color: rgb(255 255 255 / 0.05)
            }

            .dark\:hover\:text-white:hover {
                --tw-text-opacity: 1;
                color: rgb(255 255 255 / var(--tw-text-opacity))
            }

            .group:hover .dark\:group-hover\:stroke-gray-400 {
                stroke: #9ca3af
            }
        }

        @media (min-width: 640px) {
            .sm\:fixed {
                position: fixed
            }

            .sm\:top-0 {
                top: 0px
            }

            .sm\:right-0 {
                right: 0px
            }

            .sm\:ml-0 {
                margin-left: 0px
            }

            .sm\:flex {
                display: flex
            }

            .sm\:items-center {
                align-items: center
            }

            .sm\:justify-center {
                justify-content: center
            }

            .sm\:justify-between {
                justify-content: space-between
            }

            .sm\:text-left {
                text-align: left
            }

            .sm\:text-right {
                text-align: right
            }
        }

        @media (min-width: 768px) {
            .md\:grid-cols-2 {
                grid-template-columns:repeat(2, minmax(0, 1fr))
            }
        }

        @media (min-width: 1024px) {
            .lg\:gap-8 {
                gap: 2rem
            }

            .lg\:p-8 {
                padding: 2rem
            }
        }
    </style>
</head>
<body class="antialiased">
<div class="relative sm:flex sm:justify-center sm:items-center min-h-screen bg-dots-darker bg-center bg-gray-100 dark:bg-dots-lighter dark:bg-gray-900 selection:bg-red-500 selection:text-white">
    @if (Route::has('login'))
        <div class="sm:fixed sm:top-0 sm:right-0 p-6 text-right">
            @auth
                <a href="{{ url('/dashboard') }}"
                   class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Dashboard</a>
            @else
                <a href="{{ route('login') }}"
                   class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Log
                    in</a>

                @if (Route::has('register'))
                    <a href="{{ route('register') }}"
                       class="ml-4 font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Register</a>
                @endif
            @endauth
        </div>
    @endif

    <div class="max-w-7xl mx-auto p-6 lg:p-8">
        <div class="flex justify-center">


            <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-auto bg-gray-100 dark:bg-gray-900" width="2220"
                 height="2720" viewBox="0 0 222 272">
                <path d="M124.738 31.816c22.2.001 33.9 3.001 52.5 13.4 12.9 7.201 18.9 12.901 23.5 22.7 2.2 4.501 4 8.701 4 9.3 0 .601 1.8 1.501 4 2.1 4.7 1.301 7.9 5.301 6.3 7.9-2 3.201-13 11.301-22 16.1-5.1 2.801-9.5 5.501-9.8 6-.9 1.501.3 1.201 4.4-.9 15.6-7.999 23.4-8.499 19.7-1.3-2.4 4.601-8.4 8.801-20.6 14.3-12.2 5.601-26.5 9.601-37.5 10.5-13.1 1.201-31.8-5.599-39.6-14.2-10.4-11.599-12.4-27.299-5.4-41.9 5.7-11.999 10.2-16.699 25.3-26.9 6-3.999 4.5-4.399-1.9-.5-10.8 6.501-16.8 12.001-21.8 19.9-5 7.701-9.8 20.801-8.7 23.6.4 1.001-1.9 4.001-7.2 9.2-11.5 11.301-21.3 26.601-25 38.9-8.3 27.601-9.5 44.301-5.1 73.8.5 3.901 1.5 9.501 2.1 12.5.7 3.001 1.2 5.901 1.2 6.4.1.501.6 1.101 1.3 1.3.8.301.8-1.199-.2-5.9-5.8-27.799-5.5-50.299 1.1-73.7 3.8-13.499 8.4-25.499 11.9-31.1 2.8-4.399 17-18.499 18.7-18.5.7.001 2.8 3.001 4.8 6.7 4.6 8.801 11.4 16.501 17 19.1 2.5 1.201 4.5 2.801 4.5 3.6 0 .901-4.5 3.701-10.8 6.8-10.7 5.301-19.3 10.901-23.3 15.4-3.8 4.201-9.6 14.001-11.5 19.6-2.7 7.601-4.9 29.001-3.8 38.1 1 9.101 4.4 18.201 8.6 23.2 4.5 5.201 10.1 7.001 21 6.7 9.5-.299 10.7.501 7.8 5.1-4.9 7.601-13.1 13.2-19.3 13.2-5.9 0-15-3.399-18.7-7-1.7-1.599-3.7-2.999-4.4-3-.8.001-3.2 1.601-5.4 3.6-8 7.301-22.4 11.101-30.3 8.1-3.7-1.399-12.4-8.399-12.4-9.9 0-.599-.7-1.899-1.6-2.9-.9-.999-1.4-2.499-1.1-3.3.5-1.199 1.3-1.299 4.3-.4 4.5 1.201 10 .401 16.5-2.3 4.8-2.099 8.2-5.599 11.1-11.4 1.7-3.299 1.7-2.799-2.5-33-4-28.299-5.3-56.999-3.4-77.5 2.5-27.899 13.2-52.599 29.8-69.2 7.4-7.299 10.3-9.399 18.1-13.2 15.5-7.399 21.8-9.099 33.8-9.1zm11.619 107.675c-1.821.162-1.018.03-2.419.326-3.1.6-7.8 5.1-13.4 12.6-3.8 5-11.2 21.4-10.3 22.8.5.9 14.1-2.9 24.5-6.801l4.5-1.7.2-12.6c.025-2.237.062-4.363.004-6.621-.046-1.81.095-6.58-1.928-7.713-.347-.195-.771-.194-1.157-.291zM80.487 8.868c-1.855.207-1.094-.052-2.349.549-3.2 1.7-11.8 13-24.6 32.4-14.2 21.6-17.2 26.9-28.1 49.5-14 29.1-13.9 28.9-13.2 30 .9 1.4 4.5.3 14.3-4.2 4.6-2.1 9-3.8 9.6-3.8 2 0 4.3-3.2 5.1-7 3.4-16.7 15.1-40.3 26.7-53.8 4-4.7 24.5-18.3 31.3-20.7 9.8-3.6 11.5-4.4 11.5-5.5 0-.6-3-2.5-6.7-4.2-3.8-1.7-10.6-5.6-15.2-8.6-2.656-1.741-5.283-3.716-8.351-4.649z"
                      fill="#E44424"/>
                <path d="M78.838.516l3.7 2.5c2 1.401 4.6 2.901 5.7 3.401 1.1.5 3.8 2 6 3.4s5.1 3 6.5 3.5c1.4.6 6.4 3.1 11.3 5.6 7 3.6 10.3 4.7 16.5 5.4 16.2 1.8 19 2.3 29.5 5.1 11.5 3.1 13.8 4.1 22.1 9.4 5.5 3.5 14.6 12 18.9 17.6 3.6 4.7 8.7 14.7 8.7 17 0 1.2.7 1.9 2 1.9 5.8 0 11 5.6 11 11.8 0 4-1.5 6-7.1 9.4-2.4 1.5-2.6 2.1-2.1 6.7.8 8.9-.4 10.3-15.2 17.7-7.2 3.7-13.8 7-14.6 7.4-2.3 1.2-13 4.3-18 5.1-2.5.4-6.7 1.2-9.5 1.8-2.7.6-6.4 1.3-8.2 1.6-2.9.5-3.2.8-2.8 3.8.3 1.8.7 8.6 1 15.1.5 12.3 0 14.6-3.5 14.6-1 0-3.7.9-6.1 1.9-2.4 1.1-5.7 2.2-7.3 2.5-1.5.3-4.6 1.4-6.7 2.6-2.2 1.1-4.5 2-5.1 2-.6 0-2.6 1.1-4.5 2.6-4.4 3.3-5.7 2.4-4.9-3.6 1.1-8.3 5.8-20 13.1-32.4 3-5.2 3.2-5.2-6.6-.2-3.1 1.5-10 6.2-15.4 10.3-9.3 7.2-9.9 7.9-13.5 15.8-4.4 9.3-5.5 16.2-5.5 33 0 14.1 2.2 22.5 7.3 28.3 3.4 3.9 4.3 4.3 10.9 5.3 6.1.9 8.2.8 13-.6 3.2-.9 6.4-2.2 7.1-2.8.9-.7 1.6-.7 2.3 0 1.3 1.3-2.2 14.7-4.6 17.3-.8.9-1.5 2.1-1.5 2.6s-2 3.2-4.4 5.9c-5.7 6.6-14.1 10.9-19.4 9.9-6.2-1.2-11.4-3.9-16.8-8.7l-5.1-4.601-3.9 4c-5.8 6.101-8.6 7.701-15 9.201-4.6 1.1-7.1 1.1-11.5.3-3.1-.7-6.9-2-8.5-3.1-4.1-2.6-12.4-10.6-12.4-11.8 0-.6-.6-1.8-1.3-2.6-.8-.9-2.2-3.8-3.1-6.4-2.1-5.7-1.2-7.6 2.5-5.6 3.1 1.6 6.8 1.3 15.4-1.2 8.4-2.6 9.5-3.4 12.5-9.9l2.4-5.101-2.3-15.7c-5.5-38.199-6.8-57.799-5.4-79.399.5-6.5.7-11.8.5-11.8-.3 0-11.3 4.6-15.7 6.5-1.6.8-6.5 2.7-10.7 4.3-9.8 3.8-11.3 2.8-7-4.5 1.7-2.8 3.3-6 3.7-7.3.9-2.7 7.7-17.7 11-24 15-28.9 17.9-34.2 22.3-41.5 2.1-3.3 4.2-6.8 4.7-7.7 1.8-3 11.7-17.2 14.4-20.6 3.9-4.9 11.1-13.6 15.4-18.6l3.8-4.401zm45.9 33.3c-12 .001-18.3 1.701-33.8 9.101-20.7 9.9-35.4 31.2-42.7 61.7-5.5 23.1-5.5 56.4.2 96.2 4.2 30.2 4.2 29.7 2.5 33-5.2 10.5-14 16-25.4 15.9-6.2 0-6.6.1-5.3 1.6.8.9 1.5 2.1 1.5 2.7 0 1.4 6.7 6.5 10.5 8 4.6 1.8 14.2.9 20.6-2 3.1-1.4 7.4-4.1 9.6-6.1 2.2-2 4.6-3.6 5.4-3.6.7 0 2.7 1.4 4.4 3 5.8 5.6 19.8 8.8 25.1 5.7 4.5-2.5 12.4-10.7 12.4-12.7 0-.3-3.6-.4-8-.3-10.7.3-15.8-1.6-21.2-7.7-8.6-9.6-11.5-23.2-9.2-44.2 1.6-14.8 3.4-20.6 9.5-30.3 6.7-10.8 15.5-17.8 31.1-25 4.8-2.2 8.7-4.3 8.8-4.7 0-.3-1.5-1.2-3.4-1.8-4.6-1.5-14.4-12.2-18.1-19.8-1.6-3.4-3.2-6.2-3.5-6.2-.9 0-15.6 15.4-17.2 18-2.9 5-7.7 17.8-11.2 30.1-6.6 23.4-6.9 45.9-1.1 73.8 1.5 7.1 1.3 8.1-1.5 8.1-1.8 0-3.7-2.2-3.9-4.5 0-.5-.5-3.2-1-6-5.3-27.1-5.8-51.5-1.5-69.2 4.6-19.1 7.4-26.1 14.7-37.1 3.9-5.9 10.5-14.2 14.7-18.5 4.2-4.3 7.4-8.4 7.2-9.3-1.2-5.8 9.4-26.8 17-34 7-6.7 21.6-15.3 26.3-15.7 4.6-.3 4 2.1-1.2 4.6-8.6 4.2-19.8 12.6-24.1 18-5.4 6.7-10 17.4-10.8 24.7-.8 7.7 1.9 18 6.4 24.5 6.6 9.6 26.2 17.4 40.7 16.1 15-1.2 39.6-9.7 50.8-17.3 4.2-2.9 7.7-8.2 5.5-8.4-3.3-.3-8.4 1.5-18.5 6.5-3.2 1.6-4.5 1.8-5.4.9-2.1-2.1-.2-3.8 10.2-9.6 11.2-6.1 21.9-14 21.9-16 0-2.4-1.7-3.7-6-5-3.4-1-4.5-1.8-5.1-4-1.7-6.2-7.5-16.3-11.8-20.5-4.7-4.5-17.3-11.9-27.1-16-12.3-5.1-21.6-6.7-39-6.7v-.001zm41.419 21.608c3.576.232 7.314.569 10.381 2.593 3.4 2.5 6.8 8.6 7.6 13.8.8 5-1.8 9.4-8.2 13.9-4.9 3.5-13.6 4.5-18.7 2.2-1.7-.8-3.9-2.3-4.9-3.5-2.7-3-4.5-11.7-3.4-16.6 1.1-4.8 5.9-10 10.6-11.6 2.145-.745 4.38-.698 6.619-.793zm.681 5.893c-8.1 0-12.1 3.5-12.4 10.9-.2 4.8 1.3 6.6 6.9 8.6 5.2 1.9 7.9 1.8 12-.1 1.9-.9 4.2-3 5-4.7 1.4-2.7 1.4-3.3-.1-7.3-2-5.2-5.4-7.4-11.4-7.4zm-4.668 5.475c.715.03 1.017.593 1.368 1.124.7 1.201 2.3 1.801 5.3 1.901 5.9.1 7.5 2.7 3.6 6.1-3.7 3.2-6.2 3-9.8-.5-3.2-3.2-3.7-6.2-1.5-8 .57-.471.236-.248 1.032-.625zm-24.532 74.324l-3.2.6c-4.7.901-12 9.401-17.2 20.3-4.7 9.501-5.4 11.801-3.2 11 .6-.199 4.6-1.399 8.7-2.7 4.1-1.199 9.1-2.799 11-3.4l3.5-1.2.4-24.6zM79.983 11.069h-.001c-.562.113-1.161.109-1.686.339-2.889 1.267-5.303 5.278-7.158 7.709-6 8-24.4 35.8-30.2 45.7-3.5 6-19.1 37.5-24.8 50-1 2.2-2 4.3-2.2 4.8-.5 1 1.7.2 12.3-4.3 5-2.1 9.7-4.1 10.6-4.3 1-.3 1.9-2.2 2.4-4.4 3-16.7 15.7-41.7 28.2-56 4.4-4.9 25.1-18.4 32.2-20.9 8.8-3.1 9.1-3.7 2.9-6.4-2.9-1.2-9.1-4.7-13.7-7.7-2.281-1.409-4.42-3.182-6.961-4.127-.606-.226-1.263-.281-1.894-.421z"
                      fill="#020601"/>
            </svg>
        </div>

        <div class="mt-16">

        </div>
    </div>
</div>
</body>
</html>
