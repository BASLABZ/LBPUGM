<div id="content">
            <div class="inner">
                <div class="row" style="padding-top: 10px; padding-right: 10px; padding-left: 10px;">
                <div class="panel panel-primary" style="border-color: #1ab394;">
                    <div class="panel-heading">
                       <div class="row">
                            <div class="col-md-4">
                             <span class="fa fa-sitemap"></span> MASTER LEVEL
                        </div>
                        <div class="col-md-8">
                            <div class="text-right"><b><i><span class="fa fa-home"></span> Home / <span class="fa fa-list"></span> Master Data / <span class="fa fa-sitemap"> </span> Level</i></b></div>
                            
                        </div>
                       </div>
                    </div>
                    
                </div>
            </div>
                <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-primary" style="border-color:#f8f8f8;">
                        <div class="panel-heading">
                            <span class="fa fa-list"></span> Master Level <a href="index.php?hal=level/add" class="btn btn-sm btn-success dim_about"><span class="fa fa-plus"></span> Tambah Data</a>
                        </div>
                        <div class="panel-body dim_about">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th width="2%">NO</th>
                                            <th width="10%">NAMA LEVEL</th>
                                            <th width="10%">AKSI</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php 
                                        $no = 1;
                                        $query = mysql_query("SELECT * from ref_level");
                                        while ($row = mysql_fetch_array($query)) {
                                     ?>
                                        <tr class="odd gradeX">
                                            <td><?php echo $no++; ?></td>
                                            <td><?php echo $row['level_name']; ?></td>
                                            <td>
                                                <a href="index.php?hal=level/edit&id=<?php echo $row['level_id']; ?>" class="btn btn-warning btn-xs dim_about"><span class="fa fa-edit"></span> Ubah</a>
                                                <a href="index.php?hal=level/list&hapus=<?php echo $row['level_id']; ?>" class="btn btn-danger btn-xs dim_about"><span class="fa fa-trash"></span> Hapus</a>
                                                <a href="index.php?hal=level/fasilitas_level&id=<?php echo $row['level_id']; ?>" class="btn btn-info btn-xs dim_about"><span class="fa fa-lock"></span>Ubah Fasilitas</a>   
                                            </td>
                                            
                                        </tr>
                                       <?php } ?>
                                    </tbody>
                                </table>
                            
                           
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
