<?php

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
    

    /*Getting User Input from form and assigning it to variable*/
    $uname = $_POST['uname'];
    $uemail = $_POST['uemail'];
    $uphone = $_POST['uphone'];
    $umessage = $_POST['umessage'];

	
	    
		$email_to = "<your-mail-id@dragneel.com>"; //Your Mail Id
		$email_subject = "Customer Contact Details";
	
		
		/*Validation Function for Empty Fields*/
		if(empty($_POST["uname"]) || empty($_POST["uemail"]) || empty($_POST["uphone"]) || empty($_POST["umessage"])){
			died('please fill the form before submitting');
            exit;
		}
		

        $email2 = "<noreply@dragneel.com>";
		
		
		
		  /*Clean String for appending the text to body*/
		  function clean_string($string) {
		  $bad = array("content-type","bcc:","to:","cc:","href");
		  return str_replace($bad,"",$string);
		   }
		
       /*Adding text which we got from user form to mail body*/
       $email_message  = "Customer Contact Details.<br><br>"; 
       $email_message .= "Name: ".clean_string($uname). "<br><br>";
       $email_message .= "Email: ".clean_string($uemail). "<br><br>";
       $email_message .= "Phone No: ".clean_string($uphone). "<br><br>";
       $email_message .= "Message: ".clean_string($umessage). "<br><br>";
        
        
        
		$headers = 'From: '.$email2."\r\n".'Reply-To: '.$email2."\r\n".'X-Mailer: PHP/' . phpversion();
		$headers .= "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n"; //Header declaration to support html format emails
		@mail($email_to,$email_subject,$email_message,$headers);
		echo "Thank You for Contacting Us";
?>