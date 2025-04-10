<!DOCTYPE html>
<html
    lang="{{ str_replace('_', '-', app()->getLocale()) }}"
    class="h-full bg-zinc-200"
>
<head>
    <meta charset="utf-8">
    <meta
        name="viewport"
        content="width=device-width, initial-scale=1"
    >

    <title>@yield("title")</title>

    <!-- Fonts -->
    <link
        rel="preconnect"
        href="https://fonts.bunny.net"
    >
    <link
        href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600"
        rel="stylesheet"
    />

    <!-- Styles / Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @fluxAppearance
</head>

<body class="h-full ">

<div class="min-h-full">
    <nav class="bg-lime-600">
        <div class="mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex h-16 items-center justify-between">
                <div class="flex items-center">
                    <div class="shrink-0">
                        <img
                            class="size-8"
                            src="https://tailwindcss.com/plus-assets/img/logos/mark.svg?color=lime&shade=300"
                            alt=""
                        >
                    </div>
                    <div class="hidden md:block">
                        <div class="ml-10 flex items-baseline space-x-4">
                           @foreach(["home" => "Dashboard", "patients.index" => "Patients"] as $route => $label)
                            <x-nav-link :route="$route" :label="$label" />
                           @endforeach
                        </div>
                    </div>
                </div>

                <div class="-mr-2 flex md:hidden">
                    <!-- Mobile menu button -->
                    <button
                        type="button"
                        class="relative inline-flex items-center justify-center rounded-md bg-lime-600 p-2 text-lime-200 hover:bg-lime-500/75 hover:text-white focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-lime-600"
                        aria-controls="mobile-menu"
                        aria-expanded="false"
                    >
                        <span class="absolute -inset-0.5"></span>
                        <span class="sr-only">Open main menu</span>
                        <!-- Menu open: "hidden", Menu closed: "block" -->
                        <svg
                            class="block size-6"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke-width="1.5"
                            stroke="currentColor"
                            aria-hidden="true"
                            data-slot="icon"
                        >
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5"
                            />
                        </svg>
                        <!-- Menu open: "block", Menu closed: "hidden" -->
                        <svg
                            class="hidden size-6"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke-width="1.5"
                            stroke="currentColor"
                            aria-hidden="true"
                            data-slot="icon"
                        >
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                d="M6 18 18 6M6 6l12 12"
                            />
                        </svg>
                    </button>
                </div>
            </div>
        </div>

        <!-- Mobile menu, show/hide based on menu state. -->
        <div
            class="md:hidden"
            id="mobile-menu"
        >
            <div class="space-y-1 px-2 pb-3 pt-2 sm:px-3">
                <!-- Current: "bg-lime-700 text-white", Default: "text-white hover:bg-lime-500/75" -->
                <a
                    href="#"
                    class="block rounded-md px-3 py-2 text-sm font-medium text-white"
                >Dashboard</a>
                <a
                    href="#"
                    class="block rounded-md px-3 py-2 text-sm font-medium text-white hover:bg-lime-500/75"
                >Patients</a>
            </div>
        </div>
    </nav>

    <header class="bg-white shadow-sm flex text-left">
        <h1 class="shrink-0 px-4 py-4 sm:px-6 lg:px-8 text-lg/6 font-semibold text-zinc-900">@yield("title")</h1>
        <div class="grow text-right px-4 py-4 sm:px-6 lg:px-8 text-lg/6 font-semibold text-zinc-900 ">@yield("subtitle")</div>
    </header>
    <main>
        <div class="mx-auto px-4 py-6 sm:px-6 lg:px-8">
            @yield("content")
        </div>
    </main>
</div>

@fluxScripts
</body>
</html>
