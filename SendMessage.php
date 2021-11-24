    <?php
    $errors = '';
    $name = $_POST['Name'];
    $email = $_POST['Email'];
    $message = $_POST['Message'];
    $myemail = 'youremail@email.com'; //Email to receive emails
    if(empty($_POST['Name'])  ||
       empty($_POST['Email']) ||
       empty($_POST['Message']))
    {
        $errors .= "\n Error: all fields are required";
    }
  
    if (!preg_match(
    "/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/i",
    $email))
    {
        $errors .= "\n Error: Invalid email address";
    }
    file_put_contents("error.log",var_export($errors,TRUE));
    if( empty($errors))
    {
    $to = $myemail;
    $email_subject = "Contact form submission: $name";
    $email_body = "You have received a new message. ".
    " Here are the details:\n Name: $name \n ".
    "Email: $email\n Message \n $message";
    $headers = "From: $myemail\n";
    $headers .= "Reply-To: $email";
    mail($to,$email_subject,$email_body,$headers);
    header('Location: contact.html');
    }
    
    ?>