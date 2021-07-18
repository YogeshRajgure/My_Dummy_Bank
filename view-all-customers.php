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

 <script>

 </script>

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

   <h3 class="text-center">View all customers</h3>;

 <?php
 #Display all customers and their info
 include 'db.php';
 $result=$conn->query("SELECT * from customerdetails");
 $query=array();
 while($query[]=mysqli_fetch_assoc($result));
  array_pop($query);
 echo '<table class="table table-bordered table-dark" border="1">';
 echo '<tr>';
 echo '<th>Name</th>';
 echo '<th>Account number</th>';
 echo '<th>Amount</th>';
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
 <!--Goign to transfer money page-->
 <div class="text-center">
  <a href="transfer-money.php" class="btn btn-primary" value="Next page">Next</a> 
 </div>
 <!--Footer with copyright-->
 <footer class="page-footer font-small blue">
  <div class="footer-copyright text-center py-3">
     © 2021 Yogesh Rajgure
  </div>
 </footer>
</div>
</body>
</html>