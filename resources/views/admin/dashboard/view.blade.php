<x-admin-layout title="{{ $title }}">
    <!-- begin:: css local -->
    @push('css')
    <style>
        .chartdiv {
            width: 100%;
            height: 500px;
        }
    </style>
    @endpush
    <!-- end:: css local -->

    <section id="dashboard-ecommerce">
        <div class="row match-height">
            <div class="col-12">
                <div class="card card-statistics">
                    <div class="card-header">
                        <h4 class="card-title">Statistics</h4>
                    </div>
                    <div class="card-body statistics-body">
                        <div class="row">
                            <div class="col-sm-6 col-xl-6 mb-2 mb-xl-6">
                                <div class="d-flex flex-row">
                                    <div class="text-success align-self-center">
                                        <i data-feather="users" style="width: 48px; height: 48px;"></i>
                                    </div>
                                    <div class="ms-2 flex-grow-1">
                                        <h6 class="mb-0">Guru</h6>
                                        <h3 class="mt-1 mb-1">{{ $count_guru }}</h3>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-xl-6 mb-2 mb-xl-6">
                                <div class="d-flex flex-row">
                                    <div class="text-primary align-self-center">
                                        <i data-feather="users" style="width: 48px; height: 48px;"></i>
                                    </div>
                                    <div class="ms-2 flex-grow-1">
                                        <h6 class="mb-0">Staff</h6>
                                        <h3 class="mt-1 mb-1">{{ $count_staff }}</h3>
                                    </div>
                                </div>
                            </div>
                            @if (count($informasi) > 0)
                            @foreach ($informasi as $row)
                            <div class="col-sm-6 col-xl-6 mb-2 mb-xl-6">
                                <div class="d-flex flex-row">
                                    <div class="align-self-center">
                                        <i data-feather="folder" style="width: 48px; height: 48px;"></i>
                                    </div>
                                    <div class="ms-2 flex-grow-1">
                                        <h6 class="mb-0">{{ $row->nama }}</h6>
                                        <h3 class="mt-1 mb-1">{{ count($row->toInformasi) }}</h3>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Statistik Pengunjung Per Hari</h4>
                    </div>
                    <div class="card-body">
                        <div class="chartdiv" id="div-chart-count-visitors-day"></div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Statistik Pengunjung Per Bulan</h4>
                    </div>
                    <div class="card-body">
                        <div class="chartdiv" id="div-chart-count-visitors-month"></div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Statistik Demografis Pengunjung</h4>
                    </div>
                    <div class="card-body">
                        <div class="chartdiv" id="div-chart-count-visitors-loc"></div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- begin:: js local -->
    @push('js')
    <script src="https://cdn.amcharts.com/lib/5/index.js"></script>
    <script src="https://cdn.amcharts.com/lib/5/xy.js"></script>
    <script src="https://cdn.amcharts.com/lib/5/percent.js"></script>
    <script src="https://cdn.amcharts.com/lib/5/themes/Animated.js"></script>

    <script>
        am5.ready(function() {
            $.get("{{ route('dashboard.count_visitors_day') }}", function(response) {
                chartCountVisitorsDay(response);
            });

            $.get("{{ route('dashboard.count_visitors_mon') }}", function(response) {
                chartCountVisitorsMonth(response);
            });

            $.get("{{ route('dashboard.count_visitors_loc') }}", function(response) {
                chartCountVisitorsLoc(response);
            });
        });

        function chartCountVisitorsDay(response) {
            var root = am5.Root.new("div-chart-count-visitors-day");

            root.setThemes([
                am5themes_Animated.new(root)
            ]);

            var chart = root.container.children.push(am5xy.XYChart.new(root, {
                panX: true,
                panY: true,
                wheelX: "panX",
                wheelY: "zoomX",
                pinchZoomX: true
            }));

            var cursor = chart.set("cursor", am5xy.XYCursor.new(root, {}));
            cursor.lineY.set("visible", false);

            var xRenderer = am5xy.AxisRendererX.new(root, {
                minGridDistance: 30
            });

            xRenderer.labels.template.setAll({
                rotation: -70,
                centerY: am5.p50,
                centerX: am5.p100,
                paddingRight: 15
            });

            xRenderer.grid.template.setAll({
                location: 1
            });

            var xAxis = chart.xAxes.push(am5xy.CategoryAxis.new(root, {
                maxDeviation: 0.3,
                categoryField: "key",
                renderer: xRenderer,
                tooltip: am5.Tooltip.new(root, {})
            }));

            var yAxis = chart.yAxes.push(am5xy.ValueAxis.new(root, {
                maxDeviation: 0.3,
                renderer: am5xy.AxisRendererY.new(root, {
                    strokeOpacity: 0.1
                })
            }));

            var series = chart.series.push(am5xy.ColumnSeries.new(root, {
                name: "Series",
                xAxis: xAxis,
                yAxis: yAxis,
                valueYField: "value",
                sequencedInterpolation: true,
                categoryXField: "key",
                tooltip: am5.Tooltip.new(root, {
                    labelText: "{valueY}"
                })
            }));

            series.columns.template.setAll({
                cornerRadiusTL: 5,
                cornerRadiusTR: 5,
                strokeOpacity: 0
            });

            series.columns.template.adapters.add("fill", function(fill, target) {
                return chart.get("colors").getIndex(series.columns.indexOf(target));
            });

            series.columns.template.adapters.add("stroke", function(stroke, target) {
                return chart.get("colors").getIndex(series.columns.indexOf(target));
            });

            xAxis.data.setAll(response);
            series.data.setAll(response);

            series.appear(1000);
            chart.appear(1000, 100);
        }

        function chartCountVisitorsMonth(response) {
            var root = am5.Root.new("div-chart-count-visitors-month");

            root.setThemes([
                am5themes_Animated.new(root)
            ]);

            var chart = root.container.children.push(am5xy.XYChart.new(root, {
                panX: true,
                panY: true,
                wheelX: "panX",
                wheelY: "zoomX",
                pinchZoomX: true
            }));

            var cursor = chart.set("cursor", am5xy.XYCursor.new(root, {}));
            cursor.lineY.set("visible", false);

            var xRenderer = am5xy.AxisRendererX.new(root, {
                minGridDistance: 30
            });

            xRenderer.labels.template.setAll({
                rotation: -70,
                centerY: am5.p50,
                centerX: am5.p100,
                paddingRight: 15
            });

            xRenderer.grid.template.setAll({
                location: 1
            });

            var xAxis = chart.xAxes.push(am5xy.CategoryAxis.new(root, {
                maxDeviation: 0.3,
                categoryField: "key",
                renderer: xRenderer,
                tooltip: am5.Tooltip.new(root, {})
            }));

            var yAxis = chart.yAxes.push(am5xy.ValueAxis.new(root, {
                maxDeviation: 0.3,
                renderer: am5xy.AxisRendererY.new(root, {
                    strokeOpacity: 0.1
                })
            }));

            var series = chart.series.push(am5xy.ColumnSeries.new(root, {
                name: "Series",
                xAxis: xAxis,
                yAxis: yAxis,
                valueYField: "value",
                sequencedInterpolation: true,
                categoryXField: "key",
                tooltip: am5.Tooltip.new(root, {
                    labelText: "{valueY}"
                })
            }));

            series.columns.template.setAll({
                cornerRadiusTL: 5,
                cornerRadiusTR: 5,
                strokeOpacity: 0
            });

            series.columns.template.adapters.add("fill", function(fill, target) {
                return chart.get("colors").getIndex(series.columns.indexOf(target));
            });

            series.columns.template.adapters.add("stroke", function(stroke, target) {
                return chart.get("colors").getIndex(series.columns.indexOf(target));
            });

            xAxis.data.setAll(response);
            series.data.setAll(response);

            series.appear(1000);
            chart.appear(1000, 100);
        }

        function chartCountVisitorsLoc(response) {
            var root = am5.Root.new("div-chart-count-visitors-loc");

            root.setThemes([
                am5themes_Animated.new(root)
            ]);

            var chart = root.container.children.push(am5xy.XYChart.new(root, {
                panX: true,
                panY: true,
                wheelX: "panX",
                wheelY: "zoomX",
                pinchZoomX: true
            }));

            var cursor = chart.set("cursor", am5xy.XYCursor.new(root, {}));
            cursor.lineY.set("visible", false);

            var xRenderer = am5xy.AxisRendererX.new(root, {
                minGridDistance: 30
            });

            xRenderer.labels.template.setAll({
                rotation: -70,
                centerY: am5.p50,
                centerX: am5.p100,
                paddingRight: 15
            });

            xRenderer.grid.template.setAll({
                location: 1
            });

            var xAxis = chart.xAxes.push(am5xy.CategoryAxis.new(root, {
                maxDeviation: 0.3,
                categoryField: "key",
                renderer: xRenderer,
                tooltip: am5.Tooltip.new(root, {})
            }));

            var yAxis = chart.yAxes.push(am5xy.ValueAxis.new(root, {
                maxDeviation: 0.3,
                renderer: am5xy.AxisRendererY.new(root, {
                    strokeOpacity: 0.1
                })
            }));

            var series = chart.series.push(am5xy.ColumnSeries.new(root, {
                name: "Series",
                xAxis: xAxis,
                yAxis: yAxis,
                valueYField: "value",
                sequencedInterpolation: true,
                categoryXField: "key",
                tooltip: am5.Tooltip.new(root, {
                    labelText: "{valueY}"
                })
            }));

            series.columns.template.setAll({
                cornerRadiusTL: 5,
                cornerRadiusTR: 5,
                strokeOpacity: 0
            });

            series.columns.template.adapters.add("fill", function(fill, target) {
                return chart.get("colors").getIndex(series.columns.indexOf(target));
            });

            series.columns.template.adapters.add("stroke", function(stroke, target) {
                return chart.get("colors").getIndex(series.columns.indexOf(target));
            });

            xAxis.data.setAll(response);
            series.data.setAll(response);

            series.appear(1000);
            chart.appear(1000, 100);
        }
    </script>
    @endpush
    <!-- end:: js local -->
</x-admin-layout>