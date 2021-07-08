<!DOCTYPE html>
<html>
  <head>
    
  </head>
  <body class="skin-blue">
    <div class="wrapper">
      <div class="box">
            <!---capacity monitoring-->
            <div class="col-md-12">
              <div class="box">
                <div class="box-header with-border">
                  <h3 class="box-title">Room Allocation</h3>
                  <div class="box-tools pull-right">
                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    <div class="btn-group"></div>
                    <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                  </div>
                </div><!-- /.box-header -->

                <div class="box-body">
                  <div class="row">
                    <div class="col-md-12">
                      <p class="text-center">
                        <strong>Period: 1 Jun, 2021 - 30 Jul, 2021</strong>
                      </p>
                      <div class="chart-responsive">
                        <!-- Sales Chart Canvas -->
                        <canvas id="salesChart" height="180"></canvas>
                      </div><!-- /.chart-responsive -->
                    </div><!-- /.col -->
                  </div><!-- /.row -->
                </div><!-- ./box-body -->

                <div class="box-footer">
                  <div class="row">
                    <div class="col-sm-3 col-xs-6">
                      <div class="description-block border-right">
                        <span class="description-percentage text-green"><i class="fa fa-caret-up"></i> 17%</span>
                        <h5 class="description-header">200</h5>
                        <span class="description-text">TOTAL PATIENT</span>
                      </div><!-- /.description-block -->
                    </div><!-- /.col -->
                    <div class="col-sm-3 col-xs-6">
                      <div class="description-block border-right">
                        <span class="description-percentage text-yellow"><i class="fa fa-caret-left"></i> 0%</span>
                        <h5 class="description-header">10</h5>
                        <span class="description-text">HIGH RISK PATIENT</span>
                      </div><!-- /.description-block -->
                    </div><!-- /.col -->
                    <div class="col-sm-3 col-xs-6">
                      <div class="description-block border-right">
                        <span class="description-percentage text-green"><i class="fa fa-caret-up"></i> 20%</span>
                        <h5 class="description-header">150</h5>
                        <span class="description-text">MIDDLE RISK PATIENT</span>
                      </div><!-- /.description-block -->
                    </div><!-- /.col -->
                    <div class="col-sm-3 col-xs-6">
                      <div class="description-block">
                        <span class="description-percentage text-red"><i class="fa fa-caret-down"></i> 18%</span>
                        <h5 class="description-header">40</h5>
                        <span class="description-text">INFANT PATIENT</span>
                      </div><!-- /.description-block -->
                    </div>
                  </div><!-- /.row -->
                </div><!-- /.box-footer -->
              </div><!-- /.box -->
            </div><!-- /.col -->
      </div><!-- /. box -->

      <!---for menu recommendation -->
      <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
	    <div class="container">
	    
	      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
	        <span class="fa fa-bars"></span> Menu
	      </button>
				<form action="#" class="searchform order-lg-last">
          <div class="form-group d-flex">
            <input type="text" class="form-control pl-3" placeholder="Search">
            <button type="submit" placeholder="" class="form-control search"><span class="fa fa-search"></span></button>
          </div>
        </form>
        <!---Menu Dropdown-->
	      <div class="collapse navbar-collapse" id="ftco-nav">
	        <ul class="navbar-nav mr-auto">
	        	<li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="dropdown04" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Select Room</a>
              <div class="dropdown-menu" aria-labelledby="dropdown04">
              	<a class="dropdown-item" href="halaman/Recommendation.php">Get Recommendation</a>
                <a class="dropdown-item" href="#">Emergency Room</a>
                <a class="dropdown-item" href="#">Basic Room</a>
                <a class="dropdown-item" href="#">ICU</a>
              </div>
            </li>
	         </ul>
	       </div>
	     </div>
	     </nav>


      <!---for bed monitoring-->
      <div class="row">
        <!--recom page-->
        <div class="col-lg-4 mb-5">
          <div class="cards">
            <h5>Data Pasien</h5>
            <div class="card-body">
              <form>
                
              </form>
              <form method=POST>
                  <input type="submit" value="GO" name="GO">
              </form>
            </div>
          </div>
        </div><!-- /.col -->

        <!--bed monitor status -->
        <div class="col-lg-8 mb-5">
          <div class= "card-columns">
            <!-- Info Boxes Style 2 -->
            <div class="card bg-primary text-white shadow mb-3">
                        <div class="card-body">
                          <span class="info-box-icon"><i class="fas fa-clinic-medical"></i></span>
                          <span class="info-box-text">Pavilium IA-1</span>
                          <div class="progress">
                            <div class="progress-bar" style="width: 20%"></div>
                          </div>
                          <span class="progress-description">
                              Kasur kosong :
                          </span>
                        </div>
                      
            </div><!-- /.info-box -->

            <div class="card text-white bg-warning mb-3">
                        <div class="card-body">
                          <span class="info-box-icon"><i class="fas fa-clinic-medical"></i></span>
                          <span class="info-box-text">Pavilium KA-1</span>
                          <div class="progress">
                            <div class="progress-bar" style="width: 20%"></div>
                          </div>
                          <span class="progress-description">
                              Kasur kosong :
                          </span>
                        </div>
            </div><!-- /.info-box -->

            <div class="card bg-primary text-white shadow mb-3">
                        <div class="card-body">
                          <span class="info-box-icon"><i class="fas fa-clinic-medical"></i></span>
                          <span class="info-box-text">Pavilium IA-2</span>
                          <div class="progress">
                            <div class="progress-bar" style="width: 20%"></div>
                          </div>
                          <span class="progress-description">
                              Kasur kosong :
                          </span>
                        </div>
            </div><!-- /.info-box -->

            <div class="card text-white bg-danger mb-3">
                      <div class="card-body">
                          <span class="info-box-icon"><i class="fas fa-clinic-medical"></i></span>
                          <span class="info-box-text">HCU IA</span>
                          <div class="progress">
                            <div class="progress-bar" style="width: 20%"></div>
                          </div>
                          <span class="progress-description">
                              Kasur kosong :
                          </span>
                        </div>
            </div><!-- /.info-box -->

            <!-- Info Boxes Style 2 -->
            <div class="card text-white bg-danger mb-3">
                        <div class="card-body">
                          <span class="info-box-icon"><i class="fas fa-clinic-medical"></i></span>
                          <span class="info-box-text">HCU IA</span>
                          <div class="progress">
                            <div class="progress-bar" style="width: 20%"></div>
                          </div>
                          <span class="progress-description">
                              Kasur kosong :
                          </span>
                        </div>
            </div><!-- /.info-box -->

            <div class="card text-white bg-danger mb-3">
                        <div class="card-body">
                          <span class="info-box-icon"><i class="fas fa-clinic-medical"></i></span>
                          <span class="info-box-text">HCU IA</span>
                          <div class="progress">
                            <div class="progress-bar" style="width: 20%"></div>
                          </div>
                          <span class="progress-description">
                              Kasur kosong :
                          </span>
                        </div>
            </div><!-- /.info-box -->

            <div class="card text-white bg-danger mb-3">
                        <div class="card-body">
                          <span class="info-box-icon"><i class="fas fa-clinic-medical"></i></span>
                          <span class="info-box-text">HCU IA</span>
                          <div class="progress">
                            <div class="progress-bar" style="width: 20%"></div>
                          </div>
                          <span class="progress-description">
                              Kasur kosong :
                          </span>
                        </div>
            </div><!-- /.info-box -->

            <div class="card text-white bg-danger mb-3">
                        <div class="card-body">
                          <span class="info-box-icon"><i class="fas fa-clinic-medical"></i></span>
                          <span class="info-box-text">HCU IA</span>
                          <div class="progress">
                            <div class="progress-bar" style="width: 20%"></div>
                          </div>
                          <span class="progress-description">
                              Kasur kosong :
                          </span>
                        </div>
            </div><!-- /.info-box -->

            <div class="card bg-primary text-white shadow mb-3">
                        <div class="card-body">
                          <span class="info-box-icon"><i class="fas fa-clinic-medical"></i></span>
                          <span class="info-box-text">Pavilium IA-1</span>
                          <div class="progress">
                            <div class="progress-bar" style="width: 20%"></div>
                          </div>
                          <span class="progress-description">
                              Kasur kosong :
                          </span>
                        </div>
                      
            </div><!-- /.info-box -->

            <div class="card text-white bg-warning mb-3">
                        <div class="card-body">
                          <span class="info-box-icon"><i class="fas fa-clinic-medical"></i></span>
                          <span class="info-box-text">Pavilium KA-1</span>
                          <div class="progress">
                            <div class="progress-bar" style="width: 20%"></div>
                          </div>
                          <span class="progress-description">
                              Kasur kosong :
                          </span>
                        </div>
            </div><!-- /.info-box -->

            <div class="card bg-primary text-white shadow mb-3">
                        <div class="card-body">
                          <span class="info-box-icon"><i class="fas fa-clinic-medical"></i></span>
                          <span class="info-box-text">Pavilium IA-2</span>
                          <div class="progress">
                            <div class="progress-bar" style="width: 20%"></div>
                          </div>
                          <span class="progress-description">
                              Kasur kosong :
                          </span>
                        </div>
            </div><!-- /.info-box -->

            <div class="card text-white bg-danger mb-3">
                      <div class="card-body">
                          <span class="info-box-icon"><i class="fas fa-clinic-medical"></i></span>
                          <span class="info-box-text">HCU IA</span>
                          <div class="progress">
                            <div class="progress-bar" style="width: 20%"></div>
                          </div>
                          <span class="progress-description">
                              Kasur kosong :
                          </span>
                        </div>
            </div><!-- /.info-box -->
          </div>
        </div><!-- /.col --> 
      </div><!-- /.row -->
    </div>

    <?php
      $param1 = 1; $param2= 1;
	    if(isset($_POST['GO']))
    	{
        $a = "C:/Program Files/Python37/python.exe  D:/xampp/htdocs/admin/recommentdation/mkdir.py '$param1''$param2'";
        $output = shell_exec($a);
        echo $output;
        #shell_exec("python /admin/recommentdation/mkdir.py");
        echo 'success';
    	}
        ?>
    <!--Javascript-->
  <script src="js/Bar_menu/jquery.min.js"></script>
  <script src="js/Bar_menu/popper.js"></script>
  <script src="js/Bar_menu/bootstrap.min.js"></script>
  <script src="js/Bar_menu/main.js"></script>
  </body>
</html>