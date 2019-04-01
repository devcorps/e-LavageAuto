<div class="row">
    <div class="col-sm-7">
        <div class="box-header">
            <h3 class="box-title">Donnees capital du vehicule</h3>
        </div>
            <div class="input-group">
                <span class="input-group-addon">Immatriculation</span>
                <input type="text" id="immatriculation" name="immatriculation" disabled
                       class="form-control"
                       value="">
            </div>
    </div>
    <div class="col-sm-5">
        <div class="form-group">
            <div class="box-header">
                <h3 class="box-title">Parametre du Passage</h3>
            </div>
            <select class="select2 form-control custom-select" id="code" name="code" style="width: 100%; height:36px;" required>
                <option>Categorie du vehicule</option>
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
        <div class="input-group">
            <span class="input-group-addon">Heure d'entrée</span>
            <input type="time" id="arrive" name="arrive"
                   class="form-control"
                   value="">
        </div>

        <div class="input-group">
            <span class="input-group-addon">Heure de sortie</span>
            <input type="time" id="depart" name="depart"
                   class="form-control"
                   value="">
        </div>
        <br>
        <div class="form-group">
            <label>Mode de Paiement</label>
            <br>
            <label>
                <input type="radio" name="r3" value="carte de credit" class="flat-red" checked required>
                <span> Credit Card <i class="fa fa-credit-card"></i></span>
            </label>
            <br>
            <label>
                <input type="radio" name="r3" value="cash" class="flat-red" required>
                <span> Cash <i class="fa  fa-money"></i></span>
            </label>
            <br>
            <label>
                <input type="radio" name="r3" value="cheque" class="flat-red" required>
                <span> Cheque <i class="fa fa-list-alt"></i></span>
            </label>
        </div>
    </div>
</div>