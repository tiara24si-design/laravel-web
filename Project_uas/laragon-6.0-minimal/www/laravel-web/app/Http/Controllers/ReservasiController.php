<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ReservasiController
{
    public function create()
    {
        $laboratorium = [
            [
                'id' => 1,
                'nama' => 'Lab Informatika',
                'kapasitas' => '30 orang',
                'lokasi' => 'Gedung A, Lantai 2',
                'fasilitas' => 'PC, Server, Jaringan',
                'gambar' => 'https://images.unsplash.com/photo-1517694712202-14dd9538aa97?auto=format&fit=crop&w=500&q=80',
            ],
            [
                'id' => 2,
                'nama' => 'Lab Jaringan',
                'kapasitas' => '20 orang',
                'lokasi' => 'Gedung A, Lantai 1',
                'fasilitas' => 'Router Cisco, Switch, Rack Server',
                'gambar' => 'https://images.unsplash.com/photo-1558494949-ef010cbdcc31?auto=format&fit=crop&w=500&q=80',
            ],
            [
                'id' => 3,
                'nama' => 'Lab Multimedia',
                'kapasitas' => '25 orang',
                'lokasi' => 'Gedung A, Lantai 1',
                'fasilitas' => 'iMac, Green Screen, Lighting Studio',
                'gambar' => 'https://images.unsplash.com/photo-1598488035139-bdbb2231ce04?auto=format&fit=crop&w=500&q=80',
            ],
            [
                'id' => 4,
                'nama' => 'Lab Elektronika',
                'kapasitas' => '20 orang',
                'lokasi' => 'Gedung B, Lantai 2',
                'fasilitas' => 'Osiloskop, Power Supply, Soldering',
                'gambar' => 'https://images.unsplash.com/photo-1581092160562-40aa08e78837?auto=format&fit=crop&w=500&q=80',
            ],
        ];

        return view('reservasi', compact('laboratorium'));
    }

    public function store(Request $request)
    {
        // Logika penyimpanan ke database nantinya
        return back()->with('success', 'Pengajuan reservasi berhasil dikirim dan menunggu verifikasi petugas!');
    }
}
