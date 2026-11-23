<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Dashboard Reservasi Laboratorium</title>

<style>
- {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: Arial, sans-serif;
}

body {
    background: #f4f7fb;
    color: #18385f;
    font-size: 13px;
}

/* SIDEBAR */
.sidebar {
    width: 230px;
    height: 100vh;
    background: #0b2747;
    position: fixed;
    left: 0;
    top: 0;
    color: white;
}

.brand {
    height: 58px;
    display: flex;
    align-items: center;
    padding: 0 20px;
    font-size: 15px;
    font-weight: bold;
    border-bottom: 1px solid #233d5b;
}

.brand span {
    color: #42b5ff;
    margin-left: 4px;
}

.menu {
    padding: 15px 12px;
}

.menu a {
    display: flex;
    align-items: center;
    gap: 12px;
    padding: 12px 13px;
    margin-bottom: 5px;
    text-decoration: none;
    color: #d9e7f8;
    border-radius: 6px;
    font-size: 12px;
}

.menu a:hover,
.menu a.active {
    background: #215b98;
    color: white;
}

.menu-icon {
    width: 18px;
    text-align: center;
    font-size: 15px;
}

.logout {
    position: absolute;
    bottom: 15px;
    left: 15px;
}

.logout a {
    text-decoration: none;
    color: #d9e7f8;
    font-size: 12px;
}

/* MAIN */
.main {
    margin-left: 230px;
    min-height: 100vh;
}

/* TOPBAR */
.topbar {
    height: 58px;
    background: white;
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: 0 25px;
    border-bottom: 1px solid #e5edf5;
}

.hamburger {
    color: #607994;
    font-size: 18px;
    cursor: pointer;
}

.profile-area {
    display: flex;
    align-items: center;
    gap: 17px;
}

.notification {
    font-size: 17px;
    color: #607994;
    position: relative;
}

.notification::after {
    content: "";
    width: 6px;
    height: 6px;
    background: #ff405d;
    border-radius: 50%;
    position: absolute;
    right: -2px;
    top: -1px;
}

.profile {
    width: 30px;
    height: 30px;
    background: #1768bd;
    color: white;
    border-radius: 50%;
    display: flex;
    justify-content: center;
    align-items: center;
}

/* CONTENT */
.content {
    padding: 25px;
}

.welcome {
    display: flex;
    align-items: center;
    justify-content: space-between;
    margin-bottom: 23px;
}

.welcome h1 {
    font-size: 22px;
    margin-bottom: 7px;
    color: #17385e;
}

.welcome p {
    font-size: 12px;
    color: #7890aa;
}

.date {
    background: white;
    border: 1px solid #dce7f2;
    border-radius: 6px;
    padding: 10px 14px;
    color: #607994;
    font-size: 11px;
}

/* STATISTICS */
.stats {
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    gap: 15px;
    margin-bottom: 24px;
}

.stat-card {
    background: white;
    border: 1px solid #e1eaf3;
    border-radius: 10px;
    padding: 17px;
    display: flex;
    align-items: center;
    gap: 13px;
    min-height: 105px;
}

.stat-icon {
    width: 43px;
    height: 43px;
    flex-shrink: 0;
    display: flex;
    justify-content: center;
    align-items: center;
    border-radius: 50%;
    font-size: 19px;
}

.blue {
    background: #edf4ff;
    color: #2468ff;
}

.green {
    background: #e8fbf3;
    color: #00a875;
}

.orange {
    background: #fff7e5;
    color: #ff9800;
}

.purple {
    background: #f4edff;
    color: #994cff;
}

.stat-text {
    color: #7890aa;
    font-size: 11px;
}

.stat-number {
    font-size: 23px;
    font-weight: bold;
    color: #17385e;
    margin: 5px 0;
}

.stat-description {
    font-size: 10px;
    color: #98a9bd;
}

/* LABORATORY */
.section {
    background: white;
    border: 1px solid #e1eaf3;
    border-radius: 10px;
    padding: 20px;
    margin-bottom: 22px;
}

.section-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 17px;
}

.section-header h2 {
    font-size: 15px;
    color: #17385e;
}

