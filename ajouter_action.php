<?php



echo "<head>";
echo "<link rel='stylesheet' href='https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css'
integrity='sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T'
crossorigin='anonymous'>";

echo "</head>";


$servername = "localhost";
$username = "root";
$password = "";


$prenom = $_POST['prenom_client'];
$nom = $_POST['nom_client'];
$adresse = $_POST['adresse'];
$cin = $_POST['cin'];
$date_cin = $_POST['date_cin'];
$dob = $_POST['dob'];
$naiss = $_POST['naiss'];
$occup = $_POST['occup'];
$type_occup = $_POST['type_occup'];
$num_c = $_POST['num_c'];
$montant_louer = $_POST['montant_louer'];



// Create connection
$conn = new mysqli($servername, $username, $password);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}






// select database







$retval = mysqli_select_db( $conn, 'Taxe' );
      if(! $retval ) {
         die('Could not select database: ' . mysqli_error($conn));
      }
      else if ($retval)  {
        $res = mysqli_query($conn,"SELECT * FROM client where cin='$cin'"); 

$nbr = mysqli_num_rows($res);
      }
      if ($nbr>0) {
        echo "<div class='text-center bg-danger'>";

        echo "<h3>رقم بطاقة التعريف مسجل من قبل</h3> <br>";
        echo "<h2> CIN :  $cin </h2>";
        echo "</div>";
      }
      else {

          $requet = "insert into client values('$prenom','$nom','$cin','$date_cin','$dob','$naiss','$occup','$type_occup','$num_c','$adresse','$montant_louer')";
          


   $ok=mysqli_query($conn,$requet);

    if($ok == FALSE)

       echo "Problème d'insertion <br/>";

            else

            echo "<div class='text-center bg-success'>";

            echo "<h3>تمت إضافة الحريف بنجاح</h3> <br>";
            echo "</div>";
      }





echo "<div class='text-center'>";

echo " <a href='index.html'><button class='btn btn-info'> العودة الى الصفحة الرئيسية</button> </a> ";
echo "</div>";

?>