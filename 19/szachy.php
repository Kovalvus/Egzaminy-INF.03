<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KOŁO SZACHOWE</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <header class="Bheader">
        <h2><i>Koło szachowe gambit piona</i></h2>
    </header>

    <section class="Container">
        <section class="Bleft">
            <h4>Polecane linki</h4>
            <ul>
                <li><a href="kw1.png">kwerenda1</a></li>
                <li><a href="kw2.png">kwerenda2</a></li>
                <li><a href="kw3.png">kwerenda3</a></li>
                <li><a href="kw4.png">kwerenda4</a></li>
            </ul>
            <img src="logo.png" alt="Logo koła">
        </section>

        <section class="Bright">
            <h3>Najlepsi gracze naszego koła</h3>
            <table>
                <tr>
                    <th>Pozycja</th>
                    <th>Pseudonim</th>
                    <th>Tytuł</th>
                    <th>Ranking</th>
                    <th>Klasa</th>
                </tr>
                <?php
                    $con = mysqli_connect('localhost','root','','szachy');
                    $query = 'SELECT pseudonim, tytul, ranking, klasa FROM zawodnicy WHERE ranking > 2787 ORDER BY ranking DESC; ';
                    $result = mysqli_query($con, $query);
                    $Position = 0;
                    while($row = mysqli_fetch_array($result)) {
                        $Position++;
                        echo ("
                        <tr>
                            <td>$Position</td>
                            <td>$row[0]</td>
                            <td>$row[1]</td>
                            <td>$row[2]</td>
                            <td>$row[3]</td>
                        </tr>
                        ");
                    }
                    mysqli_close($con);
                ?>     
            </table>
            <form action="szachy.php" method="post">
                <input type="submit" value="Losuj nową parę graczy">
                <?php
                    $con = mysqli_connect('localhost','root','','szachy');
                    $query = 'SELECT pseudonim, klasa FROM zawodnicy ORDER BY RAND() LIMIT 2;';
                    $result = mysqli_query($con, $query);
                    while($row = mysqli_fetch_array($result)) {
                        echo ("<h4>$row[0] $row[1]</h4>");
                    }
                    mysqli_close($con);
                ?>
            </form>
            <p>Legenda: AM - Absolutny Mistrz, SM - Szkolny Mistrz, PM - Mistrz Poziomu, KM - Mistrz Klasowy</p>
        </section>
        
    </section>
    <footer class="Bfooter">
        <p>Stronę wykonał: 00000000000</p>
    </footer>
</body>
</html>