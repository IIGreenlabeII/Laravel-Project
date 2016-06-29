{% if category == 'ondernemen' %}
	{% set bgcolor = "bgcolor1" %}
	{% set color = "color1" %}
{% elseif category == 'onderwijzen' %}
	{% set bgcolor = "bgcolor2" %}
	{% set color = "color2" %}
{% else %}
	{% set bgcolor = "bgcolor3" %}
	{% set color = "color3" %}
{% endif %}
<div id="disciplines">
	<ul class="subheader {{ bgcolor }}">
		<li class="left {% if category == 'ondernemen' %}active{% endif %}"><a href="/disciplines/ondernemen">Ondernemen</a></li>
		<li class="middle {% if category == 'onderzoeken' %}active{% endif %}"><a href="/disciplines/onderzoeken">Onderzoeken</a></li>
		<li class="right {% if category == 'onderwijzen' %}active{% endif %}"><a href="/disciplines/onderwijzen">Onderwijzen</a></li>
	</ul>
	<div class="posts">
		<div class="text">
			<div class="post">{{ data.page_content|striptags('<br><p><strong><a>')|replace({'<strong':'<strong class="'~color~'"'})|replace({'<a':'<a class="'~color~'"'})|raw }}</div>
		</div>
	</div>
</div>