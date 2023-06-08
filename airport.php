<?php
    

    if(isset($_COOKIE['firstTime']))
    {
        $_COOKIE['firstTime'] = false;
    }
    else
    {
        setcookie('firstTime', true, time() + 3600);
        $_COOKIE['firstTime'] = true;       
    }


?>

<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link rel="stylesheet" href="styl6.css">
    <title>Odloty samolotów</title>
</head>
<body>
    <header>
        <section id="header-left">
            <h2>Odloty z lotniska</h2>
        </section>

        <section id="header-right">
            <img src="zad6.png" alt="logotyp">
        </section>
    </header>

    <main>
        <h4>tabela odlotów</h4>
        
        <table>
            <tr>
                <th>lp.</th>
                <th>numer rejsu</th>
                <th>czas</th>
                <th>kierunek</th>
                <th>status</th>
            </tr>

            <?php
                $conn = mysqli_connect('localhost', 'root', '', 'egzamin');

                $query = "SELECT id, nr_rejsu, czas, kierunek, status_lotu FROM odloty ORDER BY czas DESC";
                $result = mysqli_query($conn, $query);

                while($row = mysqli_fetch_assoc($result))
                {
                    $code =<<<CODE
                        <tr>
                            <td>$row[id]</td>                
                            <td>$row[nr_rejsu]</td>                
                            <td>$row[czas]</td>                
                            <td>$row[kierunek]</td>                
                            <td>$row[status_lotu]</td>                
                        </tr>
                    CODE;

                    echo $code;
                }

                mysqli_close($conn);
            ?>
        </table>

    </main>

    <footer>
        <section id="footer-left">
            <a href="kw1.jpg" target="_blank">Pobierz obraz</a>
        </section>

        <section id="footer-middle">
            <?php
                if($_COOKIE['firstTime'])
                {
                    echo "<p><i>Dzień dobry! Sprawdź regulamin naszej strony</i></p>";
                }
                else
                {
                    echo "<p><b>Miło nam, że nas znowu odwiedziłeś</b></p>";
                }
            ?>
        </section>

        <section id="footer-right">
            Autor: Franciszek Pawłowski
        </section>
    </footer>

</body>
</html>