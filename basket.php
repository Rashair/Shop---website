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
<link rel="stylesheet" href="jquery.bxslider/jquery.bxslider.css" type="text/css" />
<link rel="stylesheet" href="basket.css" type="text/css" />		
<?php
if(@$_GET['clear']){
    session_destroy();
    echo("<style>
		.b_val, .b_valu{display:none;}
		</style>
		");
     header("Location:basket.php");
}    
    
$conn=mysqli_connect("localhost", "root", "", "shop");
if(!$conn){
	echo($conn->mysqli_error());
}
$idx=@$_POST['id_p'];
$p_quanity=@$_POST['quanity'];	
    
$idy=@$_POST['id'];
$p_quanitx=@$_POST['amo'];
$all=@$_POST['all'];
$p_quanitAll=@$_POST['amoAll'];
    
$del=@$_POST['del'];
if(isset($del)){
    unset($_SESSION[$del]);
    header("Location:basket.php");
}    
	
if(isset($idy)){
	$_SESSION[$idy]=$idy."_".$p_quanitx;
	$_SESSION['all']=$all;
    $_SESSION['amo']=$p_quanitAll;
}

if(!isset($_SESSION[$idx]))    
    $_SESSION[$idx]=$idx."_".$p_quanity;
else{
	 if(!@$_GET['n']){
     $temp=explode("_",$_SESSION[$idx]);
     @$temp[2]+=$p_quanity;
	 $_SESSION[$idx]=$idx."_".$temp[2];
	 }
}

?>
<script type="text/javascript"> 
	var t=[];
	var i=0;
	var q=[];
</script>	
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
		<h1>Koszyk</h1><br/>
		<button class='but_c' onclick="clearit()"> Wyczyść koszyk </button>
        <div id='clear'></div>
	</div> <br/>
	<div class='header'>  
		<div class='header-1'> Produkt </div>   
		<div class='header-2'> Cena </div>  
		<div class='header-3'> Ilość </div> 
		<div class='header-4'> Razem </div>
	</div>
	<?php 
		$i=0;
		$grand=0;
		foreach ($_SESSION as $keys => $values){
        $p_id=explode("_",$values);
		if($p_id[0]=='cpu'){
		$query=mysqli_query($conn, 'Select * from cpu where cpu_id='.$p_id[1].';');	
		while($row=mysqli_fetch_assoc($query)){
                
				echo("<div class='block'>");
				echo("<div class='prod'>");
				echo("<img class='block_im' src='".$row['picture']."' onclick='getid(this.id)' id='cpu_".$row['cpu_id']."'> ");
				echo("<div class='inf'>");
				foreach($row as $key => $value){
					if($key=='producer')
						echo(" <h2 class='string' onclick='getid(this.id)' id='cpu_".$row['cpu_id']."'> ".$value." ");
					if($key=='name')
						echo(" ".$value." ");
					if($key=='clock'){
						$value=$value/1000;
						$value=number_format((float)$value, 2, '.', '');
						echo(' '.$value.'Ghz</h2>');
                    }
                    
               	}
				echo("</div>");
				echo("</div>");
				$i++;
				echo("<div class='price'> ".number_format((float)$row['price'], 2,'.',' ')." zł </div>");
				if($p_id[2]>$row['quanity']){ 
					$p_id[2]=$row['quanity'];
					echo("<script> 
						window.onload=function(){
						alert('Niestety w tej chwili nie posiadamy tylu sztuk tego produktu.'); 
						}
						</script>");
				}
                echo("	<div class='amount'>
						<div class='button' >-</div>
	                    <input class='hid' type='hidden' value='cpu_".$row['cpu_id']."'>
						<input class='quanity' autocomplete='off' maxlength='3' value='".$p_id[2]."' name='quanity' id='q_".$i."' type='text' >
	                    <div class='button' >+</div> 
	                    </div>");
				$sum=$p_id[2]*$row['price']; $grand+=$sum;
				echo("<div class='sum' id='sum".$i."'><g class='one'>".number_format((float)$sum, 2, '.', ' ')."</g> zł</div>");
                 echo("<div class='del' id='cpu_".$row['cpu_id']."'>X</div>");
                echo("</div>");
                echo("<script type='text/javascript'> 
						i++;			
						t[i]=".$row['price'].";
						q[".$i."]=".$row['quanity'].";
				  	 </script>");
                
				
                
        }
		}
        if($p_id[0]=='gpu'){
		$query=mysqli_query($conn, 'Select * from gpu where gpu_id='.$p_id[1].';');
		while($row=mysqli_fetch_assoc($query)){
              
				echo("<div class='block' >");
				echo("<div class='prod'>");
				echo("<img class='block_im' src='".$row['picture']."' onclick='getid(this.id)' id='gpu_".$row['gpu_id']."'> ");
				echo("<div class='inf'>");
				foreach($row as $key => $value){
					if($key=='manufacturer' ) 
						echo(" <h2 class='string' onclick='getid(this.id)' id='gpu_".$row['gpu_id']."'>".$value." ");
					if($key=='series')
						echo(" ".$value." ");
					if($key=='model')
						echo(" ".$value." ");
					if($key=='vram')
						echo(' '.$value.'GB </h2>');
                    
				}
				echo("</div>");
				echo("</div>");$i++;
				echo("<div class='price'> ".number_format((float)$row['price'], 2,'.',' ')." zł </div>");
				if($p_id[2]>$row['quanity']) $p_id[2]=$row['quanity'];
				echo("	<div class='amount'>
	                    <div class='button' >-</div> 
						<input class='hid' type='hidden' value='gpu_".$row['gpu_id']."'>
				        <input class='quanity' autocomplete='off' maxlength='3' value='".$p_id[2]."' name='quanity' id='q_".$i."' type='text' >
	                    <div class='button' >+</div> 
	                    </div>");
				$sum=$p_id[2]*$row['price']; $grand+=$sum;
				echo("<div class='sum' id='sum".$i."'><g class='one'>".number_format((float)$sum, 2, '.', ' ')."</g> zł</div>");
                 echo("<div class='del' id='gpu_".$row['gpu_id']."'>X</div>");
                echo("</div>");
				echo("<script type='text/javascript'> 
						i++;			
						t[i]=".$row['price'].";
						q[".$i."]=".$row['quanity'].";
				  	 </script>");
               
				
                
        }
        }
        }
		if(@$query){
			echo("<div class='summar'>");
			echo("<div class='grand'>Wartość zamówienia: <g class='whole'>".number_format((float)$grand, 2, '.', ' ')."</g> zł </div> ");
			echo("<div id='doit'><button class='order_b'> Zamów </button></div>");
			echo("</div>");
		}
		if(!@$query){
			echo('Twój koszyk jest pusty.');
			echo("<style> .but_c,.header{display:none;} </style>");
		}
		
	?>

		
	</div>
	<br>
	
	
</body>
<script type="text/javascript" src='jquery-2.2.0.js'></script>
<script type="text/javascript" src='jquery.bxslider/jquery.bxslider.min.js'></script>	
<script type="text/javascript" src='javascript.js'></script>		
<?php 
	include("php.php");		
?>
<script>
$(document).ready(function(){
    var data = <?php echo json_encode(@$_GET['doit'], JSON_HEX_TAG); ?>;
	if(data){
		$(".quanity").each(function(){
           $(this).click(); 
        });
        $(".basket").click();
	}
  var data2 = <?php echo json_encode(@$_GET['del1'], JSON_HEX_TAG); ?>;
  if(data2){
      $(".quanity").each(function(){
           $(this).click(); 
      });
      $(".basket").click();
      if(!$(".quanity").length){
         clearit();
         
     }
  }
});

</script>
</html>