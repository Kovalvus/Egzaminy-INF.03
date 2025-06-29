<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WOLONTARIAT SZKOLNY</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <header class="Bheader">
        <h1>KONKURS - WOLONTARIAT SZKOLNY</h1>
    </header>
    <section class="Container">
        <section class="Bleft">
            <h3>Konkursowe nagrody</h3>
            <form>
                <input type="submit" value="Losuj nowe nagrody">
            </form>
            <table>
                <tr>
                    <th>Nr</th>
                    <th>Nazwa</th>
                    <th>Opis</th>
                    <th>Wartość</th>
                </tr>
                <?php
                $con = mysqli_connect('localhost','root','','konkurs');
                $query = 'SELECT nazwa, opis, cena FROM nagrody ORDER BY RAND() LIMIT 5;';
                $result = mysqli_query($con, $query);
                $PrizeNr = 0;
                while($row = mysqli_fetch_array($result)) {
                    $PrizeNr++;
                    echo ("
                    <tr>
                        <td>$PrizeNr</td>
                        <td>$row[0]</td>
                        <td>$row[1]</td>
                        <td>$row[2]</td>
                    </tr>
                    ");
                }
                
                mysqli_close($con);
                ?>
            </table>
        </section>

        <section class="Bright">
            <img src="puchar.png" alt="Puchar dla wolontariusza">
            <h4>Polecane linki</h4>
            <ul>
                <li><a href="kw1.png">Kwerenda1</a></li>
                <li><a href="kw2.png">Kwerenda2</a></li>
                <li><a href="kw3.png">Kwerenda3</a></li>
                <li><a href="kw4.png">Kwerenda4</a></li>
            </ul>
        </section>
    </section>
    <footer class="Bfooter">
        <p>Numer zdającego: 00000000000</p>
    </footer>
</body>
</html>