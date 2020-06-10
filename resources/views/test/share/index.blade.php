<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>穿山甲分享</title>
    <link rel="stylesheet" href="{{ asset('/static-test/share.css') }}">
</head>
<body>
<div id="main">
    <div style="width: 100%; min-height: 100vh; overflow: hidden;">
        <div class="game-content-bgc " style="height: calc(((100vh - 0px) - 33px) - 0vw);">
            <div class="game-bgc"></div>
            <div class="game-linergradient" style="height: calc(100vh - 0vw);"></div>
            <div class="game-wrapper">
                <div class="game-content-wrapper">
                    <div class="content-img">
                        <img src="{{$imgUrl}}"></div>
                    <div class="content-desc-wrapper">
                        <div class="content-desc">
                            <div class="desc-img">
                                <img src="{{$iconUrl}}"></div>
                            <div class="desc-remark">
                                <div class="desc-name">{{$name}}</div>
                                <div class="desc-play"></div>
                            </div>
                        </div>
                        <div class="desc-line"></div>
                        <div class="desc-info">{{$title}}~</div>
                    </div>
                    <a class="game-btn" href="{{$scheme}}">{{$type == 1 ? '打开小游戏':'打开小程序'}}</a>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
