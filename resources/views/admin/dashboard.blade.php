@extends('layouts.app')
@section('title', 'Administrador')

@section('content')

<!-- Page info -->
<div class="page-top-info mb-3 pb-3">
  <div class="container">
    <h4>Dashboard</h4>
    <div class="site-pagination">
      <a href="{{ route('index') }}">Inicio</a> /
      <a href="{{ route('dashboard') }}">Dashboard</a>
    </div>
  </div>
</div>
<!-- Page info end -->


<div class="container">
  <div class="row justify-content-center">
    <!-- Styles -->
    <style>
      #existencias-chart {
        width: 100%;
        height: 500px;
      }

      #sells-chart {
        width: 100%;
        height: 500px;
      }

      #ingresos-chart {
        width: 100%;
        height: 500px;
      }

    </style>

    <!-- Resources -->
    <script src="https://cdn.amcharts.com/lib/4/core.js"></script>
    <script src="https://cdn.amcharts.com/lib/4/charts.js"></script>
    <script src="https://cdn.amcharts.com/lib/4/themes/kelly.js"></script>
    <script src="https://cdn.amcharts.com/lib/4/themes/animated.js"></script>

    <!-- Chart code -->
    <script>
      am4core.ready(function() {

        // Themes begin
        am4core.useTheme(am4themes_kelly);
        am4core.useTheme(am4themes_animated);
        // Themes end

        // Create chart instance
        var chart1 = am4core.create("existencias-chart", am4charts.XYChart);

        // Add data
        chart1.data = [
          @php
          foreach($existences as $existence){
            echo '{';
            echo '"Producto": "' . $existence->nameProduct . '",';
            echo '"Existencias": ' . $existence->existencia_total;
            echo '},
            ';
          }
            // dd($existences);
          @endphp
        ];

        // Create axes

        var categoryAxis2 = chart1.xAxes.push(new am4charts.CategoryAxis());
        categoryAxis2.dataFields.category = "Producto";
        categoryAxis2.renderer.grid.template.location = 0;
        categoryAxis2.renderer.minGridDistance = 30;

        categoryAxis2.renderer.labels.template.adapter.add("dy", function(dy, target) {
          if (target.dataItem && target.dataItem.index & 2 == 2) {
            return dy + 25;
          }
          return dy;
        });

        var valueAxis2 = chart1.yAxes.push(new am4charts.ValueAxis());

        // Create series
        var series2 = chart1.series.push(new am4charts.ColumnSeries());
        series2.dataFields.valueY = "Existencias";
        series2.dataFields.categoryX = "Producto";
        series2.name = "Existencias";
        series2.columns.template.tooltipText = "{categoryX}: [bold]{valueY}[/]";
        series2.columns.template.fillOpacity = .8;

        var columnTemplate2 = series2.columns.template;
        columnTemplate2.strokeWidth = 2;
        columnTemplate2.strokeOpacity = 1;


        // Create chart instance
        var chart = am4core.create("sells-chart", am4charts.XYChart);

        // Add data
        chart.data = [
          @php
          foreach($sells as $sell){
            echo '{';
            echo '"Producto": "' . $sell->nameProduct . '",';
            echo '"Cantidad": ' . $sell->cantidad;
            echo '},
            ';
          }
            // dd($existences);
          @endphp
        ];

        // Create axes

        var categoryAxis = chart.xAxes.push(new am4charts.CategoryAxis());
        categoryAxis.dataFields.category = "Producto";
        categoryAxis.renderer.grid.template.location = 0;
        categoryAxis.renderer.minGridDistance = 30;

        categoryAxis.renderer.labels.template.adapter.add("dy", function(dy, target) {
          if (target.dataItem && target.dataItem.index & 2 == 2) {
            return dy + 25;
          }
          return dy;
        });

        var valueAxis = chart.yAxes.push(new am4charts.ValueAxis());

        // Create series
        var series = chart.series.push(new am4charts.ColumnSeries());
        series.dataFields.valueY = "Cantidad";
        series.dataFields.categoryX = "Producto";
        series.name = "Cantidad";
        series.columns.template.tooltipText = "{categoryX}: [bold]{valueY}[/]";
        series.columns.template.fillOpacity = .8;

        var columnTemplate = series.columns.template;
        columnTemplate.strokeWidth = 2;
        columnTemplate.strokeOpacity = 1;

        var chart3 = am4core.create("ingresos-chart", am4charts.PieChart3D);
        chart3.hiddenState.properties.opacity = 0; // this creates initial fade-in

        chart3.legend = new am4charts.Legend();

        chart3.data = [
          @php
          foreach($totals as $total){
            echo '{';
            echo '"Producto": "' . $total->nameProduct . '",';
            echo '"Total": ' . $total->total;
            echo '},
            ';
          }
            // dd($existences);
          @endphp
        ];

        var series3 = chart3.series.push(new am4charts.PieSeries3D());
        series3.dataFields.value = "Total";
        series3.dataFields.category = "Producto";

      }); // end am4core.ready()
    </script>
    <!-- HTML -->
    <h4 class="mt-5">Ventas por playera</h4>
    <div id="sells-chart"></div>
    <h4 class="mt-5">Existencia de los productos</h4>
    <div id="existencias-chart" class="mb-5"></div>
    <h4 class="mt-5">Ingresos por producto</h4>
    <div id="ingresos-chart" class="mb-5"></div>
  </div>
</div>

@endsection
