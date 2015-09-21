<?php

/* Blocks
 * A CMS for front end developers
 * Made with love by Jake Bown
 * twitter.com/@jakebown1
 * jakebown@gmail.com
*/

class database {

	function __construct($db = false, $cache = true) {
		if(!$db || !is_bool($cache)) {
			die("Database or cache not defined");
		} else {
			$this->db = new FlatFileDB(array(
			    "db_file" =>  $_SERVER['DOCUMENT_ROOT']  . $_SESSION['blocks']['site_base'] . "app/db/$db.db",
			    "db"      => $db,
			    "cache"   =>  $cache
			));
				
		}
	}

	function select($record) {
		return $this->db->get($record);
	}

	function insert($arr) {
		if(!is_array($arr)) {
			die("Insert query must be array");
		} else {
			foreach ($arr as $key => $value) {
				return $this->db->set($key, $value);
			}
		}
	}

	function delete($record) {
		$this->db->delete($record);
	}

	function update($arr) {
		if(!is_array($arr)) {
			die("Insert query must be array");
		} else {
			foreach ($arr as $key => $value) {
				return $this->db->update($key, $value);
			}
		}
	}


}
