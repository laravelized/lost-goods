@extends('user.layouts.app-with-side-menu')

@section('content')
    <div class="row">
        <div class="col-md-12" style="margin-top: 50px;">
            <a href="{{ route('user.founds.my.post.form') }}" class="btn btn-success">Post your found</a>
        </div>

        <div class="col-md-12" style="margin-top: 20px;">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-3">
                                    <img class="img-thumbnail" src="https://www.w3schools.com/bootstrap4/paris.jpg" alt="">
                                </div>
                                <div class="col-md-9">
                                    <table class="table table-bordered">
                                        <tr>
                                            <th colspan="2">Kehilangan dompet warna coklat</th>
                                        </tr>
                                        <tr>
                                            <th>Category</th>
                                            <td>Accessory</td>
                                        </tr>
                                        <tr>
                                            <th>Lost date</th>
                                            <td>10-09-2019</td>
                                        </tr>
                                        <tr>
                                            <th>Lost place</th>
                                            <td>Jl. Sempu no 15 Malang selatan</td>
                                        </tr>
                                        <tr>
                                            <th>Information details</th>
                                            <td>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ad aliquam aperiam at atque, commodi cumque dolores dolorum enim excepturi fugiat minus necessitatibus nihil nulla, omnis placeat quasi temporibus voluptate, voluptates.</td>
                                        </tr>
                                        <tr>
                                            <th>Contact number</th>
                                            <td>
                                                <button class="btn btn-success btn-sm"><strong>081231217006</strong></button>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection