<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Poziomy rzek</title>
    <link rel="stylesheet" href="styl.css">
</head>
<body>

    <section class="HeaderContainer Container">
        <header class="Banner1 Banner">
            <img src="obraz1.png" alt="Mapa Polski">
        </header>

        <header class="Banner2 Banner">
            <h1>Rzeki w województwie dolnośląskim</h1>
        </header>
    </section>

    <section class="Bmenu">
        <form action="poziomRzek.php" method="post">
        <label for="All" class="RadioName"><input type="radio" name="RiverFilter" id="All" value="ALL" checked="checked">Wszystkie</label>
        <label for="Warning" class="RadioName"> <input type="radio" name="RiverFilter" id="Warning" value="Warning">Ponad stan ostrzegawczy</label>
        <label for="Alarm" class="RadioName"><input type="radio" name="RiverFilter" id="Alarm" value="Alarm">Ponad stan alarmowy</label>
        <input type="submit" value="Pokaż">
        </form>      
    </section>

    <section class="BlockContainer Container">
        <section class="Bleft">
            <h3>Stany na dzień 2022-05-05</h3>
            <table>
                <tr>
                    <th>Wodomierz</th>
                    <th>Rzeka</th>
                    <th>Ostrzegawczy</th>
                    <th>Alarmowy</th>
                    <th>Aktualny</th>
                </tr>

                <?php
                    $con = mysqli_connect("localhost","root","","rzeki");
                    $queryALL = "select wodowskazy.nazwa, wodowskazy.rzeka, wodowskazy.stanOstrzegawczy, wodowskazy.stanAlarmowy, pomiary.stanWody FROM wodowskazy INNER JOIN pomiary ON wodowskazy.id = pomiary.wodowskazy_id WHERE pomiary.dataPomiaru = '2022-05-05';";
                    $queryWarning = "select wodowskazy.nazwa, wodowskazy.rzeka, wodowskazy.stanOstrzegawczy, wodowskazy.stanAlarmowy, pomiary.stanWody FROM wodowskazy INNER JOIN pomiary ON wodowskazy.id = pomiary.wodowskazy_id WHERE pomiary.dataPomiaru = '2022-05-05' AND pomiary.stanWody > wodowskazy.stanOstrzegawczy;";
                    $queryAlarm = "select wodowskazy.nazwa, wodowskazy.rzeka, wodowskazy.stanOstrzegawczy, wodowskazy.stanAlarmowy, pomiary.stanWody FROM wodowskazy INNER JOIN pomiary ON wodowskazy.id = pomiary.wodowskazy_id WHERE pomiary.dataPomiaru = '2022-05-05' AND pomiary.stanWody > wodowskazy.stanAlarmowy;";

                        $Option = @$_POST["RiverFilter"];
                        if ($Option == "ALL") {
                            if ($result = mysqli_query($con, $queryALL)) {
                                while ($row = mysqli_fetch_row($result)) {
                                    echo 
                                    ("
                                    <tr>
                                    <td>$row[0]</td>
                                    <td>$row[1]</td>
                                    <td>$row[2]</td>
                                    <td>$row[3]</td>
                                    <td>$row[4]</td>
                                    </tr>
                                    ");
                                }
                            }
                        }
                        else if ($Option == "Warning") {
                            if ($result = mysqli_query($con, $queryWarning)) {
                                while ($row = mysqli_fetch_row($result)) {
                                    echo 
                                    ("
                                    <tr>
                                    <td>$row[0]</td>
                                    <td>$row[1]</td>
                                    <td>$row[2]</td>
                                    <td>$row[3]</td>
                                    <td>$row[4]</td>
                                    </tr>
                                    ");
                                }
                            }
                        }
                        else if ($Option == "Alarm") {
                            if ($result = mysqli_query($con, $queryAlarm)) {
                                while ($row = mysqli_fetch_row($result)) {
                                    echo 
                                    ("
                                    <tr>
                                    <td>$row[0]</td>
                                    <td>$row[1]</td>
                                    <td>$row[2]</td>
                                    <td>$row[3]</td>
                                    <td>$row[4]</td>
                                    </tr>
                                    ");
                                }
                            }
                        }
                    
                    mysqli_close($con);
                ?>

            </table>
        </section>
        
        <section class="Bright">
            <h3>Informacje</h3>
            <ul>
                <li>Brak ostrzeżeń o burzach z gradem</li>
                <li>Smog w mieście Wrocław</li>
                <li>Silny wiatr w Karkonoszach</li>
            </ul>
            <h3>Średnie stany wód</h3>
            <?php
            $con = mysqli_connect("localhost","root","","rzeki");
            $query = "SELECT dataPomiaru, AVG(stanWody) FROM pomiary GROUP BY dataPomiaru;";
            if ($result = mysqli_query($con, $query)) {
                while($row = mysqli_fetch_row($result)) {
                    echo 
                    ("
                    <p>$row[0]: $row[1]</p>
                    ");
                }
            }
            mysqli_close($con);
            ?>
            <a href="https://komunikaty.pl">Dowiedz się więcej</a>
            <img src="obraz2.jpg" alt="rzeka">
        </section>
    </section>

    <footer class="Bfooter">
        <p>Stronę wykonał: 00000000000</p>
    </footer>
</body>
</html>