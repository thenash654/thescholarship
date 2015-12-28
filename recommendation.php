<?php
include ('hashtable.php');
$books = new hashtable;



function populateHashtable($User_books)
{
$a = array(0,1,2,3,4,5);
	include_once 'connectDB.php';
	$sql = "SELECT * from views order by No ";
	$res = mysqli_query($db_handle, $sql);
	$prevDownloads = array(array());
	$count = 0;
	while ($row = mysqli_fetch_assoc($res))
	{
		$b=$row['book_ID'];
		$u = $row['user_ID'];
		//array_push($prevDownloads[$u][ $count], $b);
		 $prevDownloads[$u][$count]=$b;

		$count++;
		if($count==5)
			$count=0;
		$User_books->addUser($b, $u, $a);


		$User_books->addbookinuser($b,3 , $u);
		//print "BOOK".$b; print " user".$u."<BR>";

	}
	for($i=6; $i<9; $i++)
	{
		echo "USER".$i." ";
		for($j=0; $j<5; $j++)
		{
			echo $prevDownloads[$i][$j]." ";
		}
		echo "<BR>";
	}
}
populateHashtable($books);
$books->printhashTable();
?>