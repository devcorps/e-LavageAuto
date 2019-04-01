@extends('layouts.dashbord')

@section('title', '| Homepage')

@section('stylesheet')

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
    <section class="invoice">
        <!-- title row -->
        <div class="row">
            <div class="col-xs-12">
                <h2 class="page-header">
                    <i class="fa fa-globe"></i> {{auth()->user()->name}}
                    <small class="pull-right">Date: 2/10/2014</small>
                </h2>
            </div>
            <!-- /.col -->
        </div>
        <!-- info row -->
        <div class="row invoice-info">
            <div class="col-sm-4 invoice-col">
                From
                <address>
                    <strong>{{auth()->user()->name}}, Inc.</strong><br>
                    {{auth()->user()->localisation}}<br>
                    Phone: {{auth()->user()->telephone}}<br>
                    Email: {{auth()->user()->email}}
                </address>
            </div>
            <!-- /.col -->
            <div class="col-sm-4 invoice-col">
                To
                <address>
                    <strong>{{$client->nom}} {{$client->prenoms}}</strong><br>
                    {{$client->commune}}<br>
                    Permis: {{$client->permis}}<br>
                    Phone: {{$client->telephone}}<br>
                </address>
            </div>
            <!-- /.col -->
            <div class="col-sm-4 invoice-col">
                <b>Facture #007612</b><br>
                <br>
                <b>Type de Lavage:</b> {{$lavage->libelle}}<br>
                <b>Mode de paiement:</b> {{$passage->mode}}<br>
                <b>Heure d'Arrivée:</b> {{$passage->enter}}<br>
                <b>Heure de Depart:</b> {{$passage->sortie}}
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->

        <!-- Table row -->
        <div class="row">
            <div class="col-xs-12 table-responsive">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>Immatriculation</th>
                        <th>Marque</th>
                        <th>Modele</th>
                        <th>Categorie</th>
                        <th>Nombre de passage</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>{{$vehicule->immatriculation}}</td>
                        <td>{{$vehicule->marque}}</td>
                        <td>{{$vehicule->model}}</td>
                        <td>{{$lavage->categorie}}</td>
                        <td>{{$vehicule->nombrePassage}}</td>
                    </tr>
                    </tbody>
                </table>
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->

        <div class="row">
            <!-- accepted payments column -->
            <div class="col-xs-6">
                <p class="lead">Payment Methods:</p>
                <img src="dist/img/credit/visa.png" alt="Visa">
                <img src="dist/img/credit/mastercard.png" alt="Mastercard">
                <img src="dist/img/credit/american-express.png" alt="American Express">
                <img src="dist/img/credit/paypal2.png" alt="Paypal">

                <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">
                    Etsy doostang zoodles disqus groupon greplin oooj voxy zoodles, weebly ning heekya handango imeem plugg
                    dopplr jibjab, movity jajah plickers sifteo edmodo ifttt zimbra.
                </p>
            </div>
            <!-- /.col -->
            <div class="col-xs-6">
                <p class="lead">Montant a payer</p>

                <div class="table-responsive">
                    <table class="table">
                        <tr>
                            <th style="width:50%">Tarif HT:</th>
                            <td>{{$lavage->tarif}}</td>
                        </tr>
                        {{--<tr>--}}
                            {{--<th>Tax (9.3%)</th>--}}
                            {{--<td>$10.34</td>--}}
                        {{--</tr>--}}
                        {{--<tr>--}}
                            {{--<th>Shipping:</th>--}}
                            {{--<td>$5.80</td>--}}
                        {{--</tr>--}}
                        <tr>
                            <th>Total:</th>
                            <td>{{$lavage->tarif}}</td>
                        </tr>
                    </table>
                </div>
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->

        <!-- this row will not appear when printing -->
        <div class="row no-print">
            <div class="col-xs-12">
                <a href="invoice-print.html" target="_blank" class="btn btn-default"><i class="fa fa-print"></i> Print</a>
                <button type="button" class="btn btn-success pull-right"
                        data-vehicule_id={{$vehicule->id}}
                        data-lav_id={{$lavage->id}}
                        data-arrive={{$passage->enter}}
                        data-depart={{$passage->sortie}}
                        data-contact={{$client->telephone}}
                        data-tarif={{$lavage->tarif}}
                        data-toggle="modal"
                        data-target="#valider"
                        data-original-title="validation">
                    <i class="fa fa-credit-card" ></i> Valider Passage
                </button>
            </div>
        </div>
        <!-- Modal -->
        <div class="modal modal-info fade" id="valider" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                    aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title text-center" id="myModalLabel">Confirmation</h4>
                    </div>
                    <form action="{{route('passage.store','Enregistrement')}}" method="post">
                        {{csrf_field()}}
                        <div class="modal-body">
                            <p class="text-center">
                                Are you sure you want to add this wash?
                            </p>
                            <input type="hidden" name="vehicule_id" id="vehicule_id" value="">
                            <input type="hidden" name="lav_id" id="lav_id" value="">
                            <input type="hidden" name="arrive" id="arrive" value="">
                            <input type="hidden" name="depart" id="depart" value="">
                            <input type="hidden" name="contact" id="contact" value="">
                            <input type="hidden" name="tarif" id="tarif" value="">

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-success" data-dismiss="modal">No, Cancel</button>
                            <button type="submit" class="btn btn-warning">Yes, I'm sure</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

@endsection

@section('scripts')
    <script>
        $('#valider').on('show.bs.modal', function (event) {

            var button = $(event.relatedTarget)

            var vehicule_id = button.data('vehicule_id')
            var lav_id = button.data('lav_id')
            var arrive = button.data('arrive')
            var depart = button.data('depart')
            var contact = button.data('contact')
            var tarif = button.data('tarif')
            var modal = $(this)

            modal.find('.modal-body #vehicule_id').val(vehicule_id);
            modal.find('.modal-body #lav_id').val(lav_id);
            modal.find('.modal-body #arrive').val(arrive);
            modal.find('.modal-body #depart').val(depart);
            modal.find('.modal-body #contact').val(contact);
            modal.find('.modal-body #tarif').val(tarif);
        })
    </script>
@endsection
