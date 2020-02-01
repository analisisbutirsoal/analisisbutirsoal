<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <title>Online Test</title>
    <style>
        html, body{
            height: 100%;
            background: url('asset/bg.png') fixed center no-repeat;
            background-size: cover;
            line-height: 30px;
        }
        #masuk{
            margin-left: 45px;
        }
        .jumbotron {
            background-color: transparent;
        }
        .btn-round{
            border-radius: 1000px;
            padding-left: 25px;
            padding-right: 25px;
            margin-right: 10px;
        }
    </style>
    <script type="text/javascript">
        function show() {
            document.getElementById("btnMasuk").style.display = "none";
            document.getElementById("masuk").style.display = "block";
        }
        function hideModal() {
            $('#modalLogin').modal('hide');
        }
    </script>
</head>
<body>
    <div class="container h-100 p-0">
        <div class="row h-100 justify-content-around align-items-center">
            <div class="col-md">
                <img class="img-fluid" style="max-width:100%; height: auto;" src="<?php echo base_url(); ?>asset/school.png" alt="">
            </div>
            <div class="col-md pl-5">
                <h1 class="display-4">
                    Welcome<br>to Our School
                </h1>
                <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Iste quae quisquam corrupti inventore, tempora architecto quia impedit omnis</p>
                <button id="btnMasuk" type="button" data-toggle="modal" data-target="#modalLogin" class="btn btn-primary btn-round w-25"><b>Login</b></button>
            </div>
        </div>
    </div>

    <!-- Modal login -->
    <div class="modal fade" id="modalLogin" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="col-12 modal-title text-center" id="exampleModalCenterTitle">Login
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </h5>
                </div>
                <div class="modal-body"> <!-- Default form login -->
                    <form class="text-center border border-light p-3" method="post" action="<?= base_url('index.php/c_home/login');?>">
                        <input type="text" name="username" id="defaultLoginFormUsername" class="form-control mb-4" placeholder="Username" required>
                        <input type="password" name="password" id="defaultLoginFormPassword" class="form-control mb-4" placeholder="Password" minlength="8" required>
                        <!-- Sign in button -->
                        <button class="btn btn-primary btn-block mb-2" type="submit">Login</button>
                        <!-- Register -->
                        <a id="aktivasi" href="" onclick="hideModal()" data-toggle="modal" data-target="#modalAktivasi">Aktivasi akun</a>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Aktivasi -->
    <div class="modal fade" id="modalAktivasi" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="col-12 modal-title text-center" id="exampleModalCenterTitle">Aktivasi Akun
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </h5>
                </div>
                <div class="modal-body"> 
                    <form class="text-center border border-light p-3" method="post" action="<?= base_url('index.php/c_home/aktivasi');?>">
                    <input type="text"  name="Id" id="Id" class="form-control mb-4" placeholder="Masukkan Nomor Induk" required>
                    <input type="email" name="Email" id="Email" class="form-control mb-4" placeholder="Masukkan Email" required>
                        <!-- Sign in button -->
                        <button class="btn btn-primary btn-block mb-2" type="submit">Aktifkan Akun</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>

