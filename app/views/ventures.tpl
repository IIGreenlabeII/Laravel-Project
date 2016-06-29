{% if category == 'ondernemen' %}
	{% set bgcolor = "bgcolor1" %}
{% elseif category == 'onderwijzen' %}
	{% set bgcolor = "bgcolor2" %}
{% else %}
	{% set bgcolor = "bgcolor3" %}
{% endif %}
<div id="ventures">
	<ul class="subheader {{ bgcolor }}">
		<li class="left {% if category == 'ondernemen' %}active{% endif %}"><a href="/ventures/ondernemen">Ondernemen</a></li>
		<li class="middle {% if category == 'onderzoeken' %}active{% endif %}"><a href="/ventures/onderzoeken">Onderzoeken</a></li>
		<li class="right {% if category == 'onderwijzen' %}active{% endif %}"><a href="/ventures/onderwijzen">Onderwijzen</a></li>
	</ul>

	<div class="posts">
		{% for venture in ventures %}
			<div class="text">
			<div class="header">{{ venture.naam }}</div>
			<div class="post">{{ venture.about }}</div>
		</div>
		{% endfor %}
	</div>

</div>