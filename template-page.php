<?php session_start();
require "./Function/function.php";
?>


<?php include("./Header-Footer/head.php");?>


<body >

<?php include("./Header-Footer/header.php");?>

<!-- contenu de la page -->

<?php include("./Header-Footer/footer.php");?>
</body>
</html>



<?php 
//template BDD query
$pdo = connectDB();

					$query = $pdo->prepare("SELECT * FROM USER WHERE id=:id");
          
					$query->execute(["id"=>1]);
					$user = $query->fetch();

          foreach($user as $elem){
            echo("<p>".$elem."</p>");
          }
          

?>