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
                            <h3>{{isset($product) ? 'Edit' : 'Add'}} Products
                            </h3>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <ol class="breadcrumb pull-right">
                            <li class="breadcrumb-item"><a href="index.html"><i data-feather="home"></i></a></li>
                            <li class="breadcrumb-item">Physical</li>
                            <li class="breadcrumb-item active">{{isset($product) ? 'Edit' : 'Add'}} Product</li>
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
                        <h5>{{isset($product) ? 'Edit' : 'Add'}} Product</h5>
                        </div>
                        <div class="card-body">
                            <form class="needs-validation add-product-form" action="{{!isset($product) ? '/product' :  '/product/' . $product->id}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @if(isset($product))
                                    {{method_field('PATCH')}}
                                @endif  
                            <div class="row product-adding">
                                <div class="col-xl-5">
                                        <div class="add-product">
                                            <div class="row">
                                                <div class="col-xl-9 xl-50 col-sm-6 col-9">
                                                    <img id="pro-main-img" src="{{isset($product) ? asset($product->photo) : asset('assets/images/pro3/1.jpg')}}" alt="" class="img-fluid image_zoom_1 blur-up lazyloaded">
                                                </div>
                                                <div class="col-xl-3 xl-50 col-sm-6 col-3">
                                                    <ul class="file-upload-product">
                                                        <li>
                                                            <div class="box-input-file"><input name="photo" class="upload" type="file" required><i class="fa fa-plus"></i></div>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                        <div class="col-xl-7">
                                            <div class="form">
                                                <div class="form-group mb-3 row">
                                                    <label for="validationCustom01" class="col-xl-3 col-sm-4 mb-0">Title :</label>
                                                    <input name="name" value="{{old('name',$product->name ?? '')}}" class="form-control col-xl-8 col-sm-7" id="validationCustom01" type="text" required="true">
                                                    <div class="valid-feedback">Looks good!</div>
                                                </div>

                                                <div class="form-group mb-3 row">
                                                    <label for="validationCustom01" class="col-xl-3 col-sm-4 mb-0">Category :</label>
                                                    <select name="category_id" class="custom-select col-md-7" required="true">
                                                        @if(isset($categories))
                                                            <option value="">--Select--</option>
                                                                @foreach($categories as $category)
                                                                    <option value="{{$category->id}}">{{$category->name}}</option>
                                                                @endforeach
                                                        @else
                                                            <option value="{{$product->category->id}}">{{$product->category->name}}</option>
                                                        @endif
                                                    </select>
                                                    <div class="valid-feedback">Looks good!</div>
                                                </div>
                                              
                                                <div class="form-group mb-3 row">
                                                    <label for="validationCustom02" class="col-xl-3 col-sm-4 mb-0">Price :</label>
                                                    <input name="price" value="{{old('price',$product->price ?? '')}}" class="form-control col-xl-8 col-sm-7" id="validationCustom02" type="text" required="true">
                                                    <div class="valid-feedback">Looks good!</div>
                                                </div>
                                               
                                            </div>
                                            <div class="form">
                                                
                                                <div class="form-group row">
                                                    <label class="col-xl-3 col-sm-4 mb-0">Total Products :</label>
                                                    <fieldset class="qty-box col-xl-9 col-xl-8 col-sm-7 pl-0">
                                                        <div class="input-group">
                                                            <input name="quantity" value="{{old('quantity',$product->quantity ?? '')}}" class="touchspin" type="text" value="1" required>
                                                        </div>
                                                    </fieldset>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-xl-3 col-sm-4">Add Description :</label>
                                                    <div class="col-xl-8 col-sm-7 pl-0 description-sm">
                                                        <textarea name="description"  id="editor1" name="editor1" cols="10" rows="4">{{old('description',$product->description ?? '')}}</textarea>
                                                    </div>
                                                </div>
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

@section('scripts')
<script>
    $('input[type=file]').change(function() {
        // console.log('file changed', $(this).parent())
        var parentElement = $(this).parent()
        readURL(this, parentElement)
    })

    function readURL(input, parentElement) {
        // console.log($(parentElement).html())
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $(parentElement).css('background-image', 'url(' + e.target.result + ')');
                $(parentElement).css('background-size', 'contain');
                // $('#imagePreview').hide();
                // $('#imagePreview').fadeIn(650);

                var zoomImage = $('#pro-main-img')
                var zoomConfig = {
                    cursor: 'crosshair',
                    zoomType: "inner"
                };

                $('#pro-main-img').attr('src', e.target.result)

                $('.zoomContainer').remove();
                zoomImage.removeData('elevateZoom');
                // Update source for images
                zoomImage.attr('src', e.target.result);
                zoomImage.data('zoom-image', e.target.result);
                // Reinitialize EZ
                zoomImage.elevateZoom(zoomConfig);

            }
            reader.readAsDataURL(input.files[0]);
        }
    }
</script>
@endsection