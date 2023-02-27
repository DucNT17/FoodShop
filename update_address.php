<?php

include 'components/connect.php';

session_start();

if(isset($_SESSION['user_id'])){
   $user_id = $_SESSION['user_id'];
}else{
   $user_id = '';
   header('location:home.php');
};

if(isset($_POST['submit'])){

   $address =  $_POST['number'].', '.$_POST['street'].', '. $_POST['city'] .', '. $_POST['country'] .' - '.$_POST['pin_code'];
   $address = filter_var($address, FILTER_SANITIZE_STRING);

   $update_address = $conn->prepare("UPDATE `users` set address = ? WHERE id = ?");
   $update_address->execute([$address, $user_id]);
   $message[] = 'address saved!';
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Address</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">

    <link rel="stylesheet" href="css/style.css">
</head>
<body>

<!--header section starts-->
<?php include 'components/user_header.php' ?>
<!--header section ends-->

<section class="form-container">

    <form action="" method="post">
        <h3>your address</h3>
        <input type="text" class="box" placeholder="number" required
        maxlength="50" name="number">
        <input type="text" class="box" placeholder="street name" required
        maxlength="50" name="street">
        <input type="text" class="box" placeholder="city name" required
        maxlength="50" name="city">
        <input type="text" class="box" placeholder="country name" required
        maxlength="50" name="country">
        <input type="number" class="box" placeholder="pin code" required
        max="999999" min0="0" onkeydown="if(this.value.length == 6) return false;" name="pin_code">
        <input type="submit" value="save address" name="submit" class="btn">

    </form>
</section>

<?php include 'components/footer.php' ?>

    <script src="js/script.js"></script>
</body>
</html>