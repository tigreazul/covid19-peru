<script>
		$('#pais').select2();
		$('#pais').val('PE');
		$('#pais').trigger('change');

		window.onload = function () {
			var chart = new CanvasJS.Chart("confirmados", {
				title:{
					text: ""
				},
				axisY:[{
					title: "Cantidad",
					lineColor: "#428bca",
					tickColor: "#428bca",
					labelFontColor: "#428bca",
					titleFontColor: "#428bca",
					// suffix: "k"
				}],
				toolTip: {
					shared: true
				},
				legend: {
					cursor: "pointer",
					itemclick: toggleDataSeries
				},
				data: [
				{
					type: "line",
					name: "Confirmados",
					color: "#428bca",
					showInLegend: true,
					// axisYIndex: 1,
					dataPoints: [
						<?php foreach($datos['confirma'] as $confrm): ?>
							{ x: new Date(<?php echo $confrm['anio'] ?>, <?php echo $confrm['mes']-1 ?>, <?php echo $confrm['dia'] ?>), y: <?php echo $confrm['cantidad'] ?> },
						<?php endforeach; ?>
					]
				},{
					type: "line",
					name: "Proyección",
					color: "#a0a0a0",
					showInLegend: true,
					// axisYIndex: 1,
					dataPoints: [
						<?php foreach($pConfirmados as $vConfirm): ?>
							{ x: new Date(<?php echo explode('/',$vConfirm->fecha)[0] ?>, <?php echo explode('/',$vConfirm->fecha)[1]-1 ?>, <?php echo explode('/',$vConfirm->fecha)[2] ?>), y: <?php echo $vConfirm->cantidad ?> },
						<?php endforeach; ?>
					]
				}]
			});
            chart.render();
            
            var recuper = new CanvasJS.Chart("recuperados", {
				title:{
					text: ""
				},
				axisY:[{
					title: "Cantidad",
					lineColor: "#3c763d",
					tickColor: "#3c763d",
					labelFontColor: "#3c763d",
					titleFontColor: "#3c763d",
					// suffix: "k"
				}],
				toolTip: {
					shared: true
				},
				legend: {
					cursor: "pointer",
					itemclick: toggleDataSeries
				},
				data: [
				{
					type: "line",
					name: "Recuperados",
					color: "#3c763d",
					// axisYIndex: 0,
					showInLegend: true,
					dataPoints: [
						<?php foreach($datos['recuperado'] as $confrm): ?>
							{ x: new Date(<?php echo $confrm['anio'] ?>, <?php echo $confrm['mes'] ?>, <?php echo $confrm['dia'] ?>), y: <?php echo $confrm['cantidad'] ?> },
						<?php endforeach; ?>
					]
				}]
			});
            recuper.render();
            
            var muertes = new CanvasJS.Chart("muertes", {
				title:{
					text: " "
				},
				axisY:[{
					title: "Cantidad",
					lineColor: "#C24642",
					tickColor: "#C24642",
					labelFontColor: "#C24642",
					titleFontColor: "#C24642",
					// suffix: "k"
				}],
				toolTip: {
					shared: true
				},
				legend: {
					cursor: "pointer",
					itemclick: toggleDataSeries
				},
				data: [
				{
					type: "line",
					name: "Recuperados",
					color: "#a94442",
					// axisYIndex: 0,
					showInLegend: true,
					dataPoints: [
						<?php foreach($datos['muerte'] as $confrm): ?>
							{ x: new Date(<?php echo $confrm['anio'] ?>, <?php echo $confrm['mes'] ?>, <?php echo $confrm['dia'] ?>), y: <?php echo $confrm['cantidad'] ?> },
						<?php endforeach; ?>
					]
				}]
			});
			muertes.render();

			function toggleDataSeries(e) {
				if (typeof (e.dataSeries.visible) === "undefined" || e.dataSeries.visible) {
					e.dataSeries.visible = false;
				} else {
					e.dataSeries.visible = true;
				}
				e.chart.render();
			}
		}

	</script>