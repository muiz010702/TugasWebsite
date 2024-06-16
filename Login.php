<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="Css/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Quicksand&display=swap" rel="stylesheet">
</head>
<body id="bg-login">
    <div class="box-login">
        <h2>Login</h2>
        <form action="" method="POST">
            <input type="text" name="Username" placeholder="Username" class="input-control">
            <input type="Password" name="Paasword" placeholder="Password" class="input-control">
            <input type="Submit" name="Submit" value="Login" class="btn">
        </form>
        <?php
            if(isset($_POST['Submit']))
            {
                session_start();
                include 'koneksi.php';

                $User = mysqli_real_escape_string($koneksi, $_POST['Username']);
                $Pass = mysqli_real_escape_string($koneksi, $_POST['Paasword']);

                $cek = mysqli_query($koneksi, "SELECT * FROM tb_admin WHERE Username='".$User."' AND Paasword='".MD5($Pass)."'");
                if(mysqli_num_rows($cek) > 0)
                {
                    $D = mysqli_fetch_object($cek);
                    $_SESSION['Status Login'] = TRUE;
                    $_SESSION['admin']= $D;
                    $_SESSION['ID'] = $D->admin_id;
                    echo '<script>window.location="Dashboard.php"</script>';
                }
                else
                {
                    echo '<script>alert ("Username atau Password anda salah")</script>';
                }
            }
        ?>
    </div>
</body>
</html>