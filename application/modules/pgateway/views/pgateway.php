<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1><?php echo lang('payments'); ?></h1>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-md-8">
                    <h2 class="section-title"><?php echo lang('payment_gateways'); ?></h2>
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
                                        foreach ($pgateways as $pgateway) {
                                            $i = $i + 1;
                                        ?>
                                            <tr class="">
                                                <td><?php echo $i; ?></td>
                                                <td><?php
                                                    if (!empty($pgateway->name)) {
                                                        echo $pgateway->name;
                                                    }
                                                    ?>
                                                    <br>
                                                </td>
                                                <td>
                                                    <a class="btn btn-left btn-info btn_width" href="pgateway/settings?id=<?php echo $pgateway->id; ?>"> <?php echo lang('manage'); ?></a>
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
                    <h2 class="section-title"><?php echo lang('select'); ?> <?php echo lang('payment_gateway'); ?> </h2>
                    <div class="card">
                        <div class="card-body">
                            <form role="form" id="editAppointmentForm" action="settings/selectPaymentGateway" class="clearfix" method="post" enctype="multipart/form-data">
                                <?php foreach ($pgateways as $pgateway) {
                                ?>
                                    <div class="custom-control custom-radio">
                                        <input type="radio" id="<?php echo $pgateway->name; ?>" name="payment_gateway" value='<?php echo $pgateway->name; ?>' class="custom-control-input" <?php
                                                                                                                                                                                            if (!empty($pgateway->name)) {
                                                                                                                                                                                                if ($settings->payment_gateway == $pgateway->name) {
                                                                                                                                                                                                    echo 'checked';
                                                                                                                                                                                                }
                                                                                                                                                                                            }
                                                                                                                                                                                            ?>>
                                        <label class="custom-control-label" for="<?php echo $pgateway->name; ?>"><?php echo $pgateway->name; ?></label>
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