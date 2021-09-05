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
                <canvas id="myCanvas"></canvas>
                <div class="time">+00:00:00</div>
            </div>
        </div>
    </div>

</div>
<script>
    $(function(){
        ww = 10000;
        wh = 300;
        var c = document.getElementById("myCanvas2");
        var ctx = c.getContext("2d");
        
        var tipCanvas = document.getElementById("tip");
        var tipCtx = tipCanvas.getContext("2d");
        c.width=ww;
        c.height=wh;
        ctx.fillStyle="#111";
        ctx.restore();

        ctx.beginPath();
        ctx.rect(0,0,ww,wh);
        ctx.fill();
        ctx.translate(100,100);
        

        for (let i = 0; i < 50000; i++) {
            drawLine(i,Math.random() * wh);
            // drawLine(i,i);
        }

        
        function drawLine(x,value){
        ctx.beginPath();
        ctx.lineWidth=0.04;
        x = x * (ctx.lineWidth +0.0);
        ctx.moveTo(x ,0);
        ctx.lineTo(x,value);
        ctx.strokeStyle="rgba(255,255,255,0.5)";
        ctx.stroke();
  }

    $("#myCanvas2").mousemove(function (e) {
        handleMouseMove(e);
    });

    // show tooltip when mouse hovers over dot
    function handleMouseMove(e) {
        console.log(e.offsetX,e.offsetY);
        display = true;
        if(e.offsetX < 100 || e.offsetY < 100 || e.offsetY >= 280){
          display = false;
        }
        if(display){
          tipCanvas.style.display = 'block';
          tipCanvas.style.left = e.offsetX + "px";
          tipCanvas.style.top = 30 + "px";
          tipCtx.clearRect(0, 0, tipCanvas.width, tipCanvas.height);
          // tipCtx.rect(0,0,tipCanvas.width,tipCanvas.height);
          tipCtx.fillText(e.offsetX, 5, 15);
        }else{
          tipCanvas.style.display = 'none';
        }
}
    });
</script>
<script>
    $(function(){

var c = document.getElementById("myCanvas");
var ctx = c.getContext("2d");
var ww=$(window).outerWidth();
var wh=$(window).outerHeight();

c.width=ww;
c.height=wh;

function getWindowSize(){
  ww=$(window).outerWidth();
  wh=$(window).outerHeight();
   var center={
    x: ww/2,
    y: wh/2
  }
  c.width=ww;
  c.height=wh;
  ctx.translate(center.x,center.y);
  ctx.restore();
}
$(window).resize(getWindowSize);
getWindowSize();
var time = 0;

setInterval(draw,10);
function draw(){
  //bg背景
  ctx.fillStyle="#111";
  ctx.beginPath();
  ctx.rect(-2000,-2000,4000,4000);
  ctx.fill();
  
  // ctx.fillStyle="white"
  // ctx.beginPath();
  // ctx.rect(time,0,50,50);
  // ctx.fill();
  // time+=1;
  
  //座標
  ctx.strokeStyle="rgba(255,255,255,0.4)";
  ctx.lineWidth=1;
  
  ctx.beginPath();
  ctx.moveTo(-ww/2,0);
  ctx.lineTo(ww/2,0);
  ctx.moveTo(0,-wh/2);
  ctx.lineTo(0,wh/2);
  ctx.stroke();
  
  //--------------------------------------------
  //citcle
  var r=200;
  var deg_to_pi = Math.PI / 180;
  var count=200;
  ctx.beginPath();
  ctx.lineWidth=1;
  
  for(var i=0;i<=count;i++){
    var now_r = r + 2*Math.sin(Math.PI*i/5 +time/20);
    var deg = i*(360/count) * deg_to_pi;
    
    ctx.lineTo(
      now_r*Math.cos(deg),
      now_r*Math.sin(deg)
    );
  }
  ctx.strokeStyle="#fff";
  ctx.stroke();
  //-----------------------------------
  //內圖
  var r =220;
  var count = 240;
  
  ctx.lineWidth=1;
  for(var i=0;i<count;i++){
    var deg = 360*(i/count)*deg_to_pi;
    
    var pan=0;
    var len=4 +(i%10==0?4:0)+(i%60==0?12:0);
    var opacity = (len>4)?1:0.7;
    
    var start_r=r;
    var end_r=r+len;
    
    ctx.beginPath();
    ctx.moveTo(
      start_r*Math.cos(deg),
      start_r*Math.sin(deg)
    );
    ctx.lineTo(
      end_r*Math.cos(deg),
      end_r*Math.sin(deg)
    );
    ctx.strokeStyle="rgba(255,255,255,0.5)";
    ctx.stroke();
  }
  
  var now=new Date();
  var sec=now.getSeconds();
  var min=now.getMinutes();
  var hour=now.getHours();
  
  $(".time").text("+00:"+hour+":"+min+":"+sec);
  function drawPointer(r,deg,lineWidth){
    ctx.beginPath();
    ctx.lineWidth=lineWidth;
    var now_deg=deg;
    ctx.moveTo(0,0);
    ctx.lineTo(
      r*Math.cos(now_deg*deg_to_pi),
      r*Math.sin(now_deg*deg_to_pi)
    );
    ctx.strokeStyle="rgba(255,255,255,0.5)";
    ctx.stroke();
  }
  drawPointer(400,-6*sec+90,1)
  drawPointer(210,-6*min+90,1)
  drawPointer(150,-30*(hour+(min/60))+90,6)
  time+=1;
}
});
</script>
@endsection