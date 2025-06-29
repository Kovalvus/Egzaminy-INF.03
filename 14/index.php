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
        <form action="zamow.php" method="post">
            <label for="ModelSelect">Model:</label>
            <select id="ModelSelect" name="ModelSelect" class="ModelSelect kontrolki">
                <?php
                    $con = mysqli_connect("localhost","root","","obuwie");
                    $query = "SELECT model FROM produkt;";
                    $result = mysqli_query($con, $query);
                    while($row = mysqli_fetch_array($result)) {
                        echo "<option value='$row[0]'>$row[0]</option>";
                    }
                    mysqli_close($con);
                ?>

            </select>
            <label for="SizeSelect">Rozmiar:</label>
            <select id="SizeSelect" name="SizeSelect" class="SizeSelect kontrolki">
                <option value="S40">40</option>
                <option value="S41">41</option>
                <option value="S42">42</option>
                <option value="S43">43</option>
            </select>
            <label for="AmountSelect">Liczba par:</label>
            <input type="number" id="AmountSelect" name="AmountSelect" class="AmountSelect kontrolki">
            <input type="submit" value="Zamów" class="kontrolki">
        </form>

        <?php
        $con = mysqli_connect("localhost","root","","obuwie");
        $query = "SELECT buty.model, nazwa, cena, produkt.nazwa_pliku from buty inner join produkt on produkt.model = buty.model;";
        $result = mysqli_query($con, $query);
        while($row = mysqli_fetch_array($result)) {
            echo 
            ("
            <section class='buty'>
                <img src='$row[3]' alt='but męski'>
                <h2>$row[1]</h2>
                <h5>Model: $row[0]</h5>
                <h4>Cena: $row[2]</h4>
            </section>
            ");
        }
        mysqli_close($con);
        ?>

    </section>

    <footer class="Bfooter">
        <p>Autor strony: 00000000000</p>
    </footer>
</body>
</html>