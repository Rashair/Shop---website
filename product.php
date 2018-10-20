<?php 
session_start();
?>
<!doctype html>
<html>
<head>
	<meta charset="UTF-8">
	<title>NanoGrid - Sklep elektroniczny</title>
</head>
<link rel="stylesheet" href="style.css" type="text/css" />	
<link rel="stylesheet" href="style_p.css" type="text/css" />
<link rel="stylesheet" href="jquery.bxslider/jquery.bxslider.css" type="text/css" />
<link rel="stylesheet" href="stylex3.css" type="text/css" />	
<?php
$conn=mysqli_connect("localhost", "root", "", "shop");
if(!$conn){
	echo($conn->mysqli_error());
}	
$idx=@$_GET['id'];
$id=explode("_",$idx);
if(isset($_COOKIE['view']))
		setcookie("view[".$idx."]", "" ,1);
setcookie("view[".$idx."]",$idx,time()+3600);
    
?>
<script type="text/javascript"> 
	var t=[];
	var i=0;
	var q=[];
</script>	
<body>
<div class='top'>
	<a href='index.php'><img src="img/logo1.png" class='logo' alt='NanoGrid' onclick='index.php'></a> 
		<form action="search.php" method="post">
		<div class='search'>	
			<input class="search-bar" type="text" name='search' placeholder="Czego szukasz?">
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
	<div class="line">	</div>
	<div class='product'>
	<?php
        $i=0;
		if($id[0]=='cpu'){
		$gw='36 miesięcy';
		$send='10 zł';	
		$query=mysqli_query($conn, 'Select * from cpu where cpu_id='.$id[1].';');	
		while($row=mysqli_fetch_assoc($query)){
				echo("<div class='block'>");
				foreach($row as $key => $value){
					if($key=='picture')
					echo("<img class='block_img' src='".$value."'> ");
				}
				echo("<div class='inf'>");
				foreach($row as $key => $value){
					if($key=='producer')
						echo(" <h2> ".$value." ");
					if($key=='name')
						echo(" ".$value." </h2>");
					if($key=='cores')
						echo('<p class="values"> Liczba rdzeni: '.$value.'');
					if($key=='clock')
						echo('<br> Taktowanie [MHz]: '.$value.'');
					if($key=='unlocked'){
						if($value) $value='Tak' ; 
						else $value='Nie';
						echo('<br> Odblokowany mnożnik:  '.$value.'');
					}
					if($key=='quanity'){
						if($value<=5){
							$value="5 szt. lub mniej";
						}
						else if($value<=10){
							$value="10 szt. lub mniej";
						}
						else if($value<=20){
							$value="20 szt. lub mniej";
						}
						else if($value<=30){
							$value="30 szt. lub mniej";
						}
						else if($value>30){
							$value="30 szt. lub więcej";
						}
						echo('<br> Dostępność: '.$value.'</p>');
					}
				}
				echo("</div>");
				echo('<div class="v_dash"> </div>');
				echo("</div>");
				echo("<div class='order'>");
				echo('<form method="post" action="basket.php?doit=1">');
              	echo("<p class='price'> <small>Cena:</small> <strong> ".$row['price']." zł</strong></p> ");
				echo("<input type='hidden' value='".$idx."' name='id_p' > ");
				echo("Ilość: 
				<div class='button'>-</div>
                <input type='hidden'>
				<input class='quanity' autocomplete='off' maxlength='3' id='q_".$i."' value='1' name='quanity' type='text' >
				<div class='button'>+</div><br/> ");
				echo("<p><button type='submit' class='basket_add'>Dodaj do koszyka</button></p>");
				echo('</form>');
				echo("</div>");
                echo("<script type='text/javascript'> 
						i++;			
						t[i]=".$row['price'].";
						q[".$i."]=".$row['quanity'].";
				  	 </script>");
		}
		}
		if($id[0]=='gpu'){
		$gw='24 miesiące';
		$send='12 zł';		
		$query=mysqli_query($conn, 'Select * from gpu where gpu_id='.$id[1].';');
		while($row=mysqli_fetch_assoc($query)){
				echo("<div class='block'>");
				foreach($row as $key => $value){
					if($key=='picture')
						echo("<img class='block_img' src='".$value."'> ");
				}
				echo("<div class='inf'>");
				foreach($row as $key => $value){
					if($key=='manufacturer' ) 
						echo(" <h2>".$value." ");
					if($key=='series')
						echo(" ".$value." ");
					if($key=='model')
						echo(" ".$value."</h2> ");
					if($key=='vram')
						echo('<p class="values"> Pamięć: '.$value.' GB');
					if($key=='bus')
						echo('<br> Szyna danych: '.$value.' bit');
					if($key=='memory_type')
						echo('<br> Rodzaj pamięci: '.$value);
                    if($key=='quanity'){
						if($value<=5){
							$value="5 szt. lub mniej";
						}
						else if($value<=10){
							$value="10 szt. lub mniej";
						}
						else if($value<=20){
							$value="20 szt. lub mniej";
						}
						else if($value<=30){
							$value="30 szt. lub mniej";
						}
						else if($value>30){
							$value="30 szt. lub więcej";
						}
						echo('<br> Dostępność: '.$value.'</p>');
					}
				}
				echo("</div>");
                echo('<div class="v_dash"> </div>');
				echo("</div>");
                echo("<div class='order'>");
				echo('<form method="post" action="basket.php?doit=1">');
              	echo("<p class='price'> <small>Cena:</small> <strong >".$row['price']."</strong> <strong> zł</strong> </p> ");
				echo("<input type='hidden' value='".$idx."' name='id_p' > ");
				echo("Ilość: 
				<div class='button'>-</div>
                <input type='hidden'>
				<input class='quanity' autocomplete='off' maxlength='3' value='1' name='quanity' id='q_".$i."' type='text' >
				<div class='button'>+</div> ");
				echo("<p><button type='submit' class='basket_add'>Dodaj do koszyka</button></p>");
				echo('</form>');
				echo('</div>');
                echo("<script type='text/javascript'> 
						i++;			
						t[i]=".$row['price'].";
						q[".$i."]=".$row['quanity'].";
				  	 </script>");
				
		}
        }
	?>
	
	<table class='line2'>
		<tr> <td>Gwarancja:        </td> <td> <?php echo($gw) ?>   </td> </tr>
		<tr> <td>Rodzaj gwarancji: </td> <td> Producenta           </td> </tr>	
		<tr> <td>Wysyłka od:       </td> <td> <?php echo($send) ?> </td> </tr> 
	</table> 
	</div>	
	<div class='h_dash'></div>
	<br>
	<div>
		<p class="news">Zapisz się do newslettera</p> 
		<p class="news_inf"> Otrzymuj kody promocyjne, informacje o <br> promocjach i najnowszych produktach.</p>
		<form action="news.php" method="post" class='news_bar'>
			<input class="news_inp" type='email' name='e-mail' placeholder="Wprowadź swój adres e-mail">
			<input type="hidden" name='url' value="<?php echo ($_SERVER['REQUEST_URI']); ?>">
			<button class='news_b' type="submit"> &gt; </button>
		</form>	
	</div>
	<br> <br>    <!--baner reklamowy -->
	<div class="line">
		<h1>Ostatnio oglądane</h1><br>
    </div>
	<span id='bef'></span>
	<div class='disp'>
	<ul class='slide'>
		<?php
            $arr=array();
            $j=0;
			if(isset($_COOKIE['view'])){
			foreach($_COOKIE['view'] as $key => $value){$arr[$i]=$value;$i++;}
			for($j;$j>=0;$j--){
					$value1=@$arr[$j];
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

</div>
</body>
<script type="text/javascript" src='jquery-2.2.0.js'></script>
<script type="text/javascript" src='jquery.bxslider/jquery.bxslider.min.js'></script>	
<script type="text/javascript" src='javascript-product.js'></script>

<?php 
include("php.php");		 
?>
	
</html>