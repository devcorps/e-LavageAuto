@extends('layouts.dashbord')

@section('title', '| Consultation_vehicules')

@section('stylesheet')
    <link rel="stylesheet" href="bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
@endsection

@section('content')
    <section class="content-header">
        <h1>
            Vehicules
            <small>consultation</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{url('home')}}"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Vehicules</li>
        </ol>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Data Table With Full Features</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>Immatriculation</th>
                                <th>Marque</th>
                                <th>Model</th>
                                <th>Client</th>
                                <th>Date d'enregistrement</th>
                                <th>Nombre de Passage</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($vehicules as $vehicule)

                                <tr>
                                    <td>{{$vehicule->immatriculation}}</td>
                                    <td>{{$vehicule->marque}}</td>
                                    <td>{{$vehicule->model}}</td>
                                    <td>{{$vehicule->client_id}}</td>
                                    <td>{{$vehicule->created_at}}</td>
                                    <td>{{$vehicule->nombrePassage}}</td>
                                </tr>
                            @endforeach
                            </tbody>
                            <tfoot>
                            <tr>
                                <th>Immatriculation</th>
                                <th>Marque</th>
                                <th>Model</th>
                                <th>Client</th>
                                <th>Date d'enregistrement</th>
                                <th>Nombre de Passage</th>
                            </tr>
                            </tfoot>
                        </table>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>
@endsection

@section('scripts')
    <!-- DataTables -->
    <script src="bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
    <script>
        $(function () {
            $('#example1').DataTable()
            $('#example2').DataTable({
                'paging': true,
                'lengthChange': false,
                'searching': false,
                'ordering': true,
                'info': true,
                'autoWidth': false
            })
        })
    </script>
@endsection
