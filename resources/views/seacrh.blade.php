@extends('layouts.dashbord')

@section('title', '| Search result')

@section('stylesheet')
    <link rel="stylesheet" href="bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
    <link href="assets/libs/jquery-steps/jquery.steps.css" rel="stylesheet">
    <link href="assets/libs/jquery-steps/steps.css" rel="stylesheet">
    <link rel="stylesheet" href="bower_components/select2/dist/css/select2.min.css">
    <link rel="stylesheet" href="plugins/iCheck/all.css">
@endsection

@section('content')

    <section class="content-header">
        <h1>
            Panel work
            <small>Blank example to the panel work</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{url('home')}}"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Today activities</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="callout callout-info">
            <h4>Tip!</h4>
            <p>The search results for your query <b>{{$qre}}</b> are :</p>
        </div>
        <div class="box">>
                <div class="card card-body">
                    <div class="box-header">
                        <h3 class="box-title">Sample Cars details</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>Immatriculation</th>
                                <th>Marque</th>
                                <th>Modele</th>
                                <th>Categorie</th>
                                <th class="text-center">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($vehis as $vehicule)
                                <tr>
                                    <td>{{$vehicule->immatriculation}}</td>
                                    <td>{{$vehicule->marque}}</td>
                                    <td>{{$vehicule->model}}</td>
                                    <td>{{$vehicule->categorie}}</td>
                                    <td class="text-center">
                                        <a type="button" class="btn btn-outline-danger btn-warning"
                                           data-vehicule_id={{$vehicule->id}} data-toggle="modal"
                                           data-immatriculation={{$vehicule->immatriculation}}
                                                   data-target="#passage"
                                           data-original-title="passage">
                                            <i class="fa fa-recycle fa-spin"></i> <span>Passage</span>
                                            <small class="label pull-right bg-navy"> Add</small>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
        </div>
        <!-- /.box -->

    </section>
    <!-- Modal -->
    <div class="modal fade" id="passage" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Ajouter un passage</h4>
                </div>
                <form action="{{route('addPass','Add-Passage')}}" method="post">
                    {{csrf_field()}}
                    <div class="modal-body">
                        <input type="hidden" name="vehicule_id" id="vehicule_id" value="">
                        @include('passage.addFast')
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Add Passage</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- /.content -->
@endsection

@section('scripts')
    <script src="bower_components/select2/dist/js/select2.full.min.js"></script>
    <script src="plugins/iCheck/icheck.min.js"></script>
    <!-- InputMask -->
    <script src="plugins/input-mask/jquery.inputmask.js"></script>
    <script src="plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
    <script src="plugins/input-mask/jquery.inputmask.extensions.js"></script>
    <script>
        $(function () {
            //Initialize Select2 Elements
            $('.select2').select2()
            //iCheck for checkbox and radio inputs
            $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
                checkboxClass: 'icheckbox_minimal-blue',
                radioClass   : 'iradio_minimal-blue'
            })
            //Flat red color scheme for iCheck
            $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
                checkboxClass: 'icheckbox_flat-green',
                radioClass   : 'iradio_flat-green'
            })
            //Datemask dd/mm/yyyy
            $('#datemask').inputmask('dd/mm/yyyy', { 'placeholder': 'dd/mm/yyyy' })
            //Datemask2 mm/dd/yyyy
            $('#datemask2').inputmask('mm/dd/yyyy', { 'placeholder': 'mm/dd/yyyy' })
            //Money Euro
            $('[data-mask]').inputmask()

            $('#passage').on('show.bs.modal', function (event) {

                var button = $(event.relatedTarget)
                var vehicule_id = button.data('vehicule_id')
                var immatriculation = button.data('immatriculation')
                var modal = $(this)

                modal.find('.modal-body #vehicule_id').val(vehicule_id);
                modal.find('.modal-body #immatriculation').val(immatriculation);
            })
        })
    </script>
@endsection