{% if segments.0 == "blog" and segments.1 == 'ondernemen' %}
	{% set bgcolor = "bgcolor1" %}
	{% set headerColor = "headerColor" %}
	{% set menuColor = "lineMenu" %}
	{% set borderColor = "menuBorder" %}
{% elseif segments.0 == "blog" and segments.1 == 'onderwijzen' %}
	{% set bgcolor = "bgcolor2" %}
	{% set headerColor = "headerColor" %}
	{% set menuColor = "lineMenu" %}
	{% set borderColor = "menuBorder" %}
{% elseif segments.0 == "blog" and segments.1 == 'onderzoeken' %}
	{% set bgcolor = "bgcolor3" %}
	{% set headerColor = "headerColor" %}
	{% set menuColor = "lineMenu" %}
	{% set borderColor = "menuBorder" %}
{% else %}
	{% set bgcolor = "" %}
	{% set headerColor = "" %}
{% endif %}

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML+RDFa 1.0//EN" "http://www.w3.org/MarkUp/DTD/xhtml-rdfa-1.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
	<title>{{ pageTitle }} | Viagroep</title>
	<meta name="viewport" content="user-scalable=no, initial-scale=1, maximum-scale=1, minimum-scale=1, minimal-ui"/>
	<meta name="description" content="{{ data.seo_descr }}"/>
	<meta name="keywords" content="{{ data.seo_keywords }}"/>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<meta name="google-site-verification" content="bnSxxDvoHilsaBdTUzNwQQxV6XVmxMigd5lVAAToGPk" />
	<!--Css stylesheets-->
	<link href="/css/app.css" type="text/css" rel="stylesheet"/>
	<link href="/css/blog.css" type="text/css" rel="stylesheet"/>
	<link href="/css/pages.css" type="text/css" rel="stylesheet"/>
	<!--Javascript-->
	<script type="text/javascript" src="/js/jquery-1.11.1.min.js"></script>
	<script type="text/javascript" src="/js/app.js"></script>
	<script type="text/javascript" src="/js/ga.js"></script>
	<!-- START: OPEN GRAPH OBJECT FOR SOCIAL MEDIA -->
	<meta property="og:site_name" content="Viagroep" />
	<meta property="og:title" content="{{ pageTitle }} | Viagroep" />
	<meta property="og:url" content="{{ url_full() }}" />
    <meta property="og:description" content="{{ data.seo_descr }}" />
	<meta property="og:locale" content="nl_NL" />

	<!-- MINUMUM OF 3 IMAGES OF AT LEAST 200x200px -->
	<meta property="og:image" content="http://www.viagroep.nl/userfiles/blogs/original/stopknop.jpg" />
	<meta property="og:image" content="http://www.viagroep.nl/userfiles/blogs/original/iEXA%20kandidaten(1).png" />
	<meta property="og:image" content="http://www.viagroep.nl/userfiles/blogs/original/Communicatie%20compri.jpg" />
	<!-- END: OPEN GRAPH OBJECT FOR SOCIAL MEDIA -->

	<!-- Fav and touch icons -->
    <link rel="icon" href="/favicon.ico" />

	</head>
	<body>
	<div id="loading" class="animate">
		<div class="inner">
			<div class="text color1">ICT</div>
			<div class="text color2">mag wel wat</div>
			<div class="text color3">meer</div>
			<div class="text">Viagroep</div>
		</div>
	</div>
	<div id="app" class="animate">
		<ul id="menu">
			<li class="bold {% if segments.0 == 'blog' and segments.1 == empty %}bgcolorActive{% endif %}">
				<a href="/blog">Blog</a>
			</li>
			<li id="color1" class="item {% if segments.0 == 'blog' and segments.1 == 'ondernemen' %}bgcolor1 headerColor{% endif %}">
				<a href="/blog/ondernemen">Ondernemen</a>
			</li>
			<li id="color2" class="item {% if segments.0 == 'blog' and segments.1 == 'onderwijzen' %}bgcolor2 headerColor{% endif %}">
				<a href="/blog/onderwijzen">Onderwijzen</a>
			</li>
			<li id="color3" class="item {% if segments.0 == 'blog' and segments.1 == 'onderzoeken' %}bgcolor3 headerColor{% endif %}">
				<a href="/blog/onderzoeken">Onderzoeken</a>
			 </li>
			<li class="bold {% if segments.0 == 'about' %}bgcolorActive{% endif %}">
				<a href="/about/about-us">Venture Informatisering Adviesgroep</a>
			</li>
			<li class="{% if segments.0 == 'disciplines' %}bgcolorActive{% endif %}">
				<a href="/disciplines/onderzoeken">Disciplines</a>
			</li>
			<li class="{% if segments.0 == 'ventures' %}bgcolorActive{% endif %}">
				<a href="/ventures/onderzoeken">Ventures</a>
			</li>
			<li class="{% if segments.0 == 'contact' %}bgcolorActive{% endif %}">
				<a href="/contact">Contact</a>
			</li>
		</ul>
		<div id="content">
			<div id="header" class="{{ bgcolor }}">
				<div class="menu {{ borderColor }}">
					<div class="line {{ menuColor }}"></div>
				</div>
				{% if bgcolor != "" %}
					<div class="share {{ headerColor }}">Delen</div>
				{% endif %}
				<div class="{{ headerColor }}">{{ pageTitle }}</div>
			</div>
			<div id="pages">
