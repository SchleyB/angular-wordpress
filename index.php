<?php get_header(); ?>

    <header>
        <nav class="navbar navbar-default">
            <div class="container" ng-controller="navController">
                <div class="navbar-header">
                    <a class="navbar-brand" href="/index.htm">Wordpress API</a>
                </div>

                <ul ng-repeat="d in data" class="nav navbar-nav navbar-right">
                    <li><a href="#/page/{{ d.id }}">{{ d.title.rendered }}</a></li>
                </ul>

                <ul class="nav navbar-nav navbar-right">
                    <li><a href="#"><i class="fa fa-home"></i> Home</a></li>
                    <li><a href="#/posts">Blog</a></li>
                </ul>
            </div>
        </nav>
    </header>



    <div ng-view></div>

<?php get_footer(); ?>
