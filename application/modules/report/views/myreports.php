<!--sidebar end-->
<!--main content start-->
<div class="main-content">
    <div class="section">
        <div class="section-header">
            <h1><?php echo lang('my_reports'); ?></h1>
        </div>
        <?php
        $message = $this->session->flashdata('feedback');
        if (!empty($message)) {
        ?><div class="alert alert-primary alert-has-icon alert-dismissible show fade">
                <div class="alert-icon"><i class="far fa-lightbulb"></i></div>
                <div class="alert-body">
                    <button class="close" data-dismiss="alert">
                        <span>&times;</span>
                    </button>
                    <div class="alert-title">Info!</div>
                    <?= $message ?>
                </div>
            </div>
        <?php } ?>
        <div class="section-body">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <div class="space15"></div>
                            <table class="table-striped table-bordered" id="editable-sample">
                            <thead>
                                <tr>
                                    <th><?php echo lang('patient'); ?></th>
                                    <th><?php echo lang('type'); ?></th>
                                    <th><?php echo lang('description'); ?></th>
                                    <th><?php echo lang('doctor'); ?></th>
                                    <th><?php echo lang('date'); ?></th>
                                </tr>
                            </thead>
                            <tbody>

                            <style>

                                .img_url{
                                    height:20px;
                                    width:20px;
                                    background-size: contain; 
                                    max-height:20px;
                                    border-radius: 100px;
                                }

                            </style>

                            <?php
                            foreach ($reports as $report) {
                                if ($user_id == explode('*', $report->patient)[1]) {
                                    ?>
                                    <tr class="">
                                        <td><?php echo explode('*', $report->patient)[0]; ?></td>
                                        <td> <?php echo $report->report_type; ?></td>
                                        <td> <?php echo $report->description; ?></td>
                                        <td><?php echo $report->doctor; ?></td>
                                        <td class="center"><?php echo $report->date; ?></td>
                                    </tr>
                                    <?php
                                }
                            }
                            ?>

                            </tbody>
                    </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--main content end-->
<!--footer start-->

<script src="common/js/codearistos.min.js"></script>

<script>
                            $(document).ready(function () {
                                var table = $('#editable-sample').DataTable({
                                    responsive: true,

                                    dom: "<'row'<'col-sm-3'l><'col-sm-5 text-center'B><'col-sm-4'f>>" +
                                            "<'row'<'col-sm-12'tr>>" +
                                            "<'row'<'col-sm-5'i><'col-sm-7'p>>",

                                    buttons: [
                                        {extend: 'copyHtml5', exportOptions: {columns: [0, 1, 2, 3], }},
                                        {extend: 'excelHtml5', exportOptions: {columns: [0, 1, 2, 3], }},
                                        {extend: 'csvHtml5', exportOptions: {columns: [0, 1, 2, 3], }},
                                        {extend: 'pdfHtml5', exportOptions: {columns: [0, 1, 2, 3], }},
                                        {extend: 'print', exportOptions: {columns: [0, 1, 2, 3], }},
                                    ],
                                    aLengthMenu: [
                                        [10, 25, 50, 100, -1],
                                        [10, 25, 50, 100, "All"]
                                    ],
                                    iDisplayLength: -1,
                                    "order": [[0, "desc"]],

                                    "language": {
                                        "lengthMenu": "_MENU_",
                                        search: "_INPUT_",
                                        searchPlaceholder: "Search..."
                                    },

                                });

                                table.buttons().container()
                                        .appendTo('.custom_buttons');
                            });
</script>
