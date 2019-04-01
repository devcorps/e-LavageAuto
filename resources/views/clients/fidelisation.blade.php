@extends('layouts.dashbord')

@section('title', '| Clients')

@section('stylesheet')
    <link rel="stylesheet" href="bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
@endsection

@section('content')
    <section class="content-header">
        <h1>
            Clients
            <small>consultation</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{url('home')}}"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Clients</li>
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
                        <table id="example2" class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>Nom</th>
                                <th>Prenom(s)</th>
                                <th>Telephone</th>
                                <th>commune</th>
                                <th>N<sup>o</sup> Permis</th>
                                <th>Nombre de passage</th>
                                <th class="bg-gray-active"></th>
                                <th class="bg-gray-active"></th>
                                <th class="bg-gray-active"></th>
                                <th class="bg-gray-active"></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($fidelistes as $fideliste)

                                <tr>
                                    <td>{{$fideliste->nom}}</td>
                                    <td>{{$fideliste->prenoms}}</td>
                                    <td>{{$fideliste->telephone}}</td>
                                    <td>{{$fideliste->commune}}</td>
                                    <td>{{$fideliste->permis}}</td>
                                    <td>{{$fideliste->nombrePass}}</td>
                                    <td class="text-center">
                                        @if($fideliste->fidele == 0)
                                        <a href="{{url('/loyal',['id' => $fideliste->id])}}" type="button" class="btn btn-success btn-xs" data-toggle="tooltip" data-placement="top" title="Fideliser">
                                            <i class="fa fa-user-plus"></i>
                                        </a>
                                            @else
                                            <a disabled="disabled" type="button" class="btn btn-success btn-xs" data-toggle="tooltip" data-placement="top" title="Déjà Fidele">
                                                <i class="fa fa-user-plus"></i>
                                            </a>
                                            @endif
                                    </td>
                                    <td class="text-center">
                                        <a action="{{route('bonus', ['id' => $fideliste->id])}}" type="button" class="btn btn-danger btn-xs" data-toggle="tooltip" data-placement="top" title="Bonus">
                                            <i class="glyphicon glyphicon-gift"></i>
                                        </a>
                                    </td>
                                    <td class="text-center">
                                        <a action="{{route('encouragement', ['id' => $fideliste->id])}}" type="button" class="btn btn-primary btn-xs" data-toggle="tooltip" data-placement="top" title="Encouragement">
                                            <i class="glyphicon glyphicon-envelope"></i>
                                        </a>
                                    </td>
                                    <td class="text-center">
                                        <a href="/client/{{$fideliste->id}}" type="button" class="btn btn-default btn-xs" data-toggle="tooltip" data-placement="top" title="Voir Vehicules">
                                            <i class="fa fa-car"></i>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                            <tfoot>
                            <tr>
                                <th>Nom</th>
                                <th>Prenom(s)</th>
                                <th>Telephone</th>
                                <th>commune</th>
                                <th>N<sup>o</sup> Permis</th>
                                <th>Nombre de passage</th>
                                <th colspan="4" class="bg-gray-active text-center">Actions</th>
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
