$(function(){
	$("div#dialog").dialog ({
	  autoOpen : false
	  
	});

	$("#open").click (function (event)    // Open button Treatment
	{
	  if ($("#dialog").dialog ("isOpen")) alert ("Already open !");
	  else $("#dialog").dialog ("open");
	});

	$("#close").click (function (event)   // Close button Treatment
	{
	  if (!$("#dialog").dialog ("isOpen")) alert ("Already closed !");
	  else $("#dialog").dialog ("close");
	});
	$("#hed1").hide();
	$("#foot1").hide();
	$("#sidebar1").hide();
	$("#diaplay").hide();
	//ajax onclick of item link loads the item details from the dispalaydetails page
	$("#open").click (function (event)    // Open button Treatment
	{
	$.ajax({
        	 
        	 method:"POST",
        	 dataType:"text",
        	 success:function(html)
        	 {

        	 	$("#displayitems").load('displaydetails.php');
 				//$("#displayitems").show(); 
        	 }
        });
	});

});