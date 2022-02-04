<?php


echo "<head>";

echo "<link rel='stylesheet' href='https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css'
integrity='sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T'
crossorigin='anonymous'>";

echo "</head>";
echo "<header class='text-center'>";

echo "<h1 style='font-family: 'Times New Roman', Times, serif;'>  Liste de tous les clients </h1>";
echo " ";

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
      

     
      $result = mysqli_query($conn,"SELECT nom,prenom,cin FROM client");   
      $result1 = mysqli_query($conn,"SELECT cin FROM client");   
      


      echo "<table border='1' class='table'>
<tr>
<th scope='col' >  الإسم و اللقب</th>

</tr>";


while($row = mysqli_fetch_array($result))
{
echo "<tr>";
echo "<td scope='row' >" . $row['nom'] ." ". $row['prenom'] . "</td>";

echo "</tr>";
}

echo "<select>";

while($rr = mysqli_fetch_array($result1))
{

echo "<option>" . $rr['cin'] . "</option>";

}
echo "</select>";
echo "</table>";


echo "<br>";
echo "<div class='text-center'>";

echo " <a href='index.html'><button class='btn btn-info'> العودة الى الصفحة الرئيسية</button> </a> ";
echo "</div>";
echo "<br>";
echo "<br>";

mysqli_close($conn);


?>