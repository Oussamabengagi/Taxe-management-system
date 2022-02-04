<?php


echo "<head>";

echo "<link rel='stylesheet' href='https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css'
integrity='sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T'
crossorigin='anonymous'>";

echo "</head>";


?>

<nav class="navbar navbar-expand-lg  navbar-dark bg-dark">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
                  <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
                  <a class="navbar-brand" href="index.html">الصفحة الرئيسية</a>
                  <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                        <li class="nav-item"> 
                                <a class="nav-link Disabled" href="#">-</a>
                              </li>
                    <li class="nav-item">
                      <a class="nav-link text-primary" href="ajouter.html">إضافة حريف </a>
                    </li>
                    <li class="nav-item"> 
                        <a class="nav-link Disabled" href="#">-</a>
                      </li>
                    <li class="nav-item">
                      <a class="nav-link text-primary" href="recherche.html">البحث عن حريف</a>
                    </li>
                    <li class="nav-item"> 
                        <a class="nav-link Disabled" href="#">-</a>
                      </li>
                    <li class="nav-item">
                      <a class="nav-link text-primary" href="consulter_action.php">عرض جميع الحرفاء</a>
                    </li>
                    <li class="nav-item"> 
                        <a class="nav-link Disabled" href="#">-</a>
                      </li>
                    <li class="nav-item">
                        <a class="nav-link text-warning" href="warning.html">تنبيه بالخلاص</a>
                      </li>
                     
                      <li class="nav-item"> 
                        <a class="nav-link Disabled" href="#">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; </a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link text-danger" href="supprimer_client.html">مسح حريف</a>
                      </li>
                      <li class="nav-item"> 
                        <a class="nav-link Disabled" href="#">-</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link text-info" href="modifier.html">تعديل معطيات حريف</a>
                      </li>
                  </ul>
                 
                </div>
              </nav>


<?php
echo "<header class='text-center'>";

echo "<h1 style='font-family: 'Times New Roman', Times, serif;'>  جميع الحرفاء </h1>";

echo "</header>";
echo "<hr>";
echo "<br>";
echo "<br>";

$servername = "localhost";
$username = "root";
$password = "";


$conn = new mysqli($servername, $username, $password);


if ($conn->connect_error) {
  die("Connection failed: <br>" . $conn->connect_error);
}



$retval = mysqli_select_db( $conn, 'Taxe' );
      if(! $retval ) {
         die('Could not select database: <br>' . mysqli_error($conn));
      }
      

     
      $result = mysqli_query($conn,"SELECT * FROM client");    
      


      echo "<table border='1' class='table'>
<tr>
<th scope='col' >الإسم</th>
<th scope='col'>اللقب</th>
<th scope='col'>عنوان المحل</th>
<th scope='col'>رقم بطاقة التعريف </th>
<th scope='col'>تاريخ بطاقة التعريف</th>
<th scope='col'>تاريخ الولادة</th>
<th scope='col'>مكان الولادة</th>
<th scope='col'>المهنة</th>
<th scope='col'>نوع النشاط</th>
<th scope='col'>رقم المحل</th>
<th scope='col'>معلوم كراء المحل</th>
</tr>";


while($row = mysqli_fetch_array($result))
{
echo "<tr>";
echo "<td scope='row' >" . $row['nom'] . "</td>";
echo "<td scope='row'>" . $row['prenom'] . "</td>";
echo "<td scope='row'>" .$row['adresse'] . "</td>";
echo "<td scope='row'>" . $row['cin'] . "</td>";
echo "<td scope='row'>" . $row['date_cin'] . "</td>";
echo "<td scope='row'>" . $row['dob'] . "</td>";
echo "<td scope='row'>" . $row['naiss'] . "</td>";
echo "<td scope='row'>" . $row['occup'] . "</td>";
echo "<td scope='row'>" . $row['type_occup'] . "</td>";




echo "<td scope='row'>" . $row['num_c'] . "</td>";
echo "<td scope='row'>  " . $row['montant_louer'] . " <b>دينار</b> </td>";


echo "</tr>";
}
echo "</table>";
echo "<br>";
echo "<div class='text-center'>";

echo " <a href='index.html'><button class='btn btn-info'> العودة الى الصفحة الرئيسية</button> </a> ";
echo "</div>";
echo "<br>";
echo "<br>";

mysqli_close($conn);


?>