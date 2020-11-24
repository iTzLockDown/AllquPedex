
$("#tipoanimal").change(event => {
    $.get(`../listaraza/${event.target.value}`, function(res, sta){
        $("#cboraza").empty();

        $("#cboraza").append(`<option> Seleccione una opcion </option>`);
        res.forEach(element => {
            $("#cboraza").append(`<option value=${element.id}> ${element.raza} </option>`);
        });
    });
    $.get(`../listapadre/${event.target.value}`, function(res, sta){
        $("#padre").empty();

        $("#padre").append(`<option value="0"> Seleccione una opcion </option>`);
        res.forEach(element => {
            $("#padre").append(`<option value=${element.id}>(${element.criadero})  ${element.nombre} </option>`);
        });
    });
    $.get(`../listamadre/${event.target.value}`, function(res, sta){
        $("#madre").empty();

        $("#madre").append(`<option value="0"> Seleccione una opcion </option>`);
        res.forEach(element => {
            $("#madre").append(`<option value=${element.id}>(${element.criadero})  ${element.nombre} </option>`);
        });
    });
});
