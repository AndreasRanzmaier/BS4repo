<!-- R. Martl, 15.5.23
     erstellt mit https://startbootstrap.com/sb-form-builder
-->
<?php
echo '<h1>Formular ausfüllen</h1>';

?>
<form method="post">
  <div class="container px-5 my-5">
    <form id="contactForm" data-sb-form-api-token="API_TOKEN">
      <div class="form-floating mb-3">
        <input class="form-control" id="vorname" type="text" placeholder="Vorname" data-sb-validations="required" required/>
        <label for="vorname">Vorname</label>
      </div>
      <div class="form-floating mb-3">
        <input class="form-control" id="nachname" type="text" placeholder="Nachname" data-sb-validations="required" required/>
        <label for="nachname">Nachname</label>
      </div>
      <div class="mb-3">
        <label class="form-label d-block">höchste Schulbildung</label>
        <div class="form-check form-check-inline">
          <input class="form-check-input" id="polytechnikum" type="radio" name="hochsteSchulbildung" data-sb-validations="" />
          <label class="form-check-label" for="polytechnikum">Polytechnikum</label>
        </div>
        <div class="form-check form-check-inline">
          <input class="form-check-input" id="berufsschule" type="radio" name="hochsteSchulbildung" data-sb-validations="" checked />
          <label class="form-check-label" for="berufsschule">Berufsschule</label>
        </div>
        <div class="form-check form-check-inline">
          <input class="form-check-input" id="maturaAbitur" type="radio" name="hochsteSchulbildung" data-sb-validations="" />
          <label class="form-check-label" for="maturaAbitur">Matura/Abitur</label>
        </div>
        <div class="form-check form-check-inline">
          <input class="form-check-input" id="studium" type="radio" name="hochsteSchulbildung" data-sb-validations="" />
          <label class="form-check-label" for="studium">Studium</label>
        </div>
      </div>
      <div class="mb-3">
        <label class="form-label d-block">Welche der folgenden Bücher hast Du schon gelesen?</label>
        <div class="form-check form-check-inline">
          <input class="form-check-input" id="derHerrDerRinge" type="checkbox" name="buch" data-sb-validations="" />
          <label class="form-check-label" for="derHerrDerRinge">Der Herr der Ringe</label>
        </div>
        <div class="form-check form-check-inline">
          <input class="form-check-input" id="derFangerImRoggen" type="checkbox" name="buch" data-sb-validations="" />
          <label class="form-check-label" for="derFangerImRoggen">Der Fänger im Roggen</label>
        </div>
        <div class="form-check form-check-inline">
          <input class="form-check-input" id="sakrileg" type="checkbox" name="buch" data-sb-validations="" />
          <label class="form-check-label" for="sakrileg">Sakrileg</label>
        </div>
      </div>
      <div class="mb-3">
        <label class="form-label d-block">Newsletter</label>
        <div class="form-check form-check-inline">
          <input class="form-check-input" id="ja" type="radio" name="newsletter" data-sb-validations="" checked />
          <label class="form-check-label" for="ja">Ja</label>
        </div>
        <div class="form-check form-check-inline">
          <input class="form-check-input" id="nein" type="radio" name="newsletter" data-sb-validations="" />
          <label class="form-check-label" for="nein">Nein</label>
        </div>
      </div>
      <div class="form-floating mb-3">
        <select class="form-select" id="lieblingsfarbe" aria-label="Lieblingsfarbe:">
          <option value="Rot" checked>Rot</option>
          <option value="Grün">Grün</option>
          <option value="Blau">Blau</option>
          <option value="Gelb">Gelb</option>
          <option value="Schwarz">Schwarz</option>
        </select>
        <label for="lieblingsfarbe">Lieblingsfarbe:</label>
      </div>
      <div class="d-grid">
        <input class="btn btn-primary btn-lg" type="submit" name="send" value="absenden">
      </div>
    </form>
  </div>
  <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
</form>
