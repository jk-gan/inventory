google.load("visualization", "1.1", {packages:["bar"]});
 google.setOnLoadCallback(drawChart);

      function drawChart() {
        
        var month = document.getElementById('month-graph').value;

        var jsonData = $.ajax({
          url: "get_data/"+month,
          dataType:"json",
          async: false
          }).responseText;

      // Create our data table out of JSON data loaded from server.
      var data = new google.visualization.DataTable(jsonData);

        var options = {
          chart: {
            title: 'Monthly Repport',
            subtitle: 'Sales & Profit',
          }
        };

        var chart = new google.charts.Bar(document.getElementById('columnchart_material'));
        // chart.draw(data, {width: 400, height: 240});
        chart.draw(data, options);
      }

