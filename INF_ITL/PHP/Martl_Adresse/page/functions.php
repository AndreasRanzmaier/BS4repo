<?php
function maketable($query)
{
    
global $con;    

    try{
        $stmt = $con->prepare($query);
        $stmt->execute();
        //Tabelle mit 'dynamischer' Spaltenbezeichnung mittels meta-Daten
        $meta = array();
        echo '<table class="table">
                <tr>';
                    $colCount = $stmt->columnCount();
                    for ($i=0; $i < $colCount; $i++) { 
                        $meta[] = $stmt->getColumnMeta($i);
                        echo '<th>'.$meta[$i]['name'].'</th>';
                    }
                echo '</tr>';
                    while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
                        echo '<tr>';
                            foreach ($row as $r ) {
                                echo '<td>'.$r.'</td>';
                            }
                        echo '</tr>';
                    }
                echo '</table>';
    
    
    }
    catch(Exception $e)
    {
        echo 'Error - Tabelle Adresse: '.$e->getCode().': '.$e->getMessage().'<br>';
    }
}

function makeStatement($query, $executeArray = NULL)
{
    global $con;
    $stmt = $con->prepare($query);
    $stmt->execute($executeArray);
    return $stmt;
}