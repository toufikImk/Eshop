<?php
if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 
if (!isset($_SESSION['connect'])||($_SESSION['connect']!="yes")) header ("location:http://localhost/esishop/");
include('ExecutQuery.php');
if ((isset($_SESSION["differentpassword"]))||(isset($_SESSION["erreurancienmotdepass"]))) 
		{ $tab1_1="" ;$tab1_2="" ;$tab1_3="active" ;$tab2_1="" ;$tab2_2="active" ;}
else if (isset($_SESSION["usernameexist2"])) 
		{ $tab1_1="" ;$tab1_2="" ;$tab1_3="active" ;$tab2_1="active" ;$tab2_2="" ;}
else if(isset($_GET['target'])){if($_GET['target']=="facture") {$tab1_1="" ;$tab1_2="active" ;$tab1_3="" ;$tab2_1="active" ;$tab2_2="" ;} }
else {$tab1_1="active" ;$tab1_2="" ;$tab1_3="" ;$tab2_1="active" ;$tab2_2="" ;}
?>
<html>
<head>
<style>
	.img-thumbnail{
		box-shadow: 0 1px 3px rgba(0,0,0,0.12), 0 1px 2px rgba(0,0,0,0.12);
  		transition: all 0.3s cubic-bezier(.25,.8,.25,1);
	}
	.img-thumbnail:hover{
		box-shadow: 0 3px 6px rgba(0,0,0,0.16), 0 3px 6px rgba(0,0,0,0.23);
	}
	.nav-pills a{
		padding: 15px 20px !important;
		font-size: 18px;
		font-family: serif;
		color: #666;
	}
	.nav-pills > .active > a{
		background-color: #5BC0DE !important;
	}
	.control-label{
		text-align: left !important;
	}
	.form-group{
		margin: 0px 0px 15px 0px !important ;
	}
	#exTab1 .tab-content {
		padding : 5px 15px;
		border-top: 1px solid #ddd;
	}
/* remove border radius for the tab */
	#exTab1 .nav-pills > li > a {
		border-radius: 0;
	}
	/*  bhoechie tab */
	div.bhoechie-tab-menu{
		padding:0;
		height: 100%;
		border-right: 1px solid #ddd;
	}
	div.bhoechie-tab-menu div.list-group>a .glyphicon,
	div.bhoechie-tab-menu div.list-group>a .fa {
		color: #555;
	}
	div.bhoechie-tab-menu div.list-group>a.active,
	div.bhoechie-tab-menu div.list-group>a.active .glyphicon,
	div.bhoechie-tab-menu div.list-group>a.active .fa{
		background-color: #5bc0de;
		
		color: #ffffff;
		border: 0 !important;
	}
	.list-group-item{
		border-right: 0 !important;
		border-radius: 0 !important;
		padding: 10px 0 !important;
	}
	.list-group-item.active , .nav-pills .active a{
		box-shadow: 0px 0px 5px 3px rgba(0, 0, 0, 0.1) inset;
	}
	div.bhoechie-tab div.bhoechie-tab-content:not(.active){
		display: none; 
	}
	div.bhoechie-tab{
		padding: 0 !important;
	}
	th{
		background-color:#f0f0f0; 
		color:#338; 
		font-size:14px; 
		text-align: center !important;
		cursor: pointer;
		padding: 20px !important;	
	}
	table th:hover {
		background-color:#666;
		color: #FFF;
	}
</style>
	<script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/bootstrap-glyphicons.css" rel="stylesheet">
	<script src="js/bootstrap.min.js"></script>
