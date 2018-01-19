var Metrika = function() {
    var self = this;
    this.selector = $("#metrika-chart");
    this.url = "/metrika";


    // Делает запрос к серверу, получает информацию
    this.getData = function(params, callback) {
        $.ajax({
            url: this.url,
            data: params,
            success: function (data) {
                callback(data);
            }
        });
    };

    // Инициализирует виджет
    this.init = function() {

        if ($(this.selector).hasClass("inited")) return;
        $(this.selector).addClass("inited");
        this.inited = true;

        this.getData({}, function(data) {
            var stat = JSON.parse(data);

             if (stat.code) {
                 unblockUI($("#metrika-widget"));
                return;
            }

            var values = [];
            var labels = [];

            for(var key in stat) {
                values.push(stat[key]);
                labels.push(key);
            }

            self.draw(labels, values);
        })
    };

    this.update = function(params) {
        this.getData(params, function(data) {
            var stat = JSON.parse(data);

            if (stat.code) {
                self.line.destroy();
                unblockUI($("#metrika-widget"));
                return;
            }
            var info = self.parseData(stat);

            self.line.destroy();
            self.draw(info.labels, info.values);
        })
    }

    this.parseData = function(data) {

        var values = [];
        var labels = [];

        for(var key in data) {
            values.push(data[key]);
            labels.push(key);
        }
        return {values: values, labels: labels};
    }

    this.draw = function(labels, values) {

        var lineChartData = {
            labels : labels,
            datasets : [
                {
                    label: "Посещаемость сайта",
                    fillColor : "rgba(49, 157, 181,0.2)",
                    strokeColor : "#319DB5",
                    pointColor : "#319DB5",
                    pointStrokeColor : "#fff",
                    pointHighlightFill : "#fff",
                    pointHighlightStroke : "#319DB5",
                    data : values
                }
            ]
        };
        this.canvas = $(this.selector)[0].getContext("2d");


        this.line = new Chart(this.canvas).Line(lineChartData, {
            responsive: true,
            tooltipCornerRadius: 0,
            maintainAspectRatio: false,

            scaleFontFamily: "'Lato', 'Open Sans', 'Arial', sans-serif",
            tooltipFontFamily: "'Lato', 'Open Sans', 'Arial', sans-serif",
            tooltipTemplate: "<%= value %> уникальных",
        });
        unblockUI($("#metrika-widget"));
    }

};

$(document).ready(function() {
    if (typeof(metrika) == "undefined") {
        metrika = new Metrika();
        metrika.init();
    }

})



