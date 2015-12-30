<?php
include ('hashtable.php');
$books = new hashtable;

include 'connectDB.php';

function populateHashtable($User_books, $BookID)
{
	include 'connectDB.php';
	$sql = "SELECT group_concat(book_id), user_id from views group by user_id";
	$res = mysqli_query($db_handle, $sql);
	$prevDownloads=array(array());
	$users=array();
	while ($row = mysqli_fetch_assoc($res))
	{
		$a=array();
		$a = explode(',',$row['group_concat(book_id)']);
		for($i =0; $i<count($row['group_concat(book_id)']); $i++)
			$prevDownloads[$row['user_id']]=$a;
		if(!in_array($row['user_id'], $users))
			array_push($users, $row['user_id']);

	}
	$z=array(0,0,0,0,0,0);
	for($i=$users[0]; $i<count($users)+$users[0]; $i++)
	{ 
	$b=array(0,0,0,0,0,0);

		for($j=0; $j<count($prevDownloads[$i]);$j++)
		{
			$User_books->addUser($prevDownloads[$i][$j], $i, $z);

			$q=0;
			for($m=$j-1;$m>=0 && $q<=3; $m--,$q++)
			{
				$b[$q]=$prevDownloads[$i][$m];
			}
			for($m=$j+1;$m<count($prevDownloads[$i]) && $q<6; $m++,$q++)
			{
				$b[$q]=$prevDownloads[$i][$m];
			}
			while ($b[5]==0)
			{
				if(array_key_exists($j-4,$b))
					$b[5]=$prevDownloads[$i][$j-4];
				else if(array_key_exists($j+4,$b))
					$b[5]=$prevDownloads[$i][$j+4];
			}
			for($h=0;$h<6; $h++)
				{
					$User_books->addbookinuser($prevDownloads[$i][$j], $b[$h], $i);
					
				}
		}
	}
	$rez=findBook($BookID, $User_books);
	
	return $rez;
}

function array_max($arr,$x) {
	$max = $arr[0]; 
	$a=array(); 
	$prevMax=0;
		for ($c = 0; $c<count($arr); $c++) {
			if ($arr[$c] >= $max && $c!=$x) {
				$max=$arr[$c];
			}
		}

	return $max;
}
function getIndex($arr, $value, $nInd)
{
	for ($c=0; $c<count($arr) ; $c++)
	{
		if($arr[$c]==$value){
			if(!in_array($c, $nInd))
			return $c;}
	}
}
function findBook($lastbook, $User_books)
{
	include 'connectDB.php';
	$near_books=array(); $i=0;
	$sql = "SELECT book_id from book";
	$res = mysqli_query($db_handle, $sql);
	while($row = mysqli_fetch_assoc($res))
	{
		$near_books[$i]=0;
		$i++;
	}
	$pt=new uNode;
	for($ptr = $User_books->getUList($lastbook); $ptr!=NULL; $ptr=$ptr->next)
	{
		for($i=0; $i<6; $i++)
			$near_books[$ptr->books[$i]]++;
	}
	$rec=array();
	$rec[0]=getIndex($near_books,array_max($near_books,0),$rec);
	
	// for ($r=0; $r<count($near_books); $r++)
	// 	echo $r.$near_books[$r]." ";
	 //echo "<BR>".$rec[0].' ';
	for($i=1; $i<6; $i++)
	{

		$rec[$i]=getIndex($near_books,2,$rec);
		
		//echo $rec[$i],' ';
	}

	return $rec;
}


?>