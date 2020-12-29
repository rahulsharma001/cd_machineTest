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
                            <h3>{{isset($instructor) ? 'Edit' : 'Add'}} instructor
                            </h3>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <ol class="breadcrumb pull-right">
                            <li class="breadcrumb-item"><a href="index.html"><i data-feather="home"></i></a></li>
                            <li class="breadcrumb-item active">{{isset($instructor) ? 'Edit' : 'Add'}} instructor</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <!-- Container-fluid Ends-->

        <!-- Container-fluid starts-->
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-header">
                            <h5>{{isset($instructor) ? 'Edit' : 'Add'}} instructor</h5>
                        </div>
                        <div class="card-body">
                            <form class="needs-validation add-product-form"
                                action="{{!isset($instructor) ? '/instructor' :  '/instructor/' . $instructor->id}}"
                                method="POST" enctype="multipart/form-data">
                                @csrf
                                @if(isset($instructor))
                                {{method_field('PATCH')}}
                                @endif
                                <div class="row product-adding">

                                    <div class="col-xl-7">
                                        <div class="form">
                                            <div class="form-group mb-3 row">
                                                <label for="validationCustom01" class="col-xl-3 col-sm-4 mb-0">Name
                                                    :</label>
                                                <input name="name" value="{{old('name',$instructor->name ?? '')}}"
                                                    class="form-control col-xl-8 col-sm-7" id="validationCustom01"
                                                    type="text" required="true">
                                                <div class="valid-feedback">Looks good!</div>
                                            </div>

                                            <div class="form-group mb-3 row">
                                                <label for="validationCustom01" class="col-xl-3 col-sm-4 mb-0">Email
                                                    :</label>
                                                <input name="email" value="{{old('name',$instructor->email ?? '')}}"
                                                    class="form-control col-xl-8 col-sm-7" id="validationCustom01"
                                                    type="text" required="true">
                                                <div class="valid-feedback">Looks good!</div>
                                            </div>

                                            <div class="form-group mb-3 row">
                                                <label for="validationCustom02" class="col-xl-3 col-sm-4 mb-0">Password
                                                    :</label>
                                                <input name="password" class="form-control col-xl-8 col-sm-7"
                                                    id="validationCustom02" type="password" @if(!isset($instructor))
                                                    required @endif>
                                                <div class="valid-feedback">Looks good!</div>
                                            </div>

                                        </div>
                                        <div class="form">



                                        </div>
                                        <div class="offset-xl-3 offset-sm-4">
                                            <button type="submit" class="btn btn-primary">Add</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
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
