var colorcode = {
    chart: {
        DATA_SELECTOR: '#results-data',
        CHART_SELECTOR: '#results-chart',
        NAME_SELECTOR: '#results-name',

        /**
         * Loads Google visualization API.
         */
        load: function() {
            $script('https://www.google.com/jsapi', function() {
                google.load('visualization', '1', {
                    packages: ['corechart'],
                    callback: colorcode.chart.draw
                });
            });
        },
        /**
         * Draws chart.
         */
        draw: function() {
            // context is within callback.
            var self = colorcode.chart;

            var data = jQuery.parseJSON(jQuery(self.DATA_SELECTOR).html()),
                dataTable = google.visualization.arrayToDataTable([
                    ['Color', 'Score'],
                    ['Red', data['Red']],
                    ['Blue', data['Blue']],
                    ['White', data['White']],
                    ['Yellow', data['Yellow']]
                ]),
                chart = new google.visualization.PieChart(jQuery(self.CHART_SELECTOR).get()[0]);

            chart.draw(dataTable, {
                title: 'Detailed results for ' + jQuery(self.NAME_SELECTOR).html(),
                colors: ['red', 'blue', '#F6F6F6', 'yellow'],
                legend: 'none',
                backgroundColor: 'transparent',
                fontSize: 16
            });
        },
        initialize: function() {
            if (jQuery(this.CHART_SELECTOR).length) {
                this.load();
            }
        }
    },
    initialize: function() {
        this.chart.initialize();
    }
};

$script.ready(['jquery', 'bootstrap'], function() {
    jQuery(document).ready(function() {
        colorcode.initialize();
    });
});