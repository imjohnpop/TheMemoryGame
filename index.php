<?php

    $cards = [
        '1' => 'BatMan.jpg',
        '2' => 'BatWoman.jpg',
        '3' => 'Captain.jpg',
        '4' => 'Hulk.jpg',
        '5' => 'IronMan.jpg',
        '6' => 'SpiderMan.jpg',
        '7' => 'SuperMan.jpg',
        '8' => 'Wolverine.jpg',
        '9' => 'WonderWoman.jpg',
    ];

    $cards2 = $cards;

    $cards = array_merge($cards, $cards2);

    shuffle($cards);

    $count = 0;
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>The Memory Game</title>
    <link href="css/style.css" rel="stylesheet">
</head>
<body>


    <div class="board">
    <?php foreach($cards as $key => $card): ?>
        <?php $count++ ;?>
        <?php if($count==1 || $count==7 || $count==13) :?>
            <div class="row">
        <?php endif;?>
            <div class="container">
                <div class="card">
                    <div class="front" >
                        <img src="img/<?= $card ?>" alt="frontcard">
                    </div>
                    <div class="back">
                        <img src="img/back.jpg" alt="backcard">
                    </div>
                </div>
            </div>
        <?php if($count==6 || $count==12 || $count==18) :?>
            </div>
        <?php endif; ?>
    <?php endforeach; ?>
    </div>

    <script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>

    <script>
        $( function() {
            $('')
        });
    </script>

</body>
</html>
