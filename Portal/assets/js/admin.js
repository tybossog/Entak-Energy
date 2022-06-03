$(function () {

  google.charts.load('current',{packages:['corechart']});
  google.charts.setOnLoadCallback(drawChart1);
  google.charts.setOnLoadCallback(drawChart2);
  //my sales plote code
  function drawChart1() {

    var data = google.visualization.arrayToDataTable([
      ['Contry', 'Mhl'],
      ['Italy', 55],
      ['France', 49],
      ['Spain', 44],
      ['USA', 24],
      ['Argentina', 15]
    ]);

    var options = {
      title: ''
    };

    var chart = new google.visualization.BarChart(document.getElementById('mySales'));
    chart.draw(data, options);

    }
  function drawChart2() {
      // Set Data
      var data = google.visualization.arrayToDataTable([
        ['Price', 'Size'],
        [50,7],[60,8],[70,8],[80,9],[90,9],[100,9],
        [110,10],[120,11],[130,14],[140,14],[150,15]
        ]);
      // Set Options
      var options = {
        title: '',
        hAxis: {title: ''},
        vAxis: {title: ''},
        legend: 'none'
      };
      // Draw Chart
      var chart = new google.visualization.LineChart(document.getElementById('myPlot'));
      chart.draw(data, options);
      }

});
