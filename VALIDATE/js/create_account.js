 $(function() {
 	$("#uname_error_message").hide();
 	$("#list_error_message").hide();
 	$("#error_password").hide();
 	var error_username = false;
 	var error_list     = false;
 	var error_pass = false;
 	var error_user_avail = false;
   $("#username").focusout(function() {
 		//call function check if username is entered
   		isUsername_typed();
   });
   $("#title").focusout(function() {
   	//cal list check function
   		isListVal_typed();
   })
   //check password strength
	$("#password").keyup(function(){
		$('#error_password').html(checkStrength($('#password').val()))

	});
	//check if password match
	$("#password2").keyup(function(){
		if ($(this).val() == $("#password").val()) {
			$('#error_comfirm_pass').html(" Passwords Match!!");
			$("#error_confirm_pass").css("color","green");
			$('#error_confirm_pass').show();
		}else{
			$('#error_confirm_pass').html(" Passwords don't match!!");
			$("#error_confirm_pass").css("color","red");
			$('#error_confirm_pass').show();
		}

	});
	//Use jquery ui to delete user with confirmation dialog box
 	
 	function  isUsername_typed() {
 		var uName = $("#username").val().length;
 		//is username field has is empty
 		if (uName == 0) {
 			$("#uname_error_message").html(" Username is required");
 			$("#uname_error_message").show();
 			error_username = true;
 		}else{
 			$("#uname_error_message").hide();
 		}
 	}
 	function  isListVal_typed() {
 		var listTitle = $("#title").val().length;
 		//is list title field is empty
 		if (listTitle == 0) {
 			$("#list_error_message").html(" List title field is required");
 			$("#list_error_message").show();
 			error_list = true;
 		}else{
 			$("#list_error_message").hide();
 		}
 	}
 	
 // 	$('#password').keyup(function() {
		
	function checkStrength(password) {
		var strength = 0;
		var password = $('#password').val();
		
		if ($('#password').val().length < 6) {
			//$('#error_password').addClass("hidden");
			$('#error_password').show();
			//error_pass = true;
			
		}
		if (password.length > 7) strength += 1
		// If password contains both lower and uppercase characters, increase strength value.
		if (password.match(/([a-z].*[A-Z])|([A-Z].*[a-z])/)) 
			strength += 1
		// If it has numbers and characters, increase strength value.
		if (password.match(/([a-zA-Z])/) && password.match(/([0-9])/)) strength += 1
		// If it has one special character, increase strength value.
		if (password.match(/([!,%,&,@,#,$,^,*,?,_,~])/)) strength += 1
		// If it has two special characters, increase strength value.
		if (password.match(/(.*[!,%,&,@,#,$,^,*,?,_,~].*[!,%,&,@,#,$,^,*,?,_,~])/)) strength += 1
		// Calculated strength value, we can return messages
		// If value is less than 2
		if (strength < 2) {
			$('#error_password').html(" Weak");
			$("#error_password").css("color","red");
			$('#error_password').show();
		} else if (strength == 2) {
			$('#error_password').html(" Good");
			$("#error_password").css("color","#2D98F3");
			$('#error_password').show();
		}else {
			$('#error_password').html(" Strong");
			$("#error_password").css("color","limegreen");
			$('#error_password').show();
		}
	}
	 //check if user available
	 $("#username").blur(function() {

        var user_name = $(this).val();
        $.ajax({
        	 url:"loadajax.php",
        	 method:"POST",
        	 data:{username:user_name},
        	 dataType:"text",
        	 success:function(html)
        	 {

				if (html == "Ok") {
					$("#uname_error_message1").html("<img src='img/tick.png' height='18px' width='18px'/>" + html+ " Can use this name!!");
					$("#uname_error_message1").css("color","limegreen");
					$("#uname_error_message1").show();
					$('input[name=submit]').attr('disabled', false);
                }else{  
                    //show that the username is NOT available  
                    $("#uname_error_message1").html(html);
 					$("#uname_error_message1").show(); 
 					//disable submit button if username already exists
 					$('input[name=submit]').attr('disabled', true);
                }  

        	 }
        });
    });
	 $("#createlist").submit(function(){
   	//jQuery function to disable submission if errors found within page
   		error_username = false;
 		error_list     = false;
 		error_pass     = false;
 		//error_user_avail == false
        isUsername_typed();

        isListVal_typed();
        checkStrength(password);
        if (error_username == false && error_list == false && error_pass == false) {
        	return true;
        }else{
        	$("#submit_error_message").html("Please check your entry details");
        	$("#submit_error_message").show();
        	return false;
        }
   });

		
 });
