<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1><?php echo lang('sent_messages'); ?></h1>
        </div>
        <div class="section-body">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <div class="space15"></div>
                        <table class="table table-striped table-bordered" id="editable-sample">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th><?php echo lang('date'); ?></th>
                                    <th><?php echo lang('message'); ?></th>
                                    <th><?php echo lang('recipient'); ?></th>
                                    <th><?php echo lang('options'); ?></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $i = 0;
                                foreach ($sents as $sent) {
                                    $i = $i + 1;
                                ?>
                                    <tr class="">
                                        <td><?php echo $i; ?></td>
                                        <td style='width: 25%;'><?php echo date('h:i:s a m/d/y', $sent->date); ?></td>
                                        <td><?php
                                            if (!empty($sent->message)) {
                                                echo $sent->message;
                                            }
                                            ?></td>
                                        <td><?php
                                            if (!empty($sent->reciepient)) {
                                                echo $sent->reciepient;
                                            }
                                            ?></td>
                                        <td>
                                            <a class="btn btn-icon icon-left btn-danger btn_width delete_button" href="email/delete?id=<?php echo $sent->id; ?>" <?php echo lang('delete'); ?> onclick="return confirm('Are you sure you want to delete this item?');"><i class="fa fa-trash"> </i></a>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
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