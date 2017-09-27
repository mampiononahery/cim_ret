<?php
	require("jpgraph/src/jpgraph.php");
	require("jpgraph/src/jpgraph_pie.php");
	require("jpgraph/src/jpgraph_pie3d.php");	

	$annee=$_REQUEST['annee'];
	$lib=explode(',', $_GET['tout_lib']);
	$line=explode(',', $_GET['tot_foto']);
	
	$datay =array($line[0],$line[1]);
	$datax= array($lib[0],$lib[1]);

	$graph = new PieGraph(440,440,'auto');
	//$graph->SetShadow();
	$graph->SetMarginColor("#000000");
	
	$graph->title->Set("NOMBRE DE PHOTOS - ".$annee);
	$graph->title->SetFont(FF_FONT1,FS_BOLD);
	$graph->title->SetColor("#544b36;");
	
	$p1 = new PiePlot3D($datay);
	$p1->SetAngle(45); 
	$p1->ExplodeAll(10); 
	$p1->SetLabelPos(0.91);
	$p1->SetShadow();
	$p1->SetCenter(0.35);
	$p1->SetSliceColors(array('maroon','orange','green','navy','red','yellow')); 
	$p1->SetLegends($datax);
	$p1->value->SetFont(FF_FONT1,FS_BOLD);
	$p1->value->SetColor('#ffffff');
	
	$graph->Add($p1);
	$graph->Stroke();
?>