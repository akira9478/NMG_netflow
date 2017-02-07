<?php
//首頁 含三台switch流量圖與CPU圖
include("top.php");
?>
    <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
          <h1 class="page-header">流量圖</h1>
          <div class="row">
            <div class="col-xs-12 col-sm-6">
              <a data-toggle="modal tooltip" role="button" data-placement="top" href="#T0CC" title="3F_南" onclick="$('#T0CC').modal('show')">
                <img src="images/port_graph/graph_931_1.png" class="img-thumbnail">               </a>
              <div class="modal fade" id="T0CC" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
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
                      <img src="images/port_graph/graph_931_1.png">
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-xs-12 col-sm-6">
              <a data-toggle="modal tooltip" role="button" data-placement="top" href="#Po3" title="3F_南-3F_北" onclick="$('#Po3').modal('show')">
                <img src="images/port_graph/graph_879_1.png" class="img-thumbnail">               </a>
              <div class="modal fade" id="Po3" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;
                        </span>
                      </button>
                      <h4 class="modal-title" id="myModalLabel">Po3</h4>
                    </div>
                    <div class="modal-body">
                      <img src="images/port_graph/graph_879_1.png">
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-xs-12 col-sm-6">
              <a data-toggle="modal tooltip" role="button" data-placement="top" href="#Po2" title="3F_南-4F_南" onclick="$('#Po2').modal('show')">
                <img src="images/port_graph/graph_878_1.png" class="img-thumbnail">               </a>
              <div class="modal fade" id="Po2" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;
                        </span>
                      </button>
                      <h4 class="modal-title" id="myModalLabel">Po2</h4>
                    </div>
                    <div class="modal-body">
                      <img src="images/port_graph/graph_878_1.png">
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-xs-12 col-sm-6">
              <a data-toggle="modal tooltip" role="button" data-placement="top" href="#Po1" title="3F_南-4F_北" onclick="$('#Po1').modal('show')">
                <img src="images/port_graph/graph_877_1.png" class="img-thumbnail">               </a>
              <div class="modal fade" id="Po1" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;
                        </span>
                      </button>
                      <h4 class="modal-title" id="myModalLabel">Po1</h4>
                    </div>
                    <div class="modal-body">
                      <img src="images/port_graph/graph_877_1.png">
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <h2 class="sub-header">CPU</h2>
          <div class="col-xs-12 col-sm-6">
            <a data-toggle="modal tooltip" role="button" data-placement="top" href="#CPU" title="3F_南-4F_南" onclick="$('#CPU').modal('show')">
              <img src="images/port_graph/graph_1142_1.png" class="img-thumbnail">               </a>
            <div class="modal fade" id="CPU" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
              <div class="modal-dialog modal-lg">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;
                      </span>
                    </button>
                    <h4 class="modal-title" id="myModalLabel">CPU</h4>
                  </div>
                  <div class="modal-body">
                    <img src="images/port_graph/graph_1142_1.png">
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
<?php
include("bottom.php");
?>
