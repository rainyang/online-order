<?php
	/*
	* 查找一定范围内的经纬度值
	* 传入值：纬度,经度,查找半径(m)
	* 返回值：最小纬度、经度，最大纬度、经度
	*/

	public function getAround($lat,$lon,$raidus)
	{ 
		$PI = 3.14159265; // 圆周率
		$EARTH_RADIUS = 6378137; // 地球半径
		$RAD = Math.PI / 180.0; //弧度
		$latitude = $lat; 
		$longitude = $lon; 
		$degree = (24901*1609)/360.0; 
		$raidusMile = $raidus; 
		$dpmLat = 1/$degree; 
		$radiusLat = $dpmLat*$raidusMile; 
		$minLat = $latitude - $radiusLat; 
		$maxLat = $latitude + $radiusLat; 
		$mpdLng = $degree*cos($latitude * ($PI/180)); 
		$dpmLng = 1 / $mpdLng; 
		$radiusLng = $dpmLng*$raidusMile; 
		$minLng = $longitude - $radiusLng; 
		$maxLng = $longitude + $radiusLng; 
		$result['minwei']=$minLat;
		$result['minjing']=$minLng;
		$result['maxwei']=$maxLat;
		$result['maxjing']=$maxLng;
		return $result;
	}
?>