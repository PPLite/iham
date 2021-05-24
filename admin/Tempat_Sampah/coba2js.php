<?php
include('security.php'); 
include('includes/header.php'); 
include('includes/navbar.php');
include('database/dbconfig.php')
?>













<div class="container-fluid">
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary"> Menu Pengelolaan Database</h6>
        <div class="card-body">

        <body>
		<div style="height: 100%; display: flex; flex-direction: column;">
			<div style="margin-bottom: 4px;">
				<button onclick="onUpdateSomeValues()">Update Some Data</button>
			</div>
			<div style="flex-grow: 1;">
				<div id="myGrid" style="height: 100%;" class="ag-theme-alpine">
				</div>
			</div>
		</div>
		<script>var __basePath = './';</script>
		<script src="https://unpkg.com/@ag-grid-enterprise/all-modules@25.2.0/dist/ag-grid-enterprise.min.js">
		</script>
		<script src="js/main.js">
		</script>
	</body>

        </div>
    </div>
  </div>
</div>








<?php
include('includes/scripts.php');
include('includes/footer.php');
?>