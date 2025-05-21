const labels = ["2016", "2017", "2018", "2019", "2020", "2021", "2022"];
    const salesData = [20, 30, 55, 43, 67, 61, 85];
    const revenueData = [95, 120, 170, 130, 190, 180, 270];

    const ctx = document.getElementById("areaChart").getContext("2d");
    const areaChart = new Chart(ctx, {
      type: "line",
      data: {
        labels: labels,
        datasets: [
          {
            label: "Sale",
            data: salesData,
            backgroundColor: "rgba(54, 162, 235, 0.4)",
            borderColor: "rgba(54, 162, 235, 0.8)",
            fill: true,
            tension: 0.4,
            pointRadius: 0
          },
          {
            label: "Revenue",
            data: revenueData,
            backgroundColor: "rgba(75, 192, 192, 0.6)",
            borderColor: "rgba(75, 192, 192, 1)",
            fill: true,
            tension: 0.4,
            pointRadius: 0
          }
        ]
      },
      options: {
        responsive: true,
        plugins: {
          legend: {
            position: "top"
          },
          tooltip: {
            mode: "index",
            intersect: false
          }
        },
        interaction: {
          mode: "nearest",
          axis: "x",
          intersect: false
        },
        scales: {
          y: {
            beginAtZero: true,
            max: 300
          }
        }
      }
    });








