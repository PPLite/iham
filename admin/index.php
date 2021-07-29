<?php
include('security.php');
include('includes/header.php');
include('includes/navbar.php');
include_once('database/dbconfig.php');
?>

<!-- Begin Page Content -->
<div class="container-fluid">
  <P class="h3 mb-0 text-gray-800">INTEGRATED HOSPITAL ASSET MANAGEMENT </P>
  <P class="h5 mb-0 text-gray-800">Rumah Sakit Ibu Dan Anak </P>
  <P class="h7 mb-0 text-gray-800">Jl. Arif Rahmad Hakim. No 39. Sukolilo Surabaya </P>


  <!-- Page Heading -->
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
  </div>



  <!-- Content Row -->
  <div class="row">

    <div class="col-xl-2 col-md-6 mb-4">
      <div class="card shadow h-100 py-2">
        <div class="card-body">
          <a href=#modalregister data-toggle="modal" style="text-decoration:none;">
            <div style="text-align: center">
              <span class="fa fa-user-plus fa-2x text-center text-success"></span>
            </div>

            <div style="text-align: center">
              <div class=" text-m text-success">Registrasi</div>
            </div>
          </a>
        </div>
      </div>
    </div>

    <div class="col-xl-2 col-md-6 mb-4">
      <div class="card shadow h-100 py-2">
        <div class="card-body">
          <a href=#modaldokter data-toggle="modal" style="text-decoration:none;">
            <div style="text-align: center">
              <span class="fa fa-user-md fa-2x text-center text-primary"></span>
            </div>

            <div style="text-align: center">
              <div class=" text-m text-primary">Dokter</div>
            </div>
          </a>
        </div>
      </div>
    </div>

    <div class="col-xl-2 col-md-6 mb-4">
      <div class="card shadow h-100 py-2">
        <div class="card-body">
          <a href=#modalperawat data-toggle="modal" style="text-decoration:none;">
            <div style="text-align: center">
              <span class="fa fa-user-nurse fa-2x text-center text-success"></span>
            </div>

            <div style="text-align: center">
              <div class=" text-m text-success">Perawat</div>
            </div>
          </a>
        </div>
      </div>
    </div>

    <div class="col-xl-2 col-md-6 mb-4">
      <div class="card shadow h-100 py-2">
        <div class="card-body">
          <a href=#modalkaryawan data-toggle="modal" style="text-decoration:none;">
            <div style="text-align: center">
              <span class="fa fa-user-alt fa-2x text-center text-warning"></span>
            </div>

            <div style="text-align: center">
              <div class=" text-m text-warning">Karyawan</div>
            </div>
          </a>
        </div>
      </div>
    </div>

    <div class="col-xl-2 col-md-6 mb-4">
      <div class="card shadow h-100 py-2">
        <div class="card-body">
          <a href=#modalpasien data-toggle="modal" style="text-decoration:none;">
            <div style="text-align: center">
              <span class="fa fa-user-injured fa-2x text-center text-danger"></span>
            </div>

            <div style="text-align: center">
              <div class=" text-m text-danger">Pasien</div>
            </div>
          </a>
        </div>
      </div>
    </div>

    <div class="col-xl-2 col-md-6 mb-4">
      <div class="card shadow h-100 py-2">
        <div class="card-body">
          <a href=#modalbayi data-toggle="modal" style="text-decoration:none;">
            <div style="text-align: center">
              <span class="fa fa-baby fa-2x text-center text-info"></span>
            </div>

            <div style="text-align: center">
              <div class=" text-m text-info">Bayi</div>
            </div>
          </a>
        </div>
      </div>
    </div>

    <div class="col-xl-2 col-md-6 mb-4">
      <div class="card shadow h-100 py-2">
        <div class="card-body">
          <a href=#modalbarang data-toggle="modal" style="text-decoration:none;">
            <div style="text-align: center">
              <span class="fa fa-medkit fa-2x text-center text-dark"></span>
            </div>

            <div style="text-align: center">
              <div class=" text-m text-dark">Peralatan Medis</div>
            </div>
          </a>
        </div>
      </div>
    </div>

    <div class="col-xl-2 col-md-6 mb-4">
      <div class="card shadow h-100 py-2">
        <div class="card-body">
          <a href=#modalpengadaan data-toggle="modal" style="text-decoration:none;">
            <div style="text-align: center">
              <span class="fas fa-boxes fa-2x text-center text-dark"></span>
            </div>

            <div style="text-align: center">
              <div class=" text-m text-dark">Pengadaan Peralatan Medis</div>
            </div>
          </a>
        </div>
      </div>
    </div>

    <div class="col-xl-2 col-md-6 mb-4">
      <div class="card shadow h-100 py-2">
        <div class="card-body">
          <a href=pesan-ruang.php style="text-decoration:none;">
            <div style="text-align: center">
              <span class="fa fa-procedures fa-2x text-center text-dark"></span>
            </div>

            <div style="text-align: center">
              <div class=" text-m text-dark">Pesan Kamar</div>
            </div>
          </a>
        </div>
      </div>
    </div>

    <div class="col-xl-2 col-md-6 mb-4">
      <div class="card shadow h-100 py-2">
        <div class="card-body">
          <a href=pengaturan-pengguna.php style="text-decoration:none;">
            <div style="text-align: center">
              <span class="fa fa-cogs fa-2x text-center text-secondary"></span>
            </div>

            <div style="text-align: center">
              <div class=" text-m text-secondary">Pengaturan Pengguna</div>
            </div>
          </a>
        </div>
      </div>
    </div>

    <div class="col-xl-2 col-md-6 mb-4">
      <div class="card shadow h-100 py-2">
        <div class="card-body">
          <a href=status-asset.php style="text-decoration:none;">
            <div style="text-align: center">
              <span class="fa fa-search-location fa-2x text-center text-dark"></span>
            </div>

            <div style="text-align: center">
              <div class=" text-m text-dark">Monitoring Aset</div>
            </div>
          </a>
        </div>
      </div>
    </div>

  </div>
