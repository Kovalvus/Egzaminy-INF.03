<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Firma szkoleniowa</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <section class="Container">

    <header class="Bheader">
        <img src="baner.jpg" alt="Szkolenia">
    </header>

    <section class="Container2">
        <section class="Bmenu">
            <ul>
                <li><a href="index.html">Strona główna</a></li>
                <li><a href="szkolenia.php">Szkolenia</a></li>
            </ul>
        </section>

        <main class="Bmain">
            <?php
            $con = mysqli_connect("localhost", "root", "", "firma");
            $query = "SELECT Data, Temat FROM szkolenia ORDER BY Data ASC;";
            $result = mysqli_query($con, $query);
            $file = fopen("harmonogram.txt", "w") or die("Unable to open file");
            while($row = mysqli_fetch_row($result)) {
                echo ("<p>$row[0] $row[1]</p><br>");
                $text = "$row[0] $row[1]\n";
                fwrite($file, $text);
            }
            fclose($file);
            mysqli_close($con);
            ?>
        </main>
    </section>
    <footer class="Bfooter">
        <h2>Firma szkoleniowa, ul. Główna 1, 23-456 Warszawa</h2>
        <p>Autor: 00000000000</p>
    </footer>

    </section>
    
</body>
</html>