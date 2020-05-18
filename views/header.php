    <!--Navbar responsive-->
    <div id="navbar_responsive">
        <nav class="navbar navbar-light bg-light lighten-4">
            <a class="navbar-brand" href="/home">BLOG</a>
            <!-- Collapse button -->
            <button class="navbar-toggler toggler-example" type="button" data-toggle="collapse" data-target="#navbarSupportedContent1" aria-controls="navbarSupportedContent1" aria-expanded="false" aria-label="Toggle navigation"><span class="dark-blue-text"><i class="fas fa-bars fa-1x"></i></span></button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent1">
                <ul class="navbar-nav mr-auto">
                    <?php if (isset($_SESSION['auth'])) : ?>
                        <li class="nav-item">
                            <a class="nav-link" href="/logout">Se déconnecter</a>
                        </li>
                        <div class="mx-auto" style="width: 50px;">
                            <!--Espace vide -->
                            <p></p>
                        </div>
                        <li class="nav-item">
                            <a class="nav-link" href="/billet">billet</a>
                        </li>
                        <div class="mx-auto" style="width: 50px;">
                            <!--Espace vide -->
                            <p></p>
                        </div>
                    <?php else : ?>
                        <li class="nav-item">
                            <a class="nav-link" href="/signup">s'inscrire</a>
                        </li>
                        <div class="mx-auto" style="width: 50px;">
                            <!--Espace vide -->
                            <p></p>
                        </div>
                        <li class="nav-item">
                            <a class="nav-link" href="/login">se connecter</a>
                        </li>
                        <div class="mx-auto" style="width: 50px;">
                            <!--Espace vide -->
                            <p></p>
                        </div>
                        <li class="nav-item">
                            <a class="nav-link" href="/billet">billet</a>
                        </li>
                        <div class="mx-auto" style="width: 50px;">
                            <!--Espace vide -->
                            <p></p>
                        </div>
                    <?php endif; ?>
                </ul>
            </div>
            <!-- Collapsible content -->
        </nav>
    </div>
    <!--/.Navbar responsive-->
    <!-- Navbar classic -->
    <div id="navbar_classic">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <form name="redirect" action="/home" method="post">
                <input class="navbar-brand" type="submit" value="Accueil">
            </form>
            <div class="mx-auto" style="width: 50px;">
                <!--Espace vide -->
                <p></p>
            </div>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <div id="navbar" class="collapse navbar-collapse">
                        <?php if (isset($_SESSION['auth'])) : ?>
                            <li class="nav-item">
                                <a class="nav-link" href="/logout">Se déconnecter</a>
                            </li>
                            <div class="mx-auto" style="width: 50px;">
                                <!--Espace vide -->
                                <p></p>
                            </div>
                            <li class="nav-item">
                                <a class="nav-link" href="/billet">Billet</a>
                            </li>
                            <div class="mx-auto" style="width: 50px;">
                                <!--Espace vide -->
                                <p></p>
                            </div>
                        <?php else : ?>
                            <!--  -->
                            <li class="nav-item">
                                <a class="nav-link" href="/signup">S'inscrire</a>
                                <!--<a href="register.php">S'inscrire</a>-->
                            </li>
                            <div class="mx-auto" style="width: 50px;">
                                <!--Espace vide -->
                                <p></p>
                            </div>
                            <li class="nav-item">
                                <a class="nav-link" href="/login">Se connecter</a>
                            </li>
                            <div class="mx-auto" style="width: 50px;">
                                <!--Espace vide -->
                                <p></p>
                            </div>
                            <li class="nav-item">
                                <a class="nav-link" href="/billet">Episode</a>
                            </li>
                            <div class="mx-auto" style="width: 50px;">
                                <!--Espace vide -->
                                <p></p>
                            </div>
                        <?php endif; ?>
                    </div>
                    <!--/.nav-collapse -->
                    <div class="mx-auto" style="width: 50px;">
                        <!--Espace vide -->
                        <p></p>
                    </div>
                </ul>
            </div>
        </nav>
    </div>
    <!-- -->
    <div class="container">
        <?php if (isset($_SESSION['flash'])) : ?>
            <?php foreach ($_SESSION['flash'] as $type => $message) : ?>
                <div class="alert alert-<?= $type; ?>">
                    <?= $message; ?>
                </div>
            <?php endforeach; ?>
            <?php unset($_SESSION['flash']); ?>
        <?php endif; ?>
    </div>