</div>

<!-- Content Row -->

<div class="row">


</div>
</div>


<!------------------------------FUNGSI MODAL REGISTRASI------------------------------------->
<div class="modal fade" id="modalregister" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Menu Registrasi</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <div class="modal-body">

        <div class="row">

          <div class="col-lg-4 mb-4">
            <div class="card shadow h-100 py-2">
              <div class="card-body">
                <a href=tambah-dokter.php style="text-decoration:none;">
                  <div style="text-align: center">
                    <span class="fa fa-user-md fa-2x text-center text-success"></span>
                  </div>

                  <div style="text-align: center">
                    <div class=" text-m text-dark">Registrasi Dokter</div>
                  </div>
                </a>
              </div>
            </div>
          </div>

          <div class="col-lg-4 mb-4">
            <div class="card shadow h-100 py-2">
              <div class="card-body">
                <a href=tambah-pasien-dewasa.php style="text-decoration:none;">
                  <div style="text-align: center">
                    <span class="fa fa-user-injured fa-2x text-center text-danger"></span>
                  </div>

                  <div style="text-align: center">
                    <div class=" text-m text-dark">Registrasi Pasien Dewasa</div>
                  </div>
                </a>
              </div>
            </div>
          </div>

          <div class="col-lg-4 mb-4">
            <div class="card shadow h-100 py-2">
              <div class="card-body">
                <a href=tambah-aset-bayi.php style="text-decoration:none;">
                  <div style="text-align: center">
                    <span class="fa fa-baby fa-2x text-center text-info"></span>
                  </div>

                  <div style="text-align: center">
                    <div class=" text-m text-dark">Registrasi Bayi</div>
                  </div>
                </a>
              </div>
            </div>
          </div>

          <div class="col-lg-4 mb-4">
            <div class="card shadow h-100 py-2">
              <div class="card-body">
                <a href=tambah-perawat.php style="text-decoration:none;">
                  <div style="text-align: center">
                    <span class="fa fa-user-nurse fa-2x text-center text-primary"></span>
                  </div>

                  <div style="text-align: center">
                    <div class=" text-m text-dark">Registrasi Perawat</div>
                  </div>
                </a>
              </div>
            </div>
          </div>

          <div class="col-lg-4 mb-4">
            <div class="card shadow h-100 py-2">
              <div class="card-body">
                <a href=tambah-karyawan.php style="text-decoration:none;">
                  <div style="text-align: center">
                    <span class="fa fa-user fa-2x text-center text-warning"></span>
                  </div>

                  <div style="text-align: center">
                    <div class=" text-m text-dark">Registrasi Karyawan</div>
                  </div>
                </a>
              </div>
            </div>
          </div>

          <div class="col-lg-4 mb-4">
            <div class="card shadow h-100 py-2">
              <div class="card-body">
                <a href=tambah-aset-barang.php style="text-decoration:none;">
                  <div style="text-align: center">
                    <span class="fa fa-medkit fa-2x text-center text-dark"></span>
                  </div>

                  <div style="text-align: center">
                    <div class=" text-m text-dark">Registrasi Peralatan Medis</div>
                  </div>
                </a>
              </div>
            </div>
          </div>

        </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
      </div>

    </div>
  </div>
