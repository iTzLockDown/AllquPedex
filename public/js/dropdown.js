$("#tipoanimal").change(event => {
	$.get(`listaraza/${event.target.value}`, function(res, sta){
		$("#cboraza").empty();

        $("#cboraza").append(`<option> Seleccione una opcion </option>`);
		res.forEach(element => {
			$("#cboraza").append(`<option value=${element.id}> ${element.raza} </option>`);
		});
	});
    $.get(`listapadre/${event.target.value}`, function(res, sta){
        $("#padre").empty();

        $("#padre").append(`<option value="0"> Seleccione una opcion </option>`);
        res.forEach(element => {
            $("#padre").append(`<option value=${element.id}>(${element.criadero}) ${element.nombre} </option>`);
        });
    });
    $.get(`listamadre/${event.target.value}`, function(res, sta){
        $("#madre").empty();

        $("#madre").append(`<option value="0"> Seleccione una opcion </option>`);
        res.forEach(element => {
            $("#madre").append(`<option value=${element.id}>(${element.criadero}) ${element.nombre} </option>`);
        });
    });
});


// $("#provincia").change(event => {
//     $.get(`distritos/${event.target.value}`, function(res, sta){
//         $("#distrito").empty();
//         $("#distrito").append(`<option> Seleccione una opcion </option>`);
//
//         res.forEach(element => {
//             $("#distrito").append(`<option value=${element.id}> ${element.name} </option>`);
//         });
//     });
// });
$("[data-background]").each(function () {
    $(this).css("background-image", "url(" + $(this).attr("data-background") + ")")
});
