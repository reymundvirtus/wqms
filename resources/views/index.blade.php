@extends('layouts.defaultLayout')

@section('title')
    WQMS - Dashboard
@endsection

@section('content')
    <div class="clearfix"></div>

    <div class="content-wrapper">
        <div class="container-fluid">

            <!--Start Dashboard Content-->
            <h4 class="sidebar-header">DASHBOARD</h4><br>
            <h6>Readings for today!</h6>
            <div class="card mt-3">
                <div class="card-content">
                    <div class="row row-group m-0" id="tempToday">
                        <div class="col-3 col-lg-3 col-xl-3 border-light">
                            <div class="card-body" id="temperature">
                            </div>
                        </div>
                        <div class="col-3 col-lg-3 col-xl-3 border-light">
                            <div class="card-body" id="temppH">
                            </div>
                        </div>
                        <div class="col-3 col-lg-3 col-xl-3 border-light">
                            <div class="card-body" id="tempm">

                            </div>
                        </div>
                        <div class="col-3 col-lg-3 col-xl-3 border-light">
                            <div class="card-body" id="temps">

                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <h4 class="sidebar-header">DATA ANALYTICS</h4>

            <div class="row">
                <div class="col-6 col-lg-6 col-xl-6">
                    <div class="card">

                        {{-- ? for temperature value --}}
                        <div class="card-header">Temperature in Celsius</div>
                        <div class="card-body">
                            <div class="chart-container-1">
                                <canvas id="tempChart"></canvas>
                            </div>
                        </div>

                        <div class="row m-0 row-group text-center border-top border-light-3" id="tempc">
                            
                        </div>
                        <span class="text-center">Desirable range/s: 25 - 32°C</strong>
                    </div>
                    <div class="card">

                        {{-- ? for moisture value --}}
                        <div class="card-header">Moisture</div>
                        <div class="card-body">
                            <div class="chart-container-1">
                                <canvas id="moistChart"></canvas>
                            </div>
                        </div>

                        <div class="row m-0 row-group text-center border-top border-light-3" id="tempmoist">

                        </div>
                        <span class="text-center">Desirable range/s: 0 - 15%</strong>
                    </div>
                </div>

                <div class="col-6 col-lg-6 col-xl-6">
                    <div class="card">

                        {{-- ? for pH value --}}
                        <div class="card-header">pH Value</div>
                        <div class="card-body">
                            <div class="chart-container-1">
                                <canvas id="pHChart"></canvas>
                            </div>
                        </div>

                        <div class="row m-0 row-group text-center border-top border-light-3" id="tempph">

                        </div>
                        <span class="text-center">Desirable range/s: 6.5 - 9pH</strong>
                    </div>

                    <div class="card">

                        {{-- ? for salanity value --}}
                        <div class="card-header">Salinity</div>
                        <div class="card-body">
                            <div class="chart-container-1">
                                <canvas id="salChart"></canvas>
                            </div>
                        </div>

                        <div class="row m-0 row-group text-center border-top border-light-3" id="tempsal">

                        </div>
                        <span class="text-center">Desirable range/s: 250000‰ above</strong>
                    </div>
                </div>
            </div>
            <!--End Row-->
            <!--End Dashboard Content-->

            <!--start overlay-->
            <div class="overlay toggle-menu"></div>
            <!--end overlay-->

        </div>
        <!-- End container-fluid-->

    </div>
    <!--End content-wrapper-->

    <script src="js/jquery.min.js"></script>
    <script src="plugins/Chart.js/Chart.min.js"></script>
    <script>
        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            get_temperature()

            function get_temperature() {

                $.ajax({
                    type: 'GET',
                    dataType: 'json',
                    url: 'all-temp-today',
                    success: function(data) {

                        let html

                        for (let i = 0; i < data.tempc.length; i++) {
                            //? tempc today
                            if (data.tempc[i].total_tempc == null) {
                                html +=
                                    '<div class="col-3 col-lg-3 col-xl-3 border-light"><div class="card-body">'
                                html +=
                                    '<h5 class="text-white mb-0">No readings today yet<span class="float-right"><i class="fa fa-tint"></i></span></h5>'
                                html +=
                                    '<div class="progress my-3" style="height:3px;"><div class="progress-bar" style="width:100%"></div></div><p class="mb-0 text-white small-font">Temprature</p>'
                                html += '</div></div>'
                            } else {
                                html +=
                                    '<div class="col-3 col-lg-3 col-xl-3 border-light"><div class="card-body">'
                                html += '<h5 class="text-white mb-0">' + data.tempc[i].total_tempc +
                                    '°C <span class="float-right"><i class="fa fa-thermometer-half"></i></span></h5>'
                                html +=
                                    '<div class="progress my-3" style="height:3px;"><div class="progress-bar" style="width:100%"></div></div><p class="mb-0 text-white small-font">Temprature</p>'
                                html += '</div></div>'
                            }
                        }

                        for (let i = 0; i < data.temppH.length; i++) {
                            //? temppH today
                            if (data.temppH[i].total_temppH == null) {
                                html +=
                                    '<div class="col-3 col-lg-3 col-xl-3 border-light"><div class="card-body">'
                                html +=
                                    '<h5 class="text-white mb-0">No readings today yet<span class="float-right"><i class="fa fa-tint"></i></span></h5>'
                                html +=
                                    '<div class="progress my-3" style="height:3px;"><div class="progress-bar" style="width:100%"></div></div><p class="mb-0 text-white small-font">pH Level</p>'
                                html += '</div></div>'
                            } else {
                                html +=
                                    '<div class="col-3 col-lg-3 col-xl-3 border-light"><div class="card-body">'
                                html += '<h5 class="text-white mb-0">' + data.temppH[i].total_temppH +
                                    'pH <span class="float-right"><i class="fa fa-tint"></i></span></h5>'
                                html +=
                                    '<div class="progress my-3" style="height:3px;"><div class="progress-bar" style="width:100%"></div></div><p class="mb-0 text-white small-font">pH Level</p>'
                                html += '</div></div>'
                            }
                        }

                        for (let i = 0; i < data.tempm.length; i++) {
                            //? tempm today
                            if (data.tempm[i].total_tempm == null) {
                                html +=
                                    '<div class="col-3 col-lg-3 col-xl-3 border-light"><div class="card-body">'
                                html +=
                                    '<h5 class="text-white mb-0">No readings today yet<span class="float-right"><i class="fa fa-tint"></i></span></h5>'
                                html +=
                                    '<div class="progress my-3" style="height:3px;"><div class="progress-bar" style="width:100%"></div></div><p class="mb-0 text-white small-font">Moisture</p>'
                                html += '</div></div>'
                            } else {
                                html +=
                                    '<div class="col-3 col-lg-3 col-xl-3 border-light"><div class="card-body">'
                                html += '<h5 class="text-white mb-0">' + data.tempm[i].total_tempm +
                                    '% <span class="float-right"><i class="fa fa-tint"></i></span></h5>'
                                html +=
                                    '<div class="progress my-3" style="height:3px;"><div class="progress-bar" style="width:100%"></div></div><p class="mb-0 text-white small-font">Moisture</p>'
                                html += '</div></div>'
                            }
                        }

                        for (let i = 0; i < data.temps.length; i++) {
                            //? temps today
                            if (data.temps[i].total_temps == null) {
                                html +=
                                    '<div class="col-3 col-lg-3 col-xl-3 border-light"><div class="card-body">'
                                html +=
                                    '<h5 class="text-white mb-0">No readings today yet<span class="float-right"><i class="fa fa-tint"></i></span></h5>'
                                html +=
                                    '<div class="progress my-3" style="height:3px;"><div class="progress-bar" style="width:100%"></div></div><p class="mb-0 text-white small-font">Salinity</p>'
                                html += '</div></div>'
                            } else {
                                html +=
                                    '<div class="col-3 col-lg-3 col-xl-3 border-light"><div class="card-body">'
                                html += '<h5 class="text-white mb-0">' + data.temps[i].total_temps +
                                    '‰ <span class="float-right"><i class="fa fa-tint"></i></span></h5>'
                                html +=
                                    '<div class="progress my-3" style="height:3px;"><div class="progress-bar" style="width:100%"></div></div><p class="mb-0 text-white small-font">Salinity</p>'
                                html += '</div></div>'
                            }
                        }

                        $('#tempToday').html(html.substr(9))
                    }
                });

                $.ajax({
                    type: 'GET',
                    dataType: 'json',
                    url: 'all-temp-today',
                    success: function(data) {

                        let html

                        for (let i = 0; i < data.length; i++) {
                            if (data[i].total_temppH == null) {
                                html +=
                                    '<h5 class="text-white mb-0">No readings today yet<span class="float-right"><i class="fa fa-tint"></i></span></h5>'
                            } else {
                                html += '<h5 class="text-white mb-0">' + data[i].total_temppH +
                                    ' pH <span class="float-right"><i class="fa fa-tint"></i></span></h5>'
                            }
                            html +=
                                '<div class="progress my-3" style="height:3px;"><div class="progress-bar" style="width:100%"></div></div><p class="mb-0 text-white small-font">pH Level</p>'
                        }

                        $('#temppH').html(html.substr(9))
                    }
                });

                $.ajax({
                    type: 'GET',
                    dataType: 'json',
                    url: 'all-temp-today',
                    success: function(data) {

                        let html

                        for (let i = 0; i < data.length; i++) {
                            if (data[i].total_tempm == null) {
                                html +=
                                    '<h5 class="text-white mb-0">No readings today yet<span class="float-right"><i class="fa fa-tint"></i></span></h5>'
                            } else {
                                html += '<h5 class="text-white mb-0">' + data[i].total_tempm +
                                    ' % <span class="float-right"><i class="fa fa-tint"></i></span></h5>'
                            }
                            html +=
                                '<div class="progress my-3" style="height:3px;"><div class="progress-bar" style="width:100%"></div></div><p class="mb-0 text-white small-font">Moisture</p>'
                        }

                        $('#tempm').html(html.substr(9))
                        setTimeout(get_temperature, 1000)
                    }
                });

                $.ajax({
                    type: 'GET',
                    dataType: 'json',
                    url: 'all-temp-today',
                    success: function(data) {

                        let html

                        for (let i = 0; i < data.length; i++) {
                            if (data[i].total_temps == null) {
                                html +=
                                    '<h5 class="text-white mb-0">No readings today yet<span class="float-right"><i class="fa fa-tint"></i></span></h5>'
                            } else {
                                html += '<h5 class="text-white mb-0">' + data[i].total_temps +
                                    ' % <span class="float-right"><i class="fa fa-tint"></i></span></h5>'
                            }
                            html +=
                                '<div class="progress my-3" style="height:3px;"><div class="progress-bar" style="width:100%"></div></div><p class="mb-0 text-white small-font">Salinity</p>'
                        }

                        $('#temps').html(html.substr(9))
                        setTimeout(get_temperature, 1000)
                    }
                });

                //? for temp chart
                $.ajax({
                    type: 'GET',
                    dataType: 'json',
                    url: 'all-temp',
                    success: function(data) {

                        let html

                        myChart.data.labels.push(id++);
                        for (let i = 0; i < data.tempc.length; i++) {
                            //? chart data value
                            myChart.data.datasets[0].data.push(data.tempc[i].temperature_c);
                            //? current temp
                            html += '<div class="col-12 col-lg-4 mt-4">'
                            html += '<h5 class="mb-0">' + data.tempc[i].temperature_c +
                                '°C</h5><small class="mb-0">Current Temperature</small>'
                            html += '</div>'
                            //? indicator
                            html += '<div class="col-12 col-lg-4 mt-4">'
                            if (data.tempc[i].temperature_f < 47.00 && data.tempc[i].temperature_f >
                                40.00) {
                                html +=
                                    '<h3 class="mb-0" data-cooltipz-dir="top" data-cooltipz-size="large" aria-label="If the water temperature is too cold for tilapia, it can lead to a number of negative effects on the fish. At temperatures below 64°F (18°C), tilapia will become less active and may even stop feeding altogether. This can lead to slower growth and poor overall health. In extreme cases, prolonged exposure to cold temperatures can even cause the fish to die. Cold water can also make the fish more susceptible to disease and parasites, so it\'s important to maintain the appropriate water temperature range to ensure the tilapia remain healthy."><small class="badge badge-warning">Cold</small></h5><small class="mb-0">Indicator</small>'
                            } else if (data.tempc[i].temperature_f < 40.00) {
                                html +=
                                    '<h3 class="mb-0" data-cooltipz-dir="top" data-cooltipz-size="large" aria-label="If the water temperature is too cold for tilapia, it can lead to a number of negative effects on the fish. At temperatures below 64°F (18°C), tilapia will become less active and may even stop feeding altogether. This can lead to slower growth and poor overall health. In extreme cases, prolonged exposure to cold temperatures can even cause the fish to die. Cold water can also make the fish more susceptible to disease and parasites, so it\'s important to maintain the appropriate water temperature range to ensure the tilapia remain healthy."><small class="badge badge-danger">Too Cold</small></h5><small class="mb-0">Indicator</small>'
                            } else if (data.tempc[i].temperature_f > 47.00 && data.tempc[i]
                                .temperature_f < 90.00) {
                                html +=
                                    '<h3 class="mb-0" data-cooltipz-dir="top" data-cooltipz-size="medium" aria-label="Temperature is normal"><span class="badge badge-success">Normal</span></h3><small class="mb-0">Indicator</small>'

                            } else if (data.tempc[i].temperature_f > 90.00 && data.tempc[i]
                                .temperature_f <
                                100.00) {
                                html +=
                                    '<h3 class="mb-0" data-cooltipz-dir="top" data-cooltipz-size="large" aria-label="If the water temperature is too hot for tilapia, it can also have negative effects on the fish. High temperatures can lead to stress, which can weaken the fish\'s immune system and make them more susceptible to disease. Additionally, high water temperatures can cause a decrease in oxygen levels in the water, which can lead to suffocation and death. Furthermore, high temperatures can also cause a decrease in the dissolved oxygen levels in the water, leading to a reduced growth rate and suboptimal feeding. Tilapia can tolerate a wide range of temperatures, but temperatures above 92°F (33°C) can be dangerous and will require a cooling system for the fish, such as a chiller, to maintain the optimal temperature."><small class="badge badge-warning">Warm</small></h3><small class="mb-0">Indicator</small>'
                            } else if (data.tempc[i].temperature_f > 100.00) {
                                html +=
                                    '<h3 class="mb-0" data-cooltipz-dir="top" data-cooltipz-size="large" aria-label="If the water temperature is too hot for tilapia, it can also have negative effects on the fish. High temperatures can lead to stress, which can weaken the fish\'s immune system and make them more susceptible to disease. Additionally, high water temperatures can cause a decrease in oxygen levels in the water, which can lead to suffocation and death. Furthermore, high temperatures can also cause a decrease in the dissolved oxygen levels in the water, leading to a reduced growth rate and suboptimal feeding. Tilapia can tolerate a wide range of temperatures, but temperatures above 92°F (33°C) can be dangerous and will require a cooling system for the fish, such as a chiller, to maintain the optimal temperature."><small class="badge badge-danger">Too Hot</small></h5><small class="mb-0">Indicator</small>'
                            }
                            html += '</div>'
                            //? suggestion
                            html += '<div class="col-12 col-lg-4 mt-4">'
                            if (data.tempc[i].temperature_f < 47.00 && data.tempc[i].temperature_f >
                                40.00) {
                                html +=
                                    '<h5 class="mb-0">Make the water warm</h5><small class="mb-0">Recommendation</small>'
                            } else if (data.tempc[i].temperature_f < 40.00) {
                                html +=
                                    '<h5 class="mb-0">Replace the Water</h5><small class="mb-0">Recommendation</small>'
                            } else if (data.tempc[i].temperature_f > 47.00 && data.tempc[i]
                                .temperature_f < 90.00) {
                                html +=
                                    '<h5 class="mb-0">Water is normal</h5><small class="mb-0">Rest Assured</small>'
                            } else if (data.tempc[i].temperature_f > 90.00 && data.tempc[i]
                                .temperature_f <
                                100.00) {
                                html +=
                                    '<h5 class="mb-0">Make the water cold</h5><small class="mb-0">Recommendation</small>'
                            } else if (data.tempc[i].temperature_f > 100.00) {
                                html +=
                                    '<h5 class="mb-0">Replace the Water</h5><small class="mb-0">Recommendation</small>'
                            }
                            html += '</div>'
                        }

                        $('#tempc').html(html.substr(9))
                        myChart.update()
                        setTimeout(get_temperature, 1000)
                    }
                });

                //? for ph chart
                $.ajax({
                    type: 'GET',
                    dataType: 'json',
                    url: 'all-temp',
                    success: function(data) {

                        let html

                        myChart1.data.labels.push(id++);
                        for (let i = 0; i < data.temppH.length; i++) {
                            //? chart data value
                            myChart1.data.datasets[0].data.push(data.temppH[i].temperature_pH);
                            //? current pH
                            html += '<div class="col-12 col-lg-4 mt-4">'
                            html += '<h5 class="mb-0">' + data.temppH[i].temperature_pH +
                                ' pH</h5><small class="mb-0">Current pH</small>'
                            html += '</div>'
                            //? indicator
                            html += '<div class="col-12 col-lg-4 mt-4">'
                            if (data.temppH[i].temperature_pH < 6.00 && data.temppH[i].temperature_pH >
                                3.00) {
                                html +=
                                    '<h3 class="mb-0" data-cooltipz-dir="top" data-cooltipz-size="medium" aria-label="Please do action ASAP, fishes might die in this situation"><small class="badge badge-warning">Warm Acid</small></h3><small class="mb-0">Indicator</small>'
                            } else if (data.temppH[i].temperature_pH < 3.00) {
                                html +=
                                    '<h3 class="mb-0" data-cooltipz-dir="top" data-cooltipz-size="medium" aria-label="Please do action ASAP, fishes will SURELY DIE in this situation"><small class="badge badge-danger">Acidic</small></h3><small class="mb-0">Indicator</small>'
                            } else if (data.temppH[i].temperature_pH > 6.00) {
                                html +=
                                    '<h3 class="mb-0" data-cooltipz-dir="top" data-cooltipz-size="large" aria-label="The optimal pH range for tilapia is between 6.5-8.5. However, they can tolerate pH levels as low as 6.0 and as high as 9.0. It\'s important to note that pH levels that are too low or too high can cause stress to the fish and weaken their immune systems, making them more susceptible to disease."><small class="badge badge-success">Normal</small></h3><small class="mb-0">Indicator</small>'
                            }
                            html += '</div>'
                            //? suggestion
                            html += '<div class="col-12 col-lg-4 mt-4">'
                            if (data.temppH[i].temperature_pH < 6.00 && data.temppH[i].temperature_pH >
                                3.00) {
                                html +=
                                    '<h5 class="mb-0">Replace the water</h5><small class="mb-0">Recommendation</small>'
                            } else if (data.temppH[i].temperature_pH < 3.00) {
                                html +=
                                    '<h5 class="mb-0">Replace the Water</h5><small class="mb-0">Recommendation</small>'
                            } else if (data.temppH[i].temperature_pH > 6.00) {
                                html +=
                                    '<h5 class="mb-0">Water is normal</h5><small class="mb-0">Rest Assured</small>'
                            }
                            html += '</div>'
                        }

                        $('#tempph').html(html.substr(9))
                        myChart1.update();
                        setTimeout(get_temperature, 1000)
                    }
                });

                //? for moist chart
                $.ajax({
                    type: 'GET',
                    dataType: 'json',
                    url: 'all-temp',
                    success: function(data) {

                        let html

                        myChart2.data.labels.push(id++);
                        for (let i = 0; i < data.tempm.length; i++) {
                            //? chart data value
                            myChart2.data.datasets[0].data.push(data.tempm[i].temperature_moist);
                            //? current moist
                            html += '<div class="col-12 col-lg-4 mt-4">'
                            html += '<h5 class="mb-0">' + data.tempm[i].temperature_moist +
                                ' %</h5><small class="mb-0">Current Moisture</small>'
                            html += '</div>'
                            //? indicator
                            html += '<div class="col-12 col-lg-4 mt-4">'
                            if (data.tempm[i].temperature_moist >= 15 && data.tempm[i]
                                .temperature_moist < 90) {
                                html +=
                                    '<h3 class="mb-0" data-cooltipz-dir="top" data-cooltipz-size="medium" aria-label="Fishes might wash out of their habitats and into unfamiliar reas. Changes in oxygen levels: Heavy rain can also cause changes in the levels of dissolved oxygen in the water. Changes in temperature: Heavy rain can also cause changes in water temperature, which can affect the metabolism and growth of fish."><small class="badge badge-warning">Moderate Rain</small></h5><small class="mb-0">Indicator</small>'
                            } else if (data.tempm[i].temperature_moist > 90) {
                                html +=
                                    '<h3 class="mb-0" data-cooltipz-dir="top" data-cooltipz-size="medium" aria-label="Fishes might wash out of their habitats and into unfamiliar reas. Changes in oxygen levels: Heavy rain can also cause changes in the levels of dissolved oxygen in the water. Changes in temperature: Heavy rain can also cause changes in water temperature, which can affect the metabolism and growth of fish."><small class="badge badge-danger">Heavy Rain</small></h3><small class="mb-0">Indicator</small>'
                            } else if (data.tempm[i].temperature_moist < 15) {
                                html +=
                                    '<h3 class="mb-0" data-cooltipz-dir="top" data-cooltipz-size="large" aria-label="The water is normal."><small class="badge badge-success">Normal</small></h3><small class="mb-0">Indicator</small>'
                            }
                            html += '</div>'
                            //? suggestion
                            html += '<div class="col-12 col-lg-4 mt-4">'
                            if (data.tempm[i].temperature_moist > 15 && data.tempm[i]
                                .temperature_moist < 90) {
                                html +=
                                    '<h5 class="mb-0">Water level may increase</h5><small class="mb-0">Be Alert</small>'
                            } else if (data.tempm[i].temperature_moist > 90) {
                                html +=
                                    '<h5 class="mb-0">Water level may increase rapidly</h5><small class="mb-0">Alert</small>'
                            } else if (data.tempm[i].temperature_moist < 15) {
                                html +=
                                    '<h5 class="mb-0">Water level is normal</h5><small class="mb-0">Rest Assured</small>'
                            }
                            html += '</div>'
                        }

                        $('#tempmoist').html(html.substr(9))
                        myChart2.update();
                        setTimeout(get_temperature, 1000)
                    }
                });

                //? for salinity
                $.ajax({
                    type: 'GET',
                    dataType: 'json',
                    url: 'all-temp',
                    success: function(data) {

                        let html

                        myChart3.data.labels.push(id++);
                        for (let i = 0; i < data.temps.length; i++) {
                            //? chart data value
                            myChart3.data.datasets[0].data.push(data.temps[i].temperature_salanity);
                            //? current moist
                            html += '<div class="col-12 col-lg-4 mt-4">'
                            html += '<h5 class="mb-0">' + data.temps[i].temperature_salanity +
                                ' ‰</h5><small class="mb-0">Current Salinity</small>'
                            html += '</div>'
                            //? indicator
                            html += '<div class="col-12 col-lg-4 mt-4">'
                            if (data.temps[i].temperature_salanity > 250000) { // 170000
                                html +=
                                    '<h3 class="mb-0" data-cooltipz-dir="top" data-cooltipz-size="large" aria-label="The water is in normal state."><small class="badge badge-success">Normal</small></h5><small class="mb-0">Indicator</small>'
                            } else if (data.temps[i].temperature_salanity < 250000 && data.temps[i].temperature_salanity > 1000) {
                                html +=
                                    '<h3 class="mb-0" data-cooltipz-dir="top" data-cooltipz-size="large" aria-label="salt concentration in the water will cause water to move out of the fish\'s body through osmosis, leading to dehydration and possibly death."><small class="badge badge-danger">Sea Water</small></h3><small class="mb-0">Indicator</small>'
                            } else if (data.temps[i].temperature_salanity < 1000) {
                                html +=
                                    '<h3 class="mb-0" data-cooltipz-dir="top" data-cooltipz-size="large" aria-label="Put the sensor in the water."><small class="badge badge-warning">Abnormal</small></h3><small class="mb-0">Indicator</small>'
                            }
                            html += '</div>'
                            //? suggestion
                            html += '<div class="col-12 col-lg-4 mt-4">'
                            if (data.temps[i].temperature_salanity > 250000) {
                                html +=
                                    '<h5 class="mb-0">Water is normal</h5><small class="mb-0">Rest Assured</small>'
                            } else if (data.temps[i].temperature_salanity < 250000 && data.temps[i].temperature_salanity > 1000) {
                                html +=
                                    '<h5 class="mb-0">Replace the water</h5><small class="mb-0">Recommendation</small>'
                            } else if (data.temps[i].temperature_salanity < 1000) {
                                html +=
                                    '<h5 class="mb-0">There is no water</h5><small class="mb-0">Alert</small>'
                            }
                            html += '</div>'
                        }

                        $('#tempsal').html(html.substr(9))
                        myChart3.update();
                        setTimeout(get_temperature, 1000)
                    }
                });

                return false;
            }

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

            // getTemp()
            // getTempPh()
            // getTempMoist()
            getTempSal()
            // currentTemp()
            // currentPh()
            // currentMoist()
            currentSal()
            // indicator()
            // indicatorPh()
            // indicatorMoist()
            indicatorSal()
            // recommendation()
            // recommendationPh()
            // recommendationMoist()
            recommendationSal()
            // sendNotifTemp()
            // sendNotifPh()
            // sendNotifMoist()

            let id = 1

            // for temp
            // function getTemp() {
            //     $.ajax({
            //         type: 'GET',
            //         dataType: 'json',
            //         url: 'tempc',
            //         success: function(data) {

            //             myChart.data.labels.push(id++);
            //             for (let i = 0; i < data.length; i++) {
            //                 // myChart.data.labels.push(data[i].temperature_c + "°C");
            //                 myChart.data.datasets[0].data.push(data[i].temperature_c);
            //             }

            //             myChart.update();
            //             setTimeout(getTemp, 1000)
            //         }
            //     });
            // }

            // function currentTemp() {

            //     $.ajax({
            //         type: 'GET',
            //         dataType: 'json',
            //         url: 'tempc',
            //         success: function(data) {

            //             let html

            //             for (let i = 0; i < data.length; i++) {
            //                 html += '<h5 class="mb-0">' + data[i].temperature_c +
            //                     '°C</h5><small class="mb-0">Current Temperature</small>'
            //             }

            //             $('#currentTemp').html(html.substr(9))
            //             setTimeout(currentTemp, 1000)
            //         }
            //     });
            // }

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
                            } else if (data[i].temperature_f > 90.00 && data[i].temperature_f <
                                100.00) {
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
                            } else if (data[i].temperature_f > 90.00 && data[i].temperature_f <
                                100.00) {
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
                            } else if (data[i].temperature_f > 90.00 && data[i].temperature_f <
                                100.00) {
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
                            if (data[i].temperature_salanity < 90 && data[i].temperature_salanity >
                                15) {
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
                            if (data[i].temperature_salanity < 6.00 && data[i].temperature_salanity >
                                3.00) {
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
        })
    </script>
@endsection
