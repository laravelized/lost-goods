@extends('user.layouts.app')

@section('content')
    <div class="container h-100" style="margin-top: 50px;">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3>Post found</h3>
                    </div>
                    <div class="card-body">
                        <form enctype="multipart/form-data" action="{{ route('user.founds.my.post') }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="">Name</label>
                                        <input name="name" type="text" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Category</label>
                                        <select name="category" class="form-control">
                                            @foreach($categories as $category)
                                                <option value="{{ $category->name }}">{{ $category->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Place of found</label>
                                        <input name="place_of_found" type="text" class="form-control">
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="">Date of found</label>
                                        <input id="date_of_found_input" name="date_of_found" type="text" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Image</label>
                                        <input name="image" type="file" class="form-control-file">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Information</label>
                                        <textarea name="information"  cols="30" rows="10" class="form-control"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Mobile number</label>
                                        <input type="text" class="form-control">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <button class="btn btn-success">Save</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('after-style')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css">
@endpush

@push('after-script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
    <script>
        $(document).ready(function () {
            $('#date_of_found_input').datepicker({
                orientation: "bottom",
                format: 'yyyy-mm-dd',
                autoclose: true
            });
        });
    </script>
@endpush