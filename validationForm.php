<?php

if (isset($_POST['submit'])){
    if (empty($_POST["compName"])) {
        $compNameErr = "Company Name is required";
    } 
    else {
        $compName = test_input($_POST["compName"]);
        // check if company name only contains letters and whitespace
        if (!preg_match("/^[a-zA-Z ]*$/",$compName)) {
            $compNameErr = "Only letters and white space allowed"; 
        }
    }

    if (empty($_POST["saleName"])) {
        $saleNameErr = "Seller Name is required";
    } 
    else {
        $saleName = test_input($_POST["saleName"]);
        // check if seller name only contains letters and whitespace
        if (!preg_match("/^[a-zA-Z ]*$/",$saleName)) {
            $saleNameErr = "Only letters and white space allowed"; 
        }
    }

    if (empty($_POST["email"])) {
        $emailErr = "Email is required";
    } else {
        $email = test_input($_POST["email"]);
        // check if e-mail address is well-formed
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $emailErr = "Invalid email format"; 
        }
    }

    if (empty($_POST["phoneNum"])) {
        $phoneNumErr = "Phone Number is required";
    } else {
        $phoneNum = test_input($_POST["phoneNum"]);
        // check if phone number syntax is valid (this regular expression also allows dashes in the URL)
        if (!preg_match("/\d{10}+$/",$phoneNum)) {
            $phoneNumErr = "Invalid phone number"; 
        }
    }

    if (empty($_POST["compAddress"])) {
        $compAddressErr = "Company address is required";
    } else {
        $compAddress = test_input($_POST["compAddress"]);
        // check if address is well-formed
        if (!preg_match("/[A-Za-z0-9\-\\,.]+$/",$compAddress)) {
            $compAddressErr = "Invalid company address"; 
        }
    }

    if (empty($_POST["subject"])) {
        $subjectErr = "Subject is required";
    } else {
        $subject = test_input($_POST["subject"]);
    }

    if (empty($_POST["message"])) {
        $messageErr = "";
    } else {
        $message = test_input($_POST["message"]);
    }

    if ($compNameErr == '' && $saleNameErr == '' && $emailErr == '' && $phoneNumErr == '' && $compAddressErr == '' && $subjectErr == '' && $messageErr == '')
    {
        $completeMsg = "You fill up form success fully!";
        $result = true;    
        clearError();

    }
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

function clearError(){
    $compNameErr = "";
    $compAddressErr = "";
    $saleNameErr = "";
    $emailErr = "";
    $phoneNumErr = "";
    $subjectErr = "";
}
?>