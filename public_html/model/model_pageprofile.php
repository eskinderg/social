<?php

class model_pageprofile extends Model {
      public function getprofile($profileid)
    {
        $query = $this->db->query("SELECT * FROM user WHERE username='".$profileid."'");
		
	return $query->rows;
    }
}
