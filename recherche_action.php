<?php


$cin = $_POST['cin'];

echo "<head>";
echo "<link rel='stylesheet' href='https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css'
integrity='sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T'
crossorigin='anonymous'>";

echo "</head>";

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


$result = mysqli_query($conn,"SELECT * FROM client where cin='$cin'"); 


$nbr = mysqli_num_rows($result);

if ($nbr==0) {
    echo "<div class='text-center bg-danger'>";
    echo "<h3>رقم بطاقة التعريف : ". $cin ." غير مسجل </h3>";
    echo "</div>";
}
else {

    echo "<table border='1' class='table'>
<tr>
<th scope='col'>الإسم</th>
<th scope='col'>اللقب</th>
<th scope='col'>عنوان المحل</th>
<th scope='col'>رقم بطاقة التعريف</th>
<th scope='col'>تاريخ بطاقة التعريف</th>
<th scope='col'>تاريخ الولادة</th>
<th scope='col'>مكان الولادة</th>
<th scope='col'>المهنة</th>
<th scope='col'>نوع النشاط</th>
<th scope='col'>رقم المحل</th>
</tr>";


while($row = mysqli_fetch_array($result))
{
echo "<tr>";
echo "<td scope='row' >" . $row['nom'] . "</td>";
echo "<td scope='row'>" . $row['prenom'] . "</td>";
echo "<td scope='row'>" . $row['adresse'] . "</td>";
echo "<td scope='row'>" . $row['cin'] . "</td>";
echo "<td scope='row'>" . $row['date_cin'] . "</td>";
echo "<td scope='row'>" . $row['dob'] . "</td>";
echo "<td scope='row'>" . $row['naiss'] . "</td>";
echo "<td scope='row'>" . $row['occup'] . "</td>";
echo "<td scope='row'>" . $row['type_occup'] . "</td>";



echo "<td scope='row'>" . $row['num_c'] . "</td>";
}


echo "</tr>";
}
echo "</table>";

echo "<div class='text-center'>";

echo " <a href='index.html'><button class='btn btn-info'> العودة الى الصفحة الرئيسية</button> </a> ";
echo "</div>";




mysqli_close($conn);
?>
