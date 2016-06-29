{% if category == 'ondernemen' %}
	{% set color = "color1" %}
{% elseif category == 'onderwijzen' %}
	{% set color = "color2" %}
{% else %}
	{% set color = "color3" %}
{% endif %}

{% for blog in blogs %}
	<div class="section">
		{% if blog.image.img != empty %}
			<div class="image">
			<img src="{{ imgUrl }}/blogs/original/{{ blog.image.img }}" alt="{{ blog.title }}"/>
		</div>
		{% endif %}
		<div class="posts">
		<div class="text">
			<div class="header">{{ blog.title|escape }}</div>
			<div class="date">{{ blog.add_date|date('d F Y') }}</div>
			<div class="post">{{ blog.content|striptags('<br><p><a><strong><iframe><img><div>')|raw }}</div>
		</div>

			{% if blog.comments|length > 0 %}
				<div class="reactions">
			<h3 class="subName {{ color }}">Reacties</h3>
					{% for comment in blog.comments %}
						<div class="blogReaction {% if loop.index == 1 %}active{% endif %}">
					<h4>{{ comment.name }}</h4>
							{{ comment.comment }}
				</div>
					{% endfor %}
					{% if blog.comments|length > 1 %}
						<div class="moreReactions date">Nog {{ blog.comments|length - 1 }} reacties weergeven</div>
						<div class="hideReactions date">Verberg reacties</div>
					{% endif %}
		</div>
			{% endif %}

			<div class="addReaction">
			<h3 class="{{ color }}">Reageren</h3>

			<input class="name" type="text" placeholder="Naam"/>
			<br/>
			<input class="email" type="text" placeholder="Email"/>
			<br/>
			<textarea class="reaction" rows="" cols="" placeholder="Uw reactie"></textarea>
			<input class="blog_id" type="hidden" name="blog_id" value="{{ blog.id }}"/>
			<div class="submitReaction">Reactie plaatsen</div>
		</div>
	</div>
</div>
{% endfor %}