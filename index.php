
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Home</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="stylesheet" href="http://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link type="text/css" rel="stylesheet" href="style.css">


<style>




</style>

  <style>
    /* Remove the navbar's default margin-bottom and rounded borders */ 
    .navbar {
      margin-bottom: 0;
      border-radius: 0;
            }
    
    /* Add a gray background color and some padding to the footer */
    footer {
      background-color: #f2f2f2;
      padding: 25px;
      margin-top: 280px;
    }
  </style>
</head>


<body>
  
<?php
session_start();
if(!isset($_SESSION['login_user'])){
header("location: login.php");
}

include_once "function.php";

  if(isset($_GET["page"]))
  $page = (int)$_GET["page"];
  else
  $page = 1;

  $setLimit = 5;
  $pageLimit = ($page * $setLimit) - $setLimit;




?>








<nav class="navbar navbar-default">
  <div class="container">
    <div class="navbar-header">
     <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
     
    
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav  navbar-canter">
        <li><a href="index.php">Home Page</a></li>
        <li><a href="#">My Article</a></li>
        <li><a href="#">XYZ</a></li>
      </ul>





   
      
      
      </ul>

  <ul class=" nav navbar-nav navbar-right ">
        <li class="dropdown"><a href="#" class="log-user" data-toggle="dropdown"  > <?php   echo $_SESSION['login_user'];  ?> 
            <span class="caret"></span> </a>
            <ul class="dropdown-menu">
              <li><a href="user-logout.php">Logout</a></li></ul>
          </li>
  
      </ul>
   

  

    </div>

 </nav>
</dv></div></nav><br><br><br><br>



<div>
<div class="container row">
<div class="col-sm-3">      
        <div class="portlet light profile-sidebar-portlet bordered">
          
           
            <div class="profile-usermenu">
                <ul class="nav">
                <li class="active" id="show_request_btn">
                     <a href="index.php">
                            <i class="icon-home"></i>Article </a>
                    </li>
                    <li  id="my_article">
                     <a href="my-article.php">
                            <i class="icon-home"></i> My Article </a>
                    </li>
                    <li id="show_all_post_btn">
                        <a href="add_article.php">
                            <i class="icon-settings"></i> Add New Article </a>
                    </li>
                    
                </ul>
            </div>
        </div>
    </div>



<!-- All Article -->

<div class="col-sm-9" id="#allarticle">

<div class=" text-center"> 
<h1 class="text-left">Articles:</h1><br>


<br>
</div>

<?php
//Retrieves data from MySQL
$dbhost = "localhost";
 $dbuser = "root";
 $dbpass = "";
 $db = "portal";
 //$uid = $_SESSION['login_user_id'];

 $conn = new mysqli($dbhost, $dbuser, $dbpass,$db) or die("Connect failed: %s\n". $conn -> error);

$data = mysqli_query($conn,"SELECT * FROM article WHERE `status`=3  ORDER BY created_date DESC LIMIT ".$pageLimit." , ".$setLimit."" ) or
die(mysql_error());


while($row = mysqli_fetch_assoc( $data ))
{
$title=$row['name'];
$content=$row['content'];
$uid=$row['user_id'];
$id=$row['id'];
$cid=$row['category_id'];
$date=$row['created_date'];
$data2 = mysqli_query($conn,"SELECT * FROM users WHERE id='$uid' ") or
die(mysql_error());
$row2 = mysqli_fetch_assoc( $data2 );
$uname=$row2['name'];
echo "<div class='' > <div style='font-size: 2.1em; color: #39afa0; text-transform: capitalize';
>".$title. "</div>";
 
echo "  <i class='fa fa-user' aria-hidden=true></i> <span style='text-transform: capitalize;'> &nbsp".$uname."</span><span style='color: #333333'><i class='fa fa-calendar calendar-icon'aria-hidden='true'></i>&nbsp ".$date."</span>";
echo  "<div class=blog-content>".$content."</div> <br><span><a href=detail.php?id=".$row['id']." style='color:red'>Read more</a></span><br><hr></div>  <br><br>";

}
  // Call the Pagination Function to load Pagination.
 echo "<div class=''>"; 
  echo displayPaginationBelow($setLimit,$page);
 echo "</div>"; 

 echo "</div>";
?>



<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-38304687-1']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>


</div>








</div>



<footer class="navbar navbar-default">
<div class="container">
     <ul class="nav navbar-nav  navbar-canter">
        <li><a href="index.php">Home Page</a></li>
        <li><a href="#">My Article</a></li>
        <li><a href="#">XYZ</a></li>
      </ul>
      
</div>
</footer>







</body>
</html>