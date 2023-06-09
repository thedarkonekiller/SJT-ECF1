<?php
/**
 * Permet de retarder une redirection
 *
 * @param [type] $url
 * @param integer $waitmsg
 * @return void
 */
function RedirectToURL($url, $waitmsg = 1)
{
    header("Refresh:$waitmsg; URL=$url");
    exit;
}

/**
 * Permet de vérifier l'intégrité des champs d'un formulaire
 *
 * @param [type] $array
 * @return array
 */
function Validator($array): array
{

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
        // On créer une variable clé et on va récupérer les name des formulaires 
        if ($key === "addFirstName" || $key === 'addLastName' || $key === 'addUserName' || $key === 'addLeagueName' || $key === 'addClubName' || $key === 'addCludCreatedDate' || $key === 'addClubStadium' || $key === 'addCountryName' || $key === 'updateNameCountry') {

            //we check that the fields are well filled
            if (empty(trim($value))) {
                $msgError[] = "Le champ doit être renseigné";
            } else {
                // expected format : username
                if (trim($value) && strlen($value) < 0 || strlen($value) > 31 || !preg_match($userPtrn, trim($value))) {
                    $msgError[] = "Le champ doit être compris entre 1 et 30 caractères et ne peut pas contenir de caractères spéciaux";
                }
            }
        } else {
            if ($key === "addClubDescription") {

                //we check that the fields are well filled
                if (empty(trim($value))) {
                    $msgError[] = "Le champ doit être renseigné";
                } else {
                    // expected format : username
                    if (trim($value) && strlen($value) < 0 || !preg_match($userPtrn, trim($value))) {
                        $msgError[] = "Le champ doit contenir 1 caractère minimum et ne peut pas contenir de caractères spéciaux";
                    }
                }
            } else {

                if ($key === "addEmail") {

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

                    if ($key === "addClubImage") {

                        //we check that the field is well filled
                        if (empty($value)) {
                            $msgError[] = "L'URL doit être renseigné";
                        } else {
                            //expected format: Email
                            if (!filter_var($value, FILTER_VALIDATE_URL)) {
                                $msgError[] = "Votre URL doit être au format http://domaine.com ou https://domaine.com";
                            }
                        }
                    } else {

                        if ($key === "addPassword") {

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
                            // Si la variable $FILES n'est pas vide 
                            if (!empty($_FILES)) {
                                $tempPath = $_FILES["img"]["tmp_name"];

                                // Si exif_imagetype est inférieur à 1 ou supérieur à 18
                                if (exif_imagetype($tempPath) < 1 || exif_imagetype($tempPath) > 18) {
                                    $msgError[] = "Votre fichier n'est pas une image valide";
                                }
                            }
                        }
                    }
                }
            }
        }
    }
    return $msgError;
}

function isUniquePseudo(string $pseudo) {
    require($_SERVER['DOCUMENT_ROOT'] . '/webfiles/scripts/admin/dbconnect.php');

    // Vérification du pseudo
    $query = "SELECT COUNT(*) AS count FROM user WHERE username = :pseudo";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(':pseudo', $pseudo, PDO::PARAM_STR);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    $pseudoExists = $result['count'] > 0;

    // Retourne true si les deux champs sont uniques, sinon false
    return !$pseudoExists;
}
function isUniqueEmail(string $email) {
    require($_SERVER['DOCUMENT_ROOT'] . '/webfiles/scripts/admin/dbconnect.php');

    // Vérification de l'email
    $query = "SELECT COUNT(*) AS count FROM user WHERE email = :email";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(':email', $email, PDO::PARAM_STR);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    $emailExists = $result['count'] > 0;

    // Retourne true si les deux champs sont uniques, sinon false
    return !$emailExists;
}
