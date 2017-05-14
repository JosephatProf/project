$(function(){
	$("#additemdialog").hide();//span inform of the dialog box
	$("#add").click (function (event)  
	{
		//laucnh modal dialog box
		$("#additemdialog").dialog({
			width: 600,
			height:500,
			modal:true,
			buttons: [
            {
                text: "Submit",
                
                type: "submit",
                form: "formitem" // <-- Make the association
            },
            {
                text: "Close",
                click: function() {
                    $( this ).dialog( "close" );
                }
            }
        ]
		});
		
	});
	$("#add").click (function (event)  
	{
		
        $("#additemdialog").show();

	});
	//submit data from the form without leaving page
	$("submit").click(function() {
		var name = $("#item").val();
		var num = $("#itemNum").val();
		var dataSubmitted = name + num;
		$.ajax({
            url: 'index.php',
            type: 'post',
            data: dataSubmitted,
            success:function(data) { 
            	$("#msg").html(data);
            }
        });
	});
	//page refresh list automatically
	$('#formitem').on('change', function() {
		var name = $("#item").val();
		var num = $("#itemNum").val();
		var dataSubmitted = name + num;

		  $.ajax({
		  type: 'post',
		  url: 'index.php',
		  cache:false,
		  data: {
		   data:dataSubmitted,
		  },
		  success: function (response) {
		   		load("index.php");
		  }
		  });
		 
    });
    //make list sortable
    $( "#sortable" ).sortable();
    $( "#sortable" ).disableSelection();
    //use this code to make data from the sortable list update database direct in that order
    $('#sortable').sortable({
	    axis: 'y',
	    update: function (event, ui) {
	        var data = $(this).sortable('serialize');

	        // POST to server using $.post or $.ajax
	        $.ajax({
	            data: data,
	            type: 'POST',
	            url: 'pitem.php'
	        });
	    }
	});

});