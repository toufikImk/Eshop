<?php
if(!isset($_SESSION))  {  session_start();  } 	
?>

<html>
<head>
<style>
	/* debut style div-produit*/
	.divproduit{
		box-shadow: 0 1px 2px rgba(0,0,0,0.25), 0 1px 2px rgba(0,0,0,0.25);
		text-align:center;
		background-color:#FFF;
		float:left;
		margin-top:10px;
		margin-bottom:15px;		
		padding-bottom:10px;
		height: auto;
	}
	.col-item .photo img
	{
		width: 100%;
	}
	.btn-detailes{
		cursor:pointer;
		text-decoration:none !important;
		font-weight: 600;
		color: #ffa700;
		padding-left: 40%;
		padding-top: 10px;
		border-top: 1px solid #ccc;
	}
	.info
	{
	   color: #444;
		font-weight: 600;
		font-size: 20px;
		margin: 5px;
	}
	.prix
	{
	   color: #178119;
		font-family: cursive;
		font-size: 17px;
		margin: 5px;
	}
	.autre{
		padding-bottom:10px !important;
	}
	.autre>span{
		font-weight: 600;
		color: #5bc0de;
		font-size: 14px;
	}
	/* fin style div-produit*/
	/* debut style pagination*/
	.pagination a{
	  border-radius: 0 !important;
	  border: 1px solid #bbb;
	  font-weight: 600 !important;
	}
	.pageactive{
		background-color: darkseagreen !important;
		color: #FFF !important;
	}
	.pagedisable{
		pointer-events: none;
		color: #aaa !important;
	}
	/* fin style pagination*/
	.selecto{
		box-shadow: none !important;
		border: 1px solid #ddd;
		border-radius:0;
		margin-bottom: 20px;
	}
</style>
<title>The filter page</title>
</head>
<body style="padding-top:90px; background-color:#f5f5f5">
 
