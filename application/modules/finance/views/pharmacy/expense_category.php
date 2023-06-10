<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1><?php echo lang('pharmacy'); ?> <?php echo lang('expense_categories'); ?></h1>
        </div>
        <div class="section-body">
            <div class="card">
                <div class="card-header">
                    <a href="finance/pharmacy/addExpenseCategoryView"><button class="btn btn-icon icon-left btn-primary"><i class="fas fa-plus"></i> <?php echo lang('add_expense_category'); ?></button></a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <div class="space15"></div>
                        <table class="table table-striped table-bordered" id="editable-sample">
                            <thead>
                                <tr>
                                    <th><?php echo lang('category'); ?> </th>
                                    <th><?php echo lang('description'); ?> </th>
                                    <?php if ($this->ion_auth->in_group('admin')) { ?>
                                        <th><?php echo lang('options'); ?> </th>
                                    <?php } ?>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($categories as $category) { ?>
                                    <tr class="">
                                        <td><?php echo $category->category; ?></td>
                                        <td> <?php echo $category->description; ?></td>
                                        <?php if ($this->ion_auth->in_group('admin')) { ?>
                                            <td>
                                                <a href="finance/pharmacy/editExpenseCategory?id=<?php echo $category->id; ?>"><button class="btn btn-icon icon-left btn-light editbutton"><i class="fas fa-edit"></i><?php echo lang('edit'); ?></button></a>
                                                <a href="finance/pharmacy/deleteExpenseCategory?id=<?php echo $category->id; ?>"><button class="btn btn-icon icon-left btn-danger delete_button" onclick="return confirm('Are you sure you want to delete this item?');"><i class="fas fa-trash"></i><?php echo lang('delete'); ?></button></a>
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
                        columns: [0, 1, 2],
                    }
                },
                {
                    extend: 'excelHtml5',
                    exportOptions: {
                        columns: [0, 1, 2],
                    }
                },
                {
                    extend: 'csvHtml5',
                    exportOptions: {
                        columns: [0, 1, 2],
                    }
                },
                {
                    extend: 'pdfHtml5',
                    exportOptions: {
                        columns: [0, 1, 2],
                    }
                },
                {
                    extend: 'print',
                    exportOptions: {
                        columns: [0, 1, 2],
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
<script>
    $(document).ready(function() {
        $(".flashmessage").delay(3000).fadeOut(100);
    });
</script>