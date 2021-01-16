<div class="container">
<?php

if (isset($_SESSION["username"]))
  {
    

  	$sql = "SELECT * FROM orders where item_email = '".$_SESSION["email"]."'";
		$result = $conn->query($sql);

		if ($result->num_rows > 0)
		{
    		echo "<label><h4>Rendelések listája</h4></label><div class='table-responsive pane'><table id='rendelesek' class='table table-striped table-bordered table-hover table-scrollable'><tr><th>ID</th><th>Rendelés azonosító</th><th>Név</th><th>Email</th><th>Cím</th><th>Telefonszám</th><th>Fizetési mód</th><th>Összeg</th><th>Rendelés dátuma</th></tr>";
    		while($row = $result->fetch_assoc())
    		{
        		echo "<form method='POST' action='update.inc.php'><tr><td>".$row["id"]."</td><td>".$row["rendel_id"]."</td><td>".$row["item_name"]."</td><td>".$row["item_email"]."</td><td>".$row["item_cim"]."</td><td>".$row["item_telefon"]."</td><td>".$row["item_fizetes"]."</td><td>".$row["item_osszeg"]."</td><td>".$row["reg_date"]."</td></tr></form>";
        }
        echo "</table></div>";
    }
		else
		{
    		echo "Nincs korábbi rendelésed!";
		}

  	}
  	else
  	{
    	header("Location: index.php?noUserLoggedIn");
      }
      
if (isset($_GET['rendelid']))
{
    $stmt = $conn->prepare('SELECT * FROM ordered_items WHERE rendel_id = ?');
    $stmt->bind_param("s", $_GET['rendelid']);
    $stmt->execute();
    $result = $stmt->get_result();

    print "<label><h4>Rendelés részletei</h4></label><div class='table-responsive pane'><table class='table table-striped table-bordered table-hover table-scrollable'><tr><th>Termék neve</th><th>Termák ára</th><th>Darabszám</th><th>Termékkód</th></tr>";
    
    while($row = $result->fetch_assoc())
    		{
        		echo "<tr><td>".$row["termek_name"]."</td><td>".$row["termek_price"]."</td><td>".$row["termek_mennyiseg"]."</td><td>".$row["termek_kod"]."</td></tr>";
        }
        echo "</table></div>";
}

?>

<script>
function addRowHandlers() {
    var table = document.getElementById("rendelesek");
    var rows = table.getElementsByTagName("tr");
    for (i = 0; i < rows.length; i++) {
        var currentRow = table.rows[i];
        var createClickHandler = 
            function(row) 
            {
                return function() { 
                                        var cell = row.getElementsByTagName("td")[1];
                                        var id = cell.innerHTML;
                                        window.location.replace('index.php?page=rendelhistory&rendelid=' + id);
                                 };
            };

        currentRow.onclick = createClickHandler(currentRow);
    }
}
window.onload = addRowHandlers();
</script>
</div>