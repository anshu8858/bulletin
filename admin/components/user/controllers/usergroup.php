<?php

    class UsergroupController
    {
        
        private $model;
        private $core;
        
        public function __construct($model, $core)
        {
            $this->model = $model;
            $this->core = $core;
        }
        
        public function save()
        {
            $this->model->id = $_POST["id"];
            $this->model->title = $_POST["title"];
            $this->model->is_admin = $_POST["is_admin"];
            if ($this->model->store())
            {
                $this->model->setMessage("success", "Usergroup saved");
            }
            else
            {
                $this->model->setMessage("danger", "Something went wrong during saving");
            }
            header("Location: index.php?component=user&controller=usergroups");
        }
        
    }

?>