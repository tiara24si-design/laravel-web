<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pengajuan Reservasi - Politeknik Caltex Riau</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/lucide@latest"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Inter', sans-serif; }
    </style>
</head>
<body class="bg-[#F4F7FB] text-slate-800 antialiased"
      x-data="{
          labs: {{ Js::from($laboratorium) }},
          selectedLabId: 1,
          tanggal: '2024-11-06',
          waktuMulai: '08:00',
          waktuSelesai: '10:00',
          keperluan: '',
          jumlahPeserta: 5,
          catatan: '',
          get activeLab() {
              return this.labs.find(l => l.id == this.selectedLabId) || this.labs[0];
          },
          get formattedTanggal() {
              if (!this.tanggal) return '-';
              const bulan = ['Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember'];
              const d = new Date(this.tanggal);
              return `${d.getDate()} ${bulan[d.getMonth()]} ${d.getFullYear()}`;
          }
      }">

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
                    <a href="{{ route('dashboard') }}" class="flex items-center gap-3 px-4 py-3 rounded-lg text-slate-300 hover:bg-white/10 hover:text-white transition text-sm">
                        <i data-lucide="home" class="w-4 h-4"></i>
                        <span>Dashboard</span>
                    </a>
                    <a href="#" class="flex items-center gap-3 px-4 py-3 rounded-lg text-slate-300 hover:bg-white/10 hover:text-white transition text-sm">
                        <i data-lucide="flask-conical" class="w-4 h-4"></i>
                        <span>Laboratorium</span>
                    </a>
                    <a href="{{ route('reservasi.create') }}" class="flex items-center gap-3 px-4 py-3 rounded-lg bg-[#1D5B9B] text-white font-medium text-sm shadow-sm">
                        <i data-lucide="calendar-plus" class="w-4 h-4"></i>
                        <span>Reservasi</span>
                    </a>
                    <a href="#" class="flex items-center gap-3 px-4 py-3 rounded-lg text-slate-300 hover:bg-white/10 hover:text-white transition text-sm">
                        <i data-lucide="history" class="w-4 h-4"></i>
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
                    <button class="relative text-slate-600 hover:text-slate-900">
                        <i data-lucide="bell" class="w-5 h-5"></i>
                        <span class="absolute -top-0.5 -right-0.5 w-2 h-2 bg-red-500 rounded-full"></span>
                    </button>

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

                <!-- Breadcrumb & Title -->
                <div>
                    <nav class="flex items-center gap-1.5 text-xs text-slate-400 mb-2">
                        <i data-lucide="home" class="w-3.5 h-3.5"></i>
                        <span>Reservasi</span>
                        <i data-lucide="chevron-right" class="w-3.5 h-3.5"></i>
                        <span class="text-blue-600 font-medium">Pengajuan Reservasi</span>
                    </nav>
                    <h1 class="text-2xl font-bold text-[#0B2545]">Pengajuan Reservasi</h1>
                    <p class="text-sm text-slate-500 mt-0.5">Silakan isi form berikut untuk mengajukan reservasi laboratorium.</p>
                </div>

                @if(session('success'))
                    <div class="bg-emerald-50 border border-emerald-200 text-emerald-700 px-4 py-3 rounded-xl text-sm flex items-center gap-2">
                        <i data-lucide="check-circle-2" class="w-4 h-4"></i>
                        <span>{{ session('success') }}</span>
                    </div>
                @endif

                <!-- GRID UTAMA: KIRI (FORM) | KANAN (RINGKASAN & KETENTUAN) -->
                <div class="grid grid-cols-1 lg:grid-cols-12 gap-6 items-start">

                    <!-- KOLOM KIRI: FORM PENGAJUAN (8 Kolom) -->
                    <form action="{{ route('reservasi.store') }}" method="POST" class="lg:col-span-8 bg-white p-6 rounded-xl border border-slate-200/80 shadow-xs space-y-6">
                        @csrf

                        <!-- 1. Pilih Laboratorium -->
                        <div class="space-y-2.5">
                            <div class="flex items-center gap-2.5">
                                <span class="w-6 h-6 rounded-full bg-blue-100 text-[#1565C0] font-bold text-xs flex items-center justify-center">1</span>
                                <label class="font-bold text-sm text-[#0B2545]">Pilih Laboratorium</label>
                            </div>
                            <div class="relative pl-8">
                                <div class="relative">
                                    <i data-lucide="flask-conical" class="w-4 h-4 text-[#1565C0] absolute left-3.5 top-1/2 -translate-y-1/2 pointer-events-none"></i>
                                    <select name="laboratorium_id" x-model="selectedLabId" class="w-full pl-10 pr-10 py-2.5 bg-white border border-slate-300 rounded-lg text-sm text-slate-700 focus:outline-none focus:border-[#1565C0] focus:ring-1 focus:ring-[#1565C0] appearance-none">
                                        @foreach($laboratorium as $lab)
                                            <option value="{{ $lab['id'] }}">{{ $lab['nama'] }}</option>
                                        @endforeach
                                    </select>
                                    <i data-lucide="chevron-down" class="w-4 h-4 text-slate-400 absolute right-3.5 top-1/2 -translate-y-1/2 pointer-events-none"></i>
                                </div>
                            </div>
                        </div>

                        <!-- 2. Tanggal dan Waktu -->
                        <div class="space-y-3">
                            <div class="flex items-center gap-2.5">
                                <span class="w-6 h-6 rounded-full bg-blue-100 text-[#1565C0] font-bold text-xs flex items-center justify-center">2</span>
                                <label class="font-bold text-sm text-[#0B2545]">Tanggal dan Waktu</label>
                            </div>

                            <div class="pl-8 grid grid-cols-1 sm:grid-cols-2 gap-4">
                                <!-- Tanggal -->
                                <div class="space-y-1.5">
                                    <label class="flex items-center gap-1.5 text-xs font-medium text-slate-600">
                                        <i data-lucide="calendar" class="w-3.5 h-3.5 text-slate-400"></i>
                                        <span>Tanggal</span>
                                    </label>
                                    <input type="date" name="tanggal" x-model="tanggal" class="w-full px-3.5 py-2 border border-slate-300 rounded-lg text-sm text-slate-700 focus:outline-none focus:border-[#1565C0]">
                                </div>

                                <!-- Waktu Mulai -->
                                <div class="space-y-1.5">
                                    <label class="flex items-center gap-1.5 text-xs font-medium text-slate-600">
                                        <i data-lucide="clock" class="w-3.5 h-3.5 text-slate-400"></i>
                                        <span>Waktu Mulai</span>
                                    </label>
                                    <div class="relative">
                                        <select name="waktu_mulai" x-model="waktuMulai" class="w-full px-3.5 py-2 bg-white border border-slate-300 rounded-lg text-sm text-slate-700 focus:outline-none focus:border-[#1565C0] appearance-none">
                                            <option value="08:00">08.00</option>
                                            <option value="10:00">10.00</option>
                                            <option value="13:00">13.00</option>
                                            <option value="15:00">15.00</option>
                                        </select>
                                        <i data-lucide="chevron-down" class="w-4 h-4 text-slate-400 absolute right-3 top-1/2 -translate-y-1/2 pointer-events-none"></i>
                                    </div>
                                </div>

                                <!-- Waktu Selesai -->
                                <div class="space-y-1.5">
                                    <label class="flex items-center gap-1.5 text-xs font-medium text-slate-600">
                                        <i data-lucide="clock" class="w-3.5 h-3.5 text-slate-400"></i>
                                        <span>Waktu Selesai</span>
                                    </label>
                                    <div class="relative">
                                        <select name="waktu_selesai" x-model="waktuSelesai" class="w-full px-3.5 py-2 bg-white border border-slate-300 rounded-lg text-sm text-slate-700 focus:outline-none focus:border-[#1565C0] appearance-none">
                                            <option value="10:00">10.00</option>
                                            <option value="12:00">12.00</option>
                                            <option value="15:00">15.00</option>
                                            <option value="17:00">17.00</option>
                                        </select>
                                        <i data-lucide="chevron-down" class="w-4 h-4 text-slate-400 absolute right-3 top-1/2 -translate-y-1/2 pointer-events-none"></i>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- 3. Keperluan -->
                        <div class="space-y-2">
                            <div class="flex items-center gap-2.5">
                                <span class="w-6 h-6 rounded-full bg-blue-100 text-[#1565C0] font-bold text-xs flex items-center justify-center">3</span>
                                <label class="font-bold text-sm text-[#0B2545]">Keperluan</label>
                            </div>
                            <div class="pl-8">
                                <textarea name="keperluan" x-model="keperluan" maxlength="500" rows="3" placeholder="Contoh: Praktikum Pemrograman Web" class="w-full px-3.5 py-2.5 border border-slate-300 rounded-lg text-sm text-slate-700 focus:outline-none focus:border-[#1565C0]"></textarea>
                                <div class="text-right text-[11px] text-slate-400 mt-1">
                                    <span x-text="keperluan.length">0</span>/500
                                </div>
                            </div>
                        </div>

                        <!-- 4. Jumlah Peserta -->
                        <div class="space-y-2">
                            <div class="flex items-center gap-2.5">
                                <span class="w-6 h-6 rounded-full bg-blue-100 text-[#1565C0] font-bold text-xs flex items-center justify-center">4</span>
                                <label class="font-bold text-sm text-[#0B2545]">Jumlah Peserta</label>
                            </div>
                            <div class="pl-8 flex items-center gap-3">
                                <i data-lucide="users" class="w-4 h-4 text-slate-500"></i>
                                <input type="number" name="jumlah_peserta" x-model="jumlahPeserta" min="1" max="50" class="w-28 px-3 py-2 border border-slate-300 rounded-lg text-sm text-slate-700 focus:outline-none focus:border-[#1565C0]">
                                <span class="text-sm text-slate-600">orang</span>
                            </div>
                        </div>

                        <!-- 5. Catatan Tambahan (Opsional) -->
                        <div class="space-y-2">
                            <div class="flex items-center gap-2.5">
                                <span class="w-6 h-6 rounded-full bg-blue-100 text-[#1565C0] font-bold text-xs flex items-center justify-center">5</span>
                                <label class="font-bold text-sm text-[#0B2545]">Catatan Tambahan <span class="font-normal text-slate-400">(Opsional)</span></label>
                            </div>
                            <div class="pl-8">
                                <textarea name="catatan" x-model="catatan" maxlength="250" rows="2" placeholder="Masukkan catatan tambahan jika ada..." class="w-full px-3.5 py-2.5 border border-slate-300 rounded-lg text-sm text-slate-700 focus:outline-none focus:border-[#1565C0]"></textarea>
                                <div class="text-right text-[11px] text-slate-400 mt-1">
                                    <span x-text="catatan.length">0</span>/250
                                </div>
                            </div>
                        </div>

                        <!-- Tombol Aksi -->
                        <div class="pt-4 border-t border-slate-100 flex items-center justify-between">
                            <a href="{{ route('dashboard') }}" class="px-5 py-2.5 border border-slate-300 rounded-lg text-xs font-semibold text-slate-600 hover:bg-slate-50 flex items-center gap-1.5 transition">
                                <i data-lucide="chevron-left" class="w-4 h-4"></i>
                                <span>Kembali</span>
                            </a>
                            <button type="submit" class="px-6 py-2.5 bg-[#1565C0] hover:bg-[#0B2545] text-white rounded-lg text-xs font-semibold flex items-center gap-2 shadow-xs transition">
                                <i data-lucide="send" class="w-3.5 h-3.5"></i>
                                <span>Ajukan Reservasi</span>
                            </button>
                        </div>
                    </form>

                    <!-- KOLOM KANAN: RINGKASAN, PERHATIAN, KETENTUAN (4 Kolom) -->
                    <div class="lg:col-span-4 space-y-5">

                        <!-- Card Ringkasan Reservasi -->
                        <div class="bg-white p-5 rounded-xl border border-slate-200/80 shadow-xs space-y-4">
                            <h2 class="font-bold text-base text-[#0B2545]">Ringkasan Reservasi</h2>

                            <!-- Info Lab Terpilih -->
                            <div class="flex gap-3.5 items-start">
                                <img :src="activeLab.gambar" :alt="activeLab.nama" class="w-24 h-20 rounded-lg object-cover shrink-0 border border-slate-200">
                                <div class="space-y-1">
                                    <h3 class="font-bold text-sm text-slate-800" x-text="activeLab.nama"></h3>
                                    <div class="flex items-center gap-1.5 text-[11px] text-slate-500">
                                        <i data-lucide="users" class="w-3.5 h-3.5 text-slate-400"></i>
                                        <span>Kapasitas: <span x-text="activeLab.kapasitas"></span></span>
                                    </div>
                                    <div class="flex items-center gap-1.5 text-[11px] text-slate-500">
                                        <i data-lucide="map-pin" class="w-3.5 h-3.5 text-slate-400"></i>
                                        <span x-text="activeLab.lokasi"></span>
                                    </div>
                                    <div class="flex items-center gap-1.5 text-[11px] text-slate-500">
                                        <i data-lucide="monitor" class="w-3.5 h-3.5 text-slate-400"></i>
                                        <span>Fasilitas: <span x-text="activeLab.fasilitas"></span></span>
                                    </div>
                                </div>
                            </div>

                            <!-- Kotak Detail Ringkasan -->
                            <div class="bg-[#F8FAFC] border border-slate-200/80 rounded-xl p-4 space-y-3 text-xs">
                                <div class="flex items-start gap-3">
                                    <i data-lucide="calendar" class="w-4 h-4 text-slate-400 mt-0.5"></i>
                                    <div>
                                        <p class="text-[11px] text-slate-400">Tanggal</p>
                                        <p class="font-semibold text-slate-700" x-text="formattedTanggal"></p>
                                    </div>
                                </div>

                                <div class="flex items-start gap-3">
                                    <i data-lucide="clock" class="w-4 h-4 text-slate-400 mt-0.5"></i>
                                    <div>
                                        <p class="text-[11px] text-slate-400">Waktu</p>
                                        <p class="font-semibold text-slate-700">
                                            <span x-text="waktuMulai.replace(':','.')"></span> - <span x-text="waktuSelesai.replace(':','.')"></span> WIB
                                        </p>
                                    </div>
                                </div>

                                <div class="flex items-start gap-3">
                                    <i data-lucide="users" class="w-4 h-4 text-slate-400 mt-0.5"></i>
                                    <div>
                                        <p class="text-[11px] text-slate-400">Jumlah Peserta</p>
                                        <p class="font-semibold text-slate-700"><span x-text="jumlahPeserta || 0"></span> orang</p>
                                    </div>
                                </div>

                                <div class="flex items-start gap-3">
                                    <i data-lucide="file-text" class="w-4 h-4 text-slate-400 mt-0.5"></i>
                                    <div>
                                        <p class="text-[11px] text-slate-400">Keperluan</p>
                                        <p class="font-semibold text-slate-700" x-text="keperluan || 'Praktikum Pemrograman Web'"></p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Card Perhatian -->
                        <div class="bg-[#EBF3FE] border border-blue-200/80 rounded-xl p-4 space-y-2">
                            <div class="flex items-center gap-2 text-[#1565C0]">
                                <i data-lucide="info" class="w-4 h-4"></i>
                                <h3 class="font-bold text-sm">Perhatian</h3>
                            </div>
                            <ul class="list-disc list-inside text-xs text-slate-600 space-y-1 pl-1">
                                <li>Pastikan data yang diisi sudah benar.</li>
                                <li>Reservasi akan diverifikasi oleh petugas laboratorium.</li>
                                <li>Anda akan mendapatkan notifikasi melalui sistem setelah pengajuan disetujui.</li>
                            </ul>
                        </div>

                        <!-- Card Ketentuan Reservasi -->
                        <div class="bg-white border border-slate-200/80 rounded-xl p-5 shadow-xs space-y-2.5">
                            <div class="flex items-center gap-2 text-[#0B2545]">
                                <i data-lucide="clipboard-check" class="w-4 h-4 text-[#1565C0]"></i>
                                <h3 class="font-bold text-sm">Ketentuan Reservasi</h3>
                            </div>
                            <ol class="list-decimal list-inside text-xs text-slate-600 space-y-1.5 pl-1">
                                <li>Reservasi dapat dilakukan minimal 1 hari sebelum penggunaan.</li>
                                <li>Penggunaan laboratorium maksimal sesuai jadwal yang telah ditentukan.</li>
                                <li>Jaga kebersihan dan ketertiban selama penggunaan laboratorium.</li>
                            </ol>
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
