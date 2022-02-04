<html>

<head>
    <title>

    </title>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

</head>




<?php 



$d_deb = $_POST['from_m'];
$d_fin = $_POST['to_m'];
$d_a_deb = $_POST['from_y'];
$d_a_fin = $_POST['to_y'];





?>





<?php



// all selections here : 




// end all  selections 

$servername = "localhost";
$username = "root";
$password = "";

// Create connection
$conn = new mysqli($servername, $username, $password);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}





$cin = $_POST['cin'];

$retval = mysqli_select_db( $conn, 'Taxe' );
      if(! $retval ) {
         die('Could not select database: ' . mysqli_error($conn));
      }
      else if ($retval)  {
        $res = mysqli_query($conn,"SELECT nom,prenom FROM client where cin='$cin'"); 
        $res2 = mysqli_query($conn,"SELECT num_c FROM client where cin='$cin'");
        $res3 = mysqli_query($conn,"SELECT adresse from client where cin='$cin'");
        $res4 = mysqli_query($conn,"SELECT montant_louer from client where cin='$cin'");

$nbr = mysqli_num_rows($res);
      }


      

     if ($d_a_deb == ($d_a_fin -1) ) {
        $count2 =   (12 - $d_deb) + $d_fin;
    }
    else if ($d_a_deb  < ($d_a_fin -1) ) {
        $count = (($d_a_fin - $d_a_deb ) -1 ) * 12;
        $count2 = $count + (12 - $d_deb) + $d_fin;
    }
    else if($d_a_deb == $d_a_fin) {
    
        $count2 =  $d_fin - $d_deb ;
        
    
    }
    
    
    $periode = $count2 + 1;
    
    
                while ($row = mysqli_fetch_array($res4))
    {
    
                $montant_totale = $row['montant_louer'] * $periode;
    

    }

 

    ?>


<body id="print-content">
    
        <div id="div2" style="text-align:center;">
            <p style="margin-left: 50;"> 
            
             بـوسالم في:
        
            <?php
           echo date("Y-m-d");

            ?>
        </p>
        </div>
        <div id="div3" style="text-align:center;">
            <img src="img/logo.png" width="90px" height="90px" >
        </div>
        <div id="div1" style="text-align:center;">

            <p>الجمهوريــة التونسيـــة </p>

            <p> وزارة الداخليـــة </p>

            <p>بلديـــة بـــوسالم</p>

            <p>عــ/ـــــ/دد و.و</p>

        </div>

        <br>
        <br>
        <br>
        <br>

        <div>
            <h1 style="text-align: center;">من رئيس بلدية بـوسالم</h1>
            <br>
            <h3 style="text-align: center;">
            


            
            
             الى السيــد(ة) : 

            <?php 
            while ($row = mysqli_fetch_array($res))
{

    echo "<strong> ". $row['nom'] . "</strong> ";
    echo " <strong>". $row['prenom'] . " </strong>";

}


?>



            </h3>
            <h3 style="text-align: center;">
            العنوان :
            <?php 
            while ($row = mysqli_fetch_array($res3))
                {
                    echo" <strong>" .  $row['adresse'] . " </strong>";
                    
                }
?>
        </h3>

        </div>
        <div style="float: right; margin-right: 50px;">
            <h3 id="in" style="font-weight:900;"> .تنبيه بالخلاص : &nbsp;<h3 id="in" style="text-decoration:underline;">
                    الموضوع</h3>
            </h3>
            <br>
            <br>
            <br>
            <h4> , بعـــــــــــــــــد </h4>
        </div>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>

        <div style="text-align: right; margin-right: 70;">
            <p style="font-size: x-large;">

           
تبعـــــا لتلــــددكم عـــن خــــلاص معينــــات الكـــراء للمحـــــل التجـــاري
                عــــدد 
                
                <?php 
            while ($row = mysqli_fetch_array($res2))
{
    echo "<strong>" . $row['num_c'] . "</strong>";
    
}
?>
               
               والبالغـــة قيمتـــــه
               <strong>
               <?php
               
               echo $montant_totale ;
               ?>
               دينار
