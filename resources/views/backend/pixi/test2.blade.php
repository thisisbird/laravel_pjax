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
                <div id="PIXI2"></div>
            </div>
        </div>
    </div>

</div>

<script>
    total = 500
    $(function() {

    var style = {
        font: '18px Courier, monospace',
        fill: '#ffffff'
    };
    const app = new PIXI.Application({
        antialias: false,
        width: 2000,
        height: 500,
    });
    let q = {};
    document.getElementById("PIXI").appendChild(app.view);
    for (let i = 0; i < total; i++) {
        q[i] = i + "q";
    }
    let x = 0 //
    let y = 0 //高度
    let w = 1; //寬度
    let ww = 2; //間距

    let graphics = new PIXI.Graphics();
    for (let i = 0; i < total; i++) {

        x += ww;
        if (i % 1000 == 0) {
            y += 30;
            x = 0;
        }
        graphics.beginFill(0xDE3249);
        graphics.drawRect(1 + x, y, w, 25);
        graphics.name = q[i];
        graphics.endFill();
    }
    app.stage.addChild(graphics);
    // designate circle as being interactive so it handles events
    graphics.interactive = true;

    // graphics.hitArea = new PIXI.Rectangle(150, 150, 1000,1000);
    graphics.mouseover = function (mouseData) {
        var message = new PIXI.Text(this.name, style);
        message.x = mouseData.data.global.x;
        message.y = mouseData.data.global.y;
        /**
        const x = event.data.global.x;
          const y = event.data.global.y;
        */
        graphics.message = message;
        graphics.addChild(message);
    }

    // make graphics half-transparent when mouse leaves
    graphics.mouseout = function (mouseData) {
        // this.alpha = 0.5;
        graphics.removeChild(graphics.message);
        delete graphics.message;
    }
});
</script>
<script>
    $(function() {

var style = {
    font: '18px Courier, monospace',
    fill: '#ffffff'
};
    const app2 = new PIXI.Application({
        antialias: false,
        width: 2000,
        height: 500,
    });
    let qq = {};
    document.getElementById("PIXI2").appendChild(app2.view);
    for (let i = 0; i < total; i++) {
        qq[i] = i + "q";
    }
    let x2 = 0 //
    let y2 = 0 //高度
    let w2 = 1; //寬度
    let ww2 = 2; //間距

    for (let i = 0; i < total; i++) {
        let graphics = new PIXI.Graphics();

        x2 += ww2;
        if (i % 1000 == 0) {
            y2 += 30;
            x2 = 0;
        }
        graphics.beginFill(0xDE3249);
        graphics.drawRect(1 + x2, y2, w2, 25);
        graphics.name = qq[i];
        graphics.endFill();
        app2.stage.addChild(graphics);
        // designate circle as being interactive so it handles events
        graphics.interactive = true;

        // graphics.hitArea = new PIXI.Rectangle(150, 150, 1000,1000);
        graphics.mouseover = function (mouseData) {
            var message = new PIXI.Text(this.name, style);
            message.x = mouseData.data.global.x;
            message.y = mouseData.data.global.y;
            /**
            const x = event.data.global.x;
              const y = event.data.global.y;
            */
            graphics.message = message;
            graphics.addChild(message);
        }

        // make graphics half-transparent when mouse leaves
        graphics.mouseout = function (mouseData) {
            // this.alpha = 0.5;
            graphics.removeChild(graphics.message);
            delete graphics.message;
        }
    }
});

</script>
@endsection