<?php
$file = "data.json";
$data_json = file_get_contents($file);
$data = json_decode($data_json,true);
if ($_SERVER["REQUEST_METHOD"]==="POST"){
    $temp = [
        "nama" => $_POST["masakan"],
        "email" => $_POST["email"],
        "bahan" => $_POST["bahan"],
        "cara" => $_POST["cara"]
    ];
    if(strcmp($_POST["kategori"],"Tradisional")==0){
        array_push($data["tradisional"],$temp);
    }else{
        array_push($data["modern"],$temp);
    }
    $json_file = json_encode($data, JSON_PRETTY_PRINT);
    $data_json = file_put_contents($file,$json_file);
}
$tradisional = array($data["tradisional"]);
$modern = array($data["modern"]);
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
  </head>
  <body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <a class="navbar-brand ml-3" href="#"><strong>KueKita</strong></a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse ml-5" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item active">
            <a class="nav-link ml-3" href="#">Home <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link ml-3" href="#tradisional">Tradisional</a>
          </li>
          <li class="nav-item">
            <a class="nav-link ml-3" href="#kekinian">Kekinian</a>
          </li>
          <li class="nav-item">
            <a class="nav-link ml-3" href="#resep">Masukkan Resep</a>
          </li>
          <li class="nav-item">
            <a class="nav-link ml-3" href="#us">About Us</a>
          </li>
        </ul>
        <form class="form-inline my-2 my-lg-0">
          <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
          <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        </form>
      </div>
    </nav>
    <div class="jumbotron">
      <h1 class="display-4"><strong>Hello Chef!</strong></h1>
      <p class="lead">Temukan aneka resep kue tradisional dan kekinian yang kamu cari</p>
      <hr class="my-3">
      <a class="btn btn-outline-success btn-lg" href="#" role="button">MULAI</a>
    </div>

<!-- page 2 -->
<section id="tradisional">
  <h2>Kue Tradisional</h2>
    <div class="row">
        <?php foreach ($tradisional as $object):
            foreach ($object as $value):?>
      <div class="card" style="width: 20rem;">
        <img src="img/kuelapis.jpg" class="card-img-top" alt="...">
        <div class="card-body">
          <h5 class="card-title"><?= $value["nama"] ?></h5>
          <p class="card-text">Kue Tradisional yang tak pernah terlewatkan di setiap acara.</p>
          <a href="#" class="btn btn-success">MASAK</a>
        </div>
      </div>
        <?php endforeach; endforeach;?>
    </div>
</section>

<!-- page 3 -->
<section id="kekinian" style="background-color: #DCDCDC;">
  <h2>Kue Kekinian</h2>
    <div class="row">
        <?php foreach ($modern as $object):
        foreach ($object as $value):?>
      <div class="card" style="width: 20rem;">
        <img src="img/donat.jpg" class="card-img-top" alt="...">
        <div class="card-body">
          <h5 class="card-title"><?= $value["nama"] ?></h5>
          <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce imperdiet tempor lacus sed aliquam. Maecenas placerat fermentum odio, eu laoreet risus scelerisque eu. Sed sit amet dui augue. Duis dapibus efficitur placerat.</p>
          <a href="#" class="btn btn-success">MASAK</a>
        </div>
      </div>
        <?php endforeach;endforeach;?>
    </div>
</section>

<!-- page 4 -->
<section id="resep">
  <h2>Tulis Resepmu</h2>
    <form action="index.php" method="post">
        <div class="container">
          <div class="row">
            <div class="col-md-7">
              <div class="form-group">
                <label><strong>Nama Masakan</strong></label>
                <input type="text" name="masakan" class="form-control">
              </div>
                <div class="form-group">
                    <label><strong>Kategori</strong></label>
                    <select name="kategori" id="kategori" class="form-control">
                        <option value="Tradisional">tradisional</option>
                        <option value="modern">modern</option>
                    </select>
                </div>
              <div class="form-group">
                <label><strong>Email</strong></label>
                <input type="email" name="email" class="form-control">
              </div>
              <div class="form-group">
                <label><strong>Bahan</strong></label>
                <textarea type="text" class="form-control" rows="25" name="bahan"></textarea>
              </div>
              <div class="form-group">
                <label><strong>Cara Masak</strong></label>
                <textarea type="text" class="form-control" rows="50" name="cara"></textarea>
              </div>
              <button type="submit" class="btn btn-success" name="submit">KIRIM</button>
            </div>
            <div class="col-md-5">
              <img src="img/cooking.png" width="500px">
            </div>
          </div>
        </div>
    </form>
</section>

<!-- page 4 -->
<section id="us" style="background-color: #DCDCDC;">
  <h2>About Us</h2>
  <div class="container">
    <div class="row">
      <div class="col-md-6">
        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce imperdiet tempor lacus sed aliquam. Maecenas placerat fermentum odio, eu laoreet risus scelerisque eu. Sed sit amet dui augue. Duis dapibus efficitur placerat.
      </div>
      <div class="col-md-6">
        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce imperdiet tempor lacus sed aliquam. Maecenas placerat fermentum odio, eu laoreet risus scelerisque eu. Sed sit amet dui augue. Duis dapibus efficitur placerat.
      </div>
    </div>
  </div>
</section>

<footer style="background-color: #2F4F4F;">
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">

          <p class="copyright text-center">Copyright &copy; "182410102052" 2020</p>
        </div>
      </div>
    </div>
  </footer>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  </body>
</html>
