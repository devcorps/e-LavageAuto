<form action="{{route('newPass','Add Passage')}}" method="post" id="example-form"  role="form">
    @csrf
    <div class="box-body">
        <h3>Vehicule</h3>
        <section>
            <div class="col-sm-7">
                <div class="form-group">
                    <label for="immatriculation">Immatriculation <span class="">*</span></label>
                    <input id="immatriculation" name="immatriculation" type="text" class="required form-control">
                </div>
                <div class="form-group">
                    <label for="marque">Marque</label>
                    <input id="marque" name="marque" type="text" class="required form-control">
                </div>
                <div class="form-group">
                    <label for="model">Model</label>
                    <input id="model" name="model" type="text" class="required form-control">
                </div>
            </div>
            <div class="col-sm-5">
                <div class="form-group">
                    <label>Choisir categorie vehicule</label><br>
                    <select class="form-control select2" name="categorie" style="width: 100%; height:36px;">
                        <option value="leger">Poids Leger</option>
                        <option value="moyen">Poids Moyen</option>
                        <option value="lourd">Poids Lourd</option>
                    </select>
                </div>
            </div>
        </section>
        <h3>Client</h3>
        <section>
            <div class="form-group">
                <label for="nom">Nom</label>
                <input id="nom" name="nom" type="text" class="required form-control">
            </div>
            <div class="form-group">
                <label for="prenoms">Prenom(s)</label>
                <input id="prenoms" name="prenoms" type="text" class="required form-control">
            </div>
            <div class="form-group">
                <label for="permis">Numero Permis</label>
                <input id="permis" name="permis" type="text" class="required form-control" required>
            </div>
            <div class="form-group">
                <label for="tel">Telephone</label>
                <div class="input-group">
                    <div class="input-group-addon">
                        <i class="fa fa-phone"></i>
                    </div>
                    <input type="tel" name="tel" class="form-control" data-inputmask='"mask": "(+225) 99-99-99-99"' data-mask required>
                </div>
            </div>
            <div class="form-group">
                <label for="commune">Adresse</label>
                <input id="commune" name="commune" type="text" class="required form-control">
            </div>
            <p class="text-center">(*) Mandatory</p>
        </section>
        <h3>Lavage</h3>
        <section>
            <div class="col-sm-6">
                <div class="form-group">
                    <label>Choisir votre type de lavage</label>
                    <select name="code" class="select2 form-control custom-select" style="width: 100%; height:36px;" required>
                        <option>Select</option>
                        <optgroup label="Poids Leger">
                            @foreach($PoidsLeger as $poidsLeger)
                                <option value="{{$poidsLeger->id}}">{{$poidsLeger->libelle}}</option>
                            @endforeach
                        </optgroup>
                        <optgroup label="Poids Moyen">
                            @foreach($PoidsMoyen as $poidsMoyen)
                                <option value="{{$poidsMoyen->id}}">{{$poidsMoyen->libelle}}</option>
                            @endforeach
                        </optgroup>
                        <optgroup label="Poids Lourd">
                            @foreach($PoidsLourd as $poidsLourd)
                                <option value="{{$poidsLourd->id}}">{{$poidsLourd->libelle}}</option>
                            @endforeach
                        </optgroup>
                    </select>
                </div>

                <div class="form-group">
                    <label for="arrive" class="control-label">Heure d'entrer</label>
                    <input type="time" class="form-control" id="arrive" name="arrive" placeholder="Email" required>
                </div>
                <div class="form-group">
                    <label for="depart" class="control-label">Heure de sortie</label>
                    <input type="time" class="form-control" id="depart" name="depart" placeholder="Email" required>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="box-header">
                    <h3 class="box-title">Choidir moyen de paiement</h3>
                </div>
                <div class="col-xs-9">
                    <label>
                        <input type="radio" name="r3" value="carte de credit" class="flat-red" checked required>
                        <span> Credit Card <i class="fa fa-credit-card"></i></span>
                    </label>
                    <br>
                    <label>
                        <input type="radio" name="r3" value="especes" class="flat-red" required>
                        <span> especes <i class="fa  fa-money"></i></span>
                    </label>
                    <br>
                    <label>
                        <input type="radio" name="r3" value="cheque" class="flat-red" required>
                        <span> Cheque <i class="fa fa-list-alt"></i></span>
                    </label>
                </div>
            </div>
        </section>
        <h3>Finish</h3>
        <section>
            <input id="acceptTerms" name="acceptTerms" type="checkbox" class="required">
            <label for="acceptTerms">I agree with the Terms and Conditions.</label>
            <button class="btn btn-success" type="submit">Valider</button>
        </section>
    </div>
</form>