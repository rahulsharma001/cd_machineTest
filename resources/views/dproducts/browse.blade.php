@extends('layouts.app')
@section('content')

<!-- Page Body Start-->
<div class="page-body-wrapper">

    <!-- Page Sidebar Start-->
    @include('layouts.sidebar')
    <!-- Page Sidebar Ends-->

    <!-- Right sidebar Start-->
    @include('layouts.rsidebar')
    <!-- Right sidebar Ends-->

    <div class="page-body">

        <!-- Container-fluid starts-->
        <div class="container-fluid">
            <div class="page-header">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="page-header-left">
                            <h3>Duplicate Product List
                                <small>Keshaa CRM</small>
                            </h3>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <ol class="breadcrumb pull-right">
                            <li class="breadcrumb-item"><a href="index.html"><i data-feather="home"></i></a></li>
                            <li class="breadcrumb-item">Duplicate Products</li>
                            <li class="breadcrumb-item active">Duplicate Product List</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <!-- Container-fluid Ends-->

        <!-- Delete Modal -->
        <x-delete classSc='product' classUc='Product' />

        <!-- Container-fluid starts-->
        <div class="container-fluid">
            <div class="card">
                <div class="card-header">
                    <h5>Duplicate Product Details</h5>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <div id="basicScenario" class="product-physical">
                            <table id="dproduct-datatable">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Photo</th>
                                        <th>Name</th>
                                        <th>Price</th>
                                        <th>Description</th>
                                        <th>Quantity</th>
                                        <th>Category</th>
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Container-fluid Ends-->


    </div>

    <!-- footer start-->
    @include('layouts.footer')
    <!-- footer end-->
</div>

</div>
@endsection

@section('scripts')
<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>

<script>
    $(document).ready(function() {
        var table = $('#dproduct-datatable').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('dproduct.index') }}",
            columns: [{
                    data: 'DT_RowIndex',
                    name: 'DT_RowIndex'
                },
                {
                    data: 'photo',
                    name: 'photo',
                    render: function(data,type){
                        return "<img src='/storage/product_images/"+data+"' height="+45+"/>"
                    }
                },
                {
                    data: 'name',
                    name: 'name'
                },
                {
                    data: 'price',
                    name: 'price'
                },
                {
                    data: 'description',
                    name: 'description'
                },
                {
                    data: 'quantity',
                    name: 'quantity'
                },
                {
                    data: 'category',
                    name: 'category'
                },
            ]
        });

    });
</script>
@endsection