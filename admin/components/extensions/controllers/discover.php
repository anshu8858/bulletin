<?php

    class DiscoverController
    {
        
        private $model;
        private $core;
        
        public function __construct($model, $core)
        {
            $this->model = $model;
            $this->core = $core;
        }
        
        public function installComponent()
        {
            $extension = $_GET["extension"];
            $xml = simplexml_load_file(__DIR__ ."/../../". $extension ."/extension.xml");
            if (strlen($xml) > 0)
            {
                $this->model->database->query("INSERT INTO #__components (title, description, internal_name, is_frontend, is_backend, is_locked, author_name, author_url, version, enabled) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)", array($xml->title, $xml->description, $extension, $xml->is_frontend, $xml->is_backend, $xml->is_locked, $xml->author, $xml->author_url, $xml->version, 1));
                if (file_exists(__DIR__ ."/../../". $extension ."/database.txt"))
                {
                    $contents = file_get_contents(__DIR__ ."/../../". $extension ."/database.txt");
                    $contents = str_replace("#__", DATABASE_PREFIX, $contents);
                    $contents = explode(";", $contents);
                    unset($contents[count($contents) - 1]);
                    foreach ($contents as $command)
                    {
                        $this->model->database->query($command);
                    }
                }
                $this->model->setMessage("success", "Extension installed");
                header("Location: index.php?component=extensions&controller=discover");
            }
            else
            {
                $this->model->setMessage("danger", "No extension.xml file was found. Please check files and retry.");
                header("Location: index.php?component=extensions&controller=discover");
            }
        }
        
        public function installHook()
        {
            $hook = $_GET["hook"];
            $xml = simplexml_load_file(__DIR__ ."/../../../../hooks/". $hook .".xml");
            if (strlen($xml) > 0)
            {
                $this->model->database->query("INSERT INTO #__components_hooks (title, description, component_name, author_name, author_url, version, enabled) VALUES (?, ?, ?, ?, ?, ?, ?)", array($xml->title, $xml->description, $hook, $xml->author, $xml->author_url, $xml->version, 1));
                $this->model->setMessage("success", "Hook installed");
                header("Location: index.php?component=extensions&controller=discover");
            }
            else
            {
                $this->model->setMessage("danger", "No xml file was found for the specified hook. Please check files and retry.");
                header("Location: index.php?component=extensions&controller=discover");
            }
        }
        
        public function installModule()
        {
            $module = $_GET["module"];
            $xml = simplexml_load_file(__DIR__ ."/../../../../modules/". $module ."/module.xml");
            if (strlen($xml) > 0)
            {
                $this->model->database->query("INSERT INTO #__components_modules (title, description, internal_name, author_name, author_url, version) VALUES (?, ?, ?, ?, ?, ?)", array($xml->title, $xml->description, $module, $xml->author, $xml->author_url, $xml->version));
                $this->model->setMessage("success", "Module installed");
                header("Location: index.php?component=extensions&controller=discover");
            }
            else
            {
                $this->model->setMessage("danger", "No module.xml file was found. Please check files and retry.");
                header("Location: index.php?component=extensions&controller=discover");
            }
        }
        
    }

?>