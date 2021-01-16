<?php 
    
    if(isset($_POST["submit"]))
    {
         if(isset($_SESSION["shopping_cart"]))
         {
              $item_array_id = array_column($_SESSION["shopping_cart"], "item_id");  
              if(!in_array($_GET["id"], $item_array_id))
              {
                   $count = count($_SESSION["shopping_cart"]);
                   $item_array = array(  
                        'termek_id'               =>     $_GET["id"],
                        'termek_megnevezes'               =>     $_POST["megnevezes"],
                        'termek_ar'          =>     $_POST["ar"],
                        'termek_quantity'          =>     $_POST["quantity"],
                        'termek_termekkod'          =>     $_POST["termekkod"]
                   );  
                   $_SESSION["shopping_cart"][$count] = $item_array;
                   echo '<script>alert("Termék sikeresen hozzáadva a kosárhoz!!")</script>';
                   echo '<script>window.location="index.php?page=product&id='.$_GET["id"].'"</script>';
			     exit();
              }
              else
              {
                   echo '<script>alert("A termék már a kosárban van!")</script>';
                   echo '<script>window.location="index.php?page=product&id='.$_GET["id"].'"</script>';
              }
         }  
         else
         {
              $item_array = array(
                        'termek_id'               =>     $_GET["id"],
                        'termek_megnevezes'               =>     $_POST["megnevezes"],
                        'termek_ar'          =>     $_POST["ar"],
                        'termek_quantity'          =>     $_POST["quantity"],
                        'termek_termekkod'          =>     $_POST["termekkod"]
              );
              $_SESSION["shopping_cart"][0] = $item_array;
              echo '<script>alert("Termék sikeresen hozzáadva a kosárhoz!!")</script>';
              echo '<script>window.location="index.php?page=product&id='.$_GET["id"].'"</script>';
		     exit();
         }  
    } 

    if(isset($_GET["action"]))
    {
        if($_GET["action"] == "delete")
        {
          foreach($_SESSION["shopping_cart"] as $keys => $values)
          {
               if($values["termek_id"] == $_GET["id"])
               {
                    unset($_SESSION["shopping_cart"][$keys]);
                    $_SESSION["shopping_cart"] = array_values($_SESSION["shopping_cart"]);
                    echo '<script>alert("Termék sikeresen eltávolítva a kosárból!")</script>';
                    echo '<script>window.location="index.php?page=kosar"</script>';
               }
          }
        }
    }

?>