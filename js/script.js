function excluir(tipo) {
    var result = confirm("Excluir " + tipo + "?");
    if (result) {
        $('body').LoadingOverlay("show");
    }
    return result;
}
