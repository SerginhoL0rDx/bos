<html>
<head>
<body bgcolor="#000000" text="lime" link="#009933" vlink="#009933" padding="0" leftmargin="0">
<font size="2"> 
<TITLE>Live Raid Boss Map - L2 Minonn</TITLE>

<script>
<!--
//enter refresh time in "minutes:seconds" Minutes should range from 0 to inifinity. Seconds should range from 0 to 59
var limit="5:00"

if (document.images){
var parselimit=limit.split(":")
parselimit=parselimit[0]*60+parselimit[1]*1
}
function beginrefresh(){
if (!document.images)
return
if (parselimit==1)
window.location.reload()
else{ 
parselimit-=1
curmin=Math.floor(parselimit/60)
cursec=parselimit%60
if (curmin!=0)
curtime=curmin+" minutes "+cursec+" seconds to automatic refresh!"
else
curtime=cursec+" seconds to automatic refresh!"
window.status=curtime
setTimeout("beginrefresh()",1000)
}
}

window.onload=beginrefresh
//-->
</script>

</head>
<?php
include"connection.php";
?>
<?php
$query_raidbosses=mysql_query("SELECT boss_id,loc_x,loc_y,loc_z,respawn_time FROM raidboss_spawnlist");
$query_grandboss=mysql_query("SELECT boss_id,loc_x,loc_y,loc_z,respawn_time FROM grandboss_spawnlist");
$online= mysql_num_rows($query_raidbosses);
$online2= mysql_num_rows($query_grandboss);
echo "<div style=position:absolute;top:0px;left:0px><img src=map.jpg></div>";
while ($res=mysql_fetch_array($query_raidbosses))
  {
	$id=$res['boss_id'];
	$valx=$res['loc_x'];
	$valy=$res['loc_y'];
	$valz=$res['loc_z'];
	$respawn=$res['respawn_time'];
	$boss_name=mysql_query("SELECT name FROM npc WHERE id='$id'");
	$name = mysql_fetch_row( $boss_name );
	$boss_level=mysql_query("SELECT level FROM npc WHERE id='$id'");
	$level = mysql_fetch_row( $boss_level );
	
  $x=116+($valx+107823)/200;
  $y=2580+($valy-255420 )/200;
  
if($respawn == "0")
	echo "<div style=\"position:absolute;top:".$y."px;left:".$x."px\"><img src=3.png title=\"Level $level[0] $name[0] esta VIVO!\"></div><center>";
else 		
	echo "<div style=\"position:absolute;top:".$y."px;left:".$x."px\"><img src=0.png title=\"Level $level[0] $name[0] esta MORTO!\"></div><center>";
	}
while ($res=mysql_fetch_array($query_grandboss))
  {
	$id=$res['boss_id'];
	$valx=$res['loc_x'];
	$valy=$res['loc_y'];
	$valz=$res['loc_z'];
	$respawn=$res['respawn_time'];
	$boss_name=mysql_query("SELECT name FROM npc WHERE id='$id'");
	$name = mysql_fetch_row( $boss_name );
	$boss_level=mysql_query("SELECT level FROM npc WHERE id='$id'");
	$level = mysql_fetch_row( $boss_level );
	
  $x=116+($valx+107823)/200;
  $y=2580+($valy-255420 )/200;
  
if($respawn == "0")
	echo "<div style=\"position:absolute;top:".$y."px;left:".$x."px\"><img src=3.png title=\"Level $level[0] $name[0] esta VIVO!\"></div><center>";
else 		
	echo "<div style=\"position:absolute;top:".$y."px;left:".$x."px\"><img src=0.png title=\"Level $level[0] $name[0] esta MORTO!\"></div><center>";
	}	
mysql_close();
?>
