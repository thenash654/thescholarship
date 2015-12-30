<?php
#include <iostream>
//using namespace std;

class uNode{
	public $username;
	public $books = array();
	public $next;

	function printput()
	{
		echo $this->username."\n".$this->books[5]."\n";
	}
	function addb($book)
	{
		array_shift($this->books);
		array_push($this->books, $book);
		//echo $book[0];
	}
}
class uList{
	public $head;
	function __construct(){$this->head=NULL;}

	function append($ptr)
	{
		$ptr->next=NULL;
		if($this->head==NULL)
			$this->head=$ptr;
		else
		{
			for($p = $this->head; $p!=NULL; $p=$p->next)
			{
				if($ptr->username == $p->username)
					return;
				if($p->next == NULL)
					$p->next=$ptr;
			}
		}
	}

	function add($uname, $ubooks)
	{
		$ptr = new uNode;
		$ptr->books=$ubooks;
		$ptr->username=$uname;
		$this->append($ptr);
	}

	
	function printuList()
	{
		for($p=$this->head; $p!=NULL; $p=$p->next){
			echo $p->username."(";
				for($i=0; $i<6; $i++)
					echo $p->books[$i]." ";
			echo ")->";
	}
		echo "<BR>";
	}
}

class hNode{
	public $bookID;
	public $users;
	function __construct(){$this->users=new uList;}
	function addbook($book, $user){
		$ptr = new uNode;
		for($ptr=$this->users->head; $ptr!=NULL; $ptr=$ptr->next)
		{
			if($user == $ptr->username)
			{
				$ptr->addb($book);
			}
		}
	}
}

class hList{
	public $ind;
	public $size=100;
	function __construct(){
	 for($i=0; $i<$this->size; $i++) 
	 {
	 	$this->ind[$i]=new hNode; 
	 	$this->ind[$i]->bookID=$i;
	 }
	}
	function append()
	{
		$this->ind[$this->size+1]=new hNode;
		$this->ind[$this->size+1]->bookID=$this->size+1;
		$this->size++;
	}
	function adduNode($bID, $user, $books)
	{
		$this->ind[$bID]->users->add($user,$books);
	}

	function printhList()
	{
		for ($i=0; $i<$this->size; $i++)
		{
			echo $this->ind[$i]->bookID,"->";
			$this->ind[$i]->users->printuList();
		}
	}
	function addbook($bookID, $book, $user)
	{
		$this->ind[$bookID]->addbook($book, $user);
	}
}

class hashtable{
	public $bookKeys;
	function __construct(){$this->bookKeys=new hList;}
	function addindex()
	{
		$this->bookKeys->append();
	}

	function addUser($bookID, $user, $books)
	{
		$this->bookKeys->adduNode($bookID, $user, $books);
	}

	function addbookinuser($bookID, $book, $user)
	{
		$this->bookKeys->addbook($bookID, $book, $user);
	}
	function printHashtable()
	{
		$this->bookKeys->printhList();
	}
	function getUList($book)
	{
		return $this->bookKeys->ind[$book]->users->head;
	}
}

?>