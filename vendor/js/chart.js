let title;
let emp;
let months;
let totalEachmonth;
function getData() {
  fetch("controllers/admin/admin.chart.php")
    .then((response) => response.json())
    .then((data) => {
      title = data.dept_name;
      emp = data.dept_emp;
      months = data.request_months;
      total_requests = data.total_requests;
    })
    .catch((error) => console.log(error));
}
setInterval(50, getData());
$(function () {
  // Pie Chart

  var ctx = document.getElementById("pieChart").getContext("2d");
  var pieChart = new Chart(ctx, {
    type: "pie",
    data: {
      labels: title,
      datasets: [
        {
          label: "# of Votes",
          data: emp,
          backgroundColor: [
            "rgba(255, 99, 132, 1)",
            "#3E007C",
            "rgba(255, 206, 86, 1)",
            "rgba(75, 192, 192, 1)",
            "rgba(153, 102, 255, 1)",
            "rgba(255, 159, 64, 1)",
          ],
          borderWidth: 1,
        },
      ],
    },
    options: {
      responsive: true,
      legend: {
        display: false,
      },
    },
  });

  // Line Chart

  var ctx = document.getElementById("lineChart").getContext("2d");
  var lineChart = new Chart(ctx, {
    type: "line",
    data: {
      labels: months,
      datasets: [
        {
          label: "Total Requests",
          data: total_requests,
          fill: false,
          borderColor: "#373651",
          backgroundColor: "#373651",
          borderWidth: 1,
        },
      ],
    },
    options: {
      responsive: true,
      legend: {
        display: false,
      },
    },
  });
});
