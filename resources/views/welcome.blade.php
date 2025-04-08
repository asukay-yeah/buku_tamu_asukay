<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.css" rel="stylesheet" />
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@100..900&display=swap" rel="stylesheet">

    <title>Login Screen</title>

    <style>
        .shadow-custom-logo {
            box-shadow: 3px 3px 0px #171717;
        }
        .shadow-custom {
            box-shadow: 3px 3px 0px #171717;
        }

        .shadow-custom-img {
            box-shadow: 11px 11px 0px #171717;
        }
    </style>
</head>

<body class="flex justify-center items-center h-screen bg-blue-400" style="font-family: 'Outfit', sans-serif;">

    <div class="w-full flex justify-center items-center">
        <div
            class="flex md:flex-row flex-col justify-center items-center gap-5 w-full rounded-xl border-4 border-neutral-900 mx-10 bg-white">
            <div class="md:w-1/2 flex flex-col justify-center items-start p-10">
                <div class="flex flex-row justify-center items-center gap-5">
                    <img src="{{ asset('assets/balmonlogo.png') }}"
                        class="w-40 bg-white border-2 border-neutral-900 rounded-md p-3 shadow-custom-logo"
                        alt="Balmon Logo">
                    <img src="{{ asset('assets/komdigilogo.png') }}"
                        class="w-24 bg-white border-2 border-neutral-900 rounded-md p-3 shadow-custom-logo"
                        alt="Balmon Logo">
                </div>
                <p class="font-semibold text-3xl mt-14 text-neutral-900">Welcome back</p>
                <input type="text" placeholder="Username"
                    class="md:min-w-[35rem] w-full p-3 text-lg mt-7 border-2 border-neutral-900 rounded-md transition-all duration-200 focus:outline-none focus:ring-1 focus:ring-neutral-900 shadow-custom">
                <input type="password" placeholder="Password"
                    class="md:min-w-[35rem] w-full p-3 text-lg mt-7 border-2 border-neutral-900 rounded-md transition-all duration-200 focus:outline-none focus:ring-1 focus:ring-neutral-900 shadow-custom">
                <a href="#_" class="relative inline-block px-12 py-3 font-medium group mt-10 mb-8">
                    <span
                        class="absolute inset-0 w-full h-full transition duration-300 ease-out transform translate-x-1 translate-y-1 rounded-md bg-neutral-900 group-hover:-translate-x-0 group-hover:-translate-y-0"></span>
                    <span
                        class="absolute inset-0 w-full h-full bg-blue-500 border-2 border-neutral-900 rounded-md group-hover:bg-neutral-900"></span>
                    <span class="relative font-medium text-neutral-900 group-hover:text-white">Login</span>
                </a>
                <p class="text-neutral-900 text-lg flex gap-2">Login as a <span class="underline font-semibold"><a href="home.html">Guest</a></span></p>
            </div>
            <div class="md:w-1/2 hidden md:flex flex-col justify-center items-center p-10">
                <img src="{{ asset('assets/loginimage.png') }}" alt="Balmon Pict"
                    class="w-full rounded-lg border-4 border-neutral-900 shadow-custom-img">
            </div>
        </div>
    </div>


    <script src="../path/to/flowbite/dist/flowbite.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.js"></script>

</body>

</html>