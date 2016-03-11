/**
 * Created by ttt on 11.03.2016.
 */

$('#route_form').on('submit', function(){

	var start = $('input[name=start]', this).val();
	var end = $('input[name=end]', this).val();

	if((start != '') && (end != '') ){
		console.log([start, end]);

		$('#result > *').remove();

		ymaps.route([start, end],
			{ mapStateAutoApply: true }
		).then(function (route) {
				console.log(route.getPaths());

				var moveList = [];

				// Получаем массив путей.
				for (var i = 0; i < route.getPaths().getLength(); i++) {
					way = route.getPaths().get(i);
					segments = way.getSegments();
					for (var j = 0; j < segments.length; j++) {
						var street = segments[j].getStreet();
						moveList.push('Едем ' + segments[j].getHumanAction() +
							(street ? ' на ' + street : '') +
							', проезжаем ' + segments[j].getLength() + ' м.,');
					}
				}

				if(moveList.length > 0){
					moveList.unshift('Трогаемся');
					moveList.push('Прибыли');

					for(i = 0; i < moveList.length; i++){
						$('<li />').text(moveList[i]).appendTo('#result');
					}
				}

				console.log(moveList);
			}
		);

	}

	return false;
})