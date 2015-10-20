var processedResponse = {};
var data;
jQuery.post("/ajax.php",
    {
        action:"getChartJSData"
    },
    function(payload)
    {
        var response = jQuery.parseJSON(payload);

        for (var teamID in response) {
            var team = response[teamID].teamName;
            processedResponse[team] = [];
            for( category in response[teamID].teamData) {
                processedResponse[team][category] = response[teamID].teamData[category].totalCategoryPercentage;
            }
        }

        data = {
            labels: ["Culture and Organization", "Design and Architecture", "Build and Deploy", "Test and Verification", "Information and Reporting"],
            datasets: [
                {
                    label: "Frontend",
                    fillColor: "rgba(220,110,110,0.2)",
                    strokeColor: "rgba(220,220,220,1)",
                    pointColor: "rgba(220,110,110,1)",
                    pointStrokeColor: "#fff",
                    pointHighlightFill: "#fff",
                    pointHighlightStroke: "rgba(220,220,220,1)",
                    data: [
                        processedResponse["Frontend"]["culture"],
                        processedResponse["Frontend"]["architecture"],
                        processedResponse["Frontend"]["pipeline"],
                        processedResponse["Frontend"]["quality"],
                        processedResponse["Frontend"]["reporting"]
                    ]
                },
                {
                    label: "Backend",
                    fillColor: "rgba(220,220,110,0.2)",
                    strokeColor: "rgba(220,220,220,1)",
                    pointColor: "rgba(220,220,110,1)",
                    pointStrokeColor: "#fff",
                    pointHighlightFill: "#fff",
                    pointHighlightStroke: "rgba(220,220,220,1)",
                    data: [
                        processedResponse["Backend"]["culture"],
                        processedResponse["Backend"]["architecture"],
                        processedResponse["Backend"]["pipeline"],
                        processedResponse["Backend"]["quality"],
                        processedResponse["Backend"]["reporting"]
                    ]
                },
                {
                    label: "PlantandNPI",
                    fillColor: "rgba(110,220,220,0.2)",
                    strokeColor: "rgba(220,220,220,1)",
                    pointColor: "rgba(110,220,220,1)",
                    pointStrokeColor: "#fff",
                    pointHighlightFill: "#fff",
                    pointHighlightStroke: "rgba(220,220,220,1)",
                    data: [
                        processedResponse["PlantandNPI"]["culture"],
                        processedResponse["PlantandNPI"]["architecture"],
                        processedResponse["PlantandNPI"]["pipeline"],
                        processedResponse["PlantandNPI"]["quality"],
                        processedResponse["PlantandNPI"]["reporting"]
                    ]
                },
                {
                    label: "IARC",
                    fillColor: "rgba(110,110,220,0.2)",
                    strokeColor: "rgba(220,220,220,1)",
                    pointColor: "rgba(110,110,220,1)",
                    pointStrokeColor: "#fff",
                    pointHighlightFill: "#fff",
                    pointHighlightStroke: "rgba(220,220,220,1)",
                    data: [
                        processedResponse["IARC"]["culture"],
                        processedResponse["IARC"]["architecture"],
                        processedResponse["IARC"]["pipeline"],
                        processedResponse["IARC"]["quality"],
                        processedResponse["IARC"]["reporting"]
                    ]
                },
                {
                    label: "EOPS",
                    fillColor: "rgba(110,55,110,0.2)",
                    strokeColor: "rgba(220,220,220,1)",
                    pointColor: "rgba(110,55,110,1)",
                    pointStrokeColor: "#fff",
                    pointHighlightFill: "#fff",
                    pointHighlightStroke: "rgba(220,220,220,1)",
                    data: [
                        processedResponse["EOPS"]["culture"],
                        processedResponse["EOPS"]["architecture"],
                        processedResponse["EOPS"]["pipeline"],
                        processedResponse["EOPS"]["quality"],
                        processedResponse["EOPS"]["reporting"]
                    ]
                },
                {
                    label: "CET",
                    fillColor: "rgba(55,110,220,0.2)",
                    strokeColor: "rgba(220,220,220,1)",
                    pointColor: "rgba(55,110,220,1)",
                    pointStrokeColor: "#fff",
                    pointHighlightFill: "#fff",
                    pointHighlightStroke: "rgba(220,220,220,1)",
                    data: [
                        processedResponse["CET"]["culture"],
                        processedResponse["CET"]["architecture"],
                        processedResponse["CET"]["pipeline"],
                        processedResponse["CET"]["quality"],
                        processedResponse["CET"]["reporting"]
                    ]
                },
                {
                    label: "OET",
                    fillColor: "rgba(55,220, 55,0.2)",
                    strokeColor: "rgba(220,220,220,1)",
                    pointColor: "rgba(55,220, 55,1)",
                    pointStrokeColor: "#fff",
                    pointHighlightFill: "#fff",
                    pointHighlightStroke: "rgba(220,220,220,1)",
                    data: [
                        processedResponse["OET"]["culture"],
                        processedResponse["OET"]["architecture"],
                        processedResponse["OET"]["pipeline"],
                        processedResponse["OET"]["quality"],
                        processedResponse["OET"]["reporting"]
                    ]
                },
                {
                    label: "Integration",
                    fillColor: "rgba(440,55,220,0.2)",
                    strokeColor: "rgba(220,220,220,1)",
                    pointColor: "rgba(440,55,220,1)",
                    pointStrokeColor: "#fff",
                    pointHighlightFill: "#fff",
                    pointHighlightStroke: "rgba(220,220,220,1)",
                    data: [
                        processedResponse["Integration"]["culture"],
                        processedResponse["Integration"]["architecture"],
                        processedResponse["Integration"]["pipeline"],
                        processedResponse["Integration"]["quality"],
                        processedResponse["Integration"]["reporting"]
                    ]
                },
                {
                    label: "Manhattan",
                    fillColor: "rgba(220,220,220,0.2)",
                    strokeColor: "rgba(220,220,220,1)",
                    pointColor: "rgba(220,220,220,1)",
                    pointStrokeColor: "#fff",
                    pointHighlightFill: "#fff",
                    pointHighlightStroke: "rgba(220,220,220,1)",
                    data: [
                        processedResponse["Manhattan"]["culture"],
                        processedResponse["Manhattan"]["architecture"],
                        processedResponse["Manhattan"]["pipeline"],
                        processedResponse["Manhattan"]["quality"],
                        processedResponse["Manhattan"]["reporting"]
                    ]
                }
            ]
        };
        var options = {};
        var ctx = document.getElementById("myChart").getContext("2d");
        var myRadarChart = new Chart(ctx).Radar(data, options);

        for(var index in data.datasets)
        {
            var teamData = {
                labels: ["Culture and Organization", "Design and Architecture", "Build and Deploy", "Test and Verification", "Information and Reporting"],
                datasets: [
                    data.datasets[index]
                ]
            };
            var teamOptions = {
                legendTemplate:'<ul class="<%=name.toLow...l%>'+ data.datasets[index].label +'<%}%>'+ data.datasets[index].label +'</li><%}%></ul>',
                multiTooltipTemplate:"<%=value%>" + data.datasets[index].label,
                scaleOverride:true,
                scaleStartValue: 0,
                scaleStepWidth: 10,
                scaleSteps:10

            };
            var teamIndex = parseInt(index) + 1;
            var teamCtx = document.getElementById("team" + teamIndex).getContext("2d");
            var teamChart = new Chart(teamCtx).Radar(teamData, teamOptions);

            console.log(teamChart.options);
        }
});
