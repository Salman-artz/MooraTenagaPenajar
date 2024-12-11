<div class="wrapper wrapper-content">
<h1> Penentuan Tenaga Pengajar</h1>
    <h2>Metode  MOORA</h2>
    <div class="row">
                    <div class="col-lg-3">
                        <div class="ibox float-e-margins">
                            <div class="ibox-title">
                                <span class="label label-success pull-right">Criteria</span>
                                <h5>Kriteria</h5>
                            </div>
                            <div class="ibox-content">
                                <h1 class="no-margins"><?= $jumlahkriteria ?></h1>
                                <div class="stat-percent font-bold text-success"><a href="<?php echo site_url('kriteria');?>"><i class="fa fa-bolt"><?= $jumlahkriteria ?></a></i></div>
                                <small>Total Kriteria</small>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="ibox float-e-margins">
                            <div class="ibox-title">
                                <span class="label label-info pull-right">Scale</span>
                                <h5>Skala</h5>
                            </div>
                            <div class="ibox-content">
                                <h1 class="no-margins"><?= $jumlahskala ?></h1>
                                <div class="stat-percent font-bold text-info"><a href="<?php echo site_url('skala');?>"><i class="fa fa-level-up"><?= $jumlahskala ?></a></i></div>
                                <small>Total Skala</small>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="ibox float-e-margins">
                            <div class="ibox-title">
                                <span class="label label-primary pull-right">Alternative / Teaching Staff</span>
                                <h5>Alternatif / Pengajar</h5>
                            </div>
                            <div class="ibox-content">
                                <h1 class="no-margins"><?= $jumlahpengajar?></h1>
                                <div class="stat-percent font-bold text-navy"><a href="<?php echo site_url('pengajar');?>"><i class="fa fa-level-up"></i><?= $jumlahskala ?></a></div>
                                <small>Total Alternatif / Pengajar</small>
                            </div>
                        </div>
                    </div>
            </div>
        </div>
    
</div>