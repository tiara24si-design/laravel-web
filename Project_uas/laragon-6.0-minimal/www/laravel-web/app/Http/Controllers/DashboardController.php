<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController
{
    public function index()
    {
        // Data statistik ringkasan
        $stats = [
            'total_lab' => 5,
            'reservasi_saya' => 2,
            'menunggu_konfirmasi' => 1,
            'selesai' => 3,
        ];

        // Data Laboratorium Terpopuler
        $laboratorium = [
            [
                'nama' => 'Lab Komputer 1',
                'kapasitas' => 'Kapasitas 30 orang',
                'lokasi' => 'Gedung A, Lantai 2',
                'gambar' => 'https://images.unsplash.com/photo-1517694712202-14dd9538aa97?auto=format&fit=crop&w=500&q=80',
            ],
            [
                'nama' => 'Lab Jaringan',
                'kapasitas' => 'Kapasitas 20 orang',
                'lokasi' => 'Gedung A, Lantai 1',
                'gambar' => 'https://images.unsplash.com/photo-1558494949-ef010cbdcc31?auto=format&fit=crop&w=500&q=80',
            ],
            [
                'nama' => 'Lab Multimedia',
                'kapasitas' => 'Kapasitas 25 orang',
                'lokasi' => 'Gedung A, Lantai 1',
                'gambar' => 'https://images.unsplash.com/photo-1598488035139-bdbb2231ce04?auto=format&fit=crop&w=500&q=80',
            ],
            [
                'nama' => 'Lab Elektronika',
                'kapasitas' => 'Kapasitas 20 orang',
                'lokasi' => 'Gedung B, Lantai 2',
                'gambar' => 'https://images.unsplash.com/photo-1581092160562-40aa08e78837?auto=format&fit=crop&w=500&q=80',
            ],
        ];

        // Data Reservasi Terbaru
        $reservasi_terbaru = [
            [
                'status' => 'Dikonfirmasi',
                'badge_bg' => 'bg-emerald-100 text-emerald-700',
                'lab' => 'Lab Komputer 1',
                'tanggal' => '5 Nov 2024',
                'waktu' => '08.00 - 10.00',
            ],
            [
                'status' => 'Menunggu',
                'badge_bg' => 'bg-amber-100 text-amber-700',
                'lab' => 'Lab Jaringan',
                'tanggal' => '7 Nov 2024',
                'waktu' => '10.00 - 12.00',
            ],
            [
                'status' => 'Diajukan',
                'badge_bg' => 'bg-sky-100 text-sky-700',
                'lab' => 'Lab Multimedia',
                'tanggal' => '10 Nov 2024',
                'waktu' => '13.00 - 15.00',
            ],
            [
                'status' => 'Selesai',
                'badge_bg' => 'bg-slate-200 text-slate-700',
                'lab' => 'Lab Elektronika',
                'tanggal' => '2 Nov 2024',
                'waktu' => '08.00 - 10.00',
            ],
        ];

       return view('auth.dashboard', compact('stats', 'laboratorium', 'reservasi_terbaru'));
    }
}
