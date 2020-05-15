<?php if (isset($erreurs) && in_array(News::AUTEUR_INVALIDE, $erreurs)) echo 'L\'auteur est invalide.<br />'; ?>
              Auteur : <input type="text" name="auteur" class="form-control" value="jean-forteroche" /><br />
            </div>
            <div class="form-group">
              <?php if (isset($erreurs) && in_array(News::TITRE_INVALIDE, $erreurs)) echo 'Le titre est invalide.<br />'; ?>
              Titre : <input type="text" name="titre" class="form-control" /><br />
            </div>
            <?php if (isset($erreurs) && in_array(News::CONTENU_INVALIDE, $erreurs)) echo 'Le contenu est invalide.<br />'; ?>
            Contenu :<br /><textarea id="mytextarea" rows="8" cols="60" name="contenu"></textarea><br />
            <?php
            if (isset($news) && !$news->isNew()) {
            ?>
              <input type="hidden" name="id" value="<?= $news->id() ?>" />
              <input type="submit" value="Modifier" name="modifier" />
            <?php
            } else {
            ?>
              <input type="submit" value="Ajouter" />
            <?php
            }
            ?>
          </p>
        </form>


          <!-- ajouter manager count -->
        <!-- <p style="text-align: center">Il y a actuellement publications. En voici la liste :</p>

        <table class="table">
          <thead class="thead-dark">
            <tr>
              <th>Auteur</th>
              <th>Titre</th>
              <th>Date d'ajout</th>
              <th>Dernière modification</th>
              <th>Action</th>
            </tr>
          </thead> -->
          <?php
          /* foreach ($manager->getList() as $news) {
            echo '<tr><td>', $news->auteur(), '</td><td>', $news->titre(), '</td><td>', $news->dateAjout()->format('d/m/Y à H\hi'), '</td><td>', ($news->dateAjout() == $news->dateModif() ? '-' : $news->dateModif()->format('d/m/Y à H\hi')), '</td><td><a href="action=admin?modifier=', $news->id(), '">Modifier</a> | <a href="?supprimer=', $news->id(), '">Supprimer</a></td></tr>', "\n";
          } */
          ?>
        </table>