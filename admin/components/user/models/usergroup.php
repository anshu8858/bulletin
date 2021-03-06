<?php

    require_once(__DIR__ ."/../../../classes/form.php");

    class UsergroupModel extends Model
    {
        
        public $template = "usergroup.php";
        public $database;
        public $form;
        
        public $id;
        public $title;
        public $is_admin;
        
        public function __construct($id = 0, $database)
        {
            $this->database = $database;
            if ($id > 0)
            {
                $this->load($id);
            }
            $this->form = new Form(__DIR__ ."/../forms/usergroup.xml", $this, $this->database);
        }
        
        public function load($id)
        {
            $temp = $this->database->loadObject("SELECT * FROM #__usergroups WHERE id = ?", array($id));
            $this->id = $temp->id;
            $this->title = $temp->title;
            $this->is_admin = $temp->is_admin;
        }
        
        public function store($table = "", $data = array())
		{
			$data = array();
			$data[] = array("name" => "id", "value" => $this->id);
			$data[] = array("name" => "title", "value" => $this->title);
            $data[] = array("name" => "is_admin", "value" => $this->is_admin);
			return parent::store("#__usergroups", $data);
		}
        
        public function delete($id)
        {
            $this->database->query("DELETE FROM #__usergroups WHERE id = ?", array($id));
        }
        
    }

?>