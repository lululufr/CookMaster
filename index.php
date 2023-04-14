<?php session_start();
require "./Function/function.php"; ?>

<?php include("./Header-Footer/head.php");?>


<body >

<?php include("./Header-Footer/header.php");?>


<div class="hero min-h-screen bg-base-200">
  <div class="hero-content text-center">
    <div class="max-w-md">
      <h1 class="text-5xl font-bold">Hello there</h1>
      <p class="py-6">Provident cupiditate voluptatem et in. Quaerat fugiat ut assumenda excepturi exercitationem quasi. In deleniti eaque aut repudiandae et a id nisi.</p>
      <button class="btn btn-primary">Get Started</button>
    </div>
  </div>
</div>

<?php 

$pdo = connectDB();

					$query = $pdo->prepare("SELECT * FROM USER WHERE id=:id");
          
					$query->execute(["id"=>1]);
					$user = $query->fetch();

          foreach($user as $elem){
            echo("<p>".$elem."</p>");
          }
          

?>



<?php include("./Header-Footer/footer.php");?>
</body>
</html>