</div>

<!------------------------------FUNGSI MODAL DOKTER------------------------------------->
<div class="modal fade" id="modaldokter" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Menu Dokter</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <div class="modal-body">

        <div class="row">

          <div class="col-lg-4 mb-4">
            <div class="card shadow h-100 py-2">
              <div class="card-body">
                <a href=daftar-dokter.php style="text-decoration:none;">
                  <div style="text-align: center">
                    <span class="far fa-address-book fa-2x text-center text-primary"></span>
                  </div>

                  <div style="text-align: center">
                    <div class=" text-m text-dark">Daftar Dokter</div>
                  </div>
                </a>
              </div>
            </div>
          </div>

          <div class="col-lg-4 mb-4">
            <div class="card shadow h-100 py-2">
              <div class="card-body">
                <a href=log-data-dokter.php style="text-decoration:none;">
                  <div style="text-align: center">
                    <span class="fas fa-history fa-2x text-center text-danger"></span>
                  </div>

                  <div style="text-align: center">
                    <div class=" text-m text-dark">Log Data Dokter</div>
                  </div>
                </a>
              </div>
            </div>
          </div>

          <div class="col-lg-4 mb-4">
            <div class="card shadow h-100 py-2">
              <div class="card-body">
                <a href=pengaturan-dokter.php style="text-decoration:none;">
                  <div style="text-align: center">
                    <span class="fas fa-user-cog fa-2x text-center text-info"></span>
                  </div>

                  <div style="text-align: center">
                    <div class=" text-m text-dark">Pengaturan Data Dokter</div>
                  </div>
                </a>
              </div>
            </div>
          </div>

        </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
      </div>

    </div>
  </div>
</div>

<!------------------------------FUNGSI MODAL PERAWAT------------------------------------->
<div class="modal fade" id="modalperawat" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Menu Perawat</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <div class="modal-body">

        <div class="row">

          <div class="col-lg-4 mb-4">
            <div class="card shadow h-100 py-2">
              <div class="card-body">
                <a href=daftar-perawat.php style="text-decoration:none;">
                  <div style="text-align: center">
                    <span class="far fa-address-book fa-2x text-center text-success"></span>
                  </div>

                  <div style="text-align: center">
                    <div class=" text-m text-dark">Daftar Perawat</div>
                  </div>
                </a>
              </div>
            </div>
          </div>

          <div class="col-lg-4 mb-4">
            <div class="card shadow h-100 py-2">
              <div class="card-body">
                <a href=log-data-perawat.php style="text-decoration:none;">
                  <div style="text-align: center">
                    <span class="fas fa-history fa-2x text-center text-danger"></span>
                  </div>

                  <div style="text-align: center">
                    <div class=" text-m text-dark">Log Data Perawat</div>
                  </div>
                </a>
              </div>
            </div>
          </div>

          <div class="col-lg-4 mb-4">
            <div class="card shadow h-100 py-2">
              <div class="card-body">
                <a href=pengaturan-perawat.php style="text-decoration:none;">
                  <div style="text-align: center">
                    <span class="fas fa-user-cog fa-2x text-center text-info"></span>
                  </div>

                  <div style="text-align: center">
                    <div class=" text-m text-dark">Pengaturan Data Perawat</div>
                  </div>
                </a>
              </div>
            </div>
          </div>

        </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
      </div>

    </div>
  </div>
</div>

