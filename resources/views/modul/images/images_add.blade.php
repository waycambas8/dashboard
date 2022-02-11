@extends("layouts.master")
@section("content")

<section class="content">
    <div class="container-fluid">
        <div class="card card-default">
          <div class="card-header">
            <h3 class="card-title">Add Images</h3>
          </div>
          <div class="card-body">
            <form class="template">
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <label>Nama Images</label>
                    <input required type="number" class="form-control" name="nama" placeholder="Nama Images" value="">  
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="form-group">
                    <label>Upload File</label>
                    <input required type="number" class="form-control"  name="minimal_berat" placeholder="Berat Minimal" value="">  
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="form-group">
                      <button type="submit" class="btn btn-success block float-right">Add Template Customer</button>
                  </div>
                </div>
              </div>
            </form>
          </div>
        </div>
    </div>
</section>

@endsection

@section("script")

@endsection