@extends('layouts.dashbord')

@section('title', '| Types-De-Lavage')

@section('stylesheet')
    <!-- Select2 -->
    <link rel="stylesheet" href="bower_components/select2/dist/css/select2.min.css">
@endsection

@section('content')
    <section class="content-header">
        <h1>
            Section
            <small>Lavage</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{url('home')}}"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Types de lavage</li>
        </ol>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-xs-6">
                <div class="box box-info">
                    <div class="box-header">
                        <h3 class="box-title">Nouveau type de lavage</h3>
                    </div>
                    <!-- /.box-header -->
                    <form class="form-horizontal" action="/lavage" method="POST">
                        @csrf
                        <div class="box-body">
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Categorie</label>

                                <div class="col-sm-6">
                                    <select class="form-control{{ $errors->has('categorie') ? ' is-invalid' : '' }} select2"
                                            name='categorie'>
                                        <option disabled="disabled">Categorie</option>
                                        <option value="leger">Poids Leger</option>
                                        <option value="moyen">Poids Moyen</option>
                                        <option value="lourd">Poids Lourd</option>
                                    </select>
                                </div>
                            </div>

                            <br>
                            <div class="input-group">
                                <span class="input-group-addon">Libelle</span>
                                <input type="text" id="libelle" name="libelle"
                                       class="form-control{{ $errors->has('libelle') ? ' is-invalid' : '' }}"
                                       placeholder="Intitule du type">
                                @if ($errors->has('libelle'))
                                    <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('libelle') }}</strong>
                            </span>
                                @endif
                            </div>
                            <br>
                            <div class="input-group">
                                <span class="input-group-addon">Tarif</span>
                                <input type="number" id="tarif" name="tarif" min="500" max="5000"
                                       class="form-control{{ $errors->has('tarif') ? ' is-invalid' : '' }}"
                                       placeholder="Entrer le tarif">
                                <span class="input-group-addon">.00 <i class="fa  fa-eur fa-fw"></i></span>
                                @if ($errors->has('tarif'))
                                    <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('tarif') }}</strong>
                            </span>
                                @endif
                            </div>

                        </div>
                        <!-- /.box-body -->
                        <div class="box-footer">
                            <button type="reset" class="btn btn-default">Cancel</button>
                            <button type="submit" class="btn btn-info pull-right">Validate</button>
                        </div>
                        <!-- /.box-footer -->
                    </form>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
            <!-- /.col -->
            <div class="col-xs-6">
                <div class="box box-info">
                    <div class="box-header">
                        <h3 class="box-title">Modification et suppression</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body no-padding">
                        <table class="table table-striped">
                            <tr>
                                <th style="width: 10px">#</th>
                                <th>Libelle</th>
                                <th>Categorie</th>
                                <th class="text-right">Action <i class="fa fa-gear fa-spin"></i></th>
                            </tr>
                            @foreach($lavages as $lavage)
                                <tr>
                                    <td>{{$lavage->id}}</td>
                                    <td>{{$lavage->libelle}}</td>
                                    <td>{{$lavage->categorie}}</td>
                                    <td class="td-actions text-right">
                                        <a type="button" rel="tooltip" class="btn btn-info btn-simple btn-xs"
                                           data-libelle="{{$lavage->libelle}}"
                                           data-tarif="{{$lavage->tarif}}"
                                           data-lav_id={{$lavage->id}} data-toggle="modal"
                                           data-target="#edit"
                                           data-original-title="Edit Lavage">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                        <a type="button" rel="tooltip" class="btn btn-danger btn-simple btn-xs"
                                           data-lav_id={{$lavage->id}} data-toggle="modal"
                                           data-target="#delete"
                                           data-original-title="Delete">
                                            <i class="fa fa-trash-o"></i>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                    <!-- /.box -->
                </div>
            </div>
            <!-- /.row -->
        </div>
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Grille de tarification de lavage</h3>

                        <div class="box-tools">
                            <div class="input-group input-group-sm" style="width: 150px;">
                                <input type="text" name="table_search" class="form-control pull-right"
                                       placeholder="Search">

                                <div class="input-group-btn">
                                    <button type="submit" class="btn btn-default"><i class="fa fa-search"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body table-responsive no-padding">
                        <table class="table table-hover">
                            <tr>
                                <th>ID</th>
                                <th>Libelle</th>
                                <th>Categorie</th>
                                <th>Tarif</th>
                            </tr>
                            @foreach($grilles as $info)
                                <tr>
                                    <td>{{$info->id}}</td>
                                    <td>{{$info->libelle}}</td>
                                    <td>{{$info->categorie}}</td>
                                    <td>{{$info->tarif}} £</td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
        </div>
        <!-- Modal -->
        <div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                    aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel">Edit Category</h4>
                    </div>
                    <form action="{{route('lavage.update','Update-Lavage')}}" method="post">
                        {{method_field('patch')}}
                        {{csrf_field()}}
                        <div class="modal-body">
                            <input type="hidden" name="id" id="lavage_id" value="">
                            @include('lavage.edit')
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save Changes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- Modal -->
        <div class="modal modal-danger fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                    aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title text-center" id="myModalLabel">Delete Confirmation</h4>
                    </div>
                    <form action="{{route('lavage.destroy','delete')}}" method="post">
                        {{method_field('delete')}}
                        {{csrf_field()}}
                        <div class="modal-body">
                            <p class="text-center">
                                Are you sure you want to delete this?
                            </p>
                            <input type="hidden" name="lavage_id" id="lavage_id" value="">

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-success" data-dismiss="modal">No, Cancel</button>
                            <button type="submit" class="btn btn-warning">Yes, Delete</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!-- /.content -->

@endsection

@section('scripts')
    <!-- Select2 -->
    <script src="bower_components/select2/dist/js/select2.full.min.js"></script>
    <script>
        $(function () {
            //Initialize Select2 Elements
            $('.select2').select2()
        })

        $('#edit').on('show.bs.modal', function (event) {

            var button = $(event.relatedTarget)
            var libelle = button.data('libelle')
            var tarif = button.data('tarif')
            var lavage_id = button.data('lav_id')
            var modal = $(this)

            modal.find('.modal-body #libelle').val(libelle);
            modal.find('.modal-body #tarif').val(tarif);
            modal.find('.modal-body #lavage_id').val(lavage_id);
        })

        $('#delete').on('show.bs.modal', function (event) {

            var button = $(event.relatedTarget)

            var lavage_id = button.data('lav_id')
            var modal = $(this)

            modal.find('.modal-body #lavage_id').val(lavage_id);
        })
    </script>

@endsection
