<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/webfiles/scripts/functions.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/webfiles/scripts/admin/create.php');
if ($conn) {
      if ($_POST) {
            if (empty(Validator($_POST))) {
                  if ($_POST['userName'] && $_POST['firstName'] && $_POST['lastName'] && $_POST['email'] && $_POST['password'] && isset($_POST['userName'], $_POST['firstName'], $_POST['lastName'], $_POST['email'], $_POST['password'])) {
                        $userName = $_POST['userName'];
                        $firstsName = $_POST['firstName'];
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
