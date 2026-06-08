# Mini Backend IoT - Monitoring Hidroponik

Tech stack = PHP dengan Laravel framework
Database = MySql
Fetch API = HTML, CSS, JS

# Cara menjalankan Project
1. Buat database baru (contoh : db_miniiot)
2. Ubah koneksi database di .env
3. Buat table database (lalu di migrate)
4. Buat code API
5. Jalankan API di Postman
   > Daftar API Endpoint 
   1. GET /api/devices : Lihat daftar semua perangkat terdaftar
   2. POST /api/devices : Daftarkan device baru
   3. GET /api/sensorReadings : Ambil semua riwayat data sensor
   4. POST /api/sensorReadings : Simpan data sensor baru
   5. GET /api/sensorReadings/latest : Ambil data sensor paling baru
   6. GET /api/dashboarad/summary : Ambil ringkasan data untuk dashboard
6. Lihat hasil di halaman dashboard http://127.0.0.1:8000/dashboard