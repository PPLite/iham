<?php
$server = "localhost";
$user = "root";
$pass = "";
$db = "Your DB"; //Put your db name
$conn = new mysqli($server, $user, $pass, $db);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="Chosen is a jQuery plugin that makes long, unwieldy select boxes much more user-friendly.">
        <meta name="author" content="Nivrutti patil">
        <title>Simple chosen select while dynamically populating select box using PHP MySql</title>
        <script src="dist/jquery-1.11.1.min.js"></script>
        <script src='src/chosen.jquery.min.js'></script>
        <link href='src/chosen.min.css' rel='stylesheet' />
    </head>
    <body>
        <div class="form-group">
            <select  class="form-control chosen-select" name="tvchannel" id="tvchannel">
                <option value="">Select city</option>
                <?php
                $sql = "SELECT city_id, city_name FROM tblcitylist";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        ?>
                        <option value="<?php echo $row["city_id"]; ?>"><?php echo $row["city_name"]; ?></option>
                    <?php
                    }
                }
                ?>
            </select>
        <?php $conn->close(); ?>
``        </div>
    </body>
</html>``

