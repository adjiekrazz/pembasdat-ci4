<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Products - Codeigniter 4</title>
	<meta name="description" content="The small framework with powerful features">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="shortcut icon" type="image/png" href="/favicon.ico"/>

	<!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?= base_url('css/bootstrap.min.css') ?>">
    <!-- Datatables CSS -->
    <link rel="stylesheet" href="<?= base_url('css/dataTables.bootstrap5.min.css') ?>">
</head>
<body>
    <?= view('_partials/navbar'); ?>

    <div class="container mt-4">
        <div class="card">
            <div class="card-body">
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
                        <div class="d-grid gap-2">
                            <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#addModal">Add Product</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="addModal" role="dialog" arial-labelledby="addModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-md" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addLabel">Add Product</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>

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
            </div>
        </div>
    </div>

    <div class="modal fade" id="editModal" role="dialog" arial-labelledby="editModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-md" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editLabel">Edit Product</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>

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
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="<?= base_url('js/bootstrap.bundle.min.js') ?>"></script>
    <!-- JQuery and Datatables JS -->
    <script src="<?= base_url('js/jquery-3.6.0.min.js') ?>"></script>
    <script src="<?= base_url('js/jquery.dataTables.min.js') ?>"></script>
    <script src="<?= base_url('js/dataTables.bootstrap5.min.js') ?>"></script>
    <script>
        var product_table = null;
        
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
                        var html = '<a href="#editModal" data-bs-toggle="modal" onclick="return editProduct('+a+row.product_id+s+row.product_name+s+row.product_price+a+')"><span class="badge bg-success" data-toggle="tooltip" data-placement="top" title="Edit Product">Edit</span></a>&nbsp;'
                        html += '<a href="#" onclick="return deleteProduct('+a+row.product_id+a+')"><span class="badge bg-danger" data-toggle="tooltip" data-placement="top" title="Delete Product">Delete</span></a>'
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

        function deleteProduct(product_id){
            $.ajax({
                url: "products/deleteProduct/" + product_id,
                type: "POST",
                dataType: "JSON",
                complete: function(response){
                    product_table.ajax.reload();
                    console.log(response.statusText)
                }
            })
        }
    </script>
</body>
</html>
