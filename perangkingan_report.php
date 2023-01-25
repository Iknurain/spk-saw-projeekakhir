<div class="row">
  <div class="col-md-6 col-md-offset-3">
    <form method="POST" action="perangkingan_preview.php" target="_blank" name="Form" onsubmit="return validateForm()">
    <div class="panel panel-primary">
        <div class="panel-heading"><b>Laporan Perangkingan</b></div>
          <div class="panel-body border">
            <div class="form-group"> 
              <label for="">Angkatan:</label>
              <select class="form-control chosen-select" data-placeholder="Pilih Angkatan" name="angkatan">
              <option value=""></option>;
              <?php
                  for ($x = date("Y"); $x >= 2015; $x--) {
              ?>
                  <option> <?php echo $x; ?></option>
              <?php
                  }
              ?>
              </select>
            </div>   
            <input class="btn btn-primary" type="submit" name="preview" value="Preview">
          </div>
      </div>
    </form>
  </div>
</div>


<script type="text/javascript">
    function validateForm()
    {
        var tahun=document.forms["Form"]["tahun"].value;

        if (tahun=="")
        {
            alert("Masukkan Tahun");
            return false;
        }

    }
</script>