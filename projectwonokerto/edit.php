<?php
// include database connection file
include_once("config.php");

// Check if form is submitted for user update, then redirect to homepage after update
if (isset($_POST['update'])) {
    $id = $_POST['id'];

    $name = $_POST['name'];
    $email = $_POST['email'];
    $date = $_POST['date'];
    $comm = $_POST['comm'];

    // update user data
    $result = mysqli_query($mysqli, "UPDATE users SET name='$name',email='$email',date=CURRENT_TIMESTAMP,comm='$comm' WHERE id=$id");

    // Redirect to homepage to display updated user in list
    header("Location: Komentar.php");
}
?>
<?php
// Display selected user data based on id
// Getting id from url
$id = $_GET['id'];

// Fetech user data based on id
$result = mysqli_query($mysqli, "SELECT * FROM users WHERE id=$id");

while ($user_data = mysqli_fetch_array($result)) {
    $name = $user_data['name'];
    $email = $user_data['email'];
    $date = $user_data['date'];
    $comm = $user_data['comm'];
}
?>

<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous" />

  <!-- Icons -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" />

  <!--Cssku -->
  <link rel="stylesheet" href="style.css" />
  <!-- Cssku end -->
  <title>Pamekasan Tour Guide</title>

  <!-- Style -->
  <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />

  <!-- end style -->


</head>

<body style="background-color: #F7C259">
   
  <!-- Navbar-->
  <nav class="navbar fixed-top navbar-expand-lg navbar-dark shadow" style="background-color: #755C2A">
    <div class="container">
      <a class="navbar-brand text-white active" href="#home" data-bs-target="#brandna">
        <img id="topleft" src="img/Kabupaten Pamekasan.png" class=" d-inline-block align-text-top"
          alt="xxx" width="30px" height="30px">
        Pamekasan Tour Guide
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
        aria-controls="navbarNav" aria-expanded="true" aria-label="Toggle navigation" role="button">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ms-auto">
          <li class="nav-item">
            <a class="nav-link " aria-current="page" href="index.html#home">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="index.html#about">About</a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" role="button" aria-controls="#navbarNav" href="index.html#projects">Galery</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="Komentar.php" tabindex="-1" aria-atomic="true">Comment</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="profile.html" tabindex="-1" aria-atomic="true">Profile</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <!-- Navbar-End -->


   
  <!-- Jumbo -->
  <section id="home" class="jumbotron text-center " style="padding-top: 6rem;">
    <div>
      <img src="img/Kabupaten Pamekasan.png" style="background-color:#F7C259" alt="Pamekasan Tour Guide" width="225"
        class="responsive img-fluid" data-aos="fade-down" data-aos-duration="500" />
      <div class="overlay">
        <div style="color:#755007 ;" class="textleg"><b>MADU GANDA MANGESTI TUNGGAL</b></div>
      </div>
    </div>
    <h1 style="color:#755007 ;" data-aos="zoom-in-up" class="display-4 responsive">Pamekasan Tour Guide</h1>
    <p style="color:#755007 ;" class="lead">

    </p>

    <p style="color:#755007 ;" class="joke" data-aos="fade-down">
     Pamekasan 
    </p>
  
  </section>
  <!-- Jum-End -->

    <!-- Page Content -->
    <!-- Project -->


    <section id="TTC" class="TTC">
        <div id="board" class="container text-center">
            <br><br>
            <h1 style="color: #6c757d">Edit Komentar</h1>
           
            <div class="row ">
                <div class="col-md-2"></div>
                <div class="col-md-8">
              
                    <table id="tictac">

                    
                        <tbody>
                        <br>
