<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Document</title>
</head>
<body>
    <?php
        $data = date("d-m-Y H:i");
        if (!isset($_POST["portate"]) || (count($_POST["portate"]) == 1 && $_POST["portate"][0] == "antipasto")) {
            echo "<h1> Errore!! Portata non valida</h1>";
            echo "<p>$data</p>";
            echo "<a href='index.html'>Tornare al menù principale</a> <br>";
            exit();
        } else {
            $camerieri = ["piero", "nicola", "gianfranco", "mauro", "angelo"];
            $cameriere = $camerieri[rand(0,4)];
            $portate = $_POST["portate"];
            $nome = $_POST["nome"];
            $cognome = $_POST["cognome"];
            $tavolo = $_POST["tavolo"];
            $orario = $_POST["orario"];
            $note = $_POST["note"];
            $portate = $_POST["portate"];
            $parcheggio = $_POST["parcheggio"];
            $prezzoTotale = 0;
            $antipasto = false;
            $primo = false;
            $secondo = false;
            foreach ($portate as $portata) {
                switch ($portata) {
                    case "antipasto":
                        $prezzoTotale += 5;
                        $antipasto = true;
                        break;
                    case "primo":
                        $prezzoTotale += 6;
                        $primo = true;
                        break;
                    case "secondo":
                        $prezzoTotale += 7;
                        $secondo = true;
                        break;
                }
            }
            if ($primo && $secondo && !$antipasto) {
                $prezzoTotale *= 0.9;
            } else if ($primo && $secondo && $antipasto) {
                $prezzoTotale *= 0.85;
            }
            $prezzoFinale = $prezzoTotale;
            if ($parcheggio == "custodito") {
                $prezzoFinale += 5;
            } else if ($parcheggio == "non_custodito") {
                $prezzoFinale += 3;
            }
        }
    ?>
    <br>
    <table>
        <tr>
            <th>Nome</th>
            <th>Cognome</th>
            <th>Tavolo</th>
            <th>Orario</th>
            <th>Cameriere</th>
            <th>Note aggiuntive</th>
            <th>Portate</th>
            <th>Parcheggio</th>
            <th>Data prenotazione</th>
            <th>Prezzo totale</th>
            <th>Prezzo finale</th>
        </tr>
        <tr>
            <td><?php echo $nome?></td>
            <td><?php echo $cognome?></td>
            <td><?php echo $tavolo?></td>
            <td><?php echo $orario?></td>
            <td><?php echo $cameriere?></td>
            <td><?php echo $note?></td>
            <td><?php foreach ($portate as $portata) {
                    echo "$portata, ";
                }?></td>
            <td><?php echo $parcheggio?></td>
            <td><?php echo $data?></td>
            <td><?php echo $prezzoTotale?></td>
            <td><?php echo $prezzoFinale?></td>
        </tr>
    </table>
</body>
</html>