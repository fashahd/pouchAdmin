<section class="content-header">
    <h1>
        <?=$module?>
    </h1>
</section>
<section class="content">
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
    <!-- Info boxes -->
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-header with-border">
                    <div class="col-md-4">
                        <div class="form-group">
                            <select class="form-control select2" style="width: 100%;">
                                <option value="" selected="selected">-- All Company --</option>
                                <?=$optCompany?>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <select class="form-control select2" style="width: 100%;">
                                <option value='' selected>-- Status --</option>
                                <option value='pending'>Pending</option>
                                <option value='success'>Success</option>
                                <option value='failed'>Failed</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <select class="form-control select2" style="width: 100%;">
                                <option value='' selected>-- Bank --</option>
                                <option>BCA</option>
                                <option>Mandiri</option>
                                <option>BRI</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <select class="form-control select2" style="width: 100%;">
                                <option value='' selected>-- Page --</option>
                                <option>10</option>
                                <option>50</option>
                                <option>100</option>
                                <option>200</option>
                                <option>500</option>
                                <option>1000</option>
                            </select>
                        </div>
                    </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Date Uploaded</th>
                                <th>Company</th>
                                <th>Amount</th>
                                <th>Bank</th>
                                <th>Account Name</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?=$transaction?>
                        </tbody>
                    </table>
                </div>
                <!-- /.box-body -->
                <div class="box-footer clearfix">
                    <ul class="pagination pagination-sm no-margin pull-right">
                    <?php foreach ($links as $link) {
                        echo "<li>". $link."</li>";
                        } ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>