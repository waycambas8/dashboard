@extends("layouts.master")

@section("content")
<section class="content">
	<div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Data Image</h3>
                        <a href="{{URL('images_add')}}" type="button" class="btn btn-success float-right">Add Template</a>
                    </div>
                    <div class="card-body">
                        <table class="table table-hover" id="image_table">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Image</th>
                                    <th>Upload</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody id='data'>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@section("script")

@endsection