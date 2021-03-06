<?php include('templates/_header.php');?>
<?php 
     if(!isset($_GET['batchNo']) || (isset($_GET['batchNo']) && $_GET['batchNo']=='') &&
        !isset($_GET['txn']) || (isset($_GET['txn']) && $_GET['txn']=='')){
        echo "<script>window.location = 'index';</script>";
     }   


$url= 'https://chart.googleapis.com/chart?cht=qr&chld=H|1&chs=400x400&chl=';
if(isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on')   
$url.= "https://";   
else  
$url.= "http://";   
$url.= $_SERVER['HTTP_HOST'];   
$url.= $_SERVER['REQUEST_URI'];
  

// echo $url; 
?>
<style type="text/css">
    .verified_info{
        color: green;
    }
</style>
<div class="container-fluid">
        <div class="row bg-title">
            <div class="col-lg-6 col-md-4 col-sm-4 col-xs-12">
                <h3 class="page-title">Batch Progress <a href="javascript:void(0);" onclick="javascript:window.print();" class="text-info" title="Print Page Report"><i class="fa fa-print"></i> Print</a></h3> 
                <h4><b>Batch No: </b><?php echo $_GET['batchNo'];?></h4>
            </div>
            <div class="col-lg-6 col-sm-8 col-md-8 col-xs-12">
                <a href="<?php echo $url;?>" title="<?php echo $_GET['batchNo'];?>" class="qr-code-magnify pull-right" data-effect="mfp-zoom-in">
                    <img src="<?php echo $url;?>" class="img-responsive" style="width:100px; height:100px;"/>
                </a>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- .row -->
        <div class="row">
            <div class="col-md-12">
                <div class="white-box">
                    <ul class="timeline">
                        <li>
                            <div class="timeline-badge danger">
                                <i class="fa fa-check"></i>
                            </div>
                            <div class="timeline-panel" id="cultivationSection">
                                <div class="timeline-heading">
                                    <h4 class="timeline-title">Cultivation</h4>
                                    <p><small class="text-muted text-success activityDateTime"></small> </p>
                                    <span class="activityQrCode"></span>
                                </div>
                                <div class="timeline-body">
                                    <table class="table activityData table-responsive" style="text-align: right;" >
                                        <tr>
                                            <td colspan="2"><p>Information Not Available</p></td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </li>
                        <li class="timeline-inverted">
                            <div class="timeline-badge danger">
                                <i class="fa fa-times"></i>
                            </div>
                            <div class="timeline-panel" id="farmInspectionSection">
                                <div class="timeline-heading">
                                    <h4 class="timeline-title">Farm-Inspector</h4>
                                    <p><small class="text-muted text-success activityDateTime"></small> </p>
                                    <span class="activityQrCode"></span>
                                </div>
                                <div class="timeline-body">
                                    <table class="table activityData table-responsive" style="text-align: right;">
                                        <tr>
                                            <td colspan="2"><p>Information Not Available</p></td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </li>
                        <li>
                           <div class="timeline-badge danger">
                                <i class="fa fa-times"></i>
                            </div>
                            <div class="timeline-panel" id="harvesterSection">
                                <div class="timeline-heading">
                                    <h4 class="timeline-title">Harvester</h4>
                                    <p><small class="text-muted text-success activityDateTime"></small> </p>
                                    <span class="activityQrCode"></span>
                                </div>
                                <div class="timeline-body">
                                    <table class="table activityData table-responsive" style="text-align: right;">
                                        <tr>
                                            <td colspan="2"><p>Information Not Available</p></td>
                                        </tr>
                                    </table>        
                                </div>
                            </div>
                        </li>
                        <li class="timeline-inverted">
                            <div class="timeline-badge danger">
                                <i class="fa fa-times"></i>
                            </div>
                            <div class="timeline-panel" id="exporterSection"> 
                                <div class="timeline-heading">
                                    <h4 class="timeline-title">Exporter</h4>
                                    <p><small class="text-muted text-success activityDateTime"></small> </p>
                                    <span class="activityQrCode"></span>
                                </div>
                                <div class="timeline-body">
                                    <table class="table activityData table-responsive" style="text-align: right;">
                                        <tr>
                                            <td colspan="2"><p>Information Not Available</p></td>
                                        </tr>
                                    </table>  
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="timeline-badge danger">
                                <i class="fa fa-times"></i>
                            </div>
                            <div class="timeline-panel" id="importerSection">
                                <div class="timeline-heading">
                                    <h4 class="timeline-title">Importer</h4>
                                    <p><small class="text-muted text-success activityDateTime"></small> </p>
                                    <span class="activityQrCode"></span>
                                </div>
                                <div class="timeline-body">
                                   <table class="table activityData table-responsive" style="text-align: right;">
                                        <tr>
                                            <td colspan="2"><p>Information Not Available</p></td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </li>
                        <li class="timeline-inverted">
                            <div class="timeline-badge danger">
                                <i class="fa fa-times"></i>
                            </div>
                            <div class="timeline-panel" id="processorSection">
                                <div class="timeline-heading">
                                    <h4 class="timeline-title">Processor</h4>
                                    <p><small class="text-muted text-success activityDateTime"></small> </p>
                                    <span class="activityQrCode"></span>
                                </div>
                                <div class="timeline-body">
                                    <table class="table activityData table-responsive" style="text-align: right;">
                                        <tr>
                                            <td colspan="2"><p>Information Not Available</p></td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- /.row -->
</div>

<input type="hidden" id="batchNo" value="<?php $batchNo = isset($_GET['batchNo'])?$_GET['batchNo']:''; echo $batchNo;?>">

<?php include('templates/_footer.php');?>            