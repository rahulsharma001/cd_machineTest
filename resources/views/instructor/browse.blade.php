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
                            <h3>Instructor List
                            </h3>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <ol class="breadcrumb pull-right">
                            <li class="breadcrumb-item"><a href="index.html"><i data-feather="home"></i></a></li>
                            <li class="breadcrumb-item">Instructor</li>
                            <li class="breadcrumb-item active">Instructors List</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <!-- Container-fluid Ends-->

        <!-- Delete Modal -->
        <x-delete classSc='instructor' classUc='Instructor' />

        <!-- Container-fluid starts-->
        <div class="container-fluid">
            <div class="card">
                <div class="card-header">
                    <h5>Instructor Details</h5>
                </div>
                <div class="card-body">
                    <div class="btn-popup pull-right">
                        <a href="{{route('instructor.create')}}" class="btn btn-secondary">Create Instructor</a>
                    </div>
                    <div id="batchDelete" class="category-table instructor-list order-table"></div>
                    <div class="table-responsive">
                        <div id="basicScenario" class="instructor-physical">
                            <table id="instructor-datatable">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th width="100px">Action</th>
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
    $(document).ready(function () {
        var role = "{{auth()->user()->hasRole('super-admin')}}"
        console.log(role)
        var table = $('#instructor-datatable').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('instructor.index') }}",
            columns: [{
                    data: 'DT_RowIndex',
                    name: 'DT_RowIndex'
                },
                {
                    data: 'name',
                    name: 'name'
                },
                {
                    data: 'email',
                    name: 'email'
                },
                {
                    data: 'action',
                    name: 'action',
                    width: '20%',
                    visible: role,
                    orderable: false,
                    searchable: false
                },
            ]
        });

    });

    $(document).on('click', '.delete-instructor', function (e) {
        console.log(e)
        var dataId = e.target.dataset.id
        console.log(dataId)

        var $deleteModal = $('#deleteInstructor')
        $deleteModal.modal('show')

        $('#instructor-delete-submit').on('click', function (e) {
            e.preventDefault()
            var deleteUrl = 'instructor/' + dataId,
                form = $('#instructor-delete-form')

            form.attr('action', deleteUrl)
            form.submit()
        })
    })

</script>
@endsection
