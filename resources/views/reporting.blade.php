@extends('layouts.dashbord')

@section('title', 'ReportingController')

@section('stylesheet')
    <!-- Morris chart -->
    <link rel="stylesheet" href="bower_components/morris.js/morris.css">
    <!-- jvectormap -->
    <link rel="stylesheet" href="bower_components/jvectormap/jquery-jvectormap.css">
    <!-- Date Picker -->
    <link rel="stylesheet" href="bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="bower_components/bootstrap-daterangepicker/daterangepicker.css">
    <!-- bootstrap wysihtml5 - text editor -->
    <link rel="stylesheet" href="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
@endsection

@section('content')

    <section class="content-header">
        <h1>
            Reporting
            <small>statistique des activites</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{url('/home')}}"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Reporting</li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Monthly Recap Report</h3>

                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                            </button>
                            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="row">
                            <div class="col-md-10">
                                <p class="text-center">
                                    <strong>Activities: 1 Jan, {{$recap->year}} - 31 Dec, {{$recap->year}}</strong>
                                </p>

                                <div class="chart">
                                    <canvas id="areaChart" style="height:250px"></canvas>
                                </div>
                            </div>
                            <!-- /.col -->
                            <div class="col-md-2">
                                <p class="text-center">
                                    <strong>Passages</strong>
                                </p>

                                <div class="progress-group">
                                    <span class="progress-text">Aujourd'hui</span>
                                    <span class="progress-number"><b>{{$passages->daily}}</b></span>

                                    <div class="progress sm">
                                        <div class="progress-bar progress-bar-aqua" style="width: 80%"></div>
                                    </div>
                                </div>
                                <!-- /.progress-group -->
                                <div class="progress-group">
                                    <span class="progress-text">Mois</span>
                                    <span class="progress-number"><b>{{$passages->monthly}}</b></span>

                                    <div class="progress sm">
                                        <div class="progress-bar progress-bar-red" style="width: 80%"></div>
                                    </div>
                                </div>
                                <!-- /.progress-group -->
                                <div class="progress-group">
                                    <span class="progress-text">Année</span>
                                    <span class="progress-number"><b>{{$passages->yearly}}</b></span>

                                    <div class="progress sm">
                                        <div class="progress-bar progress-bar-green" style="width: 80%"></div>
                                    </div>
                                </div>
                                <!-- /.progress-group -->
                            </div>
                            <!-- /.col -->
                        </div>
                        <!-- /.row -->
                    </div>
                    <!-- ./box-body -->
                    <div class="box-footer">
                        <div class="row">
                            <div class="col-sm-4 col-xs-6">
                                <div class="description-block border-right">
                                    <h5 class="description-header">{{$revenues->yearly}} FCFA</h5>
                                    <span class="description-text">REVENUE ANNUELLE</span>
                                </div>
                                <!-- /.description-block -->
                            </div>
                            <!-- /.col -->
                            <div class="col-sm-4 col-xs-6">
                                <div class="description-block border-right">
                                    <h5 class="description-header">{{$revenues->monthly}} FCFA</h5>
                                    <span class="description-text">REVENUE MENSUEL</span>
                                </div>
                                <!-- /.description-block -->
                            </div>
                            <!-- /.col -->
                            <div class="col-sm-4 col-xs-6">
                                <div class="description-block border-right">
                                    <h5 class="description-header">{{$revenues->daily}} FCFA</h5>
                                    <span class="description-text">REVENUE JOURNALIERE</span>
                                </div>
                                <!-- /.description-block -->
                            </div>
                            <!-- /.col -->
                        </div>
                        <!-- /.row -->
                    </div>
                    <!-- /.box-footer -->
                </div>
                <!-- /.box -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
        <!-- Small boxes (Stat box) -->
        <div class="row">
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-aqua">
                    <div class="inner">
                        <h3>{{$stats->wash}}</h3>

                        <p>Passages</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-monitor"></i>
                    </div>
                    <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-green">
                    <div class="inner">
                        <h3>{{$stats->car}}</h3>

                        <p>Vehicules</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-model-s"></i>
                    </div>
                    <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-yellow">
                    <div class="inner">
                        <h3>{{$stats->client}}</h3>

                        <p>Clients</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-person-add"></i>
                    </div>
                    <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-red">
                    <div class="inner">
                        <h3>{{$stats->loyal}}</h3>

                        <p>Fideles</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-person-stalker"></i>
                    </div>
                    <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
        </div>
        <!-- /.row -->
        <!-- Main row -->
        <div class="row">
            <!-- Left col -->
            <section class="col-lg-7 connectedSortable">
                <div class="box box-solid">
                    <div class="box-header with-border">
                        <h3 class="box-title">Activités du Jour</h3>

                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                            </button>
                            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="table-responsive">
                            <table class="table no-margin">
                                <thead>
                                <tr>
                                    <th>Facture ID</th>
                                    <th>Client</th>
                                    <th>Statut</th>
                                    <th>Vehicule</th>
                                    <th>Lavage</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($activities as $activity)
                                    <tr>
                                        <td><a href="pages/examples/invoice.html">{{$activity->facture}}</a></td>
                                        <td>{{$activity->nom}} {{$activity->prenoms}}</td>
                                        @if($activity->fidele)
                                            <td><span class="label label-success">Fidele</span></td>
                                        @else
                                            <td><span class="label label-default">Non fidele</span></td>
                                        @endif
                                        <td><span class="label label-primary">{{$activity->immatriculation}}</span></td>
                                        <td>{{$activity->libelle}}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!-- /.table-responsive -->
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer clearfix">
                        <a href="javascript:void(0)" class="btn btn-sm btn-default btn-flat pull-left">Voir +</a>
                    </div>
                    <!-- /.box-footer -->
                </div>
                <!-- /.box -->
            </section>
            <!-- /.Left col -->
            <!-- right col (We are only adding the ID to make the widgets sortable)-->
            <section class="col-lg-5 connectedSortable">
                <!-- Calendar -->
                <div class="box box-solid bg-aqua-gradient">
                    <div class="box-header">
                        <i class="fa fa-calendar"></i>

                        <h3 class="box-title">Calendar</h3>
                        <!-- tools box -->
                        <div class="pull-right box-tools">
                            <button type="button" class="btn btn-info btn-sm" data-widget="collapse"><i class="fa fa-minus"></i>
                            </button>
                            <button type="button" class="btn btn-info btn-sm" data-widget="remove"><i class="fa fa-times"></i>
                            </button>
                        </div>
                        <!-- /. tools -->
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body no-padding">
                        <!--The calendar -->
                        <div id="calendar" style="width: 100%"></div>
                    </div>
                </div>
                <!-- /.box -->
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Passages recents</h3>

                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                            </button>
                            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <ul class="products-list product-list-in-box">
                            @foreach($recently as $recent)
                                <li class="item">
                                    <div class="product-img">
                                        <img src="dist/img/default-50x50.gif" alt="Product Image">
                                    </div>
                                    <div class="product-info">
                                        <a href="javascript:void(0)" class="product-title">{{$recent->immatriculation}}
                                            <span class="label label-warning pull-right">{{$recent->montant}}</span></a>
                                        <span class="product-description">{{$recent->libelle}}</span>
                                    </div>
                                </li>
                                <!-- /.item -->
                            @endforeach
                        </ul>
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer text-center">
                        <a href="javascript:void(0)" class="uppercase">Voir plus d'activites</a>
                    </div>
                    <!-- /.box-footer -->
                </div>
                <!-- /.box -->

                <div class="box box-danger">
                    <div class="box-header with-border">
                        <h3 class="box-title">Nombre de passage par categorie</h3>

                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                            </button>
                            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                        </div>
                    </div>
                    <div class="box-body">
                        <div class="row">
                            <div class="col-md-8">
                                    <canvas id="pieChart" style="height:250px"></canvas>
                            </div>
                            <!-- /.col -->
                            <div class="col-md-4">
                                <ul class="chart-legend clearfix">
                                    <li><i class="fa fa-circle-o text-red"></i> Leger</li>
                                    <li><i class="fa fa-circle-o text-green"></i> Moyen</li>
                                    <li><i class="fa fa-circle-o text-yellow"></i> Lourd</li>
                                </ul>
                            </div>
                            <!-- /.col -->
                        </div>
                        <!-- /.row -->
                    </div>
                    <!-- /.box-body -->
                    @if($categories->total)
                    <div class="box-footer no-padding">
                        <ul class="nav nav-pills nav-stacked">
                            <li>
                                <a>Categorie Leger
                                    <span class="pull-right text-red">
                                        {{(($categories->leger)/($categories->total))*100}}%
                                    </span>
                                </a>
                            </li>
                            <li>
                                <a>Categorie Moyen
                                    <span class="pull-right text-green">
                                       {{(($categories->moyen)/($categories->total))*100}}%
                                    </span>
                                </a>
                            </li>
                            <li><a>Categorie Lourd
                                    <span class="pull-right text-yellow">
                                       {{(($categories->lourd)/($categories->total))*100}}%
                                    </span>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <!-- /.footer -->
                </div>
                @else
                    <div class="box-footer no-padding">
                        <ul class="nav nav-pills nav-stacked">
                            <li>
                                <a>Categorie Leger
                                    <span class="pull-right text-red">
                                        0%
                                    </span>
                                </a>
                            </li>
                            <li>
                                <a>Categorie Moyen
                                    <span class="pull-right text-green">
                                      0%
                                    </span>
                                </a>
                            </li>
                            <li><a>Categorie Lourd
                                    <span class="pull-right text-yellow">
                                      0%
                                    </span>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <!-- /.footer -->
                @endif
            </section>
            <!-- right col -->
        </div>
        <!-- /.row (main row) -->

    </section>
    <!-- /.content -->
