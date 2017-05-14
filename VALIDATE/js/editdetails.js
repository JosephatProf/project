 $(function() {

   	$("item_error_message").hide();
   	//$("#itemNo_error_message").hide();
   var item_valid = false;
   var itemNo_valid = false;

   $("#item").focusout(function() {
   		
   		check_Item();//call the check item function
   });
   $("#itemNum").focusout(function() {
   		
   		check_ItemNo();//call the check itemNo function
   });
   //use jquery ui date picker  for the date completed field
   $("#dateCompleted").each(function() {
   	//convert date format into mysql date format
        $(this).datepicker({
		    showWeek: false,
		    firstDay: 1,
		    minDate: -30,
		    dateFormat: "yy/mm/dd"
		});
    });
   //Use jquery ui to delete user with confirmation dialog box
   $( "#dialog-confirm" ).dialog({
			resizable: false,
			height: "auto",
			width: 400,
			modal: true,
			buttons: {
				"Delete all user details": function() {
					$( this ).dialog( "close" );
				},
				Cancel: function() {
					$( this ).dialog( "close" );
				}
			},
			close: function (event, ui) {
		          $(this).remove();
		      
		     }
		});
   //create a function to check if item input field is empty
   function check_Item(){
   		var item_required = $("#item").val().length;
   		//check input value in the itme field text box is empty
   		if (item_required == 0) {
   			$("#item_error_message").html("Item field is required!!");
   			$("#item_error_message").show();
   			item_valid = true;
   			return false;
   		}else{
   			$("#item_error_message").hide();
   		}

   }
   //implement function check if item number is numeric or not
   function check_ItemNo(){
   		var itemNo = $("#itemNum").val();
   		var convetItemNo = Number(itemNo);
   		//check if number entered is numeric or not
   		if(!Number.isInteger(convetItemNo)){
    		$("#itemNo_error_message").html("Item Number Must be an integer value!!");
        $("#itemNo_error_message").css("color","red");
   			$("#itemNo_error_message").show();
   			itemNo_valid = true;
   			return false;
        }else{
        	$("#itemNo_error_message").hide();
        }
   }
   $("#details").submit(function(){
   	//jQuery function to disable submission if errors found within page
   		  item_valid = false;
        itemNo_valid = false;
        check_Item();
        check_ItemNo();
        if (item_valid == false && itemNo_valid == false) {
        	return true;
        }else{
        	$("#submit_error_message").html("Please check your entry details");
        	$("#submit_error_message").show();
        	return false;
        }
   });


});


