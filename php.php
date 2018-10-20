<?php 
if(!isset($_SESSION['all']))
		echo("
		<style>
		.b_val, .b_valu{display:none;}
		</style>
		");
if(!isset($_COOKIE['view'])){
	  echo ('<style type="text/css">
	  	#bef:after{
			content:"Nic jeszcze nie przeglądałeś.";
		}
        .disp {
            display: none;
		}
		
        </style>');
}
?>