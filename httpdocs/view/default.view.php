<?php
// default.view.php
if (!isset($_SESSION["user"]["id"])) {
    header('Location: /?view=login');
}
if (isset($_GET["add"]) && is_numeric($_GET["add"])){
    $user_id = $_SESSION["user"]["id"];
    $produkt_id = $_GET["add"];
    $query = "SELECT * FROM warenkorb WHERE k_id = $user_id AND p_id = $produkt_id";
    $result =$db->query($query);
    if ($result->num_rows >0) {
        $row = $result->fetch_assoc();
        $anzahl = $row["anzahl"];
        $id = $row["id"];
        $anzahl++;
        $query = "UPDATE warenkorb SET anzahl = $anzahl WHERE id = $id";
    }else{
        $anzahl=1;
        $query = "INSERT INTO warenkorb (k_id, p_id, anzahl) VALUES ($user_id,$produkt_id, $anzahl)";
    }
    $db->query($query) or die($db->error);

}
?>
<div class = "container">
	<h1>Hello World Shop</h1>
	<div class="row">
		
		<?php
            $query = "SELECT * FROM produkte";
            $result = $db->query($query);
            if ($result->num_rows > 0){
                while ($row = $result->fetch_assoc()){
                    $id = $row["id"];
                    $preis = $row["preis"];
                    $name = $row["name"];
        ?>

            <div class="col-md-3 col-sm-6 col-xs-12 product">
                <div class="row">
                    <div class="col-md-12">
                        <img class="img-responsive thumbnail" src="./img/fff.png" alt="Produktbild">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <?php echo $name?>
                    </div>
                </div>
                <div class="row debug">
                    <div class="col-md-6 col-xs-6">
                        <?php echo $preis?> €
                    </div>
                    <div class="col-md-6 col-xs-6">
                        <a class="btn btn-success" href="?add=<?php echo $id?>">Add to cart!</a>
                    </div>
                </div>
            </div>
        <?php }
            }?>
	</div>
</div>