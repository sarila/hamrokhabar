@extends('admin.includes.admin_design')


@section('title') Add New News - {{ $theme->website_name }}   @endsection


@section('content')
    <!-- Page Content -->
    <div class="content container-fluid">

        <!-- Page Header -->
        <div class="page-header">
            <div class="row align-items-center">
                <div class="col">
                    <h3 class="page-title">News</h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('adminDashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active">Add New</li>
                    </ul>
                </div>
                <div class="col-auto float-right ml-auto">
                    <a href="{{ route('news') }}" class="btn add-btn" ><i class="fa fa-eye"></i> All News</a>
                </div>
            </div>
        </div>
        <!-- /Page Header -->

        @if($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <form method="post" action="" enctype="multipart/form-data">
                            @csrf
                            <div class="text-center">
                                <img src="" alt="" width="200px" id="one" style="margin-top: 15px; margin-bottom: 10px">
                            </div>

                            <div class="row">

                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="parent_id">Select Category <span class="text-danger">*</span></label>
                                        <select name="category_id" id="category_id" class="form-control select">
                                            <?php echo $categories_dropdown; ?>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="province_id">Select Province</label>
                                        <select name="province_id" id="province_id" class="form-control select" required>
                                            <option selected disabled>Select Pradesh</option>
                                            @foreach($provinces as $province)
                                                <option value="{{ $province->id }}">{{ $province->province_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="image">Post Image <span class="text-danger">*</span></label>
                                        <input type="file" name="image" class="form-control" id="image" accept="image/*" onchange="readURL(this);">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="post_title_np">Post Title (नेपाली) <span class="text-danger">*</span></label>
                                        <input type="hidden" class="form-control" name="post_title" id="post_title" value="{{ old('post_title') }}">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Content</label>
                                <textarea rows="5" cols="5" class="form-control editor1" id="editor1"  name="content">
                                    {{ old('content') }}
                                </textarea>
                            </div>
                            <div class="row">
                               <div class="col-md-12">
                                   <div class="form-group">
                                       <label for="tag_id">Select Tags</label>
                                       <select name="tag_id[]" id="tag_id" class="form-control select-tags" required multiple>
                                           @foreach ($tags as $tag)
                                               <option value="{{ $tag->id }}"> {{ $tag->name }} </option>
                                           @endforeach
                                       </select>
                                       
                                   </div>
                               </div>
                           </div>

                            <hr>
                            <h4 class=" text-uppercase">
                                SEO Settings
                            </h4>
                            <hr>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="seo_title" style="font-size: 14px">SEO Title</label>
                                        <input class="form-control" type="text" name="seo_title" id="seo_title" >
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="seo_subtitle" style="font-size: 14px">SEO Sub Title</label>
                                        <input class="form-control" type="text" name="seo_subtitle" id="seo_subtitle" >
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="seo_description" style="font-size: 14px">SEO Description</label>
                                        <input class="form-control" type="text" name="seo_description" id="seo_description" >
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="keywords" style="font-size: 14px">SEO Keywords</label>
                                        <input class="form-control" type="text" name="keywords" id="keywords" >
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="text-right">
                                    <button type="submit" class="btn btn-primary">Add News</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>



    </div>
    <!-- /Page Content -->
@endsection

@section('js')
    <!-- CKEDITOR js -->
    <script src="https://cdn.ckeditor.com/4.12.1/standard/ckeditor.js"></script>
    <script type="text/javascript">
        CKEDITOR.replace('editor1', {
            filebrowserUploadUrl: "{{route('ckeditor.store', ['_token' => csrf_token() ])}}",
            filebrowserUploadMethod: 'form'
        });
    </script>

    <script>
        function readURL(input){
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#one')
                        .attr('src', e.target.result)
                        .width(600)
                };
                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>

    <!-- Select Multiple Tags using select 2 -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.7/js/select2.min.js"></script>
    <script>
        $('.select-tags').select2({
            placeholder: 'Select Tags',
        });
    </script>




@endsection
