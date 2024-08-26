<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>AdminLTE 3 | Blank Page</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('adm/plugins/fontawesome-free/css/all.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('adm/dist/css/adminlte.min.css') }}">
</head>

<body class="hold-transition sidebar-mini">
    <!-- Site wrapper -->
    <div class="wrapper">
        <!-- Navbar -->
        @include('inc.navbar')
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        @include('inc.sidebar')

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper" style="background-color:#c9b2be !important">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>@yield('title')</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Blank Page</li>
                            </ol>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>

            <!-- Main content -->
            <section class="content">

                <!-- Default box -->
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">@yield('title')</h3>

                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                            <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                                <i class="fas fa-times"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        @yield('content')
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                        Footer
                    </div>
                    <!-- /.card-footer-->
                </div>
                <!-- /.card -->

            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

        <footer class="main-footer">
            <div class="float-right d-none d-sm-block">
                <b>Version</b> 3.2.0
            </div>
            <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights
            reserved.
        </footer>

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

    <!-- jQuery -->
    <script src="{{ asset('adm/plugins/jquery/jquery.min.js') }}"></script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('adm/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('adm/dist/js/adminlte.min.js') }}"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="{{ asset('adm/dist/js/demo.js') }}"></script>

    <script>
        $('#category_id').change(function() {
            // alert("Test")
            let category_id = $(this).val();
            option = "";
            // let category_id = $('#category_id').val();

            $.ajax({
                url: '/get-products/' + category_id,
                type: 'GET',
                dataType: 'json',
                success: function(resp) {
                    option += "<option value=''>Pilih Produk</option>"
                    $.each(resp, function(index, val) {
                        option += "<option value=" + val.id + ">" + val.product_name +
                            "</option>"
                    });

                    $('#product_id').html(option);
                }
            });
        });

        $('#product_id').change(function() {
            // console.log('asdasdas');
            let product_id = $(this).val(),
                product_name = $('#product_name').val(),
                product_price = $('#product_price').val();
            // console.log(product_id);

            $.ajax({
                url: 'get-product/' + product_id,
                type: 'GET',
                dataType: 'json',
                success: function(data) {
                    $('#product_name').val(data.product_name);
                    $('#product_price').val(data.product_price);
                }
            });
        })

        $('.tambah-produk').click(function() {
            let category_id = $('#category_id').val(),
                produk_id = $('#produk_id').val();

            if (category_id == "") {
                alert('Mohon Pilih Kategori Terlebih Dahulu!');
                return false;
            }

            if (produk_id == "") {
                alert('Mohon Pilih Produk Terlebih Dahulu!');
                return false;
            }

            let product_qty = $('#product_qty').val(),
                product_name = $('#product_name').val(),
                product_price = parseInt($('#product_price').val()),
                subTotal = product_price * product_qty;

            let newRow = "";
            newRow += "<tr>"
            newRow += `<td>${product_name}</td>`;
            newRow += "<td>" + product_price.toLocaleString('id-ID') + "</td>";
            newRow += "<td>" + product_qty + "</td>";
            newRow += "<td>" + subTotal + "<input type='hidden' class='sub_total_val' value='" + subTotal + "'> </td>";
            newRow += "<td></td>";
            newRow += "</tr>"

            $('tbody').append(newRow);

            let total = 0;
            $('.sub_total_val').each(function() {
                let subTotal = parseFloat($(this).val()) || 0;
                total += subTotal;
            });

            $('.total_price').text(total);
        });
    </script>
</body>

</html>
