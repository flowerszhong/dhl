<!doctype html>
<!--[if lt IE 7]> <html class="no-js ie6 oldie" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 7]>    <html class="no-js ie7 oldie" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 8]>    <html class="no-js ie8 oldie" <?php language_attributes(); ?>> <![endif]-->
<!--[if gt IE 8]><!--> <html <?php language_attributes(); ?>> <!--<![endif]-->
<head>
 
    <!--=== META TAGS ===-->
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta charset="<?php bloginfo( 'charset' ); ?>" />
    <meta name="description" content="Keywords">
    <meta name="author" content="Name">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
     
    <!--=== LINK TAGS ===-->
    <link rel="shortcut icon" href="<?php echo THEME_DIR; ?>/path/favicon.ico" />
    <link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> RSS2 Feed" href="<?php bloginfo('rss2_url'); ?>" />
    <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
 
    <!--=== TITLE ===-->  
    <title><?php wp_title(); ?> - <?php bloginfo( 'name' ); ?></title>
     
    <!--=== WP_HEAD() ===-->
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
 
<!-- HERE GOES YOUR HEADER MARKUP, LIKE LOGO, MENU, SOCIAL ICONS AND MORE -->
 
<!-- DON'T FORGET TO CLOSE THE BODY TAG ON footer.php FILE -->

<div id="header">
   <div class="container header-container">
       <div id="logo">
            <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home" title="<?php bloginfo( 'name' ) ?>">
            </a>
       </div>
   </div>
   <div>
       <?php echo get_custom_header()->url; ?>
   </div>
</div>

<div id="nav">
    <div class="container nav-container">
         <?php wp_nav_menu( array(
             'theme_location'  =>  'primary',
             'menu_class' => 'dhl-main-nav',
              'menu_id' => 'nav',
             ));
        ?>
    </div>
    
</div>

<?php 
if (is_front_page()) {?>
    
  <div id="banner">
      <div class="container banner-container">
          <ul class="home-slider">
            <?php 
                $titan = TitanFramework::getInstance( 'mytheme' );
                for ($i=0; $i < 7; $i++) { 
                  echo "<li>";
                  $imageID = $titan->getOption( 'home_slider_' . $i );
                    if ( is_numeric( $imageID ) ) {

                        $imageAttachment = wp_get_attachment_image_src( $imageID ,array(1000,300));

                        $imageSrc = $imageAttachment[0];
                        echo "<img src='" . esc_url( $imageSrc ) . "'/>";
                    } 
                  $home_slider_url = $titan->getOption('slider_url_' . $i);
                  echo $home_slider_url;
                  echo "xxxx";
                  var_dump($pic);
                }
             ?>
          </ul>
           
      </div>
  </div>

<?php }?>

<div id="main">
    <div class="container main-container">
        
