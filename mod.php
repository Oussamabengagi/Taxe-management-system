<?php



echo "<head>";
echo "<link rel='stylesheet' href='https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css'
integrity='sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T'
crossorigin='anonymous'>";

echo "</head>";


$servername = "localhost";
$username = "root";
$password = "";


$prenom = $_GET['prenom'];
$nom = $_GET['nom'];
$adresse = $_GET['adresse'];
$cin = $_GET['cin'];
$date_cin = $_GET['date_cin'];
$dob = $_GET['dob'];
$naiss = $_GET['naiss'];
$occup = $_GET['occup'];
$montant_louer = $_GET['montant_louer'];



// organisation des fichiers

// {c,r,u,d}

// Create connection
$conn = new mysqli($servername, $username, $password);

// Check connection
if ($conn->connect_error) {

  die("Connection failed: " . $conn->connect_error);
}






// Select database




$retval = mysqli_select_db( $conn, 'Taxe' );
      if(! $retval ) {
         die('Could not select database: ' . mysqli_error($conn));
      }
      else if ($retval)  {
        
        $requet = mysqli_query($conn,"UPDATE client set prenom='$prenom' , nom ='$nom' , adresse ='$adresse' , cin='$cin' , date_cin='$date_cin', dob='$dob' , naiss='$naiss' , occup='$occup' , montant_louer='$montant_louer'  where cin='$cin'"); 
          


   $ok=mysqli_query($conn,$requet);

    if($ok == FALSE) {

        echo "<div class='text-center bg-success'>";
        echo "<h3>تم تعديل معطيات الحريف بنجاح</h3> <br>";
        echo "</div>";

    }

       

            else {

           

            echo "Probléme de modification <br />";
        }
      }





echo "<div class='text-center'>";

echo " <a href='index.html'><button class='btn btn-info'> العودة الى الصفحة الرئيسية</button> </a> ";
echo "</div>";

?>