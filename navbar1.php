<?php
if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 
include('ConnectToDB.php');
$_SESSION['returnurl']=$_SERVER['REQUEST_URI'];
?>
<html>
<head>
<style>
	#flipkart-navbar {
		box-shadow: 0 1px 3px rgba(0,0,0,0.12), 0 1px 2px rgba(0,0,0,0.24);
		background-color:#fff;
		color: #222;
		z-index: 4;
	}
	.row1{
	vertical-align: middle;
		align-items: center;
		margin: 0 !important;
		background-color: #5bc0de;
		height: 30px;
		box-shadow: 0 1px 3px rgba(0,0,0,0.1), 0 1px 2px rgba(0,0,0,0.2);
	}
	.row2 {
	padding:10px  0 !important;
		margin: 0 !important;
		height: 60px;
	}
	.flipkart-navbar-button {
		background-color: #5BC0DE;
		border: 1px solid #5BC0DE;
		border-radius: 0 2px 2px 0;
		padding: 8px 0;
		height: 41px;
		cursor:pointer;
		color:#FFF;
		font-size: 16px;
		box-shadow: 0 1px 3px rgba(0,0,0,0.1), 0 1px 2px rgba(0,0,0,0.2);
	}
	.flipkart-navbar-button:hover{
		background-color: #7be1ff;
		cursor: pointer;
		text-decoration: none;

	}
	.cart-button {
		background-color: rgb(255, 172, 0);
		padding: 8px 0;
		text-align: center;
		border-radius: 2px;
		font-weight: 500;
		font-size: 16px;
		width: 100%;
		display: inline-block;
		color: #FFFFFF;
		text-decoration: none;
		border:1px solid rgb(255, 172, 0);
		box-shadow: 0 1px 3px rgba(0,0,0,0.1), 0 1px 2px rgba(0,0,0,0.2);
	}
	.cart-button:hover {
		background-color: rgb(255, 219, 0);
		cursor: pointer;
		color: #fff;
		text-decoration: none;
		

	}
	.cart-svg {
		display: inline-block;
		width: 16px;
		height: 16px;
		vertical-align: middle;
		margin-right: 8px;
	}
	.item-number {
		border-radius: 3px;
		background-color: rgba(0, 0, 0, .1);
		height: 20px;
		padding: 5px 6px;
		font-weight: 500;
		display: inline-block;
		color: #fff;
		line-height: 12px;
		margin-left: 10px;
	}
	.upper-links {
		display: inline-block;
		font-family: 'Roboto', sans-serif;
		padding: 0px 30px;
		height: 30px;
		cursor: pointer;
	}
	.upper-links:hover{
		background-color: #fff;
		color:#5BC0DE !important;
		text-decoration: none;
	}
	.upper-links:hover>.links{
		color:#5BC0DE !important;
	}
	.links{
		color:#fff;
		font-weight: 600;
		text-decoration: none;
		text-align: center;
		line-height: 30px;
	}
	.links:hover{
		color:#5BC0DE;
		text-decoration: none;
	}
	
	.largenav {
		display: none;
	}
	.smallnav{
		display: block;
	}
	.smallsearch{
		margin-left: 15px;
		margin-top: 15px;
	}
	.menu{
		cursor: pointer;
	}
	@media screen and (min-width: 768px) {
		.largenav {
			display: block;
		}
		.smallnav{
			display: none;
		}
		.smallsearch{
			margin: 0px;
		}
	}
	/*Sidenav************************************************/
	.sidenav {
		height: 100%;
		width: 0;
		position: fixed;
		z-index: 1;
		top: 0;
		left: 0;
		background-color: #fff;
		overflow-x: hidden;
		transition: 0.5s;
		box-shadow: 0 4px 8px -3px #555454;
		padding-top: 0px;
	}
	.sidenav{
			z-index: 6;
			transition: 0.3s;
		}
	.sidenav a {
		padding:10px;
		text-decoration: none;
		color: #222;
		display: block;
		border-bottom: 1px solid #eee;
	}
	.sidenav a:hover {
		background-color:#72caff ;
	}
	.sidenav p {
		padding:5px;
		text-decoration: none;
		color: #222;
		font-size: 20px;
		cursor: pointer;

	}
	.sidenav .closebtn {
		position: absolute;
		top: 0;
		font-size: 25px;
		color: #222;        
	}
	@media screen and (max-height: 450px) {
	.sidenav a {font-size: 18px;}
	}
