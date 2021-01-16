<?php
    if (isset($_POST["submit"])) 
    {

      //rendelés teljes összegének kiszámítása
      $total = 0;
      foreach($_SESSION["shopping_cart"] as $keys => $val)  
      {  
        $total = $total + ($val["termek_quantity"] * $val["termek_ar"]);
      }

      //kosár tartalmának feltöltése az adatbázisba és annak ellenőrzése, hogy mindenből van elég darab,
      //ha nem hibát dob vissza, hogy kevesebb van a raktárban mint a kosárban

      foreach($_SESSION["shopping_cart"] as $keys => $kosar)
      {

        //darabszám lekérdezés
        $darab_check = mysqli_query($conn, "SELECT `darab` - '".$kosar['termek_quantity']."', `megnevezes` FROM `termekek` where id = '".$kosar['termek_id']."'");

        $row = mysqli_fetch_row($darab_check);

        if ($row[0] < 0)
        {
          //ha nincs elegendő akkor hiba
          //echo "Error: nincs elég a raktárban ebből: " . $row[1];
          //break;
          echo '<SCRIPT>
        				window.location.replace("index.php?page=kosar&error=nincsRaktaron");
						    alert("Error: nincs elég a raktárban ebből: " + "'.$row[1].'")
    				    </SCRIPT>';
          break;

        }
        else
        {
          
          foreach($_SESSION["ugyfel_adatok"] as $keys => $values)  
          {

            $sql = "INSERT INTO `orders`(`rendel_id`, `item_name`, `item_email`, `item_cim`, `item_telefon`, `item_fizetes`, `item_osszeg`) VALUES ('".$values['ugyfel_id']."', '".$values['ugyfel_nev']."', '".$values['ugyfel_email']."', '".$values['ugyfel_cim']."', '".$values['ugyfel_telefon']."', '".$values['ugyfel_fizetes']."', '".$total."')";

            //"összekötő" tábla (csak párosítva van az orders tábla id az ordered_items tábla rendel_id-vel igazából enélkül is lehet lekérdezni,
            // de gondoltam nem rossz ha van egy ilyen is) feltöltése
            if ($conn->query($sql) === TRUE)
            {

              $order_connsql = "INSERT INTO order_conn (`id`, `rendel_id`) VALUES ((SELECT `id` FROM `orders` ORDER BY `id` DESC limit 1) , '".$values['ugyfel_id']."')";

              if ($conn->query($order_connsql) === TRUE)
              {
                goto termekek;
              }
              else
              {
                echo "Error: " . $order_connsql . "<br>" . $conn->error;
              }

            }
            else
            {
              echo "Error: " . $sql . "<br>" . $conn->error;
            }

          }

          termekek:

          //rendelt termékek feltöltése az ordered_items táblába
          $rendelt_itemek_sql = "INSERT INTO `ordered_items`(`rendel_id`, `termek_id`, `termek_name`, `termek_price`, `termek_mennyiseg`, `termek_kod`) VALUES ('".$values['ugyfel_id']."', '".$kosar['termek_id']."', '".$kosar['termek_megnevezes']."', '".$kosar['termek_ar']."', '".$kosar['termek_quantity']."', '".$kosar['termek_termekkod']."'); ";

          if ($conn->query($rendelt_itemek_sql) === TRUE)
          {
            //darabszám update az adatbázisban (levonja a kosár tartalmát a raktárból)
            $change_darab = "UPDATE `termekek` SET `darab` = `darab` - '".$kosar['termek_quantity']."' where id = '".$kosar['termek_id']."'";

            if ($conn->query($change_darab) === TRUE)
            {

              session_unset();
              session_destroy();
              echo "<SCRIPT> //not showing me this
        				    window.location.replace('index.php?SikeresRendeles');
						        alert('Sikeres megrendelés!')
    					      </SCRIPT>";
            
            }
            else
            {
              echo "Error: " . $change_darab . "<br>" . $conn->error;
            }

          }
          else
          {
            echo "Error: " . $rendelt_itemek_sql . "<br>" . $conn->error;
          }
      }

    }
  }
?>