<?php session_start (); include '../connection.php'; ?><html dir="rtl">

<head>
    <title>وزارة الصحة و السكان - مبادرة فحوصات ما قبل الزواج</title>
    <meta charset="UTF-8">
    <link rel="shortcut icon" href="../img/logo.png" type="image/x-icon">
    <link rel="stylesheet" href="../css/all.min.css">
    <link rel="stylesheet" href="../css/animate.css">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/font-awesome.min.css">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/print.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">

</head>

<body style="color:black;">
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
                    <a class="dropdown-item border-bottom text-center" href="home.php">الرئيسية</a>
                    <a class="dropdown-item border-bottom text-center" href="search.php">بحث</a>
                    <a class="dropdown-item text-center" href="../index.php">تسجيل خروج</a>

                </div>
      </div>
        <div class="col-1"></div>
         <div class="col-4 pt-1">
             
        
        <img src="../img/100million.png" class="img-fluid" style="height:80px;" />
             
        </div>
    </div>
  </nav>
    <?php
require_once '../connection.php';
if(isset($_POST['submit'])){
    $date = date("Y/m/d");
    $serial = mt_rand(100000, 999999).date("m-Y");
    $location = $_POST['location'];
    $governorate = $_POST['gov'];
    $qism = $_POST['qism'];
    $name = $_POST['uname'];
    $nationality = $_POST['nationality'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $marriageAddress = $_POST['marriageAddress'];
    $ifRelate = $_POST['ifRelate'];
    $previousMarriage = $_POST['previousMarriage'];
    $childern = $_POST['childern'];
    $geneticDiseases = $_POST['geneticDiseases'];
    $height = $_POST['height'];
    $weight = $_POST['weight'];
    $bmi = $weight / (($height/100)*($height/100));
    $diabetes = $_POST['diabetes'];
    $bloodPressure =$_POST['bloodPressure'];
    $diabetesCheck = $_POST['diabetesCheck'];
    $systolic = $_POST['pressureCheckdown'];
    $diastolic = $_POST['pressureCheckup'];
    $abo = $_POST['abo'];
    $rh = $_POST['rh'];
    $hb= $_POST['hb'];
    $hbsag = $_POST['hbsag'];
    $hcv = $_POST['hcv'];
    $hiv = $_POST['hiv'];
     $age = $_POST['age'];
     $egender = $_POST['gender'];
     if($childern == " "){
        $childern = "لا يوجد";
    }
    if($geneticDiseases == " "){
        $geneticDiseases = "لا يوجد";
    }
if($nationality == 'مصرى'){
      $nationalId = $_POST['nationalId'];
$ins="INSERT INTO users(country,date,serial,uname, nationality, nationalId, phone, gender, age, address, marriageAddress, diabetes, bloodPresure, ifRelate, previousMarriage, childern, geneticDiseases, height, weight, bmi, diabetesCheck, systolic,diastolic, abo, rh, hb, hbsag, hcv, hiv,location,governorate,qism)VALUES ('مصرى','$date','$serial','$name','$nationality','$nationalId','$phone','$egender','$age','$address',
'$marriageAddress','$diabetes','$bloodPressure','$ifRelate','$previousMarriage','$childern','$geneticDiseases','$height','$weight','$bmi','$diabetesCheck','$systolic','$diastolic','$abo','$rh','$hb','$hbsag','$hcv','$hiv','$location','$governorate','$qism')";
$query= mysqli_query($conn,$ins) or die("error:".mysqli_error($conn));
if($query) 
{ 
 
    $user = "SELECT * FROM users WHERE nationalId = '$nationalId' And nationalId != '' ORDER BY date DESC limit 1";
       $query = mysqli_query( $conn,$user) or die('error:'.mysqli_error($conn));
       $result = mysqli_fetch_array($query);
       $count= mysqli_num_rows($query);
          if($count > 0){
                 
              
       do{
		?>
   <section class="container mt-3">
  <div class="pic" style="display:block;">
     <canvas id="myCanvas" width="120" height="120"
style="border:1px solid #d3d3d3;">
Your browser does not support the canvas element.
</canvas><br><span>ختم شعار الجمهورية</span>
      </div>
<div class="row">
        <div class="col-3 mr-4 font-weight-bold"><p class="text-right"><?php echo "تاريخ الإصدار : " . date("Y/m/d"); ?></p></div>
            <div class="col-2"></div>
        	<div class="col-5 font-weight-bold"> <p class="text-right"><?php echo "اسم الوحدة: " . $_SESSION['unit']; ?></p></div>
       
        </div>
               <h4 class="container-fluid headOfPersonal mb-0 pb-0">البيانات الأساسية 
            </h4>
            
<section>
    <div id="form-container" class="container">
        <div class="row">
             
             <div class="col-5">
                  <p  style="font-size: 18px; font-family: cairo;">
                      الاسم : <span class="font-weight-bold"><?php echo $result['uname'];?>  </span></p>
             </div>
                 <div class="col-4"> 
                     <p  style="font-size: 18px; font-family: cairo;">
                         الرقم القومى :   <span class="font-weight-bold"><?php echo $result['nationalId'];?></span></p></div>
              <div class="col-2"> 
                     <p style="font-size: 18px; font-family: cairo;">
             النوع :   <span class="font-weight-bold"><?php echo $result['gender'];?></span>
        </p>
            </div>

        
        </div>
        <div class="row">
              <div class="col-5">
                  
              <p style="font-size: 18px; font-family: cairo;">  الجنسية : <span class="font-weight-bold"><?php echo $result['country'];?></span></div>
                  
                  
                  <div class="col-4">
                      <p  style="font-size: 18px; font-family: cairo;">
                          السن :  <span class="font-weight-bold"><?php echo $result['age'];?></span></p>
                          
            </div>
            <div class="col-3">
                      <p  style="font-size: 18px; font-family: cairo;">
            تليفون :   <span class="font-weight-bold"><?php echo $result['phone'];?></span>
        </p>
            </div>
       
         </div>
           
                         <div class="row">
                                  <div class="col-5">
                                      <p  style="font-size: 18px; font-family: cairo;">  العنوان بالبطاقة : <span class="font-weight-bold"><?php echo $result['address'];?>  </span></p></div>
                  
                  <div class="col-5">
              <p  style="font-size: 18px; font-family: cairo;">
           عنوان سكن الزوجية :   <span class="font-weight-bold"><?php echo $result['marriageAddress'];?></span>
        </p>
            </div>
                       
    </div>
    </div>
     <hr>
     <h4 class="container-fluid headOfMarriage mb-0 pb-0">بيانات الزواج 
      
            </h4>
    <div class="form-container-Marriage text-right mb-3 pb-3" style="background-color:#eeeeee;">
          
                     <div class="row">
                                       <div class="col-4">
                                           <p class="mr-3" style="font-size: 18px; font-family: cairo;"> هل توجد قرابة مع الطرف الاخر : <span class="font-weight-bold"><?php echo $result['ifRelate'];?>  </span></p></div>
                         
                         <div class="col-5">
                         
                         <p style="font-size: 18px; font-family: cairo;">
          هل يوجد زواج سابق :   <span class="font-weight-bold"><?php echo $result['previousMarriage'];?></span>
        </p>
            </div>
                     
                                 
</div>        
                <div class="row"> 
                               <div class="col-4">
                                   <p  class="mr-3" style="font-size: 18px; font-family: cairo;"> هل يوجد اطفال من الزواج السابق : <span class="font-weight-bold"><?php echo $result['childern'];?>  </span></p></div>
                    <div class="col-5">
                         <p  style="font-size: 18px; font-family: cairo;">
         هل يوجد لدى الاطفال اى امراض وراثية :   <span class="font-weight-bold"><?php echo $result['geneticDiseases'];?></span>
                    
        </p>
        </div>
            </div>       
             </div>	
    <hr>
    <h4 class="container-fluid headOfRep mb-0 pb-0">الفحوصات الطبية
            </h4>
        <div class="form-container-rep text-right mb-3 pb-3" style="background-color:#eeeeee;">
            
            
               <div class="row">
                    <div class="col-4">
                        <p class="mr-3"  style="font-size: 18px; font-family: cairo;"> الطول(سم) : <span class="font-weight-bold"><?php echo $result['height']  ;?>  </span></p></div>
                 <div class="col-4">
                        <p  style="font-size: 18px; font-family: cairo;">   
         الوزن(كجم) :   <span class="font-weight-bold"><?php echo $result['weight'];?></span>
                     </p></div>
                   
                           <div class="col-4">
                        <p  style="font-size: 18px; font-family: cairo;"> 
                    BMI: <span class="font-weight-bold" ><?php echo $result['bmi'];?>  </span>     
        </p>
            </div>
   
                    </div>
                
           
                     <div class="row">
                               <div class="col-4">
              <p class="mr-3" style="font-size: 18px; font-family: cairo;"> 
                  
                  RH :  <span class="font-weight-bold"><?php echo $result['rh'];?>  </span>
                                   </p></div>
                 <div class="col-4">
              <p style="font-size: 18px; font-family: cairo;"> 
                HBsAg : <span class="font-weight-bold"><?php echo $result['hbsag'];?>  </span> 
                     </p></div>
                      <div class="col-4">
              <p  style="font-size: 18px; font-family: cairo;">    
             Hb :   <span class="font-weight-bold" ><?php echo $result['hb'];?></span>
                          </p></div>
                    
            </div>
              <div class="row">
                       <div class="col-4">
              <p class="mr-3" style="font-size: 18px; font-family: cairo;"> هل يوجد إصابة بمرض ضغط الدم : <span class="font-weight-bold"><?php echo $result['bloodPresure'];?>  </span>
                           </p></div>
                  <div class="col-4">
              <p  style="font-size: 18px; font-family: cairo;">
                  الضغط :   <span class="font-weight-bold"><?php echo $result['systolic'];?>/<?php echo $result['diastolic'];?></span></p></div>
                  
                 <div class="col-4">
              <p  style="font-size: 18px; font-family: cairo;"> 
              Anti-HIV :   <span class="font-weight-bold"><?php echo $result['hiv'];?></span>    
                  
                  
                  
                
        </p>
            </div>	
                  
            </div> 
           
            <div class="row">
                        <div class="col-4">
              <p  class="mr-3" style="font-size: 18px; font-family: cairo;">
                  هل يوجد إصابة بمرض السكر : <span class="font-weight-bold"><?php echo $result['diabetes'];?> 
                  </span></p></div>
                  
                  <div class="col-4">
              <p style="font-size: 18px; font-family: cairo;">
                  نتيجة فحص السكر(العشوائى) : <span class="font-weight-bold"><?php echo $result['diabetesCheck'];?>  </span></p></div>
                 <div class="col-4">
              <p style="font-size: 18px; font-family: cairo;">
        Anti-HCV : <span class="font-weight-bold"><?php echo $result['hcv'];?>  </span>
                  
                  
                  
                
        </p>
            </div>
                       <div class="col-2">
              <p class="mr-3" style="font-size: 18px; font-family: cairo;">
                  فصيلة الدم : <span class="font-weight-bold" ><?php echo $result['abo'];?>  </span>
                  
                  
                  
                
        </p>
            </div>

</div>
			       
		  
    </div>
         <hr>
     <h4 class="container-fluid headOfMarriage mb-1 pb-1"> إقرار المنتفع بإعالمه بنتيجة الفحص وتوصيات الطبيب 
            </h4>
<div class="form-container-Marriage text-right" style="background-color:#eeeeee;">
       
           <div class="row pt-2">
       
          <div class="col-4">
           <p class="mr-3"> اسم الممرضة : ----------------------</p>
            <p class="mr-3"> اسم الطبيب : ----------------------</p>
            <p class="mr-3"> مدير الوحدة  : ----------------------</p>
           </div>
           <div class="col-4">
               <p class="mr-3"> التوقيع : ----------------------</p> 
               <p class="mr-3"> التوقيع : ----------------------</p> 
               <p class="mr-3"> التوقيع : ----------------------</p> 
           </div>
               
              <div class="col-3">
                 <canvas id="myCircle" width="190" height="140"></canvas>
           <p style="padding-top:2px; padding-right:45px;">ختم الوحدة</p>
           </div>  
               
               
       </div>
       
        <hr style="color:black;">
       <div class="row pt-2">
           <div class="col-6">
               <p class="mr-3" style="font-size: 18px; font-family: cairo;">  أقر أنا الموقع أدناه : <span class="font-weight-bold"><?php echo $result['uname'];?>  </span></p></div>
            <div class="col-4">
               <p class="mr-3" style="font-size: 18px; font-family: cairo;">   رقم القومى :   <span class="font-weight-bold"><?php echo $result['nationalId'];?>  </span></p></div>
       </div>
         
           
    <p class="mr-3">بأنه قد تم إعلامى بنتيجة الفحص الطبى والتوصيات الطبية المذكورة سابقا وقد تلقيت المشورة الخاصة بحالتى الصحية وألتزم بإعلام طرف الزواج الأخر 
قبل إجراءات الزواج وأصبحت بذلك مسئول عما يترتب على ذلك دون أدنى مسئولية على المنشأة الصحية والفريق الطبى الذى يمثلها  .</p><br>
         
       <div class="row">
          <div class="col-4 border-left">
           <p class="mr-3"> الاسم (رباعى) : ----------------------</p>
             <p class="mr-3"> التوقيع : ----------------------</p> 
           </div>
           <div class="col-3 border-left">
                 <canvas id="myCircle1" width="190" height="140"></canvas>
           <p style="padding-top:10px; padding-right:35px;">بصمة الإبهام </p>
           </div>
		   <div class="col-4">
		   <p class="mr-3"> اسم الطرف الاخر(رباعى) : ------------------</p>
             <p class="mr-3"> توقيع الطرف الاخر  : ------------------</p> 
		    <p class="mr-3"> الرقم القومى للطرف الاخر  : ----------------</p> 
		   </div>
       
       </div>
       
      <div class="row">
    <div class="col-sm-4"> <p class="mr-3" style="color:red;">*هذه الوثيقة صالحة لمدة ثلاثة اشهر من تاريخ الإصدار</p></div>
          
          <div class="col-sm-4"></div>
   <div class="col-sm-4"> <p class="ml-1" style="color:black; font-size:12px;">SN:<?php echo $result['serial']; ?></p></div>
    </div>
	  
    </div>
	   </section>
        </section>
   <form name="editForm" method="post" action="editData.php">
    <button class="btn btn-lg text-white submitButton ml-2" type="submit" name="print" onclick="window.print()"
        id="print-button">طباعة </button>
     
    <input type="text" name="serial" value="<?php echo $result['serial']; ?>" style="display:none;">
          <button class="btn btn-lg text-white editButton ml-2" type="submit" name="edit" id="edit-button">تعديل </button>
   
    <button class="btn btn-lg text-white backButton" type="button" name="back" style="margin-left:200px;">
        <a href="form.php">رجوع</a></button>
        </form>
    <?php } while($result=mysqli_fetch_array($query));
          }
}
    ?>
    <?php
   echo '<script type="text/javascript">';
     echo ' alert("تم التسجيل بنجاح");';
    echo '</script>';

 }
    ?>

    <?php
if($nationality == 'غير مصرى'){
   
      $FnationalId = $_POST['FnationalId'];
    $country = $_POST['country'];
   
$ins="INSERT INTO users(date,serial,uname, nationality,country, FnationalId, phone, gender, age, address, marriageAddress, diabetes, bloodPresure, ifRelate, previousMarriage, childern, geneticDiseases, height, weight, bmi, diabetesCheck, systolic,diastolic, abo, rh, hb, hbsag, hcv, hiv)VALUES ('$date','$serial','$name','$nationality','$country','$FnationalId','$phone','$egender','$age','$address',
'$marriageAddress','$diabetes','$bloodPressure','$ifRelate','$previousMarriage','$childern','$geneticDiseases','$height','$weight','$bmi','$diabetesCheck','$systolic','$diastolic','$abo','$rh','$hb','$hbsag','$hcv','$hiv')";
$query= mysqli_query($conn,$ins) or die("error:".mysqli_error($conn));
if($query) 
{  
 
       $user = "SELECT * FROM users WHERE FnationalId = '$FnationalId ' ORDER BY date DESC LIMIT 1";
       $query = mysqli_query( $conn,$user) or die('error:'.mysqli_error($conn));
       $result = mysqli_fetch_array($query);
      do{?>
     <section class="container mt-3">
      <div class="pic" style="display:none;">
     <canvas id="myCanvas" width="120" height="120"
style="border:1px solid #d3d3d3;">
Your browser does not support the canvas element.
</canvas><br><span>ختم شعار الجمهورية</span>
      </div>
<div class="row">
        <div class="col-3 mr-4 font-weight-bold"><p class="text-right"><?php echo "تاريخ الإصدار : " . date("Y/m/d"); ?></p></div>
            <div class="col-2"></div>
        	<div class="col-5 font-weight-bold"> <p class="text-right"><?php echo "اسم الوحدة: " . $_SESSION['unit']; ?></p></div>
       
        </div>
               <h4 class="container-fluid headOfPersonal mb-0 pb-0">البيانات الأساسية 
            </h4>
            
<section>
    <div id="form-container" class="container">
        <div class="row">
         
             
             <div class="col-5">
                  <p  style="font-size: 18px; font-family: cairo;">
                      الاسم : <span class="font-weight-bold"><?php echo $result['uname'];?>  </span></p>
             </div>
                 <div class="col-4"> 
                     <p  style="font-size: 18px; font-family: cairo;">
                        رقم جواز السفر :   <span class="font-weight-bold"><?php echo $result['FnationalId'];?></span></p></div>
              <div class="col-2"> 
                     <p style="font-size: 18px; font-family: cairo;">
             النوع :   <span class="font-weight-bold"><?php echo $result['gender'];?></span>
        </p>
            </div>

        
        </div>
        <div class="row">
              <div class="col-5">
                  
              <p style="font-size: 18px; font-family: cairo;">  بلد الجنسية : <span class="font-weight-bold"><?php echo $result['country'];?></span></div>
                  
                  
                  <div class="col-4">
                      <p  style="font-size: 18px; font-family: cairo;">
                          السن :  <span class="font-weight-bold"><?php echo $result['age'];?></span></p>
                          
            </div>
            <div class="col-3">
                      <p  style="font-size: 18px; font-family: cairo;">
            تليفون :   <span class="font-weight-bold"><?php echo $result['phone'];?></span>
        </p>
            </div>
       
         </div>
           
                         <div class="row">
                                  <div class="col-5">
                                      <p  style="font-size: 18px; font-family: cairo;">  العنوان بالبطاقة : <span class="font-weight-bold"><?php echo $result['address'];?>  </span></p></div>
                  
                  <div class="col-5">
              <p  style="font-size: 18px; font-family: cairo;">
           عنوان سكن الزوجية :   <span class="font-weight-bold"><?php echo $result['marriageAddress'];?></span>
        </p>
            </div>
                       
    </div>
    </div>
     <hr>
     <h4 class="container-fluid headOfMarriage mb-0 pb-0">بيانات الزواج 
      
            </h4>
    <div class="form-container-Marriage text-right mb-3 pb-3" style="background-color:#eeeeee;">
          
                     <div class="row">
                                       <div class="col-4">
                                           <p class="mr-3" style="font-size: 18px; font-family: cairo;"> هل توجد قرابة مع الطرف الاخر : <span class="font-weight-bold"><?php echo $result['ifRelate'];?>  </span></p></div>
                         
                         <div class="col-5">
                         
                         <p style="font-size: 18px; font-family: cairo;">
          هل يوجد زواج سابق :   <span class="font-weight-bold"><?php echo $result['previousMarriage'];?></span>
        </p>
            </div>
                     
                                 
</div>        
                <div class="row"> 
                               <div class="col-4">
                                   <p  class="mr-3" style="font-size: 18px; font-family: cairo;"> هل يوجد اطفال من الزواج السابق : <span class="font-weight-bold"><?php echo $result['childern'];?>  </span></p></div>
                    <div class="col-5">
                         <p  style="font-size: 18px; font-family: cairo;">
         هل يوجد لدى الاطفال اى امراض وراثية :   <span class="font-weight-bold"><?php echo $result['geneticDiseases'];?></span>
                    
        </p>
        </div>
            </div>       
             </div>	
    <hr>
    <h4 class="container-fluid headOfRep mb-0 pb-0">الفحوصات الطبية
            </h4>
         <div class="form-container-rep text-right mb-3 pb-3" style="background-color:#eeeeee;">
            
            
               <div class="row">
                    <div class="col-4">
                        <p class="mr-3"  style="font-size: 18px; font-family: cairo;"> الطول(سم) : <span class="font-weight-bold"><?php echo $result['height']  ;?>  </span></p></div>
                 <div class="col-4">
                        <p  style="font-size: 18px; font-family: cairo;">   
         الوزن(كجم) :   <span class="font-weight-bold"><?php echo $result['weight'];?></span>
                     </p></div>
                   
                           <div class="col-4">
                        <p  style="font-size: 18px; font-family: cairo;"> 
                    BMI: <span class="font-weight-bold" ><?php echo $result['bmi'];?>  </span>     
        </p>
            </div>
   
                    </div>
                
           
                     <div class="row">
                               <div class="col-4">
              <p class="mr-3" style="font-size: 18px; font-family: cairo;"> 
                  
                  RH :  <span class="font-weight-bold"><?php echo $result['rh'];?>  </span>
                                   </p></div>
                      <div class="col-4">
              <p  style="font-size: 18px; font-family: cairo;">
                  فصيلة الدم: <span class="font-weight-bold" ><?php echo $result['abo'];?>  </span>
                  
                  
                  
                
        </p>
            </div>
                      <div class="col-4">
              <p  style="font-size: 18px; font-family: cairo;">    
             Hb :   <span class="font-weight-bold" ><?php echo $result['hb'];?></span>
                          </p></div>
                    
            </div>
            
            <div class="row">
            <div class="col-4">
              <p class="mr-3" style="font-size: 18px; font-family: cairo;"> 
                hbsAg : <span class="font-weight-bold"><?php echo $result['hbsag'];?>  </span> 
                     </p></div>
                <div class="col-4">
              <p  style="font-size: 18px; font-family: cairo;"> 
              Anti-HIV :   <span class="font-weight-bold"><?php echo $result['hiv'];?></span>    
                  
                  
                  
                
        </p>
            </div>	
                <div class="col-4">
              <p style="font-size: 18px; font-family: cairo;">
        Anti-HCV : <span class="font-weight-bold"><?php echo $result['hcv'];?>  </span>
                  
                  
                  
                
        </p>
            </div>
            </div>
            
            
              <div class="row">
                       <div class="col-4">
              <p class="mr-3" style="font-size: 18px; font-family: cairo;"> هل يوجد إصابة بمرض ضغط الدم : <span class="font-weight-bold"><?php echo $result['bloodPresure'];?>  </span>
                           </p></div>
                  <div class="col-4">
              <p  style="font-size: 18px; font-family: cairo;">
                  الضغط :   <span class="font-weight-bold"><?php echo $result['systolic'];?>/<?php echo $result['diastolic'];?></span></p></div>
                  
             
                  
            </div> 
           
            <div class="row">
                        <div class="col-4">
              <p  class="mr-3" style="font-size: 18px; font-family: cairo;">
                  هل يوجد إصابة بمرض السكر : <span class="font-weight-bold"><?php echo $result['diabetes'];?> 
                  </span></p></div>
                  
                  <div class="col-4">
              <p style="font-size: 18px; font-family: cairo;">
                  نتيجة فحص السكر(العشوائى) : <span class="font-weight-bold"><?php echo $result['diabetesCheck'];?>  </span></p></div>
             
                  

</div>
			       
		  
    </div>
         <hr>
     <h4 class="container-fluid headOfMarriage mb-1 pb-1"> إقرار المنتفع بإعالمه بنتيجة الفحص وتوصيات الطبيب 
            </h4>
  <div class="form-container-Marriage text-right" style="background-color:#eeeeee;">
       
           <div class="row pt-2">
       
          <div class="col-4">
           <p class="mr-3"> اسم الممرضة : ----------------------</p>
            <p class="mr-3"> اسم الطبيب : ----------------------</p>
            <p class="mr-3"> مدير الوحدة  : ----------------------</p>
           </div>
           <div class="col-4">
               <p class="mr-3"> التوقيع : ----------------------</p> 
               <p class="mr-3"> التوقيع : ----------------------</p> 
               <p class="mr-3"> التوقيع : ----------------------</p> 
           </div>
               
              <div class="col-3 ">
                 <canvas id="myCircle" width="190" height="140"></canvas>
           <p style="padding-top:2px; padding-right:35px;">ختم الوحدة</p>
           </div>  
               
               
       </div>
       
        <hr style="color:black;">
       <div class="row pt-2">
           <div class="col-6">
               <p class="mr-3" style="font-size: 18px; font-family: cairo;">  أقر أنا الموقع أدناه : <span class="font-weight-bold"><?php echo $result['uname'];?>  </span></p></div>
            <div class="col-4">
               <p class="mr-3" style="font-size: 18px; font-family: cairo;">   رقم جواز السفر :   <span class="font-weight-bold"><?php echo $result['FnationalId'];?>  </span></p></div>
       </div>
         
           
    <p class="mr-3">بأنه قد تم إعلامى بنتيجة الفحص الطبى والتوصيات الطبية المذكورة سابقا وقد تلقيت المشورة الخاصة بحالتى الصحية وألتزم بإعلام طرف الزواج الأخر 
قبل إجراءات الزواج وأصبحت بذلك مسئول عما يترتب على ذلك دون أدنى مسئولية على المنشأة الصحية والفريق الطبى الذى يمثلها  .</p><br>
         
       <div class="row">
          <div class="col-4 border-left">
           <p class="mr-3"> الاسم (رباعى) : ----------------------</p>
             <p class="mr-3"> التوقيع : ----------------------</p> 
           </div>
           <div class="col-3 border-left">
                 <canvas id="myCircle1" width="190" height="140"></canvas>
           <p style="padding-top:10px; padding-right:35px;">بصمة الإبهام </p>
           </div>
		   <div class="col-4">
		   <p class="mr-3"> اسم الطرف الاخر(رباعى) : ------------------</p>
             <p class="mr-3"> توقيع الطرف الاخر  : ------------------</p> 
		    <p class="mr-3"> الرقم القومى للطرف الاخر  : ----------------</p> 
		   </div>
       
       </div>
        <div class="row">
    <div class="col-sm-4"> <p class="mr-3" style="color:red;">*هذه الوثيقة صالحة لمدة ثلاثة اشهر من تاريخ الإصدار</p></div>
          
          <div class="col-sm-4"></div>
   <div class="col-sm-4"> <p class="ml-1" style="color:black; font-size:12px;">SN:<?php echo $result['serial']; ?></p></div>
    </div>
    </div>
	   </section>
        </section>
    <button class="btn btn-lg text-white submitButton" type="submit" name="print" onclick="window.print()"
        id="print-button">طباعة </button>
    <button class="btn btn-lg text-white editButton" type="submit" name="edit" onclick="location.href = 'editData.php';" id="edit-button">تعديل </button>
    <button class="btn btn-lg text-white backButton" type="button" name="back" style="margin-left:200px;">
        <a href="form.php">رجوع</a></button>
    <?php } while($result=mysqli_fetch_array($query));
          }?>

    <?php
   echo '<script type="text/javascript">';
     echo ' alert("تم التسجيل بنجاح");';
    echo '</script>';

 }
}
        ?>

    <script src="../js/jquery-3.3.1.min.js"></script>
    <script src="../js/popper.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/wow.min.js"></script>
    <script>
    new WOW().init();
    </script>
    <script src="../js/mine.js"></script>
      <script>
        
      var canvas = document.getElementById("myCanvas");
var ctx = canvas.getContext("2d");
ctx.font = "15px Arial";
ctx.fillText("",10,50);
        
         var c = document.getElementById("myCircle");
var ctx = c.getContext("2d");
ctx.beginPath();
ctx.arc(100, 75, 50, 0, 2 * Math.PI);
ctx.stroke();   
            
       
         var c = document.getElementById("myCircle1");
var ctx = c.getContext("2d");
ctx.beginPath();
ctx.arc(100, 75, 50, 0, 2 * Math.PI);
ctx.stroke();   
                
        </script>
</body>

</html>