<!------------------------------FUNGSI MODAL KARYAWAN------------------------------------->
<div class="modal fade" id="modalkaryawan" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Menu Karyawan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <div class="modal-body">

        <div class="row">

          <div class="col-lg-4 mb-4">
            <div class="card shadow h-100 py-2">
              <div class="card-body">
                <a href=daftar-karyawan.php style="text-decoration:none;">
                  <div style="text-align: center">
                    <span class="far fa-address-book fa-2x text-center text-warning"></span>
                  </div>

                  <div style="text-align: center">
                    <div class=" text-m text-dark">Daftar Karyawan</div>
                  </div>
                </a>
              </div>
            </div>
          </div>

          <div class="col-lg-4 mb-4">
            <div class="card shadow h-100 py-2">
              <div class="card-body">
                <a href=log-data-karyawan.php style="text-decoration:none;">
                  <div style="text-align: center">
                    <span class="fas fa-history fa-2x text-center text-danger"></span>
                  </div>

                  <div style="text-align: center">
                    <div class=" text-m text-dark">Log Data Karyawan</div>
                  </div>
                </a>
              </div>
            </div>
          </div>

          <div class="col-lg-4 mb-4">
            <div class="card shadow h-100 py-2">
              <div class="card-body">
                <a href=pengaturan-karyawan.php style="text-decoration:none;">
                  <div style="text-align: center">
                    <span class="fas fa-user-cog fa-2x text-center text-info"></span>
                  </div>

                  <div style="text-align: center">
                    <div class=" text-m text-dark">Pengaturan Data Karyawan</div>
                  </div>
                </a>
              </div>
            </div>
          </div>

        </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
      </div>

    </div>
  </div>
</div>

<!------------------------------FUNGSI MODAL KARYAWAN------------------------------------->
<div class="modal fade" id="modalkaryawan" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Menu Karyawan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <div class="modal-body">

        <div class="row">

          <div class="col-lg-4 mb-4">
            <div class="card shadow h-100 py-2">
              <div class="card-body">
                <a href=daftar-karyawan.php style="text-decoration:none;">
                  <div style="text-align: center">
                    <span class="far fa-address-book fa-2x text-center text-warning"></span>
                  </div>

                  <div style="text-align: center">
                    <div class=" text-m text-dark">Daftar Karyawan</div>
                  </div>
                </a>
              </div>
            </div>
          </div>

          <div class="col-lg-4 mb-4">
            <div class="card shadow h-100 py-2">
              <div class="card-body">
                <a href=log-data-karyawan.php style="text-decoration:none;">
                  <div style="text-align: center">
                    <span class="fas fa-history fa-2x text-center text-danger"></span>
                  </div>

                  <div style="text-align: center">
                    <div class=" text-m text-dark">Log Data Karyawan</div>
                  </div>
                </a>
              </div>
            </div>
          </div>

          <div class="col-lg-4 mb-4">
            <div class="card shadow h-100 py-2">
              <div class="card-body">
                <a href=pengaturan-karyawan.php style="text-decoration:none;">
                  <div style="text-align: center">
                    <span class="fas fa-user-cog fa-2x text-center text-info"></span>
                  </div>

                  <div style="text-align: center">
                    <div class=" text-m text-dark">Pengaturan Data Karyawan</div>
                  </div>
                </a>
              </div>
            </div>
          </div>

        </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
      </div>

    </div>
  </div>
</div>

<!------------------------------FUNGSI MODAL PASIEN------------------------------------->
<div class="modal fade" id="modalpasien" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Menu Pasien</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <div class="modal-body">

        <div class="row">

          <div class="col-lg-4 mb-4">
            <div class="card shadow h-100 py-2">
              <div class="card-body">
                <a href=daftar-pasien.php style="text-decoration:none;">
                  <div style="text-align: center">
                    <span class="far fa-address-book fa-2x text-center text-danger"></span>
                  </div>

                  <div style="text-align: center">
                    <div class=" text-m text-dark">Daftar Pasien</div>
                  </div>
                </a>
              </div>
            </div>
          </div>

          <div class="col-lg-4 mb-4">
            <div class="card shadow h-100 py-2">
              <div class="card-body">
                <a href=log-data-pasien.php style="text-decoration:none;">
                  <div style="text-align: center">
                    <span class="fas fa-history fa-2x text-center text-warning"></span>
                  </div>

                  <div style="text-align: center">
                    <div class=" text-m text-dark">Log Data Pasien </div>
                  </div>
                </a>
              </div>
            </div>
          </div>

          <div class="col-lg-4 mb-4">
            <div class="card shadow h-100 py-2">
              <div class="card-body">
                <a href=formulir-pasien.php style="text-decoration:none;">
                  <div style="text-align: center">
                    <span class="fas fa-user-edit fa-2x text-center text-primary"></span>
                  </div>

                  <div style="text-align: center">
                    <div class=" text-m text-dark"> Pindah Ruang </div>
                  </div>
                </a>
              </div>
            </div>
          </div>

          <div class="col-lg-4 mb-4">
            <div class="card shadow h-100 py-2">
              <div class="card-body">
                <a href=validasi-pasien.php style="text-decoration:none;">
                  <div style="text-align: center">
                    <span class="fas fa-user-check fa-2x text-center text-secondary"></span>
                  </div>

                  <div style="text-align: center">
                    <div class=" text-m text-dark"> Konfirmasi Pindah Ruang </div>
                  </div>
                </a>
              </div>
            </div>
          </div>

          <div class="col-lg-4 mb-4">
            <div class="card shadow h-100 py-2">
              <div class="card-body">
                <a href=pengaturan-pasien.php style="text-decoration:none;">
                  <div style="text-align: center">
                    <span class="fas fa-user-cog fa-2x text-center text-info"></span>
                  </div>

                  <div style="text-align: center">
                    <div class=" text-m text-dark">Pengaturan Data Pasien</div>
                  </div>
                </a>
              </div>
            </div>
          </div>

        </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
      </div>

    </div>
  </div>
