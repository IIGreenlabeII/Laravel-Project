<?xml version="1.0" encoding="UTF-8"?>

<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">

	{% for uri in uris %}
		<url>
		<loc>{{ uri.url }}</loc>
		<priority>{{ uri.priority|default(0.8) }}</priority>
	</url>
	{% endfor %}

</urlset>