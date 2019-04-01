@extends('layouts.dashbord')

@section('title', '| Client-Vehicules')

@section('content')
    <section class="content-header">
        <h1>
            Vehicules
            <small>consultation</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{url('home')}}"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">{{$client->nom}} {{$client->prenoms}} cars</li>
        </ol>
    </section>
    <section class="invoice">
        <!-- info row -->
        <div class="row invoice-info">
            <div class="col-sm-4 invoice-col">
                <address>
                    Client:&nbsp <strong>{{$client->prenoms}} {{$client->nom}}</strong><br><br>
                    Commune:&nbsp {{$client->commune}}<br>
                    N° Permis de Conduire:&nbsp {{$client->permis}}<br>
                    Phone:&nbsp (225) {{$client->telephone}}<br><br>
                    Status:&nbsp @if($client->status != 0)
                                    <span class="badge badge-light">Non fidele</span>
                                @else
                                    <span class="badge badge-light">Fidele</span>
                                @endif
                </address>
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
        <!-- Table row -->
        <div class="row">
            <div class="col-xs-12 table-responsive">
                <h3>
                    Liste des vehicules
                </h3>
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>Immatriculation</th>
                        <th>Marque</th>
                        <th>Modele</th>
                        <th>Nombre de Passage</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($vehicules as $vehicule)
                    <tr>
                        <td>{{$vehicule->immatriculation}}</td>
                        <td>{{$vehicule->marque}}</td>
                        <td>{{$vehicule->model}}</td>
                        <td>{{$vehicule->nombrePassage}}</td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>

@endsection
