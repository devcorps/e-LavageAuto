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
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>Nom</th>
                                <th>Prenom(s)</th>
                                <th>Telephone</th>
                                <th>commune</th>
                                <th>N<sup>o</sup> Permis</th>
                                <th>Status</th>
                                <th></th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($clients as $client)

                                <tr>
                                    <td>{{$client->nom}}</td>
                                    <td>{{$client->prenoms}}</td>
                                    <td>{{$client->telephone}}</td>
                                    <td>{{$client->commune}}</td>
                                    <td>{{$client->permis}}</td>
                                    @if($client->fidele == 0)
                                        <td><span class="label label-warning">Non fidele</span></td>
                                    @else
                                        <td><span class="label label-primary">Fidele</span></td>
                                    @endif
                                    <td>
                                        <a href="/client/{{$client->id}}" type="button" class="btn btn-secondary btn-xs" data-toggle="tooltip" data-placement="top" title="Voir vehicules">
                                            <i class="fa fa-car"></i>
                                        </a>
                                    </td>
                                    <td class="text-center">
                                        <a type="button" rel="tooltip"
                                           class="btn btn-info btn-simple btn-xs"
                                           data-nom="{{$client->nom}}"
                                           data-prenoms="{{$client->prenoms}}"
                                           data-commune="{{$client->commune}}"
                                           data-telephone="{{$client->telephone}}"
                                           data-client_id={{$client->id}} data-toggle="modal"
                                           data-target="#edit"
                                           data-original-title="Edit Client">
                                            <i class="fa fa-edit"></i>
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
                                <th>Status</th>
                                <th colspan="2" class="text-center">Action</th>
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
    <!-- Modal -->
    <div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Edit Category</h4>
                </div>
                <form action="{{route('client.update','Edit-Client')}}" method="post">
                    {{method_field('patch')}}
                    {{csrf_field()}}
                    <div class="modal-body">
                        <input type="hidden" name="client_id" id="client_id" value="">
                        @include('clients.edit')
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save Changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
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
        $('#edit').on('show.bs.modal', function (event) {

            var button = $(event.relatedTarget)
            var nom = button.data('nom')
            var prenoms = button.data('prenoms')
            var commune = button.data('commune')
            var telephone = button.data('telephone')
            var client_id = button.data('client_id')
            var modal = $(this)

            modal.find('.modal-body #nom').val(nom);
            modal.find('.modal-body #prenoms').val(prenoms);
            modal.find('.modal-body #commune').val(commune);
            modal.find('.modal-body #telephone').val(telephone);
            modal.find('.modal-body #client_id').val(client_id);
        })

    </script>
@endsection
