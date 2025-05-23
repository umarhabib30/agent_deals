const months = ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"];

// Get data arrays from the values in monthlyData (converting object to array)
const currentYearData = {
    sales: Object.values(monthlyData.currentYear.sales),
    revenue: Object.values(monthlyData.currentYear.revenue)
};

const lastYearData = {
    sales: Object.values(monthlyData.lastYear.sales),
    revenue: Object.values(monthlyData.lastYear.revenue)
};

const ctx = document.getElementById("areaChart").getContext("2d");
const areaChart = new Chart(ctx, {
    type: "line",
    data: {
        labels: months,
        datasets: [
            {
                label: `${currentYear} Sales`,
                data: currentYearData.sales,
                backgroundColor: "rgba(54, 162, 235, 0.4)",
                borderColor: "rgba(54, 162, 235, 0.8)",
                fill: true,
                tension: 0.4,
                pointRadius: 0
            },
            {
                label: `${lastYear} Sales`,
                data: lastYearData.sales,
                backgroundColor: "rgba(75, 192, 192, 0.4)",
                borderColor: "rgba(75, 192, 192, 0.8)",
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
                intersect: false,
                callbacks: {
                    label: function(context) {
                        let label = context.dataset.label || '';
                        let value = context.parsed.y;

                        // Add revenue data to tooltip
                        if (label.includes(currentYear)) {
                            return [
                                `${currentYear} Sales: ${value}`,
                                `${currentYear} Revenue: ${currentYearData.revenue[context.dataIndex]}`
                            ];
                        } else {
                            return [
                                `${lastYear} Sales: ${value}`,
                                `${lastYear} Revenue: ${lastYearData.revenue[context.dataIndex]}`
                            ];
                        }
                    }
                }
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








