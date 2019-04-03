@extends('layouts.dashbord')

@section('title', '| create message')

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

    <!-- Main content -->
    <section class="content">
        <div class="col-sm-8">
            <!-- quick email widget -->
            <div class="box box-info">
                <div class="box-header">
                    <i class="fa fa-envelope"></i>

                    <h3 class="box-title">Quick Messages</h3>
                    <!-- tools box -->
                </div>
                <div class="box-body">
                    <form action="#" method="post">
                        <div class="form-group">
                            <input type="tel" disabled class="form-control" name="telto" value="{{$client->telephone}}">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" name="subject" placeholder="Subject">
                        </div>
                        <div>
                  <textarea class="textarea" placeholder="Message"
                            style="width: 100%; height: 125px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                        </div>
                    </form>
                </div>
                <div class="box-footer clearfix">
                    <button type="button" class="pull-right btn btn-default" id="sendMessage">Send
                        <i class="fa fa-arrow-circle-right"></i></button>
                </div>
            </div>
        </div>
        <div class="col-sm-4">
            <table class="table table-borderless">
                <thead>
                <tr>
                    <th scope="col" colspan="2" class="text-center bg-info">Infos Client</th>
                </tr>
                </thead>

                    <tbody>
                    <tr>
                        <th scope="row">Nom&Prenoms :</th>
                        <td>{{$client->nom}} {{$client->prenoms}}</td>
                    </tr>
                        <tr>
                            <th scope="row">Vehicule :</th>
                            <td>{{$vehicule->immatriculation}}</td>
                        </tr>
                    <tr>
                        <th scope="row">Contact :</th>
                        <td>{{$client->telephone}}</td>
                    </tr>
                    </tbody>
            </table>
        </div>

    </section>
    <!-- /.content -->
@endsection

@section('scripts')

@endsection
