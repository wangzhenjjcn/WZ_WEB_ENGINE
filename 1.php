<!doctype html>
<!--[if IE 9]> <html class="ie9 no-js" lang="{{ shop.locale }}"> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--> <html class="no-js" lang="{{ shop.locale }}"> <!--<![endif]-->
<head>
  <meta charset="utf-8">
  <!--<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">-->
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <meta name="theme-color" content="{{ settings.color_button }}">
  <link rel="canonical" href="{{ canonical_url }}">

  {% if settings.favicon != blank %}
    <link rel="shortcut icon" href="{{ settings.favicon | img_url: '16x16' }}" type="image/png">
  {% endif %}

  {% capture seo_title %}
    {{ page_title }}
    {% if current_tags %}
      {%- assign meta_tags = current_tags | join: ', ' %} &ndash; {{ 'general.meta.tags' | t: tags: meta_tags -}}
    {% endif %}
    {% if current_page != 1 %}
      &ndash; {{ 'general.meta.page' | t: page: current_page }}
    {% endif %}
    {% unless page_title contains shop.name %}
      &ndash; {{ shop.name }}
    {% endunless %}
  {% endcapture %}
  <title>{{ seo_title }}</title>

  {% if page_description %}
    <meta name="description" content="{{ page_description | escape }}">
  {% endif %}

  {% include 'social-meta-tags' %}

  <!--{{ 'theme.scss.css' | asset_url | stylesheet_tag }}-->
  {% include 'google-fonts' %}

  <script>
    var theme = {
      strings: {
        addToCart: {{ 'products.product.add_to_cart' | t | json }},
        soldOut: {{ 'products.product.sold_out' | t | json }},
        unavailable: {{ 'products.product.unavailable_html' | t | json }}
      },
      moneyFormat: {{ shop.money_format | json }}
    }
  </script>

  <!--[if (lte IE 9) ]>{{ 'match-media.min.js' | asset_url | script_tag }}<![endif]-->

  
  <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  
  {% if settings.heading_font contains 'Google' %}
  <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family={{ settings.heading_font | remove: 'Google+' }}:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i">
  {% endif %}
  {% if settings.base_font contains 'Google' %}
  <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family={{ settings.base_font | remove: 'Google+' }}:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i">
  {% endif %}
  {% if settings.misc_font contains 'Google' %}
  <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family={{ settings.misc_font | remove: 'Google+' }}:300,400,500,600,700">
  {% endif %}
  
  
  {{ '//maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css' | stylesheet_tag }}  
  {{ '//maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css' | stylesheet_tag }}
  
  {{ '//cdnjs.cloudflare.com/ajax/libs/jquery.isotope/2.2.0/isotope.pkgd.min.js' | script_tag }}
  {{ 'imagesloaded.pkgd.min.js' | asset_url | script_tag }}
  
  {{ 'social-buttons.scss.css' | asset_url | stylesheet_tag }}
   
  {{ 'cs-sarahmarket.styles.scss.css' | asset_url | stylesheet_tag }}  
  {{ 'owl.carousel.css' | asset_url | stylesheet_tag }}
  {{ 'cs.animate.css' | asset_url | stylesheet_tag }}
  {{ 'slideshow_fade.css' | asset_url | stylesheet_tag }}
  
  {{ content_for_header }}
  
  {{ '//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js' | script_tag }}
  {{ 'modernizr.min.js' | asset_url | script_tag }}
  {% if page.handle contains 'lookbook' %}
  {{ 'jquery.fancybox.scss.css' | asset_url | stylesheet_tag }}
  {% endif %}
  {{ 'option_selection.js' | shopify_asset_url | script_tag }}
  {{ 'api.jquery.js' | shopify_asset_url | script_tag }}
  
  {% if template contains 'customers' %}
    <!--[if (gt IE 9)|!(IE)]><!--><script src="{{ 'shopify_common.js' | shopify_asset_url }}" defer="defer"></script><!--<![endif]-->
    <!--[if lte IE 9]><script src="{{ 'shopify_common.js' | shopify_asset_url }}"></script><![endif]-->
  	{{ 'customer_area.js'  | shopify_asset_url | script_tag }}
  {% endif %}
  
  <!--[if (gt IE 9)|!(IE)]><!--><script src="{{ 'vendor.js' | asset_url }}" defer="defer"></script><!--<![endif]-->
  <!--[if lte IE 9]><script src="{{ 'vendor.js' | asset_url }}"></script><![endif]-->

  <!--[if (gt IE 9)|!(IE)]><!--><script src="{{ 'theme.js' | asset_url }}" defer="defer"></script><!--<![endif]-->
  <!--[if lte IE 9]><script src="{{ 'theme.js' | asset_url }}"></script><![endif]-->
  
  {{ '//maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js' | script_tag }}
  {{ '//cdnjs.cloudflare.com/ajax/libs/jquery.isotope/2.2.0/isotope.pkgd.min.js' | script_tag }}
  {{ 'jquery.touchSwipe.min.js' | asset_url | script_tag }}
  
  {% if template contains 'index' %}
  {{ 'bxslider.css' | asset_url | stylesheet_tag }}
  {{ 'bxslider.js' | asset_url | script_tag }}
  {% endif %}
  
  {{ 'owl.carousel.min.js' | asset_url | script_tag }}
  
  {{ 'jquery.scrollbar.css' | asset_url | stylesheet_tag }}
  {{ 'jquery.scrollbar.min.js' | asset_url | script_tag }}
  
  
  {% include 'disable-right-click' %}
