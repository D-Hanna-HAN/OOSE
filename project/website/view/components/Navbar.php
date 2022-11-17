<?php
$baseUrl = "/schoolwebsites/fletnix";
?>
<section class="desktop-menu">
    <nav class="p-10">
        <h1 class="header-text">FLETNIX</h1>
        <ul>
            <li>
                <a class="menu-item" href="<?= $baseUrl ?>">HOME</a>
            </li>
            <li>
                <a class="menu-item" href="<?= $baseUrl ?>?page=Genres">GENRE'S</a>
            </li>


            <?php
            if (isset($_SESSION["user"])) {
            ?>
                <li>
                    <a class="menu-item" href="<?= $baseUrl ?>?page=Library">BIBLIOTHEEK</a>
                </li>
            <?php
            }
            ?>


            <!-- alle items die rechts gezet moeten worden -->
            <li class="nav-right">
                <form method="get" action="?page=Search" class="search-form display-flex">
                    <input name="page" type="hidden" value="Search">
                    <input type="text" name="searchTerm" class="search-field" placeholder="zoeken naar films">
                    <button type="submit" class="search-btn">zoeken</button>
                </form>
            </li>
            <?php
            if (isset($_SESSION["user"])) {
            ?>
                <li>
                    <p class="menu-item">
                        Welkom, <?= $_SESSION["user"]->getFirstname() ?>
                    </p>
                </li>
                <li>
                    <a class="menu-item" href="<?= $baseUrl ?>?page=logout">
                        UITLOGGEN
                    </a>
                </li>
            <?php
            } else {
            ?>

                <li>
                    <a class="menu-item" href="<?= $baseUrl ?>?page=Login">
                        LOGIN
                    </a>
                </li>

                <li>
                    <a class="menu-item" href="<?= $baseUrl ?>?page=Register">
                        REGISTREER
                    </a>
                </li>
            <?php
            }
            ?>

        </ul>
    </nav>
</section>


<section class="mobile-menu">

    <a href="#main-menu" id="main-menu-toggle" class="menu-toggle" aria-label="Open main menu">
        <span class="sr-only">Open menu</span>
        menu
    </a>

    <nav id="main-menu" class="main-menu" aria-label="Main menu">
        <a href="#main-menu-toggle" id="main-menu-close" class="menu-close" aria-label="Close main menu">
            <span class="sr-only">Sluit menu</span>
            X
        </a>

        <ul>
            <li>
                <a class="menu-item" href="<?= $baseUrl ?>">HOME</a>
            </li>
            <li>
                <a class="menu-item" href="<?= $baseUrl ?>?page=Genres">GENRE'S</a>
            </li>

            <?php
            if (isset($_SESSION["user"])) {
            ?>
                <li>
                    <a class="menu-item" href="<?= $baseUrl ?>?page=Library">BIBLIOTHEEK</a>
                </li>
                <li>
                    <a class="menu-item" href="<?= $baseUrl ?>?page=logout">
                        UITLOGGEN
                    </a>
                </li>
                <li>
                    <p class="menu-item">
                        Welkom, <?= $_SESSION["user"]->getFirstname() ?>
                    </p>
                </li>
            <?php
            } else {
            ?>

                <li>
                    <a class="menu-item" href="<?= $baseUrl ?>?page=Register">
                        REGISTREER
                    </a>
                </li>

                <li>
                    <a class="menu-item" href="<?= $baseUrl ?>?page=Login">
                        LOGIN
                    </a>
                </li>
            <?php
            }
            ?>

            <li>
                <form method="get" action="?page=Search">
                    <input name="page" type="hidden" value="Search">
                    <input type="text" name="searchTerm" placeholder="zoeken naar films">
                    <button type="submit">zoeken</button>
                </form>
            </li>
        </ul>
    </nav>
    <a href="#main-menu-toggle" class="backdrop" tabindex="-1" aria-hidden="true" hidden></a>
</section>