<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="refresh" content="10">
    <title>Ważenie samochodów ciężarowych</title>
    <link rel="stylesheet" href="styl.css">
</head>
<body>

    <section class="BannerContainer Container">
        <header class="Banner1 Banner">
            <h1>Ważenie pojazdów we Wrocławiu</h1>
        </header>

        <header class="Banner2 Banner">
            <img src="obraz1.png" alt="waga">
        </header>
    </section>

    <section class="MainContainer Container">
        <section class="LeftBlock Block">
            <h2>Lokalizacje wag</h2>
            <ol>
                <?php
                    $con = mysqli_connect("localhost","root","","wazenietirow");
                    $query = "SELECT ulica FROM lokalizacje;";
                    $result = mysqli_query($con, $query);
                    while($row = mysqli_fetch_array($result)) {
                        echo "<li>ulica $row[0]</li>";
                    }
                    mysqli_close($con);
                ?>
            </ol>
            <h2>Kontakt</h2>
            <a href="mailto:wazenie@wroclaw.pl">napisz</a>
        </section>

        <section class="MiddleBlock Block">
            <h2>Alerty</h2>
            <table>
                <tr>
                    <th>rejestracja</th>
                    <th>ulica</th>
                    <th>waga</th>
                    <th>dzień</th>
                    <th>czas</th>
                </tr>
                <?php
                $con = mysqli_connect("localhost","root","","wazenietirow");
                $query = "SELECT rejestracja, waga, dzien, czas, lokalizacje.ulica FROM wagi inner join lokalizacje on lokalizacje.id = wagi.lokalizacje_id WHERE wagi.waga > 5;";
                $result = mysqli_query($con, $query);
                while($row = mysqli_fetch_array($result)) {
                    echo 
                    ("
                    <tr>
                    <td>$row[0]</td>
                    <td>$row[4]</td>
                    <td>$row[1]</td>
                    <td>$row[2]</td>
                    <td>$row[3]</td>
                    </tr>
                    ");
                }
                mysqli_close($con);
                ?>
            </table>
            <?php
            $con = mysqli_connect("localhost","root","","wazenietirow");
            $query = "INSERT INTO wagi (lokalizacje_id, waga, rejestracja, dzien, czas) VALUES (5, FLOOR(1 + RAND() * (10 - 1+1)), 'DW12345', CURDATE(), CURTIME()); ";
            $result = mysqli_query($con, $query);
            
            mysqli_close($con);
            ?>
        </section>

        <section class="RightBlock Block">
            <img src="obraz2.jpg" alt="tir">
        </section>
    </section>
    <footer class="BFooter">
        <p>Stronę wykonał: 00000000000</p>
    </footer>
</body>
</html>