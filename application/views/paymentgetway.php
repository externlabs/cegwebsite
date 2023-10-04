<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
        <form id="myForm"  name="ecomStatus" method="post" action="<?php echo $payment_data['payement_url']?>">
            <input type="hidden" name="EncryptTrans" value="<?php echo $payment_data['EncryptTrans']?>">
            <input type="hidden" name="merchIdVal" value ="<?php echo $payment_data['merchante_id']?>"/>
            <input type="submit" name="submit" id="submitButton" value="">  
        </form> 
        <script>
  const form = document.getElementById("myForm");
  const submitButton = document.getElementById("submitButton");

  // Trigger a click event on the submit button to submit the form on page load
  submitButton.click();
</script>
</body>
</html>