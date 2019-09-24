@extends('admin.dashboard.layouts.app')

@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Update category</h1>
        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
    </div>
    <div class="row">
        <div class="col-6">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Update category form</h6>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('admin.dashboard.category.update', ['categoryId' => $categoryToBeUpdated->id]) }}">
                        @csrf
                        <div class="form-group">
                            <label for="">Category name</label>
                            <input value="{{ $categoryToBeUpdated->name }}" name="category_name" type="text" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="">Parent category</label>
                            <select name="parent_category_id" class="form-control">
                                <option value="">Select parent category</option>
                                @foreach($categories as $category)
                                    <option
                                        @if(!is_null($categoryToBeUpdated->parent_category_id))
                                        @if($categoryToBeUpdated->parent_category_id === $category->id)
                                        selected="selected"
                                        @endif
                                        @endif
                                        value="{{ $category->id }}">{{ $category->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <button class="btn btn-primary">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection