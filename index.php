<?php

$username = 'root';
$password = '';
$host = 'localhost';
$data = 'test';

$file = file_get_contents('./SQL/user.sql');

try {
    $db = new PDO('mysql:host=' . $host . ';dbname=' . $data . ';charset=utf8', $username, $password);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

    function eleve($nom, $prenom, $age) {
        $username = 'root';
        $password = '';
        $host = 'localhost';
        $data = 'test';


        $db = new PDO('mysql:host=' . $host . ';dbname=' . $data . ';charset=utf8', $username, $password);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        $sql = "INSERT INTO eleves (nom, prenom, age)
                VALUES ('$nom', '$prenom', '$age')
        ";

        $result = $db->exec($sql);

        echo $result;
    }

    function selectEleve ($idEleve, $nom, $prenom, $age){
        $username = 'root';
        $password = '';
        $host = 'localhost';
        $data = 'test';


        $db = new PDO('mysql:host=' . $host . ';dbname=' . $data . ';charset=utf8', $username, $password);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        $sql = $db->prepare("
                    update eleves set nom = '$nom' where id = $idEleve
        ");
        $sql2 = $db->prepare("
                    update eleves set prenom = '$prenom' where id = $idEleve
        ");
        $sql3 = $db->prepare("
                    update eleves set age = '$age' where id = $idEleve
        ");

        $sql->execute();
        $sql2->execute();
        $sql3->execute();

        echo "Utilisateur changé";
    }

    function deleteEleve ($idEleve){
        $username = 'root';
        $password = '';
        $host = 'localhost';
        $data = 'test';


        $db = new PDO('mysql:host=' . $host . ';dbname=' . $data . ';charset=utf8', $username, $password);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

        $sql = "delete from eleves where id = $idEleve";

        $db->exec($sql);

        if ($db->exec($sql) !== false){
            echo 'l\'Utilisateur dont l\'id est '. $idEleve . ' a bien été supprimé.';
        }
    }

}

catch (PDOException $exception) {
    echo $exception->getMessage();
}
