<template>
  <DoughnutChart :chart-data="orderChartOptions" />
</template>
<script setup>
  import axios from 'axios'
  import {onMounted, reactive} from 'vue'
  import { DoughnutChart } from "vue-chart-3";
  import { Chart, registerables } from "chart.js";

  Chart.register(...registerables);

  const orderChartOptions = reactive({
    labels: [],
    datasets: [{
      label: 'Komentar Postingan',
      backgroundColor: ['#9681EB', '#FF6666', '#A2FF86', '#FFD95A', '#068FFF'],
      data: []
    }]
  })

  const baseUrl = process.env.VUE_APP_API_URL
  const getChartData = () => {
    axios.get(`${baseUrl}/api/v2/dashboard`)
    .then((res) => {
      let item = res.data
      for (const key in item) {
        orderChartOptions.labels.push(item[key].judul)
        orderChartOptions.datasets[0].data.push(item[key].koment)
      }
      console.log(res);
    })
    .catch((err) => {
      console.log(err);
    })
  }

  onMounted(() => {
    getChartData()
  })
</script>