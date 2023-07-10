<template>
  <DoughnutChart :chart-data="orderChartOptions" />
</template>
<script setup>
  import axios from 'axios'
  import {reactive} from 'vue'
  import { DoughnutChart } from "vue-chart-3";
  import { Chart, registerables } from "chart.js";

  Chart.register(...registerables);

  const orderChartOptions = reactive({
  labels: ['POST 1', 'POST 2', 'POST 3', 'POST 4', 'POST 5'],
    datasets: [{
      label: 'Order Report',
      backgroundColor: ['#068FFF', '#9681EB', '#FF6666', '#A2FF86', '#FFD95A'],
      data: [20,30,10,15,25]
    }
    ]
  })

  const baseUrl = process.env.VUE_APP_API_URL
  const getChartData = () => {
    axios.get(`${baseUrl}/`)
  }
</script>