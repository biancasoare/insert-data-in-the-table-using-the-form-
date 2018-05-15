<!DOCTYPE html>
<html>
    <head>
        <title>Colectie CD-uri</title>
        <meta charset="utf-8">
    </head>
    <body>
        <h1>Lista CD-uri</h1>
        <?php
        /**
         * Created by PhpStorm.
         * User: soarebianca
         * Date: 14/05/2018
         * Time: 19:09
         */
            require_once("mysql_connect.php");
            $query = "SELECT * FROM cds ORDER BY artist ASC";
            $result = mysqli_query($link, $query) or die(mysqli_error($link));

            //verific dac aexista rezultate
            if (mysqli_num_rows($result)>0) {
                //afisez rezultate
                $table = "<table>\n";
                $table .= "\t<tr>\n";
                $table .= "\t\t<th scope=\"col\">Artist</th>\n";
                $table .= "\t\t<th scope=\"col\">Album</th>\n";
                $table .= "\t\t<th scope=\"col\">Gen</th>\n";
                $table .= "\t</tr>\n";
                //parcurg rezultatele
                while ($cd = mysqli_fetch_assoc($result)){
                    $table .= "\t<tr>\n";
                    $table .= "\t\t<td>{$cd['artist']}</td>\n";
                    $table .= "\t\t<td>{$cd['album']}</td>\n";
                    $table .= "\t\t<td>{$cd['gen']}</td>\n";
                    $table .= "\t</tr>\n";
                }
                $table .= "</table>";
                echo $table;
            } else {
                echo "<p>Nu exista rezultate</p>";
            }
        ?>
    </body>
</html>


