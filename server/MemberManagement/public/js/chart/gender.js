// 性別比
const genderPieChart = (canvas, data) => {
  const userCountSum = data['counts'].reduce(
    (prev, current) => prev + current, 0
  );
  const chart = new Chart(canvas, {
    type: 'pie',
    data: {
      labels: data['labels'],
      datasets: [{
        data: data['counts'],
      }]
    },
    options: {
      title: {
        display: true,
        text: '性別比'
      },
      tooltips: {
        callbacks: {
          label: (tooltipItem, data) => {
            return data.labels[tooltipItem.index]
            + ': '
            + (data.datasets[0].data[tooltipItem.index] / userCountSum * 100).toFixed(1)
            + '% ('
            + data.datasets[0].data[tooltipItem.index]
            + '人)';
          }
        }
      },
      // グラフの色自動設定
      plugins: {
        colorschemes: {
          scheme: 'tableau.ClassicMedium10'
        }
      }
    }
  });
};
