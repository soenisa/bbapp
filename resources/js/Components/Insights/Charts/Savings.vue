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
  data: function() {
    return {
      options: {
        chart: {
          id: 'vuechart-example'
        },
        xaxis: {
          categories: [1991, 1992, 1993, 1994, 1995, 1996, 1997, 1998]
        }
      },
      series: [{
        name: 'series-1',
        data: [30, 40, 45, 50, 49, 60, 70, 91]
      }]
    }
  }
}
</script>