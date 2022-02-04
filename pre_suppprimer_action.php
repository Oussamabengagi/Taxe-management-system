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


$cin = $_POST['cin'];


$retval = mysqli_select_db( $conn, 'Taxe' );

if(! $retval ) {
    die('Could not select database: <br>' . mysqli_error($conn));
}

$res = mysqli_query($conn,"SELECT cin,nom,prenom FROM client where cin='$cin'"); 

$nbr = mysqli_num_rows($res);


if ($nbr<=0) {
    echo "<div class='text-center bg-danger'>";

    echo "<h3>رقم بطاقة التعريف غير مسجل</h3> <br>";
    echo "<h2> CIN :  $cin </h2>";
    echo "</div>";
  echo "  <div class='text-center'>
          <a href='index.html'><button class='btn btn-info'> العودة الى الصفحة الرئيسية</button> </a>  
    </div>";
  }
  else {

    while($row = mysqli_fetch_array($res)) {
        
    

  ?>

  

    <div class='text-center'>
    <h2 class='text-center text-danger'>  تأكيد مسح معطيات الحريف</h2>
    <form methode='get' action='supprimer.php'>
    <table align='center'>
    <tr>
    <td><input type='text' value="<?php echo $row['cin'] ?>" name="cin" ></td>
    <td>رقم بطاقة التعريف الوطنية</td>
    </tr>
    <tr>
    <td><input type='text' value= "<?php echo $row['prenom'] ?>"  disabled></td>
    <td>الإسم </td>
    </tr>
    <tr>
    <td><input type='text' value= "<?php echo $row['nom'] ?>"  disabled></td>
    <td>اللقب</td>
    </tr>
        <tr>
        <td><input type='submit' class='btn btn-danger' value='مسح' name='sub'></td>
        <td>
        <a href='index.html'><button class='btn btn-info' type='reset'>الرجوع</button></a>
        </td>
        </tr>
    </table>    
    </form>
    </div>
    
  
<?php
}

}
 
$conn->close();
?>

