 <?php
session_start();
$db = mysqli_connect("localhost", "levo", "levoo.me", "food_order");
$email = mysqli_real_escape_string($db, $_POST['email']);
$pass = mysqli_real_escape_string($db, $_POST['password']);
$pass = hash('sha512', $pass);

$query = "SELECT id FROM tbl_customer WHERE email= '$email' AND password= '$pass'";
$result = mysqli_query($db, $query);
if(mysqli_num_rows($result) == 1){
    $_SESSION['tbl_customer'] = mysqli_fetch_array($result)[0];
    header("Location: http://localhost:7882/wowfood/index.php");
}
else{
    echo"not logged in";
}
?>