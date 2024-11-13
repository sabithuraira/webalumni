<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    @vite('resources/css/app.css')
    @vite('resources/js/app.js')
    <link rel="icon" href="/img/haisstis.png" type="image/png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>

<body class="bg-[#F5F7FA]">
    @include('user.navbar')

    <div class="mt-4 w-[1200px] mx-auto">
        <div class="row d-flex align-items-stretch">
            <!-- Total Kas -->
            <div class="col-md-2 justify-center rounded-[12px]">
                <div class="card border-0 shadow-sm text-[#343C6A] bg-[#FFFFFF] h-100">
                    <div class="card-body d-flex flex-column justify-center align-items-center text-center">
                        <h5 class="card-title font-bold w-full text-center border-b-2 pb-1">Total Kas</h5>
                        <p class="card-text text-[25px] my-auto">{{ number_format($total, 0, ',', '.') }}</p>
                    </div>
                </div>
            </div>

            <!-- Alumni Aktif -->
            <div class="col-md-2 justify-center rounded-[12px]">
                <div class="card border-0 shadow-sm text-[#343C6A] bg-[#FFFFFF] h-100">
                    <div class="card-body d-flex flex-column justify-center align-items-center text-center">
                        <h5 class="card-title font-bold w-full text-center border-b-2 pb-1">Alumni Aktif</h5>
                        <p class="card-text text-[25px] my-auto">{{ number_format($aktif, 0, ',', '.') }}</p>
                    </div>
                </div>
            </div>

            <!-- Alumni Pensiun -->
            <div class="col-md-2 justify-center rounded-[12px]">
                <div class="card border-0 shadow-sm text-[#343C6A] bg-[#FFFFFF] h-100">
                    <div class="card-body d-flex flex-column justify-center align-items-center text-center">
                        <h5 class="card-title font-bold w-full text-center border-b-2 pb-1">Alumni Pensiun</h5>
                        <p class="card-text text-[25px] my-auto">{{ number_format($pensiun, 0, ',', '.') }}</p>
                    </div>
                </div>
            </div>

            <!-- Pie Jenis Kelamin -->
            <div class="col-md-3 justify-center rounded-[12px]">
                <div class="card border-0 shadow-sm text-white p-2 bg-[#FFFFFF] h-100">
                    <canvas id="jenisKelaminPie" height="150px"></canvas>
                </div>
            </div>

            <!-- Pie Unit Kerja -->
            <div class="col-md-3 justify-center rounded-[12px]">
                <div class="card border-0 shadow-sm text-white p-2 bg-[#FFFFFF] h-100">
                    <canvas id="unitKerjaPie" height="150px"></canvas>
                </div>
            </div>
        </div>
    </div>

    <!-- Bar Angkatan -->
    <div class="bg-[#FFFFFF] my-4 w-[1200px] mx-auto shadow-sm rounded-[12px] p-2">
        <canvas id="angkatanBar" height="290px"></canvas>
    </div>

    <script>
        // jenisKelaminPie
        var getJkPie = document.getElementById('jenisKelaminPie').getContext('2d');
        var jkData = new Chart(getJkPie, {
            type: 'pie',
            data: {
                labels: ['Laki-laki', 'Perempuan'],
                datasets: [{
                    data: [
                        @json($jkData['data'][array_search('Laki-laki', $jkData['labels'])]),
                        @json($jkData['data'][array_search('Perempuan', $jkData['labels'])])
                    ],
                    backgroundColor: ['#4C8CFF', '#FF6384'],
                    hoverBackgroundColor: ['#4C8CFF', '#FF6384'],
                    hoverBorderWidth: 0
                }]
            },
            options: {
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        display: true,
                        position: 'bottom',
                        labels: {
                            boxWidth: 20
                        },
                        onClick: (event) => {
                            event.stopImmediatePropagation();
                        }
                    },
                    tooltip: {
                        enabled: false
                    },
                }
            }
        });

        // unitKerjaPie
        var getUkPie = document.getElementById('unitKerjaPie').getContext('2d');
        var regionData = new Chart(getUkPie, {
            type: 'pie',
            data: {
                labels: ['Sumsel', 'Lainnya'],
                datasets: [{
                    data: [
                        @json($regionData['data'][array_search('Sumsel', $regionData['labels'])]),
                        @json($regionData['data'][array_search('Lainnya', $regionData['labels'])])
                    ],
                    backgroundColor: ['#4C8CFF', '#FF6384'],
                    hoverBackgroundColor: ['#4C8CFF', '#FF6384'],
                    hoverBorderWidth: 0
                }]
            },
            options: {
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        display: true,
                        position: 'bottom',
                        labels: {
                            boxWidth: 20
                        },
                        onClick: (event) => {
                            event.stopImmediatePropagation();
                        }
                    },
                    tooltip: {
                        enabled: false
                    }
                }
            }
        });

        // angkatanBar
        var angkatanCtx = document.getElementById('angkatanBar').getContext('2d');
        var angkatanBar = new Chart(angkatanCtx, {
            type: 'bar',
            data: {
                labels: @json($aktData['labels']),
                datasets: [{
                    label: 'Total Alumni per Angkatan',
                    data: @json($aktData['data']),
                    backgroundColor: '#4C8CFF',
                    hoverBackgroundColor: '#1D4ED8',
                    borderColor: '#4C8CFF',
                    borderWidth: 0,
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                scales: {
                    y: {
                        beginAtZero: true,
                        ticks: {
                            precision: 0,
                            stepSize: 1,
                        },
                        suggestedMax: 10,
                    }
                },
                plugins: {
                    legend: {
                        display: false,
                    },
                    tooltip: {
                        enabled: false,
                    },
                    hover: {
                        mode: 'index',
                    }
                }
            }
        });
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