<?php
include('ExecutQuery.php');
include('navbar.php');
if(isset($_GET['article'])){
	$_SESSION['productquery']="SELECT * FROM `bddproject`.`produit` NATURAL JOIN `article` WHERE `type-article` ='".$_GET['article']."' AND `quantite` > 0 ";
}
if((isset($_GET['f']))||(!isset($_SESSION['productquery']))){
	$_SESSION['productquery']="SELECT * FROM `bddproject`.`produit` WHERE `quantite` > 0 ";
}
?>
	<!--filtre sidebare---------------------------------------------------------------------------------------->
	<div class="col-sm-2 col-md-2" >
		<div style="margin-top:10px;box-shadow: 0 1px 2px rgba(0,0,0,0.3), 0 1px 2px rgba(0,0,0,0.3); padding:10px;background-color:#fff">
			<form method="post" action="ExecutQuery.php">
				<h4>Filtre des Produits</h4>
				<label>cat�gorie :
				</label>
				<select class="form-control selecto" name="category">
					<option hidden="hidden" disabled selected value>S�lectionner une Cat�gorie</option>
					<?php
						$sql = PRODUCTMARQUE("type-article","IDArticle","article");
						$result = mysqli_query($link,$sql);
						while($row = mysqli_fetch_assoc($result)) echo ("<option>".$row['type-article']."</option>");
					?>
				</select>
				<label>Marque :
				</label>
				<select class="form-control selecto" name="marque">
					<option hidden="hidden" disabled selected value>S�lectionner une Marque</option>
					<?php
								$sql = PRODUCTMARQUE("nom-marque","IDMarque","marque");
								$result = mysqli_query($link,$sql);
								while($row = mysqli_fetch_assoc($result)) echo ("<option>".$row['nom-marque']."</option>");
								?>
				</select>
				<label>Couleur :
				</label>
				<select class="form-control selecto" name="couleur">
					<option hidden="hidden" disabled selected value>S�lectionner une Couleur</option>
					<?php
								$sql = PRODUCTMARQUE("nom-couleur","IDCouleur","couleur");
								$result = mysqli_query($link,$sql);
								while($row = mysqli_fetch_assoc($result))echo ("<option>".$row['nom-couleur']."</option>");
								?>
				</select>
				<label>Taille :
				</label>
				<select class="form-control selecto" name="taille">
					<option hidden="hidden" disabled selected value>S�lectionner une Taille</option>
					<option>s</option>
					<option>m</option>
					<option>l</option>
					<option>xl</option>
					<option>xxl</option>
				</select>
				<label>Prix Max (DA):
				</label>
				<input type="number" class="form-control selecto" min="1" value="" placeholder="DA" name="prixmax">
				<input type="submit" class="form-control btn-info selecto" value="Filtrer" name="filtre">
			</form>
				<hr>
			<form method="post" action="filter.php?f=all">
				<input type="submit" class="form-control btn-info selecto" value="Afficher tous">
			</form>
		</div>	
    </div>
	<!-- product nav ----------------------------------------------------------------------------------------->
	<div class="col-sm-8 col-md-10 main" style="border-left:1px solid #ddd">
		<!-- CARDS ------------------------------------------------------------------------------------------->
		<div class="row placeholders">
			<?php
				$_session["tableproduit"]=array();
				$_session["tableproduit"]=remplirtableproduit($link,$_SESSION['productquery']); 
				if (isset($_GET["p"])) $p=$_GET["p"]; else $p=1;
				for($i=(15*$p-15);$i<15*$p;$i++){
					if ($i==sizeof($_session["tableproduit"])) break;
					$result=mysqli_query($link,'SELECT * FROM `bddproject`.`produit` NATURAL JOIN `couleur` WHERE `IDProduit`='.$_session["tableproduit"][$i]);	
					while($row = mysqli_fetch_assoc($result)){
					$info = infoproduit($row,$link);
					$nbcol=nbcol($row['IDcp'],$link);
					echo(' 
						<div class="col-md-3 col-xs-6" style="padding:0 10px">
							<div class="divproduit">
								<div class="col-item">
									<div class="photo">
										<img src="pic/text.png" alt="a" />
									</div>
									<div>
										<div class="row">
											<div>
												<p class="info">'.$info.'</p>
												<p style="text-decoration: line-through">320 DA</p>
												<p class="prix">'.$row["prixvente"].' DA</p>
												<p class="autre"><span>'.$nbcol.'</span> couleurs disponible</p>
											</div>
										</div>
											<div class="row">
												<div class="col-lg-6">
													<a href="cart.php?action=ajout&IDcp='.$row['IDcp'].'&couleur='.$row['nom-couleur'].'&taille='.$row['taille'].'&quantite=1">
													<button id="addtocart" align="left" class="btn-warning" style="color:black; margin: 0px;"><b>Add to cart</b></button></a>
												</div>
													<div class="col-lg-6">
													<a align="right" style="float: right; margin-right: 4px;font-weight:600" 	href="product.php?id='.$row['IDcp'].'&name='.$info.'">D�tails <span class="glyphicon glyphicon-chevron-right"></span>
													</a>
												</div>
											</div>
									</div>
								</div>
							</div>
						</div>
						'); 
					}
				}
			?>
		</div>  
		<!-- PAGINATION  ------------------------------------------------------------------------------------->
		<?php
			$nbpage=intval(sizeof($_session["tableproduit"])/15);
			if ($nbpage*15!=sizeof($_session["tableproduit"]))	$nbpage++;
		?>
		<hr>
		<div class="row">
			<center>
				<nav aria-label="Page navigation">
					<ul class="pagination">
						<?php (($p-3)<1)?$class="pagedisable" :$class="";
						echo('<li >
						<a class="'.$class.'" href="filter.php?p='.($p-3).'">
						<span aria-hidden="true">&laquo;</span>
						</a>
						</li>'); ?>
						<?php (($p-1)<1)?$class="pagedisable" :$class=""; 
						echo('<li><a class="'.$class.'" href="filter.php?p='.($p-1).'">'.($p-1).'</a></li>'); ?>

						<?php echo('<li ><a class="pageactive" href="filter.php?p='.$p.'">'.$p.'</a></li>'); ?>

						<?php (($p+1)>$nbpage)?$class="pagedisable" :$class=""; 
						echo('<li><a class="'.$class.'" href="filter.php?p='.($p+1).'">'.($p+1).'</a></li>'); ?>

						<?php (($p+2)>$nbpage)?$class="pagedisable" :$class="";
						echo('<li><a class="'.$class.'" href="filter.php?p='.($p+2).'">'.($p+2).'</a></li>'); ?>

						<?php (($p+3)>$nbpage)?$class="pagedisable" :$class=""; 
						echo('<li >
						<a class="'.$class.'" href="filter.php?p='.($p+3).'">
						<span aria-hidden="true">&raquo;</span>
						</a>
						</li>'); ?>
					</ul>
				</nav>
			</center>
		</div>
	</div>
</body>
</html>