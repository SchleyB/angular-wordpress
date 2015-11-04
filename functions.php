<?php

// register AngularJS
wp_register_script('angular-core', 'https://code.angularjs.org/1.3.0-rc.2/angular.js', array(), null, false);
wp_register_script('angular-route', 'https://code.angularjs.org/1.3.0-rc.2/angular-route.min.js', array('angular-core'), null, false);
wp_register_script('angular-sanitize', 'https://code.angularjs.org/1.3.0-rc.2/angular-sanitize.js', array('angular-core'), null, false);
wp_register_script('bootstrap-js', 'https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js', array('jquery'), null, false);
wp_register_script('jquery', 'https://code.jquery.com/jquery-2.1.4.min.js', array(), null, false);


// register our app.js, which has a dependency on angular-core
wp_register_script('angular-app', get_bloginfo('template_directory').'/app.js', array('angular-core', 'angular-route', 'angular-sanitize'), null, false);

//add bootstrap
wp_register_style('bootstrap-css', 'https://bootswatch.com/simplex/bootstrap.min.css');
wp_register_style('style', get_bloginfo('template_directory') . '/style.css', array('bootstrap-css'));
// enqueue all scripts
wp_enqueue_script('angular-core');
wp_enqueue_script('angular-app');
wp_enqueue_style('bootstrap-css');
wp_enqueue_style('style');
wp_enqueue_script('angular-route');
wp_enqueue_script('angular-sanitize');
wp_enqueue_script('bootstrap-js');
wp_enqueue_script('jquery');

//wp_enqueue_script('angular-animate');

// we need to create a JavaScript variable to store our API endpoint...
wp_localize_script( 'angular-core', 'AppAPI', array( 'url' => get_bloginfo('wpurl').'/api/') ); // this is the API address of the JSON API plugin
// ... and useful information such as the theme directory and website url
wp_localize_script( 'angular-core', 'BlogInfo', array( 'url' => get_bloginfo('template_directory').'/', 'site' => get_bloginfo('wpurl')) );

add_action('wp_enqueue_scripts', 'mytheme_enqueue_scripts');

//Create theme settings menu

/*

function theme_settings_page(){

    ?>

    <div class="wrap">
        <h1>SPA Theme Panel</h1>
        <form method="post" action="options.php">
            <?php
                settings_fields("section");
                do_settings_sections("theme-options");
                submit_button();
            ?>
        </form>
    </div>

    <?php

}

function display_hero_text(){
    ?>
        <input type="text" name="hero_text" id="hero_text" value="<?php echo get_option('hero_text'); ?>"/>
    <?php
}

function add_theme_menu_item(){

    add_menu_page("SPA Theme", "SPA Theme", "manage_options", "spa-theme", "theme_settings_page", null, 99);

}

function logo_display(){
    ?>
        <input type="file" name="logo"/>
        <?php echo get_option('logo'); ?>
    <?php
}

function logo_text(){
    ?>
        <input type="text" name="logo_text" id="logo_text" value="<?php echo get_option('logo_text');?>">
    <?php
}

function handle_logo_upload(){
    if(!empty($_FILES["demo-file"]["tmp-name"])){
        $urls = wp_handle_uploads($_FILES["logo"], array('test_form' => FALSE));
        $temp = $urls["url"];
        return $temp;
    }
    return $option;
}

function display_theme_panel_fields(){
    add_settings_section("section", "All Settings", null, "theme-options");
    add_settings_field("hero_text", "Hero Section Text", "display_hero_text", "theme-options", "section");
    add_settings_field("logo", "Logo", "logo_display", "theme-options", "section");
    add_settings_field("logo_text", "Logo Text", "logo_text", "theme-options", "section");

    register_setting("section", "hero_text");
    register_setting("section", "logo", "handle_logo_upload");
    register_setting("setting", "logo_text");
}

add_action("admin_init", "display_theme_panel_fields");
add_action("admin_menu", "add_theme_menu_item");

*/

