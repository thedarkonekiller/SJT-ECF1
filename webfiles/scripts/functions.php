<?php
function RedirectToURL($url, $waitmsg = 1) {
    header("Refresh:$waitmsg; URL=$url");
    exit;
}


function Validator($array){

//  protection XSS 
foreach ($array as $element => $valeur) {
    $array[$element] = htmlspecialchars($valeur);
}

//  Définition des patterns
$userPtrn = "/^[a-zA-ZÀ-ÿ0-9.-]+$/";
$pwdPtrn = "/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{8,}$/";
 
//  validations côté serveur

//  initialisation de la variable qui va afficher les messages d'erreurs
$msgError = [];



foreach ($array as $key => $value) {

    if ($key === "firstName" || $key === 'lastName' || $key === 'userName') {
        
        //  on verifie que les champs sont bien remplis
        if (empty(trim($value))) {
            $msgError[] = "Le champ doit être renseigné";
        } else {
            //  format attendu : username
            if (trim($value) && strlen($value) < 0 || strlen($value) > 31 || !preg_match($userPtrn,trim($value))) {
                $msgError[] = "Le champ doit être compris entre 1 et 30 caractères et ne peut pas contenir de caractères spéciaux";
            }
        }

    } else{

        if ($key === "email") {
            
            //  on verifie que le champ est bien rempli
            if (empty($value)) {
                $msgError[] = "L'Email doit être renseigné";
            } else {
                // format attendu : Email
                if (!filter_var($value, FILTER_VALIDATE_EMAIL)) {
                    $msgError[] = "Votre email doit être au format unnom@undomaine.uneextension.";
                    $msgError[] = "Il doit comporter un seul caractère @.";
                    $msgError[] = "Ce caractère doit être suivi d'un nom de domaine qui contient au moins un point puis une extension.";
                    $msgError[] = "Les caractères spéciaux ne sont pas acceptés";
                }    
            }
        } else {

            if ($key === "password") {
            
                //  on verifie que le champ est bien rempli
                if (empty(trim($value))) {
                    $msgError[] = "Le mot de passe doit être renseigné";
                } else {
                    // format attendu : password
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
 



    