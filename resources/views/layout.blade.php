<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Beyond Card Generator</title>

    {{-- bootstrap --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    {{-- aos --}}
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
</head>
<style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Racing+Sans+One&family=Uncial+Antiqua&display=swap');

    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        /* overflow-x:hidden; */
    }

    html,
    body {
        scroll-behavior: smooth;
    }

    html.lenis,
    html.lenis body {
        height: auto;
    }

    .lenis.lenis-smooth [data-lenis-prevent] {
        overscroll-behavior: contain;
    }

    .lenis.lenis-stopped {
        overflow: clip;
    }

    .lenis.lenis-smooth iframe {
        pointer-events: none;
    }

    *::-webkit-scrollbar {
        height: 10px;
        width: 10px;
    }

    *::-webkit-scrollbar-track {
        background-color: #2a0e41;
        /* Dark purple */
    }

    *::-webkit-scrollbar-track:hover {
        background-color: #3b155e;
        /* Slightly lighter dark purple */
    }

    *::-webkit-scrollbar-track:active {
        background-color: #3b155e;
    }

    *::-webkit-scrollbar-thumb {
        border-radius: 5px;
        background-image: linear-gradient(to bottom, transparent, #8c42e9);
        /* Glowing purple */
    }
</style>
@yield('header')
</head>

<body>
    @yield('content')

    {{-- tailwind --}}
    <script src="https://cdn.tailwindcss.com"></script>

    {{-- jquery --}}
    <script src="https://code.jquery.com/jquery-3.7.1.slim.js"
        integrity="sha256-UgvvN8vBkgO0luPSUl2s8TIlOSYRoGFAX4jlCIm9Adc=" crossorigin="anonymous"></script>

    {{-- sweetalert --}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    {{-- aos --}}
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

    {{-- lenis scroll --}}
    <script src="https://unpkg.com/lenis@1.2.3/dist/lenis.min.js"></script>

    {{-- gsap --}}
    <script src="https://cdn.jsdelivr.net/npm/gsap@3.12.5/dist/gsap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/gsap@3.12.5/dist/ScrollTrigger.min.js"></script>

    <script>

        AOS.init({
            once: true,
        });

        const lenis = new Lenis();

        lenis.on('scroll', ScrollTrigger.update);

        gsap.ticker.add((time) => {
            lenis.raf(time * 1000);
        });
        gsap.ticker.lagSmoothing(0);


    </script>
    @yield('script')

</body>

</html>