</div>

<!------------------------------FUNGSI MODAL BAYI------------------------------------->
<div class="modal fade" id="modalbayi" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Menu Bayi</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <div class="modal-body">

        <div class="row">

          <div class="col-lg-4 mb-4">
            <div class="card shadow h-100 py-2">
              <div class="card-body">
                <a href=daftar-bayi.php style="text-decoration:none;">
                  <div style="text-align: center">
                    <span class="far fa-address-book fa-2x text-center text-info"></span>
                  </div>

                  <div style="text-align: center">
                    <div class=" text-m text-dark">Daftar Pasien Bayi</div>
                  </div>
                </a>
              </div>
            </div>
          </div>

          <div class="col-lg-4 mb-4">
            <div class="card shadow h-100 py-2">
              <div class="card-body">
                <a href=log-data-bayi.php style="text-decoration:none;">
                  <div style="text-align: center">
                    <span class="fas fa-history fa-2x text-center text-warning"></span>
                  </div>

                  <div style="text-align: center">
                    <div class=" text-m text-dark">Log Data Pasien Bayi </div>
                  </div>
                </a>
              </div>
            </div>
          </div>

          <div class="col-lg-4 mb-4">
            <div class="card shadow h-100 py-2">
              <div class="card-body">
                <a href=formulir-bayi.php style="text-decoration:none;">
                  <div style="text-align: center">
                    <span class="fas fa-user-edit fa-2x text-center text-primary"></span>
                  </div>

                  <div style="text-align: center">
                    <div class=" text-m text-dark"> Pindah Ruang </div>
                  </div>
                </a>
              </div>
            </div>
          </div>

          <div class="col-lg-4 mb-4">
            <div class="card shadow h-100 py-2">
              <div class="card-body">
                <a href=konfirmasi-pindah-ruang.php style="text-decoration:none;">
                  <div style="text-align: center">
                    <span class="fas fa-user-check fa-2x text-center text-secondary"></span>
                  </div>

                  <div style="text-align: center">
                    <div class=" text-m text-dark"> Konfirmasi Pindah Ruang </div>
                  </div>
                </a>
              </div>
            </div>
          </div>

          <div class="col-lg-4 mb-4">
            <div class="card shadow h-100 py-2">
              <div class="card-body">
                <a href=pengaturan-aset-bayi.php style="text-decoration:none;">
                  <div style="text-align: center">
                    <span class="fas fa-user-cog fa-2x text-center text-info"></span>
                  </div>

                  <div style="text-align: center">
                    <div class=" text-m text-dark">Pengaturan Data Pasien Bayi</div>
                  </div>
                </a>
              </div>
            </div>
          </div>

        </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
      </div>

    </div>
  </div>
</div>

