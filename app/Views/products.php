<!DOCTYPE html>
<html lang="en">
<head>
    <?= view('_partials/header') ?>
    <!-- DataTables -->
    <link rel="stylesheet" href="<?= base_url('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') ?>">
    <link rel="stylesheet" href="<?= base_url('plugins/datatables-responsive/css/responsive.bootstrap4.min.css') ?>">
    <link rel="stylesheet" href="<?= base_url('plugins/datatables-buttons/css/buttons.bootstrap4.min.css') ?>">
</head>
<body class="hold-transition sidebar-mini layout-fixed">
    <?= view('_partials/preloader') ?>
    <?= view('_partials/navbar') ?>
    <?= view('_partials/sidebar') ?>

    <div class="content-wrapper">
        <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Products</h1>
            </div>
            </div>
        </div>
        </section>

        <section class="content">
            <div class="container-fluid">
                <div class="card">
                    <div class="card-body">
                        <?php if(has_permission('read')): ?>
                        <div class="row mb-3">
                            <div class="col-12">
                                <table id="product_table" class="table table-bordered" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th style="max-width:100px;">Product ID</th>
                                            <th>Product Name</th>
                                            <th>Product Price</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                </table>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <button type="button" class="btn btn-sm btn-primary btn-block" data-toggle="modal" data-target="#addModal">Add Product</button>
                            </div>
                        </div>
                        <?php else: ?>
                        <span>You don't have permissions to view resources.</span>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <div class="modal fade" id="addModal" role="dialog" arial-labelledby="addModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-md" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addLabel">Add Product</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <?php if(has_permission('create')): ?>
                <div class="modal-body">
                    <?= form_open('products/addProduct', 'id="addData" class="needs-validation"'); ?>
                        <div class="mb-3">
                            <label for="product_name" class="form-label">Product Name</label>
                            <input type="text" class="form-control add-input" id="product_name" name="product_name" autocomplete="off">
                            <div id="product_nameFeedback" class="form-feedback"></div>
                        </div>
                        <div class="mb-3">
                            <label for="product_price" class="form-label">Product Price</label>
                            <input type="number" class="form-control add-input" id="product_price" name="product_price" autocomplete="off">
                            <div id="product_priceFeedback" class="form-feedback"></div>
                        </div>
                        <div class="mb-3" style="text-align: center;">
                            <button type="submit" class="btn btn-success">Add Product</button>
                            <button type="reset" class="btn btn-danger">Clear</button>
                        </div>
                    <?= form_close() ?>
                </div>
                <?php else: ?>
                <div class="modal-body">
                    <div class="modal-text">
                        You don't have permissions to add resources.
                    </div>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>

    <div class="modal fade" id="editModal" role="dialog" arial-labelledby="editModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-md" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editLabel">Edit Product</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <?php if(has_permission('create')): ?>
                <div class="modal-body">
                    <?= form_open('products/editProduct', 'id="editData" class="needs-validation"'); ?>
                        <input type="hidden" name="product_id" id="product_id_edit">
                        <div class="mb-3">
                            <label for="product_name" class="form-label">Product Name</label>
                            <input type="text" class="form-control edit-input" id="product_name_edit" name="product_name" autocomplete="off">
                            <div id="product_nameEditFeedback" class="form-feedback"></div>
                        </div>
                        <div class="mb-3">
                            <label for="product_price" class="form-label">Product Price</label>
                            <input type="number" class="form-control edit-input" id="product_price_edit" name="product_price" autocomplete="off">
                            <div id="product_priceEditFeedback" class="form-feedback"></div>
                        </div>
                        <div class="mb-3" style="text-align: center;">
                            <button type="submit" class="btn btn-success">Save Product</button>
                            <button type="reset" class="btn btn-danger">Clear</button>
                        </div>
                    <?= form_close() ?>
                </div>
                <?php else: ?>
                <div class="modal-body">
                    <div class="modal-text">
                        You don't have permissions to edit resources.
                    </div>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>

    <div class="modal fade" id="deleteConfirmationModal" role="dialog" arial-labelledby="deleteConfirmationModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Delete Product</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <?php if(has_permission('delete')): ?>
                <div class="modal-body target-edited">
                    Are you sure delete this product?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-danger" onclick="return deleteProduct()">Delete it!</button>
                </div>
                <?php else: ?>
                <div class="modal-body">
                    <div class="modal-text">
                        You don't have permissions to delete resources.
                    </div>
                </div>
                <?php endif ?>
            </div>
        </div>
    </div>

    <?= view('_partials/footer') ?>
    <?= view('_partials/script') ?>
    <!-- DataTables  & Plugins -->
    <script src="<?= base_url('plugins/datatables/jquery.dataTables.min.js') ?>"></script>
    <script src="<?= base_url('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') ?>"></script>
    <script src="<?= base_url('plugins/datatables-responsive/js/dataTables.responsive.min.js') ?>"></script>
    <script src="<?= base_url('plugins/datatables-responsive/js/responsive.bootstrap4.min.js') ?>"></script>
    <script src="<?= base_url('plugins/datatables-buttons/js/dataTables.buttons.min.js') ?>"></script>
    <script src="<?= base_url('plugins/datatables-buttons/js/buttons.bootstrap4.min.js') ?>"></script>
    <script src="<?= base_url('plugins/jszip/jszip.min.js') ?>"></script>
    <script src="<?= base_url('plugins/pdfmake/pdfmake.min.js') ?>"></script>
    <script src="<?= base_url('plugins/pdfmake/vfs_fonts.js') ?>"></script>
    <script src="<?= base_url('plugins/datatables-buttons/js/buttons.html5.min.js') ?>"></script>
    <script src="<?= base_url('plugins/datatables-buttons/js/buttons.print.min.js') ?>"></script>
    <script src="<?= base_url('plugins/datatables-buttons/js/buttons.colVis.min.js') ?>"></script>
    <script>
        var product_table = null;
        var _deleteProductId = null;
        
        loadProduct();

        function loadProduct(){
            product_table = $("#product_table").DataTable({
                "processing": true,
                "serverSide": true,
                "ordering": true,
                "ajax": {
                    "url": "products/getProducts",
                    "type": "POST"
                },
                "columnDefs": [
                    { "targets": [0, 2, 3], "className": "text-center" }
                ],
                "columns": [
                    { "data": "product_id" },
                    { "data": "product_name" },
                    { "data": "product_price" },
                    { "render": function(data, type, row){
                        var a = "'"
                        var s = "', '"
                        var html = '<a href="#editModal" data-toggle="modal" onclick="return editProduct('+a+row.product_id+s+row.product_name+s+row.product_price+a+')"><span class="badge bg-success" data-toggle="tooltip" data-placement="top" title="Edit Product">Edit</span></a>&nbsp;'
                        html += '<a href="#deleteConfirmationModal" data-toggle="modal" onclick="return deleteConfirm('+a+row.product_id+s+row.product_name+a+')"><span class="badge bg-danger" data-toggle="tooltip" data-placement="top" title="Delete Product">Delete</span></a>'
                        return html
                    } }
                ]
            });
            
            $.fn.dataTable.Debounce = function ( table, options ) {
                var tableId = table.settings()[0].sTableId;
                $('.dataTables_filter input[aria-controls="' + tableId + '"]') // select the correct input field
                    .unbind()
                    .bind('input', (delay(function (e) {
                        table.search($(this).val()).draw();
                        return;
                    }, 700)));
                }
            
            function delay(callback, ms) {
                var timer = 0;
                return function () {
                    var context = this, args = arguments;
                    clearTimeout(timer);
                    timer = setTimeout(function () {
                        callback.apply(context, args);
                    }, ms || 0);
                };
            }

            var debounce = new $.fn.dataTable.Debounce(product_table);
        }

        $('#addData').submit(function(e){
            e.preventDefault();
            var fa = $(this);

            $.ajax({
                url: 'products/addProduct',
                type: 'POST',
                data: fa.serialize(),
                dataType: 'JSON',
                success: function(response) {
                    $('#addModal').modal('hide');
                    product_table.ajax.reload();
                    fa[0].reset()
                    $('.add-input').val('')
                },
                error: function(response){
                    $('.add-input').closest('input.form-control').removeClass('is-invalid')
                    .addClass('is-valid').find('div.form-feedback').removeClass('invalid-feedback').addClass('valid-feedback')
                    $.each(response.responseJSON.messages, function(key, value){
                        var element = $('.add-input#' + key);
                        element.closest('input.form-control')
                        .removeClass('is-valid')
                        .addClass('is-invalid');

                        $('div#'+ key +'Feedback.form-feedback')
                        .addClass('invalid-feedback').empty().append(value)
                        .removeClass('valid-feedback');
                    });
                }
            })
        });

        function editProduct(product_id, product_name, product_price){
            $('#editModal').on('shown.bs.modal', function(event){
                var modal = $(this);
                modal.find('input[id="product_id_edit"]').val(product_id)
                modal.find('input[id="product_name_edit"]').val(product_name)
                modal.find('input[id="product_price_edit"]').val(product_price)

            });
        }

        $('#editData').submit(function(e){
            e.preventDefault();
            var fa = $(this);

            $.ajax({
                url: 'products/editProduct',
                type: 'POST',
                data: fa.serialize(),
                dataType: 'JSON',
                success: function(response) {
                    $('#editModal').modal('hide');
                    product_table.ajax.reload();
                    fa[0].reset()
                    $('.edit-input').val('')
                },
                error: function(response){
                    $('.edit-input').closest('input.form-control').removeClass('is-invalid')
                    .addClass('is-valid').find('div.form-feedback').removeClass('invalid-feedback').addClass('valid-feedback')
                    $.each(response.responseJSON.messages, function(key, value){
                        var element = $('.edit-input#' + key +'_edit');
                        element.closest('input.form-control')
                        .removeClass('is-valid')
                        .addClass('is-invalid');

                        $('div#'+ key +'EditFeedback.form-feedback')
                        .addClass('invalid-feedback').empty().append(value)
                        .removeClass('valid-feedback');
                    });
                }
            })
        });

        function deleteConfirm(product_id, product_name){
            $('#deleteConfirmationModal').on('shown.bs.modal', function(event){
                var modal = $(this);
                modal.find('div.target-edited').replaceWith("<div class='modal-body target-edited'>Are you sure delete product " + product_name + " ?</div>")
            });
            _deleteProductId = product_id;
        }

        function deleteProduct(){
            if (_deleteProductId){
                $.ajax({
                    url: "products/deleteProduct/" + _deleteProductId,
                    type: "POST",
                    dataType: "JSON",
                    complete: function(response){
                        product_table.ajax.reload();
                        $('#deleteConfirmationModal').modal('hide');
                    }
                })
            }
        }
    </script>
</body>
</html>
