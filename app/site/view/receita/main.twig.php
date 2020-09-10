{% extends "partials/body.twig.php" %}

{%block title%} Home - Receitas {%endblock%}

{% block body %}
<h1> Receitas </h1>
<a href="{{BASE}}receita/adicionar/" class="btn btn-primary">Nova Categoria</a>
<hr>
<div class="overflow-auto">
    <table class="table table-hover">
        <thead>
            <tr>
                <th>#ID</th>
                <th>Nome</th>
                <th>Slug</th>
            </tr>
        </thead>
        <tbody>
            {% for categoria in listaCategoria %}
            <tr>
                <td>{{categoria.id}}</td>
                <td>{{categoria.titulo}}</td>
                <td>{{categoria.slug}}</td>
                <td>
                    <a href="{{BASE}}receita/editar/{{categoria.id}}" class="btn btn-warning">Editar</a>
                </td>
            </tr>
            {% endfor %}
        </tbody>
    </table>

</div>
{% endblock %}