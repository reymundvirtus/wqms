@extends('layouts.defaultLayout')

@section('title')
    WQMS - Analytics
@endsection

@section('content')
    <div class="clearfix"></div>

    <div class="content-wrapper">
        <div class="container-fluid">

            <!--Start Dashboard Content-->
            <h4 class="sidebar-header">DATA ANALYTICS</h4>

            <div class="row">
                <div class="col-6 col-lg-6 col-xl-6">
                    <div class="card">

                        {{-- for temperature value --}}
                        <div class="card-header">Temperature in Celsius
                            <div class="card-action">
                                <div class="dropdown">
                                    <a href="javascript:void();" class="dropdown-toggle dropdown-toggle-nocaret"
                                        data-toggle="dropdown">
                                        <i class="icon-options"></i>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <a class="dropdown-item" href="javascript:void();">Action</a>
                                        <a class="dropdown-item" href="javascript:void();">Another action</a>
                                        <a class="dropdown-item" href="javascript:void();">Something else here</a>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="javascript:void();">Separated link</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="chart-container-1">
                                <canvas id="tempChart"></canvas>
                            </div>
                        </div>

                        <div class="row m-0 row-group text-center border-top border-light-3">
                            <div class="col-12 col-lg-4">
                                <div class="p-3" id="currentTemp">

                                </div>
                            </div>
                            <div class="col-12 col-lg-4">
                                <div class="p-3" id="indicator">

                                </div>
                            </div>
                            <div class="col-12 col-lg-4">
                                <div class="p-3" id="recommendation">

                                </div>
                            </div>
                        </div>

                        {{-- for moisture value --}}
                        <div class="card-header">Moisture
                            <div class="card-action">
                                <div class="dropdown">
                                    <a href="javascript:void();" class="dropdown-toggle dropdown-toggle-nocaret"
                                        data-toggle="dropdown">
                                        <i class="icon-options"></i>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <a class="dropdown-item" href="javascript:void();">Action</a>
                                        <a class="dropdown-item" href="javascript:void();">Another action</a>
                                        <a class="dropdown-item" href="javascript:void();">Something else here</a>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="javascript:void();">Separated link</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="chart-container-1">
                                <canvas id="moistChart"></canvas>
                            </div>
                        </div>

                        <div class="row m-0 row-group text-center border-top border-light-3">
                            <div class="col-12 col-lg-4">
                                <div class="p-3" id="currentMoist">

                                </div>
                            </div>
                            <div class="col-12 col-lg-4">
                                <div class="p-3" id="indicatorMoist">

                                </div>
                            </div>
                            <div class="col-12 col-lg-4">
                                <div class="p-3" id="recommendationMoist">

                                </div>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="col-6 col-lg-6 col-xl-6">
                    <div class="card">

                        {{-- for pH value --}}
                        <div class="card-header">pH Value
                            <div class="card-action">
                                <div class="dropdown">
                                    <a href="javascript:void();" class="dropdown-toggle dropdown-toggle-nocaret"
                                        data-toggle="dropdown">
                                        <i class="icon-options"></i>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <a class="dropdown-item" href="javascript:void();">Action</a>
                                        <a class="dropdown-item" href="javascript:void();">Another action</a>
                                        <a class="dropdown-item" href="javascript:void();">Something else here</a>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="javascript:void();">Separated link</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="chart-container-1">
                                <canvas id="pHChart"></canvas>
                            </div>
                        </div>

                        <div class="row m-0 row-group text-center border-top border-light-3">
                            <div class="col-12 col-lg-4">
                                <div class="p-3" id="currentPh">

                                </div>
                            </div>
                            <div class="col-12 col-lg-4">
                                <div class="p-3" id="indicatorPh">

                                </div>
                            </div>
                            <div class="col-12 col-lg-4">
                                <div class="p-3" id="recommendationPh">

                                </div>
                            </div>
                        </div>

                        {{-- for salanity value --}}
                        <div class="card-header">Salinity
                            <div class="card-action">
                                <div class="dropdown">
                                    <a href="javascript:void();" class="dropdown-toggle dropdown-toggle-nocaret"
                                        data-toggle="dropdown">
                                        <i class="icon-options"></i>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <a class="dropdown-item" href="javascript:void();">Action</a>
                                        <a class="dropdown-item" href="javascript:void();">Another action</a>
                                        <a class="dropdown-item" href="javascript:void();">Something else here</a>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="javascript:void();">Separated link</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="chart-container-1">
                                <canvas id="salChart"></canvas>
                            </div>
                        </div>

                        <div class="row m-0 row-group text-center border-top border-light-3">
                            <div class="col-12 col-lg-4">
                                <div class="p-3" id="currentSal">

                                </div>
                            </div>
                            <div class="col-12 col-lg-4">
                                <div class="p-3" id="indicatorSal">

                                </div>
                            </div>
                            <div class="col-12 col-lg-4">
                                <div class="p-3" id="recommendationSal">

                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <!--End Row-->

            <!--start overlay-->
            <div class="overlay toggle-menu" style="background-color: rgba(255, 255, 255, 0.438)"></div>
            <div class="overlay toggle-menu" style="background-color: rgba(255, 0, 0, 0.562)"></div>
            <div class="overlay toggle-menu" style="background-color: rgba(255, 238, 0, 0.562)"></div>
            <div class="overlay toggle-menu" style="background-color: rgba(1, 255, 77, 0.562)"></div>
            <!--end overlay-->

        </div>
        <!-- End container-fluid-->

    </div>
    <!--End content-wrapper-->

    <script src="js/jquery.min.js"></script>
    <script src="plugins/Chart.js/Chart.min.js"></script>
    <script>
        //? for temperature
        var ctx = document.getElementById('tempChart').getContext('2d');

        var myChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: ["Temp"],
                datasets: [{
                    label: 'Temperature',
                    data: [],
                    backgroundColor: 'rgba(255, 255, 255, 0.350)',
                    borderColor: '#fff',
                    pointRadius: "0",
                    borderWidth: 3
                }]
            },
            options: {
                maintainAspectRatio: false,
                legend: {
                    display: false,
                    labels: {
                        fontColor: '#ddd',
                        boxWidth: 40
                    }
                },
                tooltips: {
                    displayColors: false
                },
                scales: {
                    xAxes: [{
                        ticks: {
                            beginAtZero: true,
                            fontColor: '#ddd'
                        },
                        gridLines: {
                            display: true,
                            color: "rgba(221, 221, 221, 0.08)"
                        },
                    }],
                    yAxes: [{
                        ticks: {
                            beginAtZero: true,
                            fontColor: '#ddd'
                        },
                        gridLines: {
                            display: true,
                            color: "rgba(221, 221, 221, 0.08)"
                        },
                    }]
                },
            },
        });

        //? for pH
        var ctx1 = document.getElementById('pHChart').getContext('2d');

        var myChart1 = new Chart(ctx1, {
            type: 'line',
            data: {
                labels: [],
                datasets: [{
                    label: 'pH',
                    data: [],
                    backgroundColor: 'rgba(255, 255, 255, 0.350)',
                    borderColor: "#fff",
                    pointRadius: "0",
                    borderWidth: 3
                }]
            },
            options: {
                maintainAspectRatio: false,
                legend: {
                    display: false,
                    labels: {
                        fontColor: '#ddd',
                        boxWidth: 40
                    }
                },
                tooltips: {
                    displayColors: false
                },
                scales: {
                    xAxes: [{
                        ticks: {
                            beginAtZero: true,
                            fontColor: '#ddd'
                        },
                        gridLines: {
                            display: true,
                            color: "rgba(221, 221, 221, 0.08)"
                        },
                    }],
                    yAxes: [{
                        ticks: {
                            beginAtZero: true,
                            fontColor: '#ddd'
                        },
                        gridLines: {
                            display: true,
                            color: "rgba(221, 221, 221, 0.08)"
                        },
                    }]
                }

            }
        });

        //? for moisture
        var ctx2 = document.getElementById('moistChart').getContext('2d');

        var myChart2 = new Chart(ctx2, {
            type: 'line',
            data: {
                labels: [],
                datasets: [{
                    label: 'Moisture',
                    data: [],
                    backgroundColor: 'rgba(255, 255, 255, 0.350)',
                    borderColor: "#fff",
                    pointRadius: "0",
                    borderWidth: 3
                }]
            },
            options: {
                maintainAspectRatio: false,
                legend: {
                    display: false,
                    labels: {
                        fontColor: '#ddd',
                        boxWidth: 40
                    }
                },
                tooltips: {
                    displayColors: true,
                },
                scales: {
                    xAxes: [{
                        ticks: {
                            beginAtZero: true,
                            fontColor: '#ddd'
                        },
                        gridLines: {
                            display: true,
                            color: "rgba(221, 221, 221, 0.08)"
                        },
                    }],
                    yAxes: [{
                        ticks: {
                            beginAtZero: true,
                            fontColor: '#ddd'
                        },
                        gridLines: {
                            display: true,
                            color: "rgba(221, 221, 221, 0.08)"
                        },
                    }]
                }

            }
        });

        //? for salanity
        var ctx3 = document.getElementById('salChart').getContext('2d');

        var myChart3 = new Chart(ctx3, {
            type: 'line',
            data: {
                labels: [],
                datasets: [{
                    label: 'Salinity',
                    data: [],
                    backgroundColor: 'rgba(255, 255, 255, 0.350)',
                    borderColor: "#fff",
                    pointRadius: "0",
                    borderWidth: 3
                }]
            },
            options: {
                maintainAspectRatio: false,
                legend: {
                    display: false,
                    labels: {
                        fontColor: '#ddd',
                        boxWidth: 40
                    }
                },
                tooltips: {
                    displayColors: true,
                },
                scales: {
                    xAxes: [{
                        ticks: {
                            beginAtZero: true,
                            fontColor: '#ddd'
                        },
                        gridLines: {
                            display: true,
                            color: "rgba(221, 221, 221, 0.08)"
                        },
                    }],
                    yAxes: [{
                        ticks: {
                            beginAtZero: true,
                            fontColor: '#ddd'
                        },
                        gridLines: {
                            display: true,
                            color: "rgba(221, 221, 221, 0.08)"
                        },
                    }]
                }

            }
        });

        getTemp()
        getTempPh()
        getTempMoist()
        getTempSal()
        currentTemp()
        currentPh()
        currentMoist()
        currentSal()
        indicator()
        indicatorPh()
        indicatorMoist()
        indicatorSal()
        recommendation()
        recommendationPh()
        recommendationMoist()
        recommendationSal()
        sendNotifTemp()
        sendNotifPh()
        sendNotifMoist()

        let id = 1

        // for temp
        function getTemp() {
            $.ajax({
                type: 'GET',
                dataType: 'json',
                url: 'tempc',
                success: function(data) {

                    myChart.data.labels.push(id++);
                    for (let i = 0; i < data.length; i++) {
                        // myChart.data.labels.push(data[i].temperature_c + "°C");
                        myChart.data.datasets[0].data.push(data[i].temperature_c);
                    }

                    myChart.update();
                    setTimeout(getTemp, 1000)
                }
            });
        }

        function currentTemp() {

            $.ajax({
                type: 'GET',
                dataType: 'json',
                url: 'tempc',
                success: function(data) {

                    let html

                    for (let i = 0; i < data.length; i++) {
                        html += '<h5 class="mb-0">' + data[i].temperature_c +
                            '°C</h5><small class="mb-0">Current Temperature</small>'
                    }

                    $('#currentTemp').html(html.substr(9))
                    setTimeout(currentTemp, 1000)
                }
            });
        }

        function indicator() {
            $.ajax({
                type: 'GET',
                dataType: 'json',
                url: 'tempc',
                success: function(data) {

                    let html

                    for (let i = 0; i < data.length; i++) {
                        if (data[i].temperature_f < 47.00 && data[i].temperature_f > 40.00) {
                            html +=
                                '<h3 class="mb-0" data-cooltipz-dir="top" data-cooltipz-size="large" aria-label="If the water temperature is too cold for tilapia, it can lead to a number of negative effects on the fish. At temperatures below 64°F (18°C), tilapia will become less active and may even stop feeding altogether. This can lead to slower growth and poor overall health. In extreme cases, prolonged exposure to cold temperatures can even cause the fish to die. Cold water can also make the fish more susceptible to disease and parasites, so it\'s important to maintain the appropriate water temperature range to ensure the tilapia remain healthy."><small class="badge badge-warning">Cold</small></h5><small class="mb-0">Indicator</small>'
                        } else if (data[i].temperature_f < 40.00) {
                            html +=
                                '<h3 class="mb-0" data-cooltipz-dir="top" data-cooltipz-size="large" aria-label="If the water temperature is too cold for tilapia, it can lead to a number of negative effects on the fish. At temperatures below 64°F (18°C), tilapia will become less active and may even stop feeding altogether. This can lead to slower growth and poor overall health. In extreme cases, prolonged exposure to cold temperatures can even cause the fish to die. Cold water can also make the fish more susceptible to disease and parasites, so it\'s important to maintain the appropriate water temperature range to ensure the tilapia remain healthy."><small class="badge badge-danger">Too Cold</small></h5><small class="mb-0">Indicator</small>'
                        } else if (data[i].temperature_f > 47.00 && data[i].temperature_f < 90.00) {
                            html +=
                                '<h3 class="mb-0" data-cooltipz-dir="top" data-cooltipz-size="medium" aria-label="Temperature is normal"><span class="badge badge-success">Normal</span></h3><small class="mb-0">Indicator</small>'
                        } else if (data[i].temperature_f > 90.00 && data[i].temperature_f < 100.00) {
                            html +=
                                '<h3 class="mb-0" data-cooltipz-dir="top" data-cooltipz-size="large" aria-label="If the water temperature is too hot for tilapia, it can also have negative effects on the fish. High temperatures can lead to stress, which can weaken the fish\'s immune system and make them more susceptible to disease. Additionally, high water temperatures can cause a decrease in oxygen levels in the water, which can lead to suffocation and death. Furthermore, high temperatures can also cause a decrease in the dissolved oxygen levels in the water, leading to a reduced growth rate and suboptimal feeding. Tilapia can tolerate a wide range of temperatures, but temperatures above 92°F (33°C) can be dangerous and will require a cooling system for the fish, such as a chiller, to maintain the optimal temperature."><small class="badge badge-warning">Warm</small></h3><small class="mb-0">Indicator</small>'
                        } else if (data[i].temperature_f > 100.00) {
                            html +=
                                '<h3 class="mb-0" data-cooltipz-dir="top" data-cooltipz-size="large" aria-label="If the water temperature is too hot for tilapia, it can also have negative effects on the fish. High temperatures can lead to stress, which can weaken the fish\'s immune system and make them more susceptible to disease. Additionally, high water temperatures can cause a decrease in oxygen levels in the water, which can lead to suffocation and death. Furthermore, high temperatures can also cause a decrease in the dissolved oxygen levels in the water, leading to a reduced growth rate and suboptimal feeding. Tilapia can tolerate a wide range of temperatures, but temperatures above 92°F (33°C) can be dangerous and will require a cooling system for the fish, such as a chiller, to maintain the optimal temperature."><small class="badge badge-danger">Too Hot</small></h5><small class="mb-0">Indicator</small>'
                        }
                    }

                    // myChart.update();
                    $('#indicator').html(html.substr(9))
                    setTimeout(indicator, 1000)
                }
            });
        }

        function recommendation() {
            $.ajax({
                type: 'GET',
                dataType: 'json',
                url: 'tempc',
                success: function(data) {

                    let html

                    for (let i = 0; i < data.length; i++) {
                        if (data[i].temperature_f < 47.00 && data[i].temperature_f > 40.00) {
                            html +=
                                '<h5 class="mb-0">Make the water warm</h5><small class="mb-0">Recommendation</small>'
                        } else if (data[i].temperature_f < 40.00) {
                            html +=
                                '<h5 class="mb-0">Replace the Water</h5><small class="mb-0">Recommendation</small>'
                        } else if (data[i].temperature_f > 47.00 && data[i].temperature_f < 90.00) {
                            html +=
                                '<h5 class="mb-0">Water is normal</h5><small class="mb-0">Rest Assured</small>'
                        } else if (data[i].temperature_f > 90.00 && data[i].temperature_f < 100.00) {
                            html +=
                                '<h5 class="mb-0">Make the water cold</h5><small class="mb-0">Recommendation</small>'
                        } else if (data[i].temperature_f > 100.00) {
                            html +=
                                '<h5 class="mb-0">Replace the Water</h5><small class="mb-0">Recommendation</small>'
                        }
                    }

                    $('#recommendation').html(html.substr(9))
                    setTimeout(recommendation, 1000)
                }
            });
        }

        function sendNotifTemp() {
            $.ajax({
                type: 'GET',
                dataType: 'json',
                url: 'tempc',
                success: function(data) {

                    let html

                    for (let i = 0; i < data.length; i++) {
                        if (data[i].temperature_f < 47.00 && data[i].temperature_f > 40.00) {
                            var subject = "Temperature Abnormal - Alert level: YELLOW"
                            var details = "Temperature value is " + data[i].temperature_f +
                                "°F. This means the water is COLD \"nobody wants to be in a cold environment\". Please check you fishpond, ASAP"
                            $.ajax({
                                type: 'POST',
                                dataType: 'json',
                                data: {
                                    subject: subject,
                                    details: details
                                },
                                url: '/api/send-notif',
                                success: function() {
                                    return 0;
                                },
                            });
                        } else if (data[i].temperature_f < 40.00) {
                            var subject = "Temperature Abnormal - Alert level: RED"
                            var details = "Temperature value is " + data[i].temperature_f +
                                "°F. This means the water is TOO COLD \"nobody wants to be in a very cold environment\". Please check you fishpond, ASAP"
                            $.ajax({
                                type: 'POST',
                                dataType: 'json',
                                data: {
                                    subject: subject,
                                    details: details
                                },
                                url: '/api/send-notif',
                                success: function() {
                                    return 0;
                                },
                            });
                        } else if (data[i].temperature_f > 90.00 && data[i].temperature_f < 100.00) {
                            var subject = "Temperature Abnormal - Alert level: YELLOW"
                            var details = "Temperature value is " + data[i].temperature_f +
                                "°F. This means the water is WARM \"nobody wants to be in a hot environment\". Please check you fishpond, ASAP"
                            $.ajax({
                                type: 'POST',
                                dataType: 'json',
                                data: {
                                    subject: subject,
                                    details: details
                                },
                                url: '/api/send-notif',
                                success: function() {
                                    return 0;
                                },
                            });
                        } else if (data[i].temperature_f > 100.00) {
                            var subject = "Temperature Abnormal - Alert level: RED"
                            var details = "Temperature value is " + data[i].temperature_f +
                                "°F. This means the water is TOO HOT \"nobody wants to be in a very hot environment\". Please check you fishpond, ASAP"
                            $.ajax({
                                type: 'POST',
                                dataType: 'json',
                                data: {
                                    subject: subject,
                                    details: details
                                },
                                url: '/api/send-notif',
                                success: function() {
                                    return 0;
                                },
                            });
                        }
                    }

                    setTimeout(sendNotifTemp, 60000)
                }
            });
        }

        // for pH
        function getTempPh() {

            $.ajax({
                type: 'GET',
                dataType: 'json',
                url: 'temppH',
                success: function(data) {
                    // process your data to pull out what you plan to use to update the chart
                    // e.g. new label and a new data point

                    // add new label and data point to chart's underlying data structures
                    myChart1.data.labels.push(id++);
                    for (let i = 0; i < data.length; i++) {
                        myChart1.data.datasets[0].data.push(data[i].temperature_pH);
                    }

                    // re-render the chart
                    myChart1.update();
                    setTimeout(getTempPh, 1000)
                }
            });
        }

        function currentPh() {

            $.ajax({
                type: 'GET',
                dataType: 'json',
                url: 'temppH',
                success: function(data) {

                    let html

                    for (let i = 0; i < data.length; i++) {
                        html += '<h5 class="mb-0">' + data[i].temperature_pH +
                            ' pH</h5><small class="mb-0">Current pH</small>'
                    }

                    $('#currentPh').html(html.substr(9))
                    setTimeout(currentPh, 1000)
                }
            });
        }

        function indicatorPh() {
            $.ajax({
                type: 'GET',
                dataType: 'json',
                url: 'temppH',
                success: function(data) {

                    let html

                    for (let i = 0; i < data.length; i++) {
                        if (data[i].temperature_pH < 6.00 && data[i].temperature_pH > 3.00) {
                            html +=
                                '<h3 class="mb-0" data-cooltipz-dir="top" data-cooltipz-size="medium" aria-label="Please do action ASAP, fishes might die in this situation"><small class="badge badge-warning">Warm Acid</small></h3><small class="mb-0">Indicator</small>'
                        } else if (data[i].temperature_pH < 3.00) {
                            html +=
                                '<h3 class="mb-0" data-cooltipz-dir="top" data-cooltipz-size="medium" aria-label="Please do action ASAP, fishes will SURELY DIE in this situation"><small class="badge badge-danger">Acidic</small></h3><small class="mb-0">Indicator</small>'
                        } else if (data[i].temperature_pH > 6.00) {
                            html +=
                                '<h3 class="mb-0" data-cooltipz-dir="top" data-cooltipz-size="large" aria-label="The optimal pH range for tilapia is between 6.5-8.5. However, they can tolerate pH levels as low as 6.0 and as high as 9.0. It\'s important to note that pH levels that are too low or too high can cause stress to the fish and weaken their immune systems, making them more susceptible to disease."><small class="badge badge-success">Normal</small></h3><small class="mb-0">Indicator</small>'
                        }
                    }

                    // myChart.update();
                    $('#indicatorPh').html(html.substr(9))
                    setTimeout(indicatorPh, 1000)
                }
            });
        }

        function recommendationPh() {
            $.ajax({
                type: 'GET',
                dataType: 'json',
                url: 'temppH',
                success: function(data) {

                    let html

                    for (let i = 0; i < data.length; i++) {
                        if (data[i].temperature_pH < 6.00 && data[i].temperature_pH > 3.00) {
                            html +=
                                '<h5 class="mb-0">Replace the water</h5><small class="mb-0">Recommendation</small>'
                        } else if (data[i].temperature_pH < 3.00) {
                            html +=
                                '<h5 class="mb-0">Replace the Water</h5><small class="mb-0">Recommendation</small>'
                        } else if (data[i].temperature_pH > 6.00) {
                            html +=
                                '<h5 class="mb-0">Water is normal</h5><small class="mb-0">Rest Assured</small>'
                        }
                    }

                    $('#recommendationPh').html(html.substr(9))
                    setTimeout(recommendationPh, 1000)
                }
            });
        }

        function sendNotifPh() {
            $.ajax({
                type: 'GET',
                dataType: 'json',
                url: 'temppH',
                success: function(data) {

                    let html

                    for (let i = 0; i < data.length; i++) {
                        if (data[i].temperature_pH < 6.00 && data[i].temperature_pH > 3.00) {
                            var subject = "Temperature Abnormal - Alert level: YELLOW"
                            var details = "pH value is " + data[i].temperature_pH +
                                ". This means the water is warm acid. Please check you fishpond, ASAP"
                            $.ajax({
                                type: 'POST',
                                dataType: 'json',
                                data: {
                                    subject: subject,
                                    details: details
                                },
                                url: '/api/send-notif',
                                success: function() {
                                    return 0;
                                },
                            });
                        } else if (data[i].temperature_pH < 3.00) {
                            var subject = "Temperature Abnormal - Alert level: RED"
                            var details = "pH value is " + data[i].temperature_pH +
                                ". This means the water is acidic. Please check you fishpond, ASAP"
                            $.ajax({
                                type: 'POST',
                                dataType: 'json',
                                data: {
                                    subject: subject,
                                    details: details
                                },
                                url: '/api/send-notif',
                                success: function() {
                                    return 0;
                                },
                            });
                        }
                    }

                    setTimeout(sendNotifPh, 60000)
                }
            });
        }

        // for moisture
        function getTempMoist() {

            $.ajax({
                type: 'GET',
                dataType: 'json',
                url: 'tempm',
                success: function(data) {
                    // process your data to pull out what you plan to use to update the chart
                    // e.g. new label and a new data point

                    // add new label and data point to chart's underlying data structures
                    myChart2.data.labels.push(id++);
                    for (let i = 0; i < data.length; i++) {
                        myChart2.data.datasets[0].data.push(data[i].temperature_moist);
                    }

                    // re-render the chart
                    myChart2.update();
                    setTimeout(getTempMoist, 1000)
                }
            });
        }

        function currentMoist() {

            $.ajax({
                type: 'GET',
                dataType: 'json',
                url: 'tempm',
                success: function(data) {

                    let html

                    for (let i = 0; i < data.length; i++) {
                        html += '<h5 class="mb-0">' + data[i].temperature_moist +
                            ' %</h5><small class="mb-0">Current Moisture</small>'
                    }

                    $('#currentMoist').html(html.substr(9))
                    setTimeout(currentMoist, 1000)
                }
            });
        }

        function indicatorMoist() {
            $.ajax({
                type: 'GET',
                dataType: 'json',
                url: 'tempm',
                success: function(data) {

                    let html

                    for (let i = 0; i < data.length; i++) {
                        if (data[i].temperature_moist < 90 && data[i].temperature_moist > 15) {
                            html +=
                                '<h3 class="mb-0" data-cooltipz-dir="top" data-cooltipz-size="medium" aria-label="Fishes might wash out of their habitats and into unfamiliar reas. Changes in oxygen levels: Heavy rain can also cause changes in the levels of dissolved oxygen in the water. Changes in temperature: Heavy rain can also cause changes in water temperature, which can affect the metabolism and growth of fish.">Moderate Rain</small></h5><small class="mb-0">Indicator</small>'
                        } else if (data[i].temperature_moist > 90) {
                            html +=
                                '<h3 class="mb-0" data-cooltipz-dir="top" data-cooltipz-size="medium" aria-label="Fishes might wash out of their habitats and into unfamiliar reas. Changes in oxygen levels: Heavy rain can also cause changes in the levels of dissolved oxygen in the water. Changes in temperature: Heavy rain can also cause changes in water temperature, which can affect the metabolism and growth of fish."><small class="badge badge-danger">Heavy Rain</small></h3><small class="mb-0">Indicator</small>'
                        } else if (data[i].temperature_moist < 15) {
                            html +=
                                '<h3 class="mb-0" data-cooltipz-dir="top" data-cooltipz-size="large" aria-label="The water is normal."><small class="badge badge-success">Normal</small></h3><small class="mb-0">Indicator</small>'
                        }
                    }

                    // myChart.update();
                    $('#indicatorMoist').html(html.substr(9))
                    setTimeout(indicatorMoist, 1000)
                }
            });
        }

        function recommendationMoist() {
            $.ajax({
                type: 'GET',
                dataType: 'json',
                url: 'tempm',
                success: function(data) {

                    let html

                    for (let i = 0; i < data.length; i++) {
                        if (data[i].temperature_moist < 6.00 && data[i].temperature_moist > 3.00) {
                            html +=
                                '<h5 class="mb-0">Replace the water</h5><small class="mb-0">Recommendation</small>'
                        } else if (data[i].temperature_moist < 3.00) {
                            html +=
                                '<h5 class="mb-0">Replace the Water</h5><small class="mb-0">Recommendation</small>'
                        } else if (data[i].temperature_moist > 6.00) {
                            html +=
                                '<h5 class="mb-0">Water is normal</h5><small class="mb-0">Rest Assured</small>'
                        }
                    }

                    $('#recommendationMoist').html(html.substr(9))
                    setTimeout(recommendationMoist, 1000)
                }
            });
        }

        function sendNotifMoist() {
            $.ajax({
                type: 'GET',
                dataType: 'json',
                url: 'tempm',
                success: function(data) {

                    let html

                    for (let i = 0; i < data.length; i++) {
                        if (data[i].temperature_moist < 6.00 && data[i].temperature_moist > 3.00) {
                            var subject = "Moisture Abnormal - Alert level: YELLOW"
                            var details = "Moisture value is " + data[i].temperature_moist +
                                ". This means the rain is moderate. Please check you fishpond, ASAP"
                            $.ajax({
                                type: 'POST',
                                dataType: 'json',
                                data: {
                                    subject: subject,
                                    details: details
                                },
                                url: '/api/send-notif',
                                success: function() {
                                    return 0;
                                },
                            });
                        } else if (data[i].temperature_moist < 3.00) {
                            var subject = "Moisture Abnormal - Alert level: RED"
                            var details = "Moisture value is " + data[i].temperature_moist +
                                ". This means the rain is heavy. Please check you fishpond, ASAP"
                            $.ajax({
                                type: 'POST',
                                dataType: 'json',
                                data: {
                                    subject: subject,
                                    details: details
                                },
                                url: '/api/send-notif',
                                success: function() {
                                    return 0;
                                },
                            });
                        }
                    }

                    setTimeout(sendNotifMoist, 60000) //300000
                }
            });
        }

        // for salanity
        function getTempSal() {

            $.ajax({
                type: 'GET',
                dataType: 'json',
                url: 'temps',
                success: function(data) {
                    // process your data to pull out what you plan to use to update the chart
                    // e.g. new label and a new data point

                    // add new label and data point to chart's underlying data structures
                    myChart3.data.labels.push(id++);
                    for (let i = 0; i < data.length; i++) {
                        myChart3.data.datasets[0].data.push(data[i].temperature_salanity);
                    }

                    // re-render the chart
                    myChart3.update();
                    setTimeout(getTempSal, 1000)
                }
            });
        }

        function currentSal() {

            $.ajax({
                type: 'GET',
                dataType: 'json',
                url: 'temps',
                success: function(data) {

                    let html

                    for (let i = 0; i < data.length; i++) {
                        html += '<h5 class="mb-0">' + data[i].temperature_salanity +
                            ' %</h5><small class="mb-0">Current Moisture</small>'
                    }

                    $('#currentSal').html(html.substr(9))
                    setTimeout(currentMoist, 1000)
                }
            });
        }

        function indicatorSal() {
            $.ajax({
                type: 'GET',
                dataType: 'json',
                url: 'temps',
                success: function(data) {

                    let html

                    for (let i = 0; i < data.length; i++) {
                        if (data[i].temperature_salanity < 90 && data[i].temperature_salanity > 15) {
                            html +=
                                '<h3 class="mb-0" data-cooltipz-dir="top" data-cooltipz-size="medium" aria-label="Fishes might wash out of their habitats and into unfamiliar reas. Changes in oxygen levels: Heavy rain can also cause changes in the levels of dissolved oxygen in the water. Changes in temperature: Heavy rain can also cause changes in water temperature, which can affect the metabolism and growth of fish.">Moderate Rain</small></h5><small class="mb-0">Indicator</small>'
                        } else if (data[i].temperature_salanity > 90) {
                            html +=
                                '<h3 class="mb-0" data-cooltipz-dir="top" data-cooltipz-size="medium" aria-label="Fishes might wash out of their habitats and into unfamiliar reas. Changes in oxygen levels: Heavy rain can also cause changes in the levels of dissolved oxygen in the water. Changes in temperature: Heavy rain can also cause changes in water temperature, which can affect the metabolism and growth of fish."><small class="badge badge-danger">Heavy Rain</small></h3><small class="mb-0">Indicator</small>'
                        } else if (data[i].temperature_salanity < 15) {
                            html +=
                                '<h3 class="mb-0" data-cooltipz-dir="top" data-cooltipz-size="large" aria-label="The water is normal."><small class="badge badge-success">Normal</small></h3><small class="mb-0">Indicator</small>'
                        }
                    }

                    // myChart.update();
                    $('#indicatorSal').html(html.substr(9))
                    setTimeout(indicatorMoist, 1000)
                }
            });
        }

        function recommendationSal() {
            $.ajax({
                type: 'GET',
                dataType: 'json',
                url: 'temps',
                success: function(data) {

                    let html

                    for (let i = 0; i < data.length; i++) {
                        if (data[i].temperature_salanity < 6.00 && data[i].temperature_salanity > 3.00) {
                            html +=
                                '<h5 class="mb-0">Replace the water</h5><small class="mb-0">Recommendation</small>'
                        } else if (data[i].temperature_salanity < 3.00) {
                            html +=
                                '<h5 class="mb-0">Replace the Water</h5><small class="mb-0">Recommendation</small>'
                        } else if (data[i].temperature_salanity > 6.00) {
                            html +=
                                '<h5 class="mb-0">Water is normal</h5><small class="mb-0">Rest Assured</small>'
                        }
                    }

                    $('#recommendationSal').html(html.substr(9))
                    setTimeout(recommendationMoist, 1000)
                }
            });
        }
    </script>
@endsection
