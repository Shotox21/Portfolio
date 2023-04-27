<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Snake</title>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/brython@3.8.9/brython.min.js">
    </script>
    <link rel="stylesheet" href="css/style.css">
    <script type="text/javascript"
            src="https://cdn.jsdelivr.net/npm/brython@3.8.9/brython_stdlib.js">
    </script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

    <style>

        h1 {
            margin-top: 8%;
            color: #F8F1FF;
        }

        h3 {
            color:#F8F1FF;
        }

        h6 {
            color:rgb(117, 117, 117);
        }

        a {
            color: #F8F1FF;
        }

        button {
            display: block;
            margin-left: auto;
            margin-right: auto;
            background-color: transparent !important;
            border-color: rgb(155, 156, 155) !important;
            color: rgb(155, 156, 155) !important;
            font-size: 8px !important;
            padding: 3px !important;
        }

        button:hover {
            border-color: rgb(68, 241, 68) !important;
            color: rgb(194, 196, 194) !important;
        }

        body {
            background-color: #003049;
        }

        canvas {
            margin-top: 1%;
            padding-left: 0;
            padding-right: 0;
            margin-left: auto;
            margin-right: auto;
            display: block;
            border: 1px;
            border-style: solid;
            border-color: #535353;
        }

    </style>
</head>
<header>
    <?php
    include 'navbar.php'
    ?>
</header>
<body onload="brython()">

<h1 class="text-center">Snake créé avec Python!</h1>
<canvas id="game-board" width="400" height="400"></canvas>
<br>
<h3 id="score" class="text-center">Score: 0</h3>
<br>
<h6 id="high-score" class="text-center">High Score: 0</h6>
<br>
<div class="text-center">
    <button id="instructions-btn" class="btn btn-info">Instructions</button>
</div>


<script type="text/python">

        from browser import document, html, window
        import random

        score = 0
        high_score = 0

        px = py = 10
        gs = tc = 20
        ax = ay = 15
        xv = yv = 0
        trail = []
        tail = 5

        pre_pause = [0,0]
        paused = False

        def game():
            global px, py, tc, gs, ax, ay, trail, tail, score
            px += xv
            py += yv
            if px < 0:
                px = tc-1
            if px > tc-1:
                px = 0
            if py < 0:
                py = tc-1
            if py > tc-1:
                py = 0
            ctx.fillStyle = "black"
            ctx.fillRect(0, 0, canvas.width, canvas.height)
            ctx.fillStyle = "lime"
            for i in range(len(trail)):
                ctx.fillRect(trail[i][0]*gs, trail[i][1]*gs, gs-2, gs-2)
                if trail[i][0] == px and trail[i][1] == py:
                    score = score if paused else 0
                    tail = tail if paused else 5
            trail.insert(0, [px, py])
            while len(trail) > tail:
                trail.pop()

            if ax == px and ay == py:
                tail += 1
                ax = int(random.random()*tc)
                ay = int(random.random()*tc)
                score += 1
            update_score(score)
            ctx.fillStyle = "red"
            ctx.fillRect(ax*gs, ay*gs, gs-2, gs-2)

        def update_score(new_score):
            global high_score
            document["score"].innerHTML = "Score: " + str(new_score)
            if new_score > high_score:
                document["high-score"].innerHTML = "High Score: " + str(new_score)
                high_score = new_score

        def key_push(evt):
            global xv, yv, pre_pause, paused
            key = evt.keyCode
            if key == 37 and not paused:
                xv = -1
                yv = 0
            elif key == 38 and not paused:
                xv = 0
                yv = -1
            elif key == 39 and not paused:
                xv = 1
                yv = 0
            elif key == 40 and not paused:
                xv = 0
                yv = 1
            elif key == 32:
                temp = [xv, yv]
                xv = pre_pause[0]
                yv = pre_pause[1]
                pre_pause = [*temp]
                paused = not paused

        def show_instructions(evt):
            window.alert("Use the arrow keys to move and press spacebar to pause the game.")

        canvas = document["game-board"]
        ctx = canvas.getContext("2d")
        document.addEventListener("keydown", key_push)
        game_loop = window.setInterval(game, 1000/10)
        instructions_btn = document["instructions-btn"]
        instructions_btn.addEventListener("click", show_instructions)


</script>
</body>

</html>