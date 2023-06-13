<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1><?php echo lang('settings'); ?></h1>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-md-8">
                    <h2 class="section-title"><?php echo lang('email'); ?> <?php echo lang('settings'); ?></h2>
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive">
                                <div class="space15"></div>
                                <table class="table table-striped table-bordered" id="editable-sample">
                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th><?php echo lang('name'); ?></th>
                                            <th><?php echo lang('options'); ?></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $i = 0;
                                        foreach ($email as $email_setting) {
                                            $i = $i + 1;
                                        ?>
                                            <tr class="">
                                                <td><?php echo $i; ?></td>
                                                <td><?php
                                                    if (!empty($email_setting->type)) {
                                                        echo $email_setting->type;
                                                    }
                                                    ?>
                                                    <br>
                                                </td>
                                                <td>
                                                    <a class="btn btn-left btn-info btn-xs btn_width" href="email/settings?id=<?php echo $email_setting->id; ?>"> <?php echo lang('manage'); ?></a>
                                                </td>
                                            </tr>
                                        <?php
                                        } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <h2 class="section-title"><?php echo lang('select'); ?> <?php echo lang('email'); ?> <?php echo lang('settings'); ?> </h2>
                    <div class="card">
                        <div class="card-body">
                            <form role="form" id="editAppointmentForm" action="settings/selectEmailGateway" class="clearfix" method="post" enctype="multipart/form-data">
                                <?php foreach ($email as $email_setting) {
                                ?>
                                    <div class="custom-control custom-radio">
                                        <input type="radio" id="<?php echo $email_setting->type; ?>" name="email_gateway" value='<?php echo $email_setting->type; ?>' class="custom-control-input" <?php
                                                                                                                                                                                                    if (!empty($email_setting->type)) {
                                                                                                                                                                                                        if ($settings->emailtype == $email_setting->type) {
                                                                                                                                                                                                            echo 'checked';
                                                                                                                                                                                                        }
                                                                                                                                                                                                    }
                                                                                                                                                                                                    ?>>
                                        <label class="custom-control-label" for="<?php echo $email_setting->type; ?>"><?php echo $email_setting->type; ?></label>
                                    </div>
                                <?php
                                } ?>
                                <input type="hidden" name="id" value="<?php echo $settings->id; ?>">
                                <button type="submit" name="submit" class="btn btn-primary float-right"> <?php echo lang('submit'); ?></button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>


<script src="common/js/codearistos.min.js"></script>
<script>
    $(document).ready(function() {
        var table = $('#editable-sample').DataTable({
            responsive: true,

            dom: "<'row'<'col-sm-3'l><'col-sm-5 text-center'B><'col-sm-4'f>>" +
                "<'row'<'col-sm-12'tr>>" +
                "<'row'<'col-sm-5'i><'col-sm-7'p>>",

            buttons: [{
                    extend: 'copyHtml5',
                    exportOptions: {
                        columns: [0, 1, 2, 3],
                    }
                },
                {
                    extend: 'excelHtml5',
                    exportOptions: {
                        columns: [0, 1, 2, 3],
                    }
                },
                {
                    extend: 'csvHtml5',
                    exportOptions: {
                        columns: [0, 1, 2, 3],
                    }
                },
                {
                    extend: 'pdfHtml5',
                    exportOptions: {
                        columns: [0, 1, 2, 3],
                    }
                },
                {
                    extend: 'print',
                    exportOptions: {
                        columns: [0, 1, 2, 3],
                    }
                },
            ],
            aLengthMenu: [
                [10, 25, 50, 100, -1],
                [10, 25, 50, 100, "All"]
            ],
            iDisplayLength: -1,
            "order": [
                [0, "desc"]
            ],

            "language": {
                "lengthMenu": "_MENU_",
                search: "_INPUT_",
                "url": "common/assets/DataTables/languages/<?php echo $this->language; ?>.json"
            },

        });

        table.buttons().container()
            .appendTo('.custom_buttons');
    });
</script>