<!------------------------------FUNGSI MODAL BaARANG------------------------------------->
<div class="modal fade" id="modalbarang" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Menu Peralatan Medis</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <div class="modal-body">

        <div class="row">

          <div class="col-lg-4 mb-4">
            <div class="card shadow h-100 py-2">
              <div class="card-body">
                <a href=daftar-barang.php style="text-decoration:none;">
                  <div style="text-align: center">
                    <span class="fa fa-notes-medical fa-2x text-center text-primary"></span>
                  </div>

                  <div style="text-align: center">
                    <div class=" text-m text-dark">Daftar Barang</div>
                  </div>
                </a>
              </div>
            </div>
          </div>

          <div class="col-lg-4 mb-4">
            <div class="card shadow h-100 py-2">
              <div class="card-body">
                <a href=formulir.php style="text-decoration:none;">
                  <div style="text-align: center">
                    <span class="fa fa-clipboard-list fa-2x text-center text-warning"></span>
                  </div>

                  <div style="text-align: center">
                    <div class=" text-m text-dark">Peminjaman Barang </div>
                  </div>
                </a>
              </div>
            </div>
          </div>

          <div class="col-lg-4 mb-4">
            <div class="card shadow h-100 py-2">
              <div class="card-body">
                <a href=validasi-peminjaman-aset.php style="text-decoration:none;">
                  <div style="text-align: center">
                    <span class="fa fa-clipboard-check fa-2x text-center text-secondary"></span>
                  </div>

                  <div style="text-align: center">
                    <div class=" text-m text-dark"> Konfirmasi Peminjaman </div>
                  </div>
                </a>
              </div>
            </div>
          </div>

          <div class="col-lg-4 mb-4">
            <div class="card shadow h-100 py-2">
              <div class="card-body">
                <a href=log-data-aset.php style="text-decoration:none;">
                  <div style="text-align: center">
                    <span class="fa fa-history fa-2x text-center text-info"></span>
                  </div>

                  <div style="text-align: center">
                    <div class=" text-m text-dark">Log Data Barang</div>
                  </div>
                </a>
              </div>
            </div>
          </div>

          <div class="col-lg-4 mb-4">
            <div class="card shadow h-100 py-2">
              <div class="card-body">
                <a href=pengaturan-aset-barang.php style="text-decoration:none;">
                  <div style="text-align: center">
                    <span class="fa fa-cogs fa-2x text-center text-success"></span>
                  </div>

                  <div style="text-align: center">
                    <div class=" text-m text-dark">Pengaturan Data Barang</div>
                  </div>
                </a>
              </div>
            </div>
          </div>

        </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
      </div>

    </div>
  </div>
</div>


<!------------------------------FUNGSI MODAL SISTEM KEPUTUSAN PENGADAAN BARANG------------------------------------->
<div class="modal fade" id="modalpengadaan" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Menu Peralatan Medis</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <div class="modal-body">

        <div class="row">

          <div class="col-lg-4 mb-4">
            <div class="card shadow h-100 py-2">
              <div class="card-body">
                <a href=pengadaan-kriteria.php style="text-decoration:none;">
                  <div style="text-align: center">
                    <span class="fa fa-clipboard-list fa-2x text-center text-warning"></span>
                  </div>

                  <div style="text-align: center">
                    <div class=" text-m text-dark"> Kriteria Pengadaan Barang </div>
                  </div>
                </a>
              </div>
            </div>
          </div>

          <div class="col-lg-4 mb-4">
            <div class="card shadow h-100 py-2">
              <div class="card-body">
                <a href=pengadaan-peserta.php style="text-decoration:none;">
                  <div style="text-align: center">
                    <span class="fas fa-users fa-2x text-center text-primary"></span>
                  </div>

                  <div style="text-align: center">
                    <div class=" text-m text-dark">Vendor Pengadaan barang</div>
                  </div>
                </a>
              </div>
            </div>
          </div>

          <div class="col-lg-4 mb-4">
            <div class="card shadow h-100 py-2">
              <div class="card-body">
                <a href=pengadaan-ranking.php style="text-decoration:none;">
                  <div style="text-align: center">
                    <span class="fa fa-clipboard-check fa-2x text-center text-secondary"></span>
                  </div>

                  <div style="text-align: center">
                    <div class=" text-m text-dark"> Penilaian Vendor </div>
                  </div>
                </a>
              </div>
            </div>
          </div>

          <div class="col-lg-4 mb-4">
            <div class="card shadow h-100 py-2">
              <div class="card-body">
                <a href=pengadaan-hasil.php style="text-decoration:none;">
                  <div style="text-align: center">
                    <span class="fas fa-paste fa-2x text-center text-info"></span>
                  </div>

                  <div style="text-align: center">
                    <div class=" text-m text-dark"> Hasil Perhitungan</div>
                  </div>
                </a>
              </div>
            </div>
          </div>

        </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
      </div>

    </div>
  </div>
</div>


<?php
include('includes/scripts.php');
include('includes/footer.php');
?>