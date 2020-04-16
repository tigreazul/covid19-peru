
$(document).on("click",".sidebar-toggle",function(){
    $(".wrapper").toggleClass("toggled");
});

$(document).on('ready',function(){
	// fetch('https://covid19.mathdro.id/api')
	// .then(function(response) {
	// 	return response.json();
	// })
	// .then(function(myJson) {
	// 	// $('.confirmado').text(myJson.confirmed.value);
	// 	// $('.recuperado').text(myJson.recovered.value);
	// 	$('.imagen_mundial').attr('src',myJson.image)
		
	// });

	// fetch('https://covid19.mathdro.id/api/countries/PE')
	// .then(function(response) {
	// 	return response.json();
	// })
	// .then(function(data) {
	// 	$('.confirmado_pe').text(data.confirmed.value);
	// 	$('.recuperado_pe').text(data.recovered.value);
	// 	$('.muertes_pe').text(data.deaths.value);
	// });
});


// $('#pais').select2({
// 	ajax: { 
// 		url: "{{ url('paises') }}",
// 		type: "post",
// 		dataType: 'json',
// 		// delay: 250,
// 		data: function (params) {
// 			return {
// 				searchTerm: params.term // search term
// 			};
// 		},
// 		processResults: function (response) {
// 			return {
// 				results: response
// 			};
// 		},
// 		cache: true
// 	}
// });

