<html>
<body>
   
    <?php
      $number = trim($_POST['number']); 
      $viscosty_grade = trim($_POST['viscosty_grade']);
      $price = trim($_POST['price']);
      $price = doubleval($price);     
      if (!$number || !$viscosty_grade || !$price) 
      {   
        header('location: index.php');
        exit;
      }
     
      @ $db = new mysqli('localhost','root','','my_database'); 
      
      if (mysqli_connect_errno())   
      {
        echo 'Connection error';
        exit;
      }
      $db->query('SET NAMES utf8');  
      $insert_db = "insert into parameter values ('".$number."', '".$viscosty_grade."', '".$price."')";
      $my_result = $db->query($insert_db);
    ?> 

<link rel="stylesheet" href="main.css">
    <div class="row d-flex justify-content-center container"></div>
        <div class="card-header">Result:</div>
            <div class="scroll-area-sm">
                <perfect-scrollbar class="ps-show-limits">
                                <ul class=" list-group">
                                <li class="list-group-item">
                                    <div class="widget-content p-0">
                                    <?php if ($my_result) echo 'Data was sent to database.' ?>                                                
                                </li>   
                                </ul>
                </perfect-scrollbar>
            </div>
                  </form>
  </body>
</html>