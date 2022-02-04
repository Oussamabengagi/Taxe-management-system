<?php



echo "<head>";
echo "<link rel='stylesheet' href='https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css'
integrity='sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T'
crossorigin='anonymous'>";

echo "</head>";

$servername = "localhost";
$username = "root";
$password = "";


$conn = new mysqli($servername, $username, $password);


$cin = $_GET['cin'];


$retval = mysqli_select_db( $conn, 'Taxe' );

if(! $retval ) {
    die('Could not select database: <br>' . mysqli_error($conn));
}

else {



            
            $supp = mysqli_query($conn,"DELETE FROM client where cin='$cin'"); 

            if ($supp == false){
                echo "erreur de supprission !";
            }
            else {
                echo "<div class='text-center bg-success'>";
                echo "<h3>تم مسح معطيات الحريف بنجاح</h3> <br>";
                echo "</div>";
            }
            
        }

        echo "<div class='text-center'>";

echo " <a href='index.html'><button class='btn btn-info'> العودة الى الصفحة الرئيسية</button> </a> ";
echo "</div>";




?>