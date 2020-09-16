{% extends "partials/body.twig.php" %}

{%block title%} Editar Categoria - Receitas {%endblock%}

{% block body %}
<h1> Editar Categoria </h1>

<hr>
<form action="{{BASE}}categoria/alterar/{{categoriaId}}" onsubmit="return validar(true);" method="post">
    <div class="row">
        <div class="col-md-6">
            <label for="txtTitulo">Titulo</label>
            <input type="hidden" value="{{categoriaId}}" id="txtId">
            <input type="text" id="txtTitulo" name="txtTitulo" class="form-control" placeholder="Titulo aqui" value="{{categoria.titulo}}">
        </div>

        <div class="col-md-6">
            <label for="txtSlug">Slug</label>
            <input type="text" id="txtSlug" name="txtSlug" class="form-control" placeholder="Slug aqui" value="{{categoria.slug}}">
        </div>
            
    </div>

    <div class="row mt-3">
        <div class="col-md-10">
            <div id="dvAlert">
                <div class="alert alert-info">Preencha corretamente todos os campos.</div>
            </div>
        </div>


        <div class="col-md-2 text-right">
            <input type="submit" value="Alterar" class="btn btn-success w-100">
        </div>

    </div>

</form>
<script src="{{BASE}}js/categoria.js"></script>
{% endblock %}