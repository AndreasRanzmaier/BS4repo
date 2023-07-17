<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrierung</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item active">
                    <a class="nav-link" href="#"><b>Start</b> <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Über uns</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Kontakt</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Registrierung</a>
                </li>
            </ul>
        </div>
    </nav>

    <div class="container mt-5">
        <h1>Registrierung</h1>
        <form>
            <div class="form-group">
                <label for="vorname">Vorname</label>
                <input type="text" class="form-control" id="vorname" placeholder="Vorname eingeben">
            </div>
            <div class="form-group">
                <label for="nachname">Nachname</label>
                <input type="text" class="form-control" id="nachname" placeholder="Nachname eingeben">
            </div>
            <div class="form-group">
                <label for="land">Land</label>
                <select class="form-control" id="land">
                    <option>Deutschland</option>
                    <option>Österreich</option>
                    <option>Schweiz</option>
                </select>
            </div>
            <div class="form-group">
                <label for="schulbildung">Höchste Schulbildung</label>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="schulbildung" id="grundschule" value="Grundschule">
                    <label class="form-check-label" for="grundschule">Grundschule</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="schulbildung" id="hauptschule" value="Hauptschule">
                    <label class="form-check-label" for="hauptschule">Hauptschule</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="schulbildung" id="realschule" value="Realschule">
                    <label class="form-check-label" for="realschule">Realschule</ </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="schulbildung" id="abitur" value="Abitur">
                            <label class="form-check-label" for="abitur">Abitur</label>
                        </div>
                </div>
                <div class="form-group">
                    <label for="buecher">Welche Bücher hast Du schon gelesen?</label>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="harrypotter" value="Harry Potter">
                        <label class="form-check-label" for="harrypotter">Harry Potter</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="herrderringe" value="Der Herr der Ringe">
                        <label class="form-check-label" for="herrderringe">Der Herr der Ringe</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="hobbit" value="Der Hobbit">
                        <label class="form-check-label" for="hobbit">Der Hobbit</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="gameofthrones" value="Game of Thrones">
                        <label class="form-check-label" for="gameofthrones">Game of Thrones</label>
                    </div>
                </div>
                <div class="form-group">
                    <label for="newsletter">Willst Du einen Newsletter beziehen?</label>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="newsletter" id="ja" value="Ja">
                        <label class="form-check-label" for="ja">Ja</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="newsletter" id="nein" value="Nein">
                        <label class="form-check-label" for="nein">Nein</label>
                    </div>
                </div>
                <div class="form-group">
                    <label for="email">E-Mail-Adresse</label>
                    <input type="email" class="form-control" id="email" placeholder="E-Mail-Adresse eingeben">
                </div>
                <div class="form-group">
                    <label for="interesse1">Interesse 1</label>
                    <input type="text" class="form-control" id="interesse1" placeholder="Interesse 1 eingeben">
                </div>
                <div class="form-group">
                    <label for="interesse2">Interesse 2</label>
                    <input type="text" class="form-control" id="interesse2" placeholder="Interesse 2 eingeben">
                </div>
                <button type="submit" style="background-color: #00609C;" class="btn btn-primary">Registrieren</button>
        </form>
    </div>
    <!-- js librarys -->
    <!-- adding at te bottom as they don't need to be loaded at the start -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>

</html>