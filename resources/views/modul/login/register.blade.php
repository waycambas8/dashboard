@include("layouts.header_meta")
<body class="login-page" style="min-height: 496.391px;">
	<div class="login-box">
	  <div class="login-logo">
	    <a href=""><b>FINTAG</b> DAHSBOARD</a>
	  </div>
	  <div class="card">
	    <div class="card-body login-card-body">
	      <form class="form-register">

	        <div class="input-group mb-3">
	          <input type="email" class="form-control" required name="email" placeholder="Email">
	          <div class="input-group-append">
	            <div class="input-group-text">
	              <span class="fas fa-envelope"></span>
	            </div>
	          </div>
	        </div>

            <div class="input-group mb-3">
	          <input type="text" class="form-control" required name="name" placeholder="Nama">
	          <div class="input-group-append">
	            <div class="input-group-text">
	              <span class="fas fa-user"></span>
	            </div>
	          </div>
	        </div>

	        <div class="input-group mb-3">
	          <input type="password" class="form-control" required name="password" placeholder="Password">
	          <div class="input-group-append">
	            <div class="input-group-text">
	              <span class="fas fa-lock"></span>
	            </div>
	          </div>
	        </div>

	        <div class="row">
	          <div class="col-12">
	            <button type="submit" class="btn btn-primary btn-block">Sign Up</button>
                <small><a href="{{URL('login')}}">Sudah memiliki akun?</a></small>
	          </div>
	        </div>
	      </form>	    
	    </div>
	  </div>
	</div>
</body>

@include("layouts.footer_meta")

<script>
    $("document").ready(function(){
		$(".form-register").submit(function(e){
			e.preventDefault();
			e.stopPropagation();
			var form = $(this);
			var url = "{{route('addregister')}}"
			var formdata = form.serializeArray();
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
				data: formdata,
				type: 'POST',
				dataType: 'json',
				beforeSend: function(){
					btn.prop("disabled",true);
					toastr.warning('Loadings...')
				},
				success: function(d){
					if(d.response==200){ 
						toastr.success(d.pesan);
						window.location.href = d.url;
					}else if(d.response==0){
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

