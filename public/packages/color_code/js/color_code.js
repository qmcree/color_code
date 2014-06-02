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
                    callback: colorcode.chart.draw()
                });
            }, 2000);
        },
        /**
         * Draws chart.
         */
        draw: function() {
            var data = jQuery(this.DATA_SELECTOR).html().parseJSON().toArray(),
                dataTable = google.visualization.arrayToDataTable(data),
                chart = new google.visualization.PieChart(jQuery(this.CHART_SELECTOR).get()[0]);

            chart.draw(dataTable, {
                title: 'Detailed results for ' + jQuery(this.NAME_SELECTOR).html()
            });
        },
        initialize: function() {
            var self = this;

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