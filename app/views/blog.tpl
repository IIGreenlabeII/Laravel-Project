<div id="blog">

	<div class="blog clickable {% if ondernemen.images.img == empty %}noImage{% endif %}">
		{% if ondernemen.images.img != empty %}
		<div class="image">
			<img src="{{ imgUrl }}/blogs/original/{{ ondernemen.images.img|url_encode }}" alt="{{ ondernemen.title }}" />
		</div>
		{% endif %}
		<div class="text">
			<h2 class="color1">Ondernemen<a href="/blog/ondernemen"></a></h2>
			{{ ondernemen.title }}
			<div class="date">{{ ondernemen.add_date|date('d F Y') }}</div>
		</div>
	</div>
	<div class="blog clickable {% if onderwijzen.images.img == empty %}noImage{% endif %}">
		{% if onderwijzen.images.img != empty %}
		<div class="image">
			<img src="{{ imgUrl }}/blogs/original/{{ onderwijzen.images.img|url_encode }}" alt="{{ onderwijzen.title }}" />
		</div>
		{% endif %}
		<div class="text">
			<h2 class="color2">Onderwijzen<a href="/blog/onderwijzen"></a></h2>
			{{ onderwijzen.title }}
			<div class="date">{{ onderwijzen.add_date|date('d F Y') }}</div>
		</div>
	</div>
	<div class="blog clickable {% if onderzoeken.images.img == empty %}noImage{% endif %}">
		{% if onderzoeken.images.img != empty %}
		<div class="image">
			<img src="{{ imgUrl }}/blogs/original/{{ onderzoeken.images.img|url_encode }}" alt="{{ onderzoeken.title }}" />
		</div>
		{% endif %}
		<div class="text">
			<h2 class="color3">Onderzoeken<a href="/blog/onderzoeken"></a></h2>
			{{ onderzoeken.title }}
			<div class="date">{{ onderzoeken.add_date|date('d F Y') }}</div>
		</div>
	</div>
</div>