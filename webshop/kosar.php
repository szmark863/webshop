<div class="container">
<?php
        if(!empty($_SESSION["shopping_cart"]))  
        {  
    		echo "<label><h4>Kosár tartalma</h4></label><div class='table-responsive pane'><table class='table table-striped table-bordered table-hover table-scrollable'><tr><th style='vertical-align:middle;'>Termék neve</th><th style='vertical-align:middle;'>Ár</th><th style='vertical-align:middle;'>Darab</th><th style='vertical-align:middle;'>Összesen</th><th style='vertical-align:middle;'>Eltávolítás</th></tr>";
    		$total = 0;  
            foreach($_SESSION["shopping_cart"] as $keys => $values)  
            {  
                echo "<tr><td style='vertical-align:middle;'>".$values["termek_megnevezes"]."</td><td style='vertical-align:middle;'>".number_format($values["termek_ar"]); echo " Ft</td><td style='vertical-align:middle;'>".$values["termek_quantity"]."</td><td style='vertical-align:middle;'>".number_format($values["termek_quantity"] * $values["termek_ar"], 2); echo " Ft</td><td style='vertical-align:middle;'><a href='index.php?page=additem.inc&id=".$values["termek_id"]."&action=delete&id=".$values["termek_id"]."'><span class='btn btn-danger'><i class='fas fa-trash'></i></span></a></td></tr>";
                $total = $total + ($values["termek_quantity"] * $values["termek_ar"]);
            }
            echo "<tfoot><tr><td style='vertical-align:middle;' colspan='3'><b>Összesen: </b></td><td style='vertical-align:middle;' colspan='2'>".number_format($total, 2); echo " Ft</td></tr></tfoot>";
            echo "</table></div>";
            echo "</br>";
            echo "<form method='POST' action='index.php?page=rendelesadatok'>";
            echo "<button class='btn btn-danger' style='margin-right: 5px;' name='submit'>Rendelés leadása</button>";
            echo "</form>";
        }
        else
        {
            echo "<h4 class='text-center'>A kosár üres</h4>";
        }
?>
</div>