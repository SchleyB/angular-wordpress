<!DOCTYPE html>
<html <?php language_attributes(); ?> ng-app="weatherApp">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SPA Wordpress Theme</title>
    <?php wp_head();?>
    <?php
        $heroText = get_theme_mod('hero_text');

        //Project sections

        $project_one_image = get_theme_mod('project_one_image');
        $project_one_header = get_theme_mod('project_one_header');
        $project_one_text = get_theme_mod('project_one_text');

        $project_two_image = get_theme_mod('project_two_image');
        $project_two_header = get_theme_mod('project_two_header');
        $project_two_text = get_theme_mod('project_two_text');

    ?>
    <script type="text/javascript">
            window.heroText = "<?php echo $heroText; ?>";
            window.projectOneImage = "<?php echo $project_one_image; ?>";
            window.projectOneHeader = "<?php echo $project_one_header; ?>";
            window.projectOneText = "<?php echo $project_one_text; ?>";
            window.projectTwoImage = "<?php echo $project_two_image; ?>";
            window.projectTwoHeader = "<?php echo $project_two_header; ?>";
            window.projectTwoText = "<?php echo $project_two_text; ?>";
            console.log(window.heroText);
    </script>
</head>
<body>


