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
    <link href="https://fonts.googleapis.com/css?family=Exo+2:100,300,400" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
</head>
<body>

    <div class="sidebar">
        <div class="headline">
            <h1>The Superhero Memory Game</h1>
        </div>
        <div class="displays">
            <div class="moves">
                <label>Moves:</label>
                <input type="text" id="moves" readonly/>
            </div>
            <div class="matches">
                <label>Matches:</label>
                <input type="text" id="matches" readonly/>
            </div>
        </div>
        <div class="reset">
            <a href="/">Reset Game</a>
        </div>
    </div>

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

    <div id="game-overlay">
        <div class="wrapper">
            <div>
                <h1>The Superhero Memory Game</h1>
            </div>
            <div>
                <h2>Welcome!</h2>
            </div>
            <div class="start">
                <a href="#" id="startgame">Start Game</a>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>

    <script>
        $( function() {
            // ------------------
            var img1 = '';
            var img2 = '';
            var moves = 0;
            var matches = 0;
            var card1;
            var card2;
            $('#moves').val(moves.toString());
            $('#matches').val(matches.toString());
            // ------------------

            $('#startgame').click( function() {
                $('#game-overlay').remove();
            });

            $('.card').click( function() {
                if ( $(this).hasClass('flip')===false ) {
                    // ------------------
                    $(this).addClass('flip');
                    moves++;
                    $('#moves').val(moves.toString());
                    // ------------------
                    if (img1==='') {
                        img1 = $(this).find('img').attr('src');
                        card1 = $(this);
                    } else {
                        img2 = $(this).find('img').attr('src');
                        card2 = $(this);
                    }
                    // ------------------
                    if (img2!=='') {
                        setTimeout( function() {
                            if (img1===img2) {
                                matches++;
                                $('#matches').val(matches.toString());
                                img1 = '';
                                img2 = '';
                                $('.flip').addClass('match');
                            } else {
                                img1 = '';
                                img2 = '';
                                card1.removeClass('flip');
                                card2.removeClass('flip');
                                card1 = null;
                                card2 = null;
                            }
                        }, 550);
                        if ( $('#matches').val()==='8') {
                            console.log('savage');
                            $('body').append('<div id="game-overlay"><div class="wrapper"><div><h1>Success</h1><h2>You have assembled the team!</h2></div><div class="star"><a href="/">Reset Game</a></div></div></div>');
                        }
                    }
                    // ------------------
                }
            });

        });
    </script>

</body>
</html>