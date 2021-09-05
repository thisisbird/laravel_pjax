$(function () {
    ww = 1000;
    wh = 300;
    var c = document.getElementById("myCanvas2");
    var ctx = c.getContext("2d");

    var tipCanvas = document.getElementById("tip");
    var tipCtx = tipCanvas.getContext("2d");
    c.width = ww;
    c.height = wh;
    ctx.fillStyle = "#111";
    ctx.restore();

    ctx.beginPath();
    ctx.rect(0, 0, ww, wh);
    ctx.fill();
    ctx.translate(100, 100);

    let data = [];
    for (let i = 0; i < 50000; i++) {
        data[i] = Math.random() * wh;
    }


    for (let i = 0; i < 50000; i++) {
        drawLine(i, data[i]);
    }


    function drawLine(x, value) {
        ctx.beginPath();
        ctx.lineWidth = 0.04;
        x = x * (ctx.lineWidth + 0.0);
        ctx.moveTo(x, 0);
        ctx.lineTo(x, value);
        ctx.strokeStyle = "rgba(255,255,255,0.5)";
        ctx.stroke();
    }

    $("#myCanvas2").mousemove((e) => handleMouseMove(e));

    // show tooltip when mouse hovers over dot
    function handleMouseMove(e) {
        display = true;
        if (e.offsetX < 100 || e.offsetY < 100 || e.offsetY >= 280) {
            display = false;
        }
        if (display) {
            tipCanvas.style.display = 'block';
            tipCanvas.style.left = e.offsetX + "px";
            tipCanvas.style.top = 30 + "px";
            tipCtx.clearRect(0, 0, tipCanvas.width, tipCanvas.height);
            // tipCtx.rect(0,0,tipCanvas.width,tipCanvas.height);
            tipCtx.fillText(data[e.offsetX], 5, 15);
        } else {
            tipCanvas.style.display = 'none';
        }
    }
});