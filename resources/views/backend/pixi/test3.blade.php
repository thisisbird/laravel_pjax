@extends('backend.layout-concept.app')
@section('content')
<div class="row">
    <!-- ============================================================== -->
    <!-- search bar  -->
    <!-- ============================================================== -->
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
        <div class="card">
            <div class="card-body">
                <div id="PIXI"></div>
            </div>
        </div>
    </div>

</div>

<script>
    $(function() {

    let app = new PIXI.Application({
        width: 1000,
        height: 360
    });
    document.getElementById("PIXI").appendChild(app.view);

    let x = 0 //
    let y = 0 //高度
    let w = 1; //寬度
    let ww = 2; //間距
    for (let i = 0; i < 10000; i++) {
        x += ww;
        if (i % 1000 == 0) {
            y += 30;
            x = 0;
        }
        let sprite = PIXI.Sprite.from('/concept/assets/images/card-img-1.jpg');
        sprite.name = i;
        sprite.x = x;
        sprite.y = y;
        sprite.width = w;
        sprite.height = 20;
        app.stage.addChild(sprite);

        sprite.interactive = true;
        sprite.mouseover = function (mouseData) {
            var message = new PIXI.Text(this.name, {
                font: '18px Courier, monospace',
                fill: '#ffffff'
            });
            message.x = mouseData.data.global.x;
            message.y = mouseData.data.global.y;
            /**
            const x = event.data.global.x;
              const y = event.data.global.y;
            */
            sprite.message = message;

            app.stage.addChild(message);
        }

        // make graphics half-transparent when mouse leaves
        sprite.mouseout = function (mouseData) {
            // this.alpha = 0.5;
            sprite.removeChild(sprite.message);
            delete sprite.message;
        }
    }

    // Add a variable to count up the seconds our demo has been running
});

</script>
@endsection