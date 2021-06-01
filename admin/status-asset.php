<?php
include('security.php'); 
include('includes/header.php'); 
include('includes/navbar.php');
?>
<head>
<script src="js/jquery-latest.js"></script>
<script>
    $(document).ready(function(){
		 $("#div_refresh").load("halaman/mapping.php");
        setInterval(function() {
            $("#div_refresh").load("halaman/mapping.php");
        }, 1000);
    });
</script>
</head>

<body>
    <div id="div_refresh"></div>
</body>
</html>


<?php
include('includes/footer.php');
?>