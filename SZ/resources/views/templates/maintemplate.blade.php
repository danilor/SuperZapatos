<!DOCTYPE html>
<html lang="en">
@include('templates.blocks.head')
<body>
<div class="container">
    <link rel='stylesheet prefetch' href='http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css'>
    <div class="mail-box">
        <aside class="sm-side sidebar_lg">
            <div class="user-head">
                <a class="inbox-avatar" href="javascript:;">
                    <img  width="64" hieght="60" src="/img/logo.jpg">
                </a>
                <div class="user-name">
                    <h5><a href="/">{{config("app.name")}}</a></h5>
                </div>
            </div>
            <div class="inbox-body">
                <a href="#myModal" data-toggle="modal"  title="{{ "Add Article" }}"    class="btn btn-compose">
                    {{ "Add Article" }}
                </a>
            </div>
            <ul class="inbox-nav inbox-divider">
                <li class="@if( in_array(Request::segment(1),['stores','store'])  ) active @endif">
                    <a href="/stores"><i class="fa fa-building"></i> {{ "Stores"  }}</a>
                </li>
                <li class="@if( in_array(Request::segment(1),['articles','article'])  ) active @endif">
                    <a href="/articles"><i class="fa fa-cubes"></i> {{ "Articles"  }}</a>
                </li>

            </ul>
            <div class="inbox-body text-center">
                <center>
                    <img width="100%" src="/img/dj.png" />
                </center>
            </div>
        </aside>
        <aside class="lg-side">
            <div class="inbox-head">
                <h3>
                    @yield('subtitle')
                </h3>

            </div>
            <div class="inbox-body">
                @yield('content')
            </div>
        </aside>
    </div>

    <div class="col-sm-12 footer_page">
        {{ "Super Shoes. All rights reserved"  }}
    </div>

</div>

@include('templates.blocks.footerJS')
</body>
</html>
