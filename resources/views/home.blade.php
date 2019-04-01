@extends('layouts.dashbord')

@section('title', '| Homepage')

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

            <p>Add the fixed class to the body tag to get this layout. The fixed layout is your best option if your sidebar
                is bigger than your content because it prevents extra unwanted scrolling.</p>
        </div>
        <div class="box">
            <div class="box-header with-border">
                <a class="btn btn-default pull-left" data-toggle="collapse" href="#nouveau" role="button" aria-expanded="false" aria-controls="collapseExample">
                    Enregistrement New Wash <i class="fa fa-laptop"></i>
                </a>
                <a class="btn btn-primary pull-right" data-toggle="collapse" href="#recherche" role="button" aria-expanded="true" aria-controls="collapseExample">
                    Rechercher Vehicule <i class="fa fa-search"></i>
                </a>
            </div>
            <div class="collapse" id="nouveau">
                <div class="card card-body">
                    <div class="box-header">
                        <h3 class="box-title">Data Table With Full Features</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        @include('passage.new')
                    </div>
                </div>
            </div>
            <div class="collapse" id="recherche">
                <div class="card card-body">
                    <div class="box-header">
                        <h3 class="box-title">Data Table With Full Features</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>Immatriculation</th>
                                <th>Marque/Model</th>
                                <th>Client</th>
                                <th>N° Permis</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($vehicules as $vehicule)
                                <tr>
                                    <td>{{$vehicule->immatriculation}}</td>
                                    <td>{{$vehicule->marque}}/{{$vehicule->model}}</td>
                                    <td>{{$vehicule->nom}} {{$vehicule->prenoms}}</td>
                                    <td>{{$vehicule->permis}}</td>
                                    <td class="text-center">
                                        <a type="button" class="btn btn-outline-danger btn-warning"
                                           data-vehicule_id={{$vehicule->id}} data-toggle="modal"
                                           data-immatriculation={{$vehicule->immatriculation}}
                                           data-marque={{$vehicule->marque}}
                                           data-client_nom={{$vehicule->nom}}
                                           data-client_prenom={{$vehicule->prenoms}}
                                           data-telephone={{$vehicule->telephone}}
                                           data-target="#passage"
                                           data-original-title="passage">
                                            <i class="fa fa-recycle fa-spin"></i> <span>Passage</span>
                                            <small class="label pull-right bg-navy"> new</small>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                            <tfoot>
                            <tr>
                                <th>Immatriculation</th>
                                <th>Marque/Model</th>
                                <th>Client</th>
                                <th>N° Permis</th>
                                <th class="text-center">Action</th>
                            </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
            <div class="box-footer">
            </div>
            <!-- /.box-footer-->
        </div>
        <!-- /.box -->
        <!-- Default box -->
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">Title</h3>

                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                        <i class="fa fa-minus"></i></button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
                        <i class="fa fa-times"></i></button>
                </div>
            </div>
            <div class="box-body">
                <div class="box-body no-padding">
                    <table class="table table-striped">
                        <tr>
                            <th style="width: 10px">#</th>
                            <th>Task</th>
                            <th>Progress</th>
                            <th style="width: 40px">Label</th>
                        </tr>
                        <tr>
                            <td>1.</td>
                            <td>Update software</td>
                            <td>
                                <div class="progress progress-xs">
                                    <div class="progress-bar progress-bar-danger" style="width: 55%"></div>
                                </div>
                            </td>
                            <td><span class="badge bg-red">55%</span></td>
                        </tr>
                        <tr>
                            <td>2.</td>
                            <td>Clean database</td>
                            <td>
                                <div class="progress progress-xs">
                                    <div class="progress-bar progress-bar-yellow" style="width: 70%"></div>
                                </div>
                            </td>
                            <td><span class="badge bg-yellow">70%</span></td>
                        </tr>
                        <tr>
                            <td>3.</td>
                            <td>Cron job running</td>
                            <td>
                                <div class="progress progress-xs progress-striped active">
                                    <div class="progress-bar progress-bar-primary" style="width: 30%"></div>
                                </div>
                            </td>
                            <td><span class="badge bg-light-blue">30%</span></td>
                        </tr>
                        <tr>
                            <td>4.</td>
                            <td>Fix and squish bugs</td>
                            <td>
                                <div class="progress progress-xs progress-striped active">
                                    <div class="progress-bar progress-bar-success" style="width: 90%"></div>
                                </div>
                            </td>
                            <td><span class="badge bg-green">90%</span></td>
                        </tr>
                    </table>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box-body -->
            <div class="box-footer">
                Footer
            </div>
            <!-- /.box-footer-->
        </div>
        <!-- /.box -->
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
                            @include('passage.addPassage')
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Add Passage</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </section>
    <!-- /.content -->
@endsection

@section('scripts')
    <!-- DataTables -->
    <script src="bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
    <script src="assets/libs/jquery-steps/build/jquery.steps.min.js"></script>
    <script src="assets/libs/jquery-validation/dist/jquery.validate.min.js"></script>
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
            $('#example1').DataTable()

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

            $('#example2').DataTable({
                'paging': true,
                'lengthChange': false,
                'searching': false,
                'ordering': true,
                'info': true,
                'autoWidth': false
            })
            $('#passage').on('show.bs.modal', function (event) {

                var button = $(event.relatedTarget)
                var vehicule_id = button.data('vehicule_id')
                var immatriculation = button.data('immatriculation')
                var marque = button.data('marque')
                var client_nom = button.data('client_nom')
                var client_prenom = button.data('client_prenom')
                var telephone = button.data('telephone')
                var modal = $(this)

                modal.find('.modal-body #vehicule_id').val(vehicule_id);
                modal.find('.modal-body #immatriculation').val(immatriculation);
                modal.find('.modal-body #marque').val(marque);
                modal.find('.modal-body #client_nom').val(client_nom);
                modal.find('.modal-body #client_prenom').val(client_prenom);
                modal.find('.modal-body #telephone').val(telephone);
            })
        })
        var form = $("#example-form");
        form.validate({
            errorPlacement: function errorPlacement(error, element) { element.before(error); },
            rules: {
                confirm: {
                    equalTo: "#password"
                }
            }
        });
        form.children("div").steps({
            headerTag: "h3",
            bodyTag: "section",
            transitionEffect: "slideLeft",
            onStepChanging: function(event, currentIndex, newIndex) {
                form.validate().settings.ignore = ":disabled,:hidden";
                return form.valid();
            },
            onFinishing: function(event, currentIndex) {
                form.validate().settings.ignore = ":disabled";
                return form.valid();
            },
            onFinished: function(event, currentIndex) {
                alert("Les informations saisis son corrects veuillez cliquer sur valider pour continuer");
            }
        });
    </script>
@endsection