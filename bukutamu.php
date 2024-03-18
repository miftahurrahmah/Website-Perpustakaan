<div class="col-5">
  <div class="card mt-5">
    <div class="card-header bg-dark">
      <h6 class="text-light">Buku Tamu Perpustakaan</h6>
    </div>
    <div class="card-body">
      <form action="proses_tamu.php" method="post">
        <p class="id">ID Pengunjung Perpustakaan</p>
        <div class="input-group flex-nowrap">
          <input type="text" class="form-control" name="nim" placeholder="ID/Nama Pengunjung"
            aria-label="ID/Nama Pengunjung" aria-describedby="addon-wrapping">
          <button type="submit" class="btn btn-success" name="submit">Submit</button>
        </div>
      </form>
    </div>
  </div>
</div>