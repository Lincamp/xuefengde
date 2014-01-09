<!DOCTYPE html>
<html><body>
<?php echo "My first PHP script!";
echo "<br>";
?>

        
<?php
$str = 'one;two;three;four';

$countascii = count_chars($str, 1);

echo "$countascii[59] <br>";

//$data = "Two Ts and one F.";

foreach (count_chars($str, 1) as $i => $val) {
   echo "There were $i, $val instance(s) of \"" , chr($i) , "\" in the string.\n<br>";
}


// zero limit
print_r(explode(',',$str,0));
print "0<br>";

// positive limit
print_r(explode(',',$str,1));
print "1<br>";

// positive limit
print_r(explode(',',$str,2));
print "2<br>";

// positive limit
print_r(explode(',',$str,3));
print "3<br>";

// positive limit
print_r(explode(',',$str,4));
print "4<br>";

// negative limit 
print_r(explode(',',$str,-1));
?>          
        
        
<?php
if (isset($_REQUEST['email']))
//if "email" is filled out, send email
  {
  //send email
  $email = $_REQUEST['email'] ;
  $subject = $_REQUEST['subject'] ;
  $message = $_REQUEST['message'] ;
  mail("someone@example.com", $subject,
  $message, "From:" . $email);
  echo "Thank you for using our mail form";
  }
else
//if "email" is not filled out, display the form
  {
  echo "<form method='post' action='mailform.php'>
  Email: <input name='email' type='text'><br>
  Subject: <input name='subject' type='text'><br>
  Message:<br>
  <textarea name='message' rows='15' cols='40'>
  </textarea><br>
  <input type='submit'>
  </form>";
  }
?>
</body></html>