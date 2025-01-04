<?php

require_once 'db.php';

class Projects extends DB {
    public function fetchProjects(){
        $this->connect();

        $sql = "SELECT * FROM projects";
        $result = $this->conn->query($sql);
        $projects = [];

        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                $projects[] = $row;
            }
        }

        $this->closeConnection();
        return $projects;
    }
}

?>