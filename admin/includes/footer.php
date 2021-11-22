  </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Summernote WYSIWYG Editor on Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
    <script src="js/scripts.js"></script>

    <!-- Google Pie chart -->
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['Task', 'Hours per Day'],
          ['Views ', <?php echo $session->count; ?>],
          ['Comments', <?php echo Comment::count_all(); ?>],
          ['Users', <?php echo User::count_all(); ?>],
          ['Photos', <?php echo Photo::count_all(); ?>]
        ]);

        var options = {
          backgroundColor: '#0000ffff',
          pieSliceText: 'percentage', 
          title: 'My Daily Activities'
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

        chart.draw(data, options);
      }
    </script>


</body>

</html>