<a class="btn btn-primary" href="Komentar.php" style="text-decoration:none; width:20%; text-align:center;border-radius:1rem;">Back</a>
                            <div class="row m-0 align-items-center" style="color:#6c757d">
                            
                                <br /><br />
                                <div class="row">


                                    <form name="update_user" method="post" action="edit.php">
                                        <table style="align-items: center; color:#6c757d" width="100%">
                                            <tr>
                                                <td>Nama :</td>
                                                <td><input  type="text" class="form-control" name="name" value=<?php echo $name;?>></td>
                                            </tr>
                                            <tr>
                                                <td>Email :</td>
                                                <td><input type="email" class="form-control" name="email" value=<?php echo $email;?>></td>
                                            </tr>
                                            <tr>
                                                <td>Tanggal Terakhir edit :</td>
                                                <td><input type="text" class="form-control" readonly name="date" value=<?php echo $date;?>></td>
                                            </tr>
                                            
                                            <tr>
                                                <td>Komentar :</td>
                                                <td><input type="text" class="form-control" name="comm" value=<?php echo $comm;?>></td>
                                            </tr>
                                            <tr>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <td><input type="hidden" name="id" value=<?php echo $_GET['id']; ?>></td>
                                                <td><input type="submit" name="update" value="Update" class="form-control brn btn-success" style="text-decoration:none; width:20%; text-align:center;border-radius:20px;"></td>
                                            </tr>
                                            <tr>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                            </tr>
                                        </table>
                                    </form>
                                </div>
                            </div>


                            <br />
                            <br />
                        </tbody>
                    </table>
                </div>
                <div class="col-md-2" id="rightboard"></div>
            </div>
        </div>
    </section>
    <!-- akhir Project -->
    <!-- Page content end -->

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>
    -->

    <!-- aos -->
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
        AOS.init({
            delay: 0, // values from 0 to 3000, with step 50ms
            duration: 1000, // values from 0 to 3000, with step 50ms
            easing: "ease-in-out", // default easing for AOS animations
            once: false, // whether animation should happen only once - while scrolling down
            mirror: true, // whether elements should animate out while scrolling past them
            anchorPlacement: "top-bottom", // defines which position of the element regarding to window should trigger the animation
        });
    </script>
    <!-- aos -->

    <!-- gsap -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.6.1/gsap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.6.1/TextPlugin.min.js"></script>

    <script>
        gsap.registerPlugin(TextPlugin);

        gsap.from(".navbar", {
            duration: 1.5,
            y: "-100%",
            ease: "bounce"
        });
        gsap.from(".learnme", {
            duration: 2,
            delay: "5.7",
            opacity: 0,
            y: "+300%",
            ease: "bounce",
        });
        gsap.to(".lead", {
            duration: "3.5",
            delay: "2",
            text: "||Tempat wisata || Wisata Jawa Timur || Wisata Pamekasan ||",
        });
    </script>
    <!-- gsap end -->
</body>

</html>

<!-- unused code -->
<!--
<svg
  xmlns="http://www.w3.org/2000/svg"
  width="16"
  height="16"
  fill="currentColor"
  class="bi bi-telegram"
  viewBox="0 0 16 16"
>
  <path
    d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8.287 5.906c-.778.324-2.334.994-4.666 2.01-.378.15-.577.298-.595.442-.03.243.275.339.69.47l.175.055c.408.133.958.288 1.243.294.26.006.549-.1.868-.32 2.179-1.471 3.304-2.214 3.374-2.23.05-.012.12-.026.166.016.047.041.042.12.037.141-.03.129-1.227 1.241-1.846 1.817-.193.18-.33.307-.358.336a8.154 8.154 0 0 1-.188.186c-.38.366-.664.64.015 1.088.327.216.589.393.85.571.284.194.568.387.936.629.093.06.183.125.27.187.331.236.63.448.997.414.214-.02.435-.22.547-.82.265-1.417.786-4.486.906-5.751a1.426 1.426 0 0 0-.013-.315.337.337 0 0 0-.114-.217.526.526 0 0 0-.31-.093c-.3.005-.763.166-2.984 1.09z"
  />
</svg>
 -->