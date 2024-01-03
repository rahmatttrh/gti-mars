@extends('layouts.stisla.app-vdr')
@section('title')
    Dashboard
@endsection
@section('content')
<style>
   #chartdiv {
         width: 100%;
         height: 390px;
      }
   #chartdiv2 {
       width: 100%;
       height: 500px;
       max-width: 100%
   }

   #chartdiv3 {
       width: 100%;
       height: 190px;
       max-width: 100%
   }

   #chartdiv4 {
       width: 100%;
       height: 250px;
       max-width: 100%
   }
</style>
   <section class="section">
      <div class="row">
         <div class="col-md-8">
            <div class="card">
               {{-- <div class="card-header">VDR CHART</div> --}}
               <div class="card-body">
                  <div class="form-group">
                     <div class="input-group">
                        <select class="form-control " name="destination" id="destination">
                           <option value="All">All</option>  
                           <option value="Monthly">Monthly</option> 
                        </select>
                        <select class="form-control " name="destination" id="destination">
                           <option value="All Month">All Month</option> 
                           <option value="Januari">Januari</option>  
                           <option value="Februari">Februari</option> 
                           <option value="Maret">Maret</option> 
                           <option value="April">April</option> 
                           <option value="Mei">Mei</option> 
                        </select>
                        <select class="form-control " name="destination" id="destination">
                           <option value="All Vessel">All Vessel</option>  
                           <option value="Februari">Februari</option> 
                           <option value="Maret">Maret</option> 
                           <option value="April">April</option> 
                           <option value="Mei">Mei</option> 
                        </select>
                        <div class="input-group-append">
                           <button class="btn btn-primary  px-4" type="submit">Filter</button>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="card-body">
                  <div id="chartdiv"></div>
               </div>
           </div>
         </div>
         <div class="col-md-4">
            <div class="card">
               
               <div class="card-body">
                  <div id="chartdiv3"></div>
               </div>
               
                  <div class="card-body px-3">
                     <div id="chartdiv4" class=""></div>
                  </div>
              
                
            </div>
        </div>
      </div>
      
     <div class="card mt-3">
         <div class="card-body">
            <div id="chartdiv2"></div>
         </div>
         
     </div>
    
   </section>
@endsection

@push('autorefresh')
<script type="text/javascript">
   window.setTimeout( function() {
       window.location.reload();
   }, 300000);
</script>
@endpush


