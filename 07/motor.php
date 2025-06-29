<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=\, initial-scale=1.0">
    <title>Motocykle</title>
    <link rel="stylesheet" href="styl.css">
</head>

<body>
    
    <img src="motor.png" alt="motocykl" class="motorpng">

    <header class="baner">
        <h1>Motocykle - moja pasja</h1>
    </header>

    <section class="BlockContainer">
        <section class="Bleft">
            <h2>Gdzie pojechać?</h2>
            <dl>
                <?php
                $con = mysqli_connect("localhost","root","","motory");
                $query = "SELECT wycieczki.nazwa, wycieczki.opis, wycieczki.poczatek, zdjecia.zrodlo FROM wycieczki INNER JOIN zdjecia ON wycieczki.zdjecia_id = zdjecia.id;";
                if ($result = mysqli_query($con, $query)) {
                    while ($row = mysqli_fetch_row($result)) {
                        echo 
                        ("
                        <dt>$row[0] rozpoczyna się w $row[2] <a href='$row[3].jpg'>zobacz zdjęcie</a></dt>
                            <dd>$row[1]</dd>
                        ");
                    }
                }
                mysqli_close($con);
                ?>
            </dl>
        </section>

        <section class="ContainerRight">
            <section class="Bright1 Bright">
                <h2>Co kupić?</h2>
                <ol>
                    <li>Honda CBR125R</li>
                    <li>Yamaha YBR125</li>
                    <li>Honda VFR800i</li>
                    <li>Honda CBR1100XX</li>
                    <li>BMW R1200GS LC</li>
                </ol>
            </section>

            <section class="Bright2 Bright">
                <h2>Statystyki</h2>
                <p>Wpisanych wycieczek: 
                    <?php
                    $con = mysqli_connect("localhost","root","","motory");
                    $query = "SELECT COUNT(*) FROM wycieczki;";
                    if ($result = mysqli_query($con, $query)) {
                        while ($row = mysqli_fetch_row($result)) {
                            echo $row[0];
                        }
                    }
                    mysqli_close($con);
                    ?>
                </p>
                <p>Użytkowników forum: 200</p>
                <p>Przesłanych zdjęć: 1300</p>
            </section>
        </section>
    </section>
    <footer class="stopka">
        <p>Stronę wykonał: 00000000000</p>
    </footer>
</body>
</html>