</style>
	<script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link rel = "stylesheet" href = "http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
	<script src="js/bootstrap.min.js"></script>
<!-- Search spot css & js -->
	<script type="text/javascript" src="js/jquery.tokeninput.js"></script>
	<link rel="stylesheet" href="css/token-input.css" type="text/css" />
<!-- end of Search js -->
</head>
<body>
<div id="flipkart-navbar" class="navbar-fixed-top">
<!-- brand -logo------------------------------------------------------------------------------------------>
	<div class="row row1 largenav">
		<center><ul class="largenav" style="padding:0">
			<a href="index.php"><li class="upper-links"><p class="links"><span class="glyphicon glyphicon-home"></span> HOME</p></li></a>
			<a href="index.php"><li class="upper-links"><p class="links"><span class="glyphicon glyphicon-earphone"></span> CONTACT</p></li></a>
			<a href="index.php"><li class="upper-links"><p class="links"><span class="glyphicon glyphicon-list-alt"></span> ABOUT</p></li></a>
			<a href="index.php"><li class="upper-links"><p class="links"><span class="glyphicon glyphicon-bell"></span> NOTIFICATION</p></li></a>
			<?php
			if(!isset($_SESSION['connect'])||$_SESSION['connect']!='yes') 
				echo('<li class="upper-links"><a class="links" href="#"  id="login" role="button" data-toggle="modal" data-target="#myModal"><span class="glyphicon glyphicon-user"></span> LOG-IN</a></li>');
			else echo('<li class="upper-links"><a class="links" href="#"  id="login" role="button"data-toggle="modal" data-target="#mylogoutModal"><span class="glyphicon glyphicon-off"></span> LOGOUT</a></li>
			<li class="upper-links"><a class="links" href="profil.php"><span class="glyphicon glyphicon-user"></span> '.$_SESSION['uname'].'</a></li>');
			?>
		</ul></center>
    </div>
<!--search and buttons------------------------------------------------------------------------------------>
	<div class="row row2">
		<!--nav bar buttons-------------------------------------->
        <div class="col-sm-2"  style="">
            <h2 style="margin:0px;float:left"><span class="smallnav menu" onclick="openNav()">☰</span></h2>
			<a href="index.php"><center></center></a>
        </div>
		<!--serch and cart button------------------------------->
        <div class="col-sm-10"  style="padding:0 !important">
            <div class="flipkart-navbar-search smallsearch col-sm-10 col-xs-11">
                <div class="row">
					<form method="post" action="ExecutQuery.php">
						<input type="text" id="demo-input-local" name="searchtext" >
						<button class="flipkart-navbar-button col-xs-1" type="submit" name="search">
							<span class="glyphicon glyphicon-search"></span>
						</button>
					</form>
                </div>
            </div>
			<?php
			   if (isset($_SESSION['cart']))
			   $articls = count($_SESSION['cart']['IDProduit']);
			   else $articls = 0;
			?>
            <div class="cart largenav col-sm-2">
                <a class="cart-button" href="cart.php"><span class="glyphicon glyphicon-shopping-cart"></span> Panier
                    <span class="item-number "><?php echo ($articls); ?></span>
                </a>
            </div>
        </div>
	</div>
</div>
<!-- small nav----------------------------------------------------------------------------------------------->
<div id="mySidenav" class="sidenav">
    <div class="container" style="background-color: #eee;height:auto">
		<p onclick="closeNav()"><span  class="glyphicon glyphicon-chevron-left"></span> reduire</a></p>
    </div>
	<a href="index.php">HOME</a>
	<?php
	if(!isset($_SESSION['connect'])||($_SESSION['connect']!="yes"))
		echo('<a href="#"  id="login" role="button" data-toggle="modal" data-target="#myModal">Log-in/Register</a>');
	else echo('
			<a href="#"  id="login" role="button" data-toggle="modal" data-target="#myModal">Logout</a>
			<a href="profil.php">Profil</a>
			<a href="profil.php?target=facture">Facture</a>
	');
	?>
    <a href="cart.php">Panier</a>
    <a href="#">Contact</a>
    <a href="#">About us</a>
</div>
<!-- small nav transition------------------------------------------------------------------------------------>
<script>
function openNav() {
    document.getElementById("mySidenav").style.width = "70%";
    // document.getElementById("flipkart-navbar").style.width = "50%";
    document.body.style.backgroundColor = "rgba(0,0,0,0.4)";
}
function closeNav() {
    document.getElementById("mySidenav").style.width = "0";
    document.body.style.backgroundColor = "rgba(0,0,0,0)";
}
</script>
<!-- search tags--------------------------------------------------------------------------------------------->
<?php
echo('
<script type="text/javascript">
 $(document).ready(function() {
            $("#demo-input-local").tokenInput([
                ');
				$sql="SELECT `type-article` FROM `bddproject`.`article`";
				$result=mysqli_query($link,$sql);
				while($row=mysqli_fetch_assoc($result)){
					echo('{id:"'.$row['type-article'].'", name: "'.$row['type-article'].'"},');
				}
				$sql="SELECT `nom-marque` FROM `bddproject`.`marque`";
				$result=mysqli_query($link,$sql);
				while($row=mysqli_fetch_assoc($result)){
					echo('{id:"'.$row['nom-marque'].'", name: "'.$row['nom-marque'].'"},');
				}
				$sql="SELECT `nom-couleur` FROM `bddproject`.`couleur`";
				$result=mysqli_query($link,$sql);
				while($row=mysqli_fetch_assoc($result)){
					echo('{id:"'.$row['nom-couleur'].'", name: "'.$row['nom-couleur'].'"},');
				}
 echo('      ]);
        });
</script>');
?>
</body>
</html>

<!-- login modal sign up------------------------------------------------------------------------------->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" >
    <div class="modal-dialog modal-lg">
        <div class="modal-content" style="z-index:10">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    Login / Registration 
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12" >
                        <!-- Nav tabs -->
                        <ul class="nav nav-tabs">
                            <li class="active"><a href="#Login" data-toggle="tab">Login</a></li>
                            <li><a href="#Registration" data-toggle="tab">Registration</a></li>
                        </ul>
                        <!-- Tab panes -->
                        <div class="tab-content" style="padding-top:10px">
                            <div class="tab-pane active" id="Login">
                                <form role="form" class="form-horizontal" method="post" action="ExecutQuery.php">
                                <div class="form-group">
                                    <label for="email" class="col-sm-2 control-label">
                                        Email</label>
                                    <div class="col-sm-10">
                                        <input type="email" class="form-control" id="email1" placeholder="Email" name="email" required/>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1" class="col-sm-2 control-label">
                                        Password</label>
                                    <div class="col-sm-10">
                                        <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Mot de pass" name="password" required/>
                                    </div>
                                </div>
                                <?php
								if (isset($_SESSION["connect"])) 
                                    if ($_SESSION["connect"]=="faute"){
									   echo' <div class="col-sm-2"></div>
                                             <div class="alert alert-warning col-sm-10" role="alert">
  										        <strong>Oh snap!</strong> Change a few things up and try submitting again.
											 </div>'; 
									   echo" <script> $('#myModal').modal('show'); </script>" 	;
									   $_SESSION["connect"]= "no";
										}						
								?>
                                <div class="row">
                                    <div class="col-sm-2">
                                    </div>
                                    <div class="col-sm-10">
                                        <button type="submit" name="login" class="btn btn-success btn-sm">Submit</button>
                                        <button type="" class="btn btn-warning btn-sm">Forgot your password?</button>
                                    </div>
                                </div>
                                </form>
                            </div>
                            <div class="tab-pane" id="Registration">
                                <form role="form" class="form-horizontal" action="ExecutQuery.php" method="post">
                                <div class="form-group">
                                    <label for="text" class="col-sm-2 control-label">NOM</label>
                                    <div class="col-sm-10">
                                        <div class="row">
                                            <div class="col-md-3">
                                                <select class="form-control" name="sexe">
                                                    <option value="Mr.">Mr.</option>
                                                    <option value="Ms.">Ms.</option>
                                                </select>
                                            </div>
                                            <div class="col-md-9">
                                                <input type="text" class="form-control" placeholder="Name" name="nom" required/>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="text" class="col-sm-2 control-label">PRENOM</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="prenom" placeholder="PRENOM" name="prenom" required/>
                                    </div>
                                </div>
                                <?php
								if (isset($_SESSION["usernameexist"])) 
                                    if ($_SESSION["usernameexist"]){
									   echo' <div class="col-sm-2"></div>
                                             <div class="alert alert-warning col-sm-10" role="alert">
  										        <strong>Oh snap!</strong> Change a few things up and try submitting again.
											 </div>'; 
									   echo" <script> $('#myModal').modal('show'); </script>" 	;
									   unset($_SESSION["usernameexist"]);
										}						
								?>
                                <div class="form-group">
                                    <label for="email" class="col-sm-2 control-label">NOM-USER</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="email" placeholder="nom d' utilisateur" name="nomuser" required/>
                                    </div>
                                </div>
                                <?php
								if (isset($_SESSION["emailexist"])) 
                                    if ($_SESSION["emailexist"]){
									   echo' <div class="col-sm-2"></div>
                                             <div class="alert alert-warning col-sm-10" role="alert">
  										        <strong>Oh snap!</strong> Change a few things up and try submitting again.
											 </div>'; 
									   echo" <script> $('#myModal').modal('show'); </script>" 	;
									   unset($_SESSION["emailexist"]);
										}						
								?>
                                <div class="form-group">
                                    <label for="email" class="col-sm-2 control-label">Email</label>
                                    <div class="col-sm-10">
                                        <input type="email" class="form-control" id="email" placeholder="Email" name="email" required/>
                                    </div>
                                </div>
                                <?php
								if (isset($_SESSION["motdepasseereur"])) 
                                    if ($_SESSION["motdepasseereur"]){
									   echo' <div class="col-sm-2"></div>
                                             <div class="alert alert-warning col-sm-10" role="alert">
  										        <strong>Oh snap!</strong> Change a few things up and try submitting again.
											 </div>'; 
									   echo" <script> $('#myModal').modal('show'); </script>" 	;
									   unset($_SESSION["motdepasseereur"]);
										}						
								?>
                                <div class="form-group">
                                    <label for="password" class="col-sm-2 control-label">Password</label>
                                    <div class="col-sm-10">
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <input type="password" class="form-control" id="password" placeholder="mot de pass" name="password1" required/>
                                            </div>
                                            <div class="col-sm-6">
                                                <input type="password" class="form-control" id="password" placeholder="recrir le mot de pass" name="password2" required/>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="email" class="col-sm-2 control-label">DATE DE NAISSANCE</label>
                                    <div class="col-sm-10">
                                        <input type="date" class="form-control" id="date" placeholder="date de naissance" name="date" required/>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="email" class="col-sm-2 control-label">ADRESS</label>
                                    <div class="col-sm-10">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <input type="text" class="form-control" id="adress" placeholder="adress" name="adresse" required/>
                                            </div>
                                            <div class="col-md-3">
                                                <input type="text" class="form-control" placeholder="ville" name="ville" />
                                            </div>
                                            <div class="col-md-3">
                                                <input type="number" class="form-control" placeholder="code postal" name="codepostal" required/>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="mobile" class="col-sm-2 control-label">Mobile</label>
                                    <div class="col-sm-10">
                                        <input type="tel" class="form-control" id="mobile" placeholder="Mobile" name="tel" required/>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-2">
                                    </div>
                                    <div class="col-sm-10">
                                        <input type="submit" class="form-control btn-info" value="save & continue" name="inscription" required/>
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
</div>

<div class="modal fade" id="mylogoutModal" role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Modal Header</h4>
		</div>
		<div class="modal-body">
		<h3>merci pour ..........................................</h3>
			<hr>
		<div class="row"><div class="col-sm-5">
          <form action="ExecutQuery.php" method="post">
			<button class="form-control btn-success" type="submit" name="deconnexion"  >Deconnecter</button>
		  </form></div>
		<div class="col-sm-2"><button class="form-control btn-info col-sm-2" data-dismiss="modal">annuler</button></div></div>
        </div>
      </div>
    </div>
  </div>