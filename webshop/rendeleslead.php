<div class="container">
<?php
        if(!empty($_SESSION["shopping_cart"]) && !empty($_SESSION["ugyfel_adatok"]))  
        {  
    		echo "<label><h4>Rendelés véglegesítése</h4></label><div class='table-responsive pane'><table class='table table-striped table-bordered table-hover table-scrollable'><tr><th style='vertical-align:middle;'>Termék neve</th><th style='vertical-align:middle;'>Ár</th><th style='vertical-align:middle;'>Darab</th><th style='vertical-align:middle;'>Összesen</th></tr>";
    		$total = 0;  
            foreach($_SESSION["shopping_cart"] as $keys => $values)  
            {  
                echo "<tr><td style='vertical-align:middle;'>".$values["termek_megnevezes"]."</td><td style='vertical-align:middle;'>".number_format($values["termek_ar"]); echo " Ft</td><td style='vertical-align:middle;'>".$values["termek_quantity"]."</td><td style='vertical-align:middle;'>".number_format($values["termek_quantity"] * $values["termek_ar"], 2); echo " Ft</td></tr>";
                $total = $total + ($values["termek_quantity"] * $values["termek_ar"]);
            }
            echo "<tfoot><tr><td style='vertical-align:middle;' colspan='3'><b>Összesen: </b></td><td style='vertical-align:middle;' colspan='1'>".number_format($total, 2); echo " Ft</td></tr></tfoot>";
            echo "</table></div>";
            echo "</br>";

            echo "<div class='table-responsive pane'><table class='table table-striped table-bordered table-hover table-scrollable'><tr><th style='vertical-align:middle;'>Rendelő neve</th><th style='vertical-align:middle;'>Email cím</th><th style='vertical-align:middle;'>Cím</th><th style='vertical-align:middle;'>Telefonszám</th><th style='vertical-align:middle;'>Fizetési mód</th></tr>";

            foreach($_SESSION["ugyfel_adatok"] as $keys => $userdata)  
            {  
                echo "<tr><td style='vertical-align:middle;'>".$userdata["ugyfel_nev"]."</td><td style='vertical-align:middle;'>".$userdata["ugyfel_email"]."</td><td style='vertical-align:middle;'>".$userdata["ugyfel_zip"]. " "  .$userdata["ugyfel_varos"]. " " .$userdata["ugyfel_cim"]."</td><td style='vertical-align:middle;'>".$userdata["ugyfel_telefon"]."</td>";echo "<td>"; if ($userdata["ugyfel_fizetes"] === "utanvet"){ echo "Utánvét készpénzzel";}else { echo "Online bankkártyás fizetés";} echo"</td></tr>";
            }

            echo "</table></div>";
            echo "</br>";

            echo "<form method='POST' action='index.php?page=rendel.inc&id=".$_SESSION["rendelesid"]."'>";
            echo "<button class='btn btn-danger' style='margin-right: 5px;' name='submit'>Rendelés véglegesítése</button>";
            echo "</form>";
        }
        else
        {
            echo "<h4 class='text-center'>A kosár üres</h4>";
        }



?>
</div>