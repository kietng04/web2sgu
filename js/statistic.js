var xValues = ['1', '2', '3', '4', '5', '6', '7', '8', '9', '10', '11', '12', '13', '14', '15', '16', '17', '18', '19', '20', '21', '22', '23', '24', '25', '26', '27', '28', '29', '30'];
var yValues = ['100', '200', '100', '150'];
// var labelz = `Doanh thu tháng 1/2023 (${money.vnd(filterOrderbyBrand("all", 1).sumMonth)}, chiếm ${(filterOrderbyBrand("all", 1).sumMonth / getTotalMoneyAllOrder()).toFixed(2)}%)`;
renderChart();
function renderChart() {
  var existingChart = Chart.getChart("myChart"); 
  if (existingChart) {
    existingChart.destroy(); 
  }
new Chart("myChart", {
  type: "line",
  data: {
    labels: xValues,
    datasets: [{
      label: "labelz",
      fill: false,
      backgroundColor: "rgba(0,0,255,1.0)",
      borderColor: "rgba(0,0,255,0.3)",
      data: yValues
    }]
  },
});
}