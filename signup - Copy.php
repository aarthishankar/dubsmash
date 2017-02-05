<?php
include 'mysqlconnection_2.php';

$status = false;
$result = "Signup Failed";
$response = array("status"=> $status, "result"=> $result);
function generateRandomString($length = 5) {
    $characters = '0123456789';
    $a ='little_';
    $charactersLength = strlen($characters);
    $randomString = '';
    $userid='';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
        $userid=$a.$randomString;
    }
    return $userid;
}
//echo generateRandomString();


    if (isset($_POST['username']) && isset($_POST['password'])){
        $userid=generateRandomString();
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $confirmpassword = $_POST['confirm_password'];
        $q="SELECT * from little_register where u_mail LIKE '$email' ";
        $res= mysql_query($q);
        $rows = mysql_num_rows($res);
        if($rows == 0)
        {
        if($password==$confirmpassword)
        {
        $query = "INSERT INTO little_register(u_id,u_name, u_mail, u_password) VALUES ('$userid','$username', '$email', '$password')";
        $result = mysql_query($query);
    
    if ($result) {
        $response['status'] = true;
        $response['result'] = "Success";
       // $_SESSION['u_id']=$rowsdata['u_id'];
        //$_SESSION['u_name']=$rowsdata['u_name'];
 
        //header("location: profile.php"); 
        echo json_encode($response);
    } else {
        $response['result'] = "registration failed";
        echo json_encode($response);
    }        
}
}else {
    $response['result'] = "email already exists";
        echo json_encode($response);
}
}
    mysql_close($con); 
    ?>
