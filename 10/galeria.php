<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Galeria</title>
    <link rel="stylesheet" href="styl.css">
</head>
<body>
    <header class="Banner">
        <h1>Zdjęcia</h1>
    </header>
    <section class="Container">
        <section class="Bleft">
            <h2>Tematy zdjęć</h2>
            <ol>
                <li>Zwierzęta</li>
                <li>Krajobrazy</li>
                <li>Miasta</li>
                <li>Przyroda</li>
                <li>Samochody</li>
            </ol>
        </section>
        <section class="Bmiddle">
            <!-- skrypt 1 -->
            <?php
                $con = mysqli_connect("localhost","root","","galeria");
                $query = "SELECT plik, tytul, polubienia, autorzy.imie, autorzy.nazwisko FROM zdjecia JOIN autorzy ON zdjecia.autorzy_id = autorzy.id ORDER BY autorzy.nazwisko ASC;";
                $result = mysqli_query($con, $query);
                while($row = mysqli_fetch_row($result)) {
                    echo ("
                    <section class='Bpicture'>
                    <h3>$row[1]</h3> ");
                        if($row[2] > 40) {
                            echo ("<p>Autor: $row[3] $row[4].<br> Wiele osób polubiło ten obraz</p> ");
                        } else {
                            echo ("<p>Autor: $row[3] $row[4]</p>");
                        }
                        echo ("<a href='$row[0]' download>Pobierz</a>
                        <img src='$row[0]' alt='zdjęcie'>
                        
                        
                    </section>
                    ");
                }
                mysqli_close($con);
            ?>
        </section>
        <section class="Bright">
            <h2>Najbardziej lubiane</h2>
            <?php
            $con = mysqli_connect("localhost", "root", "", "galeria");
            $query = "SELECT tytul, plik FROM zdjecia WHERE polubienia >= 100;";
            $result = mysqli_query($con, $query);
            $row = mysqli_fetch_row($result);
            echo ("<img src='$row[1]' alt='$row[0]'");
            mysqli_close($con);
            ?>
            <strong>Zobacz wszystkie nasze zdjęcia</strong>
        </section>
    </section>
    <footer class="Bfooter">
        <h5>Stronę wykonał: 00000000000</h5>
    </footer>
</body>
</html>