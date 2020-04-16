<script src="{{ asset('js/jquery-jvectormap.js') }}"></script>
<script src="{{ asset('js/jvectormap.peru.js') }}"></script>
<link rel="stylesheet" media="all" href="{{ asset('css/jquery-jvectormap.css') }}" />

<div class="modal fade bs-modal-lg" id="custom-modal-0" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog  modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title text-center">Coordinadores Académicos</h4>
            </div>
            <div class="modal-body">
                    <div class="row">
                    <div class="col-md-12 tabla"></div>
                    </div>
                    <div class="row">
                    <div class="col-xs-12 foto" align="center"></div>
                    </div>
            </div>
            <div class="modal-footer"><br />
                <a href="#" class="btn btn-primary" data-dismiss="modal">Cerrar</a><br />
                <br />

            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
<div id="world-map" style="width: 100%; height: 700px;"></div>
<script>
    $(function() {
        $('#world-map').vectorMap({
            map: 'peru',
            backgroundColor: '#b3d1ff',
            showLabels: true,
            showTooltip: false,
            series: {
                regions: [{
                    values: {
                        "c0": "1",
                        "c1": "2"
                    },
                    scale: ['#d9d4ca', '#b3d1ff'],
                    normalizeFunction: 'polynomial'
                }]
            },
            regionStyle: {
                initial: {
                    fill: "#f4f3f0",
                    stroke: "#666666",
                    "stroke-width": 1,
                    "stroke-opacity": 1
                },
                hover: {
                    fill: "#faa432",
                    "fill-opacity": "1"
                }
            },
            labels: {
                regions: {
                    render: function(code) {
                        var show = ['Tacna','Puno','Ica','Apurimac','Lima','Cusco','Arequipa','Amazonas','Callao','Huaraz','Tumbes'];
                        var map = $('#world-map').vectorMap('get', 'mapObject');
                        var name = map.getRegionName(code);
                        if (show.indexOf(name) !== -1) {
                            return name;
                        }
                    }
                }
            },
            onRegionClick: function(event, code) {
                var map = $('#world-map').vectorMap('get', 'mapObject');
                var name = map.getRegionName(code);
                openModal(code);
            }, onRegionTipShow: function (e, label, code) {
                e.preventDefault();
            }
        });

        function openModal(id) {
            var getUrl = window.location;
            baseUrl = getUrl.protocol + "//" + getUrl.host;
            jQuery.post('Coordinador.JSON', function(data) {
                if (data.body[id].length > 0) {
                    jQuery('.tabla').html('');
                    jQuery('.foto').html('');
                    var tableid = data.title.replace(' ', '_');
                    jQuery('.tabla').append("<table class = 'table table-bordered' id = '" + tableid + "'></table><br>");
                    setTableHead(tableid, data);
                    setTableBody(tableid, data, id);
                    $("#custom-modal-0").modal();
                } else {
                    return false;
                }
            });
        }

        function setTableHead(tableid, data) {
            jQuery(".tabla >#" + tableid).append("<thead></thead>");
            var html = '<tr style="background-color: #0088cc; color: white;">';
            jQuery.each(data.header, function(index, value) {
                html += "<th>" + value + "</th>";
            });
            html += "</tr>";
            jQuery(".tabla >#" + tableid + "> thead").html(html);
        }

        function setTableBody(tableid, data, id) {
            jQuery(".tabla >#" + tableid).append("<tbody></tbody>");
            var html = '';
            var img = '';
            jQuery.each(data.body[id], function(index, value) {
                html += '<tr>';
                jQuery.each(value, function(index2, value2) {
                    if(index2 == "Imagen"){	
                        img += '<div class = "col-xs-3"><figure><img src="'+ value2 +'" alt=" '+value2+' " height="150" width="120"> <figcaption> '+ value.Nombres+' </figcaption></figure> <a style="padding-right: 2%;"></a></div>';
                    }else{					
                        html += "<td>" + value2 + "</td>";
                    }
                });
                html += "</tr>";
            });
            jQuery(".tabla > #" + tableid + "> tbody").html(html);
            jQuery(".foto").html(img);
        }
    });
</script>