</head>
<body style="padding-top:90px;">
	<?php include('navbar.php') ?>
	<div class="row">
        <div class="bhoechie-tab-container">
            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 bhoechie-tab-menu">
              <div class="list-group">
                <a href="#" class="list-group-item active text-center">
                  <h3 class="glyphicon glyphicon-user"><br/>Profile</h3>
                </a>
                <a href="#" class="list-group-item text-center">
                  <h3 class="glyphicon glyphicon-list-alt"><br/>Factures</h3>
                </a>
                <a href="#" class="list-group-item text-center">
                  <h3 class="glyphicon glyphicon-edit"><br/>Modifier-infos</h3>
                </a>
              </div>
            </div>
            <div class="col-lg-9 col-md-9 col-sm-9 col-xs-9 bhoechie-tab">
                <!-- flight section -->
                <div class="bhoechie-tab-content <?php echo($tab1_1); ?>">
                    <div class="row" style="padding:10px">
						<div class="col-sm-3">
							<img class="img-thumbnail" src="uploads/<?php echo($_SESSION['photo']); ?>" style="width:100%">
							<br><br>
							<center><a href="imagecropper.php?id=<?php echo($_SESSION['idclient']);?>" target="_parent">
								<button class="btn btn-default" style="width:100%">Changer la photo de profile</button> 
							</a></center>
						</div>
						<div class="col-sm-9">
		<!-- USER DETAILS -------------------------------------------->
							<?php
									$sql="SELECT * FROM `bddproject`.`client` WHERE `IDClient` = '".$_SESSION['idclient']."'" ;
									$result=mysqli_query($link,$sql);
									while($row =mysqli_fetch_assoc($result)){
										$nom=$row['nom'];$prenom=$row['prenom'];$nomdutilisateur=$row['nomdutilisateur'];$datedenaissance=$row['datedenaissance'];$adresse=$row['adresse'];$codepostal=$row['codepostal'];$ville=$row['ville'];$ntelephone=$row['ntelephone'];
									}
								?>
										<div class="row">
											<h5 class="col-lg-3"><b>Prénom :</b></h5>
											<h4 class="col-lg-9"><?php echo($prenom); ?></h5>									
										</div>	
										<div class="row">
											<h5 class="col-lg-3"><b>Nom :</b></h5>
											<h4 class="col-lg-9"><?php echo($nom); ?></h5>									
										</div>	
										<div class="row">
											<h5 class="col-lg-3"><b>Nom d'utilisateur :</b></h5>
											<h4 class="col-lg-9"><?php echo($nomdutilisateur); ?></h5>									
										</div>	
										<div class="row">
											<h5 class="col-lg-3"><b>Date de naissance :</b></h5>
											<h4 class="col-lg-9"><?php echo($datedenaissance); ?></h5>							
										</div>
										<div class="row">
											<h5 class="col-lg-3"><b>Vos points :</b></h5>
											<h5 class="col-lg-9"><b>Vous devez d'abord construire une carte de fidèlité au magazin</b></h5>							
										</div>	
										<div class="row">
											<h5 class="col-lg-3"><b>Mobile :</b></h5>
											<h4 class="col-lg-9"><?php echo($ntelephone); ?></h5>								
										</div>	
										<div class="row">
											<h5 class="col-lg-3"><b>Adress :</b></h5>
											<div class="col-lg-9">
											<div class="row">
													<div class="col-lg-3">
														<h4><?php echo($adresse); ?></h5>
													</div>
													<div class="col-lg-2">
														<h4><?php echo($ville); ?></h5>
													</div>
													<div class="col-lg-2">
														<h4><?php echo($codepostal); ?></h5>
													</div>
													
												</div>									
										</div>	
																			
										
										
										
							</div>
							<!-- END OF USER DETAILS ---------------------------->


						</div>
					</div>
                </div>
                <!-- train section -->
                <div class="bhoechie-tab-content <?php echo($tab1_2); ?>">
					<div style="margin:25px;">
					<table class='table table-bordered'  style="text-align:center !important">
						<thead >
							<tr>
								<th><center>N° facture</center></th>
								<th><center>Info produit</center></th>
								<th><center>Quantité</center></th>
								<th><center>Prix total</center></th>
								<th><center>Date</center></th>
							</tr>
						</thead>
						<tbody>
							<?php
								$tablecolor=array("#fff","#f7f9f9"); $index=0; $idcf=-1;
								$sql="SELECT * FROM `bddproject`.`facture` WHERE `IDClient` = '".$_SESSION['idclient']."'" ;
								$result=mysqli_query($link,$sql); $i=0;
								while ($row =mysqli_fetch_assoc($result)){
									$sql2="SELECT * FROM `bddproject`.`produit` WHERE `IDProduit` ='".$row['IDProduit']."'";
									$result2=mysqli_query($link,$sql2); $result2=mysqli_fetch_assoc($result2);
									if ($idcf!=$row['IDcf']){$idcf=$row['IDcf']; $i++;}
									$info=infoproduit($result2,$link);
									echo('
										<tr style="background-color:'.($tablecolor[($i%2)]).'">
										  <td>'.$i.'</td>
										  <td>'.$info.'</td>
										  <td>'.$row['quantite'].'</td>
										  <td>'.$row['prixtotal'].'</td>
										  <td>'.$row['date'].'</td>
										</tr>
									');
								}
							?>
						</tbody>
					</table>
					</div>
                </div>
                <!-- hotel search -->
                <div class="bhoechie-tab-content <?php echo($tab1_3); ?>">
                    <div id="exTab1">	
						<ul  class="nav nav-pills">
							<li class="active"><a  href="#1a" data-toggle="tab">Modifier vos données  <span class="glyphicon glyphicon-tasks"> </span></a></li>
							<li><a href="#2a" data-toggle="tab">Modifier votre mot de passe <span class="glyphicon glyphicon-pencil"></span></a></li>
						</ul>
						<div class="tab-content clearfix">
							<div class="tab-pane <?php echo($tab2_1); ?>" id="1a">
								<?php
									$sql="SELECT * FROM `bddproject`.`client` WHERE `IDClient` = '".$_SESSION['idclient']."'" ;
									$result=mysqli_query($link,$sql);
									while($row =mysqli_fetch_assoc($result)){
										$nom=$row['nom'];$prenom=$row['prenom'];$nomdutilisateur=$row['nomdutilisateur'];$datedenaissance=$row['datedenaissance'];$adresse=$row['adresse'];$codepostal=$row['codepostal'];$ville=$row['ville'];$ntelephone=$row['ntelephone'];
									}
								?>
								<form role="form" class="form-horizontal" action="ExecutQuery.php" method="post">
										<div class="form-group">
											<label for="email" class="col-sm-2 control-label">Nom</label>
											<div class="col-sm-10">
												<div class="row">
													<div class="col-md-3">
														<select class="form-control" name="sexe">
															<option value="Mr.">Mr.</option>
															<option value="Ms.">Mme.</option>
														</select>
													</div>
													<div class="col-md-9">
														<input type="text" class="form-control"  placeholder="Name" name="nom" required value="<?php echo($nom); ?>"/>
													</div>
												</div>
											</div>
										</div>
										<div class="form-group">
											<label for="text" class="col-sm-2 control-label">Prènom</label>
											<div class="col-sm-10">
												<input type="text" class="form-control" id="prenom" placeholder="PRENOM" name="prenom" value="<?php echo($prenom); ?>" required/>
											</div>
										</div>
										<?php
										if (isset($_SESSION["usernameexist2"])){
											   echo' <div class="col-sm-2"></div>
													 <div class="alert alert-warning col-sm-10" role="alert">
														Ce nom d\'utilisateur est déjà utilisé.
													 </div>'; 
											   unset($_SESSION["usernameexist2"]);
											}						
										?>
										<div class="form-group">
											<label for="email" class="col-sm-2 control-label">Nom d'utilisateur</label>
											<div class="col-sm-10">
												<input type="text" class="form-control" id="email" placeholder="nom d' utilisateur" name="nomuser" value="<?php echo($nomdutilisateur); ?>" required/>
											</div>
										</div>
										<div class="form-group">
											<label for="email" class="col-sm-2 control-label">Date de naissance</label>
											<div class="col-sm-10">
												<input type="date" class="form-control" id="date" placeholder="date de naissance" name="date" value="<?php echo($datedenaissance); ?>" required/>
											</div>
										</div>
										<div class="form-group">
											<label for="email" class="col-sm-2 control-label">Adress</label>
											<div class="col-sm-10">
												<div class="row">
													<div class="col-md-6">
														<input type="text" class="form-control" id="adress" placeholder="adress" name="adresse" value="<?php echo($adresse); ?>" required/>
													</div>
													<div class="col-md-3">
														<input type="text" class="form-control" placeholder="ville" name="ville" value="<?php echo($ville); ?>"  required/>
													</div>
													<div class="col-md-3">
														<input type="number" class="form-control" placeholder="code postal" name="codepostal" value="<?php echo($codepostal); ?>" required/>
													</div>
												</div>
											</div>
										</div>
										<div class="form-group">
											<label for="mobile" class="col-sm-2 control-label">Mobile</label>
											<div class="col-sm-10">
												<input type="tel" class="form-control" id="mobile" placeholder="Mobile" name="tel" value="<?php echo($ntelephone); ?>" required/>
											</div>
										</div>
										<div class="form-group">
											<div class="col-sm-2"></div>
											<div class="col-sm-10">
												<input type="submit" class="form-control btn-info" value="Sauvegarder et continuer" name="modification" required/>
											</div>
										</div>
										</form>
							</div>
							<div class="tab-pane <?php echo($tab2_2); ?>" id="2a">
								<form action="ExecutQuery.php" method="post">
									<?php
										if (isset($_SESSION["erreurancienmotdepass"])){
											   echo' <div class="col-sm-3"></div>
													 <div class="alert alert-warning col-sm-9" role="alert">
														L\'ancien mot de passe est faux.
													 </div>'; 
											   unset($_SESSION["erreurancienmotdepass"]);
											}						
									?>
									<div class="form-group">
										<label for="password" class="col-sm-3 control-label">Ancien mot de passe</label>
										<div class="col-sm-9">
												<div class="form-group">
													<input type="password" class="form-control" id="password" placeholder="Ancien mot de passe" name="password0" required/>
												</div>
										</div>
									</div>
									<?php
										if (isset($_SESSION["differentpassword"])){
											   echo' <div class="col-sm-3"></div>
													 <div class="alert alert-warning col-sm-9" role="alert">
														Récrire le mot de passe à nouveau.
													 </div>'; 
											   unset($_SESSION["differentpassword"]);
											}						
									?>
									<div class="form-group">
										<label for="password" class="col-sm-3 control-label">Nouveau mot de passe</label>
										<div class="col-sm-9">
												<div class="form-group">
													<input type="password" class="form-control" id="password" placeholder="Nouveau mot de pass" name="password1" required/>
												</div>
										</div>
									</div>
									<div class="form-group">
										<label for="password" class="col-sm-3 control-label">Récrire le mot de passe</label>
										<div class="col-sm-9">
												<div class="form-group">
													<input type="password" class="form-control" id="password" placeholder="Récrir le mot de pass" name="password2" required/>
												</div>
										</div>
									</div>
									<div class="form-group">
										<label for="password" class="col-sm-3 control-label"></label>
										<div class="col-sm-9">
											<input type="submit" class="form-control btn-info" value="Sauvegarder et continuer" name="modificationpassword" required/>
										</div>
									</div>
									
								</form>
							</div>
						</div>
					</div>
                </div>
            </div>
        </div>	
	</div>
</body>
</html>

<script>
	$(document).ready(function() {
		$("div.bhoechie-tab-menu>div.list-group>a").click(function(e) {
			e.preventDefault();
			$(this).siblings('a.active').removeClass("active");
			$(this).addClass("active");
			var index = $(this).index();
			$("div.bhoechie-tab>div.bhoechie-tab-content").removeClass("active");
			$("div.bhoechie-tab>div.bhoechie-tab-content").eq(index).addClass("active");
		});
	});
</script>