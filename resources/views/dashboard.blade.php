<!DOCTYPE html>
<html>
<head>
    <title>mini IoT</title>
    <style>
        /* CSS kotak-kotak biasa biar ga ribet */
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            padding: 20px;
        }
        .header {
            background-color: #333;
            color: white;
            padding: 10px;
            text-align: center;
            margin-bottom: 20px;
        }
        .kotak-container {
            display: flex;
            gap: 15px;
            margin-bottom: 20px;
        }
        .kotak {
            background-color: white;
            border: 1px solid #ccc;
            padding: 15px;
            flex: 1;
            text-align: center;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            background-color: white;
        }
        th, td {
            border: 1px solid #888;
            padding: 10px;
            text-align: center;
        }
        th {
            background-color: #ddd;
        }
    </style>
</head>
<body>

    <div class="header">
        <h1>Monitoring Sensor</h1>
    </div>

    <div class="kotak-container">
        <div class="kotak">
            <h3>Total Device</h3>
            <h2 id="total_devices">0</h2>
        </div>
        <div class="kotak">
            <h3>Suhu Terakhir</h3>
            <h2 id="suhu">0 °C</h2>
        </div>
        <div class="kotak">
            <h3>Kelembaban</h3>
            <h2 id="kelembaban">0 %</h2>
        </div>
        <div class="kotak">
            <h3>Update Terakhir</h3>
            <p id="waktu_update">-</p>
        </div>
    </div>

    <h2>Riwayat Data</h2>
    <table>
        <thead>
            <tr>
                <th>Waktu Masuk</th>
                <th>ID Device</th>
                <th>Suhu</th>
                <th>Kelembaban</th>
                <th>pH Air</th>
                <th>TDS (PPM)</th>
            </tr>
        </thead>
        <tbody id="tabel-body">
            <tr>
                <td colspan="6">Memuat data sensor...</td>
            </tr>
        </tbody>
    </table>

    <script>
        // 1. Narik data buat ngisi kotak-kotak di atas
        fetch('/api/dashboard/summary')
            .then(function(res) {
                return res.json();
            })
            .then(function(data) {
                // Masukin hasil data API ke teks HTML
                document.getElementById('total_devices').innerHTML = data.total_devices;
                document.getElementById('suhu').innerHTML = data.latest_temperature + " °C";
                document.getElementById('kelembaban').innerHTML = data.latest_humidity + " %";
                document.getElementById('waktu_update').innerHTML = data.last_update;
            });

        // 2. Narik data buat ngisi baris tabel riwayat
        fetch('/api/sensorReadings')
            .then(function(res) {
                return res.json();
            })
            .then(function(respon) {
                var listData = respon.data;
                var barisTabel = '';

                // Pakai perulangan for biasa khas anak sekolahan baru belajar JS
                for (var i = 0; i < listData.length; i++) {
                    barisTabel += '<tr>';
                    barisTabel += '<td>' + listData[i].created_at + '</td>';
                    barisTabel += '<td>' + listData[i].device_id + '</td>';
                    barisTabel += '<td>' + listData[i].temperature + ' °C</td>';
                    barisTabel += '<td>' + listData[i].humidity + ' %</td>';
                    barisTabel += '<td>' + listData[i].ph + '</td>';
                    barisTabel += '<td>' + listData[i].tds + '</td>';
                    barisTabel += '</tr>';
                }

                // Ganti tulisan "Memuat data sensor..." jadi baris data asli
                document.getElementById('tabel-body').innerHTML = barisTabel;
            });
    </script>

</body>
</html>