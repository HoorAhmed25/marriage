<?php session_start(); require_once '../connection.php';?><html dir="rtl">
  <head>
       <title>وزارة الصحة و السكان - مبادرة فحوصات ما قبل الزواج</title>
       <meta charset="UTF-8">
        <link rel="shortcut icon" href="../img/logo.png" type="image/x-icon">
      <link rel="stylesheet" href="../css/all.min.css">
      <link rel="stylesheet" href="../css/animate.css">
      <link rel="stylesheet" href="../css/bootstrap.min.css">
      <link rel="stylesheet" href="../css/font-awesome.min.css">
	   <link rel="preconnect" href="https://fonts.gstatic.com">
       <link rel="stylesheet" href="../css/style.css">
       <link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
       <script src="../js/jquery-3.3.1.min.js"></script> 
              <script>
   $(document).ready(function() {

        $('#governorate').on('change', function() {

            var governorate = $(this).val();
            if (governorate) {
                $.get(
                    "ajax.php", {
                        governorate: governorate
                    },
                    function(data) {

                        $('#qism').html(data);

                    });

            } else {
                $('#qism').html('<option>اختر المحافظة اولا</option>')
            }

        });

    });

                
    </script>
	   <style>
           @import url('https://fonts.googleapis.com/css2?family=Cairo&display=swap');
        body{
            font-family: 'Cairo', sans-serif; !important
        }
		   p{
			   font-size: 27px;
			   font-weight: 400;
		   }
           .card-body{
               width: 90%;
           }
	   </style>
    </head>
    <body style="background-color:#eeeeee;">
      <nav>
    <div class="row">
    <div class="col-1"><img src="../img/Ministry_of_Health_and_Population_of_Egypt.png" class="img-fluid"
                    style="height:85px;  margin-top:10px;" /></div>
            <div class="col-2">
             <h6 class="text-white d-inline" style=" font-weight: bold;">
                  <br>جمهورية مصر العربية
                 <br>وزارة الصحة و السكان
              
                </h6>
            </div>
      
      <div class="dropdown show d-inline h3 col-4">
        <a class="h4 dropdown-toggle float-left ml-4 mt-4 text-white" href="#" role="button" id="dropdownMenuLink"
          data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <?php echo $_SESSION['unit']; ?>
        </a>
         <div class="dropdown-menu float-left" aria-labelledby="dropdownMenuLink">
                    <a class="dropdown-item text-center" href="../index.php">تسجيل خروج</a>

                </div>
      </div>
        <div class="col-1"></div>
         <div class="col-4 pt-1">
             
        
        <img src="../img/100million.png" class="img-fluid" style="height:80px;" />
             
        </div>
    </div>
  </nav>
        
        <div class="title text-center text-dark border-bottom mb-3" style="background-color:#ffffff;">
        <h1 class="heading">إضافة مستخدم</h1>
            
            </div>
        <div class="container">
	<div class="card-body container WOW fadeIn text-right">
    	<form name="login" action="" method="POST">
               <div class="row mt-3">
             
                     <div id="gov" class="mb-3 col-4">
                            <label for="gov" class="form-label">المحافظة :</label>
                            <select name="governorate" id="governorate" class="form-select w-75  form-control">
                                <option>--اختر--</option>
                                <?php
      
       $query= "select DISTINCT name from governorate";
       $do= mysqli_query($conn,$query)or die('error'.mysqli_error($conn));
       while($row=mysqli_fetch_array($do)){
      echo '<option value="'.$row['name'].'"  "selected">'.$row['name'].'</option>';
       }
       ?>
                            </select>
                        </div>
                
  <div id="qismDIV" class="mb-3 col-4">
                            <label for="qism" class="form-label">المركز :</label>
                            <select name="qism" id="qism" class="form-select w-75  form-control text-dark">
                                <option>--اختر--</option>
                                <?php
      
       $query= "select DISTINCT name from qism";
       $do= mysqli_query($conn,$query)or die('error'.mysqli_error($conn));
       while($row=mysqli_fetch_array($do)){
      echo '<option value="'.$row['name'].'"  "selected">'.$row['name'].'</option>';
       }
       ?>

                            </select>
                        </div>

                
                
              <div class="col-4">
 <label for="unit">اسم الوحدة :</label><br>
   <input type="text" name="unit" class="form-control w-75">
  </div>   
            </div>
             <div class="row mt-3">
                
                   <div class="col-4">
            <label for="username">اسم المستخدم:</label><br>
   <input type="text" name="username" class="form-control w-75"  required>
    
            </div>
                
    <div class="col-4">
    
 <label for="password">كلمة السر:</label><br>
   <input type="password" name="password" class="form-control w-75"  required>
  </div>
                
    <div class="col-4">       
            <label for="permission">الصلاحيات:</label>
    <select  name="permission" id="permission" class="form-control w-75">
    <option>--اختر--</option>
    <option  value="1">مدير </option>
    <option  value="2">مدخل بيانات</option> 
      <option  value="3">تقارير</option>   
    </select>
             </div>
                
            </div>
            <div class="row">  
        <div class="col-4 mt-3">     
    <label for="activation">نوع المستخدم :</label>
    <select  name="activation" id="activation" class="w-75 form-control">
    <option>--اختر--</option>
    <option  value="1">نشط </option>
    <option  value="2">غير نشط</option>  
    </select>
             </div>
   <div class="col-4" style="margin-top:28px;">
                 <button class="btn btn-lg text-white submitButton mt-3 float-right" type="submit" name="submitUser" style="margin-right:100px; paddint-top:5px; padding-bottom:5px;">تسجيل</button>
        </div>
                </div>
           
          
           
            
        
             </form>
            </div>
				</div>	
 
     
           
   
        
<?php
 
    
    if(isset($_POST['submitUser'])){
        $governorate = $_POST['governorate'];
        $qism  = $_POST['qism'];
        $unit = $_POST['unit'];
      $username = $_POST['username'];
        $password = $_POST['password'];
        $permission = $_POST['permission'];
        $activation = $_POST['activation'];
        
        $ins="INSERT INTO admins(governorate,qism,unit,username,password,permission,activation) VALUES ('$governorate','$qism','$unit','$username','$password','$permission','$activation')";
$query= mysqli_query($conn,$ins) or die("error:".mysqli_error($conn));
        if($query) 
{  
   echo '<script type="text/javascript">';
     echo ' alert("تم إضافة المستخدم");';
   
    echo '</script>';
}
else {
     echo '<script type="text/javascript">';
     echo ' alert("عفواً! لم يتم التسجيل");';
    echo'window.location.href="users.php";';
    echo '</script>';

}  }
        
    
    
    ?>

        <footer style="position:fixed; margin-top:3px;">
        <p style="font-size:19px;"> &copy; 2021 جميع الحقوق محفوظة لوزارة الصحة و السكان المصرية. </p>
        
        </footer>

        
         
        <script src="../js/popper.min.js"></script>
        <script src="../js/bootstrap.min.js"></script>  
        <script src="../js/wow.min.js"></script> 
        <script>new WOW().init();</script> 
        <script src="../js/mine.js"></script>
    </body>
</html>