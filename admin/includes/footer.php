

      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Departemen Teknik Elektro Otomasi 2021</span>
            |
            
            <span>
            <?php
            //Buat ngitung load time dengan satuan detik di bagian bawah (header)
            for($i=0;$i<100000;$i++) { 
            }
            $finish = get_time();
            $total_time = round(($finish - $start), 4);
            echo 'Halaman dimuat dalam '.$total_time.' Detik.';
            ?>
          </div>
          




          
        </div>
      </footer>
      <!-- End of Footer -->
      </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->
    </div>
    <!-- End of Content Wrapper -->

    
</body>

</html>
