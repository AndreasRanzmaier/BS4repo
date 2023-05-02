<!DOCTYPE html>

<html lang="en" data-bs-theme="dark">

<head>
    <!-- imports -->
    <!-- Bootsrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
    <!-- jquery -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <!-- popper -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js"
        integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous">
    </script>
    <!-- boot -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js"
        integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous">
    </script>
    <!-- font awesome -->
    <script src="https://kit.fontawesome.com/740a337031.js" crossorigin="anonymous"></script>
    <!-- personal styles -->
    <link href="styles.css" rel="stylesheet">

    <!-- other -->
    <link rel="shortcut icon" type="image/x-icon" href="favicon.png" />

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>AR</title>
</head>

<body>
    <div class="container mt-3">
        <div class="row">
            <!-- side navigation bar always visible -->
            <aside class="col-md-4">
                <!-- Title -->
                <h6 class="mb-1">home page of</h6>
                <h2 class="mb-1">
                    <a href="/index.php" style="text-decoration: none">Andreas Ranzmaier</a>
                </h2>

                <!-- links to social medias -->
                <a href="mailto:a.ranzmaier@gmail.com" target="_blank" rel="noopener noreferrer" id="socialmedia"
                    class="fa-solid fa-envelope"></a>
                <a href="tell: +43 664 73833439" target="_blank" rel="noopener noreferrer" id="socialmedia"
                    class="fa-solid fa-phone"></a>
                <a href="https://www.linkedin.com/in/andreas-ranzmaier-2b095a264/" target="_blank"
                    rel="noopener noreferrer" id="socialmedia" class="fa-brands fa-linkedin"></a>
                <a href="https://discord.gg/rPSR5JNjwZ" target="_blank" rel="noopener noreferrer" id="socialmedia"
                    class="fa-brands fa-discord"></a>
                <a href="https://www.instagram.com/andi_zmoa/" target="_blank" rel="noopener noreferrer"
                    id="socialmedia" class="fa-brands fa-instagram"></a>
                <a href="https://open.spotify.com/user/andreas_ranzmaier?si=0413401df0b7426e" target="_blank"
                    rel="noopener noreferrer" id="socialmedia" class="fa-brands fa-spotify"></a>
                <a href="https://github.com/AndreasRanzmaier" target="_blank" rel="noopener noreferrer" id="socialmedia"
                    class="fa-brands fa-github"></a>


                <h6 class="mb-1">Professional Computer Wizard 🦦</h6>

                <!-- nav for linking other pages and responsive collaps functionality -->
                <nav class="d-block mb-4 p-0 navbar navbar-expand-md navbar-light">
                    <button class="navbar-toggler" type="button" data-toggle="collapse"
                        data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false"
                        aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="navbar-collapse collapse" id="navbarTogglerDemo01" style="">
                        <ul class="flex-column mt-3 nav">
                            <li class="nav-item">
                                <a class="d-inline-block nav-link p-0" href="resume.php">Resume</a>
                            </li>
                            <li class="nav-item">
                                <a class="d-inline-block nav-link p-0" href="portfolio.php">Protfolio</a>
                            </li>
                            <li class="nav-item">
                                <a class="d-inline-block nav-link p-0" href="gallery.php">Gallery</a>
                            </li>
                        </ul>
                    </div>
                </nav>
            </aside>
            <!-- main window which is switched with the nav bar in "aside" -->
            <main class="col-md-8">
                <img id="mejpg" src="assets/me.png">
                <p>Hi, welcome to my Homepage.</p>
                <p>
                    I'm Andreas, a programmer from the small town of Neukirchen a.W.
                    My interessts are archry, programming and tech and board games.
                </p>
                <p>
                    Anyways, feel free to check out the links on the left hand side or on top.
                    There you can find my resume, a portfolio of past and current projects as
                    well as a photo galery.
                </p>
            </main>
        </div>
    </div>
</body>

</html>