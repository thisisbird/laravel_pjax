@extends('backend.layout-concept.app')
@section('content')
<style>
  html,
  body {
    width: 100%;
    height: 100%;
    padding: 0;
    margin: 0;
    /* overflow: hidden; */
    /* background-color: black; */
  }

  #myCanvas2 {
    transform: scaleY(-1);
  }

  .time {
    position: absolute;
    left: 50px;
    bottom: 50px;
    color: white;
  }

  #tip {
    background-color: white;
    border: 1px solid blue;
    position: absolute;
    /* left: -200px; */
    /* top: 100px; */
  }
</style>
<div class="row">
  <!-- ============================================================== -->
  <!-- search bar  -->
  <!-- ============================================================== -->
  <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
    <div class="card">
      <div class="card-body">
        <canvas id="myCanvas2"></canvas>
        <canvas id="tip" width=100 height=25></canvas>
      </div>
    </div>
  </div>

</div>
<script src="{{asset('js/kline.js')}}"></script>
<script>


</script>
@endsection