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

$servername = "localhost";
$username = "root";
$password = "";



$conn = new mysqli($servername, $username, $password);


$cin = $_POST['cin'];



$retval = mysqli_select_db( $conn, 'Taxe' );

if(! $retval ) {
    die('Could not select database: <br>' . mysqli_error($conn));
}

$res = mysqli_query($conn,"SELECT * FROM client where cin='$cin'"); 

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
    <h2 class='text-center text-danger'>  تعديل معطيات الحريف</h2>
    <form methode='get' action='mod.php'>
    <table align='center'>
    <tr>
    <td><input type='text' value="<?php echo $row['cin'] ?>" name="cin" required></td>
    <td>رقم بطاقة التعريف الوطنية</td>
    </tr>
    <tr>
    <td><input type='text' value= "<?php echo $row['prenom'] ?>"  name="prenom" required></td>
    <td>الإسم </td>
    </tr>
    <tr> 
    <td><input type='text' value= "<?php echo $row['nom'] ?>"  name="nom" required></td>
    <td>اللقب</td>
    </tr>
    <tr>
    <td>
        <input type="text" name="adresse" value="<?php echo $row['adresse'] ?>"  required>
    </td>
    <td>
        عنوان المحل
    </td>
    </tr>
    <td>
        <input type="date" name="date_cin" value="<?php echo $row['date_cin'] ?>"   required>
    </td>
    <td>
    تاريخ بطاقة التعريف الوطنية
    </td>
    </tr>
    <td>
        <input type="date" name="dob" value="<?php  echo $row['dob'] ?>" required >
    </td>
    <td>
        تاريخ الولادة
    </td>
    </tr>

        <tr>
        <td><input type="text" name="naiss" value="<?php echo $row['naiss'] ?>" required></td>
        
        <td> مكانها </td>
    </tr>
    <tr>
    <td><input type="text" name="occup" value="<?php echo $row['occup'] ?>"  required></td>
        
        <td> المهنة</td>
    </tr>

        <tr>
            <td>
                <input type="text" name="type_occup" value="<?php echo $row['type_occup'] ?>" required> 
            </td>
            <td>نوع النشاط</td>
    </tr>
    <tr>
        <td> 
            <input type="text" name="num_c" value="<?php echo $row['num_c'] ?>" required>
        </td>
        <td>
            رقم المحل
        </td>
    </tr>
    <tr>
      <td>
      <input type="number" step="0.01" name="montant_louer" value="<?php echo $row['montant_louer'] ?>" required>
      </td>
      <td>
        معلوم الكـــراء الشهري
      </td>

    </tr>

        <tr>
            
        <td><input type='submit' class='btn btn-success' value='تعديل' name='sub'></td>
        
        </tr>
    </table>    
    </form>
    </div>
    <div class='text-center'>
<br>
<br>
<br>
<br>
<br>
<a href='index.html'><button class='btn btn-info'> العودة الى الصفحة الرئيسية</button> </a>
</div>
  
<?php
}

}
 
$conn->close();
?>

