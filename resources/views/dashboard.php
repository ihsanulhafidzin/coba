<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<style>
    /* Reset CSS */
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    body {
        font-family: Arial, sans-serif;
        background-color: #f4f4f4;
    }

    .container {
        display: flex;
        height: 100vh;
    }

    .sidebar {
        width: 250px;
        background-color: #333;
        color: #fff;
    }

    .header {
        padding: 30px;
        text-align: center;
        border-bottom: 1px solid #555;
    }

    .header h2 {
        font-size: 1.5rem;
        margin-bottom: 10px;
    }

    .menu {
        padding: 20px;
    }

    .menu ul {
        list-style: none;
    }

    .menu ul li {
        margin-bottom: 15px;
        border-bottom: 1px solid #555;
        padding-bottom: 10px;
    }

    .menu ul li a {
        color: #fff;
        text-decoration: none;
        display: flex;
        align-items: center;
        transition: all 0.3s ease;
        padding: 10px 0;
    }

    .menu ul li a:hover {
        background-color: #555;
    }

    .menu ul li a i {
        margin-right: 10px;
    }

    .menu ul li a .fa-chevron-down {
        margin-left: auto;
    }

    .menu ul li ul {
        display: none;
        margin-left: 20px;
        padding-left: 10px;
        /* padding untuk indentasi */
    }

    .menu ul li:hover ul {
        display: block;
    }

    .menu ul li ul li {
        margin-bottom: 5px;
        padding-bottom: 5px;
    }

    .menu ul li ul li a {
        padding: 5px 0;
    }

    .menu ul li ul li a i {
        font-size: 16px;
        /* Adjust size if needed */
    }

    .main-content {
        flex: 1;
        padding: 20px;
        overflow-y: auto;
    }

    .totals {
        display: flex;
        justify-content: space-around;
        flex-wrap: wrap;
        /* Allows wrapping on smaller screens */
        margin-top: 20px;
    }

    .column {
        background: #fff;
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        width: 45%;
        text-align: center;
        margin: 10px 0;
        /* Margin for responsiveness */
    }

    .column h2 {
        margin-bottom: 20px;
    }

    /* Styles for icons */
    .fa {
        font-size: 20px;
        width: 20px;
    }

    #clock,
    #calendar {
        position: relative;
        /* Menggunakan posisi absolut untuk mengatur posisi elemen */
        top: 10px;
        /* Mengatur jarak dari bagian atas halaman */
        right: -25px;
        /* Mengatur jarak dari sisi kanan halaman */
        padding: 3px;
    }


    .chart-container {
        position: relative;
        /* Menetapkan posisi relatif */
        width: 700px;
        /* Lebar chart */
        height: 400px;
        /* Tinggi chart */
        margin: auto;
        /* Membuat chart berada di tengah */
        z-index: 1;
        /* Memastikan chart dapat diakses */
        opacity: 0.9;
        /* Menetapkan transparansi */
        margin-top: -400px;
    }

    .chart-container button {
        position: absolute;
        /* Menetapkan posisi absolut untuk tombol */
        top: 10px;
        /* Atur jarak tombol dari bagian atas */
        right: 10px;
        /* Atur jarak tombol dari bagian kanan */
        z-index: 2;
        /* Pastikan tombol berada di atas chart */
    }
</style>

<body>
    <div class="container">
        <div class="sidebar">
            <div class="header">
                <h2>Dashboard</h2>
            </div>
            <div class="menu">
                <ul>
                    <li class="selected">
                        <a href="#"><i class="fa fa-mobile fa-2x"></i> Handphone <i class="fa fa-chevron-down"></i></a>
                        <ul class="submenu-content">
                            <li><a href="{{route('handphones.index')}}"><i class="fa fa-plus"></i> Tambah</a></li>
                            <li><a href="{{route('handphones.create')}}"><i class="fa fa-eye"></i> Lihat</a></li>
                        </ul>
                    </li>
                    <li class="selected">
                        <a href="#"><i class="fa fa-laptop"></i> Type <i class="fa fa-chevron-down"></i></a>
                        <ul class="submenu-content">
                            <li><a href="{{route('handphones.index')}}"><i class="fa fa-plus"></i> Tambah</a></li>
                            <li><a href="{{route('handphones.create')}}"><i class="fa fa-eye"></i> Lihat</a></li>
                        </ul>
                    </li>
                    <li class="selected">
                        <a href="#"><i class="fa fa-cogs"></i> Setting <i class="fa fa-chevron-down"></i></a>
                        <ul class="submenu-content">
                            <li><a href="{{ route('logout') }}"><i class="fa fa-sign-out"></i> Logout</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
        <div class="main-content">

            <div id="calendar"></div>

            <!-- Real-time Clock -->
            <div id="clock"></div>
            <div class="totals">
                <div class="column">
                    <h2>Handphone</h2>
                    <p id="total-handphones">0</p>
                </div>
                <div class="column">
                    <h2>Type</h2>
                    <p id="total-types">0</p>
                </div>
            </div>
        </div>
    </div>
    <div class="chart-container">
        <canvas id="myChart"></canvas>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            fetch('https://example.com/api/totals')
                .then(response => response.json())
                .then(data => {
                    document.getElementById('total-handphones').innerText = data.totalHandphones;
                    document.getElementById('total-types').innerText = data.totalTypes;
                })
                .catch(error => console.error('Error fetching data:', error));
        });

        function showClock() {
            const now = new Date();
            const hours = now.getHours().toString().padStart(2, '0');
            const minutes = now.getMinutes().toString().padStart(2, '0');
            const seconds = now.getSeconds().toString().padStart(2, '0');
            document.getElementById('clock').textContent = `${hours}:${minutes}:${seconds}`;
        }

        // Function to display real-time calendar
        function showCalendar() {
            const now = new Date();
            const options = {
                weekday: 'short',
                year: 'numeric',
                month: 'short',
                day: 'numeric'
            };
            document.getElementById('calendar').textContent = now.toLocaleDateString('en-US', options);
        }

        // Update clock and calendar every second
        setInterval(() => {
            showClock();
            showCalendar();
        }, 1000);

        // Initial display
        showClock();
        showCalendar();
        const chartData = {
            labels: ['January', 'February', 'March', 'April', 'May', 'June'],
            datasets: [{
                label: 'Handphone',
                backgroundColor: 'rgba(255, 99, 132, 0.2)',
                borderColor: 'rgba(255, 99, 132, 1)',
                borderWidth: 1,
                data: [0, 10, 5, 2, 20, 30] // Data contoh jumlah handphone
            }, {
                label: 'Type',
                backgroundColor: 'rgba(54, 162, 235, 0.2)',
                borderColor: 'rgba(54, 162, 235, 1)',
                borderWidth: 1,
                data: [5, 15, 10, 8, 25, 35] // Data contoh jumlah type
            }]
        };

        // Membuat grafik menggunakan Chart.js
        const ctx = document.getElementById('myChart').getContext('2d');
        const myChart = new Chart(ctx, {
            type: 'bar',
            data: chartData,
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                }
            }
        });
    </script>
</body>

</html>