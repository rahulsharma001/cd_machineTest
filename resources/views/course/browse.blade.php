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
                            <h3>Course List
                            </h3>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <ol class="breadcrumb pull-right">
                            <li class="breadcrumb-item"><a href="index.html"><i data-feather="home"></i></a></li>
                            <li class="breadcrumb-item">Course</li>
                            <li class="breadcrumb-item active">Course List</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <!-- Container-fluid Ends-->

        <!-- Delete Modal -->
        <x-delete classSc='course' classUc='Course' />
        <!-- Container-fluid starts-->
        <div class="container-fluid">
            <div class="card">
                <div class="card-header">
                    <h5>Course Details</h5>
                </div>
                <div class="card-body">
                    <div class="btn-popup pull-right">
                        <a href="{{route('course.create')}}" class="btn btn-secondary">Create Course</a>
                    </div>
                    <div id="batchDelete" class="category-table instructor-list order-table"></div>
                    <div class="table-responsive">
                        <div id="basicScenario" class="instructor-physical">
                            <table id="course-datatable">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Name</th>
                                        <th>Level</th>
                                        <th>Description</th>
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
        var table = $('#course-datatable').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('course.index') }}",
            columns: [{
                    data: 'DT_RowIndex',
                    name: 'DT_RowIndex'
                },
                {
                    data: 'name',
                    name: 'name'
                },
                {
                    data: 'level',
                    name: 'level'
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

    $(document).on('click', '.delete-course', function (e) {
        console.log(e)
        var dataId = e.target.dataset.id
        console.log(dataId)

        var $deleteModal = $('#courseInstructor')
        $deleteModal.modal('show')

        $('#instructor-course-submit').on('click', function (e) {
            e.preventDefault()
            var deleteUrl = 'course/' + dataId,
                form = $('#course-delete-form')

            form.attr('action', deleteUrl)
            form.submit()
        })
    })

</script>
@endsection
