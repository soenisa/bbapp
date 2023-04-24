<template>
    <div>
      <VueApexCharts width="500" type="line" :options="options" :series="series"></VueApexCharts>
    </div>
</template>

<script>
import { filter } from "../../Transactions/filter.js"
import VueApexCharts from "vue3-apexcharts";

export default {
  name: "Savings",
  components: {
    VueApexCharts
  },
  mounted: function() {
    this.getInsights();
  },
  data: function() {
    return {
      options: {
        // width: "100%",
        chart: {
          id: 'vuechart-example'
        },
        xaxis: {
            type: "datetime"
        }
      },
      series: [{
        name: 'series-1',
        data: []
      }]
    }
  },
  methods: {
    fillChart: function() {

    },
    getInsights: function() {
            filter.fromDate = this.fromDate;
            filter.toDate = this.toDate;
            axios.get(route('insights.savings'), {
                params: {
                    fromDate: filter.fromDate,
                    toDate: filter.toDate
                }
            })
            .then(response => {
                console.log(response);
                this.series = [{
                    name: 'series-1',
                    data: response.data
                }]
            });
        },
  }
}
</script>