<?php
if(isset($_POST["submit"]))  
{
     
          $item_array = array(  
            'ugyfel_id'               =>     $_GET["id"],  
            'ugyfel_nev'               =>     $_POST["nev"],  
            'ugyfel_email'          =>     $_POST["email"],  
            'ugyfel_zip'          =>     $_POST["iranyitoszam"],
            'ugyfel_varos'          =>     $_POST["varos"],
            'ugyfel_cim'          =>     $_POST["cim"],
            'ugyfel_telefon'          =>     $_POST["telefon"],
            'ugyfel_fizetes'          =>     $_POST["fizetes"]
          );  
          $_SESSION["ugyfel_adatok"][0] = $item_array;
          echo "<SCRIPT>window.location.replace('index.php?page=rendeleslead');</SCRIPT>";
          exit();
     }
?>