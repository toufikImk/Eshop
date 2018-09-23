<html>
  <head>
	  <title>Index Page</title>
	  <link href="css/carousel.css" rel="stylesheet">
  </head>
<body>
<?php
include('navbar.php');
require_once('ExecutQuery.php');
?>
  
    <!-- A big image div -->
    	<img id="main-img" src="pic/clothes.jpg">
    	<div  class="search">
    		<p id="p1">DESIGNED</p>
    		<p id="p2">FOR YOUR SERVICE</p>
    	</div>


    <!-- CATEGORIES ---------------------------------------------------------------------------------->
    <center><div class="h-title" >
          <h2   id="h-title">What would you like to buy ?</h2>          
    </div></center><br/><br/>
<div class="cats">
<div class="container" id="categories">
<style>
	
</style>
      
<center>
<div class="row">
<div class="col-lg-8">
	<div class="row category">
		<div class="col-lg-4 col-sm-6">
		  <a href="filter.php?article=t-shirt" class="product-title">
		  <img class="img-circle imgcategory" src="pic/t-shirt.jpg"> 
		  <h3>T-Shirt</h3>
		  </a>
		</div>
		<div class="col-lg-4 col-sm-6">
		  <a href="filter.php?article=veste" class="product-title">
		  <img class="img-circle imgcategory" src="pic/veste.jpg"> 
		  <h3>Veste</h3></a>
		</div>
		<div class="col-lg-4 col-sm-6">
		  <a href="filter.php?article=pantalon" class="product-title">
		  <img class="img-circle imgcategory" src="pic/pantalon.jpg"> 
		  <h3>Pantalon</h3></a>
		</div>
	</div>
	<br/>
	<div class="row category">
		<div class="col-lg-6 col-sm-6">
		  <a href="filter.php?article=chaussure" class="product-title">
		  <img class="img-circle imgcategory" src="pic/chaussure.jpg"> 
		  <h3>Chaussure</h3></a>
		</div>
		<div class="col-lg-6 col-sm-6">
		  <a href="filter.php?article=chemise" class="product-title">
		  <img class="img-circle imgcategory" src="pic/chemise.jpg"> 
		  <h3>Chemise</h3></a>
		</div>
	</div>
	</div>
	<div class="col-lg-4">
		<img src="pic/cat.png" style="width: 300px;">
	</div>
	</div>
</center>
          
        </div><!-- /.col-lg-4 -->
      </div><!-- /.row -->
      </div>
      <!-- END OF CATEGORIES -->
      <!-- CARDS ---------------------------------------------------------------------------------------------->
<div>
	<br/><center><h1 id="h-title"> Check our latest products </h1></center>
	<div class="row" style="padding: 40px 20px;">
<?php
	$sql="SELECT * FROM `bddproject`.`produit` NATURAL JOIN `couleur` ORDER BY `IDcp` DESC ";
	$result=mysqli_query($link,$sql);
	$c=0;  $j=-1;
	while (($row=mysqli_fetch_assoc($result))&&($c<8)){
		if($row['IDcp']!=$j){
			$j=$row['IDcp'];
			$c++;
			$info=infoproduit($row,$link);
			
			if($c<5) {
			echo('
				<div class="card col-sm-3">
					<div class="center" style="margin-bottom: 40px;">
						<center>
							<a href="product.php?id='.$row['IDcp'].'&name='.$info.'"><div class="prodpic"><img src="pic/t-shirt.jpg" ></div></a>
							<h3>'.$info.'</h3>
							<p class="prix">'.$row["prixvente"].' DA</p>							
							<h5><span style="text-decoration: underline">Description</span>: '.$row['description'].'</h5>
							<hr>
						</center>	
						<div class="row">
							<div class="col-lg-6">
								<a href="cart.php?action=ajout&IDcp='.$row['IDcp'].'&couleur='.$row['nom-couleur'].'&taille='.$row['taille'].'&quantite=1">
								<button id="addtocart" align="left" class="btn-warning" style="color:black; margin: 0px;"><b>Add to cart</b></button></a>
							</div>
								<div class="col-lg-6">
								<a align="right" style="float: right; margin-right: 4px;font-weight:600" 	href="product.php?id='.$row['IDcp'].'&name='.$info.'">Détails <span class="glyphicon glyphicon-chevron-right"></span>
								</a>
							</div>
						</div>
						<br/>
					</div>
				</div>
			');	}
			
			else {

			echo('

				<div class="card col-sm-3">
					<div class="center">
						<center>
							<a href="product.php?id='.$row['IDcp'].'"><div class="prodpic"><img src="pic/t-shirt.jpg" ></div></a>
							<h3>'.$info.'</h3>
							<hr>
							<p class="prix">'.$row["prixvente"].' DA</p>							
							<h5><span style="text-decoration: underline">Description</span>: '.$row['description'].'</h5>
							<hr>
						</center>	
						<div class="row">
							<div class="col-lg-6">
								<a href="cart.php?action=ajout&IDcp='.$row['IDcp'].'&couleur='.$row['nom-couleur'].'&taille='.$row['taille'].'&quantite=1">
								<button id="addtocart" align="left" class="btn-warning" style="color:black; margin: 0px;"><b>Add to cart</b></button></a>
							</div>
								<div class="col-lg-6">
								<a align="right" style="float: right; margin-right: 4px;font-weight:600" 	href="product.php?id='.$row['IDcp'].'&name='.$info.'">Détails <span class="glyphicon glyphicon-chevron-right"></span>
								</a>
							</div>
						</div>
						<br/>
					</div>
				</div>
			');	

			}

		}
	}
?>
	</div>
</div>
      <!-- END CARDS ---------------------------------------------------------------------------->

  </body>
</html>
