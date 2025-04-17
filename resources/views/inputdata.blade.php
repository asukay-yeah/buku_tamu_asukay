<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link href="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.css" rel="stylesheet" />
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@100..900&display=swap" rel="stylesheet">

    <title>Home Screen</title>

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

        .notification-hidden {
            opacity: 0;
            transition: transform 0.9s ease;
        }
    </style>
</head>

<body class="text-neutral-900 bg-blue-400" style="font-family: 'Outfit', sans-serif;">

    <div class="flex justify-center items-center my-10">
        <div
            class="w-full xl:mx-80 md:mx-40 mx-5 rounded-lg border-2 border-neutral-900 flex justify-center items-center flex-col px-7 bg-white shadow-custom-img">

            @if(session('success'))
            <div id="notification" class="bg-green-100 notification text-green-800 p-3 rounded mb-4 w-fit mt-5">{{ session('success') }}</div>
            @endif
            @if(session('error'))
            <div id="notification" class="bg-red-100 notification text-red-800 p-3 rounded mb-4 w-fit mt-5">{{ session('error') }}</div>
            @endif

            <div class="flex md:flex-row flex-col justify-center items-center md:gap-16 gap-8 mt-10">
                <img src="../assets/balmonlogo.png"
                    class="w-40 bg-white md:block hidden border-2 border-neutral-900 rounded-md p-3 shadow-custom-logo"
                    alt="Balmon Logo">
                <div class="flex flex-row justify-center items-center md:hidden gap-10">
                    <img src="../assets/balmonlogo.png"
                        class="w-40 bg-white border-2 border-neutral-900 rounded-md p-3 shadow-custom-logo"
                        alt="Balmon Logo">
                    <img src="../assets/komdigilogo.png"
                        class="w-24 bg-white border-2 border-neutral-900 rounded-md p-3 shadow-custom-logo"
                        alt="Balmon Logo">
                </div>
                <div class="flex flex-col justify-center items-center">
                    <p class="font-medium text-3xl text-center">Buku Tamu Online Balmon Jakarta</p>
                    <p class="mt-2 text-neutral-500 font-medium text-lg">Silahkan isi form di bawah ini</p>
                </div>
                <img src="../assets/komdigilogo.png"
                    class="w-24 bg-white md:block hidden border-2 border-neutral-900 rounded-md p-3 shadow-custom-logo"
                    alt="Balmon Logo">
            </div>

            <!-- form -->
            <form id="guestForm" action="{{ route('tamu.store') }}" method="POST"
                class="grid grid-cols-2 gap-6 md:my-10 my-8 w-full">
                {{ csrf_field() }}
                <input type="text" placeholder="Nama Lengkap" name="namalengkap"
                    class="w-full p-3 border-2 border-neutral-900 ransition-all duration-200 focus:outline-none focus:ring-1 focus:ring-neutral-900 shadow-custom rounded"
                    required>
                <input type="text" placeholder="Instansi/Perusahaan" name="instansi"
                    class="w-full p-3 border-2 border-neutral-900 ransition-all duration-200 focus:outline-none focus:ring-1 focus:ring-neutral-900 shadow-custom rounded"
                    required>
                <input type="number" placeholder="Nomor HP" name="no_hp"
                    class="w-full p-3 border-2 border-neutral-900 ransition-all duration-200 focus:outline-none focus:ring-1 focus:ring-neutral-900 shadow-custom rounded"
                    required>
                <input type="text" placeholder="Bertemu Dengan" name="bertemu_dengan"
                    class="w-full p-3 border-2 border-neutral-900 ransition-all duration-200 focus:outline-none focus:ring-1 focus:ring-neutral-900 shadow-custom rounded"
                    required>
                <textarea placeholder="Keperluan Kunjungan" name="keperluan"
                    class="w-full p-3 border-2 border-neutral-900 ransition-all duration-200 focus:outline-none focus:ring-1 focus:ring-neutral-900 shadow-custom rounded col-span-2"
                    required></textarea>


                <input type="date" name="tanggal" id="tanggal"
                    class="w-full p-3 border-2 border-neutral-900 ransition-all duration-200 focus:outline-none focus:ring-1 focus:ring-neutral-900 shadow-custom rounded bg-[#f1f1f1] cursor-not-allowed"
                    required>
                <div class="relative w-full">
                    <input type="time" name="jam" id="jam"
                        class="w-full p-3 border-2 border-neutral-900 ransition-all duration-200 focus:outline-none focus:ring-1 focus:ring-neutral-900 shadow-custom rounded bg-[#f1f1f1] cursor-not-allowed pr-10"
                        required>
                    <span class="absolute inset-y-0 right-3 flex items-center text-gray-400">⏰</span>
                </div>

                <!-- kamera -->
                 <input type="hidden" id="foto_input" name="foto">

                <div class="col-span-2 flex flex-col justify-start items-start">
                    <video id="video" class="w-full rounded hidden transform scale-x-[-1]" autoplay></video>
                    <a type="button" id="startCamera" href="#"
                        class="relative inline-block px-10 py-3 mt-3 font-medium group">
                        <span
                            class="absolute inset-0 w-full h-full transition duration-300 ease-out rounded-sm transform translate-x-1 translate-y-1 bg-neutral-900 group-hover:-translate-x-0 group-hover:-translate-y-0"></span>
                        <span
                            class="absolute inset-0 w-full rounded-sm h-full bg-white border-2 border-black group-hover:bg-neutral-900"></span>
                        <span class="relative text-neutral-900 group-hover:text-white">Aktifkan Kamera</span>
                    </a>
                    <a type="button" id="takePhoto" href="#" class="relative px-10 py-3 mt-5 font-medium group hidden">
                        <span
                            class="absolute inset-0 w-full h-full transition duration-300 ease-out rounded-sm transform translate-x-1 translate-y-1 bg-neutral-900 group-hover:-translate-x-0 group-hover:-translate-y-0"></span>
                        <span
                            class="absolute inset-0 w-full rounded-sm h-full bg-white border-2 border-black group-hover:bg-neutral-900"></span>
                        <span class="relative text-neutral-900 group-hover:text-white">Ambil Foto</span>
                    </a>
                    <canvas id="canvas" class="hidden transform scale-x-[-1]"></canvas>
                    <img id="photo" class="w-full mt-2 hidden rounded transform scale-x-[-1]" alt="Foto Tamu">
                </div>


                <button type="submit" class="relative inline-block px-14 py-3 mr-auto font-medium group mt-2">
                    <span
                        class="absolute inset-0 w-full h-full transition duration-300 rounded-sm ease-out transform translate-x-1 translate-y-1 bg-neutral-900 group-hover:-translate-x-0 group-hover:-translate-y-0"></span>
                    <span
                        class="absolute inset-0 w-full h-full bg-white rounded-sm border-2 border-black group-hover:bg-neutral-900"></span>
                    <span class="relative text-black group-hover:text-white">Kirim</span>
                </button>
            </form>
        </div>

    </div>


    <script>
        const video = document.getElementById('video');
        const canvas = document.getElementById('canvas');
        const photo = document.getElementById('photo');
        const startCamera = document.getElementById('startCamera');
        const fotoInput = document.getElementById('foto_input');
        const takePhoto = document.getElementById('takePhoto');
        const ctx = canvas.getContext('2d');
        let stream;

        startCamera.addEventListener('click', async () => {
            try {
                stream = await navigator.mediaDevices.getUserMedia({
                    video: true
                });
                video.srcObject = stream;
                video.classList.remove('hidden');
                takePhoto.classList.remove('hidden');
                startCamera.classList.add('hidden');
            } catch (err) {
                console.error("Gagal mengakses kamera", err);
            }
        });

        takePhoto.addEventListener('click', () => {
            canvas.width = video.videoWidth;
            canvas.height = video.videoHeight;
            ctx.drawImage(video, 0, 0, canvas.width, canvas.height);
            photo.src = canvas.toDataURL('image/png');
            photo.classList.remove('hidden');
            fotoInput.value = photo.src;

            video.classList.add('hidden');
            takePhoto.classList.add('hidden');
            stream.getTracks().forEach(track => track.stop());
        });

        function autoCloseNotifications() {
            setTimeout(() => {
                document.querySelectorAll('#notification').forEach(notification => {
                    notification.classList.add('opacity-0');
                    setTimeout(() => notification.remove(),
                    500); // Hapus elemen setelah animasi selesai
                });
            }, 3500);
        }

        // Panggil fungsi saat halaman dimuat
        document.addEventListener('DOMContentLoaded', autoCloseNotifications);


        const now = new Date();
        const tanggal = now.toISOString().split('T') [0];

        const jam = now.getHours().toString().padStart(2, '0') + ':' + now.getMinutes().toString().padStart(2, '0');

        document.getElementById('tanggal').value = tanggal;
        document.getElementById('jam').value = jam;
        
    </script>
    <script src="../path/to/flowbite/dist/flowbite.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.js"></script>

</body>

</html>