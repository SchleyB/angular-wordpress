

<div id="hero">
    <h1 class="hero-text">
        {{ heroText }}
    </h1>
</div>

<div class="container">

    <div class="row">

        <div class="col-md-9">
            <div>
                <div ng-repeat="d in data">
                    <div>
                        <h3 id="post-title" ng-bind-html="d.title.rendered">{{ d.title.rendered }}</h3>
                        <p id="post-content" ng-bind-html="d.content.rendered">{{ d.content.rendered }}</p>
                    </div>
                </div>
            </div>
        </div>
        <div id="projects" class="col-md-3">
            <div>
                <img src="{{ projectOneImage }}">
                <h4>{{ projectOneHeader }}</h4>
                <p>{{ projectOneText }}</p>
            </div>
            <div>
                <img src="{{ projectTwoImage }}">
                <h4>{{ projectTwoHeader }}</h4>
                <p>{{ projectTwoText }}</p>
            </div>
        </div>

    </div>

</div>


