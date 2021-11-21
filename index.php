<?php include_once '../Model/db_confige.php';?>
<?php 
$error1 = $error2 = $error3= $success= " "; 
if($_SERVER["REQUEST_METHOD"]=="POST"){
  //echo "ddd";
 // $cat_type_name =trim( $_POST['cat_type_name']);
  //$cat_type_code =trim( $_POST['cat_type_code']);
  $cat_type_name =trim( $_POST['name']);
  $cat_type_code =trim( $_POST['code']);
  
   if(empty($cat_type_name)|| empty($cat_type_code)){
    if(empty($cat_type_name) && empty($cat_type_code) ){
      $error1 = "Please fill up both forms";
    }
    elseif(empty($cat_type_name)){
      $error2 = "Please fill up catagory type name.";

    }
    else{
      $error3 = "Please fill up catagory type code.";

    }
    

 
  } 
  else{
    $sql = "INSERT INTO catagore_type(cat_type_name,cat_type_code)VALUE(?,?)"; 
    $sql_statment = mysqli_prepare($link, $sql);
    if($sql_statment){
     mysqli_stmt_bind_param($sql_statment,"ss", $var1, $var2);
     $var1=$cat_type_name;
     $var2=$cat_type_code;
     $execute= mysqli_stmt_execute($sql_statment);
        if($execute){
          $success = "Successfully inserted.";
          /* header("location:index.php"); */
        }
         else{
            echo "somthing wents wrong!";
  
          } 
  
  
    }

} 
 
  
}  
  
?>
<!DOCTYPE html>
<html lang="en">
     <?php include '../view/layout/header.php';?>
    <body>
            <?php include '../view/layout/side_navber.php';?>
            <!-- Page content wrapper-->
            <div id="page-content-wrapper">
                <!-- Top navigation-->
              <?php include '../view/layout/collapes_navber.php';?>
                <!-- Page content-->
                <div >
                      <h2 style="color:blue"> Inventory Admin panal</h2>
                    <h3 style="color:blue">Add catagory</h3>
                    <?php 
                      if(!empty($success)){
                        
                         echo '<span style="color:green;">'.$success.'</span>';
                        }
                        else{
                          echo '<span style="color:red;">'. $error1.'</span>';
                        }     
                      ?> 
                      <span><?php  echo $error1;  ?></span>
                     
                    <!--   <span id="error1" style="display:none"; ></span> -->

                </div>
               

          <form class="shadow p-4" >
                
            <div class="mb-3">
            <br>
            <label for="cat_type_name" class="form-label"style="color:cornflowerblue;">Cat_type_name</label>
            <input  value="<?php echo $cat_type_name;?>"  type="text" id="cat_type_name"  name="cat_type_name" placeholder="cat_type_name">
            <?php 
                 if(!empty($error2)){
                echo '<span style="color:red;">'. $error2.'</span>'; 

               } 
            
            ?>
<!--             <span id="var_error2" style="display:none"; ></span> -->
     
           </div>
           <div class="mb-3">
            <label for="cat_type_code" class="form-label" style="color:cornflowerblue;">cat_type_code</label>
            <input value="<?php echo $cat_type_code;?>"   type="text"       class="cat_type_name" id="cat_type_code" placeholder="cat_type_code" name="cat_type_code">
            <?php 
                 if(!empty($error3)){
                echo '<span style="color:red;">'. $error3.'</span>';

               } 
             
            ?>
           <!--  <span id="var_error3" style="display:none" style="color:red" ></span> -->
            </div>
   
            <button type="submit" class="cat_type_name" onclick="Datainsert();" >Add catagore types</button>
          </form>


        <!--   <div style="display:none;"id="show_data_div">
            <h2 >Show data</h2>
          <table class="table">
  <thead>
    <tr>
      
      <th scope="col">cat_type_name</th>
      <th scope="col">cat_type_code</th>
      <th scope="col">action</th>
    </tr>
  </thead>
  <tbody id="show_data" >
   
  </tbody>
</table>
                
               

          </div> -->
           <?php include '../view/layout/js_lib.php';?>


   
   
          </body>
</html>