@push('get_schedules')
<script>
    am5.ready(function() {


        // Create root element
        // https://www.amcharts.com/docs/v5/getting-started/#Root_element
        var root = am5.Root.new("chartdiv");


        // Set themes
        // https://www.amcharts.com/docs/v5/concepts/themes/
        root.setThemes([
            am5themes_Animated.new(root)
        ]);


        // Create chart
        // https://www.amcharts.com/docs/v5/charts/xy-chart/
        var chart = root.container.children.push(am5xy.XYChart.new(root, {
            panX: false,
            panY: false,
            wheelX: "panX",
            wheelY: "zoomX",
            paddingLeft: 0,
            paddingRight: 0,
            layout: root.verticalLayout
        }));

        var colors = chart.get("colors");

        var data = [{
            country: "01 Nov 23",
            visits: 725
        }, {
            country: "02 Nov 23",
            visits: 625
        }, {
            country: "03 Nov 23",
            visits: 602
        }, {
            country: "04 Nov 23",
            visits: 509
        }, {
            country: "05 Nov 23",
            visits: 322
        }, {
            country: "06 Nov 23",
            visits: 214
        }, {
            country: "07 Nov 23",
            visits: 204
        }, {
            country: "08 Nov 23",
            visits: 198
        }, {
            country: "09 Nov 23",
            visits: 165
        }, {
            country: "10 Nov 23",
            visits: 93
        }, {
            country: "11 Nov 23",
            visits: 41
        }];

        prepareParetoData();

        function prepareParetoData() {
            var total = 0;

            for (var i = 0; i < data.length; i++) {
                var value = data[i].visits;
                total += value;
            }

            var sum = 0;
            for (var i = 0; i < data.length; i++) {
                var value = data[i].visits;
                sum += value;
                data[i].pareto = sum / total * 100;
            }
        }



        // Create axes
        // https://www.amcharts.com/docs/v5/charts/xy-chart/axes/
        var xRenderer = am5xy.AxisRendererX.new(root, {
            minGridDistance: 85,
            minorGridEnabled: true
        })

        var xAxis = chart.xAxes.push(am5xy.CategoryAxis.new(root, {
            categoryField: "country",
            renderer: xRenderer
        }));

        xRenderer.grid.template.setAll({
            location: 1
        })

        xRenderer.labels.template.setAll({
            paddingTop: 20
        });

        xAxis.data.setAll(data);

        var yAxis = chart.yAxes.push(am5xy.ValueAxis.new(root, {
            renderer: am5xy.AxisRendererY.new(root, {
                strokeOpacity: 0.1
            })
        }));

        var paretoAxisRenderer = am5xy.AxisRendererY.new(root, {
            opposite: true
        });
        var paretoAxis = chart.yAxes.push(am5xy.ValueAxis.new(root, {
            renderer: paretoAxisRenderer,
            min: 0,
            max: 100,
            strictMinMax: true
        }));

        paretoAxisRenderer.grid.template.set("forceHidden", true);
        paretoAxis.set("numberFormat", "#'%");


        // Add series
        // https://www.amcharts.com/docs/v5/charts/xy-chart/series/
        var series = chart.series.push(am5xy.ColumnSeries.new(root, {
            xAxis: xAxis,
            yAxis: yAxis,
            valueYField: "visits",
            categoryXField: "country"
        }));

        series.columns.template.setAll({
            tooltipText: "{categoryX}: {valueY}",
            tooltipY: 0,
            strokeOpacity: 0,
            cornerRadiusTL: 6,
            cornerRadiusTR: 6
        });

        series.columns.template.adapters.add("fill", function(fill, target) {
            return chart.get("colors").getIndex(series.dataItems.indexOf(target.dataItem));
        })


        // pareto series
        var paretoSeries = chart.series.push(am5xy.LineSeries.new(root, {
            xAxis: xAxis,
            yAxis: paretoAxis,
            valueYField: "pareto",
            categoryXField: "country",
            stroke: root.interfaceColors.get("alternativeBackground"),
            maskBullets: false
        }));

        paretoSeries.bullets.push(function() {
            return am5.Bullet.new(root, {
                locationY: 1,
                sprite: am5.Circle.new(root, {
                    radius: 5,
                    fill: series.get("fill"),
                    stroke: root.interfaceColors.get("alternativeBackground")
                })
            })
        })

        series.data.setAll(data);
        paretoSeries.data.setAll(data);

        // Make stuff animate on load
        // https://www.amcharts.com/docs/v5/concepts/animations/
        series.appear();
        chart.appear(1000, 100);

    }); // end am5.ready()

    // Chart 2
    am5.ready(function() {


        // Create root element
        // https://www.amcharts.com/docs/v5/getting-started/#Root_element
        var root = am5.Root.new("chartdiv2");


        // Set themes
        // https://www.amcharts.com/docs/v5/concepts/themes/
        root.setThemes([
            am5themes_Animated.new(root)
        ]);


        // Create chart
        // https://www.amcharts.com/docs/v5/charts/xy-chart/
        var chart = root.container.children.push(am5xy.XYChart.new(root, {
            panX: true,
            panY: true,
            wheelX: "panX",
            wheelY: "zoomX",
            pinchZoomX: true,
            paddingLeft: 0
        }));


        // Add cursor
        // https://www.amcharts.com/docs/v5/charts/xy-chart/cursor/
        var cursor = chart.set("cursor", am5xy.XYCursor.new(root, {
            behavior: "none"
        }));
        cursor.lineY.set("visible", false);


        // Generate random data
        var date = new Date();
        date.setHours(0, 0, 0, 0);
        var value = 100;

        function generateData() {
            value = Math.round((Math.random() * 10 - 5) + value);
            am5.time.add(date, "day", 1);
            return {
                date: date.getTime(),
                value: value
            };
        }

        function generateDatas(count) {
            var data = [];
            for (var i = 0; i < count; ++i) {
                data.push(generateData());
            }
            return data;
        }


        // Create axes
        // https://www.amcharts.com/docs/v5/charts/xy-chart/axes/
        var xAxis = chart.xAxes.push(am5xy.DateAxis.new(root, {
            maxDeviation: 0.2,
            baseInterval: {
                timeUnit: "day",
                count: 1
            },
            renderer: am5xy.AxisRendererX.new(root, {
                minorGridEnabled: true
            }),
            tooltip: am5.Tooltip.new(root, {})
        }));

        var yAxis = chart.yAxes.push(am5xy.ValueAxis.new(root, {
            renderer: am5xy.AxisRendererY.new(root, {
                pan: "zoom"
            })
        }));


        // Add series
        // https://www.amcharts.com/docs/v5/charts/xy-chart/series/
        var series = chart.series.push(am5xy.LineSeries.new(root, {
            name: "Series",
            xAxis: xAxis,
            yAxis: yAxis,
            valueYField: "value",
            valueXField: "date",
            tooltip: am5.Tooltip.new(root, {
                labelText: "{valueY}"
            })
        }));


        // Add scrollbar
        // https://www.amcharts.com/docs/v5/charts/xy-chart/scrollbars/
        chart.set("scrollbarX", am5.Scrollbar.new(root, {
            orientation: "horizontal"
        }));


        // Set data
        var data = generateDatas(1200);
        series.data.setAll(data);


        // Make stuff animate on load
        // https://www.amcharts.com/docs/v5/concepts/animations/
        series.appear(1000);
        chart.appear(1000, 100);

    }); // end am5.ready()

    // Chart 3
    am5.ready(function() {

        // Create root element
        // https://www.amcharts.com/docs/v5/getting-started/#Root_element
        var root = am5.Root.new("chartdiv3");

        // Set themes
        // https://www.amcharts.com/docs/v5/concepts/themes/
        root.setThemes([
            am5themes_Animated.new(root)
        ]);

        // Create chart
        // https://www.amcharts.com/docs/v5/charts/percent-charts/pie-chart/
        var chart = root.container.children.push(
            am5percent.PieChart.new(root, {
                startAngle: 160,
                endAngle: 380
            })
        );

        // Create series
        // https://www.amcharts.com/docs/v5/charts/percent-charts/pie-chart/#Series

        var series0 = chart.series.push(
            am5percent.PieSeries.new(root, {
                valueField: "litres",
                categoryField: "country",
                startAngle: 160,
                endAngle: 380,
                radius: am5.percent(70),
                innerRadius: am5.percent(65)
            })
        );

        var colorSet = am5.ColorSet.new(root, {
            colors: [series0.get("colors").getIndex(0)],
            passOptions: {
                lightness: -0.05,
                hue: 0
            }
        });

        series0.set("colors", colorSet);

        series0.ticks.template.set("forceHidden", true);
        series0.labels.template.set("forceHidden", true);

        var series1 = chart.series.push(
            am5percent.PieSeries.new(root, {
                startAngle: 160,
                endAngle: 380,
                valueField: "bottles",
                innerRadius: am5.percent(80),
                categoryField: "country"
            })
        );

        series1.ticks.template.set("forceHidden", true);
        series1.labels.template.set("forceHidden", true);

        var label = chart.seriesContainer.children.push(
            am5.Label.new(root, {
                textAlign: "center",
                centerY: am5.p100,
                centerX: am5.p50,
                text: "[fontSize:18px]total[/]:\n[bold fontSize:30px]1647.9[/]"
            })
        );

        var data = [{
                country: "Lithuania",
                litres: 501.9,
                bottles: 1500
            },
            {
                country: "Czech Republic",
                litres: 301.9,
                bottles: 990
            },
            {
                country: "Ireland",
                litres: 201.1,
                bottles: 785
            },
            {
                country: "Germany",
                litres: 165.8,
                bottles: 255
            },
            {
                country: "Australia",
                litres: 139.9,
                bottles: 452
            },
            {
                country: "Austria",
                litres: 128.3,
                bottles: 332
            },
            {
                country: "UK",
                litres: 99,
                bottles: 150
            },
            {
                country: "Belgium",
                litres: 60,
                bottles: 178
            },
            {
                country: "The Netherlands",
                litres: 50,
                bottles: 50
            }
        ];

        // Set data
        // https://www.amcharts.com/docs/v5/charts/percent-charts/pie-chart/#Setting_data
        series0.data.setAll(data);
        series1.data.setAll(data);

    }); // end am5.ready(

    // Chart 4

    am5.ready(function() {

        // Create root and chart
        var root = am5.Root.new("chartdiv4");

        root.setThemes([
            am5themes_Animated.new(root)
        ]);

        var chart = root.container.children.push(
            am5percent.PieChart.new(root, {
                layout: root.verticalLayout
            })
        );

        // Create series
        var series = chart.series.push(
            am5percent.PieSeries.new(root, {
                valueField: "percent",
                categoryField: "type",
                fillField: "color",
                alignLabels: false
            })
        );

        series.slices.template.set("templateField", "sliceSettings");
        series.labels.template.set("radius", 30);

        // Set up click events
        series.slices.template.events.on("click", function(event) {
            console.log(event.target.dataItem.dataContext)
            if (event.target.dataItem.dataContext.id != undefined) {
                selected = event.target.dataItem.dataContext.id;
            } else {
                selected = undefined;
            }
            series.data.setAll(generateChartData());
        });

        // Define data
        var selected;
        var types = [{
            type: "Fossil Energy",
            percent: 70,
            color: series.get("colors").getIndex(0),
            subs: [{
                type: "Oil",
                percent: 15
            }, {
                type: "Coal",
                percent: 35
            }, {
                type: "Nuclear",
                percent: 20
            }]
        }, {
            type: "Green Energy",
            percent: 30,
            color: series.get("colors").getIndex(1),
            subs: [{
                type: "Hydro",
                percent: 15
            }, {
                type: "Wind",
                percent: 10
            }, {
                type: "Other",
                percent: 5
            }]
        }];
        series.data.setAll(generateChartData());


        function generateChartData() {
            var chartData = [];
            for (var i = 0; i < types.length; i++) {
                if (i == selected) {
                    for (var x = 0; x < types[i].subs.length; x++) {
                        chartData.push({
                            type: types[i].subs[x].type,
                            percent: types[i].subs[x].percent,
                            color: types[i].color,
                            pulled: true,
                            sliceSettings: {
                                active: true
                            }
                        });
                    }
                } else {
                    chartData.push({
                        type: types[i].type,
                        percent: types[i].percent,
                        color: types[i].color,
                        id: i
                    });
                }
            }
            return chartData;
        }

    }); // end am5.ready()
</script>
@endpush
