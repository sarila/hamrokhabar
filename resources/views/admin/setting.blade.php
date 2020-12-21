@extends('admin.includes.admin_design_v2')
​@section('title') Site Settings - {{ $theme->website_name }}   @endsection
​
@section('content')
    <div class="content container-fluid">
        <div class="row">
            <div class="col-md-8 offset-md-2">

                <!-- Page Header -->
                <div class="page-header">
                    <div class="row">
                        <div class="col-sm-12">
                            <h3 class="page-title">Site Settings</h3>
                        </div>
                    </div>
                </div>
                <!-- /Page Header -->

                @if(Session::has('error_message'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert" style="height: 40px; padding: 10px;">
                        {{ Session::get('error_message') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true" style="position: relative; top: -10px;">&times;</span>
                        </button>
                    </div>
                @endif
                @if(Session::has('success_message'))
                    <div class="alert alert-info alert-dismissible fade show" role="alert" style="height: 40px; padding: 10px;">
                        {{ Session::get('success_message') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true" style="position: relative; top: -10px;">&times;</span>
                        </button>
                    </div>
                @endif
                @if($errors->any())
                    <div class="alert alert-danger" >
                        <ul style="list-style: none; ">
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form method="post" action="{{route('updateSetting', $setting->id) }}">
                    @csrf
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="site_title">Site Title <span class="text-danger">*</span></label>
                                <input class="form-control" name="site_title" id="site_title" type="text" value="{{ $setting->site_title }}">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="site_subtitle">Site Sub Title <span class="text-danger">*</span></label>
                                <input class="form-control" name="site_subtitle" id="site_subtitle" type="text" value="{{ $setting->site_subtitle }}">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="site_title_np">Site Title (नेपाली)  <span class="text-danger">*</span></label>
                                <input class="form-control" name="site_title_np" id="site_title_np" type="text" value="{{ $setting->site_title_np }}">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="site_subtitle">Site Sub Title (नेपाली) <span class="text-danger">*</span></label>
                                <input class="form-control" name="site_subtitle_np" id="site_subtitle_np" type="text" value="{{ $setting->site_subtitle_np }}">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="address">Address <span class="text-danger">*</span></label>
                                <input class="form-control" name="address" id="address" value="{{ $setting->address }}" type="text">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="email">Email <span class="text-danger">*</span></label>
                                <input class="form-control" name="email" id="email" value="{{ $setting->email }}" type="email">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="alternate_email">Alternate Email</label>
                                <input class="form-control" id="alternate_email" name="alternate_email" value="{{ $setting->alternate_email }}" type="text">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="sampadak">कार्यालय सम्पादक   <span class="text-danger">*</span></label>
                                <input class="form-control" name="sampadak" id="sampadak" type="text" value="{{ $setting->sampadak }}">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="nirdesak">प्रबन्ध निर्देशक<span class="text-danger">*</span></label>
                                <input class="form-control" name="nirdesak" id="nirdesak" type="text" value="{{ $setting->nirdesak }}">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label for="phone_number">Phone Number</label>
                                <input class="form-control" name="phone_number" id="phone_number" value="{{ $setting->phone_number }}" type="text">
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label for="mobile_number">Mobile Number</label>
                                <input class="form-control" name="mobile_number" id="mobile_number" value="{{ $setting->mobile_number }}" type="text">

                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label for="ads_number">विज्ञापनका लागि </label>
                                <input class="form-control" name="ads_number" id="ads_number" value="{{ $setting->ads_number }}" type="text">
                            </div>
                        </div>
                    </div>

                    <div class="submit-section">
                        <button class="btn btn-primary submit-btn" type="submit">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection