@extends("layouts.master")
@section("content")

<section class="content">
    <div class="container-fluid">
        <div class="card card-default">
          <div class="card-header">
            <h3 class="card-title">Add Images</h3>
          </div>
          <div class="card-body">
            <form class="form-images-add">
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <label>Nama Images</label>
                    <input required type="text" class="form-control" name="nama" placeholder="Nama Images" value="">  
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="form-group">
                    <label>Upload File</label>
                    <input required type="file" accept="image/png, image/jpg, image/jpeg" multiple class="form-control"  name="images[]" id="gambar" placeholder="Berat Minimal" value="">  
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

<script type="text/javascript">
    $("document").ready(function(){
		$(".form-images-add").submit(function(e){
			e.preventDefault();
			e.stopPropagation();
            var formdata = new FormData(this);
	        // gambar store data
	        let TotalFiles = $('#gambar')[0].files.length; //Total files
            let files = $('#gambar')[0];
            for (let i = 0; i < TotalFiles; i++) {
                formdata.append('files' + i, files.files[i]);
            }
            // gambar store data
            formdata.append('TotalFiles', TotalFiles);   
			var url = "{{route('addimages')}}"
			req(url,formdata);
		})

		function req(url,formdata){
			var btn = $(".btn");
			$.ajaxSetup({
				headers: {
					'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
				}
			});
			$.ajax({
				url: url,
                processData: false,
                contentType: false,
				data: formdata,
				type: 'POST',
				dataType: 'json',
				beforeSend: function(){
					btn.prop("disabled",true);
					toastr.warning('Loadings...')
				},
				success: function(d){
                    if(d.response == 200){
                        d.pesan.forEach(v => {
                            toastr.success(v);
                        });
                    }else{
                        d.pesan.forEach(v => {
                            toastr.error(v);
                        });
                    }
                    
					btn.prop("disabled",false);
				},
				error: function(){}
			});
		}
    });
</script>	
@endsection