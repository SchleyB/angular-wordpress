<?php get_header(); ?>

    <header>
        <nav class="navbar navbar-default">
            <div class="container" ng-controller="navController">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="/index.htm">
                        <img id="angularIcon" src="<?php echo get_theme_mod("logo_image"); ?>">
                        <span id="nav-head"><?php echo get_theme_mod("logo_text"); ?></span>
                    </a>
                </div>

                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul ng-repeat="d in data" class="nav navbar-nav navbar-right">
                        <li><a href="#/page/{{ d.id }}">{{ d.title.rendered }}</a></li>
                    </ul>

                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="#"><i class="fa fa-home"></i> Home</a></li>
                        <li><a href="#/posts">Blog</a></li>
                    </ul>
                </div>

            </div>
        </nav>
    </header>



    <div ng-view></div>

<?php get_footer(); ?>
