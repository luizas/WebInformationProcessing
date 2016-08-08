<!-- 
Question
Write a PHP script that includes a single CSS styled form, together with its processor, that allows a user to register
 (create) a username and password. You should validate the password using two input boxes, checking that the same
 text has been entered in both input boxes, and that the password is at least 8 characters in length. Your script
 should returns a CSS styled message confirming the submission by showing the username and password with only the 
 first and last characters of the password visible; with all other letters are replaced with the “*”character, 
 for example, “Congratulations John; you are now registered with password P******D!”. -->
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
    $name = $Password = $hiddenpassword = "";
    //Checks if something is posted
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
      $name = test_input($_POST["name"]);
      $Password = test_input($_POST["password"]);
    }
    //Function that validates the data 
    function test_input($data) {
      $data = trim($data);
      $data = stripslashes($data);
      $data = htmlspecialchars($data);
      return $data;
    }

    ?>
    <form name="myForm" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" onsubmit="return validateF()">  
      Username: <input type="text" name="name" required><br>
      Password: <input type="password" name="password" required><br>
      Confirm Password: <input type="password" name="cpassword" required><br>
      <input type="submit" name="submit" value="Submit">  
    </form>
    <!-- JavaScript Function that validates the form -->
    <script>
      function validateF(){
        var x = document.forms["myForm"]["password"].value;
        var y = document.forms["myForm"]["cpassword"].value;
        if (x != y) {
        alert("Passwords do not match"+x);
        return false;
        }
        if (x.length <= 7) {
        alert("Password is too SHORT"+x.length);
        return false;
        }
       return true;
      }
    </script>
    <div class="output">
    <?php
    if($_POST){
    echo "<h2>Your Input:</h2>";
    echo "Hi  ".$name."  you registered with password -  ";
    echo substr("$Password",0,1); 
    echo preg_replace("/./", "*", substr("$Password",1,strlen("$Password")-2));
    echo substr("$Password",strlen("$Password")-1); }
    ?>
    </div>
  </body>
</html>
