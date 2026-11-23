<?php

namespace App\Http\Controllers;

use App\Models\Reservasi;
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
                'gambar' => 'https://images.unsplash.com/photo-1517694712202-14dd9538aa97?auto=format&fit=crop&w=800&q=80'
            ],
            [
                'id' => 2,
                'nama' => 'Lab Sistem Informasi',
                'kapasitas' => '25 orang',
                'lokasi' => 'Gedung A, Lantai 1',
                'fasilitas' => 'Router Cisco, Switch, Rack Server',
                'gambar' => 'https://images.unsplash.com/photo-1558494949-ef010cbdcc31?auto=format&fit=crop&w=800&q=80'
            ],
            [
                'id' => 3,
                'nama' => 'Lab Animasi',
                'kapasitas' => '25 orang',
                'lokasi' => 'Gedung B, Lantai 1',
                'fasilitas' => 'iMac, Drawing Tablet, Software 3D & Rendering',
                'gambar' => 'https://images.unsplash.com/photo-1598488035139-bdbb2231ce04?auto=format&fit=crop&w=800&q=80'
            ],
            [
                'id' => 4,
                'nama' => 'Lab Teknologi Rekayasa Komputer',
                'kapasitas' => '20 orang',
                'lokasi' => 'Gedung B, Lantai 2',
                'fasilitas' => 'PC Workstation, Mikrokontroler, Perangkat Jaringan & IoT',
                'gambar' => 'https://images.unsplash.com/photo-1518770660439-4636190af475?auto=format&fit=crop&w=800&q=80'
            ],
        ];

        return view('auth.reservasi', compact('laboratorium'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'laboratorium' => 'required|string',
            'tanggal' => 'required|date',
            'waktu_mulai' => 'required|string',
            'waktu_selesai' => 'required|string',
            'keperluan' => 'required|string|max:500',
            'jumlah_peserta' => 'required|integer|min:1',
            'catatan' => 'nullable|string|max:300',
        ]);

        Reservasi::create([
            'laboratorium' => $request->laboratorium,
            'tanggal' => $request->tanggal,
            'waktu_mulai' => $request->waktu_mulai,
            'waktu_selesai' => $request->waktu_selesai,
            'keperluan' => $request->keperluan,
            'jumlah_peserta' => $request->jumlah_peserta,
            'catatan' => $request->catatan,
            'status' => 'Menunggu',
        ]);

        return redirect()->route('reservasi.create')->with('success', 'Pengajuan reservasi berhasil dikirim dan disimpan ke database!');
    }

    public function riwayat()
    {
        $reservasis = Reservasi::latest()->get();
        return view('auth.riwayat-reservasi', compact('reservasis'));
    }
}
