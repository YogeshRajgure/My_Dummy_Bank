<!DOCTYPE html>
<html lang="en">
<head>
 <!--Containing title, scaling of elements etc-->
 <meta charset="UTF-8">
 <meta http-equiv="X-UA-Compatible" content="IE=edge">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <title>Basic Banking System</title>
 
 <!--Including Bootstrap-->
 <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
 
 <link rel="stylesheet" href="css/index.css">
 
 <!--Including jquery and bundle-->
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
 
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</head>
<body>
 <!--Navbar-->
 <div class="contain">
   <div class="container-fluid p-3 mb-2 bg-primary text-white">
    <a class="navbar-brand" href="index.html">
     <img src="https://icons.getbootstrap.com/assets/icons/bank2.svg" alt="bank-logo" width="30" height="24"></a>
    <div class="collapse navbar-collapse" id="navbarNav">
     <ul class="navbar-nav">
      <li class="navbar-item">
       <a id="customerlink" class="nav-link active" href="view-all-customers.php">View all customers</a>
      </li>
      <li class="navbar-item">
       <a id="transferlink" class="nav-link active" href="transfer-money.php">Transfer money</a>
      </li>
     </ul>
    </div>
   </div>

  <!--Heading-->
  <h3 class="text-center">View all transactions</h3>

  <!--Submitting data from transfer-money.php to database transferdetails-->
  <?php
 include 'db.php';
 #Function to show local timezone
 if(isset($_POST['amount']))
 {
 date_default_timezone_set('Asia/Kolkata');
  
    $timestamp=date("Y-m-d H:i:s");
     $sender=$_POST['sender'];
     $recipient=$_POST['recipient'];
     $amount=$_POST['amount'];

     #Storing money sent by sender
     $senderquery="SELECT * from customerdetails where name='$sender'";
     $query=mysqli_query($conn,$senderquery);
     $sql1=mysqli_fetch_array($query);

     #Storing money recieved by recipient
     $recipientquery="SELECT * from customerdetails where name='$recipient'";
     $query1=mysqli_query($conn,$recipientquery);
     $sql2=mysqli_fetch_array($query1);

     #Conditions to check valid inputs
     if(($amount)<0)
     {
      echo '<script>';
      echo 'alert("Sorry,cannot transact")';
      echo '</script>';
     }
     else if($amount>$sql1['amount'])
     {
        echo '<script>';
        echo 'alert("Insufficient funds")';
        echo '</script>';
     }
     else
     {
      #Actual transfer operation
      $buffer=$sql1['amount']-$amount;
      $sql="UPDATE customerdetails set amount=$buffer where name='$sender'";
      mysqli_query($conn,$sql);

      $buffer=$sql2['amount']+$amount;
      $sql="UPDATE customerdetails set amount=$buffer where name='$recipient'";
      mysqli_query($conn,$sql);

      $que="INSERT into transferdetails VALUES ('$sender','$recipient','$amount','$timestamp')";
      $sql3=mysqli_query($conn,$que);
     
      if($sql3){
          echo '<script>';
          echo 'alert("Congratulations! Your transaction was successful!")';
          echo '</script>';
        }

     $buffer=0;
     $amount=0;
    }
   }

 ?>
  <?php
  #Displaying the table transferdetails for transaction history
  $result=$conn->query("SELECT * from transferdetails");
 $query=array();
 while($query[]=mysqli_fetch_assoc($result));
  array_pop($query);
 echo '<table class="table table-bordered table-dark" border="1">';
 echo '<tr>';
 echo '<th>Sender</th>';
 echo '<th>Recipient</th>';
 echo '<th>Amount</th>';
 echo '<th>Transaction date and time</th>';
 /*foreach($query[2] as $key=>$value){
    echo '<td>';
    echo $key;
    echo '</td>';
 }*/
 echo '</tr>';
 foreach($query as $row) {
   echo '<tr>';
   foreach($row as $column){
       echo '<td>';
       echo $column;
       echo '</td>';
   }
   echo '<tr>';
 }
 echo '</table>';
 ?>
  <!--Footer with copyright-->
 <footer class="page-footer font-small blue">
  <div class="footer-copyright text-center py-3">
     © 2021 Yogesh Rajgure
  </div>
 </footer>
</div>
</body>
</html>