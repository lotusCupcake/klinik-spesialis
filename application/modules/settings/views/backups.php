<?php (defined('BASEPATH')) or exit('No direct script access allowed'); ?>

<div class="main-content">
    <div class="section">
        <div class="section-header">
            <h1><?php echo lang('backup_database'); ?></h1>
        </div>
        <div class="section-body">
            <div class="card">
                <div class="card-header">
                    <h4></h4>
                    <div class="clearfix card-header-form">
                        <a href="<?= site_url('settings/backup_database'); ?>" id="backup_databse" class="btn btn-icon icon-left btn-primary"><i class="fas fa-database" data-name="servers" data-loop="true" data-color="#fff" data-hovercolor="#fff" data-size="20"></i> <?= lang('backup_database'); ?></a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <p></p>
                            <?php
                            if (!empty($dbs)) {
                                echo '<ul class="list-group">';
                                foreach ($dbs as $file) {
                                    $file = basename($file);
                                    echo '<li class="list-group-item">';
                                    $date_string = substr($file, 13, 10);
                                    $time_string = substr($file, 24, 8);
                                    $date = $date_string . ' ' . str_replace('-', ':', $time_string);
                                    $bkdate = $this->sma->hrld($date);
                                    //echo $bkdate;
                                    echo '<strong>' . lang('backup_on') . ' <span class="text-primary"><i class="fa fa-database"></i> ' . $bkdate . '</span><div class="btn-group float-right" style="margin-top:-7px;">' . anchor('settings/download_database/' . substr($file, 0, -4), '<i class="livicon" data-name="download" data-loop="true" data-color="#fff" data-hovercolor="#fff" data-size="18"></i> ' . lang('download'), 'class="btn btn-primary"') . ' ' . anchor('settings/restore_database/' . substr($file, 0, -4), '<i class="livicon" data-name="recycled" data-loop="true" data-color="#fff" data-hovercolor="#fff" data-size="20"></i> ' . lang('restore'), 'class="btn btn-warning restore_db"') . ' ' . anchor('settings/delete_database/' . substr($file, 0, -4), '<i class="livicon" data-name="trash" data-loop="true" data-color="#fff" data-hovercolor="#fff" data-size="18"></i> ' . lang('delete'), 'class="btn btn-danger delete_file"') . ' </div></strong>';
                                    echo '</li>';
                                }
                                echo '</ul>';
                            }
                            ?>
                        </div>
                        <i class="livicon" data-name="download" data-size="50" data-c="#fff" data-hc="#fff" data-loop="true" id="livicon-96" style="width: 50px; height: 50px;"></i>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <?php
                            if (!empty($files)) {
                                echo '<ul class="list-group">';
                                foreach ($files as $file) {
                                    $file = basename($file);
                                    echo '<li class="list-group-item">';
                                    $date_string = substr($file, 12, 10);
                                    $time_string = substr($file, 23, 8);
                                    $date = $date_string . ' ' . str_replace('-', ':', $time_string);
                                    $bkdate = $this->sma->hrld($date);
                                    echo '<strong>' . lang('backup_on') . ' <span class="text-primary">' . $bkdate . '</span><div class="btn-group float-right" style="margin-top:-7px;">' . anchor('settings/download_backup/' . substr($file, 0, -4), '<i class="livicon" data-name="download" data-loop="true" data-color="#fff" data-hovercolor="#fff" data-size="18"></i> ' . lang('download'), 'class="btn btn-primary"') . ' ' . anchor('settings/restore_backup/' . substr($file, 0, -4), '<i class="livicon" data-name="recycled" data-loop="true" data-color="#fff" data-hovercolor="#fff" data-size="20"></i> ' . lang('restore'), 'class="btn btn-warning restore_backup"') . ' ' . anchor('settings/delete_backup/' . substr($file, 0, -4), '<i class="livicon" data-name="trash" data-loop="true" data-color="#fff" data-hovercolor="#fff" data-size="18"></i> ' . lang('delete'), 'class="btn btn-danger delete_file"') . ' </div></strong>';
                                    echo '</li>';
                                }
                                echo '</ul>';
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<style>
    .restore_db {
        display: none;
    }


    #backup_database {
        margin-bottom: 10px;
        float: left !important;
    }
</style>

<div class="modal fade" id="wModal" tabindex="-1" role="dialog" aria-labelledby="wModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="wModalLabel"><?= lang('please_wait'); ?></h4>
            </div>
            <div class="modal-body">
                <?= lang('backup_modal_msg'); ?>
            </div>
        </div>
    </div>
</div>


<script type="text/javascript">
    $(document).ready(function() {
        $('#backup_files').click(function(e) {
            e.preventDefault();
            $('#wModalLabel').text('<?= lang('backup_modal_heading'); ?>');
            $('#wModal').modal({
                backdrop: 'static',
                keyboard: true
            }).appendTo('body').modal('show');
            window.location.href = '<?= site_url('settings/backup_files'); ?>';
        });
        $('.restore_backup').click(function(e) {
            e.preventDefault();
            var href = $(this).attr('href');
            var r = confirm("<?= lang('restore_confirm'); ?>");
            if (r == true) {
                $('#wModalLabel').text('<?= lang('restore_modal_heading'); ?>');
                $('#wModal').modal({
                    backdrop: 'static',
                    keyboard: true
                }).appendTo('body').modal('show');
                window.location.href = href;
            } else {
                return false;
            }
        });
        $('.restore_db').click(function(e) {
            e.preventDefault();
            var href = $(this).attr('href');
            var r = confirm("<?= lang('restore_confirm'); ?>");
            if (r == true) {
                window.location.href = href;
            } else {
                return false;
            }
        });
        $('.delete_file').click(function(e) {
            e.preventDefault();
            var href = $(this).attr('href');
            var r = confirm("<?= lang('delete_confirm'); ?>");
            if (r == true) {
                window.location.href = href;
            } else {
                return false;
            }
        });
    });
</script>