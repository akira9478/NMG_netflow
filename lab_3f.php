<?php
//ST4 5樓所有名單與cacti流量圖位置(建議資料庫化 因為沒很多所以就沒做)
include("top.php");

function graph($lab_name,$lab_port,$lab_href){

$lab_n=explode(" ",$lab_name);

$count=count($lab_port);
echo "
    <div class=\"col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main\">
          <h1 class=\"page-header\">
          <a data-toggle=\"collapse\" data-target=\"#".$lab_n[0]."\" >
          ".$lab_name."
          </a></h1>
          <div class=\"row collapse\" id=\"".$lab_n[0]."\">
";


for($i=0;$i<$count;$i++){
echo "
  <div class=\"col-xs-12 col-sm-6 \" >
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
echo"
</div></div>";
}

$name="ST307  系辦";
$port=array("307A","307B");
$href=array("images/port_graph/graph_889","images/port_graph/graph_890");
graph($name,$port,$href);

$name="ST312  軟體工程實驗室";
$port=array("312A","312B");
$href=array("images/port_graph/graph_895","images/port_graph/graph_896");
graph($name,$port,$href);

$name="ST313  軟工中心";
$port=array("313A","313B");
$href=array("images/port_graph/graph_897","images/port_graph/graph_898");
graph($name,$port,$href);

$name="ST314  資訊技術實驗室";
$port=array("314A","314B");
$href=array("images/port_graph/graph_899","images/port_graph/graph_900");
graph($name,$port,$href);

$name="ST333  資訊安全實驗室";
$port=array("333A","333B");
$href=array("images/port_graph/graph_953","images/port_graph/graph_954");
graph($name,$port,$href);

$name="ST334  灰色理論與資訊安全實驗室";
$port=array("334A","334B");
$href=array("images/port_graph/graph_955","images/port_graph/graph_956");
graph($name,$port,$href);

$name="ST335  資訊安全實驗室";
$port=array("335A","335B");
$href=array("images/port_graph/graph_957","images/port_graph/graph_958");
graph($name,$port,$href);

$name="ST338  軟工實驗室/數位創意實驗室";
$port=array("338A","338B","338C","338D");
$href=array("images/port_graph/graph_959","images/port_graph/graph_960","images/port_graph/graph_961","images/port_graph/graph_963");
graph($name,$port,$href);



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
