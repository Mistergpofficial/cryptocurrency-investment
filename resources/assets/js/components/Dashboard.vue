<template>
    <div>

        <header-up></header-up>
        <left-nav></left-nav>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper" style="min-height: 1643.5px;">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <h1>
                    Dashboard
                    <small>Welcome, {{ authUser.full_name }}</small>
                </h1>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a :href="`https://itradeoption.com/user/dashboard`"><i class="fa fa-dashboard"></i> Home</a></li>
                    <li class="breadcrumb-item active">Dashboard</li>
                </ol>
            </section>

            <!-- Main content -->
            <section class="content">

                <div class="row">
                    <div class="col-12">
                        <div class="box box-inverse box-dark">
                            <div class="box-body tickers-block">
                                <div class="tickercontainer" style="height: auto; overflow: hidden;"><div class="mask"><ul id="webticker-1" style="position: relative; overflow: hidden; float: left; font-style: normal; font-variant: normal; font-weight: bold; font-stretch: normal; font-size: 10px; line-height: normal; font-family: Verdana; list-style-type: none; margin: 0px; padding: 0px; width: 1766.39px; transition-timing-function: linear; transition-duration: 3.13876s; left: -156.938px;">










                                  <marquee><li v-for="coin in coiniiBtcEth" style="white-space: nowrap; float: left; padding: 0px 7px;"><i class="cc IOTA"></i>{{ coin.name }}<span class="text-yellow"> ${{ coin.price_usd  }}</span></li></marquee>
                                </ul><span class="tickeroverlay-left" style="display: none;">&nbsp;</span><span class="tickeroverlay-right" style="display: none;">&nbsp;</span></div></div>
                            </div>
                        </div>
                    </div>

                    <div class="col-12">
                        <div class="box">
                            <div class="box-header with-border">
                                <div class="row">
                                <div class="col-xl-4 col-md-6 col-12">
                                    <div class="info-box bg-info">
                                        <span class="info-box-icon bg-white text-info"><i class="ion ion-stats-bars"></i></span>

                                        <div class="info-box-content" v-for="contract in contracts">
                                            <span class="info-box-number">${{ contract.amount  }}</span>

                                            <span class="info-box-text">CONTRACT</span>
                                        </div>
                                        <!-- /.info-box-content -->
                                    </div>
                                    <!-- /.info-box -->
                                </div>
                                <!-- /.col -->

                                <div class="col-xl-4 col-md-6 col-12">
                                    <div class="info-box bg-success">
                                        <span class="info-box-icon bg-white text-success"><i class="ion ion-thumbsup"></i></span>

                                        <div class="info-box-content" v-for="contract in contracts">
<!--                                            <span class="info-box-number" v-if='contract.returns !== 0'>${{contract.returns | round }}</span>-->

                                            <span class="info-box-number">${{contract.returns | round }}</span>
