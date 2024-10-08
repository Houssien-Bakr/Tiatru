<!DOCTYPE php>
<html lang="<?php echo ACTIVE_LANG; ?>" dir="rtl">

<head>
    <link rel="stylesheet" href="https://cdn.fluidplayer.com/v2/current/fluidplayer.min.css" type="text/css">
    <script src="<?php echo APP; ?>/public/assets/js/playerjs.js" type="text/javascript"></script>
    <meta charset="UTF-8">
    <link rel="manifest" href="/manifest.json">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <script src="https://hCaptcha.com/1/api.js" async></script>
    <script>
        $(document).ready(function () {
            // This will fire when document is ready:
            $(window).resize(function () {
                // This will fire each time the window is resized:
                if ($(window).width() >= 1024) {
                    // if larger or equal
                    $('.element').show();
                } else {
                    // if smaller
                    $(window).scroll(function () {

                        if ($(this).scrollTop() > 0) {
                            $('.fadein_out').fadeOut();
                        }
                        else {
                            $('.fadein_out').fadeIn();
                        }
                    });
                }
            }).resize(); // This will simulate a resize to trigger the initial run.
        });
    </script>
    <?php if (get($Settings, 'data.slidingmenu', 'navigation') == 1) { ?>
        <script>
            $(function () {
                var contentToggle = 0;
                $('.app-navbar').on('click', function () {
                    if (contentToggle == 0) {
                        $('.app-container').animate({
                            width: '80%'
                        })
                        contentToggle = 1;
                    }
                    else if (contentToggle == 1) {
                        $('.app-container').animate({
                            width: '100%'
                        })
                        contentToggle = 0;
                    }
                })
            })
            $(function () {
                var contentToggle = 0;
                $('.app-navbar').on('click', function () {
                    if (contentToggle == 0) {
                        $('.hide-me').animate({
                            width: '20%'
                        })
                        contentToggle = 1;
                    }
                    else if (contentToggle == 1) {
                        $('.hide-me').animate({
                            width: '0%'
                        })
                        contentToggle = 0;
                    }
                })
            })
        </script>
    <?php }
    ; ?>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="<?php echo $Config['description']; ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="index,follow" />
    <meta name="theme-color" content="#000">
    <meta name="HandheldFriendly" content="True">
    <meta http-equiv="cleartype" content="on">
    <?php if ($Config['url']) { ?>
        <link rel="canonical" href="<?php echo "https://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]" ?>">
    <?php } ?>
    <link rel="dns-prefetch" href="//fonts.googleapis.com" />
    <link rel="dns-prefetch" href="//ajax.googleapis.com" />
    <link rel="dns-prefetch" href="//fonts.googleapis.com" />
    <link rel="dns-prefetch" href="//fonts.gstatic.com" />
    <link rel="dns-prefetch" href="//code.jquery.com" />
    <link rel="dns-prefetch" href="//cdnjs.cloudflare.com" />
    <?php if (empty(get($Settings, 'data.darktheme', 'theme'))) { ?>
        <link as="style" media="all" rel="stylesheet preload prefetch" href="<?php echo THEME . '/css/app.css'; ?>"
            type="text/css" crossorigin="anonymous" />
    <?php } ?>
    <?php if (get($Settings, 'data.darktheme', 'theme') == 1) { ?>
        <link as="style" media="all" rel="stylesheet preload prefetch" href="<?php echo THEME . '/css/app.css'; ?>"
            type="text/css" crossorigin="anonymous" />
    <?php } ?>
    <?php if (get($Settings, 'data.lighttheme', 'theme') == 1) { ?>
        <link as="style" media="all" rel="stylesheet preload prefetch" href="<?php echo THEME . '/css/light.css'; ?>"
            type="text/css" crossorigin="anonymous" />
    <?php } ?>
    <?php if (get($Settings, 'data.purpletheme', 'theme') == 1) { ?>
        <link as="style" media="all" rel="stylesheet preload prefetch" href="<?php echo THEME . '/css/purple.css'; ?>"
            type="text/css" crossorigin="anonymous" />
    <?php } ?>
    <link rel="preload" href="<?php echo ASSETS . '/webfonts/inter/Inter-Regular.woff2'; ?>" as="font"
        crossorigin="anonymous" />
    <link rel="preload" href="<?php echo ASSETS . '/webfonts/inter/Inter-Medium.woff2'; ?>" as="font"
        crossorigin="anonymous" />
    <link rel="preload" href="<?php echo ASSETS . '/webfonts/inter/Inter-SemiBold.woff2'; ?>" as="font"
        crossorigin="anonymous" />
    <link rel="preload" href="<?php echo ASSETS . '/webfonts/inter/Inter-Bold.woff2'; ?>" as="font"
        crossorigin="anonymous" />
    <link rel="preload" href="<?php echo ASSETS . '/webfonts/inter/Inter-Black.woff2'; ?>" as="font"
        crossorigin="anonymous" />
    <script type="text/javascript">
        var _URL = "<?= APP ?>";
        var _ASSETS = "<?= APP . '/public/assets' ?>";
        <?php if ($AuthUser['id']) { ?>
            var _Auth = true;
        <?php } else { ?>
            var _Auth = false;
        <?php } ?>
        var __ = function (msgid) {
            return window.i18n[msgid] || msgid;
        };
        window.i18n = {
            'No comments yet': '<?php echo __("No comments yet"); ?>',
            'You must sign in': '<?php echo __("You must sign in"); ?>',
            'Follow': '<?php echo __("Follow"); ?>',
            'Following': '<?php echo __("Following"); ?>',
            'Show more': '<?php echo __("Show more"); ?>',
            'Show less': '<?php echo __("Show less"); ?>',
            'no results': '<?php echo __("no results"); ?>',
            'Results': '<?php echo __("Results"); ?>',
            'Comment': '<?php echo __("Comment"); ?>',
            'Actors': '<?php echo __("Actors"); ?>',
        };
        <?php if (get($Settings, 'data.onesignal_id', 'api')) { ?>
            var OneSignal = window.OneSignal || [];
            OneSignal.push(["init", {
                appId: '<?php echo get($Settings, "data.onesignal_id", "api"); ?>',
                autoRegister: true
            }]);
            var OneSignal = window.OneSignal || [];
            if (OneSignal.installServiceWorker) {
                OneSignal.installServiceWorker();
            } else {
                if (navigator.serviceWorker) {
                    navigator.serviceWorker.register('<?php echo APP . "/OneSignalSDKWorker.js?appId=" . get($Settings, "data.onesignal_id", "api"); ?>');
                }
            }
        <?php } ?>
    </script>
    <style type="text/css">
        :root {
            --theme-color:
                <?php echo ($_COOKIE['--theme-color'] ? $_COOKIE['--theme-color'] : get($Settings, "data.general", "theme"));
                ?>
            ;
            --button-color:
                <?php echo ($_COOKIE['--button-color'] ? $_COOKIE['--button-color'] : get($Settings, "data.button", "theme"));
                ?>
            ;
            --background-color:
                <?php echo ($_COOKIE['--background-color'] ? urldecode($_COOKIE['--background-color']) : get($Settings, "data.background", "theme"));
                ?>
            ;
        }
    </style>
    <?php echo get($Settings, 'data.headcode', 'general'); ?>
    <?php if ($Config['share'] == true) { ?>
        <meta property="og:site_name" content="<?php echo APP; ?>">
        <meta property="og:url" content="<?php echo "https://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]" ?>">
        <meta property="og:type" content="<?php echo $Config['ogtype']; ?>">
        <meta property="og:title" content="<?php echo $Config['title']; ?>">
        <meta property="og:description" content="<?php echo $Config['description']; ?>">
        <?php if ($Config['image']) { ?>
            <meta property="og:image" content="<?php echo $Config['image']; ?>">
        <?php } ?>
        <meta name="twitter:card" content="summary">
        <?php if (get($Settings, "data.twitter", "social")) { ?>
            <meta name="twitter:site" content="@<?php echo get($Settings, " data.twitter", "social"); ?>">
        <?php } ?>
        <meta name="twitter:title" content="<?php echo $Config['title']; ?>">
        <meta name="twitter:url" content="<?php echo $Config['url']; ?>">
        <meta name="twitter:description" content="<?php echo $Config['description']; ?>">
        <?php if ($Config['image']) { ?>
            <meta name="twitter:image" content="<?php echo $Config['image']; ?>" />
        <?php } ?>
    <?php } ?>
    <link rel="shortcut icon"
        href="<?php echo LOCAL . '/' . get($Settings, 'data.favicon', 'general') . '?v=' . VERSION; ?>">
    <script type="application/ld+json">
        {
              "@context": "https://schema.org",
              "@type": "WebSite",
              "url": "<?php echo APP; ?>",
              "potentialAction": {
                "@type": "SearchAction",
                "target": "<?php echo APP; ?>/search/{search_term_string}",
                "query-input": "required name=search_term_string"
              }
        }
 </script>
    <title>
        <?php echo $Config['title']; ?>
    </title>
</head>

<body>
    <a class="skip-link d-none" href="#maincontent">Skip</a>