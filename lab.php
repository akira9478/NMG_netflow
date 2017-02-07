<?php
//測試用模組切板
include("top.php");

$lab_name="NMG";
$lab_port=array("416A","416B");
$lab_href=array("images/port_graph/graph_1441","images/port_graph/graph_1442");

$count=count($lab_port)

?>
    <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main" >
          <h1 class="page-header"><?php echo $lab_name;?></h1>
          <div class="row">
<?php

for($i=0;$i<$count;$i++){
echo "
  <div class=\"col-xs-12 col-sm-6\" >
      <h2 class=\"sub-header\">".$lab_port[$i]."</h2>
      <a data-toggle=\"modal tooltip\" role=\"button\" data-placement=\"top\" href=\"#".$lab_port[$i]."\" title=\"#".$lab_port[$i]."\" onclick=\"$('#".$lab_port[$i]."').modal('show')\">
        <img src=\"".$lab_href[$i]."_1.png\" class=\"img-thumbnail\">
      </a>
      <div class=\"modal fade\" id=\"".$lab_port[$i]."\" tabindex=\"-1\" role=\"dialog\" aria-labelledby=\"".$lab_port[$i]."\" aria-hidden=\"true\" style=\"overflow:auto;\">
        <div class=\"modal-dialog modal-lg\">
          <div class=\"modal-content\" >
              <div class=\"modal-header\" >
              <button type=\"button\" class=\"close\" data-dismiss=\"modal\" aria-label=\"Close\">
                <span aria-hidden=\"true\">&times;</span>
              </button>
              <h4 class=\"modal-title\" id=\"myModalLabel\">".$lab_name."</h4>
              </div>
              <div class=\"modal-body\">
                  <h3>Hourly (1 Minute Average)</h3>
                  <img src=\"".$lab_href[$i]."_5.png\">
                  <h3>Daily (5 Minute Average)</h3>
                  <img src=\"".$lab_href[$i]."_1.png\">
                  <h3>Weekly (30 Minute Average)</h3>
                  <img src=\"".$lab_href[$i]."_2.png\">
                  <h3>Monthly (2 Hour Average)</h3>
                  <img src=\"".$lab_href[$i]."_3.png\">
                  <h3>Yearly (1 Day Average)</h3>
                  <img src=\"".$lab_href[$i]."_4.png\">
              </div>
          </div>
        </div>
      </div>
  </div>
 ";

}

            ?>


 <!-- <div class="col-xs-12 col-sm-6">
              <h2 class="sub-header">port40</h2>
              <a data-toggle="modal tooltip" role="button" data-placement="top" href="#g40" title="3F_南" onclick="$('#g40').modal('show')">
                <img src="images/port_graph/graph_1442_1.png" class="img-thumbnail">               </a>
              <div class="modal fade" id="g40" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="overflow:auto;">
                <div class="modal-dialog modal-lg">
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;
                        </span>
                      </button>
                      <h4 class="modal-title" id="myModalLabel">T0 CC</h4>
                    </div>
                    <div class="modal-body">
                      <h3>Hourly (1 Minute Average)</h3>
                      <img src="images/port_graph/graph_1442_5.png">
                      <h3>Daily (5 Minute Average)</h3>
                      <img src="images/port_graph/graph_1442_1.png">
                      <h3>Weekly (30 Minute Average)</h3>
                      <img src="images/port_graph/graph_1442_2.png">
                      <h3>Monthly (2 Hour Average)</h3>
                      <img src="images/port_graph/graph_1442_3.png">
                      <h3>Yearly (1 Day Average)</h3>
                      <img src="images/port_graph/graph_1442_4.png">
                    </div>
                  </div>
                </div>
              </div>
            </div>


        </div>  -->
<?php
include("bottom.php");
?>