</head>

<body class="{% if template == "index" %}index-template{% endif %} {% if customer %}loggedin{% endif %} sarahmarket_3" >

  {% if settings.mailing_list_active %}
  {% include 'newsletter_popup' %}  
  {% endif %}
  {% if settings.general_loadingscreen %}
  <!-- Preloading -->
  <div id="loader-div">
    <div id="loader-wrapper">
      <div class="loading-div-logo">
        <div id="loader"><img src="{{'ring.svg' | asset_url}}" alt="loading svg" /></div>
      </div>      
    </div>    
  </div>
  {% endif %}
  
  <!-- Header -->
  <header id="top" class="header clearfix">
    {% section 'theme-header' %}  
    {% include 'disable-right-click' %}
</header>
  <div class="fix-sticky"></div>

  <!-- Main Content -->
  <div class="page-container" id="PageContainer">
    <main class="main-content" id="MainContent" role="main">
      {{ content_for_layout }}
      {% if template contains 'product' or template == 'collection' %}
        {% section 'index-collection-product' %}
      {% endif %}
    </main>
  </div>
  
  <!-- Footer -->
  <footer class="footer">
    {% section 'theme-footer' %} 
  </footer>
  
  <!-- Float right icon -->
  <div class="float-right-icon">
    <ul>
      <li>
        {% if settings.general_gototop %}
        <div id="scroll-to-top" data-toggle="" data-placement="left" title="Scroll to Top" class="off">
          <i class="fa fa-angle-up"></i>
        </div>
        {% endif %} 
      </li>
    </ul>
  </div>
  
  <script type="text/javascript">
    var qs_quantity = '';
    var cart_money_format={{ shop.money_format | strip_html | json }};
    var quickShop_money_format="<span class='money'>"+{{ shop.money_format | strip_html | json }}+"</span>";
    
  </script>
  
  {% if template contains 'article' or template contains 'product' %}
      {{ 'social-buttons.js' | asset_url | script_tag }}
  {% endif %}
  
  
  {{ 'jquery.fancybox.js' | asset_url | script_tag }}
  {{ 'modernizr.js' | asset_url | script_tag }}
  {{ 'classie.js' | asset_url | script_tag }}
  {{ 'scripts.js' | asset_url | script_tag }}
  {{ 'jquery.flexslider.min.js' | asset_url | script_tag }}
  <!-- zoom img product -->
  {{ 'jquery.zoom.min.js' | asset_url | script_tag }}
  <!---->
  {{ 'cs-sarahmarket.script.js' | asset_url | script_tag }}
  {{ 'cs-sarahmarket.cart.js' | asset_url | script_tag }}
  {{ 'cs-sarahmarket.optionSelect.js' | asset_url | script_tag }}
  {{ 'jquery.currencies.min.js' | asset_url | script_tag }}
  
  {% include 'quick-shop' %}
  {% include 'currencies' %}
  {% include 'ajax-cart' %}
  {% include 'light-box' %}
  
  
  {{ 'linkOptionSelectors.js' | asset_url | script_tag }}
  
  
</body>
</html>
