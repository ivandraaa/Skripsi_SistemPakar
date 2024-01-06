<!-- resources/views/auth-error.blade.php -->

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Akses Ditolak</title>
    <!-- Tambahkan stylesheet atau CDN lainnya untuk styling -->
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            text-align: center;
            padding: 50px;
        }

        .error-container {
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            max-width: 600px;
            margin: 0 auto;
        }

        h1 {
            color: #d9534f;
        }

        p {
            color: #333;
        }

        .btn {
            display: inline-block;
            margin-top: 20px;
            padding: 10px 20px;
            background-color: #009244;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s;
        }

        .btn:hover {
            background-color: #00391b;
        }
    </style>
</head>

<body>
    <div class="error-container">
        <h1>Akses Ditolak</h1>
        <p>Hanya admin yang diizinkan mengakses Halaman ini. Silakan masuk sebagai admin untuk melanjutkan.</p>

        @auth
            <!-- Tambahkan logout pada klik -->
            <button class="btn" onclick="confirmLogout()">Logout dan Kembali ke Halaman Awal</button>
        @endauth

        <script>
            function confirmLogout() {
                // Tampilkan modal konfirmasi
                if (confirm('Apakah Anda yakin ingin logout?')) {
                    logoutAndRedirect(); // Jika pengguna mengonfirmasi, lakukan logout
                }
                // Jika pengguna membatalkan, tidak melakukan apa-apa
            }

            function logoutAndRedirect() {
                // Kirim permintaan logout ke server
                fetch('/logout', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    },
                    credentials: 'same-origin',
                })
                .then(response => response.json())
                .then(data => {
                    alert(data.message);
                    window.location.href = '/';
                })
                .catch(error => {
                    console.error('Error during logout:', error);
                    window.location.href = '/';
                });
            }
        </script>
    </div>
</body>

</html>