<!--
                                            <span class="info-box-number">${{contract.rate / 100 *  contract.amount | round }}</span>-->

                                            <span class="info-box-text">PROFIT</span>
                                        </div>
                                        <!-- /.info-box-content -->
                                    </div>
                                    <!-- /.info-box -->
                                </div>
                                <!-- /.col -->

                                <!-- fix for small devices only -->
                                <div class="clearfix visible-sm-block"></div>
                                    <div class="col-xl-4 col-md-6 col-12">
                                        <div class="info-box bg-purple">
                                            <span class="info-box-icon bg-white text-purple"><i class="ion ion-stats-bars"></i></span>

                                            <div class="info-box-content" v-for="ref in referral_calc">
                                                <span class="info-box-number">$ {{ ref.amount }}</span>
                                                <span class="info-box-text">REFERRALS</span>
                                            </div>
                                            <!-- /.info-box-content -->
                                        </div>
                                        <!-- /.info-box -->
                                    </div>
                                    <!-- /.col -->
                                    </div>



                                <div class="pd-x-15 pd-b-15">
                                    <h5 class="box-title">Your Referral Invite URL</h5>
                                    <input type="text" v-model="link.address" class="form-control" placeholder="Your Invite URL" name="inviteurl" >
                                </div>

                                <h3 class="box-title">Bitcoin Exchange ETH/BTC</h3>

                                <div class="box-tools pull-right">
                                    <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="" data-original-title="Collapse">
                                        <i class="fa fa-minus"></i></button>
                                    <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="" data-original-title="Remove">
                                        <i class="fa fa-times"></i></button>
                                </div>
                            </div>
                            <div class="box-body">
                                <div class="chart">
                                    <div id="chartdiv2" style="height: 500px; overflow: visible;"><div class="amcharts-stock-div" style="position: relative;"><div class="amcharts-center-div"><div class="amChartsPeriodSelector amcharts-period-selector-div" style="padding-bottom: 8px; overflow: hidden; color: rgb(0, 0, 0);"><fieldset style="border: none; padding:0"><legend style="display: none;">Select a timeframe to show chart data</legend><div style="display: inline;">From: <input aria-label="From: " class="amChartsInputField amcharts-start-date-input" style="background: transparent; border: 1px solid rgba(0, 0, 0, 0.3); color: rgb(0, 0, 0); outline: none; text-align: center; width: 150px;"> to: <input aria-label="to: " class="amChartsInputField amcharts-end-date-input" style="background: transparent; border: 1px solid rgba(0, 0, 0, 0.3); color: rgb(0, 0, 0); outline: none; text-align: center; width: 150px;"></div><div style="float: right; display: inline;">Zoom: <input type="button" value="1 hour" class="amChartsButton amcharts-period-input" style="background: transparent; border: 1px solid rgba(0, 0, 0, 0.3); border-radius: 5px; box-sizing: border-box; color: rgb(0, 0, 0); margin: 1px; opacity: 0.7; outline: none; display: inline;"><input type="button" value="2 hours" class="amChartsButton amcharts-period-input" style="background: transparent; border: 1px solid rgba(0, 0, 0, 0.3); border-radius: 5px; box-sizing: border-box; color: rgb(0, 0, 0); margin: 1px; opacity: 0.7; outline: none; display: inline;"><input type="button" value="5 hour" class="amChartsButtonSelected amcharts-period-input-selected" style="background: rgb(185, 205, 245); border: 1px solid rgba(0, 0, 0, 0.3); border-radius: 5px; box-sizing: border-box; color: rgb(0, 0, 0); margin: 1px; opacity: 1; outline: none; display: inline;"><input type="button" value="12 hours" class="amChartsButton amcharts-period-input" style="background: transparent; border: 1px solid rgba(0, 0, 0, 0.3); border-radius: 5px; box-sizing: border-box; color: rgb(0, 0, 0); margin: 1px; opacity: 0.7; outline: none; display: inline;"><input type="button" value="MAX" class="amChartsButton amcharts-period-input" style="background: transparent; border: 1px solid rgba(0, 0, 0, 0.3); border-radius: 5px; box-sizing: border-box; color: rgb(0, 0, 0); margin: 1px; opacity: 0.7; outline: none; display: inline;"></div></fieldset></div><div class="amcharts-scrollbar-chart-div" style="height: 40px; overflow: hidden; text-align: left;"><div class="amcharts-main-div" style="position: relative;"><div class="amcharts-chart-div" style="overflow: hidden; position: relative; text-align: left; width: 1044px; height: 40px; padding: 0px; cursor: default; touch-action: auto;"><svg version="1.1" style="position: absolute; width: 1044px; height: 40px; top: -0.125px; left: -0.5px;"><desc>JavaScript chart by amCharts 3.21.12</desc><g><path cs="100,100" d="M0.5,0.5 L1043.5,0.5 L1043.5,39.5 L0.5,39.5 Z" fill="#FFFFFF" stroke="#000000" fill-opacity="0" stroke-width="1" stroke-opacity="0" class="amcharts-bg"></path><path cs="100,100" d="M0.5,0.5 L1043.5,0.5 L1043.5,0.5 L0.5,0.5 L0.5,0.5 Z" fill="#FFFFFF" stroke="#000000" fill-opacity="0" stroke-width="1" stroke-opacity="0" class="amcharts-plot-area" transform="translate(0,40)"></path></g><g><g class="amcharts-value-axis value-axis-valueAxisAuto0_1521566305318" transform="translate(0,0)" visibility="hidden"></g><g class="amcharts-category-axis" transform="translate(0,40)"><g><path cs="100,100" d="M70.5,0.5 L70.5,0.5 L70.5,0.5" fill="none" stroke-width="1" stroke-opacity="0.1" stroke="#000000" class="amcharts-axis-grid"></path></g><g><path cs="100,100" d="M174.5,0.5 L174.5,0.5 L174.5,0.5" fill="none" stroke-width="1" stroke-opacity="0.1" stroke="#000000" class="amcharts-axis-grid"></path></g><g><path cs="100,100" d="M278.5,0.5 L278.5,0.5 L278.5,0.5" fill="none" stroke-width="1" stroke-opacity="0.1" stroke="#000000" class="amcharts-axis-grid"></path></g><g><path cs="100,100" d="M382.5,0.5 L382.5,0.5 L382.5,0.5" fill="none" stroke-width="1" stroke-opacity="0.1" stroke="#000000" class="amcharts-axis-grid"></path></g><g><path cs="100,100" d="M487.5,0.5 L487.5,0.5 L487.5,0.5" fill="none" stroke-width="1" stroke-opacity="0.1" stroke="#000000" class="amcharts-axis-grid"></path></g><g><path cs="100,100" d="M591.5,0.5 L591.5,0.5 L591.5,0.5" fill="none" stroke-width="1" stroke-opacity="0.1" stroke="#000000" class="amcharts-axis-grid"></path></g><g><path cs="100,100" d="M695.5,0.5 L695.5,0.5 L695.5,0.5" fill="none" stroke-width="1" stroke-opacity="0.1" stroke="#000000" class="amcharts-axis-grid"></path></g><g><path cs="100,100" d="M800.5,0.5 L800.5,0.5 L800.5,0.5" fill="none" stroke-width="1" stroke-opacity="0.1" stroke="#000000" class="amcharts-axis-grid"></path></g><g><path cs="100,100" d="M904.5,0.5 L904.5,0.5 L904.5,0.5" fill="none" stroke-width="1" stroke-opacity="0.1" stroke="#000000" class="amcharts-axis-grid"></path></g><g><path cs="100,100" d="M1008.5,0.5 L1008.5,0.5 L1008.5,0.5" fill="none" stroke-width="1" stroke-opacity="0.1" stroke="#000000" class="amcharts-axis-grid"></path></g></g></g><g></g><g></g><g></g><g></g><g></g><g></g><g><g><path cs="100,100" d="M0.5,0.5 L1043.5,0.5" fill="none" stroke-width="1" stroke-opacity="0" stroke="#000000" transform="translate(0,40)" class="amcharts-scrollbar-line"></path></g><g class="amcharts-value-axis value-axis-valueAxisAuto0_1521566305318"><path cs="100,100" d="M0.5,0.5 L0.5,40.5" fill="none" stroke-width="1" stroke-opacity="0" stroke="#000000" transform="translate(0,0)" class="amcharts-axis-line" visibility="hidden"></path></g><g class="amcharts-category-axis"><path cs="100,100" d="M0.5,0.5 L1043.5,0.5" fill="none" stroke-width="1" stroke-opacity="0" stroke="#000000" transform="translate(0,40)" class="amcharts-axis-line"></path></g></g><g></g><g><g class="amcharts-scrollbar-horizontal" visibility="visible" transform="translate(0,0)" style="touch-action: none;"><rect x="0.5" y="0.5" width="1044" height="40" rx="0" ry="0" stroke-width="1" fill="#000000" stroke="#000000" fill-opacity="0.12" stroke-opacity="0.12" class="amcharts-scrollbar-bg"></rect><rect x="0.5" y="0.5" width="313" height="41" rx="0" ry="0" stroke-width="0" fill="#FFFFFF" stroke="#FFFFFF" fill-opacity="0.4" stroke-opacity="0.4" class="amcharts-scrollbar-bg-selected" transform="translate(730,0)"></rect><g transform="translate(0,0)" class="amcharts-graph-smoothedLine amcharts-graph-graphAuto0_1521566305316"><g></g><g><path cs="100,100" d="M1,14 C4,14,6,15,11,15 C16,15,16,16,21,16 C26,16,27,17,32,17 C37,17,37,16,42,16 C47,16,48,15,53,15 C58,15,58,16,63,16 C68,16,69,14,74,14 C79,14,79,14,84,14 C89,14,89,11,94,11 C99,11,100,11,105,11 C110,11,110,10,115,10 C120,10,121,8,126,8 C131,8,131,8,136,8 C141,8,142,8,147,8 C152,8,152,7,157,7 C162,7,162,7,167,7 C172,7,173,9,178,9 C183,9,183,8,188,8 C193,8,194,9,199,9 C204,9,204,9,209,9 C214,9,215,10,220,10 C225,10,225,10,230,10 C235,10,235,8,240,8 C245,8,246,8,251,9 C256,9,256,11,261,11 C266,11,267,9,272,9 C277,9,277,9,282,9 C287,9,288,9,293,9 C298,9,298,9,303,9 C308,9,308,9,313,9 C318,9,319,9,324,9 C329,9,329,10,334,10 C339,10,340,9,345,9 C350,9,350,11,355,11 C360,12,361,12,366,12 C371,12,371,11,376,11 C381,11,381,13,386,13 C391,13,392,13,397,13 C402,13,402,13,407,13 C412,13,413,12,418,12 C423,12,423,12,428,12 C433,12,434,12,439,11 C444,11,444,9,449,9 C454,9,454,8,459,8 C464,8,465,9,470,9 C475,9,475,9,480,9 C485,9,486,10,491,10 C496,10,496,10,501,10 C506,10,507,10,512,11 C517,11,517,11,522,11 C527,12,527,12,532,12 C537,12,538,13,543,13 C548,13,548,15,553,15 C558,15,559,16,564,16 C569,16,569,17,574,17 C579,17,580,16,585,16 C590,16,590,17,595,17 C600,17,600,18,605,18 C610,18,611,18,616,18 C621,18,621,17,626,17 C631,17,632,18,637,18 C642,18,642,19,647,19 C652,19,653,18,658,18 C663,18,663,19,668,19 C673,19,673,21,678,21 C683,22,684,22,689,22 C694,22,694,24,699,24 C704,24,705,24,710,24 C715,24,715,24,720,24 C725,24,726,23,731,24 C736,24,736,25,741,25 C746,25,746,26,751,26 C756,26,757,28,762,28 C767,28,767,27,772,27 C777,27,778,28,783,28 C788,28,788,28,793,28 C798,28,799,29,804,29 C809,30,809,31,814,31 C819,31,819,33,824,33 C829,33,830,35,835,35 C840,35,840,34,845,34 C850,34,851,35,856,35 C861,35,861,34,866,34 C871,34,872,34,877,33 C882,33,882,34,887,34 C892,34,893,34,898,34 C903,34,903,36,908,36 C913,36,913,36,918,36 C923,36,924,35,929,35 C934,36,934,37,939,37 C944,37,945,38,950,38 C955,38,955,40,960,40 C965,40,966,39,971,39 C976,39,976,37,981,37 C986,37,986,35,991,35 C996,35,997,35,1002,35 C1007,35,1007,35,1012,35 C1017,35,1016,35,1023,35 C1031,35,1037,33,1042,33 " fill="none" fill-opacity="0" stroke-width="1" stroke-opacity="0" stroke="#BBBBBB" class="amcharts-scrollbar-graph-stroke"></path><path cs="100,100" d="M1,14 C4,14,6,15,11,15 C16,15,16,16,21,16 C26,16,27,17,32,17 C37,17,37,16,42,16 C47,16,48,15,53,15 C58,15,58,16,63,16 C68,16,69,14,74,14 C79,14,79,14,84,14 C89,14,89,11,94,11 C99,11,100,11,105,11 C110,11,110,10,115,10 C120,10,121,8,126,8 C131,8,131,8,136,8 C141,8,142,8,147,8 C152,8,152,7,157,7 C162,7,162,7,167,7 C172,7,173,9,178,9 C183,9,183,8,188,8 C193,8,194,9,199,9 C204,9,204,9,209,9 C214,9,215,10,220,10 C225,10,225,10,230,10 C235,10,235,8,240,8 C245,8,246,8,251,9 C256,9,256,11,261,11 C266,11,267,9,272,9 C277,9,277,9,282,9 C287,9,288,9,293,9 C298,9,298,9,303,9 C308,9,308,9,313,9 C318,9,319,9,324,9 C329,9,329,10,334,10 C339,10,340,9,345,9 C350,9,350,11,355,11 C360,12,361,12,366,12 C371,12,371,11,376,11 C381,11,381,13,386,13 C391,13,392,13,397,13 C402,13,402,13,407,13 C412,13,413,12,418,12 C423,12,423,12,428,12 C433,12,434,12,439,11 C444,11,444,9,449,9 C454,9,454,8,459,8 C464,8,465,9,470,9 C475,9,475,9,480,9 C485,9,486,10,491,10 C496,10,496,10,501,10 C506,10,507,10,512,11 C517,11,517,11,522,11 C527,12,527,12,532,12 C537,12,538,13,543,13 C548,13,548,15,553,15 C558,15,559,16,564,16 C569,16,569,17,574,17 C579,17,580,16,585,16 C590,16,590,17,595,17 C600,17,600,18,605,18 C610,18,611,18,616,18 C621,18,621,17,626,17 C631,17,632,18,637,18 C642,18,642,19,647,19 C652,19,653,18,658,18 C663,18,663,19,668,19 C673,19,673,21,678,21 C683,22,684,22,689,22 C694,22,694,24,699,24 C704,24,705,24,710,24 C715,24,715,24,720,24 C725,24,726,23,731,24 C736,24,736,25,741,25 C746,25,746,26,751,26 C756,26,757,28,762,28 C767,28,767,27,772,27 C777,27,778,28,783,28 C788,28,788,28,793,28 C798,28,799,29,804,29 C809,30,809,31,814,31 C819,31,819,33,824,33 C829,33,830,35,835,35 C840,35,840,34,845,34 C850,34,851,35,856,35 C861,35,861,34,866,34 C871,34,872,34,877,33 C882,33,882,34,887,34 C892,34,893,34,898,34 C903,34,903,36,908,36 C913,36,913,36,918,36 C923,36,924,35,929,35 C934,36,934,37,939,37 C944,37,945,38,950,38 C955,38,955,40,960,40 C965,40,966,39,971,39 C976,39,976,37,981,37 C986,37,986,35,991,35 C996,35,997,35,1002,35 C1007,35,1007,35,1012,35 C1017,35,1016,35,1023,35 C1031,35,1037,33,1042,33  L1042,40 L1,40 L1,14.066666666666666" fill="#BBBBBB" fill-opacity="0.5" stroke-width="0" stroke-opacity="0" class="amcharts-scrollbar-graph-fill"></path></g><g></g></g><g transform="translate(0,0)" class="amcharts-graph-smoothedLine amcharts-graph-graphAuto0_1521566305316" clip-path="url(#AmChartsEl-111)"><g></g><g><path cs="100,100" d="M1,14 C4,14,6,15,11,15 C16,15,16,16,21,16 C26,16,27,17,32,17 C37,17,37,16,42,16 C47,16,48,15,53,15 C58,15,58,16,63,16 C68,16,69,14,74,14 C79,14,79,14,84,14 C89,14,89,11,94,11 C99,11,100,11,105,11 C110,11,110,10,115,10 C120,10,121,8,126,8 C131,8,131,8,136,8 C141,8,142,8,147,8 C152,8,152,7,157,7 C162,7,162,7,167,7 C172,7,173,9,178,9 C183,9,183,8,188,8 C193,8,194,9,199,9 C204,9,204,9,209,9 C214,9,215,10,220,10 C225,10,225,10,230,10 C235,10,235,8,240,8 C245,8,246,8,251,9 C256,9,256,11,261,11 C266,11,267,9,272,9 C277,9,277,9,282,9 C287,9,288,9,293,9 C298,9,298,9,303,9 C308,9,308,9,313,9 C318,9,319,9,324,9 C329,9,329,10,334,10 C339,10,340,9,345,9 C350,9,350,11,355,11 C360,12,361,12,366,12 C371,12,371,11,376,11 C381,11,381,13,386,13 C391,13,392,13,397,13 C402,13,402,13,407,13 C412,13,413,12,418,12 C423,12,423,12,428,12 C433,12,434,12,439,11 C444,11,444,9,449,9 C454,9,454,8,459,8 C464,8,465,9,470,9 C475,9,475,9,480,9 C485,9,486,10,491,10 C496,10,496,10,501,10 C506,10,507,10,512,11 C517,11,517,11,522,11 C527,12,527,12,532,12 C537,12,538,13,543,13 C548,13,548,15,553,15 C558,15,559,16,564,16 C569,16,569,17,574,17 C579,17,580,16,585,16 C590,16,590,17,595,17 C600,17,600,18,605,18 C610,18,611,18,616,18 C621,18,621,17,626,17 C631,17,632,18,637,18 C642,18,642,19,647,19 C652,19,653,18,658,18 C663,18,663,19,668,19 C673,19,673,21,678,21 C683,22,684,22,689,22 C694,22,694,24,699,24 C704,24,705,24,710,24 C715,24,715,24,720,24 C725,24,726,23,731,24 C736,24,736,25,741,25 C746,25,746,26,751,26 C756,26,757,28,762,28 C767,28,767,27,772,27 C777,27,778,28,783,28 C788,28,788,28,793,28 C798,28,799,29,804,29 C809,30,809,31,814,31 C819,31,819,33,824,33 C829,33,830,35,835,35 C840,35,840,34,845,34 C850,34,851,35,856,35 C861,35,861,34,866,34 C871,34,872,34,877,33 C882,33,882,34,887,34 C892,34,893,34,898,34 C903,34,903,36,908,36 C913,36,913,36,918,36 C923,36,924,35,929,35 C934,36,934,37,939,37 C944,37,945,38,950,38 C955,38,955,40,960,40 C965,40,966,39,971,39 C976,39,976,37,981,37 C986,37,986,35,991,35 C996,35,997,35,1002,35 C1007,35,1007,35,1012,35 C1017,35,1016,35,1023,35 C1031,35,1037,33,1042,33 " fill="none" fill-opacity="0" stroke-width="1" stroke-opacity="0" stroke="#888888" class="amcharts-scrollbar-graph-selected-stroke"></path><path cs="100,100" d="M1,14 C4,14,6,15,11,15 C16,15,16,16,21,16 C26,16,27,17,32,17 C37,17,37,16,42,16 C47,16,48,15,53,15 C58,15,58,16,63,16 C68,16,69,14,74,14 C79,14,79,14,84,14 C89,14,89,11,94,11 C99,11,100,11,105,11 C110,11,110,10,115,10 C120,10,121,8,126,8 C131,8,131,8,136,8 C141,8,142,8,147,8 C152,8,152,7,157,7 C162,7,162,7,167,7 C172,7,173,9,178,9 C183,9,183,8,188,8 C193,8,194,9,199,9 C204,9,204,9,209,9 C214,9,215,10,220,10 C225,10,225,10,230,10 C235,10,235,8,240,8 C245,8,246,8,251,9 C256,9,256,11,261,11 C266,11,267,9,272,9 C277,9,277,9,282,9 C287,9,288,9,293,9 C298,9,298,9,303,9 C308,9,308,9,313,9 C318,9,319,9,324,9 C329,9,329,10,334,10 C339,10,340,9,345,9 C350,9,350,11,355,11 C360,12,361,12,366,12 C371,12,371,11,376,11 C381,11,381,13,386,13 C391,13,392,13,397,13 C402,13,402,13,407,13 C412,13,413,12,418,12 C423,12,423,12,428,12 C433,12,434,12,439,11 C444,11,444,9,449,9 C454,9,454,8,459,8 C464,8,465,9,470,9 C475,9,475,9,480,9 C485,9,486,10,491,10 C496,10,496,10,501,10 C506,10,507,10,512,11 C517,11,517,11,522,11 C527,12,527,12,532,12 C537,12,538,13,543,13 C548,13,548,15,553,15 C558,15,559,16,564,16 C569,16,569,17,574,17 C579,17,580,16,585,16 C590,16,590,17,595,17 C600,17,600,18,605,18 C610,18,611,18,616,18 C621,18,621,17,626,17 C631,17,632,18,637,18 C642,18,642,19,647,19 C652,19,653,18,658,18 C663,18,663,19,668,19 C673,19,673,21,678,21 C683,22,684,22,689,22 C694,22,694,24,699,24 C704,24,705,24,710,24 C715,24,715,24,720,24 C725,24,726,23,731,24 C736,24,736,25,741,25 C746,25,746,26,751,26 C756,26,757,28,762,28 C767,28,767,27,772,27 C777,27,778,28,783,28 C788,28,788,28,793,28 C798,28,799,29,804,29 C809,30,809,31,814,31 C819,31,819,33,824,33 C829,33,830,35,835,35 C840,35,840,34,845,34 C850,34,851,35,856,35 C861,35,861,34,866,34 C871,34,872,34,877,33 C882,33,882,34,887,34 C892,34,893,34,898,34 C903,34,903,36,908,36 C913,36,913,36,918,36 C923,36,924,35,929,35 C934,36,934,37,939,37 C944,37,945,38,950,38 C955,38,955,40,960,40 C965,40,966,39,971,39 C976,39,976,37,981,37 C986,37,986,35,991,35 C996,35,997,35,1002,35 C1007,35,1007,35,1012,35 C1017,35,1016,35,1023,35 C1031,35,1037,33,1042,33  L1042,40 L1,40 L1,14.066666666666666" fill="#888888" fill-opacity="1" stroke-width="0" stroke-opacity="0" class="amcharts-scrollbar-graph-selected-fill"></path></g><g></g></g><g transform="translate(0,0)"><g><path cs="100,100" d="M0.5,40.5 L0.5,40.5 L0.5,0.5" fill="none" stroke-width="1" stroke-opacity="0.15" stroke="#FFFFFF" class="amcharts-scrollbar-grid"></path></g><g><path cs="100,100" d="M188.5,40.5 L188.5,40.5 L188.5,0.5" fill="none" stroke-width="1" stroke-opacity="0.15" stroke="#FFFFFF" class="amcharts-scrollbar-grid"></path></g><g><path cs="100,100" d="M375.5,40.5 L375.5,40.5 L375.5,0.5" fill="none" stroke-width="1" stroke-opacity="0.15" stroke="#FFFFFF" class="amcharts-scrollbar-grid"></path></g><g><path cs="100,100" d="M563.5,40.5 L563.5,40.5 L563.5,0.5" fill="none" stroke-width="1" stroke-opacity="0.15" stroke="#FFFFFF" class="amcharts-scrollbar-grid"></path></g><g><path cs="100,100" d="M751.5,40.5 L751.5,40.5 L751.5,0.5" fill="none" stroke-width="1" stroke-opacity="0.15" stroke="#FFFFFF" class="amcharts-scrollbar-grid"></path></g><g><path cs="100,100" d="M939.5,40.5 L939.5,40.5 L939.5,0.5" fill="none" stroke-width="1" stroke-opacity="0.15" stroke="#FFFFFF" class="amcharts-scrollbar-grid"></path></g></g><g transform="translate(0,0)" visibility="visible"><text y="6" fill="#FFFFFF" font-family="Verdana" font-size="11px" opacity="1" text-anchor="start" transform="translate(3,28.5)" class="amcharts-scrollbar-label"><tspan y="6" x="0">Apr 07</tspan></text><text y="6" fill="#FFFFFF" font-family="Verdana" font-size="11px" opacity="1" text-anchor="start" transform="translate(191,28.5)" class="amcharts-scrollbar-label"><tspan y="6" x="0">03:00</tspan></text><text y="6" fill="#FFFFFF" font-family="Verdana" font-size="11px" opacity="1" text-anchor="start" transform="translate(378,28.5)" class="amcharts-scrollbar-label"><tspan y="6" x="0">06:00</tspan></text><text y="6" fill="#FFFFFF" font-family="Verdana" font-size="11px" opacity="1" text-anchor="start" transform="translate(566,28.5)" class="amcharts-scrollbar-label"><tspan y="6" x="0">09:00</tspan></text><text y="6" fill="#FFFFFF" font-family="Verdana" font-size="11px" opacity="1" text-anchor="start" transform="translate(754,28.5)" class="amcharts-scrollbar-label"><tspan y="6" x="0">12:00</tspan></text><text y="6" fill="#FFFFFF" font-family="Verdana" font-size="11px" opacity="1" text-anchor="start" transform="translate(942,28.5)" class="amcharts-scrollbar-label"><tspan y="6" x="0">15:00</tspan></text></g><rect x="0.5" y="0.5" width="1044" height="40" rx="0" ry="0" stroke-width="0" fill="#000" stroke="#000" fill-opacity="0.005" stroke-opacity="0.005"></rect><rect x="730" y="0.5" width="313" height="40" rx="0" ry="0" stroke-width="0" fill="#000" stroke="#000" fill-opacity="0.005" stroke-opacity="0.005" aria-label="Zoom chart using cursor arrows" role="menuitem" style="cursor: -webkit-grab;"></rect><g aria-label="Zoom chart using cursor arrows" role="menuitem" transform="translate(713,3)" visibility="visible"><image x="0" y="0" width="35" height="35" xlink:href="" class="amcharts-scrollbar-grip-left"></image><rect x="0.5" y="0.5" width="25" height="40" rx="0" ry="0" stroke-width="0" fill="#000" stroke="#000" fill-opacity="0.005" stroke-opacity="0.005" transform="translate(5,-2)"></rect></g><g aria-label="Zoom chart using cursor arrows" role="menuitem" transform="translate(1026,3)" visibility="visible"><image x="0" y="0" width="35" height="35" xlink:href="" class="amcharts-scrollbar-grip-right"></image><rect x="0.5" y="0.5" width="25" height="40" rx="0" ry="0" stroke-width="0" fill="#000" stroke="#000" fill-opacity="0.005" stroke-opacity="0.005" transform="translate(5,-2)"></rect></g><clippath id="AmChartsEl-111"><rect x="730" y="0" width="313" height="41" rx="0" ry="0" stroke-width="0"></rect></clippath></g></g><g><g transform="translate(0,0)" class="amcharts-graph-smoothedLine amcharts-graph-graphAuto0_1521566305316"></g><g transform="translate(0,0)" class="amcharts-graph-smoothedLine amcharts-graph-graphAuto0_1521566305316"></g></g><g><g></g></g><g><g class="amcharts-value-axis value-axis-valueAxisAuto0_1521566305318" transform="translate(0,0)" visibility="hidden"></g><g class="amcharts-category-axis" transform="translate(0,40)" visibility="visible"></g></g><g></g><g transform="translate(0,40)"></g><g></g><g></g></svg><a href="" title="JavaScript charts" style="position: absolute; text-decoration: none; color: rgb(0, 0, 0); font-family: Verdana; font-size: 11px; opacity: 0.7; display: block; left: 5px; top: 45px;">JS chart by amCharts</a></div></div></div><div class="amcharts-panels-div" style="clear: both; height: 427px;"><div class="amChartsPanel amcharts-stock-panel-div amcharts-stock-panel-div-stockPanel0" style="height: 293px; width: 100%; overflow: hidden; text-align: left;"><div class="amcharts-main-div" style="position: relative; width: 100%; height: 100%;"><div class="amChartsLegend amcharts-legend-div" style="overflow: hidden; position: relative; text-align: left; width: 1044px; height: 24px; cursor: default;"><svg version="1.1" style="position: absolute; width: 1044px; height: 24px; top: -0.125px; left: -0.5px;"><desc>JavaScript chart by amCharts 3.21.12</desc><text y="6" fill="#000000" font-family="Verdana" font-size="11px" opacity="1" font-weight="bold" text-anchor="start" class="amcharts-legend-title" transform="translate(0,11)"><tspan y="6" x="0">Value</tspan></text><g transform="translate(51,0)"><path cs="100,100" d="M0.5,0.5 L992.5,0.5 L992.5,23.5 L0.5,23.5 Z" fill="#FFFFFF" stroke="#000000" fill-opacity="0" stroke-width="1" stroke-opacity="0" class="amcharts-legend-bg"></path><g transform="translate(0,4)"><g cursor="pointer" class="amcharts-legend-item-g1" aria-label="" transform="translate(0,0)"><g transform="translate(8,8)" visibility="hidden" class="amcharts-legend-switch"><path cs="100,100" d="M-5.5,-5.5 L6.5,6.5" fill="none" stroke="#FFFFFF" stroke-width="3"></path><path cs="100,100" d="M-5.5,6.5 L6.5,-5.5" fill="none" stroke="#FFFFFF" stroke-width="3"></path></g><text y="6" fill="#000000" font-family="Verdana" font-size="11px" opacity="1" text-anchor="start" class="amcharts-legend-value" transform="translate(26,7)"> </text><rect x="16" y="0" width="60" height="18" rx="0" ry="0" stroke-width="0" stroke="none" fill="#fff" fill-opacity="0.005"></rect></g></g></g></svg></div><div class="amcharts-chart-div" style="overflow: hidden; position: relative; text-align: left; width: 1044px; height: 269px; padding: 0px; touch-action: auto; cursor: default;"><svg version="1.1" style="position: absolute; width: 1044px; height: 269px; top: -0.125px; left: -0.5px;"><desc>JavaScript chart by amCharts 3.21.12</desc><g><path cs="100,100" d="M0.5,0.5 L1043.5,0.5 L1043.5,268.5 L0.5,268.5 Z" fill="#FFFFFF" stroke="#000000" fill-opacity="0" stroke-width="1" stroke-opacity="0" class="amcharts-bg"></path><path cs="100,100" d="M0.5,0.5 L1043.5,0.5 L1043.5,268.5 L0.5,268.5 L0.5,0.5 Z" fill="#FFFFFF" stroke="#000000" fill-opacity="0" stroke-width="1" stroke-opacity="0" class="amcharts-plot-area" transform="translate(0,0)"></path></g><g><g class="amcharts-category-axis" transform="translate(0,0)"><g><path cs="100,100" d="M70.5,268.5 L70.5,268.5 L70.5,0.5" fill="none" stroke-width="1" stroke-opacity="0.1" stroke="#000000" class="amcharts-axis-grid"></path></g><g><path cs="100,100" d="M174.5,268.5 L174.5,268.5 L174.5,0.5" fill="none" stroke-width="1" stroke-opacity="0.1" stroke="#000000" class="amcharts-axis-grid"></path></g><g><path cs="100,100" d="M278.5,268.5 L278.5,268.5 L278.5,0.5" fill="none" stroke-width="1" stroke-opacity="0.1" stroke="#000000" class="amcharts-axis-grid"></path></g><g><path cs="100,100" d="M382.5,268.5 L382.5,268.5 L382.5,0.5" fill="none" stroke-width="1" stroke-opacity="0.1" stroke="#000000" class="amcharts-axis-grid"></path></g><g><path cs="100,100" d="M487.5,268.5 L487.5,268.5 L487.5,0.5" fill="none" stroke-width="1" stroke-opacity="0.1" stroke="#000000" class="amcharts-axis-grid"></path></g><g><path cs="100,100" d="M591.5,268.5 L591.5,268.5 L591.5,0.5" fill="none" stroke-width="1" stroke-opacity="0.1" stroke="#000000" class="amcharts-axis-grid"></path></g><g><path cs="100,100" d="M695.5,268.5 L695.5,268.5 L695.5,0.5" fill="none" stroke-width="1" stroke-opacity="0.1" stroke="#000000" class="amcharts-axis-grid"></path></g><g><path cs="100,100" d="M800.5,268.5 L800.5,268.5 L800.5,0.5" fill="none" stroke-width="1" stroke-opacity="0.1" stroke="#000000" class="amcharts-axis-grid"></path></g><g><path cs="100,100" d="M904.5,268.5 L904.5,268.5 L904.5,0.5" fill="none" stroke-width="1" stroke-opacity="0.1" stroke="#000000" class="amcharts-axis-grid"></path></g><g><path cs="100,100" d="M1008.5,268.5 L1008.5,268.5 L1008.5,0.5" fill="none" stroke-width="1" stroke-opacity="0.1" stroke="#000000" class="amcharts-axis-grid"></path></g></g><g class="amcharts-value-axis value-axis-valueAxisAuto0_1521566305260" transform="translate(0,0)" visibility="visible"><g><path cs="100,100" d="M0.5,268.5 L0.5,268.5 L1043.5,268.5" fill="none" stroke-width="1" stroke-opacity="0.1" stroke="#000000" class="amcharts-axis-grid"></path></g><g><path cs="100,100" d="M0.5,230.5 L0.5,230.5 L1043.5,230.5" fill="none" stroke-width="1" stroke-opacity="0.1" stroke="#000000" class="amcharts-axis-grid"></path></g><g><path cs="100,100" d="M0.5,191.5 L0.5,191.5 L1043.5,191.5" fill="none" stroke-width="1" stroke-opacity="0.1" stroke="#000000" class="amcharts-axis-grid"></path></g><g><path cs="100,100" d="M0.5,153.5 L0.5,153.5 L1043.5,153.5" fill="none" stroke-width="1" stroke-opacity="0.1" stroke="#000000" class="amcharts-axis-grid"></path></g><g><path cs="100,100" d="M0.5,115.5 L0.5,115.5 L1043.5,115.5" fill="none" stroke-width="1" stroke-opacity="0.1" stroke="#000000" class="amcharts-axis-grid"></path></g><g><path cs="100,100" d="M0.5,77.5 L0.5,77.5 L1043.5,77.5" fill="none" stroke-width="1" stroke-opacity="0.1" stroke="#000000" class="amcharts-axis-grid"></path></g><g><path cs="100,100" d="M0.5,38.5 L0.5,38.5 L1043.5,38.5" fill="none" stroke-width="1" stroke-opacity="0.1" stroke="#000000" class="amcharts-axis-grid"></path></g><g><path cs="100,100" d="M0.5,0.5 L0.5,0.5 L1043.5,0.5" fill="none" stroke-width="1" stroke-opacity="0.1" stroke="#000000" class="amcharts-axis-grid"></path></g></g></g><g transform="translate(0,0)" clip-path="url(#AmChartsEl-102)"><g visibility="hidden"></g></g><g></g><g></g><g></g><g><g transform="translate(0,0)" class="amcharts-graph-smoothedLine amcharts-graph-g1"><g></g><g clip-path="url(#AmChartsEl-110)"><path cs="100,100" d="M-17,45 C-8,45,0,40,17,41 C34,41,35,53,52,54 C70,56,70,71,87,73 C105,75,105,90,122,90 C139,91,139,86,156,86 C173,86,174,91,191,92 C209,92,209,94,226,95 C244,96,244,107,261,109 C279,110,279,122,296,124 C313,126,313,144,330,146 C347,149,348,172,365,173 C383,174,383,159,400,159 C418,158,418,167,435,167 C452,167,452,165,469,165 C486,164,487,155,504,155 C522,154,522,157,539,157 C557,157,557,159,574,161 C591,162,591,184,608,185 C625,185,626,179,643,178 C661,178,661,177,678,178 C696,179,696,198,713,199 C730,200,730,204,747,205 C764,207,765,229,782,230 C800,231,800,223,817,221 C835,219,835,196,852,193 C870,190,870,169,887,168 C904,168,904,177,921,177 C938,177,939,169,956,168 C974,168,974,171,991,170 C1009,169,1017,150,1026,149 " fill="none" fill-opacity="0" stroke-width="2" stroke-opacity="0.9" stroke="#fbae1c" class="amcharts-graph-stroke"></path></g><clippath id="AmChartsEl-110"><rect x="0" y="0" width="1043" height="268" rx="0" ry="0" stroke-width="0"></rect></clippath><g></g></g></g><g></g><g><g class="amcharts-category-axis"><path cs="100,100" d="M0.5,0.5 L1043.5,0.5" fill="none" stroke-width="1" stroke-opacity="0" stroke="#000000" transform="translate(0,268)" class="amcharts-axis-line"></path></g><g class="amcharts-value-axis value-axis-valueAxisAuto0_1521566305260"><path cs="100,100" d="M0.5,0.5 L0.5,268.5" fill="none" stroke-width="1" stroke-opacity="0" stroke="#000000" transform="translate(0,0)" class="amcharts-axis-line" visibility="visible"></path></g></g><g><g transform="translate(0,0)" clip-path="url(#AmChartsEl-103)" style="pointer-events: none;"><path cs="100,100" d="M0.5,0.5 L0.5,0.5 L0.5,268.5" fill="none" stroke-width="1" stroke-opacity="0.5" stroke="#000000" class="amcharts-cursor-line amcharts-cursor-line-vertical" visibility="hidden" transform="translate(293,0)"></path><path cs="100,100" d="M0.5,0.5 L1043.5,0.5 L1043.5,0.5" fill="none" stroke-width="1" stroke="#000000" class="amcharts-cursor-line amcharts-cursor-line-horizontal" visibility="hidden" transform="translate(0,181)"></path></g><clippath id="AmChartsEl-103"><rect x="0" y="0" width="1043" height="268" rx="0" ry="0" stroke-width="0"></rect></clippath></g><g></g><g><g transform="translate(0,0)" class="amcharts-graph-smoothedLine amcharts-graph-g1"><circle r="4" cx="0" cy="0" fill="#fbae1c" stroke="#fbae1c" fill-opacity="1" stroke-width="2" stroke-opacity="0" transform="translate(17,41)" aria-label=" 11:40 1.8k" class="amcharts-graph-bullet"></circle><circle r="4" cx="0" cy="0" fill="#fbae1c" stroke="#fbae1c" fill-opacity="1" stroke-width="2" stroke-opacity="0" transform="translate(52,54)" aria-label=" 11:50 1.8k" class="amcharts-graph-bullet"></circle><circle r="4" cx="0" cy="0" fill="#fbae1c" stroke="#fbae1c" fill-opacity="1" stroke-width="2" stroke-opacity="0" transform="translate(87,73)" aria-label=" 12:00 1.8k" class="amcharts-graph-bullet"></circle><circle r="4" cx="0" cy="0" fill="#fbae1c" stroke="#fbae1c" fill-opacity="1" stroke-width="2" stroke-opacity="0" transform="translate(122,90)" aria-label=" 12:10 1.8k" class="amcharts-graph-bullet"></circle><circle r="4" cx="0" cy="0" fill="#fbae1c" stroke="#fbae1c" fill-opacity="1" stroke-width="2" stroke-opacity="0" transform="translate(156,86)" aria-label=" 12:20 1.8k" class="amcharts-graph-bullet"></circle><circle r="4" cx="0" cy="0" fill="#fbae1c" stroke="#fbae1c" fill-opacity="1" stroke-width="2" stroke-opacity="0" transform="translate(191,92)" aria-label=" 12:30 1.8k" class="amcharts-graph-bullet"></circle><circle r="4" cx="0" cy="0" fill="#fbae1c" stroke="#fbae1c" fill-opacity="1" stroke-width="2" stroke-opacity="0" transform="translate(226,95)" aria-label=" 12:40 1.8k" class="amcharts-graph-bullet"></circle><circle r="4" cx="0" cy="0" fill="#fbae1c" stroke="#fbae1c" fill-opacity="1" stroke-width="2" stroke-opacity="0" transform="translate(261,109)" aria-label=" 12:50 1.8k" class="amcharts-graph-bullet"></circle><circle r="4" cx="0" cy="0" fill="#fbae1c" stroke="#fbae1c" fill-opacity="1" stroke-width="2" stroke-opacity="0" transform="translate(296,124)" aria-label=" 13:00 1.7k" class="amcharts-graph-bullet"></circle><circle r="4" cx="0" cy="0" fill="#fbae1c" stroke="#fbae1c" fill-opacity="1" stroke-width="2" stroke-opacity="0" transform="translate(330,146)" aria-label=" 13:10 1.7k" class="amcharts-graph-bullet"></circle><circle r="4" cx="0" cy="0" fill="#fbae1c" stroke="#fbae1c" fill-opacity="1" stroke-width="2" stroke-opacity="0" transform="translate(365,173)" aria-label=" 13:20 1.7k" class="amcharts-graph-bullet"></circle><circle r="4" cx="0" cy="0" fill="#fbae1c" stroke="#fbae1c" fill-opacity="1" stroke-width="2" stroke-opacity="0" transform="translate(400,159)" aria-label=" 13:30 1.7k" class="amcharts-graph-bullet"></circle><circle r="4" cx="0" cy="0" fill="#fbae1c" stroke="#fbae1c" fill-opacity="1" stroke-width="2" stroke-opacity="0" transform="translate(435,167)" aria-label=" 13:40 1.7k" class="amcharts-graph-bullet"></circle><circle r="4" cx="0" cy="0" fill="#fbae1c" stroke="#fbae1c" fill-opacity="1" stroke-width="2" stroke-opacity="0" transform="translate(469,165)" aria-label=" 13:50 1.7k" class="amcharts-graph-bullet"></circle><circle r="4" cx="0" cy="0" fill="#fbae1c" stroke="#fbae1c" fill-opacity="1" stroke-width="2" stroke-opacity="0" transform="translate(504,155)" aria-label=" 14:00 1.7k" class="amcharts-graph-bullet"></circle><circle r="4" cx="0" cy="0" fill="#fbae1c" stroke="#fbae1c" fill-opacity="1" stroke-width="2" stroke-opacity="0" transform="translate(539,157)" aria-label=" 14:10 1.7k" class="amcharts-graph-bullet"></circle><circle r="4" cx="0" cy="0" fill="#fbae1c" stroke="#fbae1c" fill-opacity="1" stroke-width="2" stroke-opacity="0" transform="translate(574,161)" aria-label=" 14:20 1.7k" class="amcharts-graph-bullet"></circle><circle r="4" cx="0" cy="0" fill="#fbae1c" stroke="#fbae1c" fill-opacity="1" stroke-width="2" stroke-opacity="0" transform="translate(608,185)" aria-label=" 14:30 1.7k" class="amcharts-graph-bullet"></circle><circle r="4" cx="0" cy="0" fill="#fbae1c" stroke="#fbae1c" fill-opacity="1" stroke-width="2" stroke-opacity="0" transform="translate(643,178)" aria-label=" 14:40 1.7k" class="amcharts-graph-bullet"></circle><circle r="4" cx="0" cy="0" fill="#fbae1c" stroke="#fbae1c" fill-opacity="1" stroke-width="2" stroke-opacity="0" transform="translate(678,178)" aria-label=" 14:50 1.7k" class="amcharts-graph-bullet"></circle><circle r="4" cx="0" cy="0" fill="#fbae1c" stroke="#fbae1c" fill-opacity="1" stroke-width="2" stroke-opacity="0" transform="translate(713,199)" aria-label=" 15:00 1.6k" class="amcharts-graph-bullet"></circle><circle r="4" cx="0" cy="0" fill="#fbae1c" stroke="#fbae1c" fill-opacity="1" stroke-width="2" stroke-opacity="0" transform="translate(747,205)" aria-label=" 15:10 1.6k" class="amcharts-graph-bullet"></circle><circle r="4" cx="0" cy="0" fill="#fbae1c" stroke="#fbae1c" fill-opacity="1" stroke-width="2" stroke-opacity="0" transform="translate(782,230)" aria-label=" 15:20 1.6k" class="amcharts-graph-bullet"></circle><circle r="4" cx="0" cy="0" fill="#fbae1c" stroke="#fbae1c" fill-opacity="1" stroke-width="2" stroke-opacity="0" transform="translate(817,221)" aria-label=" 15:30 1.6k" class="amcharts-graph-bullet"></circle><circle r="4" cx="0" cy="0" fill="#fbae1c" stroke="#fbae1c" fill-opacity="1" stroke-width="2" stroke-opacity="0" transform="translate(852,193)" aria-label=" 15:40 1.6k" class="amcharts-graph-bullet"></circle><circle r="4" cx="0" cy="0" fill="#fbae1c" stroke="#fbae1c" fill-opacity="1" stroke-width="2" stroke-opacity="0" transform="translate(887,168)" aria-label=" 15:50 1.7k" class="amcharts-graph-bullet"></circle><circle r="4" cx="0" cy="0" fill="#fbae1c" stroke="#fbae1c" fill-opacity="1" stroke-width="2" stroke-opacity="0" transform="translate(921,177)" aria-label=" 16:00 1.7k" class="amcharts-graph-bullet"></circle><circle r="4" cx="0" cy="0" fill="#fbae1c" stroke="#fbae1c" fill-opacity="1" stroke-width="2" stroke-opacity="0" transform="translate(956,168)" aria-label=" 16:10 1.7k" class="amcharts-graph-bullet"></circle><circle r="4" cx="0" cy="0" fill="#fbae1c" stroke="#fbae1c" fill-opacity="1" stroke-width="2" stroke-opacity="0" transform="translate(991,170)" aria-label=" 16:20 1.7k" class="amcharts-graph-bullet"></circle><circle r="4" cx="0" cy="0" fill="#fbae1c" stroke="#fbae1c" fill-opacity="1" stroke-width="2" stroke-opacity="0" transform="translate(1026,149)" aria-label=" 16:30 1.7k" class="amcharts-graph-bullet"></circle></g></g><g><g></g></g><g><g class="amcharts-category-axis" transform="translate(0,0)" visibility="visible"></g><g class="amcharts-value-axis value-axis-valueAxisAuto0_1521566305260" transform="translate(0,0)" visibility="visible"><text y="6" fill="#000000" font-family="Verdana" font-size="11px" opacity="1" text-anchor="start" transform="translate(4,260.5)" class="amcharts-axis-label"><tspan y="6" x="0">1,550</tspan></text><text y="6" fill="#000000" font-family="Verdana" font-size="11px" opacity="1" text-anchor="start" transform="translate(4,222.5)" class="amcharts-axis-label"><tspan y="6" x="0">1.6k</tspan></text><text y="6" fill="#000000" font-family="Verdana" font-size="11px" opacity="1" text-anchor="start" transform="translate(4,183.5)" class="amcharts-axis-label"><tspan y="6" x="0">1,650</tspan></text><text y="6" fill="#000000" font-family="Verdana" font-size="11px" opacity="1" text-anchor="start" transform="translate(4,145.5)" class="amcharts-axis-label"><tspan y="6" x="0">1.7k</tspan></text><text y="6" fill="#000000" font-family="Verdana" font-size="11px" opacity="1" text-anchor="start" transform="translate(4,107.5)" class="amcharts-axis-label"><tspan y="6" x="0">1,750</tspan></text><text y="6" fill="#000000" font-family="Verdana" font-size="11px" opacity="1" text-anchor="start" transform="translate(4,69.5)" class="amcharts-axis-label"><tspan y="6" x="0">1.8k</tspan></text><text y="6" fill="#000000" font-family="Verdana" font-size="11px" opacity="1" text-anchor="start" transform="translate(4,30.5)" class="amcharts-axis-label"><tspan y="6" x="0">1,850</tspan></text><text y="6" fill="#000000" font-family="Verdana" font-size="11px" opacity="1" text-anchor="start" transform="translate(4,-1)" class="amcharts-axis-label"><tspan y="6" x="0"> </tspan></text></g></g><g></g><g transform="translate(0,0)"></g><g></g><g></g><clippath id="AmChartsEl-102"><rect x="-1" y="-1" width="1045" height="270" rx="0" ry="0" stroke-width="0"></rect></clippath></svg><a href="" title="JavaScript charts" style="position: absolute; text-decoration: none; color: rgb(0, 0, 0); font-family: Verdana; font-size: 11px; opacity: 0.7; display: block; left: 920px; top: 5px;">JS chart by amCharts</a></div></div></div><div class="amChartsPanel amcharts-stock-panel-div amcharts-stock-panel-div-stockPanel1" style="margin-top: 8px; height: 126px; width: 100%; overflow: hidden; text-align: left;"><div class="amcharts-main-div" style="position: relative; width: 100%; height: 100%;"><div class="amChartsLegend amcharts-legend-div" style="overflow: hidden; position: relative; text-align: left; width: 1044px; height: 24px; cursor: default;"><svg version="1.1" style="position: absolute; width: 1044px; height: 24px; top: -0.125px; left: -0.5px;"><desc>JavaScript chart by amCharts 3.21.12</desc><text y="6" fill="#000000" font-family="Verdana" font-size="11px" opacity="1" font-weight="bold" text-anchor="start" class="amcharts-legend-title" transform="translate(0,11)"><tspan y="6" x="0">Volume</tspan></text><g transform="translate(63,0)"><path cs="100,100" d="M0.5,0.5 L980.5,0.5 L980.5,23.5 L0.5,23.5 Z" fill="#FFFFFF" stroke="#000000" fill-opacity="0" stroke-width="1" stroke-opacity="0" class="amcharts-legend-bg"></path><g transform="translate(0,4)"><g cursor="pointer" class="amcharts-legend-item-graphAuto0_1521566305304" aria-label="" transform="translate(0,0)"><g transform="translate(8,8)" visibility="hidden" class="amcharts-legend-switch"><path cs="100,100" d="M-5.5,-5.5 L6.5,6.5" fill="none" stroke="#FFFFFF" stroke-width="3"></path><path cs="100,100" d="M-5.5,6.5 L6.5,-5.5" fill="none" stroke="#FFFFFF" stroke-width="3"></path></g><text y="6" fill="#000000" font-family="Verdana" font-size="11px" opacity="1" text-anchor="start" class="amcharts-legend-value" transform="translate(26,7)"> </text><rect x="16" y="0" width="60" height="18" rx="0" ry="0" stroke-width="0" stroke="none" fill="#fff" fill-opacity="0.005"></rect></g></g></g></svg></div><div class="amcharts-chart-div" style="overflow: hidden; position: relative; text-align: left; width: 1044px; height: 102px; padding: 0px; touch-action: auto; cursor: default;"><svg version="1.1" style="position: absolute; width: 1044px; height: 102px; top: -0.125px; left: -0.5px;"><desc>JavaScript chart by amCharts 3.21.12</desc><g><path cs="100,100" d="M0.5,0.5 L1043.5,0.5 L1043.5,101.5 L0.5,101.5 Z" fill="#FFFFFF" stroke="#000000" fill-opacity="0" stroke-width="1" stroke-opacity="0" class="amcharts-bg"></path><path cs="100,100" d="M0.5,0.5 L1043.5,0.5 L1043.5,73.5 L0.5,73.5 L0.5,0.5 Z" fill="#FFFFFF" stroke="#000000" fill-opacity="0" stroke-width="1" stroke-opacity="0" class="amcharts-plot-area" transform="translate(0,0)"></path></g><g><g class="amcharts-category-axis" transform="translate(0,0)"><g><path cs="100,100" d="M70.5,73.5 L70.5,73.5 L70.5,0.5" fill="none" stroke-width="1" stroke-opacity="0.1" stroke="#000000" class="amcharts-axis-grid"></path></g><g><path cs="100,100" d="M174.5,73.5 L174.5,73.5 L174.5,0.5" fill="none" stroke-width="1" stroke-opacity="0.1" stroke="#000000" class="amcharts-axis-grid"></path></g><g><path cs="100,100" d="M278.5,73.5 L278.5,73.5 L278.5,0.5" fill="none" stroke-width="1" stroke-opacity="0.1" stroke="#000000" class="amcharts-axis-grid"></path></g><g><path cs="100,100" d="M382.5,73.5 L382.5,73.5 L382.5,0.5" fill="none" stroke-width="1" stroke-opacity="0.1" stroke="#000000" class="amcharts-axis-grid"></path></g><g><path cs="100,100" d="M487.5,73.5 L487.5,73.5 L487.5,0.5" fill="none" stroke-width="1" stroke-opacity="0.1" stroke="#000000" class="amcharts-axis-grid"></path></g><g><path cs="100,100" d="M591.5,73.5 L591.5,73.5 L591.5,0.5" fill="none" stroke-width="1" stroke-opacity="0.1" stroke="#000000" class="amcharts-axis-grid"></path></g><g><path cs="100,100" d="M695.5,73.5 L695.5,73.5 L695.5,0.5" fill="none" stroke-width="1" stroke-opacity="0.1" stroke="#000000" class="amcharts-axis-grid"></path></g><g><path cs="100,100" d="M800.5,73.5 L800.5,73.5 L800.5,0.5" fill="none" stroke-width="1" stroke-opacity="0.1" stroke="#000000" class="amcharts-axis-grid"></path></g><g><path cs="100,100" d="M904.5,73.5 L904.5,73.5 L904.5,0.5" fill="none" stroke-width="1" stroke-opacity="0.1" stroke="#000000" class="amcharts-axis-grid"></path></g><g><path cs="100,100" d="M1008.5,73.5 L1008.5,73.5 L1008.5,0.5" fill="none" stroke-width="1" stroke-opacity="0.1" stroke="#000000" class="amcharts-axis-grid"></path></g></g><g class="amcharts-value-axis value-axis-valueAxisAuto0_1521566305287" transform="translate(0,0)" visibility="visible"><g><path cs="100,100" d="M0.5,73.5 L0.5,73.5 L1043.5,73.5" fill="none" stroke-width="1" stroke-opacity="0.1" stroke="#000000" class="amcharts-axis-grid"></path></g><g><path cs="100,100" d="M0.5,37.5 L0.5,37.5 L1043.5,37.5" fill="none" stroke-width="1" stroke-opacity="0.1" stroke="#000000" class="amcharts-axis-grid"></path></g><g><path cs="100,100" d="M0.5,0.5 L0.5,0.5 L1043.5,0.5" fill="none" stroke-width="1" stroke-opacity="0.1" stroke="#000000" class="amcharts-axis-grid"></path></g></g></g><g transform="translate(0,0)" clip-path="url(#AmChartsEl-100)"><g visibility="hidden"></g></g><g></g><g></g><g></g><g><g transform="translate(0,0)" class="amcharts-graph-column amcharts-graph-graphAuto0_1521566305304"><g><g class="amcharts-graph-column amcharts-graph-graphAuto0_1521566305304" transform="translate(3,73)" aria-label=" 11:40 47.9M"><rect x="0.5" y="-34.5" width="28" height="35" rx="2" ry="2" stroke-width="1" fill="#fbae1c" stroke="#fbae1c" fill-opacity="1" stroke-opacity="0.9" class="amcharts-graph-column-front amcharts-graph-column-element"></rect></g><g class="amcharts-graph-column amcharts-graph-graphAuto0_1521566305304" transform="translate(38,73)" aria-label=" 11:50 54.1M"><rect x="0.5" y="-38.5" width="28" height="39" rx="2" ry="2" stroke-width="1" fill="#fbae1c" stroke="#fbae1c" fill-opacity="1" stroke-opacity="0.9" class="amcharts-graph-column-front amcharts-graph-column-element"></rect></g><g class="amcharts-graph-column amcharts-graph-graphAuto0_1521566305304" transform="translate(73,73)" aria-label=" 12:00 12.9M"><rect x="0.5" y="-8.5" width="28" height="9" rx="2" ry="2" stroke-width="1" fill="#fbae1c" stroke="#fbae1c" fill-opacity="1" stroke-opacity="0.9" class="amcharts-graph-column-front amcharts-graph-column-element"></rect></g><g class="amcharts-graph-column amcharts-graph-graphAuto0_1521566305304" transform="translate(108,73)" aria-label=" 12:10 54.1M"><rect x="0.5" y="-39.5" width="28" height="40" rx="2" ry="2" stroke-width="1" fill="#fbae1c" stroke="#fbae1c" fill-opacity="1" stroke-opacity="0.9" class="amcharts-graph-column-front amcharts-graph-column-element"></rect></g><g class="amcharts-graph-column amcharts-graph-graphAuto0_1521566305304" transform="translate(142,73)" aria-label=" 12:20 70.4M"><rect x="0.5" y="-50.5" width="28" height="51" rx="2" ry="2" stroke-width="1" fill="#fbae1c" stroke="#fbae1c" fill-opacity="1" stroke-opacity="0.9" class="amcharts-graph-column-front amcharts-graph-column-element"></rect></g><g class="amcharts-graph-column amcharts-graph-graphAuto0_1521566305304" transform="translate(177,73)" aria-label=" 12:30 60.1M"><rect x="0.5" y="-43.5" width="28" height="44" rx="2" ry="2" stroke-width="1" fill="#fbae1c" stroke="#fbae1c" fill-opacity="1" stroke-opacity="0.9" class="amcharts-graph-column-front amcharts-graph-column-element"></rect></g><g class="amcharts-graph-column amcharts-graph-graphAuto0_1521566305304" transform="translate(212,73)" aria-label=" 12:40 59.8M"><rect x="0.5" y="-43.5" width="28" height="44" rx="2" ry="2" stroke-width="1" fill="#fbae1c" stroke="#fbae1c" fill-opacity="1" stroke-opacity="0.9" class="amcharts-graph-column-front amcharts-graph-column-element"></rect></g><g class="amcharts-graph-column amcharts-graph-graphAuto0_1521566305304" transform="translate(247,73)" aria-label=" 12:50 79.7M"><rect x="0.5" y="-57.5" width="28" height="58" rx="2" ry="2" stroke-width="1" fill="#fbae1c" stroke="#fbae1c" fill-opacity="1" stroke-opacity="0.9" class="amcharts-graph-column-front amcharts-graph-column-element"></rect></g><g class="amcharts-graph-column amcharts-graph-graphAuto0_1521566305304" transform="translate(282,73)" aria-label=" 13:00 64.3M"><rect x="0.5" y="-46.5" width="28" height="47" rx="2" ry="2" stroke-width="1" fill="#fbae1c" stroke="#fbae1c" fill-opacity="1" stroke-opacity="0.9" class="amcharts-graph-column-front amcharts-graph-column-element"></rect></g><g class="amcharts-graph-column amcharts-graph-graphAuto0_1521566305304" transform="translate(316,73)" aria-label=" 13:10 32.1M"><rect x="0.5" y="-22.5" width="28" height="23" rx="2" ry="2" stroke-width="1" fill="#fbae1c" stroke="#fbae1c" fill-opacity="1" stroke-opacity="0.9" class="amcharts-graph-column-front amcharts-graph-column-element"></rect></g><g class="amcharts-graph-column amcharts-graph-graphAuto0_1521566305304" transform="translate(351,73)" aria-label=" 13:20 79.7M"><rect x="0.5" y="-57.5" width="28" height="58" rx="2" ry="2" stroke-width="1" fill="#fbae1c" stroke="#fbae1c" fill-opacity="1" stroke-opacity="0.9" class="amcharts-graph-column-front amcharts-graph-column-element"></rect></g><g class="amcharts-graph-column amcharts-graph-graphAuto0_1521566305304" transform="translate(386,73)" aria-label=" 13:30 65.3M"><rect x="0.5" y="-47.5" width="28" height="48" rx="2" ry="2" stroke-width="1" fill="#fbae1c" stroke="#fbae1c" fill-opacity="1" stroke-opacity="0.9" class="amcharts-graph-column-front amcharts-graph-column-element"></rect></g><g class="amcharts-graph-column amcharts-graph-graphAuto0_1521566305304" transform="translate(421,73)" aria-label=" 13:40 64.4M"><rect x="0.5" y="-46.5" width="28" height="47" rx="2" ry="2" stroke-width="1" fill="#fbae1c" stroke="#fbae1c" fill-opacity="1" stroke-opacity="0.9" class="amcharts-graph-column-front amcharts-graph-column-element"></rect></g><g class="amcharts-graph-column amcharts-graph-graphAuto0_1521566305304" transform="translate(455,73)" aria-label=" 13:50 82.1M"><rect x="0.5" y="-59.5" width="28" height="60" rx="2" ry="2" stroke-width="1" fill="#fbae1c" stroke="#fbae1c" fill-opacity="1" stroke-opacity="0.9" class="amcharts-graph-column-front amcharts-graph-column-element"></rect></g><g class="amcharts-graph-column amcharts-graph-graphAuto0_1521566305304" transform="translate(490,73)" aria-label=" 14:00 15.9M"><rect x="0.5" y="-11.5" width="28" height="12" rx="2" ry="2" stroke-width="1" fill="#fbae1c" stroke="#fbae1c" fill-opacity="1" stroke-opacity="0.9" class="amcharts-graph-column-front amcharts-graph-column-element"></rect></g><g class="amcharts-graph-column amcharts-graph-graphAuto0_1521566305304" transform="translate(525,73)" aria-label=" 14:10 67.8M"><rect x="0.5" y="-49.5" width="28" height="50" rx="2" ry="2" stroke-width="1" fill="#fbae1c" stroke="#fbae1c" fill-opacity="1" stroke-opacity="0.9" class="amcharts-graph-column-front amcharts-graph-column-element"></rect></g><g class="amcharts-graph-column amcharts-graph-graphAuto0_1521566305304" transform="translate(560,73)" aria-label=" 14:20 92.8M"><rect x="0.5" y="-67.5" width="28" height="68" rx="2" ry="2" stroke-width="1" fill="#fbae1c" stroke="#fbae1c" fill-opacity="1" stroke-opacity="0.9" class="amcharts-graph-column-front amcharts-graph-column-element"></rect></g><g class="amcharts-graph-column amcharts-graph-graphAuto0_1521566305304" transform="translate(594,73)" aria-label=" 14:30 20.3M"><rect x="0.5" y="-14.5" width="28" height="15" rx="2" ry="2" stroke-width="1" fill="#fbae1c" stroke="#fbae1c" fill-opacity="1" stroke-opacity="0.9" class="amcharts-graph-column-front amcharts-graph-column-element"></rect></g><g class="amcharts-graph-column amcharts-graph-graphAuto0_1521566305304" transform="translate(629,73)" aria-label=" 14:40 8.7M"><rect x="0.5" y="-5.5" width="28" height="6" rx="2" ry="2" stroke-width="1" fill="#fbae1c" stroke="#fbae1c" fill-opacity="1" stroke-opacity="0.9" class="amcharts-graph-column-front amcharts-graph-column-element"></rect></g><g class="amcharts-graph-column amcharts-graph-graphAuto0_1521566305304" transform="translate(664,73)" aria-label=" 14:50 55.7M"><rect x="0.5" y="-40.5" width="28" height="41" rx="2" ry="2" stroke-width="1" fill="#fbae1c" stroke="#fbae1c" fill-opacity="1" stroke-opacity="0.9" class="amcharts-graph-column-front amcharts-graph-column-element"></rect></g><g class="amcharts-graph-column amcharts-graph-graphAuto0_1521566305304" transform="translate(699,73)" aria-label=" 15:00 51.9M"><rect x="0.5" y="-37.5" width="28" height="38" rx="2" ry="2" stroke-width="1" fill="#fbae1c" stroke="#fbae1c" fill-opacity="1" stroke-opacity="0.9" class="amcharts-graph-column-front amcharts-graph-column-element"></rect></g><g class="amcharts-graph-column amcharts-graph-graphAuto0_1521566305304" transform="translate(733,73)" aria-label=" 15:10 63.8M"><rect x="0.5" y="-46.5" width="28" height="47" rx="2" ry="2" stroke-width="1" fill="#fbae1c" stroke="#fbae1c" fill-opacity="1" stroke-opacity="0.9" class="amcharts-graph-column-front amcharts-graph-column-element"></rect></g><g class="amcharts-graph-column amcharts-graph-graphAuto0_1521566305304" transform="translate(768,73)" aria-label=" 15:20 41.2M"><rect x="0.5" y="-29.5" width="28" height="30" rx="2" ry="2" stroke-width="1" fill="#fbae1c" stroke="#fbae1c" fill-opacity="1" stroke-opacity="0.9" class="amcharts-graph-column-front amcharts-graph-column-element"></rect></g><g class="amcharts-graph-column amcharts-graph-graphAuto0_1521566305304" transform="translate(803,73)" aria-label=" 15:30 66.5M"><rect x="0.5" y="-48.5" width="28" height="49" rx="2" ry="2" stroke-width="1" fill="#fbae1c" stroke="#fbae1c" fill-opacity="1" stroke-opacity="0.9" class="amcharts-graph-column-front amcharts-graph-column-element"></rect></g><g class="amcharts-graph-column amcharts-graph-graphAuto0_1521566305304" transform="translate(838,73)" aria-label=" 15:40 54.4M"><rect x="0.5" y="-39.5" width="28" height="40" rx="2" ry="2" stroke-width="1" fill="#fbae1c" stroke="#fbae1c" fill-opacity="1" stroke-opacity="0.9" class="amcharts-graph-column-front amcharts-graph-column-element"></rect></g><g class="amcharts-graph-column amcharts-graph-graphAuto0_1521566305304" transform="translate(873,73)" aria-label=" 15:50 92.1M"><rect x="0.5" y="-66.5" width="28" height="67" rx="2" ry="2" stroke-width="1" fill="#fbae1c" stroke="#fbae1c" fill-opacity="1" stroke-opacity="0.9" class="amcharts-graph-column-front amcharts-graph-column-element"></rect></g><g class="amcharts-graph-column amcharts-graph-graphAuto0_1521566305304" transform="translate(907,73)" aria-label=" 16:00 26.6M"><rect x="0.5" y="-18.5" width="28" height="19" rx="2" ry="2" stroke-width="1" fill="#fbae1c" stroke="#fbae1c" fill-opacity="1" stroke-opacity="0.9" class="amcharts-graph-column-front amcharts-graph-column-element"></rect></g><g class="amcharts-graph-column amcharts-graph-graphAuto0_1521566305304" transform="translate(942,73)" aria-label=" 16:10 22.9M"><rect x="0.5" y="-16.5" width="28" height="17" rx="2" ry="2" stroke-width="1" fill="#fbae1c" stroke="#fbae1c" fill-opacity="1" stroke-opacity="0.9" class="amcharts-graph-column-front amcharts-graph-column-element"></rect></g><g class="amcharts-graph-column amcharts-graph-graphAuto0_1521566305304" transform="translate(977,73)" aria-label=" 16:20 9.6M"><rect x="0.5" y="-6.5" width="28" height="7" rx="2" ry="2" stroke-width="1" fill="#fbae1c" stroke="#fbae1c" fill-opacity="1" stroke-opacity="0.9" class="amcharts-graph-column-front amcharts-graph-column-element"></rect></g><g class="amcharts-graph-column amcharts-graph-graphAuto0_1521566305304" transform="translate(1012,73)" aria-label=" 16:30 74.8M"><rect x="0.5" y="-54.5" width="28" height="55" rx="2" ry="2" stroke-width="1" fill="#fbae1c" stroke="#fbae1c" fill-opacity="1" stroke-opacity="0.9" class="amcharts-graph-column-front amcharts-graph-column-element"></rect></g></g></g></g><g></g><g><path cs="100,100" d="M0.5,73.5 L1043.5,73.5 L1043.5,73.5" fill="none" stroke-width="1" stroke-opacity="0.2" stroke="#000000" transform="translate(0,0)" class="amcharts-axis-zero-grid-valueAxisAuto0_1521566305287 amcharts-axis-zero-grid"></path><g class="amcharts-category-axis"><path cs="100,100" d="M0.5,0.5 L1043.5,0.5" fill="none" stroke-width="1" stroke-opacity="0" stroke="#000000" transform="translate(0,73)" class="amcharts-axis-line"></path></g><g class="amcharts-value-axis value-axis-valueAxisAuto0_1521566305287"><path cs="100,100" d="M0.5,0.5 L0.5,73.5" fill="none" stroke-width="1" stroke-opacity="0" stroke="#000000" transform="translate(0,0)" class="amcharts-axis-line" visibility="visible"></path></g></g><g><g transform="translate(0,0)" clip-path="url(#AmChartsEl-101)" style="pointer-events: none;"><path cs="100,100" d="M0.5,0.5 L0.5,0.5 L0.5,73.5" fill="none" stroke-width="1" stroke-opacity="0.5" stroke="#000000" class="amcharts-cursor-line amcharts-cursor-line-vertical" visibility="hidden" transform="translate(469,0)"></path><path cs="100,100" d="M0.5,0.5 L1043.5,0.5 L1043.5,0.5" fill="none" stroke-width="1" stroke="#000000" class="amcharts-cursor-line amcharts-cursor-line-horizontal" visibility="hidden" transform="translate(0,35)"></path></g><clippath id="AmChartsEl-101"><rect x="0" y="0" width="1043" height="73" rx="0" ry="0" stroke-width="0"></rect></clippath></g><g></g><g><g transform="translate(0,0)" class="amcharts-graph-column amcharts-graph-graphAuto0_1521566305304"></g></g><g><g></g></g><g><g class="amcharts-category-axis" transform="translate(0,0)" visibility="visible"><text y="6" fill="#000000" font-family="Verdana" font-size="11px" opacity="1" font-weight="bold" text-anchor="start" transform="translate(73,85.5)" class="amcharts-axis-label"><tspan y="6" x="0">12:00</tspan></text><text y="6" fill="#000000" font-family="Verdana" font-size="11px" opacity="1" text-anchor="start" transform="translate(177,85.5)" class="amcharts-axis-label"><tspan y="6" x="0">12:30</tspan></text><text y="6" fill="#000000" font-family="Verdana" font-size="11px" opacity="1" font-weight="bold" text-anchor="start" transform="translate(281,85.5)" class="amcharts-axis-label"><tspan y="6" x="0">13:00</tspan></text><text y="6" fill="#000000" font-family="Verdana" font-size="11px" opacity="1" text-anchor="start" transform="translate(385,85.5)" class="amcharts-axis-label"><tspan y="6" x="0">13:30</tspan></text><text y="6" fill="#000000" font-family="Verdana" font-size="11px" opacity="1" font-weight="bold" text-anchor="start" transform="translate(490,85.5)" class="amcharts-axis-label"><tspan y="6" x="0">14:00</tspan></text><text y="6" fill="#000000" font-family="Verdana" font-size="11px" opacity="1" text-anchor="start" transform="translate(594,85.5)" class="amcharts-axis-label"><tspan y="6" x="0">14:30</tspan></text><text y="6" fill="#000000" font-family="Verdana" font-size="11px" opacity="1" font-weight="bold" text-anchor="start" transform="translate(698,85.5)" class="amcharts-axis-label"><tspan y="6" x="0">15:00</tspan></text><text y="6" fill="#000000" font-family="Verdana" font-size="11px" opacity="1" text-anchor="start" transform="translate(803,85.5)" class="amcharts-axis-label"><tspan y="6" x="0">15:30</tspan></text><text y="6" fill="#000000" font-family="Verdana" font-size="11px" opacity="1" font-weight="bold" text-anchor="start" transform="translate(907,85.5)" class="amcharts-axis-label"><tspan y="6" x="0">16:00</tspan></text><text y="6" fill="#000000" font-family="Verdana" font-size="11px" opacity="1" text-anchor="start" transform="translate(1011,85.5)" class="amcharts-axis-label"><tspan y="6" x="0">16:30</tspan></text></g><g class="amcharts-value-axis value-axis-valueAxisAuto0_1521566305287" transform="translate(0,0)" visibility="visible"><text y="6" fill="#000000" font-family="Verdana" font-size="11px" opacity="1" text-anchor="start" transform="translate(4,65.5)" class="amcharts-axis-label"><tspan y="6" x="0">0</tspan></text><text y="6" fill="#000000" font-family="Verdana" font-size="11px" opacity="1" text-anchor="start" transform="translate(4,29.5)" class="amcharts-axis-label"><tspan y="6" x="0">50M</tspan></text><text y="6" fill="#000000" font-family="Verdana" font-size="11px" opacity="1" text-anchor="start" transform="translate(4,-1)" class="amcharts-axis-label"><tspan y="6" x="0"> </tspan></text></g></g><g></g><g transform="translate(0,0)"></g><g></g><g></g><clippath id="AmChartsEl-100"><rect x="-1" y="-1" width="1045" height="75" rx="0" ry="0" stroke-width="0"></rect></clippath></svg><a href="" title="JavaScript charts" style="position: absolute; text-decoration: none; color: rgb(0, 0, 0); font-family: Verdana; font-size: 11px; opacity: 0.7; display: block; left: 920px; top: 5px;">JS chart by amCharts</a></div></div></div></div></div></div></div>
                                </div>
                            </div>
                            <!-- /.box-body -->
                        </div>
                    </div>
                    <div class="col-lg-6 col-12">



                        <!-- Chart -->
                        <div class="box">
                            <div class="box-header with-border">
                                <h3 class="box-title">Live Traffic</h3>

                                <div class="box-tools pull-right">
                                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                                    <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                                </div>
                            </div>
                            <div class="box-body">
                                <div class="chart">
                                    <div id="chartdiv3" class="" style="height: 500px; overflow: visible; text-align: left;"><div class="amcharts-main-div" style="position: relative;"><div class="amcharts-chart-div" style="overflow: hidden; position: relative; text-align: left; width: 305px; height: 500px; padding: 0px; touch-action: auto;"><svg version="1.1" style="position: absolute; width: 305px; height: 500px; top: 0.25px; left: 0.15625px;"><desc>JavaScript chart by amCharts 3.21.12</desc><g><path cs="100,100" d="M0.5,0.5 L304.5,0.5 L304.5,499.5 L0.5,499.5 Z" fill="#FFFFFF" stroke="#000000" fill-opacity="0" stroke-width="1" stroke-opacity="0" class="amcharts-bg" aria-label="168"></path></g><g></g><g></g><g></g><g></g><g></g><g><g class="amcharts-gauge-axis amcharts-gauge-axis-axisAuto0_1521566306240"><g></g><g><path cs="1000,1000" d=" M56.37118017992731,305.5 L53.77310396857399,307 A114,114,0,1,1,251.226896031426,307 L248.6288198200727,305.5 A111,111,0,1,0,56.37118017992731,305.5 Z" fill="#67b7dc" fill-opacity="1" stroke-width="0" stroke-opacity="0" class="amcharts-axis-line"></path></g><path cs="100,100" d="M42.58176,314.25 L55.57214,306.75" fill="none" stroke-width="1" stroke-opacity="1" stroke="#67b7dc" class="amcharts-axis-tick"></path><text y="6" fill="#000000" font-family="Verdana" font-size="11px" opacity="1" text-anchor="middle" class="amcharts-axis-label" transform="translate(30,322)"><tspan y="6" x="0">0</tspan></text><path cs="100,100" d="M44.69532,303.32372 L51.88567,299.81675" fill="none" stroke-width="1" stroke-opacity="1" stroke="#67b7dc" class="amcharts-axis-tick-minor"></path><path cs="100,100" d="M41.27435,295.64009 L48.69182,292.64324" fill="none" stroke-width="1" stroke-opacity="1" stroke="#67b7dc" class="amcharts-axis-tick-minor"></path><path cs="100,100" d="M38.39769,287.73655 L46.00614,285.26441" fill="none" stroke-width="1" stroke-opacity="1" stroke="#67b7dc" class="amcharts-axis-tick-minor"></path><path cs="100,100" d="M36.07936,279.65159 L43.84173,277.71621" fill="none" stroke-width="1" stroke-opacity="1" stroke="#67b7dc" class="amcharts-axis-tick-minor"></path><path cs="100,100" d="M27.43701,272.64014 L42.20913,270.03542" fill="none" stroke-width="1" stroke-opacity="1" stroke="#67b7dc" class="amcharts-axis-tick"></path><text y="6" fill="#000000" font-family="Verdana" font-size="11px" opacity="1" text-anchor="middle" class="amcharts-axis-label" transform="translate(10,275)"><tspan y="6" x="0">20</tspan></text><path cs="100,100" d="M33.16011,263.09568 L41.11629,262.25945" fill="none" stroke-width="1" stroke-opacity="1" stroke="#67b7dc" class="amcharts-axis-tick-minor"></path><path cs="100,100" d="M32.57341,254.70539 L40.56853,254.42619" fill="none" stroke-width="1" stroke-opacity="1" stroke="#67b7dc" class="amcharts-axis-tick-minor"></path><path cs="100,100" d="M32.57341,246.29461 L40.56853,246.57381" fill="none" stroke-width="1" stroke-opacity="1" stroke="#67b7dc" class="amcharts-axis-tick-minor"></path><path cs="100,100" d="M33.16011,237.90432 L41.11629,238.74055" fill="none" stroke-width="1" stroke-opacity="1" stroke="#67b7dc" class="amcharts-axis-tick-minor"></path><path cs="100,100" d="M27.43701,228.35986 L42.20913,230.96458" fill="none" stroke-width="1" stroke-opacity="1" stroke="#67b7dc" class="amcharts-axis-tick"></path><text y="6" fill="#000000" font-family="Verdana" font-size="11px" opacity="1" text-anchor="middle" class="amcharts-axis-label" transform="translate(10,225)"><tspan y="6" x="0">40</tspan></text><path cs="100,100" d="M36.07936,221.34841 L43.84173,223.28379" fill="none" stroke-width="1" stroke-opacity="1" stroke="#67b7dc" class="amcharts-axis-tick-minor"></path><path cs="100,100" d="M38.39769,213.26345 L46.00614,215.73559" fill="none" stroke-width="1" stroke-opacity="1" stroke="#67b7dc" class="amcharts-axis-tick-minor"></path><path cs="100,100" d="M41.27435,205.35991 L48.69182,208.35676" fill="none" stroke-width="1" stroke-opacity="1" stroke="#67b7dc" class="amcharts-axis-tick-minor"></path><path cs="100,100" d="M44.69532,197.67628 L51.88567,201.18325" fill="none" stroke-width="1" stroke-opacity="1" stroke="#67b7dc" class="amcharts-axis-tick-minor"></path><path cs="100,100" d="M42.58176,186.75 L55.57214,194.25" fill="none" stroke-width="1" stroke-opacity="1" stroke="#67b7dc" class="amcharts-axis-tick"></path><text y="6" fill="#000000" font-family="Verdana" font-size="11px" opacity="1" text-anchor="middle" class="amcharts-axis-label" transform="translate(27,178)"><tspan y="6" x="0">60</tspan></text><path cs="100,100" d="M53.10097,183.11726 L59.73327,187.5908" fill="none" stroke-width="1" stroke-opacity="1" stroke="#67b7dc" class="amcharts-axis-tick-minor"></path><path cs="100,100" d="M58.0447,176.31279 L64.34879000000001,181.23808" fill="none" stroke-width="1" stroke-opacity="1" stroke="#67b7dc" class="amcharts-axis-tick-minor"></path><path cs="100,100" d="M63.45105,169.86976 L69.39621,175.22281" fill="none" stroke-width="1" stroke-opacity="1" stroke="#67b7dc" class="amcharts-axis-tick-minor"></path><path cs="100,100" d="M69.29367,163.81955 L74.85093,169.57427" fill="none" stroke-width="1" stroke-opacity="1" stroke="#67b7dc" class="amcharts-axis-tick-minor"></path><path cs="100,100" d="M71.04458,152.82933 L80.68639,164.32" fill="none" stroke-width="1" stroke-opacity="1" stroke="#67b7dc" class="amcharts-axis-tick"></path><text y="6" fill="#000000" font-family="Verdana" font-size="11px" opacity="1" text-anchor="middle" class="amcharts-axis-label" transform="translate(60,140)"><tspan y="6" x="0">80</tspan></text><path cs="100,100" d="M82.17188,153.01345 L86.87416,159.48559" fill="none" stroke-width="1" stroke-opacity="1" stroke="#67b7dc" class="amcharts-axis-tick-minor"></path><path cs="100,100" d="M89.14473,148.3102 L93.38408,155.09459" fill="none" stroke-width="1" stroke-opacity="1" stroke="#67b7dc" class="amcharts-axis-tick-minor"></path><path cs="100,100" d="M96.42868,144.10482 L100.18445,151.1684" fill="none" stroke-width="1" stroke-opacity="1" stroke="#67b7dc" class="amcharts-axis-tick-minor"></path><path cs="100,100" d="M103.98823,140.41777 L107.24213,147.72614" fill="none" stroke-width="1" stroke-opacity="1" stroke="#67b7dc" class="amcharts-axis-tick-minor"></path><path cs="100,100" d="M109.39243,130.68919 L114.52273,144.78458" fill="none" stroke-width="1" stroke-opacity="1" stroke="#67b7dc" class="amcharts-axis-tick"></path><text y="6" fill="#000000" font-family="Verdana" font-size="11px" opacity="1" text-anchor="middle" class="amcharts-axis-label" transform="translate(102,115)"><tspan y="6" x="0">100</tspan></text><path cs="100,100" d="M119.7857,134.66797 L121.9908,142.35806" fill="none" stroke-width="1" stroke-opacity="1" stroke="#67b7dc" class="amcharts-axis-tick-minor"></path><path cs="100,100" d="M127.94664,132.63321 L129.60993,140.45839" fill="none" stroke-width="1" stroke-opacity="1" stroke="#67b7dc" class="amcharts-axis-tick-minor"></path><path cs="100,100" d="M136.22964,131.1727 L137.34303,139.09484" fill="none" stroke-width="1" stroke-opacity="1" stroke="#67b7dc" class="amcharts-axis-tick-minor"></path><path cs="100,100" d="M144.59434,130.29353 L145.1524,138.27404" fill="none" stroke-width="1" stroke-opacity="1" stroke="#67b7dc" class="amcharts-axis-tick-minor"></path><path cs="100,100" d="M153,123 L153,138" fill="none" stroke-width="1" stroke-opacity="1" stroke="#67b7dc" class="amcharts-axis-tick"></path><text y="6" fill="#000000" font-family="Verdana" font-size="11px" opacity="1" text-anchor="middle" class="amcharts-axis-label" transform="translate(153,106)"><tspan y="6" x="0">120</tspan></text><path cs="100,100" d="M161.40566,130.29353 L160.8476,138.27404" fill="none" stroke-width="1" stroke-opacity="1" stroke="#67b7dc" class="amcharts-axis-tick-minor"></path><path cs="100,100" d="M169.77036,131.1727 L168.65697,139.09484" fill="none" stroke-width="1" stroke-opacity="1" stroke="#67b7dc" class="amcharts-axis-tick-minor"></path><path cs="100,100" d="M178.05336,132.63321 L176.39007,140.45839" fill="none" stroke-width="1" stroke-opacity="1" stroke="#67b7dc" class="amcharts-axis-tick-minor"></path><path cs="100,100" d="M186.2143,134.66797 L184.0092,142.35806" fill="none" stroke-width="1" stroke-opacity="1" stroke="#67b7dc" class="amcharts-axis-tick-minor"></path><path cs="100,100" d="M196.60757,130.68919 L191.47727,144.78458" fill="none" stroke-width="1" stroke-opacity="1" stroke="#67b7dc" class="amcharts-axis-tick"></path><text y="6" fill="#000000" font-family="Verdana" font-size="11px" opacity="1" text-anchor="middle" class="amcharts-axis-label" transform="translate(203,115)"><tspan y="6" x="0">140</tspan></text><path cs="100,100" d="M202.01177,140.41777 L198.75787,147.72614" fill="none" stroke-width="1" stroke-opacity="1" stroke="#67b7dc" class="amcharts-axis-tick-minor"></path><path cs="100,100" d="M209.57132,144.10482 L205.81555,151.1684" fill="none" stroke-width="1" stroke-opacity="1" stroke="#67b7dc" class="amcharts-axis-tick-minor"></path><path cs="100,100" d="M216.85527,148.3102 L212.61592,155.09459" fill="none" stroke-width="1" stroke-opacity="1" stroke="#67b7dc" class="amcharts-axis-tick-minor"></path><path cs="100,100" d="M223.82812,153.01345 L219.12584,159.48559" fill="none" stroke-width="1" stroke-opacity="1" stroke="#67b7dc" class="amcharts-axis-tick-minor"></path><path cs="100,100" d="M234.95542,152.82933 L225.31361,164.32" fill="none" stroke-width="1" stroke-opacity="1" stroke="#67b7dc" class="amcharts-axis-tick"></path><text y="6" fill="#000000" font-family="Verdana" font-size="11px" opacity="1" text-anchor="middle" class="amcharts-axis-label" transform="translate(248,140)"><tspan y="6" x="0">160</tspan></text><path cs="100,100" d="M236.70633,163.81955 L231.14907,169.57427" fill="none" stroke-width="1" stroke-opacity="1" stroke="#67b7dc" class="amcharts-axis-tick-minor"></path><path cs="100,100" d="M242.54895,169.86976 L236.60379,175.22281" fill="none" stroke-width="1" stroke-opacity="1" stroke="#67b7dc" class="amcharts-axis-tick-minor"></path><path cs="100,100" d="M247.9553,176.31279 L241.65121,181.23808" fill="none" stroke-width="1" stroke-opacity="1" stroke="#67b7dc" class="amcharts-axis-tick-minor"></path><path cs="100,100" d="M252.89903,183.11726 L246.26673,187.5908" fill="none" stroke-width="1" stroke-opacity="1" stroke="#67b7dc" class="amcharts-axis-tick-minor"></path><path cs="100,100" d="M263.41824,186.75 L250.42786,194.25" fill="none" stroke-width="1" stroke-opacity="1" stroke="#67b7dc" class="amcharts-axis-tick"></path><text y="6" fill="#000000" font-family="Verdana" font-size="11px" opacity="1" text-anchor="middle" class="amcharts-axis-label" transform="translate(281,178)"><tspan y="6" x="0">180</tspan></text><path cs="100,100" d="M261.30468,197.67628 L254.11433,201.18325" fill="none" stroke-width="1" stroke-opacity="1" stroke="#67b7dc" class="amcharts-axis-tick-minor"></path><path cs="100,100" d="M264.72565,205.35991 L257.30818,208.35676" fill="none" stroke-width="1" stroke-opacity="1" stroke="#67b7dc" class="amcharts-axis-tick-minor"></path><path cs="100,100" d="M267.60231,213.26345 L259.99386,215.73559" fill="none" stroke-width="1" stroke-opacity="1" stroke="#67b7dc" class="amcharts-axis-tick-minor"></path><path cs="100,100" d="M269.92064,221.34841 L262.15827,223.28379" fill="none" stroke-width="1" stroke-opacity="1" stroke="#67b7dc" class="amcharts-axis-tick-minor"></path><path cs="100,100" d="M278.56299,228.35986 L263.79087,230.96458" fill="none" stroke-width="1" stroke-opacity="1" stroke="#67b7dc" class="amcharts-axis-tick"></path><text y="6" fill="#000000" font-family="Verdana" font-size="11px" opacity="1" text-anchor="middle" class="amcharts-axis-label" transform="translate(298,225)"><tspan y="6" x="0">200</tspan></text><path cs="100,100" d="M272.83989,237.90432 L264.88371,238.74055" fill="none" stroke-width="1" stroke-opacity="1" stroke="#67b7dc" class="amcharts-axis-tick-minor"></path><path cs="100,100" d="M273.42659,246.29461 L265.43147,246.57381" fill="none" stroke-width="1" stroke-opacity="1" stroke="#67b7dc" class="amcharts-axis-tick-minor"></path><path cs="100,100" d="M273.42659,254.70539 L265.43147,254.42619" fill="none" stroke-width="1" stroke-opacity="1" stroke="#67b7dc" class="amcharts-axis-tick-minor"></path><path cs="100,100" d="M272.83989,263.09568 L264.88371,262.25945" fill="none" stroke-width="1" stroke-opacity="1" stroke="#67b7dc" class="amcharts-axis-tick-minor"></path><path cs="100,100" d="M278.56299,272.64014 L263.79087,270.03542" fill="none" stroke-width="1" stroke-opacity="1" stroke="#67b7dc" class="amcharts-axis-tick"></path><text y="6" fill="#000000" font-family="Verdana" font-size="11px" opacity="1" text-anchor="middle" class="amcharts-axis-label" transform="translate(298,275)"><tspan y="6" x="0">220</tspan></text><path cs="100,100" d="M269.92064,279.65159 L262.15827,277.71621" fill="none" stroke-width="1" stroke-opacity="1" stroke="#67b7dc" class="amcharts-axis-tick-minor"></path><path cs="100,100" d="M267.60231,287.73655 L259.99386,285.26441" fill="none" stroke-width="1" stroke-opacity="1" stroke="#67b7dc" class="amcharts-axis-tick-minor"></path><path cs="100,100" d="M264.72565,295.64009 L257.30818,292.64324" fill="none" stroke-width="1" stroke-opacity="1" stroke="#67b7dc" class="amcharts-axis-tick-minor"></path><path cs="100,100" d="M261.30468,303.32372 L254.11433,299.81675" fill="none" stroke-width="1" stroke-opacity="1" stroke="#67b7dc" class="amcharts-axis-tick-minor"></path><path cs="100,100" d="M263.41824,314.25 L250.42786,306.75" fill="none" stroke-width="1" stroke-opacity="1" stroke="#67b7dc" class="amcharts-axis-tick"></path><text y="6" fill="#000000" font-family="Verdana" font-size="11px" opacity="1" text-anchor="middle" class="amcharts-axis-label" transform="translate(281,322)"><tspan y="6" x="0">240</tspan></text></g><g class="amcharts-gauge-axis amcharts-gauge-axis-axisAuto1_1521566306241"><g></g><g><path cs="1000,1000" d=" M54.639129372358425,306.5 L52.04105316100511,308 A116,116,0,1,1,252.9589468389949,308 L250.3608706276416,306.5 A113,113,0,1,0,54.639129372358425,306.5 Z" fill="#fdd400" fill-opacity="1" stroke-width="0" stroke-opacity="0" class="amcharts-axis-line"></path></g><path cs="100,100" d="M54.2731,307.5 L67.26349,300" fill="none" stroke-width="1" stroke-opacity="1" stroke="#fdd400" class="amcharts-axis-tick"></path><text y="6" fill="#000000" font-family="Verdana" font-size="11px" opacity="1" text-anchor="middle" class="amcharts-axis-label" transform="translate(78,291)"><tspan y="6" x="0">0</tspan></text><path cs="100,100" d="M48.85582,296.86798 L56.16418,293.61408" fill="none" stroke-width="1" stroke-opacity="1" stroke="#fdd400" class="amcharts-axis-tick-minor"></path><path cs="100,100" d="M44.57956,285.72794 L52.18801,283.2558" fill="none" stroke-width="1" stroke-opacity="1" stroke="#fdd400" class="amcharts-axis-tick-minor"></path><path cs="100,100" d="M41.49117,274.20193 L49.31635,272.53864" fill="none" stroke-width="1" stroke-opacity="1" stroke="#fdd400" class="amcharts-axis-tick-minor"></path><path cs="100,100" d="M39.6245,262.41624 L47.58068,261.58002" fill="none" stroke-width="1" stroke-opacity="1" stroke="#fdd400" class="amcharts-axis-tick-minor"></path><path cs="100,100" d="M39,250.5 L54,250.5" fill="none" stroke-width="1" stroke-opacity="1" stroke="#fdd400" class="amcharts-axis-tick"></path><text y="6" fill="#000000" font-family="Verdana" font-size="11px" opacity="1" text-anchor="middle" class="amcharts-axis-label" transform="translate(70,250)"><tspan y="6" x="0">20</tspan></text><path cs="100,100" d="M39.6245,238.58376 L47.58068,239.41998" fill="none" stroke-width="1" stroke-opacity="1" stroke="#fdd400" class="amcharts-axis-tick-minor"></path><path cs="100,100" d="M41.49117,226.79807 L49.31635,228.46136" fill="none" stroke-width="1" stroke-opacity="1" stroke="#fdd400" class="amcharts-axis-tick-minor"></path><path cs="100,100" d="M44.57956,215.27206 L52.18801,217.7442" fill="none" stroke-width="1" stroke-opacity="1" stroke="#fdd400" class="amcharts-axis-tick-minor"></path><path cs="100,100" d="M48.85582,204.13202 L56.16418,207.38592" fill="none" stroke-width="1" stroke-opacity="1" stroke="#fdd400" class="amcharts-axis-tick-minor"></path><path cs="100,100" d="M54.2731,193.5 L67.26349,201" fill="none" stroke-width="1" stroke-opacity="1" stroke="#fdd400" class="amcharts-axis-tick"></path><text y="6" fill="#000000" font-family="Verdana" font-size="11px" opacity="1" text-anchor="middle" class="amcharts-axis-label" transform="translate(81,209)"><tspan y="6" x="0">40</tspan></text><path cs="100,100" d="M60.77206,183.49248 L67.2442,188.19476" fill="none" stroke-width="1" stroke-opacity="1" stroke="#fdd400" class="amcharts-axis-tick-minor"></path><path cs="100,100" d="M68.28149,174.21911 L74.22665,179.57216" fill="none" stroke-width="1" stroke-opacity="1" stroke="#fdd400" class="amcharts-axis-tick-minor"></path><path cs="100,100" d="M76.71911,165.78149 L82.07216,171.72665" fill="none" stroke-width="1" stroke-opacity="1" stroke="#fdd400" class="amcharts-axis-tick-minor"></path><path cs="100,100" d="M85.99248,158.27206 L90.69476,164.7442" fill="none" stroke-width="1" stroke-opacity="1" stroke="#fdd400" class="amcharts-axis-tick-minor"></path><path cs="100,100" d="M96,151.7731 L103.5,164.76349" fill="none" stroke-width="1" stroke-opacity="1" stroke="#fdd400" class="amcharts-axis-tick"></path><text y="6" fill="#000000" font-family="Verdana" font-size="11px" opacity="1" text-anchor="middle" class="amcharts-axis-label" transform="translate(111,179)"><tspan y="6" x="0">60</tspan></text><path cs="100,100" d="M106.63202,146.35582 L109.88592,153.66418" fill="none" stroke-width="1" stroke-opacity="1" stroke="#fdd400" class="amcharts-axis-tick-minor"></path><path cs="100,100" d="M117.77206,142.07956 L120.2442,149.68801" fill="none" stroke-width="1" stroke-opacity="1" stroke="#fdd400" class="amcharts-axis-tick-minor"></path><path cs="100,100" d="M129.29807,138.99117 L130.96136,146.81635" fill="none" stroke-width="1" stroke-opacity="1" stroke="#fdd400" class="amcharts-axis-tick-minor"></path><path cs="100,100" d="M141.08376,137.1245 L141.91998,145.08068" fill="none" stroke-width="1" stroke-opacity="1" stroke="#fdd400" class="amcharts-axis-tick-minor"></path><path cs="100,100" d="M153,136.5 L153,151.5" fill="none" stroke-width="1" stroke-opacity="1" stroke="#fdd400" class="amcharts-axis-tick"></path><text y="6" fill="#000000" font-family="Verdana" font-size="11px" opacity="1" text-anchor="middle" class="amcharts-axis-label" transform="translate(153,168)"><tspan y="6" x="0">80</tspan></text><path cs="100,100" d="M164.91624,137.1245 L164.08002,145.08068" fill="none" stroke-width="1" stroke-opacity="1" stroke="#fdd400" class="amcharts-axis-tick-minor"></path><path cs="100,100" d="M176.70193,138.99117 L175.03864,146.81635" fill="none" stroke-width="1" stroke-opacity="1" stroke="#fdd400" class="amcharts-axis-tick-minor"></path><path cs="100,100" d="M188.22794,142.07956 L185.7558,149.68801" fill="none" stroke-width="1" stroke-opacity="1" stroke="#fdd400" class="amcharts-axis-tick-minor"></path><path cs="100,100" d="M199.36798,146.35582 L196.11408,153.66418" fill="none" stroke-width="1" stroke-opacity="1" stroke="#fdd400" class="amcharts-axis-tick-minor"></path><path cs="100,100" d="M210,151.7731 L202.5,164.76349" fill="none" stroke-width="1" stroke-opacity="1" stroke="#fdd400" class="amcharts-axis-tick"></path><text y="6" fill="#000000" font-family="Verdana" font-size="11px" opacity="1" text-anchor="middle" class="amcharts-axis-label" transform="translate(192,179)"><tspan y="6" x="0">100</tspan></text><path cs="100,100" d="M220.00752,158.27206 L215.30524,164.7442" fill="none" stroke-width="1" stroke-opacity="1" stroke="#fdd400" class="amcharts-axis-tick-minor"></path><path cs="100,100" d="M229.28089,165.78149 L223.92784,171.72665" fill="none" stroke-width="1" stroke-opacity="1" stroke="#fdd400" class="amcharts-axis-tick-minor"></path><path cs="100,100" d="M237.71851,174.21911 L231.77335,179.57216" fill="none" stroke-width="1" stroke-opacity="1" stroke="#fdd400" class="amcharts-axis-tick-minor"></path><path cs="100,100" d="M245.22794,183.49248 L238.7558,188.19476" fill="none" stroke-width="1" stroke-opacity="1" stroke="#fdd400" class="amcharts-axis-tick-minor"></path><path cs="100,100" d="M251.7269,193.5 L238.73651,201" fill="none" stroke-width="1" stroke-opacity="1" stroke="#fdd400" class="amcharts-axis-tick"></path><text y="6" fill="#000000" font-family="Verdana" font-size="11px" opacity="1" text-anchor="middle" class="amcharts-axis-label" transform="translate(220,209)"><tspan y="6" x="0">120</tspan></text><path cs="100,100" d="M257.14418,204.13202 L249.83582,207.38592" fill="none" stroke-width="1" stroke-opacity="1" stroke="#fdd400" class="amcharts-axis-tick-minor"></path><path cs="100,100" d="M261.42044,215.27206 L253.81199,217.7442" fill="none" stroke-width="1" stroke-opacity="1" stroke="#fdd400" class="amcharts-axis-tick-minor"></path><path cs="100,100" d="M264.50883,226.79807 L256.68365,228.46136" fill="none" stroke-width="1" stroke-opacity="1" stroke="#fdd400" class="amcharts-axis-tick-minor"></path><path cs="100,100" d="M266.3755,238.58376 L258.41932,239.41998" fill="none" stroke-width="1" stroke-opacity="1" stroke="#fdd400" class="amcharts-axis-tick-minor"></path><path cs="100,100" d="M267,250.5 L252,250.5" fill="none" stroke-width="1" stroke-opacity="1" stroke="#fdd400" class="amcharts-axis-tick"></path><text y="6" fill="#000000" font-family="Verdana" font-size="11px" opacity="1" text-anchor="middle" class="amcharts-axis-label" transform="translate(231,250)"><tspan y="6" x="0">140</tspan></text><path cs="100,100" d="M266.3755,262.41624 L258.41932,261.58002" fill="none" stroke-width="1" stroke-opacity="1" stroke="#fdd400" class="amcharts-axis-tick-minor"></path><path cs="100,100" d="M264.50883,274.20193 L256.68365,272.53864" fill="none" stroke-width="1" stroke-opacity="1" stroke="#fdd400" class="amcharts-axis-tick-minor"></path><path cs="100,100" d="M261.42044,285.72794 L253.81199,283.2558" fill="none" stroke-width="1" stroke-opacity="1" stroke="#fdd400" class="amcharts-axis-tick-minor"></path><path cs="100,100" d="M257.14418,296.86798 L249.83582,293.61408" fill="none" stroke-width="1" stroke-opacity="1" stroke="#fdd400" class="amcharts-axis-tick-minor"></path><path cs="100,100" d="M251.7269,307.5 L238.73651,300" fill="none" stroke-width="1" stroke-opacity="1" stroke="#fdd400" class="amcharts-axis-tick"></path><text y="6" fill="#000000" font-family="Verdana" font-size="11px" opacity="1" text-anchor="middle" class="amcharts-axis-label" transform="translate(220,291)"><tspan y="6" x="0">160</tspan></text></g><g class="amcharts-gauge-arrow amcharts-gauge-arrow-arrowAuto0_1521566306241"><path cs="100,100" d="M175.27196560600558,231.20078892687826 L248.24919,203.70141 L248.24919,203.70141 L181.88661,244.66357 Z" fill="#67b7dc" stroke="#67b7dc" fill-opacity="0.8" stroke-width="1" stroke-opacity="0.8" class="amcharts-gauge-arrow"></path></g></g><g></g><g></g><g></g><g></g><g></g><g><g></g></g><g></g><g></g><g></g><g></g><g></g></svg><a href="" title="JavaScript charts" style="position: absolute; text-decoration: none; color: rgb(0, 0, 0); font-family: Verdana; font-size: 11px; opacity: 0.7; display: block; left: 5px; top: 5px;">JS chart by amCharts</a></div></div></div>
                                </div>
                            </div>
                            <!-- /.box-body -->
                        </div>
                        <!-- /.box -->
                    </div>
                    <div class="col-lg-6 col-12">
                        <div class="box">
                            <div class="box-header with-border">
                                <h3 class="box-title">Latest Transactions</h3>

                                <div class="box-tools pull-right">
                                    <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="" data-original-title="Collapse">
                                        <i class="fa fa-minus"></i></button>
                                    <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="" data-original-title="Remove">
                                        <i class="fa fa-times"></i></button>
                                </div>
                            </div>
                            <div class="box-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered no-margin">
                                        <thead>
                                        <tr class="bg-pale-dark">
                                            <th>Transaction ID</th>
                                            <th>BTC</th>
                                            <th>ETH</th>
                                            <th>Time</th>
                                            <th>Status</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr v-for="trans in transactions">
                                            <td>
                                                {{ trans.transact_id }}
                                            </td>
                                            <td>{{ trans.amount_btc }}</td>
                                            <td>{{ trans.amount_eth }}</td>
                                            <td>
                                                {{ trans.created_at | timeago }}
                                            </td>
                                            <td v-if="trans.status == 'ACTIVATED'"><span class="label label-success">Confirmed</span></td>
                                            <td v-else="trans.status == 'PENDING'"><span class="label label-warning">Unconfirmed</span></td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <!-- /.box-body -->
                        </div>
                        <!-- /.box -->

                    </div>
                     </div>
                <div class="row">
                    <div class="col-lg-4 col-12">
                        <div class="box">
                            <div class="box-header with-border">
                                <h3 class="box-title">Data Tables Markets</h3>
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body">
                                <div class="table-responsive">
                                    <div id="example1_wrapper" class="dataTables_wrapper no-footer"><table id="example1" class="table table-striped table-bordered no-margin dataTable no-footer" role="grid">
                                        <thead>
                                        <tr class="bg-pale-dark" role="row">
                                            <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Coin: activate to sort column descending">Coin</th><th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Price: activate to sort column ascending">Price</th><th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Change %: activate to sort column ascending">Change %</th></tr>
                                        </thead>
                                        <tbody>
                                        <tr role="row" class="odd" v-for="coin in coiniiBtcEth">
                                            <td class="sorting_1"><p class="font-size-18 no-margin">{{ coin.name }}</p></td>
                                            <td><p class="no-margin"><span>$</span>{{ coin.price_usd  }}</p></td>
                                            <td class="no-wrap"><span class="badge badge-danger"><i class="fa fa-chevron-down"></i>{{ coin.percent_change_7d }}</span></td>
                                        </tr>
                                     </tbody>
                                    </table></div>
                                </div>
                            </div>
                            <!-- /.box-body -->
                        </div>
                        <!-- /.box -->
                    </div>
                    <div class="col-12 col-lg-3">
                        <div class="box box-body" v-for="co in coiniiMthBtc">
                            <div class="media align-items-center p-0">
                                <div class="text-center">
                                    <a href="#"><i class="cc BTC mr-5" title="BTC"></i></a>
                                </div>
                                <div>
                                    <h2 class="no-margin">{{ co.name }}</h2>
                                </div>
                            </div>
                            <div class="flexbox align-items-center mt-25">
                                <div>
                                    <p class="no-margin">{{ co.market_cap_usd }}<span class="text-gray">{{ co.symbol }}</span> <span class="text-info">{{ co.price_usd }}</span></p>
                                </div>
                                <div class="text-right">
                                    <p class="no-margin"><span class="text-success">{{ co.percent_change_24h }}</span></p>
                                </div>
                            </div>
                        </div>
                       <!-- <div class="box box-body">
                            <div class="media align-items-center p-0">
                                <div class="text-center">
                                    <a href="#"><i class="cc LTC mr-5" title="LTC"></i></a>
                                </div>
                                <div>
                                    <h2 class="no-margin">Litecoin LTC</h2>
                                </div>
                            </div>
                            <div class="flexbox align-items-center mt-25">
                                <div>
                                    <p class="no-margin">1.34000434 <span class="text-gray">LTC</span> <span class="text-info">$0.14</span></p>
                                </div>
                                <div class="text-right">
                                    <p class="no-margin"><span class="text-danger">-2.35%</span></p>
                                </div>
                            </div>
                        </div>
                        <div class="box box-body">
                            <div class="media align-items-center p-0">
                                <div class="text-center">
                                    <a href="#"><i class="cc NEO mr-5" title="NEO"></i></a>
                                </div>
                                <div>
                                    <h2 class="no-margin">Neo NEO</h2>
                                </div>
                            </div>
                            <div class="flexbox align-items-center mt-25">
                                <div>
                                    <p class="no-margin">0.30000434 <span class="text-gray">NEO</span> <span class="text-info">$5.04</span></p>
                                </div>
                                <div class="text-right">
                                    <p class="no-margin"><span class="text-success">+4.35%</span></p>
                                </div>
                            </div>
                        </div>
                        <div class="box box-body">
                            <div class="media align-items-center p-0">
                                <div class="text-center">
                                    <a href="#"><i class="cc DASH mr-5" title="DASH"></i></a>
                                </div>
                                <div>
                                    <h2 class="no-margin">Dash DASH</h2>
                                </div>
                            </div>
                            <div class="flexbox align-items-center mt-25">
                                <div>
                                    <p class="no-margin">0.34000434 <span class="text-gray">DASH</span> <span class="text-info">$0.54</span></p>
                                </div>
                                <div class="text-right">
                                    <p class="no-margin"><span class="text-danger">-5.35%</span></p>
                                </div>
                            </div>
                        </div>-->
                    </div>

                    <div class="col-lg-5 col-12">
                        <!-- Chart -->
                        <div class="box">
                            <div class="box-header with-border">
                                <h3 class="box-title">Announcements</h3>

                                <div class="box-tools pull-right">
                                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                                    <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                                </div>
                            </div>
                            <div class="box-body">
                                <div class="chart" v-for="announcement in announcements">
                                    <h3 class="tx-lato tx-white mg-b-0">{{ announcement.subject }}</h3>
                                    <p class="mg-b-20 tx-white-6">{{ announcement.content }}</p>
                                    <small style="color: maroon;">{{ announcement.created_at | formatDate}} <a href="#" style="color: red;">Admin</a></small>
                                </div>
                            </div>
                            <!-- /.box-body -->
                            <button class="btn btn-primary btn-block" @click="getAnnouncements(pagination.prev_page_url)"
                                    :disabled="!pagination.prev_page_url"><i class="fa fa-arrow-left"></i><span class="label label-danger">Previous</span></button>
                            <span>Page {{pagination.current_page}} of {{pagination.last_page}}</span>
                            <button class="btn btn-primary btn-block" @click="getAnnouncements(pagination.next_page_url)"
                                    :disabled="!pagination.next_page_url"><span class="label label-danger">Next</span><i class="fa fa-arrow-right"></i></button>
                        </div>
                        <!-- /.box -->
                    </div>


                    <div class="col-lg-7 col-12">
                        <div class="box">


                        </div>
                    </div>

                </div>


            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->
        <footer-up></footer-up>

    </div>
