<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Politeknik Caltex Riau</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/lucide@latest"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Inter', sans-serif; }
    </style>
</head>
<body class="bg-[#F4F7FB] text-slate-800 antialiased">

    <div class="flex min-h-screen">

        <!-- SIDEBAR -->
        <aside class="w-64 bg-[#0B2545] text-white flex flex-col justify-between shrink-0">
            <div>
                <!-- Logo -->
                <div class="h-16 flex items-center px-6 border-b border-white/10">
                    <div class="font-bold text-lg tracking-tight flex items-center gap-1">
                        <span class="text-white">Politeknik</span>
                        <span class="text-sky-400">Caltex</span>
                        <span class="text-white">Riau</span>
                    </div>
                </div>

                <!-- Menu Navigasi -->
                <nav class="p-4 space-y-1.5 mt-2">
                    <a href="{{ route('dashboard') }}" class="flex items-center gap-3 px-4 py-3 rounded-lg bg-[#1D5B9B] text-white font-medium text-sm shadow-sm">
                        <i data-lucide="home" class="w-4 h-4"></i>
                        <span>Dashboard</span>
                    </a>
                    <a href="#" class="flex items-center gap-3 px-4 py-3 rounded-lg text-slate-300 hover:bg-white/10 hover:text-white transition text-sm">
                        <i data-lucide="flask-conical" class="w-4 h-4"></i>
                        <span>Laboratorium</span>
                    </a>
                    <a href="#" class="flex items-center gap-3 px-4 py-3 rounded-lg text-slate-300 hover:bg-white/10 hover:text-white transition text-sm">
                        <i data-lucide="calendar-plus" class="w-4 h-4"></i>
                        <span>Reservasi</span>
                    </a>
                    <a href="#" class="flex items-center gap-3 px-4 py-3 rounded-lg text-slate-300 hover:bg-white/10 hover:text-white transition text-sm">
                        <i data-lucide="clipboard-list" class="w-4 h-4"></i>
                        <span>Riwayat Reservasi</span>
                    </a>
                </nav>
            </div>

            <!-- Tombol Keluar -->
            <div class="p-4 border-t border-white/10">
                <a href="#" class="flex items-center gap-3 px-4 py-3 rounded-lg text-slate-300 hover:bg-red-500/20 hover:text-red-300 transition text-sm">
                    <i data-lucide="log-out" class="w-4 h-4"></i>
                    <span>Keluar</span>
                </a>
            </div>
        </aside>

        <!-- MAIN CONTENT WRAPPER -->
        <div class="flex-1 flex flex-col">

            <!-- TOP NAVBAR -->
            <header class="h-16 bg-white border-b border-slate-200 px-6 flex items-center justify-between">
                <button class="text-slate-500 hover:text-slate-700">
                    <i data-lucide="menu" class="w-5 h-5"></i>
                </button>

                <div class="flex items-center gap-5">
                    <!-- Notifikasi -->
                    <button class="relative text-slate-600 hover:text-slate-900">
                        <i data-lucide="bell" class="w-5 h-5"></i>
                        <span class="absolute -top-0.5 -right-0.5 w-2 h-2 bg-red-500 rounded-full"></span>
                    </button>

                    <!-- User Profile -->
                    <div class="flex items-center gap-2 cursor-pointer">
                        <div class="w-8 h-8 rounded-full bg-[#1565C0] text-white flex items-center justify-center">
                            <i data-lucide="user" class="w-4 h-4"></i>
                        </div>
                        <i data-lucide="chevron-down" class="w-4 h-4 text-slate-500"></i>
                    </div>
                </div>
            </header>

            <!-- CONTENT AREA -->
            <main class="p-6 lg:p-8 max-w-[1400px] w-full mx-auto space-y-6">

                <!-- Header Sapaan & Tanggal -->
                <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-2">
                    <div>
                        <h1 class="text-2xl font-bold text-[#0B2545]">Selamat Datang!</h1>
                        <p class="text-sm text-slate-500 mt-0.5">Berikut adalah informasi dan ringkasan terkait reservasi laboratorium Anda.</p>
                    </div>
                    <div class="flex items-center gap-2 text-xs text-slate-500 bg-white px-3 py-2 rounded-lg border border-slate-200 self-start">
                        <i data-lucide="calendar" class="w-4 h-4 text-slate-400"></i>
                        <span>Senin, 4 November 2024</span>
                    </div>
                </div>

                <!-- 4 KARTU STATISTIK -->
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-5">
                    <!-- Card 1 -->
                    <div class="bg-white p-5 rounded-xl border border-slate-200/80 shadow-xs flex items-center gap-4">
                        <div class="w-12 h-12 rounded-full bg-blue-50 text-blue-600 flex items-center justify-center shrink-0">
                            <i data-lucide="flask-conical" class="w-6 h-6"></i>
                        </div>
                        <div>
                            <p class="text-xs font-medium text-slate-500">Total Laboratorium</p>
                            <p class="text-2xl font-bold text-slate-800 my-0.5">{{ $stats['total_lab'] }}</p>
                            <p class="text-[11px] text-slate-400">Laboratorium tersedia</p>
                        </div>
                    </div>

                    <!-- Card 2 -->
                    <div class="bg-white p-5 rounded-xl border border-slate-200/80 shadow-xs flex items-center gap-4">
                        <div class="w-12 h-12 rounded-full bg-emerald-50 text-emerald-600 flex items-center justify-center shrink-0">
                            <i data-lucide="calendar-check" class="w-6 h-6"></i>
                        </div>
                        <div>
                            <p class="text-xs font-medium text-slate-500">Reservasi Saya</p>
                            <p class="text-2xl font-bold text-slate-800 my-0.5">{{ $stats['reservasi_saya'] }}</p>
                            <p class="text-[11px] text-slate-400">Reservasi aktif</p>
                        </div>
                    </div>

                    <!-- Card 3 -->
                    <div class="bg-white p-5 rounded-xl border border-slate-200/80 shadow-xs flex items-center gap-4">
                        <div class="w-12 h-12 rounded-full bg-amber-50 text-amber-500 flex items-center justify-center shrink-0">
                            <i data-lucide="clock" class="w-6 h-6"></i>
                        </div>
                        <div>
                            <p class="text-xs font-medium text-slate-500">Menunggu Konfirmasi</p>
                            <p class="text-2xl font-bold text-slate-800 my-0.5">{{ $stats['menunggu_konfirmasi'] }}</p>
                            <p class="text-[11px] text-slate-400">Perlu persetujuan</p>
                        </div>
                    </div>

                    <!-- Card 4 -->
                    <div class="bg-white p-5 rounded-xl border border-slate-200/80 shadow-xs relative flex items-center gap-4">
                        <a href="#" class="absolute top-3 right-4 text-[11px] font-medium text-blue-600 hover:underline">Lihat Semua</a>
                        <div class="w-12 h-12 rounded-full bg-purple-50 text-purple-600 flex items-center justify-center shrink-0">
                            <i data-lucide="check-circle-2" class="w-6 h-6"></i>
                        </div>
                        <div>
                            <p class="text-xs font-medium text-slate-500">Selesai</p>
                            <p class="text-2xl font-bold text-slate-800 my-0.5">{{ $stats['selesai'] }}</p>
                            <p class="text-[11px] text-slate-400">Reservasi selesai</p>
                        </div>
                    </div>
                </div>

                <!-- GRID BAWAH: KIRI (LAB & INFO) | KANAN (RESERVASI & KALENDER) -->
                <div class="grid grid-cols-1 lg:grid-cols-12 gap-6">

                    <!-- KOLOM KIRI (8 Kolom) -->
                    <div class="lg:col-span-8 space-y-6">

                        <!-- Laboratorium Terpopuler -->
                        <div class="bg-white p-5 rounded-xl border border-slate-200/80 shadow-xs">
                            <div class="flex items-center justify-between mb-4">
                                <h2 class="font-bold text-base text-[#0B2545]">Laboratorium Terpopuler</h2>
                                <a href="#" class="text-xs font-medium text-blue-600 hover:underline flex items-center gap-1">
                                    <span>Lihat Semua</span>
                                    <i data-lucide="arrow-right" class="w-3.5 h-3.5"></i>
                                </a>
                            </div>

                            <div class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-4 gap-4">
                                @foreach ($laboratorium as $lab)
                                <div class="border border-slate-200 rounded-xl overflow-hidden flex flex-col justify-between bg-white hover:shadow-md transition">
                                    <div>
                                        <img src="{{ $lab['gambar'] }}" alt="{{ $lab['nama'] }}" class="w-full h-28 object-cover">
                                        <div class="p-3.5">
                                            <h3 class="font-bold text-sm text-slate-800 mb-2">{{ $lab['nama'] }}</h3>
                                            <div class="space-y-1.5 text-[11px] text-slate-500">
                                                <div class="flex items-center gap-1.5">
                                                    <i data-lucide="users" class="w-3.5 h-3.5 text-slate-400"></i>
                                                    <span>{{ $lab['kapasitas'] }}</span>
                                                </div>
                                                <div class="flex items-center gap-1.5">
                                                    <i data-lucide="map-pin" class="w-3.5 h-3.5 text-slate-400"></i>
                                                    <span>{{ $lab['lokasi'] }}</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="px-3.5 pb-3.5">
                                        <a href="#" class="w-full py-2 px-3 bg-[#EBF3FE] hover:bg-blue-100 text-[#1565C0] font-medium text-xs rounded-lg flex items-center justify-center gap-1.5 transition">
                                            <span>Lihat Detail</span>
                                            <i data-lucide="arrow-right" class="w-3.5 h-3.5"></i>
                                        </a>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>

                        <!-- Banner Informasi -->
                        <div class="bg-[#EBF3FE] border border-blue-200/70 rounded-xl p-4 flex items-center gap-3.5">
                            <div class="w-8 h-8 rounded-full bg-blue-100 text-[#1565C0] flex items-center justify-center shrink-0">
                                <i data-lucide="info" class="w-5 h-5"></i>
                            </div>
                            <div>
                                <h4 class="font-bold text-sm text-[#0B2545]">Informasi</h4>
                                <p class="text-xs text-slate-600 mt-0.5">Pastikan Anda melakukan reservasi sesuai dengan jadwal dan ketentuan yang berlaku.</p>
                            </div>
                        </div>

                    </div>

                    <!-- KOLOM KANAN (4 Kolom) -->
                    <div class="lg:col-span-4 space-y-6">

                        <!-- Reservasi Terbaru -->
                        <div class="bg-white p-5 rounded-xl border border-slate-200/80 shadow-xs">
                            <div class="flex items-center justify-between mb-4">
                                <h2 class="font-bold text-base text-[#0B2545]">Reservasi Terbaru</h2>
                                <a href="#" class="text-xs font-medium text-blue-600 hover:underline">Lihat Semua</a>
                            </div>

                            <div class="divide-y divide-slate-100">
                                @foreach ($reservasi_terbaru as $item)
                                <a href="#" class="py-3 first:pt-0 last:pb-0 flex items-center justify-between group">
                                    <div class="space-y-1.5">
                                        <span class="inline-block px-2.5 py-0.5 rounded-full text-[10px] font-semibold {{ $item['badge_bg'] }}">
                                            {{ $item['status'] }}
                                        </span>
                                        <div class="flex items-center gap-1.5 text-xs font-semibold text-slate-800 group-hover:text-blue-600 transition">
                                            <i data-lucide="flask-conical" class="w-3.5 h-3.5 text-slate-400"></i>
                                            <span>{{ $item['lab'] }}</span>
                                        </div>
                                        <div class="flex items-center gap-2 text-[11px] text-slate-400">
                                            <span class="flex items-center gap-1">
                                                <i data-lucide="calendar" class="w-3 h-3"></i>
                                                {{ $item['tanggal'] }}
                                            </span>
                                            <span>|</span>
                                            <span>{{ $item['waktu'] }}</span>
                                        </div>
                                    </div>
                                    <i data-lucide="chevron-right" class="w-4 h-4 text-slate-400 group-hover:text-slate-700"></i>
                                </a>
                                @endforeach
                            </div>
                        </div>

                        <!-- Kalender Reservasi -->
                        <div class="bg-white p-5 rounded-xl border border-slate-200/80 shadow-xs">
                            <div class="flex items-center gap-2 mb-4">
                                <i data-lucide="calendar" class="w-4 h-4 text-[#0B2545]"></i>
                                <h2 class="font-bold text-sm text-[#0B2545]">Kalender Reservasi</h2>
                            </div>

                            <!-- Navigasi Bulan -->
                            <div class="flex items-center justify-between mb-3 px-1">
                                <button class="p-1 hover:bg-slate-100 rounded text-slate-500">
                                    <i data-lucide="chevron-left" class="w-4 h-4"></i>
                                </button>
                                <span class="text-xs font-bold text-slate-800">November 2024</span>
                                <button class="p-1 hover:bg-slate-100 rounded text-slate-500">
                                    <i data-lucide="chevron-right" class="w-4 h-4"></i>
                                </button>
                            </div>

                            <!-- Grid Hari -->
                            <div class="grid grid-cols-7 text-center text-[10px] font-medium text-slate-400 mb-2">
                                <div>Sen</div>
                                <div>Sel</div>
                                <div>Rab</div>
                                <div>Kam</div>
                                <div>Jum</div>
                                <div>Sab</div>
                                <div>Min</div>
                            </div>

                            <!-- Grid Tanggal (November 2024 dimulai hari Jumat) -->
                            <div class="grid grid-cols-7 text-center text-xs gap-y-1.5 items-center">
                                <span class="text-slate-300">28</span>
                                <span class="text-slate-300">29</span>
                                <span class="text-slate-300">30</span>
                                <span class="text-slate-300">31</span>
                                <span class="py-1 text-slate-700">1</span>
                                <span class="py-1 text-slate-700">2</span>
                                <span class="py-1 text-slate-700">3</span>

                                <!-- Tanggal 4 Aktif (Lingkaran Biru) -->
                                <div class="flex justify-center">
                                    <span class="w-7 h-7 rounded-full bg-[#1565C0] text-white font-semibold flex items-center justify-center shadow-xs">4</span>
                                </div>
                                <span class="py-1 text-slate-700 font-medium">5</span>
                                <span class="py-1 text-slate-700">6</span>
                                <span class="py-1 text-slate-700">7</span>
                                <span class="py-1 text-slate-700">8</span>
                                <span class="py-1 text-slate-700">9</span>
                                <span class="py-1 text-slate-700">10</span>

                                <span class="py-1 text-slate-700">11</span>
                                <span class="py-1 text-slate-700">12</span>
                                <span class="py-1 text-slate-700">13</span>
                                <span class="py-1 text-slate-700">14</span>
                                <span class="py-1 text-slate-700">15</span>
                                <span class="py-1 text-slate-700">16</span>
                                <span class="py-1 text-slate-700">17</span>

                                <span class="py-1 text-slate-700">18</span>
                                <span class="py-1 text-slate-700">19</span>
                                <span class="py-1 text-slate-700">20</span>
                                <span class="py-1 text-slate-700">21</span>
                                <span class="py-1 text-slate-700">22</span>
                                <span class="py-1 text-slate-700">23</span>
                                <span class="py-1 text-slate-700">24</span>

                                <span class="py-1 text-slate-700">25</span>
                                <span class="py-1 text-slate-700">26</span>
                                <span class="py-1 text-slate-700">27</span>
                                <span class="py-1 text-slate-700">28</span>
                                <span class="py-1 text-slate-700">29</span>
                                <span class="py-1 text-slate-700">30</span>
                                <span class="text-slate-300">1</span>
                            </div>
                        </div>

                    </div>
                </div>

            </main>
        </div>
    </div>

    <script>
        lucide.createIcons();
    </script>
</body>
</html>
