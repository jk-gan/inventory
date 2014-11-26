$(".quantity_r").blur(function(){
  update_price();
});



$(document).ready(function(){

	$('body').tooltip({
		selector: '[data-toggle="tooltip"]'
	});

	$("#addrow").click(function(){
	    $(".order-row:last").after('<tr class="order-row">' + 
											'<td><select name="item[]" class="form-control item" onchange="showPrice(this.value, this.parentNode.parentNode)"><option value="">Choose an Inventory</option></select></td>'+
						                  	'<td><input class="quantity_r form-control" type="number" name="quantity[]" value="0" onchange="updateSubPrice(this.value, this.parentNode.parentNode)"></td>'+
						                  	'<td><input class="price_r form-control" type="text" name="price[]" value="0.00" /></td>'+
						                  	'<td><input class="form-control" type="text" name="subtotal[]" value="0.00" /></td>'+
                                '<input type="hidden" name="arrived[]" value="0">'+
	                                    '</tr>');
	    addItem(document.getElementById("vendor_id").value);
	    // if ($(".delete").length > 0) $(".delete").show();

	});

// bind();
// 
	// $(".delete").on('click',function(){
	//     $(this).parents('.order-row').remove();
	//     //update_total();
	//     if ($(".delete").length < 2) $(".delete").hide();
	// });

	$('#lowLimit').popover({
    container:'body',
    trigger:'focus',
    title:'What is this?',
    content:"Enter the lowest number of quantity you'd like to have before being notified this inventory item is considered low."
  });

});



	// function update_total() 
	// {
 //        var total = 0;
 //        $('.price_r').each(function(i){
 //            price = $(this).html().replace("RM","");
 //            if (!isNaN(price)) total += Number(price);
 //            if (!isNaN(price)) subtotal += Number(price) * Number();
 //        });
    
 //        //total = roundNumber(total,2);
    
 //        //$('#subtotal').html("RM"+total);
 //        $('#subtotal').html("RM"+total);
 //        $('#total').html("RM"+total);
        
 //    }
   
    function updateSubPrice(val, parent)
    {
      var quantity = val;
      var x = parent.cells;
      x[3].childNodes[0].value=(val * (x[2].childNodes[0].value)).toFixed(2);

      //update total
      var total = 0;
      var price = document.getElementsByName("subtotal[]");
      var i;
      var length = price.length;
      for (i = 0; i < length; i++) 
      {
          total += Number(price[i].value);
      }
      document.getElementById("total").value = total.toFixed(2);
    } 


    // function update_price() {
    //     var row     = $(this).parents('.order-row');
    //     var price   = row.find('.price_r').val().replace("RM","");//* row.find('.qty').val();
    //     var quantity   = row.find('.quantity_r');
    //     //price       = roundNumber(price,2);
    //     isNaN(price) ? row.find('.price_r').html("N/A") : row.find('.price_r').html("RM" + price);
    //     update_total();
    // }

    // function bind() {
    //     $(".price_r").blur(update_price);
    // }


function showUser(str) 
{
  if (window.XMLHttpRequest) 
  {
    // code for IE7+, Firefox, Chrome, Opera, Safari
    xmlhttp=new XMLHttpRequest();
  } 
  else 
  { // code for IE6, IE5
    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }

  xmlhttp.onreadystatechange=function() 
  {
    if (xmlhttp.readyState==4 && xmlhttp.status==200) 
    {
    	var x = document.getElementsByClassName("item");
  		var i;
  		for (i = 0; i < x.length; i++) 
  		{
      		x[i].innerHTML=xmlhttp.responseText;
  		}

      var subtotal = document.getElementsByName("subtotal[]");
      var price = document.getElementsByName("price[]");
      var quantity = document.getElementsByName("quantity[]");
      var length = subtotal.length;
      var j;
      for (j = 0; j < length; j++) 
      {
        subtotal[j].value = "0.00";
        price[j].value = "0.00";
        quantity[j].value = "0";   
      }
      document.getElementById("total").value = "0.00";
    }

  }
  xmlhttp.open("GET","get_item/"+str,true);
  xmlhttp.send();
}

function addItem(str) 
{
 //  if (str=="") 
 //  {
 //  	var x = document.getElementsByClassName("item");
	// var i;
	// for (i = 0; i < x.length; i++) 
	// {
 //    	x[i].innerHTML="";
	// }
 //    return;
 //  } 

  if (window.XMLHttpRequest) 
  {
    // code for IE7+, Firefox, Chrome, Opera, Safari
    xmlhttp=new XMLHttpRequest();
  } 
  else 
  { // code for IE6, IE5
    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }

  xmlhttp.onreadystatechange=function() 
  {
    if (xmlhttp.readyState==4 && xmlhttp.status==200) 
    {
    	var x = document.getElementsByClassName("item");
		var i;
		for (i = 0; i < x.length; i++) 
		{
			if(x[i].value === "")
			{
				x[i].innerHTML=xmlhttp.responseText;
			}
    		
		}

}
  }
  xmlhttp.open("GET","get_item/"+str,true);
  xmlhttp.send();
}

function showPrice(str, val1) 
{
 //  if (str=="") 
 //  {
 //  	var x = document.getElementsByClassName("item");
	// var i;
	// for (i = 0; i < x.length; i++) 
	// {
 //    	x[i].innerHTML="";
	// }
 //    return;
 //  } 

  if (window.XMLHttpRequest) 
  {
    // code for IE7+, Firefox, Chrome, Opera, Safari
    xmlhttp=new XMLHttpRequest();
  } 
  else 
  { // code for IE6, IE5
    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }

  xmlhttp.onreadystatechange=function() 
  {
    if (xmlhttp.readyState==4 && xmlhttp.status==200) 
    {
    	   var x = val1.cells;
        // var y = str1.cells[2].namedItem("quantity[]");
      x[1].childNodes[0].value='1';
    	x[2].childNodes[0].value=xmlhttp.responseText;
      x[3].childNodes[0].value=x[2].childNodes[0].value;

      //update total
      var total = 0;
      var price = document.getElementsByName("subtotal[]");
      var i;
      var length = price.length;
      for (i = 0; i < length; i++) 
      {
          total += Number(price[i].value);
      }
      document.getElementById("total").value = total.toFixed(2);
    }
  }
  xmlhttp.open("GET","get_price/"+str,true);
  xmlhttp.send();
}

document.getElementById("back-btn").onclick = function()
                                          { 
                                              history.back() 
                                          };
