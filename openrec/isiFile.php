<?php
include 'api/connect.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Style Css -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
        integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="css/isiFile.css">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <title>ITEM 2021 - Ini Talkshow Edukasi Movie</title>
    <link rel="icon" href="asset/LOGO/ITEM/icon-item.png">
</head>

<body>
    <div class="loading-wrapper">
        <div class="loading-inner">
            <img src="asset/LOGO/ITEM/item1.png" alt="" height="80" class="mb-5" loading="lazy">
            <br>
            <div class="spinner-border text-light mb-4" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
    </div>
    <header id="header">
    </header>
    <section class="p-5">
        <div class="container">
            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-6">
                    <h1 class="mb-5 text-center h1">Upload File</h1>
                    <form action="api/uploadFile.php" enctype="multipart/form-data" method="POST">
                        <div class="custom-file mb-4">
                            <input type="file" name="cv" id="cv" class="custom-file-input">
                            <label class="custom-file-label" for="customFileLang">CV</label>
                        </div>
                        <div class="custom-file mb-4">
                            <input type="file" name="transkrip" id="transkrip" class="custom-file-input">
                            <label class="custom-file-label" for="customFileLang">Transkrip Nilai</label>
                        </div>
                        <div class="custom-file mb-4">
                            <input type="file" id="khs" name="khs" class="custom-file-input">
                            <label class="custom-file-label" for="customFileLang">KHS</label>
                        </div>
                        <div class="custom-file mb-4">
                            <input type="file" name="ktm" id="ktm" class="custom-file-input">
                            <label class="custom-file-label" for="customFileLang">KTM</label>
                        </div>
                        <div class="custom-file mb-4">
                            <input type="file" name="skkk" id="skkk" class="custom-file-input">
                            <label class="custom-file-label" for="customFileLang">SKKK</label>
                        </div>
                        <div class="custom-file mb-4">
                            <input type="file" name="foto" id="foto" class="custom-file-input">
                            <label class="custom-file-label" for="customFileLang">Pas Foto</label>
                        </div>
                        <label for="formFileMultiple" class="form-label mb-4">*Untuk format file yang dapat diterima
                            hanya PNG,JPEG,JPG (Untuk CV harus menggunakan PDF)</label>
                        <button type="submit" class="btn btn-primary border-rad">Submit</button>
                    </form>
                </div>
                <div class="col-md-3"></div>
            </div>

    </section>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
        integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js"
        integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous">
    </script>
    <script src="js/app.js"></script>
</body>

</html>