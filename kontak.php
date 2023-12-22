<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- {{-- Font Awesome --}} -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- {{-- Font Montserrat --}} -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;600;800&display=swap" rel="stylesheet">

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <link rel="stylesheet" href="assets/css/style.css">

    <title>Simpelbang | Contact</title>
</head>

<body>
    <header>
        <?php
        include "partials/navbar.php";
        ?>

        <div class="contact" id="home">
            <div class="box-contact mt-5">
                <div class="containers mt-5">
                    <div class="row content">
                        <div class="col-lg-6">
                            <iframe style="border:0; width: 100%; height: 350px;" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3962.51435440969!2d108.55558737368708!3d-6.70690136556994!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e6ee242aa26fbfb%3A0xc62edc098ce08097!2sKantor%20Wali%20Kota%20Cirebon!5e0!3m2!1sen!2sid!4v1701658834599!5m2!1sen!2sid" frameborder="0" allowfullscreen></iframe>
                        </div>

                        <div class="col-lg-6 pt-4 pt-lg-0">
                            <h5 class="text-light" style="text-align:center">
                                Hubungi Kami
                            </h5>
                            <div class="row">
                                <form action="" method="post">
                                    <div class="row">
                                        <div class="col-md-6 form-group">
                                            <input type="text" name="name" class="form-control" id="name" placeholder="Your Name">
                                        </div>
                                        <div class="col-md-6 form-group mt-3 mt-md-0">
                                            <input type="email" class="form-control" name="email" id="email" placeholder="Your Email">
                                        </div>
                                    </div>
                                    <div class="form-group mt-3">
                                        <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject">
                                    </div>
                                    <div class="form-group mt-3">
                                        <textarea class="form-control" name="msg" rows="5" placeholder="Message"></textarea>
                                    </div>
                                    <div class="d-flex justify-content-end"><button name="btn-send" class="btn mt-2 btn-primary">Send</button></div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <?php
    include "partials/footer.php";
    ?>
    <script src="assets/js/script.js"></script>
</body>

</html>