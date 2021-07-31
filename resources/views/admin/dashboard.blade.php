@extends('layouts.master')
@section('title')
    Dashboard
@endsection

@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title"> Statistics</h4>
                </div>
                <div class="card-body">
                    <div style="margin:30px">
                        <h6 style="display:inline;float:left">Total registered child = {{ $content['total'] }} </h6>
                        <h6 style="display:inline;float:right">Total health personnel = {{ $content['totalHP'] }}</h6>
                    </div>
                    <br><br>
                    <div class="row">
                        <div class="col-md-6 col-lg-6">
                            <label>Vaccine</label>
                            <select name="vaccine" class="form-control" id='vaccine' onChange="vaccineChange(this);">
                                @foreach ($vaccines as $vaccine)
                                    <option value="{{ $vaccine->name }}-{{ $content[$vaccine->name] }}">
                                        {{ $vaccine->name }}
                                    </option>
                                @endforeach
                            </select>
                            <div id="piechart" style="height: 300px;"></div>
                        </div>
                        <div class="col-md-6 col-lg-6">
                            {{-- <label>Choose Address Field</label>
                            <select name="address" class="form-control">
                                <option value="">Province</option>
                                <option value="">District</option>
                                <option value="">Municipality</option>
                            </select> --}}
                            <div id="barchart_values" style="height: 300px;"></div>
                        </div>



                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
        google.charts.load('current', {
            'packages': ['corechart']
        });
        google.charts.setOnLoadCallback(drawChart);

        var vaccine = "{{ $vaccines->first()->name }}-{{ $content[$vaccines->first()->name] }}";
        var vaccinated = parseInt(vaccine.split('-')[1]);
        var notVaccinated = parseInt("{{ $content['total'] }}") - vaccinated;

        function vaccineChange(sel) {
            vaccine = sel.options[sel.selectedIndex].value;
            vaccinated = parseInt(vaccine.split('-')[1]);
            notVaccinated = parseInt("{{ $content['total'] }}") - vaccinated;
            reDrawPieChart();
            reDrawBarChart();

        }
        var pieChart;

        function reDrawPieChart() {
            var data = google.visualization.arrayToDataTable([
                ['Status', 'numbers'],
                ['Vaccinated', vaccinated],
                ['Not Vaccinated', notVaccinated],
            ]);

            var options = {
                title: vaccine.split('-')[0],
                is3D: true,
            };


            pieChart.draw(data, options);
        }

        function reDrawBarChart() {
            var data = google.visualization.arrayToDataTable([
                ["Province", "Vaccinated", {
                    role: "style"
                }],
                ["Province-1", vaccinated, "#b87333"],
                ["Province-2", 0, "silver"],
                ["Province-3", 0, "gold"],
                ["Province-4", 0, "color: #e5e4e2"],
                ["Province-5", vaccinated + 5, "color: #e5e4c2"],
                ["Province-6", 0, "color: #e5e4b2"],
                ["Province-7", 0, "color: #e5e4a2"],
            ]);

            var view = new google.visualization.DataView(data);
            view.setColumns([0, 1,
                {
                    calc: "stringify",
                    sourceColumn: 1,
                    type: "string",
                    role: "annotation"
                },
                2
            ]);

            var options = {
                title: "Child who got vaccinated.",
                bar: {
                    groupWidth: "50%"
                },
                legend: {
                    position: "none"
                },
            };
            barChart.draw(view, options);
        }

        function drawChart() {

            var data = google.visualization.arrayToDataTable([
                ['Status', 'numbers'],
                ['Vaccinated', vaccinated],
                ['Not Vaccinated', notVaccinated],
            ]);

            var options = {
                title: vaccine.split('-')[0],
                is3D: true,
            };

            pieChart = new google.visualization.PieChart(document.getElementById('piechart'));

            pieChart.draw(data, options);
        }
    </script>
    //bar diagram
    <script type="text/javascript">
        google.charts.load("current", {
            packages: ["corechart"]
        });
        google.charts.setOnLoadCallback(drawChart);

        var barChart;

        function drawChart() {
            var data = google.visualization.arrayToDataTable([
                ["Province", "Vaccinated", {
                    role: "style"
                }],
                ["Province-1", notVaccinated, "#b87333"],
                ["Province-2", 0, "silver"],
                ["Province-3", 0, "gold"],
                ["Province-4", 0, "color: #e5e4e2"],
                ["Province-5", vaccinated, "color: #e5e4c2"],
                ["Province-6", 0, "color: #e5e4b2"],
                ["Province-7", 0, "color: #e5e4a2"],
            ]);

            var view = new google.visualization.DataView(data);
            view.setColumns([0, 1,
                {
                    calc: "stringify",
                    sourceColumn: 1,
                    type: "string",
                    role: "annotation"
                },
                2
            ]);

            var options = {
                title: "Child who got vaccinated.",
                bar: {
                    groupWidth: "50%"
                },
                legend: {
                    position: "none"
                },
            };
            barChart = new google.visualization.BarChart(document.getElementById("barchart_values"));
            barChart.draw(view, options);
        }
    </script>
@endsection
