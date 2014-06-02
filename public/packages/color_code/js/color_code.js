var colorcode = {
    chart: {
        DATA_SELECTOR: '#results-data',
        CHART_SELECTOR: '#results-chart',
        NAME_SELECTOR: '#results-name',

        /**
         * Loads Google visualization API.
         */
        load: function() {
            setTimeout(function() {
                google.load('visualization', '1', {
                    packages: ['corechart'],
                    callback: colorcode.chart.draw
                });
            }, 2000);
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
                    ['Red', 50]
                ]),
                chart = new google.visualization.PieChart(jQuery(self.CHART_SELECTOR).get()[0]);

            chart.draw(dataTable, {
                title: 'Detailed results for ' + jQuery(self.NAME_SELECTOR).html()
            });
        },
        initialize: function() {
            if (jQuery(this.CHART_SELECTOR)) {
                this.load();
            }
        }
    },
    initialize: function() {
        this.chart.initialize();
    }
};

jQuery(document).ready(function() {
    colorcode.initialize();
});