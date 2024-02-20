<?php 

session_start();
require_once"../dbcontroller.php";
$db= new DB;

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Restoran</title>
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.css">
</head>
<body>
    <div class="class">

        <div class="row">

            <div class="col-4 mx-auto mt-4">
                <div class="form-group">

                    <form action="" method="post">
                        <div>

                            <h3>LOGIN RESTORAN</h3>

                        </div>
                        <div class="form-group">
                            <label for="">EMAIL</label>
                            <input type="email" name="email" required  class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="">PASSWORD</label>
                            <input type="password" name="password" required  class="form-control">
                        </div>
                        <div>

                            <input type="submit" name="login" value="LOGIN" class="btn btn-primary">

                        </div>
                    </form>
                </div>
                <?php 

                    if (isset($_POST['simpan'])) {
                        $kategori=$_POST['kategori'];
                        $sql="INSERT INTO tblkategori VALUES('','$kategori')";
                        
                        $db->runSQL($sql);
                        header("location:?f=kategori&m=select");
                    }

                ?>
            </div>

        </div>

    </div>
</body>
</html>
<?php 

    if (isset($_POST['login'])) {
        $email=$_POST['email'];
        $password=$_POST['password'];
        $sql="SELECT * FROM tbluser WHERE email='$email' AND $password";
        $count=$db->rowCOUNT($sql);
        if ($count == 0) {
            echo"<h3>Email atau Password salah</h3>";
        }else {
            $sql="SELECT * FROM tbluser WHERE email='$email' AND $password";
            $row=$db->getITEM($sql);
            $_SESSION['user']=$row['email'];
            $_SESSION['level']=$row['level'];
            header("location:index.php");
        }
        echo $count;
    }

?>
