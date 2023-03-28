<template>
    <Radar
      id="chart-status"
      :options="chartOptions"
      :data="chartData"
    />
</template>
  
<script>
    import { Radar } from 'vue-chartjs'
    import { Chart as ChartJS, Title, Tooltip, Legend, RadialLinearScale, PointElement, LineElement ,CategoryScale, LinearScale } from 'chart.js'
    
    ChartJS.register(Title, Tooltip, Legend, RadialLinearScale, PointElement, LineElement, CategoryScale, LinearScale)
    
    export default {
        name: 'RadarChart',
        components: { Radar },
        props:{
            chart: {
                type: Object,
                required: true,
                default: () => {
                    return {
                        labels: [],
                        values: []
                    }
                }
            },
        },
        data() {
            return {
                chartData: null,
                chartOptions: {
                    plugins: {
                        legend: {
                        display: false
                        }
                    },
                    responsive: true,
                    maintainAspectRatio: false,
                    scales: {
                        r: {
                            beginAtZero: true,
                            angleLines: {
                                color: "rgba(204, 204, 204, 0.3)"
                            },
                            grid: {
                                color: "rgba(204, 204, 204, 0.3)",
                                borderColor: "rgba(204, 204, 204, 0.3)",
                            },
                            pointLabels: {
                                color: "rgba(204, 204, 204, 1)",
                            },
                            ticks: {
                                color: "rgba(204, 204, 204, 1)",
                                backdropColor: "rgba(255, 255, 255, 0)",
                                stepSize: 20
                            }
                        }
                    }
                },
            }
        },
        created(){
            this.CreateData();
        },

        methods: {
            CreateData() {
                this.chartData = {
                    labels: this.chart.labels,
                    datasets: [
                        {
                            display: false,
                            label: 'Statistics',
                            backgroundColor: 'rgb(78 189 255)',
                            borderColor: 'rgb(78 189 255)', // vorda
                            pointBackgroundColor: 'rgb(0 160 255)',
                            pointBorderColor: 'rgb(0 160 255)',
                            pointHoverBackgroundColor: '#fff',
                            pointHoverBorderColor: '#fff',
                            data: this.chart.values
                        },
                    ]
                };
            },
        },
        watch: {
            chart: {
                handler() {
                    this.CreateData();
                },
                deep: true
            }
        }
    }
</script>