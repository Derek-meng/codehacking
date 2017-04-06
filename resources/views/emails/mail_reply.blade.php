<style>
    /***
    User Profile Sidebar by @keenthemes
A component of Metronic Theme - #1 Selling Bootstrap 3 Admin Theme in Themeforest: http://j.mp/metronictheme
Licensed under MIT
***/
    @import url(//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css);
    /*Comment List styles*/
    .comment-list .row {
        margin-bottom: 0px;
    }
    .comment-list .panel .panel-heading {
        padding: 4px 15px;
        position: absolute;
        border:none;
        /*Panel-heading border radius*/
        border-top-right-radius:0px;
        top: 1px;
    }
    .comment-list .panel .panel-heading.right {
        border-right-width: 0px;
        /*Panel-heading border radius*/
        border-top-left-radius:0px;
        right: 16px;
    }
    .comment-list .panel .panel-heading .panel-body {
        padding-top: 6px;
    }
    .comment-list figcaption {
        /*For wrapping text in thumbnail*/
        word-wrap: break-word;
    }
    /* Portrait tablets and medium desktops */
    @media (min-width: 768px) {
        .comment-list .arrow:after, .comment-list .arrow:before {
            content: "";
            position: absolute;
            width: 0;
            height: 0;
            border-style: solid;
            border-color: transparent;
        }
        .comment-list .panel.arrow.left:after, .comment-list .panel.arrow.left:before {
            border-left: 0;
        }
        /*****Left Arrow*****/
        /*Outline effect style*/
        .comment-list .panel.arrow.left:before {
            left: 0px;
            top: 30px;
            /*Use boarder color of panel*/
            border-right-color: inherit;
            border-width: 16px;
        }
        /*Background color effect*/
        .comment-list .panel.arrow.left:after {
            left: 1px;
            top: 31px;
            /*Change for different outline color*/
            border-right-color: #FFFFFF;
            border-width: 15px;
        }
        /*****Right Arrow*****/
        /*Outline effect style*/
        .comment-list .panel.arrow.right:before {
            right: -16px;
            top: 30px;
            /*Use boarder color of panel*/
            border-left-color: inherit;
            border-width: 16px;
        }
        /*Background color effect*/
        .comment-list .panel.arrow.right:after {
            right: -14px;
            top: 31px;
            /*Change for different outline color*/
            border-left-color: #FFFFFF;
            border-width: 15px;
        }
    }
    .comment-list .comment-post {
        margin-top: 6px;
    }
    body {
        padding: 0;
        margin: 0;
    }

    html { -webkit-text-size-adjust:none; -ms-text-size-adjust: none;}
    @media only screen and (max-device-width: 680px), only screen and (max-width: 680px) {
        *[class="table_width_100"] {
            width: 96% !important;
        }
        *[class="border-right_mob"] {
            border-right: 1px solid #dddddd;
        }
        *[class="mob_100"] {
            width: 100% !important;
        }
        *[class="mob_center"] {
            text-align: center !important;
        }
        *[class="mob_center_bl"] {
            float: none !important;
            display: block !important;
            margin: 0px auto;
        }
        .iage_footer a {
            text-decoration: none;
            color: #929ca8;
        }
        img.mob_display_none {
            width: 0px !important;
            height: 0px !important;
            display: none !important;
        }
        img.mob_width_50 {
            width: 40% !important;
            height: auto !important;
        }
    }
    .table_width_100 {
        width: 680px;
    }

</style>
<div id="mailsub" class="notification" align="center">
    <table width="100%" border="0" cellspacing="0" cellpadding="0" style="min-width: 320px;"><tr><td align="center" bgcolor="#eff3f8">
                <table border="0" cellspacing="0" cellpadding="0" class="table_width_100" width="100%" style="max-width: 680px; min-width: 300px;">
                    <tr>
                        <td>
                        </td>
                    </tr>
                    <tr>
                        <td align="center" bgcolor="#ffffff">
                            <table width="90%" border="0" cellspacing="0" cellpadding="0">
                                <tr>
                                    <td align="center">

                                    </td>
                                    <td align="right"></td>
                                </tr>
                                <tr>
                                    <td align="center" bgcolor="#fbfcfd">
                                        <font face="Arial, Helvetica, sans-serif" size="4" color="#57697e" style="font-size: 15px;">
                                            <table width="90%" border="0" cellspacing="0" cellpadding="0">
                                                <tr>
                                                    <td>
                                                        <div class="row">
                                                            <div class="col-md-8">
                                                                <h2 class="page-header">Comments</h2>
                                                                <section class="comment-list">
                                                                    <!-- First Comment -->
                                                                    <article class="row">
                                                                        <div class="col-md-10 col-sm-10">
                                                                            <div class="panel panel-default">
                                                                                <div class="panel-body">
                                                                                    <header class="text-left">
                                                                                        <div class="comment-user"><i class="fa fa-user"></i> {{$user->name}}</div>
                                                                                        <time class="comment-date" datetime="16-12-2014 01:05"><i class="fa fa-clock-o"></i> {{$user->created_at}}</time>
                                                                                        <div class=""><i class="fa fa-envelope-o" aria-hidden="true"></i>{{$user->email}}</div>
                                                                                    </header>
                                                                                    <div class="comment-post">
                                                                                        <p>
                                                                                            {{$user->body}}
                                                                                        </p>
                                                                                    </div>
                                                                                    <p class="text-right"><a href="#" class="btn btn-default btn-sm"><i class="fa fa-reply"></i> reply</a></p>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </article>
                                                                    <!-- Second Comment Reply -->
                                                                    <!-- Third Comment -->
                                                                </section>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        Dear Candidate,<br/>
                                                        Welcome to Creative Talent Management!<br/>
                                                        We have created an account for you. Here are your details:<br/>
                                                        Name:<br/>
                                                        Email:<br/>
                                                        Organization:<br/>
                                                        Password:<br/>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td align="center">
                                                        <div style="line-height: 24px;">
                                                            <a href="#" target="_blank" class="btn btn-danger block-center">
                                                                click
                                                            </a>
                                                        </div>
                                                        <!-- padding --><div style="height: 60px; line-height: 60px; font-size: 10px;"></div>
                                                    </td>
                                                </tr>
                                            </table>
                                        </font>
                                    </td>
                                </tr>
                                <!--footer -->
                                <!--footer END-->
                                <tr>
                                    <td>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                </table>
    </table>
</div>
