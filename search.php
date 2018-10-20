<!doctype html>
<html>
<head>
	<meta charset="UTF-8">
	<title>NanoGrid - Sklep elektroniczny</title>
</head>
<link rel="stylesheet" href="style.css" type="text/css" />
<link rel="stylesheet" href="jquery.bxslider/jquery.bxslider.css" type="text/css" />
<link rel="stylesheet" href="stylex3.css" type="text/css" />	
<?php
$conn=mysqli_connect("localhost", "root", "", "shop");
if(!$conn){
	echo($conn->mysqli_error());
}
$words=@$_POST['search'];
$words2='<0';
$words1=$words;	
if($words=='amd')
	$words1='Radeon';
if($words=='nvidia')
	$words1='GeForce';	
if( (strpos($words, '=') !==false ) || (strpos($words, '<') !== false) || (strpos($words, '>') !== false) )
	$words2=$words; 
	
?>
<body>
<div class='top'>
	<a href='index.php'><img src="img/logo1.png" class='logo' alt='NanoGrid'></a> 
		<form action="search.php" method="post">
		<div class='search'>	
			<input class="search-bar" name='search' type="text" placeholder="Czego szukasz?">
			<div class="search-image">	
				<button type='submit' class='search-button'></button>
			</div>	
		</div>	
		</form>
		<div class='basket'>
		<div class="basket_b"> </div>
			<span class='b_valu'><?php echo(@$_SESSION['amo']) ?></span>
            <p>Twój koszyk  <br> <span class='b_val'>(<?php echo($_SESSION['all']) ?> zł)</span></p>
		</div>	
</div>
<div class='menu'>
	<ul>
		<li onclick="red1()" class="menu_p1"> Procesory</li>
		<li onclick="red2()" class="menu_p2"> Karty graficzne</li>
	</ul> 
</div>	
<div class='content'>
	<div class="line">
		<h1>Szukane</h1>
	</div>
	<?php 
		$i=0;
		if($words!==""){
		$q_cp=mysqli_query($conn, 'Select * from cpu where cpu.producer like "%'.$words.'%" or cpu.name like "%'.$words.'%" or cpu.price'.$words2);	
		$q_gp=mysqli_query($conn, 
						   'Select * from gpu where gpu.manufacturer like "%'.$words.'%" 
						   or gpu.series like "%'.$words1.'%" or gpu.model like "%'.$words.'%" or gpu.price'.$words2);
		}
		If(@$q_cp || @$q_gp){
			a:
			while($row_c=mysqli_fetch_assoc($q_cp)){
				echo("<div class='block' onclick='getid(this.id)' id='cpu_".$row_c['cpu_id']."'>");
				foreach($row_c as $key => $value){
					if($key=='picture')
					echo("<img class='block_im' src='".$value."'> ");
				}
				echo("<div class='inf'>");
				foreach($row_c as $key => $value){
					if($key=='producer')
						echo(" ".$value." ");
					if($key=='name')
						echo(" ".$value." ");
					if($key=='cores')
						echo('<br><p class="values"> Liczba rdzeni: '.$value.'');
					if($key=='clock')
						echo('<br> Taktowanie [MHz]: '.$value.'');
					if($key=='unlocked'){
						if($value) $value='Tak' ; 
						else $value='Nie';
						echo('<br> Odblokowany mnożnik: '.$value.'</p>');
					}
				}
				echo("</div>");
				echo("<p class='price'>".$row_c['price']." zł</p><br>");
				echo("</div>");
				break;
			}
			while($row_g=mysqli_fetch_assoc($q_gp)){
				echo("<div class='block' onclick='getid(this.id)' id='gpu_".$row_g['gpu_id']."'>");
				foreach($row_g as $key => $value){
					if($key=='picture')
						echo("<img class='block_im' src='".$value."'> ");
				}
				echo("<div class='inf'>");
				foreach($row_g as $key => $value){
					if($key=='manufacturer' ) 
						echo(" ".$value." ");
					if($key=='series')
						echo(" ".$value." ");
					if($key=='model')
						echo(" ".$value." ");
					if($key=='vram')
						echo('<br><p class="values"> Pamięć: '.$value.' GB');
					if($key=='bus')
						echo('<br> Szyna danych: '.$value.' bit');
					if($key=='memory_type')
						echo('<br> Rodzaj pamięci: '.$value.'</p>');
				}
				echo("</div>");
				echo("<p class='price'>".$row_g['price']." zł</p>");
				echo("</div>");
				break;
			}
			$i++;
			if($i<5) goto a;
		}
		else{
			echo('Musisz sam coś znaleźć ;)');
		}
		
	?>
	<div class="line">
		<h1>Ostatnio oglądane</h1>
	</div><br>
	<span id='bef'></span>
	<div class='disp'>
	<ul class='slide'>
		<?php
			$arr=array();
            $i=0;
			if(isset($_COOKIE['view'])){
			foreach($_COOKIE['view'] as $key => $value){$arr[$i]=$value; $i++;}
			for($i;$i>=0;$i--){
					$value1=@$arr[$i];
					$idp=explode("_",$value1);
					if($idp[0]=='cpu'){
						$query=mysqli_query($conn, 'Select * from cpu where cpu_id='.$idp[1].';');
						while($row=mysqli_fetch_assoc($query)){
							echo("<li class='block_v' onclick=getid(this.id) id='cpu_".$row['cpu_id']."'>");
                            foreach($row as $key1 => $value1){
                                if($key1=='picture')
					                echo("<img class='image_v' src='".$value1."'> <br>"); 
                            }
							foreach($row as $key1 => $value1){
                                if($key1=='producer' || $key1=='name')
									echo(" ".$value1." ");
								if($key1=='price')
									echo("<br>  ".$value1." zł ");
                            }
							echo("</li>");
						}
					}
					if($idp[0]=='gpu'){
						$query=mysqli_query($conn, 'Select * from gpu where gpu_id='.$idp[1].';');
						while($row=mysqli_fetch_assoc($query)){
							echo("<li class='block_v' onclick=getid(this.id) id='gpu_".$row['gpu_id']."'>");
                            foreach($row as $key1 => $value1){
                                if($key1=='picture')
					                echo("<img class='image_v' src='".$value1."'> <br>"); 
                            }
                            foreach($row as $key1 => $value1){
                                if($key1=='manufacturer' || $key1=='series' || $key1=='model')
									echo(" ".$value1." ");
								if($key1=='price')
									echo("<br>  ".$value1." zł ");
                                   
							}
							echo("</li>");
						}
					}
			}
			}
		?>
	</ul>
	</div>
	<br>
	
</div>
	
</body>
<script type="text/javascript" src='jquery-2.2.0.js'></script>
<script type="text/javascript" src='jquery.bxslider/jquery.bxslider.min.js'></script>	
<script type="text/javascript" src='javascript.js'></script>		
<?php 
	include("php.php");		
?>

	
</html>