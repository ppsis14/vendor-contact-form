<?php
// define variables and set to empty values
$compNameErr = $saleNameErr = $emailErr = $phoneNumErr = $compAddressErr = $subjectErr = $messageErr = "";
$compName = $saleName = $email = $phoneNum = $compAddress = $subject = $message = "";
$completeMsg = "Please fill up form before!";
$result = false;
include 'validationForm.php'
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <title>Spendee IT Store</title>
</head>
<body>
    <div class="container">
        <header>
            <h1 class="title display-3">Spendee IT Store</h1>
        </header>
        <div class="order-table-box" id="order-table">
            <div class="row">
                <h1 class="title-form display-5">Request for Quotation</h1><br>
                <form class="form-inline" id="upload_csv" method="post" enctype="multipart/form-data">
                    <div class="col-md-4">
                        <label for="controlFile">Add CSV file that contain order list:</label>
                    </div>
                    <div class="col-md-6">
                        <input type="file" name="csv_file" class="form-control-file" id="csv_file">
                    </div>
                    <div class="col-md-2">
                        <button type="submit" class="btn btn-primary btn-sm" name="import" id="import" value="import">Upload</button>
                    </div>
                    
                    <div class="container-file">
                        <?php include 'importCSVFile.php'; ?>
                    </div>
                </form>
            </div>
        </div>
        <div class="notify-order-box" id="notify-order">
            <div class="row">
                <h1 class="title-form display-5">Notify Product Problem</h1><br>
                <form id="submit-img-vendor" class="form-inline" action="" method="post" enctype="multipart/form-data">
                    <div class="form-group col-md-4">
                        <label for="controlFile">Select images to notify product problem:</label>
                    </div>
                    <div class="form-group col-md-6">
                        <input type="file" name="img_file[]" multiple="" class="form-control-file" id="img_file"><br><br>
                    </div>
                    <div class="col-md-2">
                        <button type="submit" class="btn btn-primary btn-sm" name="upload" id="upload" value="upload">Upload</button>
                    </div>
                    <div><br><hr><br><?php include 'uploadImage.php'; ?></div>
                </form>
            </div>
        </div>        
        <div class="form-box">
            <div class="row">
                <h1 class="title-form display-5">Vendor Contact Form</h1>                
                <form method="post" class="validation" id="validate" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                <hr>
                    <div class="form-group">
                        <label for="inputCompanyname">* Company Name</label>
                        <input type="text" class="form-control" id="inputCompanyName" name="compName" placeholder="Enter Company Name" value="<?php echo $compName; ?>">            
                        <span class="error-msg"><?php echo $compNameErr; ?></span>       
                    </div>
                    <div class="form-group">
                        <label for="inputAddress">* Company Address</label>
                        <input type="text" class="form-control" id="inputAddress" name="compAddress" placeholder="Enter Company Address" value="<?php echo $compAddress; ?>">
                        <span class="error-msg"><?php echo $compAddressErr; ?></span>  
                    </div>
                    <hr>
                    <div class="form-group">
                        <label for="inputSellerName">* Saleperson Name</label>
                        <input type="text" class="form-control" id="inputSellerName" name="saleName" placeholder="Enter Full Name" value="<?php echo $saleName; ?>">
                        <span class="error-msg"><?php echo $saleNameErr; ?></span>                        
                    </div>
                    <div class="form-group">
                        <label for="inputEmail">* Email address</label>
                        <input type="email" class="form-control" id="inputEmail1" name="email" aria-describedby="emailHelp" placeholder="Enter Vendor Email" value="<?php echo $email; ?>">
                        <span class="error-msg"><?php echo $emailErr ?></span>
                    </div>
                    <div class="form-group">
                        <label for="InputPhone">* Phone Number</label>
                        <input type="text" class="form-control" id="inputPhone" name="phoneNum" placeholder="Enter Phone Number" value="<?php echo $phoneNum; ?>">
                        <span class="error-msg"><?php echo $phoneNumErr; ?></span>  
                    </div>
                    <hr>
                    <div class="form-group">
                        <label for="inputSubject">* Subject</label>
                        <input type="text" class="form-control" id="inputSubject" name="subject" placeholder="Fill Some Subject" value="<?php $subject = $selected; echo $subject; ?>">
                        <span class="error-msg"><?php echo $subjectErr; ?></span>  
                    </div>
                    <div class="form-group">
                        <label for="message">Massage</label>
                        <textarea class="form-control" id="inputMessage" rows="3" name="message" placeholder="Fill Some Message" value="<?php echo $message; ?>"></textarea>  
                    </div>
                    <br>
                    <div class="alert alert-success" role="alert" id="alert-box"><?php echo $completeMsg; ?></div><br>
                    <div class="form-group">
                        <button type="submit" name="submit" id="submit" class="btn btn-primary btn-md btn-block">Send to Vendor</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="report-box">
            <div class="row">
                <div class="container">
                    <h1 class="report-form display-5">Output Report</h1><br>
                <div class="card">
                    <?php 
                        if($result){
                            echo '<h6 class="card-header">Company Name</h6><div class="card-body">' .$compName. "</div>";
                            echo '<h6 class="card-header">Company Address</h6><div class="card-body">'. $compAddress  ."</div>";
                            echo '<h6 class="card-header">Saleperson Name</h6><div class="card-body">' . $saleName ."</div>";
                            echo '<h6 class="card-header">Email Address</h6><div class="card-body">'. $email."</div>";
                            echo '<h6 class="card-header">Phone Number</h6><div class="card-body">'.$phoneNum."</div>";
                            echo '<h6 class="card-header">Subjec</h6><div class="card-body">'. $subject."</div>";
                            echo '<h6 class="card-header">Meassage</h6><div class="card-body">'. $message."</div>"; 
                        }
                    ?>  
                </div>
                </div>
            </div>
        </div>
        
        <footer class="footer">
            <p>Create by Thikamporn Simud</p>
        </footer>
    </div>    
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script src="jquery-3.3.1.min.js"></script>
</body>
</html>