
# Mini Backend IoT

Tech stack = PHP dengan Laravel framework
Database = MySql
Fetch API = HTML, CSS, JS

# Cara menjalankan Project
1. Buat database baru (contoh : db_miniiot)
2. Ubah koneksi database di .env
3. Buat table database (lalu di migrate)
4. Buat code API
5. Jalankan API di Postman<br>
   <h3>Daftar API Endpoint</h3>
   
   1. GET /api/devices : Lihat daftar semua perangkat terdaftar
   ![alt text](<Screenshot 2026-06-08 151353-1.png>)

   2. POST /api/devices : Daftarkan device baru
   ![alt text](<Screenshot 2026-06-08 151423.png>)

   3. GET /api/sensorReadings : Ambil semua riwayat data sensor
   ![alt text](<Screenshot 2026-06-08 151449.png>)

   4. POST /api/sensorReadings : Simpan data sensor baru
   ![alt text](<Screenshot 2026-06-08 151511.png>)

   5. GET /api/sensorReadings/latest : Ambil data sensor paling baru
   ![alt text](<Screenshot 2026-06-08 151532.png>)


   6. GET /api/dashboarad/summary : Ambil ringkasan data untuk dashboard
   ![alt text](<Screenshot 2026-06-08 151532-1.png>)

6. Lihat hasil di halaman dashboard http://127.0.0.1:8000/dashboard
![alt text](<Screenshot 2026-06-08 151702.png>)

