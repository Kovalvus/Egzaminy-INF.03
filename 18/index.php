<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mieszalnia farb</title>
    <link rel="shortcut icon" href="fav.png" type="image/x-icon">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header class="Bheader">
        <img src="baner.png" alt="Mieszalnia farb">
    </header>

    <section class="Bform">
        <form action="index.php" method="post">
            <label for="DateFrom">Data odbioru od: </label>
            <input type="date" name="DateFrom">
            <label for="DateTo">Do: </label>
            <input type="date" name="DateTo">
            <input type="submit" value="Wyszukaj">
        </form>
    </section>

    <main class="Bmain">
        <table>
            <tr>
                <th>Nr zamówienia</th>
                <th>Nazwisko</th>
                <th>Imię</th>
                <th>Kolor</th>
                <th>Pojemność [ml]</th>
                <th>Data odbioru</th>
            </tr>
            <?php
                $con = mysqli_connect('localhost','root','','mieszalnia');
                $DateFrom = @$_POST['DateFrom'];
                $DateTo = @$_POST['DateTo'];
                
                if($DateFrom == NULL || $DateTo == NULL) {
                    $query = 'SELECT klienci.Nazwisko, klienci.Imie, zamowienia.id, kod_koloru, pojemnosc, data_odbioru FROM zamowienia JOIN klienci ON klienci.Id = zamowienia.id_klienta ORDER BY zamowienia.data_odbioru ASC;'; 
                } else {
                    $query = "SELECT klienci.Nazwisko, klienci.Imie, zamowienia.id, kod_koloru, pojemnosc, data_odbioru FROM zamowienia JOIN klienci ON klienci.Id = zamowienia.id_klienta WHERE zamowienia.data_odbioru BETWEEN '$DateFrom' AND '$DateTo' ORDER BY zamowienia.data_odbioru ASC;";
                }
                $result = mysqli_query($con, $query);
                while($row = mysqli_fetch_array($result)) {
                    echo ("
                    <tr>
                        <td>$row[2]</td>
                        <td>$row[0]</td>
                        <td>$row[1]</td>
                        <td bgcolor='$row[3]'>$row[3]</td>
                        <td>$row[4]</td>
                        <td>$row[5]</td>
                    </tr>
                    ");
                }
                mysqli_close($con);
            ?>
        </table>
    </main>
    <footer class="Bfooter" >
        <h3>Egzamin INF.03</h3>
        <p>Autor: 00000000000</p>
    </footer>
</body>
</html>