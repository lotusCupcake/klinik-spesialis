<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1><?php echo lang('expense_categories'); ?></h1>
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
                <div class="card-header">
                    <a href="finance/addExpenseCategoryView"><button class="btn btn-icon icon-left btn-primary"><i class="fas fa-plus"></i> <?php echo lang('add_expense_category'); ?></button></a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <div class="space15"></div>
                        <table class="table table-striped table-bordered" id="editable-sample">
                            <thead>
                                <tr>
                                    <th><?php echo lang('category'); ?></th>
                                    <th><?php echo lang('description'); ?></th>
                                    <?php if ($this->ion_auth->in_group('admin')) { ?>
                                        <th class="no-print"><?php echo lang('options'); ?></th>
                                    <?php } ?>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($categories as $category) { ?>
                                    <tr class="">
                                        <td><?php echo $category->category; ?></td>
                                        <td> <?php echo $category->description; ?></td>
                                        <?php if ($this->ion_auth->in_group('admin')) { ?>
                                            <td class="no-print">
                                                <a href="finance/editExpenseCategory?id=<?php echo $category->id; ?>"><button class="btn btn-icon icon-left btn-light"><i class="fas fa-edit"></i></button></a>
                                                <a href="finance/deleteExpenseCategory?id=<?php echo $category->id; ?>"><button class="btn btn-icon icon-left btn-danger delete_button" onclick="return confirm('Are you sure you want to delete this item?');"><i class="fas fa-trash"></i></button></a>
                                            </td>
                                        <?php } ?>
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
                        columns: [0, 1],
                    }
                },
                {
                    extend: 'excelHtml5',
                    exportOptions: {
                        columns: [0, 1],
                    }
                },
                {
                    extend: 'csvHtml5',
                    exportOptions: {
                        columns: [0, 1],
                    }
                },
                {
                    extend: 'pdfHtml5',
                    exportOptions: {
                        columns: [0, 1],
                    }
                },
                {
                    extend: 'print',
                    exportOptions: {
                        columns: [0, 1],
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
            }
        });
        table.buttons().container().appendTo('.custom_buttons');

    });
</script>
<script>
    $(document).ready(function() {
        $(".flashmessage").delay(3000).fadeOut(100);
    });
</script>