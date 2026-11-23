<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pengajuan Reservasi - Politeknik Caltex Riau</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Inter', sans-serif; background-color: #f4f7fe; }
        .sidebar-bg { background-color: #0b2d56; }
        .active-menu { background-color: #1665c1; }
        .btn-primary { background-color: #0d6efd; }
        .btn-primary:hover { background-color: #0b5ed7; }
        .text-navy { color: #0b2d56; }
    </style>
</head>
<body class="flex h-screen overflow-hidden text-slate-700">

    <!-- Sidebar -->
    <aside id="sidebar" class="sidebar-bg w-64 flex-shrink-0 flex flex-col justify-between text-white transition-all duration-300">
        <div>
            <div class="h-16 flex items-center px-6 border-b border-blue-900/50">
                <span class="font-bold italic text-lg tracking-wide text-white">Politeknik Caltex Riau</span>
            </div>
            <nav class="mt-6 px-3 space-y-2">
                <a href="/dashboard" class="flex items-center gap-3.5 px-4 py-3 text-sm font-medium text-blue-100 hover:bg-blue-800/50 rounded-lg transition">
                    <i class="fa-solid fa-house w-5 text-center"></i>
                    <span>Dashboard</span>
                </a>
                <a href="/laboratorium" class="flex items-center gap-3.5 px-4 py-3 text-sm font-medium text-blue-100 hover:bg-blue-800/50 rounded-lg transition">
                    <i class="fa-solid fa-flask w-5 text-center"></i>
                    <span>Laboratorium</span>
                </a>
                <a href="{{ route('reservasi.create') }}" class="active-menu flex items-center gap-3.5 px-4 py-3 text-sm font-medium text-white rounded-lg shadow-sm">
                    <i class="fa-regular fa-calendar-check w-5 text-center"></i>
                    <span>Reservasi</span>
                </a>
                <a href="{{ route('reservasi.riwayat') }}" class="flex items-center gap-3.5 px-4 py-3 text-sm font-medium text-blue-100 hover:bg-blue-800/50 rounded-lg transition">
                    <i class="fa-solid fa-clock-rotate-left w-5 text-center"></i>
                    <span>Riwayat Reservasi</span>
                </a>
            </nav>
        </div>
        <div class="p-4 border-t border-blue-900/50">
            <a href="/login" class="flex items-center gap-3.5 px-4 py-3 text-sm font-medium text-blue-100 hover:bg-blue-800/50 rounded-lg transition">
                <i class="fa-solid fa-arrow-right-from-bracket w-5 text-center"></i>
                <span>Keluar</span>
            </a>
        </div>
    </aside>

    <!-- Konten Utama -->
    <div class="flex-1 flex flex-col overflow-hidden">
        <!-- Top Navbar -->
        <header class="h-16 bg-white border-b border-slate-200 flex items-center justify-between px-6 flex-shrink-0">
            <button id="toggleSidebar" class="text-slate-500 hover:text-slate-700 focus:outline-none">
                <i class="fa-solid fa-bars text-lg"></i>
            </button>
            <div class="flex items-center gap-5">
                <button class="relative text-slate-600 hover:text-slate-800">
                    <i class="fa-regular fa-bell text-lg"></i>
                    <span class="absolute -top-1 -right-1 w-2 h-2 bg-red-500 rounded-full"></span>
                </button>
                <div class="flex items-center gap-2 cursor-pointer">
                    <div class="w-8 h-8 rounded-full bg-blue-600 text-white flex items-center justify-center">
                        <i class="fa-solid fa-user text-sm"></i>
                    </div>
                    <i class="fa-solid fa-chevron-down text-xs text-slate-500"></i>
                </div>
            </div>
        </header>

        <!-- Main Area -->
        <main class="flex-1 overflow-y-auto p-6 md:p-8">
            <!-- Breadcrumb & Title -->
            <div class="mb-6">
                <div class="flex items-center gap-2 text-xs text-slate-400 mb-2">
                    <a href="/dashboard" class="hover:text-blue-600"><i class="fa-solid fa-house"></i></a>
                    <span>›</span>
                    <a href="{{ route('reservasi.create') }}" class="hover:text-blue-600">Reservasi</a>
                    <span>›</span>
                    <span class="text-blue-600 font-medium">Pengajuan Reservasi</span>
                </div>
                <h1 class="text-2xl font-bold text-navy">Pengajuan Reservasi</h1>
                <p class="text-sm text-slate-500 mt-1">Silakan isi form berikut untuk mengajukan reservasi laboratorium.</p>
            </div>

            <!-- Alert Sukses / Error -->
            @if(session('success'))
                <div class="mb-6 p-4 rounded-xl bg-emerald-50 border border-emerald-200 text-emerald-700 text-sm flex items-center gap-3">
                    <i class="fa-solid fa-circle-check text-emerald-500 text-lg"></i>
                    <span>{{ session('success') }}</span>
                </div>
            @endif

            @if($errors->any())
                <div class="mb-6 p-4 rounded-xl bg-red-50 border border-red-200 text-red-700 text-sm">
                    <ul class="list-disc list-inside">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <!-- Grid 2 Kolom -->
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 items-start">

                <!-- KOLOM KIRI: FORM PENGAJUAN -->
                <form action="{{ route('reservasi.store') }}" method="POST" class="lg:col-span-2 bg-white rounded-xl shadow-sm border border-slate-100 p-6 space-y-6">
                    @csrf

                    <!-- Step 1: Pilih Laboratorium -->
                    <div>
                        <div class="flex items-center gap-3 mb-3">
                            <span class="w-6 h-6 rounded-full bg-blue-100 text-blue-600 font-bold text-xs flex items-center justify-center">1</span>
                            <label class="font-semibold text-sm text-navy">Pilih Laboratorium</label>
                        </div>
                        <div class="relative ml-9">
                            <i class="fa-solid fa-flask absolute left-3.5 top-1/2 -translate-y-1/2 text-blue-500 text-sm"></i>
                            <select name="laboratorium" id="labSelect" class="w-full pl-10 pr-8 py-2.5 text-sm border border-slate-200 rounded-lg appearance-none bg-white focus:outline-none focus:border-blue-500 text-slate-700" required>
                                @foreach($laboratorium as $lab)
                                    <option value="{{ $lab['nama'] }}"
                                        data-kapasitas="{{ $lab['kapasitas'] }}"
                                        data-lokasi="{{ $lab['lokasi'] }}"
                                        data-fasilitas="{{ $lab['fasilitas'] }}"
                                        data-gambar="{{ $lab['gambar'] }}">
                                        {{ $lab['nama'] }}
                                    </option>
                                @endforeach
                            </select>
                            <i class="fa-solid fa-chevron-down absolute right-3.5 top-1/2 -translate-y-1/2 text-slate-400 text-xs pointer-events-none"></i>
                        </div>
                    </div>

                    <!-- Step 2: Tanggal dan Waktu -->
                    <div>
                        <div class="flex items-center gap-3 mb-3">
                            <span class="w-6 h-6 rounded-full bg-blue-100 text-blue-600 font-bold text-xs flex items-center justify-center">2</span>
                            <label class="font-semibold text-sm text-navy">Tanggal dan Waktu</label>
                        </div>
                        <div class="ml-9 grid grid-cols-1 md:grid-cols-2 gap-4">
                            <!-- Tanggal -->
                            <div>
                                <label class="block text-xs text-slate-500 mb-1.5 flex items-center gap-1.5">
                                    <i class="fa-regular fa-calendar text-blue-500"></i> Tanggal
                                </label>
                                <input type="date" name="tanggal" id="tanggalInput" value="{{ date('Y-m-d') }}"
                                    class="w-full px-3.5 py-2 text-sm border border-slate-200 rounded-lg focus:outline-none focus:border-blue-500 text-slate-700" required>
                            </div>

                            <!-- Waktu Mulai -->
                            <div>
                                <label class="block text-xs text-slate-500 mb-1.5 flex items-center gap-1.5">
                                    <i class="fa-regular fa-clock text-blue-500"></i> Waktu Mulai
                                </label>
                                <div class="relative">
                                    <select name="waktu_mulai" id="waktuMulai" class="w-full px-3.5 py-2 text-sm border border-slate-200 rounded-lg appearance-none bg-white focus:outline-none focus:border-blue-500 text-slate-700">
                                        <option value="08.00" selected>08.00</option>
                                        <option value="09.00">09.00</option>
                                        <option value="10.00">10.00</option>
                                        <option value="13.00">13.00</option>
                                        <option value="15.00">15.00</option>
                                    </select>
                                    <i class="fa-solid fa-chevron-down absolute right-3.5 top-1/2 -translate-y-1/2 text-slate-400 text-xs pointer-events-none"></i>
                                </div>
                            </div>

                            <!-- Waktu Selesai -->
                            <div>
                                <label class="block text-xs text-slate-500 mb-1.5 flex items-center gap-1.5">
                                    <i class="fa-regular fa-clock text-blue-500"></i> Waktu Selesai
                                </label>
                                <div class="relative">
                                    <select name="waktu_selesai" id="waktuSelesai" class="w-full px-3.5 py-2 text-sm border border-slate-200 rounded-lg appearance-none bg-white focus:outline-none focus:border-blue-500 text-slate-700">
                                        <option value="10.00" selected>10.00</option>
                                        <option value="11.00">11.00</option>
                                        <option value="12.00">12.00</option>
                                        <option value="15.00">15.00</option>
                                        <option value="17.00">17.00</option>
                                    </select>
                                    <i class="fa-solid fa-chevron-down absolute right-3.5 top-1/2 -translate-y-1/2 text-slate-400 text-xs pointer-events-none"></i>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Step 3: Keperluan -->
                    <div>
                        <div class="flex items-center gap-3 mb-3">
                            <span class="w-6 h-6 rounded-full bg-blue-100 text-blue-600 font-bold text-xs flex items-center justify-center">3</span>
                            <label class="font-semibold text-sm text-navy">Keperluan</label>
                        </div>
                        <div class="ml-9">
                            <textarea name="keperluan" id="keperluanInput" rows="3" maxlength="500" placeholder="Contoh: Praktikum Pemrograman Web"
                                class="w-full p-3.5 text-sm border border-slate-200 rounded-lg focus:outline-none focus:border-blue-500 text-slate-700" required></textarea>
                            <div class="text-right text-[11px] text-slate-400 mt-1"><span id="keperluanCount">0</span>/500</div>
                        </div>
                    </div>

                    <!-- Step 4: Jumlah Peserta -->
                    <div>
                        <div class="flex items-center gap-3 mb-3">
                            <span class="w-6 h-6 rounded-full bg-blue-100 text-blue-600 font-bold text-xs flex items-center justify-center">4</span>
                            <label class="font-semibold text-sm text-navy">Jumlah Peserta</label>
                        </div>
                        <div class="ml-9 flex items-center gap-3">
                            <i class="fa-solid fa-users text-blue-500 text-sm"></i>
                            <input type="number" name="jumlah_peserta" id="pesertaInput" value="5" min="1" max="50"
                                class="w-28 px-3.5 py-2 text-sm border border-slate-200 rounded-lg focus:outline-none focus:border-blue-500 text-slate-700" required>
                            <span class="text-xs text-slate-500">orang</span>
                        </div>
                    </div>

                    <!-- Step 5: Catatan Tambahan -->
                    <div>
                        <div class="flex items-center gap-3 mb-3">
                            <span class="w-6 h-6 rounded-full bg-blue-100 text-blue-600 font-bold text-xs flex items-center justify-center">5</span>
                            <label class="font-semibold text-sm text-navy">Catatan Tambahan <span class="text-slate-400 font-normal">(Opsional)</span></label>
                        </div>
                        <div class="ml-9">
                            <textarea name="catatan" id="catatanInput" rows="2" maxlength="300" placeholder="Masukkan catatan tambahan jika ada..."
                                class="w-full p-3.5 text-sm border border-slate-200 rounded-lg focus:outline-none focus:border-blue-500 text-slate-700"></textarea>
                            <div class="text-right text-[11px] text-slate-400 mt-1"><span id="catatanCount">0</span>/300</div>
                        </div>
                    </div>

                    <!-- Tombol Aksi -->
                    <div class="pt-4 border-t border-slate-100 flex items-center justify-between ml-9">
                        <a href="/dashboard" class="px-4 py-2 text-xs font-medium text-slate-600 bg-white border border-slate-200 rounded-lg hover:bg-slate-50 flex items-center gap-2 transition">
                            <i class="fa-solid fa-chevron-left text-[10px]"></i>
                            <span>Kembali</span>
                        </a>
                        <button type="submit" class="btn-primary text-white text-xs font-medium px-5 py-2.5 rounded-lg flex items-center gap-2 shadow-sm transition">
                            <i class="fa-regular fa-paper-plane"></i>
                            <span>Ajukan Reservasi</span>
                        </button>
                    </div>
                </form>

                <!-- KOLOM KANAN: RINGKASAN & KETENTUAN -->
                <div class="space-y-6">
                    <!-- Card Ringkasan Reservasi -->
                    <div class="bg-white rounded-xl shadow-sm border border-slate-100 p-5">
                        <h2 class="font-bold text-sm text-navy mb-4">Ringkasan Reservasi</h2>

                        <!-- Info Lab -->
                        <div class="flex gap-3.5 pb-4 border-b border-slate-100">
                            <img id="previewGambar" src="{{ $laboratorium[0]['gambar'] }}" alt="Lab" class="w-24 h-20 object-cover rounded-lg flex-shrink-0">
                            <div class="space-y-1">
                                <h3 id="previewNama" class="font-bold text-xs text-navy">{{ $laboratorium[0]['nama'] }}</h3>
                                <p class="text-[11px] text-slate-500 flex items-center gap-1.5">
                                    <i class="fa-solid fa-users text-blue-500 w-3"></i>
                                    <span>Kapasitas: <span id="previewKapasitas">{{ $laboratorium[0]['kapasitas'] }}</span></span>
                                </p>
                                <p class="text-[11px] text-slate-500 flex items-center gap-1.5">
                                    <i class="fa-solid fa-location-dot text-blue-500 w-3"></i>
                                    <span id="previewLokasi">{{ $laboratorium[0]['lokasi'] }}</span>
                                </p>
                                <p class="text-[11px] text-slate-500 flex items-center gap-1.5">
                                    <i class="fa-solid fa-desktop text-blue-500 w-3"></i>
                                    <span>Fasilitas: <span id="previewFasilitas">{{ $laboratorium[0]['fasilitas'] }}</span></span>
                                </p>
                            </div>
                        </div>

                        <!-- Detail Waktu & Keperluan -->
                        <div class="mt-4 bg-slate-50/70 rounded-lg p-3.5 space-y-3 text-xs">
                            <div class="flex items-start gap-3">
                                <i class="fa-regular fa-calendar text-blue-500 mt-0.5"></i>
                                <div>
                                    <div class="text-[11px] text-slate-400">Tanggal</div>
                                    <div id="previewTanggal" class="font-medium text-slate-700">-</div>
                                </div>
                            </div>
                            <div class="flex items-start gap-3">
                                <i class="fa-regular fa-clock text-blue-500 mt-0.5"></i>
                                <div>
                                    <div class="text-[11px] text-slate-400">Waktu</div>
                                    <div id="previewWaktu" class="font-medium text-slate-700">08.00 - 10.00 WIB</div>
                                </div>
                            </div>
                            <div class="flex items-start gap-3">
                                <i class="fa-solid fa-users text-blue-500 mt-0.5"></i>
                                <div>
                                    <div class="text-[11px] text-slate-400">Jumlah Peserta</div>
                                    <div id="previewPeserta" class="font-medium text-slate-700">5 orang</div>
                                </div>
                            </div>
                            <div class="flex items-start gap-3">
                                <i class="fa-regular fa-file-lines text-blue-500 mt-0.5"></i>
                                <div>
                                    <div class="text-[11px] text-slate-400">Keperluan</div>
                                    <div id="previewKeperluan" class="font-medium text-slate-700">Praktikum Pemrograman Web</div>
                                </div>
                            </div>
                        </div>

                        <!-- Kotak Perhatian -->
                        <div class="mt-4 bg-blue-50/80 border border-blue-100 rounded-lg p-3.5">
                            <div class="flex items-center gap-2 text-blue-700 font-semibold text-xs mb-1.5">
                                <i class="fa-solid fa-circle-info"></i>
                                <span>Perhatian</span>
                            </div>
                            <ul class="text-[11px] text-blue-700/80 space-y-1 list-disc list-inside">
                                <li>Pastikan data yang Anda isi sudah benar.</li>
                                <li>Reservasi akan diverifikasi oleh petugas laboratorium.</li>
                                <li>Anda akan mendapatkan notifikasi melalui sistem setelah pengajuan disetujui.</li>
                            </ul>
                        </div>
                    </div>

                    <!-- Card Ketentuan Reservasi -->
                    <div class="bg-white rounded-xl shadow-sm border border-slate-100 p-5">
                        <div class="flex items-center gap-2 font-bold text-xs text-navy mb-3">
                            <i class="fa-solid fa-clipboard-list text-blue-600"></i>
                            <span>Ketentuan Reservasi</span>
                        </div>
                        <ol class="text-[11px] text-slate-500 space-y-2 list-decimal list-inside leading-relaxed">
                            <li>Reservasi dapat dilakukan minimal 1 hari sebelum penggunaan.</li>
                            <li>Penggunaan laboratorium maksimal sesuai jadwal yang telah ditentukan.</li>
                            <li>Jaga kebersihan dan ketertiban selama penggunaan laboratorium.</li>
                        </ol>
                    </div>
                </div>

            </div>
        </main>
    </div>

    <script>
        const labSelect = document.getElementById('labSelect');
        const tanggalInput = document.getElementById('tanggalInput');
        const waktuMulai = document.getElementById('waktuMulai');
        const waktuSelesai = document.getElementById('waktuSelesai');
        const keperluanInput = document.getElementById('keperluanInput');
        const pesertaInput = document.getElementById('pesertaInput');
        const catatanInput = document.getElementById('catatanInput');

        // Update Preview Lab saat pilihan diganti
        labSelect.addEventListener('change', function() {
            const selected = this.options[this.selectedIndex];
            document.getElementById('previewNama').textContent = selected.value;
            document.getElementById('previewKapasitas').textContent = selected.dataset.kapasitas;
            document.getElementById('previewLokasi').textContent = selected.dataset.lokasi;
            document.getElementById('previewFasilitas').textContent = selected.dataset.fasilitas;
            document.getElementById('previewGambar').src = selected.dataset.gambar;
        });

        // Format Tanggal ke Bahasa Indonesia
        function updateTanggal() {
            if (!tanggalInput.value) return;
            const dateObj = new Date(tanggalInput.value);
            document.getElementById('previewTanggal').textContent = dateObj.toLocaleDateString('id-ID', {
                day: 'numeric', month: 'long', year: 'numeric'
            });
        }
        tanggalInput.addEventListener('change', updateTanggal);
        updateTanggal();

        // Update Waktu
        function updateWaktu() {
            document.getElementById('previewWaktu').textContent = `${waktuMulai.value} - ${waktuSelesai.value} WIB`;
        }
        waktuMulai.addEventListener('change', updateWaktu);
        waktuSelesai.addEventListener('change', updateWaktu);

        // Update Peserta
        pesertaInput.addEventListener('input', function() {
            document.getElementById('previewPeserta').textContent = `${this.value || 0} orang`;
        });

        // Update Keperluan & Counter Karakter
        keperluanInput.addEventListener('input', function() {
            document.getElementById('keperluanCount').textContent = this.value.length;
            document.getElementById('previewKeperluan').textContent = this.value || 'Praktikum Pemrograman Web';
        });

        catatanInput.addEventListener('input', function() {
            document.getElementById('catatanCount').textContent = this.value.length;
        });

        // Toggle Sidebar
        document.getElementById('toggleSidebar').addEventListener('click', () => {
            document.getElementById('sidebar').classList.toggle('hidden');
        });
    </script>
</body>
</html>
