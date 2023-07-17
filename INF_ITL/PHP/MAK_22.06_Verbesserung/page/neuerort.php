<?php
if (isset($_POST['save'])) {
    $plz_nr = $_POST['plz_nr'];
    $ort_id = $_POST['ort_id'];

    // echo '<h3>' . $plz_nr . $ort_id . '</h3>';
    try {
        $insertQuerry = "INSERT INTO plz(plz_nr) VALUES(?);";
        makeStatement($insertQuerry, array($plz_nr));
        $plz_id = $con->lastInsertId();

        if ($ort_id == "null") {
            // echo '<h3>kein ort</h3>';
            $insertStmt2 = 'INSERT INTO ort_plz (ort_id, plz_id) VALUES(NULL, ?)';
            $stmt2 = makeStatement($insertStmt2, array($plz_id));
        } else {
            $insertStmt2 = 'INSERT INTO ort_plz (ort_id, plz_id) VALUES(?, ?)';
            $stmt2 = makeStatement($insertStmt2, array($ort_id, $plz_id));
        }

        echo '<h4>Die PLZ "' . $plz_nr . '" wurde erfolgreich gespeichert!</h4>';

        $selectQuerry2 = "SELECT plz.plz_nr as 'PLZ', ort.ort_name as 'ORT' FROM ort 
                            RIGHT JOIN ort_plz ON ort.ort_id = ort_plz.ort_id
                            RIGHT JOIN plz ON plz.plz_id = ort_plz.plz_id;";
        makeTable($selectQuerry2);
        echo '<button onclick="window.location.href=window.location.href">zurück</button>';
    } catch (Exception $e) {
        switch ($e->getCode()) {
            case 23000:
                echo '<h4>Die Postleitzahl ' . $plz_nr . ' existiert bereits!</h4>';
                $selectQuerry = "SELECT plz.plz_nr as 'PLZ', ort.ort_name as 'ORT' FROM ort 
                                INNER JOIN ort_plz ON ort.ort_id = ort_plz.ort_id
                                INNER JOIN plz ON plz.plz_id = ort_plz.plz_id;";
                $selectResult = makeStatement($selectQuerry);

                // table where we can color a row on a condition
                echo "<table>";
                foreach ($selectResult as $row) {
                    if ($row['PLZ'] == $plz_nr) {
                        echo '<tr style="background-color: yellow;">';
                    } else {
                        echo '<tr>';
                    }
                    // Display the data in each column
                    foreach ($row as $column) {
                        echo "<td>$column</td>";
                    }
                    echo "</tr>";
                }
                echo "</table>";
                echo '<button onclick="window.location.href=window.location.href">zurück</button>';

                break;
            default:
                echo '<h4>Some Error occured</h4>';
        }
    }
} else {
?>
    <html>
    <h3>PLZ hinzufügen</h3>

    <form method="post">
        <div>
            <label for="plz_nr">PLZ</label>
            <input type="number" id="plz_nr" name="plz_nr" required>
        </div>

        <div>
            <label for="ort_id">Ort</label>
            <?php
            global $con;
            $query = 'SELECT ort_id, ort_name FROM ort order by ort_name;';
            $stmt = $con->prepare($query);
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            echo '<select name="ort_id" id="ort_id">';
            foreach ($result as $row) {
                echo '<option value="' . $row['ort_id'] . '">' . $row['ort_name'] . '</option>';
            }
            echo '<option value="null">--- kein Ort ---</option>';
            echo '</select>';
            ?>
        </div>

        <div>
            <input type="submit" name="save" value="hinzufügen">
        </div>
    </form>

    </html>
<?php
}
?>