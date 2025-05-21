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








var currentStep = 1;
var updateProgressBar;

function displayStep(stepNumber) {
  if (stepNumber >= 1 && stepNumber <= 5) {
    $(".step-" + currentStep).hide();
    $(".step-" + stepNumber).show();
    currentStep = stepNumber;
    updateProgressBar();
  }
}

$(document).ready(function () {
  $('#multi-step-form').find('.step').slice(1).hide();

  $(".next-step").click(function () {
    if (currentStep < 5) {
      $(".step-" + currentStep).addClass("animate__animated animate__fadeOutLeft");
      currentStep++;
      setTimeout(function () {
        $(".step").removeClass("animate__animated animate__fadeOutLeft").hide();
        $(".step-" + currentStep).show().addClass("animate__animated animate__fadeInRight");
        updateProgressBar();
      }, 500);
    }
  });

  $(".prev-step").click(function () {
    if (currentStep > 1) {
      $(".step-" + currentStep).addClass("animate__animated animate__fadeOutRight");
      currentStep--;
      setTimeout(function () {
        $(".step").removeClass("animate__animated animate__fadeOutRight").hide();
        $(".step-" + currentStep).show().addClass("animate__animated animate__fadeInLeft");
        updateProgressBar();
      }, 500);
    }
  });

  updateProgressBar = function () {
    // Set progress width
    var progressPercentage = ((currentStep - 1) / 4) * 100;
    $(".progress-bar").css("width", progressPercentage + "%");

    // Update step-circle background colors
    $(".step-circle").each(function (index) {
      if (index < currentStep) {
        $(this).addClass("bg-success text-white");
      } else {
        $(this).removeClass("bg-success text-white");
      }
    });
  }

  updateProgressBar(); // Initialize on load
});
