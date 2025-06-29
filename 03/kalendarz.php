<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Zadania na lipiec</title>
    <link rel="stylesheet" href="styl6.css">
</head>
<body>
    <div id="banery">
        <header id="baner_logo">
            <img src="logo1.png" alt="lipiec">
        </header>
        <header id="baner_naglowek">
            <h1>TERMINARZ</h1>
            <p>najbliższe zadania: 
                <?php
                    $con = mysqli_connect('localhost', 'root', '', 'terminarz');
                    $query = 'SELECT DISTINCT wpis FROM zadania WHERE dataZadania BETWEEN "2020-07-01" AND "2020-07-07" AND wpis != "";';
                    $zapytanie = mysqli_query($con, $query);
                    while ($row = mysqli_fetch_array($zapytanie)) {
                        echo $row[0],'; ';
                    }
                    mysqli_close($con);
                ?>
            </p>
        </header>
    </div>
    <main>
        <?php
        $con = mysqli_connect('localhost', 'root', '', 'terminarz');
        $query = 'SELECT dataZadania, wpis FROM zadania WHERE miesiac = "lipiec";';
        $zapytanie = mysqli_query($con, $query);
        while ($row = mysqli_fetch_array($zapytanie)) {
            echo 
            '<div>', 
            '<h6>',$row[0],'</h6>',
            '<p>',$row[1],'</p>',
            '</div>';
        }
        mysqli_close($con);
        ?>
    </main>
    <footer id="stopka">
        <a href="sierpien.html">Terminarz na sierpień</a>
        <p>Stronę wykonał: 00000000000</p>
    </footer>
    
</body>
</html>