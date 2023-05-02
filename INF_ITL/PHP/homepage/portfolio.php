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

    <script type="text/javascript">
    window.onload = function() {
        document.getElementById("b1").src = "assets/deskdown.jpg";

        document.getElementById("b1").onmouseover = function() {
            document.getElementById("b1").src = "assets/deskup.jpg";
        }
        document.getElementById("b1").onmouseout = function() {
            document.getElementById("b1").src = "assets/deskdown.jpg";
        }
    }
    </script>

    <title>AR Portfolio</title>
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
                <h4 class="mb-1">
                    <a data-toggle="collapse" href="#collapseExample1" role="button" aria-expanded="false"
                        aria-controls="collapseExample1" style="text-decoration: none">
                        &#709 2022 Piantor Keyboard
                    </a>
                </h4>
                <div class="collapse" id="collapseExample1">
                    <div class="card card-body">
                        <p>
                            In 2022 I step up my Keyboard game and bout and built a Piantor.
                        </p>
                        <p>
                            This is a mechanical, 42 Key, column staggered, split keyboard.
                            It can be programmed in any way you want and the basic idea is, that
                            we switch between layers to acces everything we want. There is less
                            reaching around for keys but more memorisation and muscle memory.
                        </p>
                        <img id="piantor" src="assets/piantor.jpg">
                        <img>
                    </div>
                </div>

                <h4 class="mb-1">
                    <a data-toggle="collapse" href="#collapseExample2" role="button" aria-expanded="false"
                        aria-controls="collapseExample2" style="text-decoration: none">
                        &#709 2021 Desk Setup
                    </a>
                </h4>
                <div class="collapse" id="collapseExample2">
                    <div class="card card-body">
                        <p>
                            I finaly broke down an bought myself a standing desk. Check it out.
                            I actually put it all together myself. I wanna show you something.
                            Had a long day sittng; want to stand up? Voilá pops right up.
                        </p>
                        <img alt="Grafikwechsel" title="Grafikwechsel" id="b1" />
                    </div>
                </div>

                <h4 class="mb-1">
                    <a data-toggle="collapse" href="#collapseExample3" role="button" aria-expanded="false"
                        aria-controls="collapseExample3" style="text-decoration: none">
                        &#709 2021 Pi Hole
                    </a>
                </h4>
                <div class="collapse" id="collapseExample3">
                    <div class="card card-body">
                        <p>I installed a pi-hole:</p>
                        <a href="https://pi-hole.net/">pi-hole website</a>
                        <p>
                            It is a raspberry pi based network protetcion for every
                            Device in your local network. It can also filter out advertisments which is nice.
                        </p>
                    </div>
                </div>

                <h4 class="mb-1">
                    <a data-toggle="collapse" href="#collapseExample4" role="button" aria-expanded="false"
                        aria-controls="collapseExample4" style="text-decoration: none">
                        &#709 Game Jams
                    </a>
                </h4>
                <div class="collapse" id="collapseExample4">
                    <div class="card card-body">
                        Around 2018 good friends of mine and myself participated in a few gamejams:
                        <a href="https://olivergrack.itch.io/happy-little-pills">Happy little pills</a>
                        <a href="https://ldjam.com/events/ludum-dare/41/secrets-of-the-forest">Secrets of the Forest</a>
                        <a href="https://ldjam.com/events/ludum-dare/42/baby-boom-balance">Baby Boom Balance</a>
                        <a href="https://ldjam.com/events/ludum-dare/46/how-to-raise-a-demon">How to raise a demon</a>
                    </div>
                </div>
            </main>
        </div>
    </div>
</body>

</html>