<html>



<head>
    <title>

    </title>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

</head>

    </html>


<?php
$servername = "localhost";
$username = "root";
$password = "";

// Create connection
$conn = new mysqli($servername, $username, $password);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}





$cin = 10;

$retval = mysqli_select_db( $conn, 'Taxe' );
      if(! $retval ) {
         die('Could not select database: ' . mysqli_error($conn));
      }
      else if ($retval)  {
        $res = mysqli_query($conn,"SELECT nom,prenom FROM client where cin='$cin'"); 
        $res2 = mysqli_query($conn,"SELECT num_c FROM client where cin='$cin'");
        $res3 = mysqli_query($conn,"SELECT adresse from client where cin='$cin'");
        $res4 = mysqli_query($conn,"SELECT type_occup from client where cin='$cin'");
        $res5 = mysqli_query($conn,"SELECT date_cin from client where cin='$cin'");
        $res6 = mysqli_query($conn,"SELECT naiss from client where cin='$cin'");
        $res7 = mysqli_query($conn,"SELECT dob from client where cin='$cin'");
        $res8 = mysqli_query($conn,"SELECT occup from client where cin='$cin'");
        


      }


        // res : nom et prenom 
        // res2 : numero c
        // res3 : adresse de client 
        // res4 : type d'occupation 
        // res5 : date de cin  
        // res6 : 
        // res7 : date de naissance
        // res8 : occup
       



?>

 <div id="div2" style="text-align:center;">
            <p style="margin-left: 50;"> 
            
             بـوسالم في:
        
            <?php
           echo date("Y-m-d");

            ?>
        </p>
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
<br>

<br>
<br>
<br>
<h2 style="text-decoration:underline; text-align:center;">كتب أتفاق</h2>
<br>
<br>
<br>
<h3 style="text-decoration:underline; float:right; margin-right:100;">بين الممضين أسفله هذا    </h3>
<br>
<br>
<br>
<br>

<p style="float:right; margin-right:100; font-size:large;">  بلدية بـوسالم ممثلة في شخص السيد 



<strong> : "الهاشمي البنقاجي" </strong> 

رئيس بلدية بـوسالم القائم في حل أملاك بلدية


</p>
<p style="float:right; margin-right:100; font-size:large;">
بـوسالم بمقتضى التفويض الصادر له من المجلس البلدي بتاريخ 02 جويلية 2018 ــ و المعين محل مخابرته

</p>
<p style="float:right; margin-right:100; font-size:large;">
.بقصر بلدية بوسالم ــ 8170 ــ بوسالم

</p>
<br>
<br>
<br>
<br>
<br>
<br>
<br>

<h3 style="float:left; text-decoration:underline; margin-left:290;">من جهة</h3>
<br>
<br>
<br>
<p style="float:right; margin-right:100; font-size:large;">
 : و السيد(ة) 
 
 
 <?php 
        
            while ($row = mysqli_fetch_array($res))
        {

        echo "<strong> ". $row['nom'] . "</strong> ";
        echo " <strong>". $row['prenom'] . " </strong>";

        }


        ?>

   مولود(ة) في :
  <?php



while ($row = mysqli_fetch_array($res7))
{

echo "<strong> ". $row['dob'] . "</strong> ";

}





  ?>
   بــ : 

  <?php

while ($row = mysqli_fetch_array($res6))
{

echo "<strong> ". $row['naiss'] . " </strong> ";

}

  ?>

</p>



<p style="float:right; margin-right:100; font-size:large;">
    تونسي(ة) الجنسية - المهنة 
    <?php

while ($row = mysqli_fetch_array($res8))
{

echo "<strong> ". $row['occup'] . "</strong> ";

}
      
    ?>
    قاطن(ة) بـ 
    <?php
while ($row = mysqli_fetch_array($res3))
{

echo "<strong> ". $row['adresse'] . "</strong> ";

}
      
    ?>
    - صاحب(ة) بطاقة التعريف 
    </p>

    <p style="float:right; margin-right:100; font-size:large;">
        الوطنية عدد 

        <?php
         
         
         echo "<strong> ". $cin . "</strong> ";
         
         
        ?>
        مسلمة بتونس في 




        <?php
        while ($row = mysqli_fetch_array($res5))
        {
        
        echo "<strong> ". $row['date_cin'] . "</strong> ";
        
        }

        ?>

    </p>
<br>
<br>
<br>
<br>
<br>
<br>
<br>

<h3 style="float:left; text-decoration:underline; margin-left:290;">من جهة أخرى</h3>
<br>
<br>
<br>
<br>
<h2 style="text-decoration:underline; text-align:center;"> وقع الإتفاق و التراضي على ما يلي</h2>
<br>
<br>
<br>
<br>
<p style="float:right; margin-right:100; font-size:large;">
    <strong style="text-decoration:underline;">: الفصل 1 - </strong>
    يمكن رئيس بلدية بوسالم السيد(ة) : الهاشمي البنقاجي . من المحل الحرفي عدد (
        

<?php
while ($row = mysqli_fetch_array($res2))
{

echo "<strong> ". $row['num_c'] . "</strong> ";

}

?>
        
    )

</p>
<p style="float:right; margin-right:100; font-size:large;">
الكائن بالمنطقة الحرفية ببوسالم لاستغلاله في حرفة 
<?php

while ($row = mysqli_fetch_array($res4))
{

echo "<strong> ". $row['type_occup'] . "</strong> ";

}


?>


</p>