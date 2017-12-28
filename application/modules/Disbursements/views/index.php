<section class="content-header">
    <h1>
        <?=$module?>
    </h1>
</section>
<section class="content">
    <div class="row">
        <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="form-group">
                <div class="input-group date">
                    <div class="input-group-addon">
                        <i class="fa fa-calendar"></i>
                    </div>
                    <input value="<?=$dttm1?>" type="text" class="form-control pull-right" id="dttm1">
                </div>
                    <!-- /.input group -->
            </div>
        </div>
        <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="form-group">
                <div class="input-group date">
                    <div class="input-group-addon">
                        <i class="fa fa-calendar"></i>
                    </div>
                    <input value="<?=$dttm2?>" type="text" class="form-control pull-right" id="dttm2">
                </div>
                    <!-- /.input group -->
            </div>
        </div>
        <div class="col-md-4 col-sm-6 col-xs-12">
            <div class="form-group">
                <select id="company" class="form-control select2" style="width: 100%;">
                    <option value="" selected="selected">-- All Company --</option>
                    <?=$optCompany?>
                </select>
            </div>
        </div>
        <div class="col-md-2 col-sm-6 col-xs-12">
            <div class="form-group">
                <button class="btn btn-info" id="showdisburse">Tampilkan</button>
            </div>
        </div>
    </div>
    <!-- Info boxes -->
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-header with-border">
                    <div class="col-md-3">
                        <div class="form-group">
                            <select id="status" class="form-control select2" style="width: 100%;">
                                <option value='' selected>-- Status --</option>
                                <?=$optStatus?>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <select id="bank" class="form-control select2" style="width: 100%;">
                                <option value='' selected>-- Bank --</option>
                                <?=$optBank?>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <select id="limit" class="form-control select2" style="width: 100%;">
                                <option value='' selected>-- Limit --</option>
                                <?=$optLimit?>
                            </select>
                        </div>
                    </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body" id="dataTransaction">
                </div>    
        <!-- /.box-body -->
                <div class="box-footer clearfix">
                    <ul class="pagination pagination-sm no-margin pull-right">
                        <?php foreach ($links as $link) {
                            echo "<li>". $link."</li>";
                        }?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
<input type="hidden" value="<?=$page?>" id="page"/>
<script>
    // $( document ).ready(function() {
    //     getDataDisbursement();
    // });

    document.addEventListener( 'DOMContentLoaded', function () {
        getDataDisbursement();
    }, false );

</script>