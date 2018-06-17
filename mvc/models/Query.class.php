<?php
class Query {
	private $_id;
	private $_num_query;
	private $_num_level;
	private $_theme;
	private $_question;
	private $_query;
	private $_line_count;
	private $_last_modified_by;
	private $_last_modified_at;
	public function __construct($id, $num_query, $num_level, $theme, $question, $query, $line_count, $last_modified_by, $last_modified_at) {
		$this->_id = $id;
		$this->_num_query = $num_query;
		$this->_num_level = $num_level;
		$this->_theme = $theme;
		$this->_question = $question;
		$this->_query = $query;
		$this->_line_count = $line_count;
		$this->_last_modified_by = $last_modified_by;
		$this->_last_modified_at = $last_modified_at;
	}
	public function id() {
		return $this->_id;
	}
	public function num_query() {
		return $this->_num_query;
	}
	public function num_level() {
		return $this->_num_level;
	}
	public function theme() {
		return $this->_theme;
	}
	public function question() {
		return $this->_question;
	}
	public function query() {
		return $this->_query;
	}
	public function line_count() {
		return $this->_line_count;
	}
	public function last_modified_by() {
		return $this->_last_modified_by;
	}
	public function last_modified_at() {
		return $this->_last_modified_at;
	}
}
?>