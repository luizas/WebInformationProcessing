<!-- 
Question:
Write a PHP script that includes a single CSS styled form, together with its processor, that accepts 
 input a user’s name and email address, and returns a CSS styled message confirming the valid input. 
 You should validate the form data using Javascript prior to submission to the processor, ensuring 
 that the email address is valid. You must also ensure that the processor is not susceptible to any form of injection attack. -->
<!DOCTYPE HTML>  
<html>
  <head>
  <!-- Styles the output -->
    <style>
   body {
    background-color: #d0e4fe;
  }
      .output {color: #FF0000;}
    }
    </style>
  </head>
  <body>  

    <?php
    //define variables and set to empty values
    $nameErr = $emailErr = "";
    $name = $email = "";
    //Checks if something is posted
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
      $name = test_input($_POST["name"]);
      $email = test_input($_POST["email"]);
    }
    //Function that validates the data 
    function test_input($data) {
      $data = trim($data);
      $data = stripslashes($data);
      $data = htmlspecialchars($data);
      return $data;
    }
    ?>
    <form name="myForm" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" onsubmit="return validateForm()">  
      Name: <input type="text" name="name" ><br>
      E-mail: <input type="email" name="email" ><br>
      <input type="submit" name="submit" value="Submit">  
    </form>
    <!-- JavaScript Function that validates the form -->
    <script>
      function validateForm(){
        var x = document.forms["myForm"]["name"].value;
        var y = document.forms["myForm"]["email"].value;
        if (x == null || x == "") {
        alert("Name must be filled out");
        return false;
        }
        if (y == null || y == "") {
        alert("Email must be filled out");
        return false;
        }
       return true;

      }
    </script>
    <div class="output">
    <?php
    echo "<h2>Your Input:</h2>";
    echo $name;
    echo "<br>";
    echo $email;
    ?>
    </div>
  </body>
</html>
