<!DOCTYPE html>
<head>
<title>Function and results</title>
<meta name="viewport" content="width=device-width, initial-scale=1">

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<style>
table{

margin:auto;
font-size:17px;	
}
td{
padding-left:30px !important;	
}
th{
text-align:center;    
}

</style>


</head>
<body>


<?php


 if(isset($_POST["Import"])){
     
		
		$filename=$_FILES["file"]["tmp_name"];		

		 if($_FILES["file"]["size"] > 0)
		 {
		     include('conexioninclude.php');
		  	$file = fopen($filename, "r");
		  	fgetcsv($file, 10000, ",");
		  	$add=0;
	       while (($getData = fgetcsv($file, 10000, ",")) !== FALSE)
	         {
	  /*
	  The csv file downloaded by me includes these fields:id, first_name,last_name,email,gender,ip_address, country. So these are the fields i will use in the database, where they file will be imported
	  I will let the database create the ID, as a primary key, for each row, so I wont enter the Id valued from the file
	 Some very basic validation added to make sure the file has CSV format, for instance on the fields/colums of gender. Also check  id and country are not empty:
	*/
if ((!preg_match("/^[a-zA-Z ]*$/",$getData[4]))OR(!preg_match("/^\d+(\.\d+)+$/",$getData[5]))OR($getData[0]=="")OR($getData[6]==""))
{
$add++;
}
}
if($add==0){
    //validation passed, now we can start importing
    $fine=0;
    $file = fopen($filename, "r");
		  	fgetcsv($file, 10000, ",");
		  	 include('conexioninclude.php');
 while (($getData = fgetcsv($file, 10000, ",")) !== FALSE)
	         {   

	           $query = "INSERT into employeeinfo (first_name,last_name,email,gender,ip_address, country) 
                   values ('".$getData[1]."','".$getData[2]."','".$getData[3]."','".$getData[4]."','".$getData[5]."','".$getData[6]."')";
                   $result = mysqli_query($con, $query);
               
				if(!isset($result))
				{
				    $fine++;
					echo "<script>
							alert(\"Problems importing the data of the File\");
							window.location = \"panda_functions.php\"
						  </script>";		
				}
				
				
    
              }
              
             
  
    					
			
    if($fine==0){
        //not only the data was validated but there were no problmes to insert it in the database, so we show it to the user, showing the number of people by each country:
     
    $query = "SELECT COUNT(id), country FROM employeeinfo GROUP BY country";
    
    $result = mysqli_query($con, $query);  


    if (mysqli_num_rows($result) > 0) {
     print<<<HERE
     <div class="container-fluid_number">
<div class="row table-responsive" style="width:90%;margin:auto">
     <h2 style="text-align:center;margin-top:40px;margin-bottom:40px;padding:10px" class="bg-info">Number of people by country</h2><table class='table table-striped table-bordered'>
             <thead><tr>
                          <th>Country</th>
                          <th>Total</th>
                           </tr></thead><tbody>
HERE;

     while($reg = mysqli_fetch_array($result)) {

         echo "
         <tr><td>" . $reg['country']."</td>
                   <td>" . $reg['COUNT(id)']."</td>
                   </tr>";        
     }
    
     echo "</tbody></table></div></div>";
     
}
 
}
else{
    //since ther were problems to import the data of the file, we let the user know, without showing the database
    
    echo "<script>alert(\"Problems with the File, make sure it is CSV\");
							window.location = \"panda_import.php\"
						  </script>";	          

              
        }
        
		 }
	       
		 else{
		     //file could not be validated
		     echo "<script>
		     window.location = \"panda_import.php\";
		     alert(\"This file could not be imported, try with CSV including fields: id,first_name,last_name,email,gender,ip_address, country\");
		     </script>" ;

		 }
	}
 
}
					
 ?>
 </body>
 </html>