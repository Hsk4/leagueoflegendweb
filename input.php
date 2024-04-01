<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    
<form action="input.php" method="post"  enctype="multipart/form-data">
    

        <input  name="submit" type="submit">
    <input name="imgpath" id="imgFile" type="file">
    <input name="hammad" type="file">
</form>

    <?php

    include 'conn.php';
  if(isset($_POST['submit'])){

    //  $imgfilename = $_FILES['imgpath']['name'];
    //  $logofilename = $_FILES['logopath']['name'] ;
    
    $newlogofilename= uniqid() . ".png" ;
   
    $imgoldlocation=$_FILES['imgpath']['tmp_name'];
    $logooldlocation=$_FILES['hammad']['tmp_name'];
    $newtext = "bohat sara bohat sarabohat sarabohat sara";
      mysqli_query($conn ,"INSERT INTO imgpaths VALUES ('NULL','$newlogofilename','null' ,'$newtext')");
     move_uploaded_file($logooldlocation ,"images/". $newlogofilename );
     
  }
    
    ?>
    <?php
     if(isset($_POST['submit'])){
      $newimgfilename= uniqid() . ".png" ;

      mysqli_query($conn ,"UPDATE imgpaths SET  imgPath='$newimgfilename' where logo = '$newlogofilename'  ");

      move_uploaded_file($imgoldlocation,"images/". $newimgfilename );
     }
    
    ?>
</body>
<!-- <script type="text/javascript">
        document.getElementById('imgFile').onchange = function(evt) {
            var tgt = evt.target || window.event.srcElement,
                files = tgt.files;

            // FileReader support
            if (FileReader && files && files.length) {
                var fr = new FileReader();
                fr.onload = function() {
                    document.getElementById('imgId').src = fr.result;
                }
                fr.readAsDataURL(files[0]);
            }

            // Not supported
            else {
                // fallback -- perhaps submit the input to an iframe and temporarily store
                // them on the server until the user's session ends.
            }
        }
    </script> -->
</html>