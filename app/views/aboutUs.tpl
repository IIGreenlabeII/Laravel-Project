<div id="about">
	<ul class="subheader">
		<li class="{% if category == 'about-us' %}active{% endif %}"><a href="/about/about-us">Over ons</a></li>
		<li class="{% if category == 'activiteiten' %}active{% endif %}"><a href="/about/activiteiten">Activiteiten</a></li>
	</ul>
	<div class="posts">
		<div class="text">
			<div class="header">{{ about.page_title|striptags('<i>')|raw }}</div>
			<div class="post">{{ about.page_content|striptags('<i>')|raw }}</div>
		</div>
	</div>
</div>