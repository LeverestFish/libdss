<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>业务概览</title>
    <!--liveReload插件-->
    <script>document.write('<script src="http://' + (location.host || 'localhost').split(':')[0] + ':35729/livereload.js?snipver=1"></' + 'script>')</script>

    <!--样式表-->
    <link rel="stylesheet" href="../style/reset.css">
    <link rel="stylesheet" href="../style/general.css">

    <!--Javascript-->
    <script src="../script/jquery-3.4.1.js"></script>
    <script src="../script/echarts.js"></script>
    <script src="../script/chart-display.js"></script>
    <script src="../script/pl_3.1.js"></script>
</head>

<body>
<!--页眉，调用header模板-->
<?php include "../templates/header.html" ?>
<!--选择导航栏的高亮项目，编号对应-->
<script>setActiveNav(3);</script>

<div class="main">
    <!--面包屑导航-->
    <div class="breadNav">
        <a href="../index/learn.php" class="breadNav-link">了解现况</a>
        <span class="breadNav-divide">&gt;&gt;</span>
        <a href="" class="breadNav-link">业务</a>
        <span class="breadNav-divide">&gt;&gt;</span>
        <a href="" class="breadNav-link">业务概览</a>
    </div>

    <!--主要内容区域-->
    <div class="content clearfix">
        <div class="main-title" onclick="drop()">
            <span class="icon-pie-chart"></span>
            业务概览
            <i class="icon-plus-circle fr"></i>
        </div>
        <div class="drop-content invisible">
            <div class="intro">抱歉，没有更多业务情况了</div>
        </div>


        <!--缩略图表-->
        <div class="fl small-chart-box">
            <div class="small-chart fl" onclick="choose_chart(1)">
                <div class="small-chart-title">业务时间分布</div>
                <div id="small-1" class="small-chart-body"></div>
            </div>
            <div class="small-chart fl" onclick="choose_chart(2)">
                <div class="small-chart-title">活动持续时长</div>
                <div id="small-2" class="small-chart-body"></div>
            </div>
            <div class="small-chart fl" onclick="choose_chart(3)">
                <div class="small-chart-title">业务资金投入占比随时间变化</div>
                <div id="small-3" class="small-chart-body"></div>
            </div>
        </div>

        <!--详细图表-->
        <div id="big-chart-1" class="big-chart fl">
            <div class="big-chart-title">业务时间分布</div>
            <div id="big-1" class="big-chart-body" style="width: 952px;height: 500px;"></div>
        </div>
        <div id="big-chart-2" class="big-chart fl">
            <div class="big-chart-title">活动持续时长</div>
            <div id="big-2" class="big-chart-body" style="width: 952px;height: 500px;"></div>
        </div>
        <div id="big-chart-3" class="big-chart fl">
            <div class="big-chart-title">业务资金投入占比随时间变化</div>
            <div id="big-3" class="big-chart-body" style="width: 952px;height: 500px;"></div>
        </div>

        <!--缩略图表-->
        <div class="fl">
            <div class="small-chart fl" onclick="choose_chart(4)">
                <div class="small-chart-title">业务资金投入占比</div>
                <div id="small-4" class="small-chart-body"></div>
            </div>
            <div class="small-chart fl" onclick="choose_chart(5)">
                <div class="small-chart-title">业务种类分布</div>
                <div id="small-5" class="small-chart-body"></div>
            </div>
            <div class="small-chart fl" onclick="choose_chart(6)">
                <div class="small-chart-title">业务参与情况</div>
                <div id="small-6" class="small-chart-body"></div>
            </div>
        </div>

        <!--详细图表-->
        <div id="big-chart-4" class="big-chart fl">
            <div class="big-chart-title">业务资金投入占比</div>
            <div id="big-4" class="big-chart-body" style="width: 952px;height: 500px;"></div>
        </div>
        <div id="big-chart-5" class="big-chart fl">
            <div class="big-chart-title">业务种类分布</div>
            <div id="big-5" class="big-chart-body" style="width: 952px;height: 500px;"></div>
        </div>
        <div id="big-chart-6" class="big-chart fl">
            <div class="big-chart-title">业务参与情况</div>
            <div id="big-6" class="big-chart-body" style="width: 952px;height: 500px;"></div>
        </div>
    </div>

</div>
</body>
</html>