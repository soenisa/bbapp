<template>
  <div>
    <CCardTitle>{{ this.name }}</CCardTitle>
    <VueApexCharts width="500" type="line" :options="options" :series="series"></VueApexCharts>
  </div>
</template>

<script>
import { filter } from "../../Transactions/filter.js"
import VueApexCharts from "vue3-apexcharts";
import formatHelper from "@/Helpers/formatHelper.js";

export default {
  name: "InsightChart",
  mixins: [formatHelper],
  props: {
    name: String,
    insightType: String,
    chartOptions: Object
  },
  components: {
    VueApexCharts
  },
  mounted: function () {
    this.getInsights();
    // this.options = {
    //   ...this.options,
    //   ...this.chartOptions
    // };
    console.log(this.options);
  },
  data: function () {
    return {
      options: {
        chart: {
          id: 'vuechart-' + this.insightType,
          height: 280,
        },
        xaxis: {
          type: "datetime"
        },
        yaxis: {
          labels: {
            formatter: this.formatFunction
          },
        },
        fill: {
          type: "gradient",
          gradient: {
            type: "vertical",
            shade: 'light',
            // gradientToColors: 'blue',
            // gradientFromColors: 'red',
            shadeIntensity: 1,
            opacityFrom: 0.7,
            opacityTo: 0.9,
            stops: [0, 90, 100]
          }
        },
      },
      series: [{
        name: 'series-1',
        data: []
      }]
    }
  },
  methods: {
    formatFunction:  function (value) {
          return this.formatAmount(value);
    },
    getInsights: function () {
      filter.fromDate = this.fromDate;
      filter.toDate = this.toDate;
      axios.get(route('insights.' + this.insightType), {
        params: {
          fromDate: filter.fromDate,
          toDate: filter.toDate
        }
      })
        .then(response => {
          this.series = [{
            name: 'series-1',
            type: 'area',
            data: response.data
          }];
        });
    },
  }
}
</script>