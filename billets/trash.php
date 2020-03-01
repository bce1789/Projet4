<?php
      $reqUser = $db->query('SELECT role_user FROM users');
      while ($fUser = $reqUser->fetch()){
         if (isset($_SESSION['auth']) && $_POST['username'] == 'jeanforteroche') { 
          ?><p><a href="admin.php">Accéder à l'espace d'administration</a></p>
        <?php } else { ?>
  
          <p><a href="../login.php">Vous n'avez pas les droit pour écrire</a></p>
        <?php } 

      }
      var_dump($reqUser);
      ?>