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
                        <h6 style="display:inline;float:left">Total registered child = 345000 </h6>        
                        <h6 style="display:inline;float:right">Total health personnel = 100</h6>
                  </div>    
                  <br><br>
                   <div class="row">
                    <div class="col-md-6 col-lg-6">
                                    <label>Vaccine</label>
                                    <select name="vaccine" class="form-control">
                                        <option value="">Polio</option>
                                        <option value="">DDT</option>
                                        <option value="">BCG</option>
                                        <option value="">Corona</option>
                                    </select>
                                </div>
                    <div class="col-md-6 col-lg-6">
                                    <label>Choose Address</label>
                                    <select name="address" class="form-control">
                                        <option value="">Dharan</option>
                                         <option value="">Butwal</option>
                                          <option value="">Chitwan</option>
                                           <option value="">Kathmandu</option>
                                    </select>
                                </div>
                  
                 
                  <div class="col-lg-6" id="piechart" style="width: 400px; height: 300px;"></div>
                  <div class="col-lg-6" id="barchart_values" style="width: 400px; height: 200px;"></div>
                  
                </div>
                
        </div>
      </div>
    </div>
  </div> 
  @endsection

@section('scripts')
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['Task', 'Hours per Day'],
          ['Work',     11],
          ['Eat',      2],
          ['Commute',  2],
          ['Watch TV', 2],
          ['Sleep',    7]
        ]);

        var options = {
          title: 'Vaccine',
          is3D: true,
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

        chart.draw(data, options);
      }
      </script>
      //bar diagram 
      <script type="text/javascript">
      google.charts.load("current", {packages:["corechart"]});
    google.charts.setOnLoadCallback(drawChart);
    function drawChart() {
      var data = google.visualization.arrayToDataTable([
        ["Element", "Density", { role: "style" } ],
        ["Copper", 8.94, "#b87333"],
        ["Silver", 10.49, "silver"],
        ["Gold", 19.30, "gold"],
        ["Platinum", 21.45, "color: #e5e4e2"]
      ]);

      var view = new google.visualization.DataView(data);
      view.setColumns([0, 1,
                       { calc: "stringify",
                         sourceColumn: 1,
                         type: "string",
                         role: "annotation" },
                       2]);

      var options = {
        title: "Child who got vaccinated.",
        width: 400,
        height: 280,
        bar: {groupWidth: "50%"},
        legend: { position: "none" },
      };
      var chart = new google.visualization.BarChart(document.getElementById("barchart_values"));
      chart.draw(view, options);
  }
      </script>
@endsection