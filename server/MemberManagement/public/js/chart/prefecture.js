// 都道府県ごとの会員分布
const usersEachPrefecturesChart = (canvas, data) => {
  const prefectureChart = new Chart(canvas, {
    type: 'bar',
    data: {
      labels: data['labels'],
      datasets: [{
        data: data['counts'],
      }]
    },
    options: {
      title: {
        display: true,
        text: '都道府県別の分布'
      },
      legend: {
        // 凡例非表示
        display: false
      },
      scales: {
        yAxes: [{
          ticks: {
            // y軸は0開始
            beginAtZero: true
          }
        }],
        xAxes: [{
          ticks: {
            // 軸ラベルスキップしない（全都道府県名表示）
            // autoSkip: false
          }
        }]
      },
      tooltips: {
        callbacks: {
          label: function(tooltipItem, data) {
            return tooltipItem.yLabel + '人';
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
