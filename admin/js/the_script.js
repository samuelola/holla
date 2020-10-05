$(document).ready(function(){
	
	$("#add_user").click(function(){
      
       

        $.ajax({

            url: "backend/register.php",
            method: "post",
            data : $("form").serialize(),
            success:function(data){
              
               $("#sign_up").html(data);
            }


        });
        
	});
});