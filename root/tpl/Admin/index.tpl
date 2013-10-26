{% extends 'index.html.twig' %}

{% block title %}Администраторская часть{% endblock %}

{% block pageHeader %}Администраторская часть{% endblock %}

{% block css %}
    {{ parent() }}
    <link rel="stylesheet" href="/web/css/admin_style.css">
{% endblock %}

{% block pageContent %}
    {% include 'Admin/admin.top_panel.html.twig' %}
{% endblock %}