</template>


<script>
    import leftNav from '../components/leftNav.vue'
    import Header from '../components/Header.vue'
    import Footer from '../components/Footer.vue'
    import {getLink} from '../utilities/settings'
    import {getReferral} from '../utilities/settings'
    import {authTransactions} from '../utilities/settings'
    import {getUser} from '../utilities/settings'
    import {getReferralDetails} from '../utilities/settings'
    import {withdraw_amt1} from  '../utilities/settings'
    import {referralCalc} from '../utilities/settings'
    import {getAnnouncement} from '../utilities/settings'
    import {dashboardTrans} from '../utilities/settings'
    let UPDATE_INTERVAL = 60 * 1000;

    export default {
        data() {
            return {
                link : [],
                referral: [],
                referralDetails: [],
                authUser: [],
                coiniiBtcEth: [],
                coinData3BtcEth: {},
                coiniiMthBtc: [],
               // coinData3BtcEth: {},
                withdraw_amt1: {},
                referral_calc: {},
                announcements: {},
                pagination: {},
                contracts: {},
                transactions: {}
            }
        },
        components: {
            'left-nav': leftNav,
            'header-up': Header,
            'footer-up': Footer
        },
        created() {
            this.getLink();
            this.getReferral();
            this.getAuthUser();
            this.getReferralDetails();
            this.withdrawAmt1();
            this.getCoins3BtcEth();
            this.getCoins4BtcEth();
            this.getAnnouncements();
            this.referralCalc();
            this.getContracts();
            this.dashboardTransactions();



        },

        methods: {
            getLink(){
                this.$http.get(getLink).then(function (response) {
                    this.link = response.body;
                })
                    .catch( (err) => {
                        console.log(err)
                    })
            },
            getReferral() {
                this.$http.get(getReferral).then(function (response) {
                    // console.log(this.settings)
                    this.referral = response.body;
                })
            },
            getAuthUser(){
                this.$http.get(getUser).then(function (response) {
                    // console.log(this.settings)
                    this.authUser = response.body;
                })
            },
            getContracts() {
                this.$http.get(authTransactions).then(function (response) {
                    this.contracts = response.body;
                })
                    .catch( (err) => {
                        console.log(err)
                    });
            },
            getReferralDetails() {
                this.$http.get(getReferralDetails).then(function (response) {
                    // console.log(this.settings)
                    this.referralDetails = response.body;
                })
            },
            withdrawAmt1(){
                this.$http.get(withdraw_amt1)
                    .then(function (response) {
                        this.withdraw_amt1 = response.body;
                    })
                    .catch( (err) => {
                        console.log(err)
                    })
            },
            referralCalc(){
                this.$http.get(referralCalc)
                    .then(function (response) {
                        this.referral_calc = response.body;
                    })
                    .catch( (err) => {
                        console.log(err)
                    })
            },
            dashboardTransactions(){
                this.$http.get(dashboardTrans)
                    .then(function (response) {
                        this.transactions = response.body;
                    })
                    .catch( (err) => {
                        console.log(err)
                    })
            },
            getAnnouncements(page_url) {

                page_url = page_url || getAnnouncement
                this.$http.get(page_url).then((response) => {
                    this.makePagination(response.data)
                    this.announcements = response.data.data;
                });

            },

            makePagination (data) {
                let pagination = {
                    current_page: data.current_page,
                    last_page: data.last_page,
                    next_page_url: data.next_page_url,
                    prev_page_url: data.prev_page_url,
                    total: data.total
                }
                this.pagination = pagination;
            },


            getCoins3BtcEth: function() {
                let npp = this
                $.ajax({
                    url: 'https://api.coinmarketcap.com/v1/ticker/?limit=10',
                    method: 'GET'
                }).then(function (response) {
                    if (response.error) {
                        console.err("There was an error " + response.error);
                    } else {

                        console.log(response);
                        npp.coiniiBtcEth = response
                    }
                }).catch(function (err) {
                    console.error(err);
                });

            },

            getCoins4BtcEth: function() {
                let npp = this
                $.ajax({
                    url: 'https://api.coinmarketcap.com/v1/ticker/?limit=4',
                    method: 'GET'
                }).then(function (response) {
                    if (response.error) {
                        console.err("There was an error " + response.error);
                    } else {

                        console.log(response);
                        npp.coiniiMthBtc = response
                    }
                }).catch(function (err) {
                    console.error(err);
                });

            },
            /**

             /**
             * Return a CSS color (either red or green) depending on whether or
             * not the value passed in is negative or positive.
             */
            getColor3BtcEth: (num) => {
                return num > 0 ? "color:green;" : "color:red;";
            },



        }
    }
    setInterval(() => {
        this.getCoins3BtcEth();
    }, UPDATE_INTERVAL)
    setInterval(() => {
        this.getCoins4BtcEth();
    }, UPDATE_INTERVAL)
</script>