@endsection

@section('scripts')
    <script src="bower_components/jquery-ui/jquery-ui.min.js"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
        $.widget.bridge('uibutton', $.ui.button);
    </script>
    <!-- Sparkline -->
    <script src="bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
    <!-- jvectormap -->
    <script src="plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
    <script src="plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
    <!-- jQuery Knob Chart -->
    <script src="bower_components/jquery-knob/dist/jquery.knob.min.js"></script>
    <!-- daterangepicker -->
    <script src="bower_components/moment/min/moment.min.js"></script>
    <script src="bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
    <!-- datepicker -->
    <script src="bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
    <!-- Bootstrap WYSIHTML5 -->
    <script src="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
    <script src="bower_components/chart.js/Chart.js"></script>
    <!-- AdminLTE App -->
    <script src="dist/js/pages/dashboard.js"></script>

    <!-- page script -->
    <script>
        $(function () {
            /* ChartJS
             * -------
             * Here we will create a few charts using ChartJS
             */

            //-------------
            //- PIE CHART -
            //-------------
            // Get context with jQuery - using jQuery's .get() method.
            var pieChartCanvas = $('#pieChart').get(0).getContext('2d')
            var pieChart       = new Chart(pieChartCanvas)
            var PieData        = [
                {

                    value    : '{{$categories->leger}}',
                    color    : '#f56954',
                    highlight: '#f56954',
                    label    : 'Leger'
                },
                {
                    value    : '{{$categories->moyen}}',
                    color    : '#00a65a',
                    highlight: '#00a65a',
                    label    : 'Moyen'
                },
                {
                    value    : '{{$categories->lourd}}',
                    color    : '#f39c12',
                    highlight: '#f39c12',
                    label    : 'Lourd'
                }
            ]
            var pieOptions     = {
                //Boolean - Whether we should show a stroke on each segment
                segmentShowStroke    : true,
                //String - The colour of each segment stroke
                segmentStrokeColor   : '#fff',
                //Number - The width of each segment stroke
                segmentStrokeWidth   : 2,
                //Number - The percentage of the chart that we cut out of the middle
                percentageInnerCutout: 50, // This is 0 for Pie charts
                //Number - Amount of animation steps
                animationSteps       : 100,
                //String - Animation easing effect
                animationEasing      : 'easeOutBounce',
                //Boolean - Whether we animate the rotation of the Doughnut
                animateRotate        : true,
                //Boolean - Whether we animate scaling the Doughnut from the centre
                animateScale         : false,
                //Boolean - whether to make the chart responsive to window resizing
                responsive           : true,
                // Boolean - whether to maintain the starting aspect ratio or not when responsive, if set to false, will take up entire container
                maintainAspectRatio  : true,
                //String - A legend template
                legendTemplate       : '<ul class="< %=name.toLowerCase()%>-legend"><% for (var i=0; i<segments.length; i++){%><li><span style="background-color:< %=segments[i].fillColor%>"></span><%if(segments[i].label){%>< %=segments[i].label%><%}%></li><%}%></ul>'
    }
    //Create pie or douhnut chart
    // You can switch between pie and douhnut using the method below.
    pieChart.Doughnut(PieData, pieOptions)

            //--------------
            //- AREA CHART -
            //--------------

            // Get context with jQuery - using jQuery's .get() method.
            var areaChartCanvas = $('#areaChart').get(0).getContext('2d')
            // This will get the first returned node in the jQuery collection.
            var areaChart       = new Chart(areaChartCanvas)

            var areaChartData = {
                labels  : ['Janvier', 'Fevrier', 'Mars', 'Avril', 'Mai', 'Juin', 'Juillet', 'Aout', 'Septembre', 'Octobre', 'Novembre', 'Decembre'],
                datasets: [
                    {
                        label               : 'Passages',
                        fillColor           : 'rgba(210, 214, 222, 1)',
                        strokeColor         : 'rgba(2, 74, 9, 1)',
                        pointColor          : 'rgba(210, 214, 222, 1)',
                        pointStrokeColor    : '#c1c7d1',
                        pointHighlightFill  : '#fff',
                        pointHighlightStroke: 'rgba(220,220,220,1)',
                        data                : [
                            '{{$recap->jan}}',
                            '{{$recap->fev}}',
                            '{{$recap->mar}}',
                            '{{$recap->avr}}',
                            '{{$recap->mai}}',
                            '{{$recap->jui}}',
                            '{{$recap->jul}}',
                            '{{$recap->aou}}',
                            '{{$recap->sep}}',
                            '{{$recap->oct}}',
                            '{{$recap->nov}}',
                            '{{$recap->dec}}']
                    }
                ]
            }

            var areaChartOptions = {
                //Boolean - If we should show the scale at all
                showScale               : true,
                //Boolean - Whether grid lines are shown across the chart
                scaleShowGridLines      : false,
                //String - Colour of the grid lines
                scaleGridLineColor      : 'rgba(0,0,0,.05)',
                //Number - Width of the grid lines
                scaleGridLineWidth      : 1,
                //Boolean - Whether to show horizontal lines (except X axis)
                scaleShowHorizontalLines: true,
                //Boolean - Whether to show vertical lines (except Y axis)
                scaleShowVerticalLines  : true,
                //Boolean - Whether the line is curved between points
                bezierCurve             : true,
                //Number - Tension of the bezier curve between points
                bezierCurveTension      : 0.3,
                //Boolean - Whether to show a dot for each point
                pointDot                : false,
                //Number - Radius of each point dot in pixels
                pointDotRadius          : 4,
                //Number - Pixel width of point dot stroke
                pointDotStrokeWidth     : 1,
                //Number - amount extra to add to the radius to cater for hit detection outside the drawn point
                pointHitDetectionRadius : 20,
                //Boolean - Whether to show a stroke for datasets
                datasetStroke           : true,
                //Number - Pixel width of dataset stroke
                datasetStrokeWidth      : 2,
                //Boolean - Whether to fill the dataset with a color
                datasetFill             : true,
                //String - A legend template
                legendTemplate          : '<ul class=" < %=name.toLowerCase()%>-legend">< %for (var i=0; i<datasets.length; i++){%><li><span style="background-color:< %=datasets[i].lineColor%>"></span>< %if(datasets[i].label){%>< %=datasets[i].label%><%}%></li><%}%></ul>',
      //Boolean - whether to maintain the starting aspect ratio or not when responsive, if set to false, will take up entire container
      maintainAspectRatio     : true,
      //Boolean - whether to make the chart responsive to window resizing
      responsive              : true
    }

    //Create the line chart
    areaChart.Line(areaChartData, areaChartOptions)
  })
</script>
@endsection
