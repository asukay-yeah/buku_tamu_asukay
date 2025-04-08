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

    <!-- Versi yang lebih stabil dari jsPDF -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf-autotable/3.7.0/jspdf.plugin.autotable.min.js"></script>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@100..900&display=swap" rel="stylesheet">

    <title>Dashboard Screen</title>

    <style>
        .shadow-custom-card {
            box-shadow: 5px 5px 0px #171717;
        }

        .shadow-custom {
            box-shadow: 3px 3px 0px #171717;
        }

        .shadow-custom-img {
            box-shadow: 11px 11px 0px #171717;
        }
    </style>
</head>

<body class="text-neutral-900" style="font-family: 'Outfit', sans-serif;">

    <div class="fixed top-9 right-5 z-50 flex gap-3 items-center">
        <a href="{{ route('tamu.index') }}"
            class="px-4 py-3 border-2 border-neutral-900 hover:bg-neutral-100 duration-150 shadow-custom bg-white rounded-md">Tambah
            Tamu
        </a>

    </div>

    <aside id="default-sidebar"
        class="fixed top-0 left-0 z-40 w-64 h-screen border-r-2 border-neutral-900 transition-transform -translate-x-full"
        aria-label="Sidebar">
        <div class="h-full px-3 py-4 overflow-y-auto bg-gray-50 flex flex-col justify-between">
            <div>
                <ul class="space-y-2 font-medium">
                    <li>
                        <a href="{{ url('/home') }}"
                            class="flex items-center p-2 text-white border-2 border-neutral-900 rounded-lg bg-blue-400 group">
                            <svg class="w-5 h-5 text-white transition duration-75" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 21">
                                <path
                                    d="M16.975 11H10V4.025a1 1 0 0 0-1.066-.998 8.5 8.5 0 1 0 9.039 9.039.999.999 0 0 0-1-1.066h.002Z" />
                                <path
                                    d="M12.5 0c-.157 0-.311.01-.565.027A1 1 0 0 0 11 1.02V10h8.975a1 1 0 0 0 1-.935c.013-.188.028-.374.028-.565A8.51 8.51 0 0 0 12.5 0Z" />
                            </svg>
                            <span class="ms-3">Dashboard</span>
                        </a>
                    </li>
                </ul>
            </div>

            <!-- Profile section at bottom of sidebar -->
            <div class="pt-4 mt-4 border-t-2 border-neutral-900">
                <div class="flex items-center p-2 rounded-lg text-neutral-900">
                    <img class="w-8 h-8 rounded-full" src="../assets/profile.png" alt="User profile">
                    <div class="ms-3">
                        <p class="text-sm font-medium">Admin</p>
                        <p class="text-xs text-gray-500">Administrator</p>
                    </div>
                </div>
                <!-- Logout Button (Hidden by Default) -->
                <button id="logout-button"
                    class="w-full px-3 py-2 mt-2 text-sm text-white bg-red-600 rounded-lg hover:bg-red-700">
                    <a href="{{ route('logout') }}"
                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>

                    <form action="{{ route('logout') }}" method="POST" id="logout-form" class="hidden">
                        {{ csrf_field() }}
                    </form>
                </button>
            </div>
        </div>
    </aside>

    <!-- Main content area that adjusts based on sidebar visibility -->
    <div id="main-content" class="p-4 transition-all duration-300">
        <div class="rounded-lg p-5">

            <div class="flex flex-col justify-center items-center">
                <div class="flex w-full">
                    <button id="sidebar-toggle" type="button"
                        class=" inline-flex items-center p-3 h-fit text-sm shadow-custom text-white rounded-md border-2 border-neutral-900 bg-blue-400 duration-200 hover:bg-blue-500 focus:outline-none">
                        <span class="sr-only">Toggle sidebar</span>
                        <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path clip-rule="evenodd" fill-rule="evenodd"
                                d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z">
                            </path>
                        </svg>
                    </button>
                    <div class="w-full flex flex-col justify-center items-center">
                        <p class="font-semibold text-3xl">Dashboard Buku Tamu Balmon Jakarta</p>
                        <p class="text-neutral-500 mt-3">Berikut adalah analisis data buku tamu balmon jakarta</p>
                    </div>
                </div>
                <div class="flex w-full md:flex-row flex-col gap-5 mt-10">
                    <div class="w-full flex md:flex-row flex-col justify-center items-center gap-5">
                        <!-- Card Tamu Jumlah Hari Ini -->
                        <div
                            class="bg-white w-full h-full rounded-xl shadow-custom-card p-6 flex flex-col justify-between border-2 border-neutral-900 items-start">
                            <div
                                class="w-10 h-10 bg-green-100 text-green-500 rounded-full flex items-center justify-center mb-4">
                                <img src="../assets/acc.png" alt="Acc Logo">
                            </div>
                            <div class="flex flex-col gap-1">
                                <p class="text-neutral-900 text-start font-semibold text-[40px]">{{ $totalTamuToday }}
                                </p>
                                <h3 class=" font-medium text-start text-neutral-900">Jumlah tamu hari ini</h3>
                            </div>
                        </div>

                        <!-- Card Total Tamu -->
                        <div
                            class="bg-white w-full h-full rounded-xl shadow-custom-card p-6 flex flex-col justify-between border-2 border-neutral-900 items-start">
                            <div
                                class="w-10 h-10 bg-green-100 text-green-500 rounded-full flex items-center justify-center mb-4">
                                <img src="../assets/location.png" alt="wait Logo">
                            </div>
                            <div class="flex flex-col gap-1">
                                <p class="text-neutral-900 text-start font-semibold text-[40px]">{{ $total }}</p>
                                <h3 class=" font-medium text-start text-neutral-900">Total tamu</h3>
                            </div>
                        </div>

                        <!-- Card WM -->
                        <div
                            class="bg-white w-full h-full rounded-xl shadow-custom-card justify-center flex flex-col gap-5 border-2 border-neutral-900 items-center">
                            <img class="w-32 md:mt-0 mt-5 md:my-0 mx-10" src="../assets/balmonlogo.png"
                                alt="Balmon Logo">
                            <img class="w-32 md:mb-0 mb-5 md:my-0 mx-10" src="../assets/komdigilogo.png"
                                alt="Komdigi Logo">
                        </div>
                    </div>
                </div>

                <div class="flex justify-between items-center mb-4 w-full mt-14">
                    <form class="w-1/4">
                        <input id="search-bar" type="text" placeholder="Search..." name="seacrh"
                            value="{{ request('seacrh') }}"
                            class="px-4 py-2 border-2 border-neutral-900 rounded-md shadow-custom w-full">
                    </form>
                    <button id="exportPDF"
                        class="px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600 border-2 border-neutral-900 shadow-custom duration-200">
                        Export to PDF
                    </button>
                </div>


                <table id="table"
                    class="min-w-max w-full border-collapse border-2 border-neutral-900 md:table-fixed shadow-custom-img">
                    <thead class="bg-neutral-200">
                        <tr>
                            <th class="border-2 border-neutral-900 px-4 py-2 text-left">No</th>
                            <th class="border-2 border-neutral-900 px-4 py-2 text-left">Foto</th>
                            <th class="border-2 border-neutral-900 px-4 py-2 text-left">Nama</th>
                            <th class="border-2 border-neutral-900 px-4 py-2 text-left">Instansi</th>
                            <th class="border-2 border-neutral-900 px-4 py-2 text-left">Bertemu Dengan</th>
                            <th class="border-2 border-neutral-900 px-4 py-2 text-left">Keperluan</th>
                            <th class="border-2 border-neutral-900 px-4 py-2 text-left">Tanggal</th>
                            <th class="border-2 border-neutral-900 px-4 py-2 text-left">Jam</th>
                        </tr>
                    </thead>
                    <tbody id="tableBody">
                        @foreach ($tamus as $tamu)
                        <tr class="hover:bg-neutral-100 duration-100">
                            <td class="border border-neutral-300 px-4 py-2">{{ $loop->iteration }}</td>
                            <td class="border border-neutral-300 p-3">
                                @if ($tamu->foto)
                                <img src="{{ asset('storage/' . $tamu->foto) }}"
                                    class="w-40 border border-neutral-900 rounded-md" alt="Foto Pengunjung">
                                @else
                                Foto Tidak Tersedia
                                @endif
                            </td>
                            <td class="border border-neutral-300 px-4 py-2">{{ $tamu->namalengkap }}</td>
                            <td class="border border-neutral-300 px-4 py-2 text-left">{{ $tamu->instansi }}</td>
                            <td class="border border-neutral-300 px-4 py-2">{{ $tamu->bertemu_dengan }}</td>
                            <td class="border border-neutral-300 px-4 py-2 text-left">{{ $tamu->keperluan }}</td>
                            <td class="border border-neutral-300 px-4 py-2 text-left">{{ $tamu->tanggal }}</td>
                            <td class="border border-neutral-300 px-4 py-2 text-left">{{ $tamu->jam }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="text-black">
                    <nav>
                        {{ $tamus->links() }}
                    </nav>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // Toggle sidebar
            const sidebarToggle = document.getElementById('sidebar-toggle');
            const sidebar = document.getElementById('default-sidebar');
            const mainContent = document.getElementById('main-content');

            function updateLayout() {
                if (sidebar.classList.contains('-translate-x-full')) {
                    mainContent.classList.remove('ml-64');
                } else {
                    mainContent.classList.add('ml-64');
                }
            }

            sidebarToggle.addEventListener('click', function () {
                sidebar.classList.toggle('-translate-x-full');
                updateLayout();
            });

            // Implementasi Export to PDF
            document.getElementById('exportPDF').addEventListener('click', function () {
                try {
                    console.log("Starting PDF export...");
                    
                    // Menggunakan window.jspdf karena itu referensi yang benar untuk versi yang diimpor
                    if (typeof window.jspdf === 'undefined') {
                        window.jspdf = window.jsPDF;
                    }
                    
                    // Membuat instance PDF
                    const { jsPDF } = window.jspdf;
                    const doc = new jsPDF('l', 'mm', 'a4'); // landscape orientation
                    
                    // Judul dokumen
                    doc.setFontSize(16);
                    doc.text('Data Buku Tamu Balmon Jakarta', 15, 15);
                    
                    // Tanggal ekspor
                    const today = new Date();
                    const dateStr = today.toLocaleDateString('id-ID');
                    doc.setFontSize(10);
                    doc.text(`Tanggal Cetak: ${dateStr}`, 15, 22);
                    
                    // Mengambil data dari tabel
                    const table = document.getElementById('table');
                    const rows = Array.from(table.querySelectorAll('tbody tr'));
                    
                    // Data untuk tabel PDF
                    const tableData = [];
                    
                    // Header tabel (kecuali kolom foto)
                    const tableColumns = [
                        { header: 'No', dataKey: 'no' },
                        { header: 'Nama', dataKey: 'nama' },
                        { header: 'Instansi', dataKey: 'instansi' },
                        { header: 'Bertemu Dengan', dataKey: 'bertemu' },
                        { header: 'Keperluan', dataKey: 'keperluan' },
                        { header: 'Tanggal', dataKey: 'tanggal' },
                        { header: 'Jam', dataKey: 'jam' }
                    ];
                    
                    // Mengambil data dari setiap baris (kecuali foto)
                    rows.forEach(row => {
                        const cells = row.querySelectorAll('td');
                        const rowData = {
                            no: cells[0].textContent,
                            nama: cells[2].textContent,
                            instansi: cells[3].textContent,
                            bertemu: cells[4].textContent,
                            keperluan: cells[5].textContent,
                            tanggal: cells[6].textContent,
                            jam: cells[7].textContent
                        };
                        tableData.push(rowData);
                    });
                    
                    // Membuat tabel di PDF
                    doc.autoTable({
                        columns: tableColumns,
                        body: tableData,
                        startY: 30,
                        styles: { fontSize: 9, cellPadding: 3 },
                        headStyles: { fillColor: [66, 135, 245], textColor: [255, 255, 255] },
                        alternateRowStyles: { fillColor: [240, 240, 240] },
                        margin: { top: 30 }
                    });
                    
                    // Menambahkan footer
                    const pageCount = doc.internal.getNumberOfPages();
                    for (let i = 1; i <= pageCount; i++) {
                        doc.setPage(i);
                        const pageSize = doc.internal.pageSize;
                        const pageWidth = pageSize.width;
                        doc.setFontSize(8);
                        doc.text(`Halaman ${i} dari ${pageCount}`, pageWidth - 40, pageSize.height - 10);
                        doc.text('© Balmon Jakarta', 15, pageSize.height - 10);
                    }
                    
                    // Menyimpan PDF
                    doc.save('Laporan_Buku_Tamu_Balmon_Jakarta.pdf');
                    console.log("PDF export completed!");
                    
                } catch (error) {
                    console.error('Error exporting PDF:', error);
                    alert('Error: ' + error.message);
                }
            });
        });
    </script>

    <script src="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.js"></script>
</body>

</html>