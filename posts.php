<div class="container page">
    
    <h1>Posts</h1>

        <div>
            <div ng-repeat="d in data">
                <div>
                    <h3 ng-bind-html="d.title.rendered">{{ d.title.rendered }}</h3>
                    <p ng-bind-html="d.content.rendered">{{ d.content.rendered }}</p>
                </div>
            </div>
        </div>
    
</div>

