<!DOCTYPE html>

<!--[if lt IE 7]> <html class="no-js ie ie6 lt-ie10 lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->

<!--[if IE 7]>    <html class="no-js ie ie7 lt-ie10 lt-ie9 lt-ie8" lang="en"> <![endif]-->

<!--[if IE 8]>    <html class="no-js ie ie8 lt-ie10 lt-ie9" lang="en"> <![endif]-->

<!--[if IE 9]>    <html class="no-js ie ie9 lt-ie10" lang="en"> <![endif]-->

<!--[if gt IE 9]><!-->
<html class="no-js" lang="en">
<!--<![endif]-->

<head>

    <!--[if IE]><![endif]-->
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> ukfitnessevents
    <link rel="shortcut icon" href="https://www.ukfitnessevents.co.uk/sites/all/themes/ukfitnessevents/images/logo-text.png" type="image/png" />
   @yield('head')
    <link rel="canonical" href="https://www.ukfitnessevents.co.uk/" />
    <link rel="shortlink" href="https://www.ukfitnessevents.co.uk/" />
    <meta property="og:type" content="website" />
    
    <meta property="og:description" content="Find the perfect fitness challenges across the UK in 2017. We&#039;ve listed the best running" />
    <meta itemprop="name" content="UK Fitness Challenges &amp; Charity Events" />

    <!--  Mobile viewport optimized: j.mp/bplateviewport -->

    <meta name="viewport" content="initial-scale=1, maximum-scale=1, user-scalable=no" />

    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <title>@yield('title', 'Running, Walking, Triathlons - Discover Your Perfect Event')</title>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->

    <!--[if lt IE 10]>
      <script type='text/javascript' src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
  <![endif]-->
    <link type="text/css" rel="stylesheet" href="{{asset('css/front.css')}}" media="all" />
    <link type="text/css" rel="stylesheet" href="{{asset('css/customfront.css')}}" media="all" />
    <!--<script src="https://apis.google.com/js/platform.js" async defer></script>-->
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-52923202-1"></script>;
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'UA-52923202-1');
    </script>

    <script type="text/javascript">
        (function(i, s, o, g, r, a, m) {
            i["GoogleAnalyticsObject"] = r;
            i[r] = i[r] || function() {
                (i[r].q = i[r].q || []).push(arguments)
            }, i[r].l = 1 * new Date();
        })(window, document, "script", "https://www.google-analytics.com/analytics.js", "ga");
        ga("create", "UA-52923202-1", {
            "cookieDomain": "auto"
        });
        ga("set", "anonymizeIp", true);
        ga("send", "pageview");
    </script>

    <!--<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-57a45555ee68a1de"></script>-->

    <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
    <script>
        (adsbygoogle = window.adsbygoogle || []).push({
            google_ad_client: "ca-pub-7044087809970976",
            enable_page_level_ads: true
        });
    </script>

</head>

<body id="body" class="html {{Request::route('front')? 'front' : 'not-front'}} not-logged-in no-sidebars page-node page-node- page-node-2170 node-type-page anonymous-user">
    <div id="page" class="page">
        @include('fronts.partials.navbar')
        @yield('content')
        @include('fronts.partials.footer')
        <script type="text/javascript" src="{{asset('js/front1.js')}}"></script>
        <script type="text/javascript" src="{{asset('js/front2.js')}}"></script>
        <script type="text/javascript">
            <!--//--><![CDATA[//><!--
            jQuery.extend(Drupal.settings, {
                "basePath": "\/",
                "pathPrefix": "",
                "ajaxPageState": {
                    "theme": "ukfitnessevents",
                    "theme_token": "RIvc6e8NvcJvyzSVJyTBlpqdgwabAT5-9Uq-uUv4was"
                },
                "better_exposed_filters": {
                    "views": {
                        "slider": {
                            "displays": {
                                "block": {
                                    "filters": []
                                }
                            }
                        },
                        "full_width_picture": {
                            "displays": {
                                "block_1": {
                                    "filters": []
                                }
                            }
                        },
                        "popular": {
                            "displays": {
                                "block": {
                                    "filters": []
                                }
                            }
                        },
                        "tickets_for_events": {
                            "displays": {
                                "block": {
                                    "filters": []
                                }
                            }
                        },
                        "featured": {
                            "displays": {
                                "block": {
                                    "filters": []
                                }
                            }
                        },
                        "popular_provider": {
                            "displays": {
                                "block": {
                                    "filters": []
                                }
                            }
                        }
                    }
                },
                "urlIsAjaxTrusted": {
                    "\/": true
                }
            });
            //--><!]]>
        </script>
    </div>
    @yield('js')
</body>

</html>