<!DOCTYPE html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Document</title>
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<style>
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
  border:1px solid gray;
}
th{
background:#eeeeee;

}
td,th {
  border-bottom: 1px dashed #eeeeee;
  border-right: 1px dashed #eeeeee;
  text-align: center;
  padding: 10px;
  font-size:12px;
}

.top_header{
border:1px solid gray;
 display:flex;
justify-content:space-between;
}

.covid{
	text-align:center;
	
}

.bottom_pic{

	
}


@font-face {
  font-family: "Bangla";
  src: url("dompdf\lib\fonts\SolaimanLipi.ttf");
}

.para{
	
font-family: "Bangla";
}

h3{
    margin:0;
    padding:0;
}
.header{
  
}

</style>
</head>
<body>
  <div class="header"> 
<img src="pdf_img/verify.png"  style="width:730px; margin-left:-18px;">

</div>


<div class="content">
<table>
    <tr>
    <td colspan="4"> <p style="font-weight:bold;">  COVID-19 Vaccination Certificate </p> </td>
   
   
   
  </tr>
  <tr>
    <th colspan="2"> Beneficiary Details</th>
   
   
    <th colspan="2" >Vaccination Details </th>
  </tr>
  
  <tr>
    <td> Certificate No:  </td>
    <td>  <?php echo $user['certi_no']; ?>  </td>
    <td>Date of Vaccination (Dose 1) </td>
    <td>  <?php echo $user['doseone_date']; ?></td>
  </tr> 
  <tr>
    <td> NID Number </td>
    <td>  <?php echo $user['national_id']; ?> </td>
    <td> Name of Vaccine (Dose 1)  </td>
    <td> <?php echo $user['doseone_name']; ?> </td>
  </tr>
  <tr>
    <td> Passport No: </td>
    <td>  <?php echo $user['passport_no']; ?> </td>
    <td> Date of Vaccination (Dose 2): </td>
    <td>  <?php echo $user['dosetwo_date']; ?> </td>
  </tr>
  <tr>
    <td>Nationality: </td>
    <td> <?php echo $user['nationality']; ?> </td>
    <td> Name of Vaccine (Dose 2) </td>
    <td> <?php echo $user['dosetwo_name']; ?> </td>
  </tr>
  <tr>
    <td>Date of Birth: </td>
    <td> <?php echo $user['date_birth']; ?> </td>
    <td> Vaccination Center: </td>
    <td> <?php echo $user['vacc_center']; ?>  </td>
  </tr>
  <tr>
    <td>Gender </td>
    <td>  <?php echo $user['gender']; ?> </td>
    <td> Vaccinated By: </td>
    <td> <?php echo $user['vacc_by']; ?> </td>
  </tr>
 
 

  <tr>
  <td colspan="4" style="text-align:center; background:#eeeeee;">  
 In cooperation with
  </td>
  
  </tr>
  
  
  <tr>
  <td colspan="4" style="text-align:center;">  
 <img src="pdf_img/verify-foo.png" style="width:700px;" >

  </td>
  
  </tr>
  
</table>
 </div>

</body>
</html>

