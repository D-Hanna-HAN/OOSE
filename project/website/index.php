<?php
include "load.php";
session_start();
$error ="";
if (isset($_SESSION['most_recent_activity']) && (time() -   $_SESSION['most_recent_activity'] > 1200)) {
    session_destroy();
    session_unset();
}
if (isset($_POST)) {
    foreach ($_POST as $key => $value) {
        $_POST[$key] = htmlspecialchars($value);
    }
}
if (isset($_GET)) {
    foreach ($_GET as $key => $value) {
        if (is_array($value)) {

            foreach ($value as $valueKey => $valueValue) {
                $value[$valueKey] = htmlspecialchars($valueValue);
            }
        } else {
            $_GET[$key] = htmlspecialchars($value);
        }
    }
}
$_SESSION['most_recent_activity'] = time();

$pageTitle = "";
if (isset($_GET["page"])) {
    $pageTitle = $_GET["page"];
} else {
    $pageTitle = "Home";
}
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="style/style.css" rel="stylesheet">
    <title><?= $pageTitle ?></title>
</head>

<body>
    <?php
    include "view/components/Navbar.php";
    ?>
    <main>
        <section>
            <?php
            if (file_exists("views/" . $pageTitle . ".php")) {
                include "views/" . $pageTitle . ".php";
            } else {

                include "views/404.php";
            }
            ?>
        </section>
    </main>
    <?php
    include "components/Footer.php"
    ?>
</body>

</html>