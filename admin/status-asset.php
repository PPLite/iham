<?php
include('security.php'); 
include('includes/header.php'); 
include('includes/navbar.php');
?>
<head>
<script src="http://code.jquery.com/jquery-latest.js"></script>
<script>
    $(document).ready(function(){
		 $("#div_refresh").load("mapping.php");
        setInterval(function() {
            $("#div_refresh").load("mapping.php");
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