</strong>

            </p>
            <p style="font-size: x-large;"> للفترة من 
            <?php
            

            if ($d_deb == 1) {
                echo "<strong> جانفي </strong>";
            }
            else if ($d_deb == 2) {
                echo "<strong> فيفري </strong>";
            }
            else if ($d_deb == 3) {
                echo "<strong> مارس</strong>";
            }
            else if ($d_deb == 4) {
                echo "<strong> أفريل</strong>";
            }
            else if ($d_deb == 5) {
                echo "<strong> ماي</strong>";
            }
            else if ($d_deb == 6) {
                echo "<strong> جوان</strong>";
            }
            else if ($d_deb == 7) {
                echo "<strong>جويلية </strong>";
            }
            else if ($d_deb == 8) {
                echo "<strong> أوت</strong>";
            }
            else if ($d_deb == 9) {
                echo "<strong> سبتمبر</strong>";
            }
            else if ($d_deb == 10) {
                echo "<strong> أكتوبر</strong>";
            }
            else if ($d_deb == 11) {
                echo "<strong>نوفمبر </strong>";
            }
            else  {
                echo "<strong> ديسمبر</strong>";
            }


           echo " <strong>".$d_a_deb." </strong>";
            

            ?>

            اللى غاية 
            <?php
            
            
            if ($d_fin == 1) {
                echo "<strong> جانفي </strong>";
            }
            else if ($d_fin == 2) {
                echo "<strong> فيفري </strong>";
            }
            else if ($d_fin == 3) {
                echo "<strong> مارس</strong>";
            }
            else if ($d_fin == 4) {
                echo "<strong> أفريل</strong>";
            }
            else if ($d_fin == 5) {
                echo "<strong> ماي</strong>";
            }
            else if ($d_fin == 6) {
                echo "<strong> جوان</strong>";
            }
            else if ($d_fin == 7) {
                echo "<strong>جويلية </strong>";
            }
            else if ($d_fin == 8) {
                echo "<strong> أوت</strong>";
            }
            else if ($d_fin == 9) {
                echo "<strong> سبتمبر</strong>";
            }
            else if ($d_fin == 10) {
                echo "<strong> أكتوبر</strong>";
            }
            else if ($d_fin == 11) {
                echo "<strong>نوفمبر </strong>";
            }
            else  {
                echo "<strong> ديسمبر</strong>";
            }

            ?>
        
        
        <?php


echo "<strong> " .$d_a_fin . "</strong> ";
?>
        
        </p>
        </div>
        <div style="text-align: right; margin-right: 70;">

        <p style="font-size: x-large;">
        الرجــــاء الإســـراع بــخلاص كافــة الـــديون في ضرف <strong> 07 أيـــــام</strong> مـن تــاريخ توصـــلكم بهــذا التنبيـــه قبــــل
        
        </p>
        <p style="font-size: x-large;">
        . إتخاذ الإجراءات القانونية ضدكم بما فيها فسخ عقد التسويغ 
        </p>


        </div>
        <br>
        <br>
        <div>
        <strong> <h4 style="margin-left:300;"> رئيس البلديــــــة </h4>  </strong>
        </div>



    



    <!-- Print Button -->
    <br>
    <br>
    <br>
    <br>
    <br>

    <br>
    <br>

<div style="text-align:center;">

<strong><p>ــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــ</p></strong>

</div>
<div style="text-align: center; margin-right:70;">
<p style="font-size: x-large; text-decoration: underline;">وصل تسلم</p>
</div>
<br>
<div style="text-align: right; margin-right:70;">
<p style="font-size: x-large;">
إنـــي الممضـــي أســــفله هــــذا تـــوصلت بتنبيــــه إداري حــــول خـــلاص الديــــون المتخلـــدة
</p>
<p style="font-size: x-large;">

......................... بـــــــذمتي بعنـــــوان كــــراء  المحــــل التـجـــــاري عـــــدد ............... بتــــــاريخ 
<strong>
<p style="font-size: x-large;">
 .................. : بطاقة تعريف وطنية عدد 
</p>
</strong>
</p>

</div>
<br>
<br>
<div style="text-align:left; margin-left: 100;">
    <p>الإسم و اللقب و الصفة</p>
</div>

<br>
    <br>

    
    
</body>


</html>