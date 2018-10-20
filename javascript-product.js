jQuery(function($) {
  function divShadow() {
    var $menu = $('.top');
    if ($(window).scrollTop() > 10)
      $menu.css({
        'box-shadow': '2px 2px 30px -3px grey'
      });
    else
      $menu.css({
        'box-shadow': 'none'
      });
  }
  $(window).scroll(divShadow);
  divShadow();
});
function getid(product_id) {	
  	 window.location = "product.php?id="+product_id+"";
}
function red1(){
	window.location="cpu.php";
}
function red2(){
	window.location="gpu.php";
}	
function clearit(){
    window.location="basket.php?clear=1";
}
function numberWithSpaces(x) {
    var parts = x.toString().split(".");
    parts[0] = parts[0].replace(/\B(?=(\d{3})+(?!\d))/g, " ");
    return parts.join(".");
}

$(document).ready(function(){

var slider = $('.slide').bxSlider({
  minSlides: 0,
  maxSlides: 3,
  slideWidth: 260,
  slideMargin: 20,
  infiniteLoop:false,
  hideControlOnEnd:true,
  pager:false,
 });
	
$('.basket_add').hover(
	function() {
    	$('.price').css('filter', 'blur(1px)');
	},
	function(){
		 $('.price').css('filter', 'none');
	}
); 


//buttons+ -	
$(".button").on("click", function() {
	var button=$(this);
	if (button.text() == "+") {
		var oldValue = $(this).prev("input").val();
		var newVal = parseFloat(oldValue) + 1;
		var xyz=$(this).prev("input").attr('id');
		xyz=xyz.split("_");
		xyz=xyz[1];
		if(newVal>q[xyz]){
			newVal=oldValue;
			alert("Niestety w tej chwili nie posiadamy tylu sztuk tego produktu.");
		}
		$(this).prev("input").val(newVal);
		$(this).prev("input").click();
	}
	else if(button.text() == "-"){
		var oldValue = $(this).nextAll("input").eq(1).val();
		if(oldValue > 1)
			var newVal = parseFloat(oldValue) - 1;
		else
			var newVal = 1;
		$(this).nextAll("input").eq(1).val(newVal);
		$(this).nextAll("input").eq(1).click();
	}
	
});	

//change value of quanity	
$(".quanity").on("propertychange change click paste focusout input", function() {
		var qi=this.id;
		var i0=qi.split("_");
		var i=i0[1];
		var sum = t[i]*$(this).val();
		sum=parseFloat(sum).toFixed(2);
		if(sum.toString().length>3) 
			sum=numberWithSpaces(sum);
		$('#sum'+i).children().text(sum);
	
		var xy=$(this).attr("id");
		xy=xy.split("_");
		xy=xy[1];
		if($(this).val()>q[xy]){
			$(this).val(q[xy]);
			alert("Niestety w tej chwili nie posiadamy tylu sztuk tego produktu.");
		}
	
		var whole=0;
		$('.one').each(function(){
            var x=$(this).text();
			x=x.replace(/ /g, '');
			x=parseFloat(x);
			whole+=x;
		});
        var amountAll=0;
        $('.quanity').each(function(){
            var y=$(this).val();
			y=parseFloat(y);
			amountAll+=y;
		});
	
		
		var id=$(this).prev(".hid").val();
		var amount=$(this).val();
		$.ajax({ //my first ajax
			type: "POST",
			url: "product.php",
    		data:{ id:id , amo:amount , all:whole, amoAll:amountAll},
			success: function(){
			}
		});
				
});	
	
	
});

//wrong signs in input
$(".quanity").on("keyup", function() {
	if ( (!$.isNumeric( $(this).val()) ) || ($(this).val()==0)){
		var str=$(this).val();
		$(this).val(str.substring(0, str.toString().length - 1));
		if($(this).val()==""){$(this).val(1);}
	}
});	
$(".basket").on("click", function(){
	window.location="basket.php";
});

$(".del").on("click", function(){
    delval=$(this).attr("id");
    $(this).parent().css("display","none");
    $.ajax({ //my second ajax
			type: "POST",
			url: "basket.php",
    		data:{ del:delval},
			success: function(){
                window.location="basket.php?del1=1";
			}
		});
});
$(".order_b").on("click", function(){
    window.location="order.php"
    
});


