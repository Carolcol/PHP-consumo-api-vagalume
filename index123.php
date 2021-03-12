<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" id="usrform" method="POST">
        <label for="members-number">Quantidade de integrantes: </label></br>
        <input type="number" name="members-number" id="members-number" required="true"></br>
        <label for="names">Nomes: </label></br>
        <textarea name="names" id="names" rows="20" cols="50" required="true"></textarea></br>
        <button name="submit" type="submit">Criar Grupos</button>
    </form>
    </br>

    <?php

    if (isset($_POST['submit'])) {
    
        $names = $_POST['names'];
        $membersNumber = intval($_POST['members-number']);
        $members = explode("\n", $names);
    
        function createTable($members, $number)
        {
            $counter = 1;
    
            while (sizeof($members)) {
                echo '<table border="1">
                    <tr><th>GRUPO ' . $counter . '</th></tr>';
                for ($j = 1; $j <= $number && sizeof($members); $j++) {
                    $rand = rand(0, sizeof($members) - 1);
                    echo '<tr><td>';
                    echo $members[$rand];
                    echo '</tr></td>';
                    array_splice($members, $rand, 1);
                }
                echo '</table></br>';
                $counter++;
            }
        }
    
        createTable($members, $membersNumber);
    }
    
    ?>

</body>
</html>
