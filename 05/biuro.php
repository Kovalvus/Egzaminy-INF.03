<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Poznaj Europę</title>
    <link rel="stylesheet" href="styl9.css">
</head>
<body>
    <header class="baner">
        <h1>BIURO PODRÓŻY</h1>
    </header>

    <div class="container">
        <div class="Bleft">
            <h2>Promocje</h2>
            <table>
                <tr>
                    <td>Warszawa</td>
                    <td>od 600zł</td>
                </tr>
                <tr>
                    <td>Wenecja</td>
                    <td>od 1200zł</td>
                </tr>
                <tr>
                    <td>Paryż</td>
                    <td>od 1200zł</td>
                </tr>
            </table>
        </div>

        <div class="Bmiddle">
            <h2>W tym roku jedziemy do...</h2>
            <?php
            $con = mysqli_connect('localhost','root','','podroze2');
            $query = "SELECT nazwaPliku, podpis FROM zdjecia ORDER BY podpis ASC;";
            
            if ($result = mysqli_query($con, $query)) {
                while ($row = mysqli_fetch_row($result)) {
                    echo("<img src='$row[0]' alt='$row[1]' title='$row[1]'>");
                }
            }
            mysqli_close($con);
            ?>

        </div>

        <div class="Bright">
            <h2>Kontakt</h2>
            <a href="mailto:biuro@wycieczki.pl">napisz do nas</a>
            <p>telefon: 444555666</p>
        </div>
    </div>

    <div class="Bdata">
        <h3>W poprzednich latach byliśmy...</h3>
        <ol>
            <?php
            $con = mysqli_connect("localhost","root","","podroze2");
            $query = "SELECT cel, dataWyjazdu FROM wycieczki WHERE dostepna = 0;";

            if ($result = mysqli_query($con, $query)) {
                while ($row = mysqli_fetch_row($result)) {
                    echo ("
                    <li>
                    Dnia $row[1] pojechaliśmy do $row[0]
                    </li>
                    ");
                }
            }
            mysqli_close($con);
            ?>
        </ol>
    </div>

    <footer class="stopka">
        <p>Stronę wykonał: 00000000000</p>
    </footer>
</body>
</html>