.section-header a {
    color: #1768bd;
    text-decoration: none;
    font-size: 11px;
}

/* LAB CARDS */
.lab-grid {
    display: grid;
    grid-template-columns: repeat(2, 1fr);
    gap: 15px;
}

.lab-card {
    border: 1px solid #dce7f2;
    border-radius: 9px;
    overflow: hidden;
    background: white;
    transition: 0.2s;
}

.lab-card:hover {
    transform: translateY(-3px);
    box-shadow: 0 5px 15px rgba(30, 70, 110, 0.08);
}

.lab-banner {
    height: 130px;
    display: flex;
    justify-content: center;
    align-items: center;
    font-size: 48px;
}

.banner-ti {
    background: linear-gradient(135deg, #dceaff, #8dbaff);
}

.banner-si {
    background: linear-gradient(135deg, #d9f9ed, #8be0bf);
}

.banner-trk {
    background: linear-gradient(135deg, #e4e2ff, #aaa4ff);
}

.banner-animasi {
    background: linear-gradient(135deg, #ffe5ed, #ffabc8);
}

.lab-info {
    padding: 15px;
}

.lab-info h3 {
    font-size: 14px;
    margin-bottom: 6px;
    color: #17385e;
}

.department {
    font-size: 10px;
    color: #1768bd;
    background: #edf5ff;
    display: inline-block;
    padding: 5px 8px;
    border-radius: 12px;
    margin-bottom: 10px;
}

.lab-info p {
    font-size: 11px;
    line-height: 1.6;
    color: #8095ac;
    min-height: 35px;
}

.lab-details {
    display: flex;
    gap: 15px;
    margin-top: 12px;
    color: #7890aa;
    font-size: 10px;
}

.lab-button {
    display: block;
    margin-top: 13px;
    padding: 9px;
    text-align: center;
    text-decoration: none;
    background: #edf4ff;
    color: #1768bd;
    border-radius: 6px;
    font-size: 11px;
}

.lab-button:hover {
    background: #dceaff;
}

/* RECENT RESERVATION */
.reservation-table {
    width: 100%;
    border-collapse: collapse;
    overflow-x: auto;
}

.reservation-table th {
    background: #f7faff;
    color: #627b97;
    padding: 12px;
    text-align: left;
    font-size: 10px;
    border-bottom: 1px solid #e8eef5;
}

.reservation-table td {
    padding: 12px;
    font-size: 11px;
    color: #7890aa;
    border-bottom: 1px solid #edf1f6;
}

.reservation-table tr:last-child td {
    border-bottom: none;
}

.badge {
    padding: 5px 9px;
    border-radius: 12px;
    font-size: 9px;
}

.confirmed {
    background: #d9f7e8;
    color: #16845b;
}

.pending {
    background: #fff0cb;
    color: #bd7900;
}

.completed {
    background: #e0efff;
    color: #2879bc;
}

.cancelled {
    background: #ffe2e9;
    color: #d34b68;
}

/* INFO */
.info-box {
    background: #edf5ff;
    border: 1px solid #c9e0ff;
    border-radius: 9px;
    padding: 16px;
    display: flex;
    gap: 12px;
    align-items: center;
}

.info-icon {
    width: 35px;
    height: 35px;
    background: #d8eaff;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    color: #2675cb;
    font-size: 17px;
}

.info-box h3 {
    font-size: 12px;
    margin-bottom: 5px;
}

.info-box p {
    font-size: 11px;
    line-height: 1.5;
    color: #6885a5;
}

/* RESPONSIVE */
@media(max-width: 1100px) {
    .stats {
        grid-template-columns: repeat(2, 1fr);
    }
}

@media(max-width: 750px) {
    .sidebar {
        width: 65px;
    }

    .brand {
        font-size: 0;
        justify-content: center;
        padding: 0;
    }

    .brand::after {
        content: "PCR";
        font-size: 13px;
    }

    .menu a {
        justify-content: center;
        padding: 12px 5px;
        font-size: 0;
    }

    .menu-icon {
        font-size: 17px;
    }

    .logout a {
        font-size: 0;
    }

    .main {
        margin-left: 65px;
    }

    .lab-grid {
        grid-template-columns: 1fr;
    }

    .welcome {
        align-items: flex-start;
        flex-direction: column;
        gap: 12px;
    }
}

@media(max-width: 500px) {
    .content {
        padding: 12px;
    }

    .stats {
        grid-template-columns: 1fr;
    }
}
</style>
</head>

<body>

<!-- SIDEBAR -->
<aside class="sidebar">

    <div class="brand">
        Politeknik <span>Caltex Riau</span>
    </div>

    <nav class="menu">

        <a href="/dashboard" class="active">
            <span class="menu-icon">⌂</span>
            Dashboard
        </a>

        <a href="/laboratorium">
            <span class="menu-icon">⚗</span>
            Laboratorium
        </a>

        <a href="/reservasi">
            <span class="menu-icon">▣</span>
            Reservasi
        </a>

        <a href="/riwayat-reservasi">
            <span class="menu-icon">▤</span>
            Riwayat Reservasi
        </a>

    </nav>

    <div class="logout">
        <a href="/login">⇥ &nbsp; Keluar</a>
    </div>

</aside>

<!-- MAIN -->
<main class="main">

    <!-- HEADER -->
    <header class="topbar">
        <div class="hamburger">☰</div>

        <div class="profile-area">
            <div class="notification">♧</div>
            <div class="profile">♙</div>
            <span style="color:#7890aa">⌄</span>
        </div>
    </header>

    <!-- CONTENT -->
    <section class="content">

        <!-- WELCOME -->
        <div class="welcome">
            <div>
                <h1>Selamat Datang!</h1>
                <p>
                    Berikut adalah informasi dan ringkasan reservasi laboratorium Anda.
                </p>
            </div>

            <div class="date">
                📅 <span id="tanggal"></span>
            </div>
        </div>

        <!-- STATISTIK -->
        <div class="stats">

            <div class="stat-card">
                <div class="stat-icon blue">⚗</div>
                <div>
                    <div class="stat-text">Total Laboratorium</div>
                    <div class="stat-number">4</div>
                    <div class="stat-description">Laboratorium tersedia</div>
                </div>
            </div>

            <div class="stat-card">
                <div class="stat-icon green">▣</div>
                <div>
                    <div class="stat-text">Reservasi Saya</div>
                    <div class="stat-number">2</div>
                    <div class="stat-description">Reservasi aktif</div>
                </div>
            </div>

            <div class="stat-card">
                <div class="stat-icon orange">◷</div>
                <div>
                    <div class="stat-text">Menunggu Konfirmasi</div>
                    <div class="stat-number">1</div>
                    <div class="stat-description">Perlu persetujuan</div>
                </div>
            </div>

            <div class="stat-card">
                <div class="stat-icon purple">✓</div>
                <div>
                    <div class="stat-text">Reservasi Selesai</div>
                    <div class="stat-number">3</div>
                    <div class="stat-description">Reservasi selesai</div>
                </div>
            </div>

        </div>

        <!-- LABORATORIUM -->
        <div class="section">

            <div class="section-header">
                <h2>Laboratorium Berdasarkan Program Studi</h2>
                <a href="/laboratorium">Lihat Semua →</a>
            </div>

            <div class="lab-grid">

                <!-- TEKNIK INFORMATIKA -->
                <div class="lab-card">

                    <div class="lab-banner banner-ti">
                        💻
                    </div>

                    <div class="lab-info">
                        <h3>Laboratorium Teknik Informatika</h3>

                        <span class="department">
                            Teknik Informatika
                        </span>

                        <p>
                            Laboratorium untuk pemrograman, pengembangan aplikasi,
                            praktikum web, dan pengembangan perangkat lunak.
                        </p>

                        <div class="lab-details">
                            <span>♙ Kapasitas 30 orang</span>
                            <span>⌖ Gedung A, Lantai 2</span>
                        </div>

                        <a href="/reservasi" class="lab-button">
                            Lihat Detail →
                        </a>
                    </div>

                </div>

                <!-- SISTEM INFORMASI -->
                <div class="lab-card">

                    <div class="lab-banner banner-si">
                        📊
                    </div>

                    <div class="lab-info">
                        <h3>Laboratorium Sistem Informasi</h3>

                        <span class="department">
                            Sistem Informasi
                        </span>

                        <p>
                            Laboratorium untuk basis data, analisis sistem,
                            pengolahan data, dan perancangan sistem informasi.
                        </p>

                        <div class="lab-details">
                            <span>♙ Kapasitas 25 orang</span>
                            <span>⌖ Gedung A, Lantai 1</span>
                        </div>

                        <a href="/reservasi" class="lab-button">
                            Lihat Detail →
                        </a>
                    </div>

                </div>

                <!-- TRK -->
                <div class="lab-card">

                    <div class="lab-banner banner-trk">
                        🖥️
                    </div>

                    <div class="lab-info">
                        <h3>Laboratorium Teknologi Rekayasa Komputer</h3>

                        <span class="department">
                            Teknologi Rekayasa Komputer
                        </span>

                        <p>
                            Laboratorium untuk jaringan komputer, sistem komputer,
                            perangkat keras, mikrokontroler, dan IoT.
                        </p>

                        <div class="lab-details">
                            <span>♙ Kapasitas 20 orang</span>
                            <span>⌖ Gedung B, Lantai 2</span>
                        </div>

                        <a href="/reservasi" class="lab-button">
                            Lihat Detail →
                        </a>
                    </div>

                </div>

                <!-- ANIMASI -->
                <div class="lab-card">

                    <div class="lab-banner banner-animasi">
                        🎨
                    </div>

                    <div class="lab-info">
                        <h3>Laboratorium Animasi & Multimedia</h3>

                        <span class="department">
                            Animasi
                        </span>

                        <p>
                            Laboratorium untuk desain grafis, animasi 2D dan 3D,
                            editing video, serta produksi multimedia.
                        </p>

                        <div class="lab-details">
                            <span>♙ Kapasitas 25 orang</span>
                            <span>⌖ Gedung B, Lantai 1</span>
                        </div>

                        <a href="/reservasi" class="lab-button">
                            Lihat Detail →
                        </a>
                    </div>

                </div>

            </div>

        </div>

        <!-- RESERVASI TERBARU -->
        <div class="section">

            <div class="section-header">
                <h2>Reservasi Terbaru</h2>
                <a href="/riwayat-reservasi">Lihat Semua →</a>
            </div>

            <div style="overflow-x:auto">

                <table class="reservation-table">

                    <thead>
                        <tr>
                            <th>Laboratorium</th>
                            <th>Tanggal</th>
                            <th>Waktu</th>
                            <th>Keperluan</th>
                            <th>Status</th>
                        </tr>
                    </thead>

                    <tbody>

                        <tr>
                            <td>Lab Teknik Informatika</td>
                            <td>12 Nov 2024</td>
                            <td>08.00 - 10.00</td>
                            <td>Praktikum Pemrograman Web</td>
                            <td><span class="badge confirmed">Dikonfirmasi</span></td>
                        </tr>

                        <tr>
                            <td>Lab Sistem Informasi</td>
                            <td>7 Nov 2024</td>
                            <td>10.00 - 12.00</td>
                            <td>Praktikum Basis Data</td>
                            <td><span class="badge pending">Menunggu</span></td>
                        </tr>

                        <tr>
                            <td>Lab Animasi & Multimedia</td>
                            <td>5 Nov 2024</td>
                            <td>13.00 - 15.00</td>
                            <td>Praktikum Animasi 3D</td>
                            <td><span class="badge completed">Selesai</span></td>
                        </tr>

                    </tbody>

                </table>

            </div>

        </div>

        <!-- INFORMASI -->
        <div class="info-box">

            <div class="info-icon">ⓘ</div>

            <div>
                <h3>Informasi</h3>
                <p>
                    Pastikan Anda melakukan reservasi sesuai dengan jadwal
                    laboratorium dan ketentuan yang berlaku.
                </p>
            </div>

        </div>

    </section>

</main>

<script>
    // Menampilkan tanggal
    const tanggal = new Date();

    document.getElementById("tanggal").textContent =
        tanggal.toLocaleDateString("id-ID", {
            weekday: "long",
            day: "numeric",
            month: "long",
            year: "numeric"
        });
</script>

</body>
</html>
