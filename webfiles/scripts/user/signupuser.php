<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/webfiles/scripts/functions.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/webfiles/scripts/admin/create.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/webfiles/scripts/admin/dbConnect.php');
var_dump($_POST);
if ($conn){
      if ($_POST) {
            if (empty(Validator($_POST))) {
                  echo '1';

                  if ($_POST['userName'] && $_POST['firstName'] && $_POST['lastName'] && $_POST['email'] && $_POST['password'] && isset($_POST['userName'], $_POST['firstName'], $_POST['lastName'], $_POST['email'], $_POST['password'])) {
                        echo '2';
                        $userName = $_POST['userName'];
                        $firstName = $_POST['firstName'];
                        $lastName = $_POST['lastName'];
                        $email = $_POST['email'];
                        $password = $_POST['password'];
                        $password = password_hash($password, PASSWORD_ARGON2ID);

                        createUser($userName, $firstName , $lastName, $email, $password, "['ROLE_USER']"); ?>

                        <div class='sucess flex flexColumn center'>
                              <h3>Vous êtes inscrit avec succès.</h3>
                              <p>Cliquez ici pour vous <a href=''>connecter</a></p>
                        </div>

                  <?php }
                  } else {
                        die("Le formulaire est incomplet");
                  }
            } else { ?>
                  <div class='sucess flex flexColumn'>
                        <?php
                        $msgerror = Validator($_POST);
                        foreach ($msgerror as $error) { ?>
                              <p><?= $error ?></p>
                        <?php } ?>
                  </div>


            <?php }
      }
