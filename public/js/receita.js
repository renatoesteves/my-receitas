
function validar(validateId) {
    getById('dvAlert').innerHTML = '';
    var valid = true;

    if (getValueById('txtTitulo').length < 2) {
        appendHTMLById('dvAlert', '<div class="alert alert-warning">Título inválido. min 2</div>');
        valid = false;
    }

    if (getValueById('txtSlug').length < 3) {
        appendHTMLById('dvAlert', '<div class="alert alert-warning">Slug inválido. min 3</div>');
        valid = false;
    }

    if (getValueById('slCategoria').length <= 0) {
        appendHTMLById('dvAlert', '<div class="alert alert-warning">Categoria inválida.</div>');
        valid = false;
    }
    if (getValueById('txtLinhaFina').length < 10) {
        appendHTMLById('dvAlert', '<div class="alert alert-warning">Linha fina inválida min 10</div>');
        valid = false;
    }

    if (CKEDITOR.instances['txtDescricao'].getData().length < 10) {
        appendHTMLById('dvAlert', '<div class="alert alert-warning">Conteudo inválida.</div>');
    }

    if (validateId && getValueById('txtId') <= 0) {
        appendHTMLById('dvAlert', '<div class="alert alert-warning">ID não encontrado</div>');
        valid = false;
    }

    return valid;
}