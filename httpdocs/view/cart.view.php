<?php
if (!isset($_SESSION["user"]["id"])) {
    header('Location: /?view=login');
}
//cart.view.php

$user_id = $_SESSION["user"]["id"];
$query = "SELECT 
            warenkorb.anzahl AS produkt_anzahl,
            kunden.id        AS kunden_id,
            kunden.vorname   AS kunden_vorname,
            kunden.nachname  AS kunden_nachname,
            kunden.email     AS kunden_email,
            kunden.adresse   AS kunden_adresse,
            produkte.name     AS produkt_name,
            produkte.preis    AS produkt_preis
          FROM warenkorb
          INNER JOIN kunden   ON warenkorb.k_id = kunden.id
          INNER JOIN produkte ON warenkorb.p_id = produkte.id
          WHERE warenkorb.k_id = $user_id;
          ";
$result = $db->query($query) or die($db->error);
echo("<table class='table table-striped'>");
while ($row = $result->fetch_assoc()){
    $produkt = $row["produkt_name"];
    $preis = $row["produkt_preis"];
    $anzahl = $row["produkt_anzahl"];
    echo ("<tr>");
    echo("<td>$produkt</td>");
    echo("<td>$preis €</td>");
    echo("<td>$anzahl </td>");
    echo("<td>". ($preis*$anzahl) . " €</td>");
    echo("</tr>");
}
?>