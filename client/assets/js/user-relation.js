$(function () {
  "use strict";
  $.ajax({
    url: '../api/admin/user-relation',
    dataType: 'JSON',
    success: res => {
      moment.locale('es');
      $('#lr_business_date').text(
        res.business.join_date ?
        moment(res.business.join_date, 'YYYY-MM-DD hh:mm:ss').fromNow():
        'Aún no hay registros'
      ).attr('title', res.business.join_date);
      $('#lr_business_quantity').text('+' + res.business.last_week);
      $('#lr_clients_date').text(
        res.clients.join_date ?
        moment(res.clients.join_date, 'YYYY-MM-DD hh:mm:ss').fromNow():
        'Aún no hay registros'
      ).attr('title', res.clients.join_date);
      $('#lr_clients_quantity').text('+' + res.clients.last_week);
      $('#lr_marketers_date').text(
        res.marketers.join_date ?
        moment(res.marketers.join_date, 'YYYY-MM-DD hh:mm:ss').fromNow():
        'Aún no hay registros'
      ).attr('title', res.marketers.join_date);
      $('#lr_marketers_quantity').text('+' + res.marketers.last_week);
      var doughnutPieData = {
        datasets: [
          {
            data: [
              res.business.quantity,
              res.clients.quantity,
              res.marketers.quantity
            ],
            backgroundColor: [
              "rgba(255, 99, 132, 0.5)",
              "rgba(54, 162, 235, 0.5)",
              "rgba(255, 206, 86, 0.5)",
              "rgba(75, 192, 192, 0.5)",
              "rgba(153, 102, 255, 0.5)",
              "rgba(255, 159, 64, 0.5)",
            ],
            borderColor: [
              "rgba(255,99,132,1)",
              "rgba(54, 162, 235, 1)",
              "rgba(255, 206, 86, 1)",
              "rgba(75, 192, 192, 1)",
              "rgba(153, 102, 255, 1)",
              "rgba(255, 159, 64, 1)",
            ],
          },
        ],
    
        labels: ["Empresas", "Clientes", "Marketeros"],
      };
      var doughnutPieOptions = {
        responsive: true,
        animation: {
          animateScale: true,
          animateRotate: true,
        },
      };
    
      if ($("#doughnutChart").length) {
        var doughnutChartCanvas = $("#doughnutChart").get(0).getContext("2d");
        var doughnutChart = new Chart(doughnutChartCanvas, {
          type: "doughnut",
          data: doughnutPieData,
          options: doughnutPieOptions,
        });
      }    
    }
  })
});
