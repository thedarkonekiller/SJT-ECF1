<?php
 require_once('../../scripts/admin/dbConnect.php');

 if($conn){
     
    $id = $_POST["id"];

    $req = "SELECT * FROM users WHERE id=$id";

    $exec = $conn->query($req);

    if($exec != false){

        $res = $exec->fetchAll(PDO::FETCH_ASSOC);?>

<form action="" method="POST"> 
<input type="text" name="firstName">
    <input type="text" name="lastName" >
    <input type="text" name="nationalite">
    <input type="text" name="poste">
    <input type="date" name="birthday">
    <input type="url" name="playerPic">
    <button type="submit">Modifier le joueur</button>
</form>
<?php
    }
}
?>