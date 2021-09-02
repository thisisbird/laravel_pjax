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
                <div id="PIXI3"></div>
            </div>
        </div>
    </div>

</div>
<script>
    let app = new PIXI.Application({
        width: 640,
        height: 360
    });
    document.getElementById("PIXI").appendChild(app.view);
    let sprite = PIXI.Sprite.from('/concept/assets/images/card-img-1.jpg');
    app.stage.addChild(sprite);
    // Add a variable to count up the seconds our demo has been running
    let elapsed = 0.0;
    // Tell our application's ticker to run a new callback every frame, passing
    // in the amount of time that has passed since the last tick
    app.ticker.add((delta) => {
        // Add the time to our total elapsed time
        elapsed += delta;
        // Update the sprite's X position based on the cosine of our elapsed time.  We divide
        // by 50 to slow the animation down a bit...
        sprite.x = 100.0 + Math.cos(elapsed / 50.0) * 100.0;
    });

</script>
<script>
    const app2 = new PIXI.Application({
        antialias: true,
    });
    document.getElementById("PIXI2").appendChild(app2.view);

    const graphics = new PIXI.Graphics();

    // Rectangle
    graphics.beginFill(0xDE3249);
    graphics.drawRect(50, 50, 100, 100);
    graphics.endFill();

    // Rectangle + line style 1
    graphics.lineStyle(2, 0xFEEB77, 1);
    graphics.beginFill(0x650A5A);
    graphics.drawRect(200, 50, 100, 100);
    graphics.endFill();

    // Rectangle + line style 2
    graphics.lineStyle(10, 0xFFBD01, 1);
    graphics.beginFill(0xC34288);
    graphics.drawRect(350, 50, 100, 100);
    graphics.endFill();

    // Rectangle 2
    graphics.lineStyle(2, 0xFFFFFF, 1);
    graphics.beginFill(0xAA4F08);
    graphics.drawRect(530, 50, 140, 100);
    graphics.endFill();

    // Circle
    graphics.lineStyle(0); // draw a circle, set the lineStyle to zero so the circle doesn't have an outline
    graphics.beginFill(0xDE3249, 1);
    graphics.drawCircle(100, 250, 50);
    graphics.endFill();

    // Circle + line style 1
    graphics.lineStyle(2, 0xFEEB77, 1);
    graphics.beginFill(0x650A5A, 1);
    graphics.drawCircle(250, 250, 50);
    graphics.endFill();

    // Circle + line style 2
    graphics.lineStyle(10, 0xFFBD01, 1);
    graphics.beginFill(0xC34288, 1);
    graphics.drawCircle(400, 250, 50);
    graphics.endFill();

    // Ellipse + line style 2
    graphics.lineStyle(2, 0xFFFFFF, 1);
    graphics.beginFill(0xAA4F08, 1);
    graphics.drawEllipse(600, 250, 80, 50);
    graphics.endFill();

    // draw a shape
    graphics.beginFill(0xFF3300);
    graphics.lineStyle(4, 0xffd900, 1);
    graphics.moveTo(50, 350);
    graphics.lineTo(250, 350);
    graphics.lineTo(100, 400);
    graphics.lineTo(50, 350);
    graphics.closePath();
    graphics.endFill();

    // draw a rounded rectangle
    graphics.lineStyle(2, 0xFF00FF, 1);
    graphics.beginFill(0x650A5A, 0.25);
    graphics.drawRoundedRect(50, 440, 100, 100, 16);
    graphics.endFill();


    //drawStar不支援!?!?
    // // draw star
    // graphics.lineStyle(2, 0xFFFFFF);
    // graphics.beginFill(0x35CC5A, 1);
    // graphics.drawStar(360, 370, 5, 50);
    // graphics.endFill();

    // // draw star 2
    // graphics.lineStyle(2, 0xFFFFFF);
    // graphics.beginFill(0xFFCC5A, 1);
    // graphics.drawStar(280, 510, 7, 50);
    // graphics.endFill();

    // // draw star 3
    // graphics.lineStyle(4, 0xFFFFFF);
    // graphics.beginFill(0x55335A, 1);
    // graphics.drawStar(470, 450, 4, 50);
    // graphics.endFill();

    // draw polygon
    const path = [600, 370, 700, 460, 780, 420, 730, 570, 590, 520];

    graphics.lineStyle(0);
    graphics.beginFill(0x3500FA, 1);
    graphics.drawPolygon(path);
    graphics.endFill();

    app2.stage.addChild(graphics);

</script>
<script>
    const app3 = new PIXI.Application({
        backgroundColor: 0x1099bb
    });
    document.getElementById("PIXI3").appendChild(app3.view);

    const basicText = new PIXI.Text('Basic text in pixi');
    basicText.x = 50;
    basicText.y = 100;

    app3.stage.addChild(basicText);

    const style = new PIXI.TextStyle({
        fontFamily: 'Arial',
        fontSize: 36,
        fontStyle: 'italic',
        fontWeight: 'bold',
        fill: ['#ffffff', '#00ff99'], // gradient
        stroke: '#4a1850',
        strokeThickness: 5,
        dropShadow: true,
        dropShadowColor: '#000000',
        dropShadowBlur: 4,
        dropShadowAngle: Math.PI / 6,
        dropShadowDistance: 6,
        wordWrap: true,
        wordWrapWidth: 440,
        lineJoin: 'round',
    });

    const richText = new PIXI.Text('Rich text with a lot of options and across multiple lines', style);
    richText.x = 50;
    richText.y = 220;

    app3.stage.addChild(richText);

    const skewStyle = new PIXI.TextStyle({
        fontFamily: 'Arial',
        dropShadow: true,
        dropShadowAlpha: 0.8,
        dropShadowAngle: 2.1,
        dropShadowBlur: 4,
        dropShadowColor: '0x111111',
        dropShadowDistance: 10,
        fill: ['#ffffff'],
        stroke: '#004620',
        fontSize: 60,
        fontWeight: 'lighter',
        lineJoin: 'round',
        strokeThickness: 12,
    });

    const skewText = new PIXI.Text('SKEW IS COOL', skewStyle);
    skewText.skew.set(0.65, -0.3);
    skewText.anchor.set(0.5, 0.5);
    skewText.x = 300;
    skewText.y = 480;

    app3.stage.addChild(skewText);

</script>
@endsection
