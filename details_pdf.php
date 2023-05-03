<!DOCTYPE html>
<html>
<head>
<style>
 .relative {
  position: relative;
  width:100%;
  min-height:1000px;
  background-image:url("pdf_img/banner-001.jpeg");
background-size: 100%;
background-repeat: no-repeat;  
} 

.relative_bottom {
  position: relative;
  width:90%;
  min-height:1000px;
  background-image:url("pdf_img/banner-002.jpg");
  background-size: 90%;
  background-repeat: no-repeat;  
}
.qr_img{
    position:absolute;
    top:110px;
    left:270px;
}
.qr_img2{
   position:absolute;
    top:180px;
    left:120px;   
}
.certi_no{
   position:absolute;
   top:36%;
  left:28%;   
}
.certi_no2{
  position:absolute;
   top:18%;
  left:25%;   
}

.nid{
  position:absolute;
   top:40%;
  left:28%;     
}
.pass{
  position:absolute;
   top:44%;
  left:28%;   
}

.nationality{
  position:absolute;
   top:47%;
  left:28%;    
}
.name{
  position:absolute;
   top:51%;
  left:28%;   
}
.date_birth{
  position:absolute;
   top:54.5%;
  left:28%;   
}
.gender{
  position:absolute;
   top:58%;
  left:28%;   
}

.doseone_date{
   position:absolute;
   top:36%;
  right:12%;     
}

.doseone_name{
   position:absolute;
   top:40%;
  right:12%;     
}

.dosetwo_date{
  position:absolute;
   top:43.5%;
  right:12%;    
}

.dosetwo_name{
   position:absolute;
   top:47%;
  right:12%;   
}
.dosethree_name{
  position:absolute;
   top:66%;
  left:42%;  
}

.dosethree_date{
    font-size:12px;
   position:absolute;
   top:66.5%;
  left:55%;    
}
.vacc_center{
    width:100px;
    min-height:50px;

  position:absolute;
   top:52%;
  right:12%;   
}

.vacc_by{
  position:absolute;
   top:58%;
  right:12%;     
}
</style>
</head>
<body>

<section class="container"> 
    <div class="relative">
            <div class="qr_img">
                 <img src="<?php echo $user['qr_code']; ?>" style="height:170px;">
            </div>
            <div class="doseone_date">
                <?php echo $user['doseone_date']; ?>
            </div>
            
            <div class="certi_no">
                 <?php echo $user['certi_no']; ?> 
            </div>
            
            <div class="nid">
                <?php echo $user['national_id']; ?> 
            </div>
            <div class="pass">
                <?php echo $user['passport_no']; ?>
            </div>
            <div class="nationality">
                
                 <?php echo $user['nationality']; ?>
            </div>
            
            <div class="date_birth">
                <?php echo $user['date_birth']; ?>
            </div>
            <div class="gender">
                <?php echo $user['gender']; ?>
            </div>
            
            <div class="name">
                <?php echo $user['name']; ?>
            </div>
            
            
            <div class="doseone_name">
                <?php echo $user['doseone_name']; ?>
            </div>
            
            
            <div class="dosetwo_date">
                <?php echo $user['dosetwo_date']; ?>
            </div>
            
            <div class="dosetwo_name">
                <?php echo $user['dosetwo_name']; ?>
            </div>
            
            <div class="dosethree_name">
                <?php echo $user['dosethree_name']; ?>
            </div>
            <div class="dosethree_date">
                <?php echo $user['dosethree_date']; ?>
            </div>
            
            
            <div class="vacc_center">
                <?php echo $user['vacc_center']; ?>
            </div>
            
            <div class="vacc_by">
                <?php echo $user['vacc_by']; ?>
            </div>
    </div>
</section>
<h1> </h1>

<section class="container"> 
    <div class="relative_bottom">
         <div class="qr_img2">
                 <img src="<?php echo $user['qr_code']; ?>" style="height:100px;">
            </div>    
    </div>
    
     <div class="certi_no2">
                 <?php echo $user['certi_no']; ?> 
            </div>
</section>
</body>
</html>


