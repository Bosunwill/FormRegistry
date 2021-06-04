<?php
  require_once('config.php');
?>

<?php
//  echo "I will process the information"

if(isset($_POST)) {
    // echo 'User Submited.';
    $firstname     = $_POST['firstname'];
    $lastname      = $_POST['lastname'];
    $companyname   = $_POST['companyname'];
    $email         = $_POST['email'];
    $phonenumber   = $_POST['phonenumber'];
    $password      = sha1($_POST['password']);
    $checking      = $_POST['checking'];
    if ($checking == ' ')
    {
        echo $companyname;
    }
    if ($checking == 'true') {
    $sql = "INSERT INTO users (firstname, lastname, companyname, email, phonenumber, password) VALUES(?,?,?,?,?,?)";
    $stmtinsert = $db->prepare($sql);
    $result = $stmtinsert->execute([$firstname, $lastname, $companyname, $email, $phonenumber, $password]);
    if($result){
        echo $companyname . ' is successfully saved.' ;
    }else{
        echo 'There were errors while saving the data.';
    }
} else if($checking == 'false')
{
    echo 'checking is ' . $checking;
}
   // echo $firstname . " " . $lastname . " " . $companyname . " " . $email . " " . $phonenumber . " " . $password;

 } else {
     echo "A field is empty";
 }

?>