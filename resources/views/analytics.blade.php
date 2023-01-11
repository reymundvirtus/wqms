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
                <div class="col-12 col-lg-12 col-xl-12">
                    <div class="card">

                        {{-- for temperature value --}}
                        <div class="card-header">Temperature in Fahrenheit
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

                    </div>
                </div>
            </div>
            <!--End Row-->

            <!--start overlay-->
            <div class="overlay toggle-menu" style="background-color: rgba(255, 255, 255, 0.562)"></div>
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
                    backgroundColor: 'rgba(255, 255, 255, 0.562)',
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
                    backgroundColor: 'rgba(255, 255, 255, 0.562)',
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

        getTemp()
        getTempPh()
        currentTemp()
        currentPh()
        indicator()
        indicatorPh()
        recommendation()
        recommendationPh()

        let id = 1

        // for temp
        function getTemp() {
            $.ajax({
                type: 'GET',
                dataType: 'json',
                url: 'tempc',
                success: function(data) {

                    for (let i = 0; i < data.length; i++) {
                        myChart.data.labels.push(data[i].temperature_f + "°F");
                        myChart.data.datasets[0].data.push(data[i].temperature_f);
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
                        html += '<h5 class="mb-0">' + data[i].temperature_f + '°F</h5><small class="mb-0">Current Temperature</small>'
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
                            html += '<h5 class="mb-0"><small class="badge badge-warning">Cold</small></h5><small class="mb-0">Indicator</small>'
                        } else if (data[i].temperature_f < 40.00) {
                            html += '<h5 class="mb-0"><small class="badge badge-danger">Too Cold</small></h5><small class="mb-0">Indicator</small>'
                        } else if (data[i].temperature_f > 47.00 && data[i].temperature_f < 90.00) {
                            html += '<h5 class="mb-0"><small class="badge badge-success">Normal</small></h5><small class="mb-0">Indicator</small>'
                        } else if (data[i].temperature_f > 90.00 && data[i].temperature_f < 100.00) {
                            html += '<h5 class="mb-0"><small class="badge badge-warning">Warm</small></h5><small class="mb-0">Indicator</small>'
                        } else if (data[i].temperature_f > 100.00) {
                            html += '<h5 class="mb-0"><small class="badge badge-danger">Too Hot</small></h5><small class="mb-0">Indicator</small>'
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
                            html += '<h5 class="mb-0">Make the water warm</h5><small class="mb-0">Recommendation</small>'
                        } else if (data[i].temperature_f < 40.00) {
                            html += '<h5 class="mb-0">Replace the Water</h5><small class="mb-0">Recommendation</small>'
                        } else if (data[i].temperature_f > 47.00 && data[i].temperature_f < 90.00) {
                            html += '<h5 class="mb-0">Water is normal</h5><small class="mb-0">Recommendation</small>'
                        } else if (data[i].temperature_f > 90.00 && data[i].temperature_f < 100.00) {
                            html += '<h5 class="mb-0">Make the water cold</h5><small class="mb-0">Recommendation</small>'
                        } else if (data[i].temperature_f > 100.00) {
                            html += '<h5 class="mb-0">Replace the Water</h5><small class="mb-0">Recommendation</small>'
                        }
                    }

                    $('#recommendation').html(html.substr(9))
                    setTimeout(recommendation, 1000)
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
                        html += '<h5 class="mb-0">' + data[i].temperature_pH + ' pH</h5><small class="mb-0">Current pH</small>'
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
                            html += '<h5 class="mb-0"><small class="badge badge-warning">Warm Acid</small></h5><small class="mb-0">Indicator</small>'
                        } else if (data[i].temperature_pH < 3.00) {
                            html += '<h5 class="mb-0"><small class="badge badge-danger">Acidic</small></h5><small class="mb-0">Indicator</small>'
                        } else if (data[i].temperature_pH > 6.00) {
                            html += '<h5 class="mb-0"><small class="badge badge-success">Normal</small></h5><small class="mb-0">Indicator</small>'
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
                            html += '<h5 class="mb-0">Replace the water</h5><small class="mb-0">Recommendation</small>'
                        } else if (data[i].temperature_pH < 3.00) {
                            html += '<h5 class="mb-0">Replace the Water</h5><small class="mb-0">Recommendation</small>'
                        } else if (data[i].temperature_pH > 6.00) {
                            html += '<h5 class="mb-0">Water is normal</h5><small class="mb-0">Recommendation</small>'
                        }
                    }

                    $('#recommendationPh').html(html.substr(9))
                    setTimeout(recommendationPh, 1000)
                }
            });
        }
    </script>
@endsection
