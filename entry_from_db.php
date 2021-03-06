<?php 
	
	/**
	 * Einträge, die aus der DB gelesen wurden
	 */
	class EntryFromDB extends Entry
	{
		
		function __construct()
		{
			$entryArray = $this->readFromDB();
			$this->entryID = $entryArray['entry_ID'];
			$this->content = $entryArray['content'];
			$this->entryPublic = $entryArray['entryPublic'];
			$this->userName = $entryArray['uname'];
			$this->visible = $entryArray['entryVisible'];
			/*	
			$this->content = $content;
			$this->userName = $userName;
			$this->visible = $visible;
			$this->entryPublic = $entryPublic;
			$this->entryID = $entryID;
			*/
		}
		
		private function readFromDB(){
			//var_dump($db = connectDB('tagebuch'));
			if($db = connectDB('tagebuch')){
				try {
					$stmt = $db->prepare('SELECT * FROM tbl_entry');
					$stmt->execute();
					return $entryArray = $stmt->fetch(PDO::FETCH_ASSOC);
				} catch (PDOException $e) {
					echo $e->getMessage();
				}
				

			}
		}


	}

 ?>