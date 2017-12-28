<section class="content-header">
    <h1>
        <?=$module?>
    </h1>
</section>
<section class="content">
    <!-- Info boxes -->
    <div class="row">
        <div class="col-md-4 col-sm-6 col-xs-12">
            <div class="form-group">
                <label>Dari Tanggal :</label>
                <div class="input-group date">
                    <div class="input-group-addon">
                        <i class="fa fa-calendar"></i>
                    </div>
                    <input value="<?=$dttm1?>" type="text" class="form-control pull-right" id="dttm1">
                </div>
                    <!-- /.input group -->
            </div>
        </div>
        <div class="col-md-4 col-sm-6 col-xs-12">
            <div class="form-group">
                <label>Hingga Tanggal :</label>
                <div class="input-group date">
                    <div class="input-group-addon">
                        <i class="fa fa-calendar"></i>
                    </div>
                    <input value="<?=$dttm2?>" type="text" class="form-control pull-right" id="dttm2">
                </div>
                    <!-- /.input group -->
            </div>
        </div>
    </div>
              <!-- /.form group -->
    <div class="row">
        <div class="col-md-4 col-sm-6 col-xs-12">
            <div class="info-box">
                <span class="info-box-icon bg-green"><i class="fa fa-credit-card"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text">Jumlah Transaksi</span>
                    <span class="info-box-number">100<small>%</small></span>
                </div>
            <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>
        <div class="col-md-4 col-sm-6 col-xs-12">
            <div class="info-box">
                <span class="info-box-icon bg-aqua"><i class="fa fa-check-circle-o"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text">Transaksi Berhasil</span>
                    <span class="info-box-number">100<small>%</small></span>
                </div>
            <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>
        <div class="col-md-4 col-sm-6 col-xs-12">
            <div class="info-box">
                <span class="info-box-icon bg-red"><i class="fa  fa-close"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text">Transaksi Gagal</span>
                    <span class="info-box-number">0<small>%</small></span>
                </div>
            <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>
    </div>
</section>