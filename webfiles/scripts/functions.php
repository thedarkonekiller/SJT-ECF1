<?php
function RedirectToURL($url, $waitmsg = 1) {
    header("Refresh:$waitmsg; URL=$url");
    exit;
}


function Validator($array){

//protection XSS
foreach ($array as $element => $valeur) {
    $array[$element] = htmlspecialchars($valeur);
}

//Pattern definition
$userPtrn = "/^[a-zA-ZÀ-ÿ0-9|\s.-]+$/";
$pwdPtrn = "/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{8,}$/";
 
//server-side validations

//initialize the variable that will display error messages
$msgError = [];



foreach ($array as $key => $value) {

    if ($key === "firstName" || $key === 'lastName' || $key === 'userName' || $key === 'addLeagueName' || $key === 'addClubName') {
        
        //we check that the fields are well filled
        if (empty(trim($value))) {
            $msgError[] = "Le champ doit être renseigné";
        } else {
            // expected format : username
            if (trim($value) && strlen($value) < 0 || strlen($value) > 31 || !preg_match($userPtrn,trim($value))) {
                $msgError[] = "Le champ doit être compris entre 1 et 30 caractères et ne peut pas contenir de caractères spéciaux";
            }
        }

    } else{

        if ($key === "email") {
            
            //we check that the field is well filled
            if (empty($value)) {
                $msgError[] = "L'Email doit être renseigné";
            } else {
                //expected format: Email
                if (!filter_var($value, FILTER_VALIDATE_EMAIL)) {
                    $msgError[] = "Votre email doit être au format unnom@undomaine.uneextension.";
                    $msgError[] = "Il doit comporter un seul caractère @.";
                    $msgError[] = "Ce caractère doit être suivi d'un nom de domaine qui contient au moins un point puis une extension.";
                    $msgError[] = "Les caractères spéciaux ne sont pas acceptés";
                }    
            }
        } else {

                if ($key === "url") {
            
            //we check that the field is well filled
            if (empty($value)) {
                $msgError[] = "L'Email doit être renseigné";
            } else {
                //expected format: Email
                if (!filter_var($value, FILTER_VALIDATE_EMAIL)) {
                    $msgError[] = "Votre email doit être au format unnom@undomaine.uneextension.";
                    $msgError[] = "Il doit comporter un seul caractère @.";
                    $msgError[] = "Ce caractère doit être suivi d'un nom de domaine qui contient au moins un point puis une extension.";
                    $msgError[] = "Les caractères spéciaux ne sont pas acceptés";
                }    
            }
        } else {

            if ($key === "password") {
            
                //we check that the field is well filled
                if (empty(trim($value))) {
                    $msgError[] = "Le mot de passe doit être renseigné";
                } else {
                    //expected format: password
                    if (!preg_match($pwdPtrn, trim($value))) {
                        $msgError[] = "Votre mot de passe doit être formé d'un minimum de 8 caractères, au moins une lettre majuscule, au moins une lettre minuscule, au moins un chiffre, au moins un caractère spécial";
                    }
                }
            } else {
                if (!empty($_FILES)) {
                    $tempPath = $_FILES["img"]["tmp_name"];


                    if (exif_imagetype($tempPath) < 1 || exif_imagetype($tempPath) > 18) {
                        $msgError[] = "Votre fichier n'est pas une image valide";
                    }
                }
            }
        }
    } 
    }

    return $msgError;
}
 



    