<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Komis aut</title>
    <link rel="stylesheet" href="styl.css">
</head>
<body>

    <header class="Banner">
        <h1><i>KupAuto!</i> Internetowy Komis Samochodowy</h1>
    </header>

    <section class="Block1 Block">

        <?php
        $con = mysqli_connect("localhost", "root", "", "kupauto");
        $query = "SELECT model, rocznik, przebieg, paliwo, cena, zdjecie FROM samochody WHERE id=10;";
        $result = mysqli_query($con, $query);
        while($row = mysqli_fetch_array($result)) {
            echo 
            ("
                <img src='$row[5]' alt='oferta dnia'>
                <h4>Oferta Dnia: Toyota $row[0]</h4>
                <p>Rocznik: $row[1], przebieg: $row[2], rodzaj paliwa: $row[3]</p>
                <h4>Cena: $row[4]</h4>
            ");
        }
        mysqli_close($con);
        ?>

    </section>

    <section class="Block2 Block">
        <h2>Oferty Wyróżnione</h2>
        <section class='OfferContainer'>
            <?php
                $con = mysqli_connect("localhost","root","","kupauto");
                $query = "SELECT marki.nazwa, model, rocznik, cena, zdjecie FROM samochody inner join marki on marki.id = samochody.marki_id WHERE samochody.wyrozniony = 1;";
                $result = mysqli_query($con, $query);
                while($row = mysqli_fetch_array($result)) {
                    echo 
                    ("
                        
                        <section class='BlockOffer'>
                        <img src='$row[4]' alt='$row[1]'>
                        <h4>$row[0] $row[1]</h4>
                        <p>Rocznik: $row[2]</p>
                        <h4>Cena: $row[3]</h4>
                        </section>
                    ");
                }
                mysqli_close($con);
            ?>
        </section>
    </section>

    <section class="Block3 Block">
        <h2>Wybierz markę</h2>
        <form action="KupAuto.php" method="post">
            <select name="DropDown" id="DropDown">
                
            <?php
                $con = mysqli_connect("localhost","root","","kupauto");
                $query = "SELECT nazwa FROM marki;";
                $result = mysqli_query($con, $query);
                while($row=mysqli_fetch_array($result)) {
                    echo "<option value='$row[0]'>$row[0]</option>";
                }
                mysqli_close($con);
            ?>

            </select>
            <input type="submit" value="Wyszukaj">
            <section class="OfferContainer">
                <?php
                    $con = mysqli_connect("localhost","root","","kupauto");
                    $car = @$_POST['DropDown'];
                    $query = "SELECT model, cena, zdjecie FROM samochody inner join marki on marki.id = samochody.marki_id WHERE marki.nazwa = '$car';";
                    $result = mysqli_query($con, $query);
                    while($row = mysqli_fetch_array($result)) {
                        echo 
                        ("
                        <section class='BlockOffer'>
                            <img src='$row[2]' alt='$row[0]'>
                            <h4>$car $row[0]</h4>
                            <h4>Cena: $row[1]</h4>
                        </section>
                        ");
                    }
                    mysqli_close($con);
                ?>
            </section>
        </form>
    </section>

    <footer class="Bfooter">
        <p>Stronę wykonał: 00000000000</p>
        <p><a href="http://firmy.pl/komis">Znajdź nas także</a></p>
    </footer>

</body>
</html>