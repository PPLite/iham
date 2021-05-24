<?php
include('security.php'); 
include('includes/header.php'); 
include('includes/navbar.php');
include('database/dbconfig.php')
?>


<!DOCTYPE html>
<html>
<head>
  <script src="https://unpkg.com/ag-grid-community/dist/ag-grid-community.min.noStyle.js"></script>
  <link rel="stylesheet" href="https://unpkg.com/ag-grid-community/dist/styles/ag-grid.css">
  <link rel="stylesheet" href="https://unpkg.com/ag-grid-community/dist/styles/ag-theme-alpine.css">
</head>
<body>
  <h1>Hello from ag-grid!</h1>

  <div id="myGrid" style="height: 600px;width:500px;" class="ag-theme-alpine"></div>

  <script type="text/javascript" charset="utf-8">
    // specify the columns
    const columnDefs = [
      { field: "jumlah" },
      { field: "rfid_uid" },
      { field: "nama_alat" },
      { field: "deskripsi" },
      { field: "penanggung_jawab" },
      { field: "status_asset" },
      { field: "peminjam" },
      { field: "timestamp" }
    ];

    // let the grid know which columns to use
    const gridOptions = {
      columnDefs: columnDefs
    };

  // lookup the container we want the Grid to use
  const eGridDiv = document.querySelector('#myGrid');

  // create the grid passing in the div to use together with the columns & data we want to use
  new agGrid.Grid(eGridDiv, gridOptions);

  // fetch the row data to use and one ready provide it to the Grid via the Grid API
  agGrid.simpleHttpRequest({url: 'rfid_scaner1_aset.json'})
      .then(data => {
          gridOptions.api.setRowData(data);
      });

  </script>
</body>
</html>





<?php
include('includes/scripts.php');
include('includes/footer.php');
?>