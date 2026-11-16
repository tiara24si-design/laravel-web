<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Politeknik Caltex Riau</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }

      body {
    min-height: 100vh;
    display: flex;
    justify-content: center;
    align-items: center;
    background: white;
}

/* Background utama */
.container {
    width: 100%;
    max-width: 900px;
    height: 600px;
    position: relative;
    overflow: hidden;
    display: flex;
    justify-content: center;
    align-items: center;
    background: linear-gradient(
        120deg,
        #edf5fd,
        #ffffff,
        #edf5fd
    );
}

/* Lengkungan kiri atas */
.circle-top {
    position: absolute;
    width: 350px;
    height: 350px;
    background: #e2eefb;
    border-radius: 50%;
    top: -195px;
    left: -180px;
}

/* Lengkungan kanan bawah */
.circle-bottom {
    position: absolute;
    width: 500px;
    height: 230px;
    background: #e2eefb;
    border-radius: 50%;
    bottom: -150px;
    right: -110px;
    transform: rotate(-22deg);
}

/* Konten login */
.login-content {
    width: 340px;
    position: relative;
    z-index: 2;
    text-align: center;
}

/* Logo */
.logo {
    font-size: 22px;
    font-weight: bold;
    font-style: italic;
    color: #164d6b;
    margin-bottom: 28px;
}

/* Kotak login */
.login-box {
    width: 340px;
    height: auto;
    background: white;
    padding: 28px 25px;
    border-radius: 7px;
    box-shadow: 0 4px 18px rgba(42,83,130,0.07);
}

.login-box h2 {
    font-size: 19px;
    color: #304c70;
    margin-bottom: 8px;
}

.subtitle {
    font-size: 11px;
    color: #a0aebe;
    margin-bottom: 22px;
}

/* Input */
.input-group {
    position: relative;
    margin-bottom: 12px;
}

.input-group input {
    width: 100%;
    height: 36px;
    border: 1px solid #e3e9f0;
    border-radius: 5px;
    padding: 0 35px;
    font-size: 11px;
    outline: none;
}

.input-icon {
    position: absolute;
    left: 12px;
    top: 11px;
    font-size: 12px;
    color: #8194aa;
}

.eye {
    position: absolute;
    right: 12px;
    top: 10px;
    font-size: 12px;
    cursor: pointer;
    color: #8194aa;
}

/* Pilihan pengguna */
.role-title {
    text-align: left;
    font-size: 11px;
    color: #52647b;
    margin-top: 17px;
    margin-bottom: 10px;
}

.role-group {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 22px;
    font-size: 11px;
    color: #52647b;
}

.role-group input {
    accent-color: #2862b7;
}

/* Tombol */
.btn-login {
    width: 100%;
    height: 36px;
    border: none;
    border-radius: 5px;
    background: #2861b8;
    color: white;
    font-size: 11px;
    cursor: pointer;
}

/* Footer */
.footer {
    margin-top: 65px;
    font-size: 9px;
    color: #9baec2;
}

        @media (max-width: 403px) {
            .container {
                width: 100%;
            }
        }
    </style>
</head>

<body>

<div class="container">

    <div class="circle-top"></div>
    <div class="circle-bottom"></div>

    <div class="login-content">

        <div class="logo">
            <span>⌒</span> Politeknik Caltex Riau
        </div>

        <div class="login-box">

            <h2>Selamat Datang</h2>

            <div class="subtitle">
                Silakan masuk untuk melanjutkan ke sistem
            </div>

            <form>

                <div class="input-group">
                    <span class="input-icon">♙</span>
                    <input type="text"
                           placeholder="Email atau Username">
                </div>

                <div class="input-group">
                    <span class="input-icon">♙</span>
                    <input type="password"
                           id="password"
                           placeholder="Password">

                    <span class="eye"
                          onclick="togglePassword()">◉</span>
                </div>

                <div class="role-title">
                    Pilih Jenis Pengguna
                </div>

                <div class="role-group">

                    <label>
                        <input type="radio"
                               name="role"
                               value="mahasiswa"
                               checked>
                        Mahasiswa
                    </label>

                    <label>
                        <input type="radio"
                               name="role"
                               value="dosen">
                        Dosen
                    </label>

                    <label>
                        <input type="radio"
                               name="role"
                               value="admin">
                        Admin
                    </label>

                </div>

                <button type="button" class="btn-login">
                    Masuk
                </button>

            </form>

        </div>

        <div class="footer">
            Politeknik Caltex Riau | Sistem Informasi Akademik
        </div>

    </div>

</div>

<script>
    function togglePassword() {
        const password = document.getElementById("password");

        password.type =
            password.type === "password" ? "text" : "password";
    }
</script>

</body>
</html>
