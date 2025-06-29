<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Obuwie</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header class="Banner">
        <h1>Obuwie męskie</h1>
    </header>

    <section class="Main">
        <h2>Zamówienie</h2>
        
        <?php
        $con = mysqli_connect("localhost","root","","obuwie");  #nie dziala tylko odbieranie wartosci z forma ewentualnie samo wyswietlanie ich cala reszta strony dziala
        $model = @$_POST["ModelSelect"];
        $amount = @$_POST["AmountSelect"];
        $size = @$_POST["SizeSelect"];
        $query = "SELECT buty.nazwa, buty.cena, kolor, kod_produktu, material, nazwa_pliku from produkt inner join buty on produkt.model = buty.model WHERE buty.model = '$model';";
        $result = mysqli_query($con, $query);
        while($row = mysqli_fetch_array($result)) {
            $price = $row[1] * $amount;
            echo 
            ("
            <img src='$row[5]' alt='but męski'>
            <h2>$row[0]</h2>
            <p>cena za $amount par: $price zł</p>
            <p>Szczegóły produktu: $row[2], $row[4]</p>
            <p>Rozmiar: $size</p> 
            ");
        }
        mysqli_close($con);
        ?>

         <a href="index.php">Strona główna</a>
    </section>

    <footer class="Bfooter">
        <p>Autor strony: 00000000000</p>
    </footer>
</body>
</html>