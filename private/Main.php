<?php

class Connection

{

    function getConn_and_incert()
    {
        $verification = false;
        try {

          $news = $_POST['mnewsletter'];

          $Conn = new PDO('mysql:host=127.0.0.1;dbname=Pmma', $username="root", $password="");
          $Conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

          $stmt = $Conn->prepare('INSERT INTO teste (email) VALUES(:news)');
          $stmt->execute(array(
              ':news' => $news
            ));
        }
        catch (\Throwable $error) {
            echo "Erro. Code" . $error->getMessage();
        }

        header("location: ../index.php");

    }


}

$Exc = new Connection();
$Exc->getConn_and_incert();

?>
