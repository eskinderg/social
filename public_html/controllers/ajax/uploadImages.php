<?php

class uploadImages extends Model
{
  
   function index()
   {
       header('Content-Type: application/json');
       
       $valid_exts = array('jpeg', 'jpg', 'png', 'gif'); // valid extensions
        $max_size = 3000 * 1024; // max file size in bytes
        $path = 'image/uploads/photos/'; // upload directory
        
        $returnJson = array();
        
            
            
            if ( $_SERVER['REQUEST_METHOD'] === 'POST' )
            {
                for($i=0;$i<count($_FILES['image']['tmp_name']);$i++)
                {
                    $path="image/uploads/photos/";
                    
                    if(is_uploaded_file($_FILES['image']['tmp_name'][$i]) )
                    {
                      // get uploaded file extension
                      $ext = strtolower(pathinfo($_FILES['image']['name'][$i], PATHINFO_EXTENSION));
                      // looking for format and size validity
                          if (in_array($ext, $valid_exts) AND $_FILES['image']['size'][$i] < $max_size)
                          {
                                  // unique file path
                                  $path = $path ."image_" .date('Y-m-d-H-i-s') . '_' . uniqid(). '.' .$ext;
                                  
                                  $returnJson[]= array("filepath"=>$path);
                                  
                                  
                                 
                                    // move uploaded file from temp to uploads directory
                                  if (move_uploaded_file($_FILES['image']['tmp_name'][$i], $path))
                                  {
                                    //$status = 'Image successfully uploaded!';
                                      
                                      
                                      
                                      $this->db->query( "INSERT INTO picture ".
                                                        "(userid,filepath)".                     
                                                        "VALUES('".$this->user->getId()."','".$path."');");
                                                //WHERE UserId='" . $this->user->getId(). "';");

                                    
                                
                                  }
                                  else {
                                    $status = 'Upload Fail: Unknown error occurred!';
                                  }
                                 
                                 
                          }
                          else {
                            $status = 'Upload Fail: Unsupported file format or It is too large to upload!';
                          }
                    }
                    else {
                      $status = 'Upload Fail: File not uploaded!';
                    }
                }
              }
            else {
              $status = 'Bad request!';
            }
            //echo "<img src=$path" . "?timestamp=" . rand(1, 1000). ">" ;
            
            $this->get_insertedPictures($returnJson);
            
        //echo json_encode($returnJson);
   }

   
   private function get_insertedPictures($filepaths)
   {
       $returnVal = array();
       
       foreach($filepaths as $path)
       {
           
           //$query_result = $this->db->query("SELECT * FROM picture WHERE filepath= ".$path['filepath']." ");
           /*
           foreach($query_result->rows as $result)
             {     

                 $returnVal[]=  array('filepath'=> $result['filepath'],
                                 'pictureid'=> $result['pictureid'],
                                 'description'=>$result['description']
                     );
             }
            
            */
           $returnVal[]= array('winning'=>$path['filepath']);
       }
       
       echo json_encode($returnVal);
   }
   public function add()
   {
       //echo'method called';
   }
   
   
   
   public function upload_image($filename)
   {
       
   }
   
   }