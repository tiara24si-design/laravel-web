<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Riwayat Reservasi - Politeknik Caltex Riau</title>
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
                <a href="{{ route('reservasi.create') }}" class="flex items-center gap-3.5 px-4 py-3 text-sm font-medium text-blue-100 hover:bg-blue-800/50 rounded-lg transition">
                    <i class="fa-regular fa-calendar-check w-5 text-center"></i>
                    <span>Reservasi</span>
                </a>
                <a href="{{ route('reservasi.riwayat') }}" class="active-menu flex items-center gap-3.5 px-4 py-3 text-sm font-medium text-white rounded-lg shadow-sm">
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

        <!-- Area Konten -->
        <main class="flex-1 overflow-y-auto p-6 md:p-8">
            <div class="mb-6">
                <h1 class="text-2xl font-bold text-navy">Riwayat Reservasi</h1>
                <p class="text-sm text-slate-500 mt-1">Berikut adalah riwayat reservasi laboratorium Anda.</p>
            </div>

            <!-- Filter Bar -->
            <div class="bg-white p-4 rounded-xl shadow-sm border border-slate-100 mb-6 flex flex-col md:flex-row gap-4 items-center">
                <div class="relative flex-1 w-full">
                    <i class="fa-solid fa-magnifying-glass absolute left-3.5 top-1/2 -translate-y-1/2 text-slate-400 text-sm"></i>
                    <input type="text" id="searchInput" placeholder="Cari nama laboratorium..."
                        class="w-full pl-10 pr-4 py-2 text-sm border border-slate-200 rounded-lg focus:outline-none focus:border-blue-500">
                </div>

                <div class="relative w-full md:w-56">
                    <i class="fa-solid fa-circle-info absolute left-3.5 top-1/2 -translate-y-1/2 text-slate-500 text-sm"></i>
                    <select id="statusFilter" class="w-full pl-10 pr-8 py-2 text-sm border border-slate-200 rounded-lg appearance-none bg-white focus:outline-none focus:border-blue-500 text-slate-600">
                        <option value="">Semua Status</option>
                        <option value="Dikonfirmasi">Dikonfirmasi</option>
                        <option value="Menunggu">Menunggu</option>
                        <option value="Selesai">Selesai</option>
                    </select>
                    <i class="fa-solid fa-chevron-down absolute right-3.5 top-1/2 -translate-y-1/2 text-slate-400 text-xs pointer-events-none"></i>
                </div>

                <button id="resetBtn" class="btn-primary text-white text-sm font-medium px-5 py-2 rounded-lg flex items-center justify-center gap-2 w-full md:w-auto transition">
                    <i class="fa-solid fa-rotate-right text-xs"></i>
                    <span>Reset</span>
                </button>
            </div>

            <!-- Tabel Riwayat Reservasi -->
            <div class="bg-white rounded-xl shadow-sm border border-slate-100 overflow-hidden">
                <div class="overflow-x-auto">
                    <table class="w-full text-left border-collapse">
                        <thead>
                            <tr class="bg-slate-50/80 border-b border-slate-100 text-xs font-semibold text-slate-600">
                                <th class="py-3.5 px-5">No</th>
                                <th class="py-3.5 px-4">Tanggal Reservasi</th>
                                <th class="py-3.5 px-4">Laboratorium</th>
                                <th class="py-3.5 px-4">Waktu</th>
                                <th class="py-3.5 px-4">Keperluan</th>
                                <th class="py-3.5 px-4">Jumlah Peserta</th>
                                <th class="py-3.5 px-4">Status</th>
                                <th class="py-3.5 px-5 text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody id="tableBody" class="divide-y divide-slate-100 text-xs text-slate-600">
                            @forelse ($reservasis as $index => $item)
                                <tr class="reservasi-row hover:bg-slate-50/80 transition"
                                    data-lab="{{ strtolower($item->laboratorium) }}"
                                    data-status="{{ $item->status }}">
                                    <td class="py-3.5 px-5 font-medium text-slate-700">{{ $index + 1 }}</td>
                                    <td class="py-3.5 px-4">{{ \Carbon\Carbon::parse($item->tanggal)->format('d M Y') }}</td>
                                    <td class="py-3.5 px-4 font-medium text-slate-700">{{ $item->laboratorium }}</td>
                                    <td class="py-3.5 px-4">{{ $item->waktu_mulai }} - {{ $item->waktu_selesai }}</td>
                                    <td class="py-3.5 px-4">{{ $item->keperluan }}</td>
                                    <td class="py-3.5 px-4">{{ $item->jumlah_peserta }} orang</td>
                                    <td class="py-3.5 px-4">
                                        @if($item->status == 'Dikonfirmasi')
                                            <span class="inline-block px-3 py-1 rounded-full text-[11px] font-medium bg-emerald-100 text-emerald-600">Dikonfirmasi</span>
                                        @elseif($item->status == 'Menunggu')
                                            <span class="inline-block px-3 py-1 rounded-full text-[11px] font-medium bg-amber-100 text-amber-600">Menunggu</span>
                                        @else
                                            <span class="inline-block px-3 py-1 rounded-full text-[11px] font-medium bg-sky-100 text-sky-600">{{ $item->status }}</span>
                                        @endif
                                    </td>
                                    <td class="py-3.5 px-5 text-center">
                                        <button type="button"
                                            onclick="openModal('{{ $item->laboratorium }}', '{{ \Carbon\Carbon::parse($item->tanggal)->format('d M Y') }}', '{{ $item->waktu_mulai }} - {{ $item->waktu_selesai }}', '{{ addslashes($item->keperluan) }}', '{{ $item->jumlah_peserta }} orang', '{{ $item->status }}', '{{ addslashes($item->catatan ?? '-') }}')"
                                            class="inline-flex items-center gap-1.5 px-3 py-1 rounded-md bg-blue-50 text-blue-600 hover:bg-blue-100 font-medium text-[11px] transition">
                                            <i class="fa-solid fa-eye text-[10px]"></i>
                                            <span>Detail</span>
                                        </button>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="8" class="py-8 text-center text-slate-400">
                                        Belum ada data riwayat reservasi. Silakan ajukan reservasi terlebih dahulu.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <!-- Pagination Footer -->
                <div class="px-5 py-4 border-t border-slate-100 flex items-center justify-between text-xs text-slate-500">
                    <div>Total: {{ $reservasis->count() }} data reservasi</div>
                </div>
            </div>
        </main>
    </div>

    <!-- Modal Detail Reservasi -->
    <div id="detailModal" class="fixed inset-0 bg-black/40 hidden items-center justify-center z-50 p-4">
        <div class="bg-white rounded-xl max-w-md w-full p-6 shadow-xl">
            <div class="flex justify-between items-center border-b pb-3 mb-4">
                <h3 class="font-bold text-navy text-base">Detail Reservasi</h3>
                <button onclick="closeModal()" class="text-slate-400 hover:text-slate-600">
                    <i class="fa-solid fa-xmark"></i>
                </button>
            </div>
            <div id="modalContent" class="space-y-3 text-sm text-slate-600"></div>
            <div class="mt-6 flex justify-end">
                <button onclick="closeModal()" class="btn-primary text-white text-xs font-medium px-4 py-2 rounded-lg">
                    Tutup
                </button>
            </div>
        </div>
    </div>

    <script>
        const searchInput = document.getElementById('searchInput');
        const statusFilter = document.getElementById('statusFilter');
        const resetBtn = document.getElementById('resetBtn');
        const rows = document.querySelectorAll('.reservasi-row');

        function filterTable() {
            const term = searchInput.value.toLowerCase();
            const status = statusFilter.value;

            rows.forEach(row => {
                const matchLab = row.dataset.lab.includes(term);
                const matchStatus = status === '' || row.dataset.status === status;
                row.style.display = (matchLab && matchStatus) ? '' : 'none';
            });
        }

        searchInput.addEventListener('input', filterTable);
        statusFilter.addEventListener('change', filterTable);

        resetBtn.addEventListener('click', () => {
            searchInput.value = '';
            statusFilter.value = '';
            filterTable();
        });

        function openModal(lab, tanggal, waktu, keperluan, peserta, status, catatan) {
            document.getElementById('modalContent').innerHTML = `
                <div class="flex justify-between"><span class="text-slate-400">Laboratorium:</span> <span class="font-medium text-slate-700">${lab}</span></div>
                <div class="flex justify-between"><span class="text-slate-400">Tanggal:</span> <span class="font-medium text-slate-700">${tanggal}</span></div>
                <div class="flex justify-between"><span class="text-slate-400">Waktu:</span> <span class="font-medium text-slate-700">${waktu}</span></div>
                <div class="flex justify-between"><span class="text-slate-400">Keperluan:</span> <span class="font-medium text-slate-700">${keperluan}</span></div>
                <div class="flex justify-between"><span class="text-slate-400">Jumlah Peserta:</span> <span class="font-medium text-slate-700">${peserta}</span></div>
                <div class="flex justify-between"><span class="text-slate-400">Catatan:</span> <span class="font-medium text-slate-700">${catatan}</span></div>
                <div class="flex justify-between"><span class="text-slate-400">Status:</span> <span class="font-semibold text-blue-600">${status}</span></div>
            `;
            document.getElementById('detailModal').classList.remove('hidden');
            document.getElementById('detailModal').classList.add('flex');
        }

        function closeModal() {
            document.getElementById('detailModal').classList.add('hidden');
            document.getElementById('detailModal').classList.remove('flex');
        }

        document.getElementById('toggleSidebar').addEventListener('click', () => {
            document.getElementById('sidebar').classList.toggle('hidden');
        });
    </script>
</body>
</html>
