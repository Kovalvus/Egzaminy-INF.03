<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wyszukiwarka miast</title>
    <link rel="stylesheet" href="style.css">
    <link rel="shortcut icon" href="fav.png" type="image/x-icon">
</head>
<body>
    

        <header class="Bheader">
            <img src="baner.jpg" alt="Polska">
        </header>

    <section class="Container">
        
        <section class="LeftContainer">
            <section class="Bleft1">
                <h4>Podaj początek nazwy miasta</h4>
                <form action="index.php" method="post">
                    <input type="text" name="CityName">
                    <input type="submit" value="Szukaj">
                </form>
            </section>

            <section class="Bleft2">
                <p>Egzamin INF.03</p>
                <p>Autor: 00000000000</p>
            </section>
        </section>
        <section class="Bright">
            <h1>Wyniki wyszukiwania miast z uwzględnieniem filtra:</h1>
            <?php
            $con = mysqli_connect("localhost","root","","wykaz");
            $Filter = @$_POST['CityName'];
            echo ("<p class='Filter'>$Filter</p>");
            $query = "SELECT miasta.nazwa, wojewodztwa.nazwa FROM miasta JOIN wojewodztwa ON miasta.id_wojewodztwa = wojewodztwa.id WHERE miasta.nazwa LIKE '$Filter%' ORDER BY miasta.nazwa ASC";
            $result = mysqli_query($con, $query);
            echo ("
            <table>
                <tr>
                    <th>Miasto</th>
                    <th>Województwo</th>
                </tr>
            </table>
            ");
            while($row = mysqli_fetch_array($result)) {   
               echo ("
               <table>
                    <tr>
                        <td>$row[0]</td>
                        <td>$row[1]</td>
                    </tr>
               </table>
               ");
            }
            mysqli_close($con);
            ?>
        </section>

    </section>


</body>
</html>