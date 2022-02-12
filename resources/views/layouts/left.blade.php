  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <ul class="navbar-nav ml-auto">    
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li> 
      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>
      <li class="nav-item dropdown user-menu">
        <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
          <img src="{{asset('dist/img/user2-160x160.jpg')}}" class="user-image img-circle elevation-2" alt="User Image">
          <span class="d-none d-md-inline"></span>
        </a>
        <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-right" style="left: inherit; right: 0px;">
          <!-- User image -->
          <li class="user-header bg-primary">
            <img src="{{asset('dist/img/user2-160x160.jpg')}}" class="img-circle elevation-2" alt="User Image">
            <p>{{session('name')}}</p>
          </li>
          <li class="user-footer">
            <a href="#" class="btn btn-default btn-flat">Profile</a>
            <button class="btn btn-default btn-flat float-right logout">Sign out</button>
          </li>
        </ul>
      </li>
    </ul>
  </nav>
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <a href="index3.html" class="brand-link">
      <img src="{{asset('dist/img/AdminLTELogo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Aplikasi FINTAG</span>
    </a>
    <div class="sidebar">
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{asset('dist/img/user2-160x160.jpg')}}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">{{session('name')}}</a>
        </div>
      </div>
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false"> 
          <li class="nav-item">
            <a href="{{URL('/dashboard')}}" class="nav-link dashboard">
              <i class="nav-icon fas fa-home"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{URL('/images')}}" class="nav-link images">
              <i class="nav-icon fas fa-shopping-cart"></i>
              <p>
                Images
              </p>
            </a>
          </li>
        </ul>
      </nav>
    </div>
  </aside>


<script type="text/javascript">
  $('document').ready(function(){
    $(".logout").on("click",function(e){
        e.preventDefault();
        e.stopPropagation();
        var btn = $(".btn");
        $.ajaxSetup({
          headers: {
            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
          }
        });
        $.ajax({
          url: "{{route('logout')}}",
          data: {
            type:"logout"
          },
          type: 'POST',
          dataType: 'json',
          beforeSend: function(){
            btn.prop("disabled",true);
            toastr.warning('Loadings...')
          },
          success: function(d){
            if(d.response == 200){
              location.reload();
            }else{
              toastr.error(d.pesan)
            }     
            btn.prop("disabled",false);
          },
          error: function(){}
        });
    });

    var parents = "<?=(!empty($res['modul'])&&$res['modul'])?$res['modul']:'dashboard'?>";
    $( "."+parents ).addClass( "active" ); 
  });
      
</script>