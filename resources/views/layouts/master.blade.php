<!DOCTYPE html>
<html lang="en">
<head>
 @include("layouts.header_meta")
</head>
<body class="hold-transition sidebar-mini layout-fixed">
  <div class="wrapper">
    @include("layouts.left")
    <div class="content-wrapper">
      <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0">{{strtoupper($res['modul'])}}</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{URL('/')}}">Home</a></li>
                <li class="breadcrumb-item active"><a href="{{URL($res['url'])}}">{{$res['url']}}</a></li>
              </ol>
            </div>
          </div>
        </div>
      </div>
      @yield("content")
    </div>
    @include("layouts.footer")
  </div>
   @include("layouts.footer_meta")
</body>
</html>

@yield("script")
