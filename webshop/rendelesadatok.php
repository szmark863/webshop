<?php $id = $_SESSION["rendelesid"] ?>
<div class="container">
        <div class="row d-flex justify-content-center mx-auto">
            <div class="col-md-6 col-xs-12 div-style">
            <form method="POST" action="index.php?page=useraddress.inc&id=<?php echo $id; ?>">
                <div class="d-flex justify-content-center mx-auto main-label" >
                    <h2>Megrendelő adatai</h2>
                </div>
                <div class="form-group">
                <?php

                  if(isset($_SESSION["email"]))
                  {
                    if (isset($_SESSION["ugyfel_adatok"])){
                  
                      foreach($_SESSION["ugyfel_adatok"] as $keys => $userdata)  
                    { 
                      echo '<input required type="text" class="form-control text-box" name="nev" id="nev" aria-describedby="nev" placeholder="Név" value="'.$userdata["ugyfel_nev"].'">
                    </div>
                    <div class="form-group">
                        <input required type="email" class="form-control text-box" name="email" id="email" aria-describedby="email" placeholder="Email" value="'.$_SESSION["email"].'" readonly="readonly">
                    </div>
                    <div class="form-row">
                    <div class="form-group col-md-4">
                    <input required type="text" pattern="[0-9]*" class="form-control text-box" name="iranyitoszam" id="iranyitoszam" placeholder="Irányítószám" value="'.$userdata["ugyfel_zip"].'">
                    </div>
                    <div class="form-group col-md-8">
                    <input required type="text" class="form-control text-box" name="varos" id="varos" placeholder="Város" value="'.$userdata["ugyfel_varos"].'">
                    </div>
                    </div>
                    <div class="form-group">
                        <input required type="text" class="form-control text-box" name="cim" id="cim" placeholder="Cím" value="'.$userdata["ugyfel_cim"].'">
                    </div>
                    <div class="form-group">
                        <input required type="text" class="form-control text-box" name="telefon" id="telefon" placeholder="Telefonszám" value="'.$userdata["ugyfel_telefon"].'">
                    </div>
                    <div class="row">
          <legend class="col-form-label col-sm-2 pt-0">Fizetési mód</legend>
          <div class="col-sm-10">
            <div class="form-check">';
            if ($userdata["ugyfel_fizetes"] === "kartyas")
            {
              echo '<input class="form-check-input" type="radio" name="fizetes" id="gridRadios1" value="kartyas" checked>
              <label class="form-check-label" for="gridRadios1">
                Online kártyás fizetés
              </label>
            </div>
            <div class="form-check">
              <input class="form-check-input" type="radio" name="fizetes" id="gridRadios2" value="utanvet">
              <label class="form-check-label" for="gridRadios2">
                Fizetés utánvéttel
              </label>
            </div>
          </div>
        </div></br>';
        }
        else if ($userdata["ugyfel_fizetes"] === "utanvet"){
          echo '<input class="form-check-input" type="radio" name="fizetes" id="gridRadios1" value="kartyas">
              <label class="form-check-label" for="gridRadios1">
                Online kártyás fizetés
              </label>
            </div>
            <div class="form-check">
              <input class="form-check-input" type="radio" name="fizetes" id="gridRadios2" value="utanvet" checked>
              <label class="form-check-label" for="gridRadios2">
                Fizetés utánvéttel
              </label>
            </div>
          </div>
        </div></br>';
        }
        else{
          echo '<input class="form-check-input" type="radio" name="fizetes" id="gridRadios1" value="kartyas" checked>
              <label class="form-check-label" for="gridRadios1">
                Online kártyás fizetés
              </label>
            </div>
            <div class="form-check">
              <input class="form-check-input" type="radio" name="fizetes" id="gridRadios2" value="utanvet">
              <label class="form-check-label" for="gridRadios2">
                Fizetés utánvéttel
              </label>
            </div>
          </div>
        </div></br>';
        }
        }
    
                    }else if (!isset($_SESSION["ugyfel_adatok"])){
    
                      echo '<input required type="text" class="form-control text-box" name="nev" id="nev" aria-describedby="nev" placeholder="Név">
                    </div>
                    <div class="form-group">
                        <input required type="email" class="form-control text-box" name="email" id="email" aria-describedby="email" placeholder="Email" value="'.$_SESSION["email"].'" readonly="readonly">
                    </div>
                    <div class="form-row">
                    <div class="form-group col-md-4">
                    <input required type="text" pattern="[0-9]*" class="form-control text-box" name="iranyitoszam" id="iranyitoszam" placeholder="Irányítószám">
                    </div>
                    <div class="form-group col-md-8">
                    <input required type="text" class="form-control text-box" name="varos" id="varos" placeholder="Város">
                    </div>
                    </div>
                    <div class="form-group">
                        <input required type="text" class="form-control text-box" name="cim" id="cim" placeholder="Cím">
                    </div>
                    <div class="form-group">
                        <input required type="text" class="form-control text-box" name="telefon" id="telefon" placeholder="Telefonszám">
                    </div>
                    <div class="row">
          <legend class="col-form-label col-sm-2 pt-0">Fizetési mód</legend>
          <div class="col-sm-10">
            <div class="form-check">
            <input class="form-check-input" type="radio" name="fizetes" id="gridRadios1" value="kartyas" checked>
              <label class="form-check-label" for="gridRadios1">
                Online kártyás fizetés
              </label>
            </div>
            <div class="form-check">
              <input class="form-check-input" type="radio" name="fizetes" id="gridRadios2" value="utanvet">
              <label class="form-check-label" for="gridRadios2">
                Fizetés utánvéttel
              </label>
            </div>
          </div>
        </div></br>';
        }
                  }
                  else{
                    if (isset($_SESSION["ugyfel_adatok"])){
                  
                      foreach($_SESSION["ugyfel_adatok"] as $keys => $userdata)  
                    { 
                      echo '<input required type="text" class="form-control text-box" name="nev" id="nev" aria-describedby="nev" placeholder="Név" value="'.$userdata["ugyfel_nev"].'">
                    </div>
                    <div class="form-group">
                        <input required type="email" class="form-control text-box" name="email" id="email" aria-describedby="email" placeholder="Email" value="'.$userdata["ugyfel_email"].'">
                    </div>
                    <div class="form-row">
                    <div class="form-group col-md-4">
                    <input required type="text" pattern="[0-9]*" class="form-control text-box" name="iranyitoszam" id="iranyitoszam" placeholder="Irányítószám" value="'.$userdata["ugyfel_zip"].'">
                    </div>
                    <div class="form-group col-md-8">
                    <input required type="text" class="form-control text-box" name="varos" id="varos" placeholder="Város" value="'.$userdata["ugyfel_varos"].'">
                    </div>
                    </div>
                    <div class="form-group">
                        <input required type="text" class="form-control text-box" name="cim" id="cim" placeholder="Cím" value="'.$userdata["ugyfel_cim"].'">
                    </div>
                    <div class="form-group">
                        <input required type="text" class="form-control text-box" name="telefon" id="telefon" placeholder="Telefonszám" value="'.$userdata["ugyfel_telefon"].'">
                    </div>
                    <div class="row">
          <legend class="col-form-label col-sm-2 pt-0">Fizetési mód</legend>
          <div class="col-sm-10">
            <div class="form-check">';
            if ($userdata["ugyfel_fizetes"] === "kartyas")
            {
              echo '<input class="form-check-input" type="radio" name="fizetes" id="gridRadios1" value="kartyas" checked>
              <label class="form-check-label" for="gridRadios1">
                Online kártyás fizetés
              </label>
            </div>
            <div class="form-check">
              <input class="form-check-input" type="radio" name="fizetes" id="gridRadios2" value="utanvet">
              <label class="form-check-label" for="gridRadios2">
                Fizetés utánvéttel
              </label>
            </div>
          </div>
        </div></br>';
        }
        else if ($userdata["ugyfel_fizetes"] === "utanvet"){
          echo '<input class="form-check-input" type="radio" name="fizetes" id="gridRadios1" value="kartyas">
              <label class="form-check-label" for="gridRadios1">
                Online kártyás fizetés
              </label>
            </div>
            <div class="form-check">
              <input class="form-check-input" type="radio" name="fizetes" id="gridRadios2" value="utanvet" checked>
              <label class="form-check-label" for="gridRadios2">
                Fizetés utánvéttel
              </label>
            </div>
          </div>
        </div></br>';
        }
        else{
          echo '<input class="form-check-input" type="radio" name="fizetes" id="gridRadios1" value="kartyas" checked>
              <label class="form-check-label" for="gridRadios1">
                Online kártyás fizetés
              </label>
            </div>
            <div class="form-check">
              <input class="form-check-input" type="radio" name="fizetes" id="gridRadios2" value="utanvet">
              <label class="form-check-label" for="gridRadios2">
                Fizetés utánvéttel
              </label>
            </div>
          </div>
        </div></br>';
        }
        }
    
                    }else if (!isset($_SESSION["ugyfel_adatok"])){
    
                      echo '<input required type="text" class="form-control text-box" name="nev" id="nev" aria-describedby="nev" placeholder="Név">
                    </div>
                    <div class="form-group">
                        <input required type="email" class="form-control text-box" name="email" id="email" aria-describedby="email" placeholder="Email">
                    </div>
                    <div class="form-row">
                    <div class="form-group col-md-4">
                    <input required type="text" pattern="[0-9]*" class="form-control text-box" name="iranyitoszam" id="iranyitoszam" placeholder="Irányítószám">
                    </div>
                    <div class="form-group col-md-8">
                    <input required type="text" class="form-control text-box" name="varos" id="varos" placeholder="Város">
                    </div>
                    </div>
                    <div class="form-group">
                        <input required type="text" class="form-control text-box" name="cim" id="cim" placeholder="Cím">
                    </div>
                    <div class="form-group">
                        <input required type="text" class="form-control text-box" name="telefon" id="telefon" placeholder="Telefonszám">
                    </div>
                    <div class="row">
          <legend class="col-form-label col-sm-2 pt-0">Fizetési mód</legend>
          <div class="col-sm-10">
            <div class="form-check">
            <input class="form-check-input" type="radio" name="fizetes" id="gridRadios1" value="kartyas" checked>
              <label class="form-check-label" for="gridRadios1">
                Online kártyás fizetés
              </label>
            </div>
            <div class="form-check">
              <input class="form-check-input" type="radio" name="fizetes" id="gridRadios2" value="utanvet">
              <label class="form-check-label" for="gridRadios2">
                Fizetés utánvéttel
              </label>
            </div>
          </div>
        </div></br>';
        }
                  }
               ?>
                <div class="form-group justify-content-center d-flex">
                    <button type="submit" name="submit" class="btn btn-danger button-submit">Rendelés véglegesítése</button>
                </div>
            </form>
        </div>
        </div>
    </div>