<?php
include '../db/koneksi.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
} else {
    header("Location: login.html");
    exit();
}
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Forgor</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/style.css">
  </head>
  <body>

    <div class="container">
        <form class="form-group" method="POST" action="../db/newpass.php">
            <div class="mb-3 bg p-4 rounded">
                <h2 class="text-center">New Password</h2>
                <label  
                    class="form-label mt-3 fw-semibold"

                >New Password</label>
                <input 
                    type="password" 
                    class="form-control"
                    placeholder="password"
                    name="newpass"
                    required
                />
                <input 
                    type="hidden" 
                    name="id" 
                    value="<?php echo $id; ?>"
                />
                <input 
                    type="submit" 
                    class="form-control btn-color mt-3"
                />
                
            </div>
        </form>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
  </body>
</html>