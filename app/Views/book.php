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
                <h1>Books</h1>
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
                                <table id="book_table" class="table table-bordered table-sm" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>Code</th>
                                            <th>Title</th>
                                            <th>Year</th>
                                            <th>Author</th>
                                            <th>Publisher</th>
                                            <th>Pub. Year</th>
                                            <th>Status</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                </table>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <button type="button" class="btn btn-sm btn-primary btn-block" data-toggle="modal" data-target="#addModal">Add Book</button>
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
                    <h5 class="modal-title" id="addLabel">Add Book</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <?php if(has_permission('create')): ?>
                <div class="modal-body">
                    <?= form_open('book/addBook', 'id="addData" class="needs-validation"'); ?>
                    <div class="row">
                        <div class="form-group col-6">
                            <label for="code" class="form-label">Code * </label>
                            <input type="text" class="form-control add-input" id="code" name="code" autocomplete="off">
                            <div id="codeFeedback" class="form-feedback"></div>
                        </div>
                        <div class="form-group col-6">
                            <label for="status" class="form-label">Status</label>
                            <select name="status" id="status" class="custom-select add-input">
                                <option value="Available">Available</option>
                                <option value="Not Available">Not Available</option>
                            </select>
                            <div id="statusFeedback" class="form-feedback"></div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-12">
                            <label for="title" class="form-label">Title *</label>
                            <input type="text" class="form-control add-input" id="title" name="title" autocomplete="off">
                            <div id="titleFeedback" class="form-feedback"></div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-12">
                            <label for="author" class="form-label">Author</label>
                            <input type="text" class="form-control add-input" id="author" name="author" autocomplete="off">
                            <div id="authorFeedback" class="form-feedback"></div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-12">
                            <label for="publisher" class="form-label">Publisher</label>
                            <input type="text" class="form-control add-input" id="publisher" name="publisher" autocomplete="off">
                            <div id="publisherFeedback" class="form-feedback"></div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-6">
                            <label for="year" class="form-label">Year</label>
                            <input type="number" class="form-control add-input" id="year" name="year" autocomplete="off">
                            <div id="yearFeedback" class="form-feedback"></div>
                        </div>
                        <div class="form-group col-6">
                            <label for="publication_year" class="form-label">Publication Year</label>
                            <input type="number" class="form-control add-input" id="publication_year" name="publication_year" autocomplete="off">
                            <div id="publication_yearFeedback" class="form-feedback"></div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-12" style="text-align: center;">
                            <button type="submit" class="btn btn-success">Add Book</button>
                            <button type="reset" class="btn btn-danger">Clear</button>
                        </div>
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
                    <h5 class="modal-title" id="editLabel">Edit Book</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <?php if(has_permission('update')): ?>
                <div class="modal-body">
                    <?= form_open('book/editBook', 'id="editData" class="needs-validation"'); ?>
                    <input type="hidden" name="id" id="id_edit">
                    <div class="row">
                        <div class="form-group col-6">
                            <label for="code" class="form-label">Code *</label>
                            <input type="text" class="form-control edit-input" id="code_edit" name="code" autocomplete="off">
                            <div id="codeEditFeedback" class="form-feedback"></div>
                        </div>
                        <div class="form-group col-6">
                            <label for="status" class="form-label">Status</label>
                            <select name="status" id="status_edit" class="custom-select edit-input">
                                <option value="Available">Available</option>
                                <option value="Not Available">Not Available</option>
                            </select>
                            <div id="statusFeedback" class="form-feedback"></div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-12">
                            <label for="title" class="form-label">Title *</label>
                            <input type="text" class="form-control edit-input" id="title_edit" name="title" autocomplete="off">
                            <div id="titleEditFeedback" class="form-feedback"></div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-12">
                            <label for="author" class="form-label">Author</label>
                            <input type="text" class="form-control edit-input" id="author_edit" name="author" autocomplete="off">
                            <div id="authorFeedback" class="form-feedback"></div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-12">
                            <label for="publisher" class="form-label">Publisher</label>
                            <input type="text" class="form-control edit-input" id="publisher_edit" name="publisher" autocomplete="off">
                            <div id="publisherFeedback" class="form-feedback"></div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-6">
                            <label for="year" class="form-label">Year</label>
                            <input type="number" class="form-control edit-input" id="year_edit" name="year" autocomplete="off">
                            <div id="yearFeedback" class="form-feedback"></div>
                        </div>
                        <div class="form-group col-6">
                            <label for="publication_year" class="form-label">Publication Year</label>
                            <input type="number" class="form-control edit-input" id="publication_year_edit" name="publication_year" autocomplete="off">
                            <div id="publication_yearFeedback" class="form-feedback"></div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-12" style="text-align: center;">
                            <button type="submit" class="btn btn-success">Save Book</button>
                            <button type="reset" class="btn btn-danger">Clear</button>
                        </div>
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
                    <h5 class="modal-title">Delete Book</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <?php if(has_permission('delete')): ?>
                <div class="modal-body target-edited">
                    Are you sure delete this book?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-danger" onclick="return deleteBook()">Delete it!</button>
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
        var book_table = null;
        var _deleteBookId = null;
        
        loadBook();

        function loadBook(){
            book_table = $("#book_table").DataTable({
                "processing": true,
                "serverSide": true,
                "ordering": true,
                "ajax": {
                    "url": "book/getBooks",
                    "type": "POST"
                },
                "columnDefs": [
                    { "targets": [0, 2, 3, 5], "className": "text-center" }
                ],
                "columns": [
                    { "data": "code" },
                    { "data": "title" },
                    { "data": "year" },
                    { "data": "author" },
                    { "data": "publisher" },
                    { "data": "publication_year" },
                    { "data": "status" },
                    { "render": function(data, type, row){
                        var a = "'"
                        var s = "', '"
                        var html = '<a href="#editModal" data-toggle="modal" onclick="return editBook('+a+row.id+s+row.code+s+row.title+s+row.year+s+row.author+s+row.publisher+s+row.publication_year+s+row.status+a+')"><span class="badge bg-success" data-toggle="tooltip" data-placement="top" title="Edit Book">Edit</span></a>&nbsp;'
                        html += '<a href="#deleteConfirmationModal" data-toggle="modal" onclick="return deleteConfirm('+a+row.id+s+row.title+a+')"><span class="badge bg-danger" data-toggle="tooltip" data-placement="top" title="Delete Book">Delete</span></a>'
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

            var debounce = new $.fn.dataTable.Debounce(book_table);
        }

        $('#addData').submit(function(e){
            e.preventDefault();
            var fa = $(this);

            $.ajax({
                url: 'book/addBook',
                type: 'POST',
                data: fa.serialize(),
                dataType: 'JSON',
                success: function(response) {
                    $('#addModal').modal('hide');
                    book_table.ajax.reload();
                    fa[0].reset();
                    $('.add-input').val('');
                    toastr.success('Book Added');
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

        function editBook(id, code, title, year, author, publisher, publication_year, status){
            $('#editModal').on('shown.bs.modal', function(event){
                var modal = $(this);
                modal.find('input[id="id_edit"]').val(id)
                modal.find('input[id="code_edit"]').val(code)
                modal.find('input[id="title_edit"]').val(title)
                modal.find('input[id="year_edit"]').val(year)
                modal.find('input[id="author_edit"]').val(author)
                modal.find('input[id="publisher_edit"]').val(publisher)
                modal.find('input[id="publication_year_edit"]').val(publication_year)
                modal.find('select[id="status_edit"]').val(status)
            });
        }

        $('#editData').submit(function(e){
            e.preventDefault();
            var fa = $(this);

            $.ajax({
                url: 'book/editBook',
                type: 'POST',
                data: fa.serialize(),
                dataType: 'JSON',
                success: function(response) {
                    $('#editModal').modal('hide');
                    book_table.ajax.reload();
                    fa[0].reset();
                    $('.edit-input').val('');
                    toastr.success('Book Updated');
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

        function deleteConfirm(id, title){
            $('#deleteConfirmationModal').on('shown.bs.modal', function(event){
                var modal = $(this);
                modal.find('div.target-edited').replaceWith("<div class='modal-body target-edited'>Are you sure delete book " + title + " ?</div>")
            });
            _deleteBookId = id;
        }

        function deleteBook(){
            if (_deleteBookId){
                $.ajax({
                    url: "book/deleteBook/" + _deleteBookId,
                    type: "POST",
                    dataType: "JSON",
                    complete: function(response){
                        book_table.ajax.reload();
                        $('#deleteConfirmationModal').modal('hide');
                        toastr.success('Book Deleted');
                    }
                })
            }
        }
    </script>
</body>
</html>
