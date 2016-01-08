/*
Super Simple Bootstrap Contact Form
Authur : Prateek Mathapati
Github : https://github.com/Prateekz    
Version : 1.0
It's a Open Source, You can modify, edit and use but authur name and github profile link
must be given in your project.
It should not be used to sell or make money out of it, for selling 
licence contact authur
Copyright 2016 - All Rights Reserved - Prateek Mathapati
*/  

//Mail Script
    $(document).ready(function(){
        $("#feedback_messages").submit(function(event) {
            /* Stop form from submitting normally */
            event.preventDefault();
            /* Clear result div*/
            $("#success-message").html('');
            /* Get some values from elements on the page: */
            var values = $(this).serialize();
            /* Send the data using post and put the results in a div */
            $.ajax({
                url: "sendmail.php",
                type: "post",
                data: values,
                beforeSend: function(){
                    $('#feedback_messages').fadeOut(500);
                },
                success: function(data){
                    /*alert("success");*/
                    // $('#form').fadeOut(500);
                    $("#success-message").html(data).fadeIn(500);
                },
                error:function(){
                    /*alert("failure");*/
                    $("#success-message").html('There is error while submit');
                }
            });
        });
    });        