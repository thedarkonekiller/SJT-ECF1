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
 * Permet de protéger un envoi POST
 * contre le XSS
 *
 * @param array $array
 * @return void
 */
function protectXSS(array $array)
{
    //protection XSS
    foreach ($array as $element => $valeur) {
        $array[$element] = htmlspecialchars($valeur);
    }
}

/**
 * Permet de vérifier l'intégrité des champs d'un formulaire
 *
 * @param [type] $array
 * @return array
 */
function Validator(string $field, $value): ?string
{

    //Pattern definition
    $userPtrn = "/^[a-zA-ZÀ-ÿ0-9|\s.-]+$/";
    $pwdPtrn = "/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{8,}$/";

    //server-side validations

    if ($field === "addFirstName" || $field === 'addLastName' || $field === 'addUserName' || $field === 'addLeagueName' || $field === 'addClubName' || $field === 'addCludCreatedDate' || $field === 'addClubStadium' || $field === 'addCountryName' || $field === 'updateNameCountry') {
        // Vérification du champ spécifique
        if (empty(trim($value))) {
            return "Le champ doit être renseigné";
        } else {
            // Vérification du format
            if (trim($value) && (strlen($value) < 0 || strlen($value) > 31 || !preg_match($userPtrn, trim($value)))) {
                return "Le champ doit être compris entre 1 et 30 caractères et ne peut pas contenir de caractères spéciaux";
            }
        }
    } elseif ($field === "addClubDescription") {
        // Vérification du champ spécifique
        if (empty(trim($value))) {
            return "Le champ doit être renseigné";
        } else {
            // Vérification du format
            if (trim($value) && (strlen($value) < 0 || !preg_match($userPtrn, trim($value)))) {
                return "Le champ doit contenir 1 caractère minimum et ne peut pas contenir de caractères spéciaux";
            }
        }
    } elseif ($field === "addEmail") {
        // Vérification du champ spécifique
        if (empty($value)) {
            return "L'Email doit être renseigné";
        } else {
            // Vérification du format
            if (!filter_var($value, FILTER_VALIDATE_EMAIL)) {
                return "Votre email doit être au format unnom@undomaine.uneextension. Il doit comporter un seul caractère @. Ce caractère doit être suivi d'un nom de domaine qui contient au moins un point puis une extension. Les caractères spéciaux ne sont pas acceptés";
            }
        }
    } elseif ($field === "addClubImage") {
        // Vérification du champ spécifique
        if (empty($value)) {
            return "L'URL doit être renseigné";
        } else {
            // Vérification du format
            if (!filter_var($value, FILTER_VALIDATE_URL)) {
                return "Votre URL doit être au format http://domaine.com ou https://domaine.com";
            }
        }
    } elseif ($field === "addPassword") {
        // Vérification du champ spécifique
        if (empty(trim($value))) {
            return "Le mot de passe doit être renseigné";
        } else {
            // Vérification du format
            if (!preg_match($pwdPtrn, trim($value))) {
                return "Votre mot de passe doit être formé d'un minimum de 8 caractères, au moins une lettre majuscule, au moins une lettre minuscule, au moins un chiffre, au moins un caractère spécial";
            }
        }
    } elseif ($field === "addFile") {
        // Vérification du champ spécifique (fichier)
        if (empty($_FILES)) {
            return "Aucun fichier n'a été téléchargé";
        } else {
            $tempPath = $_FILES["img"]["tmp_name"];
            if (exif_imagetype($tempPath) < 1 || exif_imagetype($tempPath) > 18) {
                return "Votre fichier n'est pas une image valide";
            }
        }
    }
    
    return null;
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
