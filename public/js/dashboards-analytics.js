/**
 * Dashboard Analytics
 */

'use strict';

(function () {
  let cardColor, headingColor, axisColor, shadeColor, borderColor;
  cardColor = config.colors.white;
  headingColor = config.colors.headingColor;
  axisColor = config.colors.axisColor;
  borderColor = config.colors.borderColor;

  //chart refresh--------------------
  var url = 'http://127.0.0.1:8000/admin/analytics';
  $.getJSON(url, (response) => {
  console.log(response);
  var analytics=response;
  //sales years
  var salesPresentYear=analytics['salesPresentYear'].map( (item) => item.total);
  var salesLastYear=analytics['salesLastYear'].map( (item) => item.total);
    totalRevenueChart.updateOptions({
      series: [{
        name :analytics['lastYear'] ,
        data: salesLastYear
      },{
        name:analytics['presentYear'],
        data: salesPresentYear,
      }]  
    });

    //orders last 6 days
    var ordersChartLabel=analytics['ordersLast6'].map((item)=>item.dias);
    var ordersChartData=analytics['ordersLast6'].map((item)=>item.pedidos);
    profileReportChart.updateOptions({
      series: [{
        name: analytics['presentYear'],
        data: ordersChartData
      }],
      xaxis: {
        categories: ordersChartLabel
      },
    });

    //salescategories
    var salesCatlabel=analytics['salesCategories'].map((item)=>item.name);
    var salesCatData=analytics['salesCategories'].map((item)=> parseInt(item.total))
    incomeChart.updateOptions({
      series: salesCatData,
      labels: salesCatlabel
    });
  });
  //-----------------------------------------------------


  // Total Revenue Report Chart - Bar Chart
  // --------------------------------------------------------------------
  const totalRevenueChartEl = document.querySelector('#totalRevenueChart');
    var totalRevenueChartOptions = {
      chart: {
        height: 270,
        type: 'bar',
        toolbar: { show: false }
      },
      noData: {
        text: 'Loading...'
      },
      plotOptions: {
        bar: {
          horizontal: false,
          dataLabels:{
            position:'top',
          },
        }
      },
      colors: [config.colors.primary, config.colors.info],
      dataLabels: {
        enabled: false
      },
      series: [
        /*{
          name: '2021',
          data: [18, 7, 15, 29, 18, 12, 9, 34, 2, 52, 13, 12]
        },
        {
          name: '2020',
          data: [13, 18, 9, 14, 5, 17, 15, 15, 14, 16, 11, 7]
        }*/

      ],
      responsive: [
        {
          breakpoint: 480,
          options: {
            chart:{
              height:'450',
            },
            plotOptions: {
              bar: {
                horizontal: true
              }
            }
          }
        }
      ],
      stroke: {
        curve: 'smooth',
        width: 1,
        colors: [cardColor]
      },
      tooltip: {
        shared: true,
        intersect: false
      },
      legend: {
        show: true,
        horizontalAlign: 'left',
        position: 'top',
        markers: {
          height: 8,
          width: 8,
          radius: 12,
          offsetX: -3
        },
        labels: {
          colors: axisColor
        },
        itemMargin: {
          horizontal: 10
        }
      },
      grid: {
        borderColor: borderColor,
        padding: {
          top: 0,
          bottom: -8,
          left: 20,
          right: 20
        }
      },
      xaxis: {
        categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Agu','Sep','Oct','Nov','Dic'],
        labels: {
          style: {
            fontSize: '13px',
            colors: axisColor
          }
        },
        axisTicks: {
          show: false
        },
        axisBorder: {
          show: false
        }
      },
      yaxis: {
        forceNiceScale: true,
        min: 0,
        labels: {
          style: {
            fontSize: '13px',
            colors: axisColor
          }
        },
      },
      states: {
        hover: {
          filter: {
            type: 'none'
          }
        },
        active: {
          filter: {
            type: 'none'
          }
        }
      }
    };
  if (typeof totalRevenueChartEl !== undefined && totalRevenueChartEl !== null) {
    var totalRevenueChart = new ApexCharts(totalRevenueChartEl, totalRevenueChartOptions);
    totalRevenueChart.render();
  };
  // Profit Report Line Chart
  // --------------------------------------------------------------------
  var profileReportChartEl = document.querySelector('#profileReportChart'),
    profileReportChartConfig = {
      series: [{
        /*name: 2023,
        data: [1, 4, 3, 5, 4, 0]*/
    }],
      chart: {
      height: 92,
      width: '100%',
      type: 'line',
      zoom: {
        enabled: false
      },
      toolbar:{
        show:false
      },
      sparkline: {
        enabled: true,
    }
    },

    noData: {
      text: 'Loading...'
    },

    markers: {
      size:5
    }, 
    colors: [config.colors.warning],
    dataLabels: {
      enabled: false
    },
    stroke: {
      curve: 'smooth'
    },
    grid: {
      show:false
    },
    xaxis: {
      categories: [],
      tickPlacement: 'between',
    },
    yaxis:{
      forceNiceScale: true,
      min: 0,
      max: 6//cambiar +1 por el maximo
    }
    
    };
  if (typeof profileReportChartEl !== undefined && profileReportChartEl !== null) {
    var profileReportChart = new ApexCharts(profileReportChartEl, profileReportChartConfig);
    profileReportChart.render();
  }

  // Income Chart - Area chart
  // --------------------------------------------------------------------
  var incomeChartEl = document.querySelector('#SalesCategoryChart'),
    incomeChartConfig = {
      series: [],
          chart: {
          with: "100%",
          height: 280,
          type: 'pie',
        },
        noData: {
          text: 'Loading...'
        },
        labels: ['Team A', 'Team B', 'Team C'],
        legend: {
          position: 'bottom'
        },
    };
  if (typeof incomeChartEl !== undefined && incomeChartEl !== null) {
    var incomeChart = new ApexCharts(incomeChartEl, incomeChartConfig);
    incomeChart.render();
  }
})();