function spa_customize_register($wp_customize){
    $wp_customize->add_section("main", array(
       "title" => __("Front Page Settings", "customizer_ads_sections"),
        "priority" => 10,
    ));

    $wp_customize->add_setting("hero_text", array(
       "default" => "",
        "transport" => "refresh",
    ));

    $wp_customize->add_setting("logo_text", array(
        "default" => "",
        "transport" => "refresh",
    ));

    $wp_customize->add_setting("logo_image", array(
        "default" => "",
        "transport" => "refresh",
    ));

    //Project Section

    $wp_customize->add_section("projects", array(
        "title" => __("Project Sections", "spa_customizer_sections"),
        "priority" => 20,
    ));

    //Project One

    $wp_customize->add_setting("project_one_image", array(
        "default" => "",
        "transport" => "refresh",
    ));

    $wp_customize->add_setting("project_one_header", array(
        "default" => "Project One",
        "transport" => "refresh",
    ));

    $wp_customize->add_setting("project_one_text", array(
        "default" => "This is the Project One Text",
        "transport" => "refresh",
    ));

    //Project Two

    $wp_customize->add_setting("project_two_image", array(
        "default" => "",
        "transport" => "refresh",
    ));

    $wp_customize->add_setting("project_two_header", array(
        "default" => "Project Two",
        "transport" => "refresh",
    ));

    $wp_customize->add_setting("project_two_text", array(
        "default" => "This is the Project One Text",
        "transport" => "refresh",
    ));

    //add_controls

    $wp_customize->add_control(new WP_Customize_Control(
        $wp_customize,
        "hero_text",
        array(
            "label" => __("Hero Text", "customizer_ads_code_label"),
            "section" => "main",
            "settings" => "hero_text",
            "type" => "text_area",
        )
    ));

    $wp_customize->add_control(new WP_Customize_Control(
        $wp_customize,
        "logo_text",
        array(
            "label" => __("Logo Text", "customizer_ads_code_label"),
            "section" => "main",
            "settings" => "logo_text",
            "type" => "text_area",
        )
    ));

    $wp_customize->add_control(new WP_Customize_Image_Control(
        $wp_customize,
        "logo_image",
        array(
            "label" => __("Upload logo Image", "customizer_ads_code_label"),
            "section" => "main",
            "settings" => "logo_image",
        )
    ));

    //Project Controls

    $wp_customize->add_control(new WP_Customize_Image_Control(
        $wp_customize,
        "project_one_image",
        array(
            "label" => __("Project One Image", "spa_customizer_sections"),
            "section" => "projects",
            "settings" => "project_one_image",
        )
    ));

    $wp_customize->add_control(new WP_Customize_Control(
        $wp_customize,
        "project_one_header",
        array(
            "label" => __("Project One Header", "spa_customizer_sections"),
            "section" => "projects",
            "settings" => "project_one_header",
        )
    ));

    $wp_customize->add_control(new WP_Customize_Control(
        $wp_customize,
        "project_one_text",
        array(
            "label" => __("Project One Text", "spa_customizer_sections"),
            "section" => "projects",
            "settings" => "project_one_text",
        )
    ));

    $wp_customize->add_control(new WP_Customize_Image_Control(
        $wp_customize,
        "project_two_image",
        array(
            "label" => __("Project Two Image", "spa_customizer_sections"),
            "section" => "projects",
            "settings" => "project_two_image",
        )
    ));

    $wp_customize->add_control(new WP_Customize_Control(
        $wp_customize,
        "project_two_header",
        array(
            "label" => __("Project Two Header", "spa_customizer_sections"),
            "section" => "projects",
            "settings" => "project_two_header",
        )
    ));

    $wp_customize->add_control(new WP_Customize_Control(
        $wp_customize,
        "project_two_text",
        array(
            "label" => __("Project Two Text", "spa_customizer_sections"),
            "section" => "projects",
            "settings" => "project_two_text",
        )
    ));

}

add_action("customize_register", "spa_customize_register");

?>
