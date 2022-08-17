<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="color-scheme" content="light">
    <meta name="supported-color-schemes" content="light">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
</head>
<body class="font-sans antialiased relative bg-slate-100 w-full h-full">
    <div class="mx-auto my-14 max-w-lg max-h-lg">
        <main
            class="p-8 bg-white shadow-md rounded-lg">
            <section class="flex justify-center">
                <a href="{{ url('/') }}">
                    <img class="inline-block" src="{{ asset('/images/banner.png')}}" alt="banner">
                </a>
            </section>
            <div class="my-8">
                <div class="w-full h-2 bg-gradient-to-r from-fuchsia-200 via-purple-300 to-cyan-300 rounded-lg"></div>
            </div>
            <section class="mb-4">
                <h1 class="font-bold text-center text-3xl text-gray-800 mb-4">Welcome to Sharely</h1>
                <h5 class="text-slate-600 font-bold text-lg-600 mb-4">Hey, {{ $user->name }}.</h5>
                <p class="text-slate-600 text-sm tracking-wide leading-relaxed">You have registered for joining Sharely - the
                    awesome social media community platform. Now you can able to following your favourite followers with knowing
                    about the world of treads and even learn with them. Otherwise you can create your own tweet to make friend
                    with it and also bring more friends to able like your tweet and comment it. Hope you have fun !!! </p>
            </section>

            <lottie-player src="https://assets10.lottiefiles.com/packages/lf20_puciaact.json"  background="transparent"  speed="1"  loop autoplay></lottie-player>

            <a href="" class="flex justify-center rounded-full bg-blue-500 text-white font-bold p-2">Let's go to Sharely</a>
        </main>

        <footer class="text-center text-sm opacity-30 mt-4">© {{ date('Y') }} {{ config('app.name') }}. @lang('All rights reserved.')</footer>
    </div>
</body>
</html>
