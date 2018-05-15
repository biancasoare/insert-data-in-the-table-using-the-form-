<?php
/**
 * Created by PhpStorm.
 * User: soarebianca
 * Date: 14/05/2018
 * Time: 19:08
 */

if (isset($_POST['trimis'])) {
    $artist = $_POST['artist'];
    $album = $_POST['album'];
    $gen = $_POST['gen'];

    //verific ca s-au completat toate campurile
    if ((!empty($artist)) && (!empty($album))) {
        require_once('mysql_connect.php');
        $query = "INSERT INTO cds VALUES(NULL, '$artist', '$album', '$gen')";
        mysqli_query($link, $query) or die(mysqli_error($link));
        if (mysqli_affected_rows($link)>0) {
            $succes = "CD adaugat";
        }
    } else {
        //nu afisez eroarea aici pt a respecta structura HTML
        $error = "Completati toate campurile";
    }
}

?>
<!DOCTYPE html>
<html>
    <head>
        <title>Colectie CD-uri</title>
        <meta charset="utf-8">
    </head>
    <body>
        <h1>Adaugare CD</h1>
        <?php
        //afisez mesajele de eroare sau de succes
        if (isset($error)) {
            echo "<p>$error</p>";
        }
        if (isset($succes)) {
            echo "<p>$succes</p>";
        }
        ?>
        <form action="add.php" method="post">
            <p>
                <label for="artist">Artist</label>
                <input id="artist" type="text" name="artist" value=""/>
            </p>
            <p>
                <label for="album">Album</label>
                <input id="album" type="text" name="album" value=""/>
            </p>
            <p>
                <label for="gen">Selectati genul</label>
                <select name="gen">
                    <option value="rock">Rock</option>
                    <option value="pop">Pop</option>
                    <option value="hip-hop">Hip Hop</option>
                    <option value="latino">Latino</option>
                    <option value="clasic">Clasic</option>
                    <option value="audiobook">Audiobook</option>
                </select>
            </p>
            <p>
                <input type="submit" value="Salveaza" name="trimis"/>
            </p>
        </form>
    </body>
</html>
