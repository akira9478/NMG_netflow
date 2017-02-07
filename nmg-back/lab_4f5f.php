<?php

include("top.php");

function graph($lab_name,$lab_port,$lab_href){

$lab_n=explode(" ",$lab_name);

$count=count($lab_port);
echo "
    <div class=\"main\" >                     
          <h1 class=\"page-header\">
          <a data-toggle=\"collapse\" data-target=\"#".$lab_n[0]."\">
          ".$lab_name."
          </a></h1>                    
          <div class=\"row collapse\" id=\"".$lab_n[0]."\">   
";


for($i=0;$i<$count;$i++){
echo "
  <div class=\"col-xs-12 col-sm-6\" id=\"".$lab_name."\"> 
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

$name="ST404  數位系統實驗室";
$port=array("404A-g25","404B-g26");
$href=array("images/port_graph/graph_1032","images/port_graph/graph_1033");
graph($name,$port,$href);

$name="ST405  微算機系統實驗室";
$port=array("405A-g27","405B-g28");
$href=array("images/port_graph/graph_1034","images/port_graph/graph_1035");
graph($name,$port,$href);

$name="ST406  分散式系統實驗室";
$port=array("406A-g29","406B-g30");
$href=array("images/port_graph/graph_1036","images/port_graph/graph_1037");
graph($name,$port,$href);

$name="ST410  數位內容與應用實驗室";
$port=array("410A-g33","410B-g34");
$href=array("images/port_graph/graph_1040","images/port_graph/graph_1041");
graph($name,$port,$href);

$name="ST411  數位內容服務與應用實驗室";
$port=array("411A-g35","411B-g36");
$href=array("images/port_graph/graph_1042","images/port_graph/graph_1043");
graph($name,$port,$href);

$name="ST412  系統模擬實驗室";
$port=array("412A-g37","412B-g38");
$href=array("images/port_graph/graph_1044","images/port_graph/graph_1045");
graph($name,$port,$href);

$name="ST416-1  NMG";
$port=array("416A-g39","416B-g40");
$href=array("images/port_graph/graph_1441","images/port_graph/graph_1442");
graph($name,$port,$href);

$name="ST416-2  系學會";
$port=array("416C-g41","416D-g42");
$href=array("images/port_graph/graph_1048","images/port_graph/graph_1049");
graph($name,$port,$href);

$name="ST507  AAJC";
$port=array("507A-g10","507B-g11","507C-g12","507D-g13");
$href=array("images/port_graph/graph_1017","images/port_graph/graph_1018","images/port_graph/graph_1019","images/port_graph/graph_1020");
graph($name,$port,$href);

$name="ST425  資料庫實驗室";
$port=array("425A-g5","425B-g6");
$href=array("images/port_graph/graph_1083","images/port_graph/graph_1084");
graph($name,$port,$href);

$name="ST426  網路多媒體實驗室";
$port=array("426A-g7","426B-g8");
$href=array("images/port_graph/graph_1085","images/port_graph/graph_1086");
graph($name,$port,$href);

$name="ST429  高性能計算實驗室";
$port=array("429A-g9","429B-g25");
$href=array("images/port_graph/graph_1087","images/port_graph/graph_1103");
graph($name,$port,$href);

$name="ST430  高性能計算實驗室";
$port=array("430A-g29","430B-g36");
$href=array("images/port_graph/graph_1107","images/port_graph/graph_1114");
graph($name,$port,$href);

$name="ST431  影像視訊處理實驗室";
$port=array("431A-g13","431B-g14");
$href=array("images/port_graph/graph_1091","images/port_graph/graph_1092");
graph($name,$port,$href);

$name="ST435  SUN機房";
$port=array("435A-g17","435B-g18","435C-g19","435D-g20");
$href=array("images/port_graph/graph_1095","images/port_graph/graph_1096","images/port_graph/graph_1097","images/port_graph/graph_1098");
graph($name,$port,$href);

$name="ST436  PC機房";
$port=array("436A-g26");
$href=array("images/port_graph/graph_1104");
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
