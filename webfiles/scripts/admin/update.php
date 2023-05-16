<?php
 require_once('./dbConnect.php');

   
 if($conn){

  
    $firstName = $_POST["firstName"];
    $lastName = $_POST["lastName"];
    $nationalite = $_POST["nationalite"];
    $poste = $_POST["poste"];
    $birthday = $_POST["birthday"];
    $playerPic = $_POST["playerPic"];

    $req = "UPDATE user SET firstName = '$firstName', lastName = '$lastName', nationalité = '$nationalite', poste = '$poste', birthday = '$birthday' WHERE playeurPic = $playerPic";

    $exec = $conn->query($req);
}
else{
   echo "La modification n'a pas fonctionné";
}
?>
  