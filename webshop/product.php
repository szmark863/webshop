<?php

if (isset($_GET['id']))
{
    $stmt = $conn->prepare('SELECT * FROM termekek WHERE id = ?');
    $stmt->bind_param("s", $_GET['id']);
    $stmt->execute();
    $result = $stmt->get_result();
    //termék lekérdezése az adatbázisból majd a tömb feltöltése az adatokkal
    $product = $result->fetch_assoc();
    //tömb ellenőrzése, hogy nem üres
    if (!$product)
    {
        //Hiba megjelenítése ha a termék nem elérhető
        exit('<div class="container"><div class="alert alert-danger" role="alert">
        Ez a termék jelenleg nem elérhető!
        </div></div>');
    }
    else if($product['darab'] === 0)
    {
        //nincs raktáron a termék hibaüzenet
        print '<div class="container">
        <div class="row">
        <div class="col-12 col-md-8"><div class="card mb-3" style="max-width: 502px;"><img src="images/'.$product["image"].'" width="500" height="500" alt="'.$product["megnevezes"].'"></div></div>
        <div class="col-6 col-md-4"><h1 class="name">'.$product["megnevezes"].'</h1>
                    <h2>'.number_format($product["ar"]).' ft</h2>
                    <div class="alert alert-danger" role="alert">
        Ez a termék jelenleg nincs raktáron!
        </div>
                    <div class="description">
                        '.$product["leiras"].'
                    </div></div>
        </div>
    </div>';
    }
    else
    {
        //van raktáron a termékből
        print '<div class="container">
        <div class="row">
        <div class="col-12 col-md-8"><div class="card mb-3" style="max-width: 502px;"><img src="images/'.$product["image"].'" width="500" height="500" alt="'.$product["megnevezes"].'"></div></div>
        <div class="col-6 col-md-4"><h1 class="name">'.$product["megnevezes"].'</h1>
                    <h2>'.number_format($product["ar"]).' ft</h2>
                    <form action="index.php?page=additem.inc&id='.$product["id"].'&action=add&id='.$product["id"].'" method="post">
                        <div class="input-group mb-3">
                            <input class="form-control" style="margin-right:10px" 15px; type="number" name="quantity" value="1" min="1" max="'.$product["darab"].'" placeholder="Quantity" required>
                            <button class="btn btn-outline-secondary" type="submit" name="submit" id="button-addon2">Kosárba</button>
                            <input type="hidden" name="megnevezes" value="'.$product["megnevezes"].'"/>  
                            <input type="hidden" name="ar" value="'.$product["ar"].'" /> 
                            <input type="hidden" name="termekkod" value="'.$product["termekkod"].'" /> 
                        </div>
                    </form>
                    <div class="description">
                        '.$product["leiras"].'
                    </div></div>
        </div>
    </div>';
    }
    
}
else
{
    //ha nem található a termék id-je
    exit('<div class="container"><div class="alert alert-danger" role="alert">
        Ez a termék jelenleg nem elérhető!
        </div></div>');
}
?>