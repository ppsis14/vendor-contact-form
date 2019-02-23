<?php
    if(isset($_POST['upload'])){
        $file_array = reArrayFiles($_FILES['img_file']);
        for ($i = 0; $i < count($file_array); $i++){
            if($file_array[$i]['error']){
                ?> <br><div class="alert alert-danger">
                <?php echo $file_array[$i]['name'].'- Upload Error!';
                ?> </div> <?php
            }else {
                $extension = array("jpg", "jpeg", "png");
                $file_ext = explode('.',$file_array[$i]['name']);
                $file_ext = end($file_ext);
                $file_ext = strtolower($file_ext);
                $new_name = rand().".".$file_ext;

                if(!in_array($file_ext, $extension)){
                    ?> <br><div class="alert alert-danger" style="width: 100%;">
                    <?php echo $file_array[$i]['name'].'-'. 'Invalid file extension!';
                    ?> </div> <?php
                }
                else {
                    $path = 'uploads/images/'.$new_name;
                    if(move_uploaded_file($file_array[$i]['tmp_name'], 'uploads/images/'.$new_name)){
                        echo ' <div class="form-group style="overflow:hidden;">
                            <img src="'.$path.'" style="
                            display: block;
                            margin-left: auto;
                            margin-right: auto;
                            width: 50%;" class="img-thumbnail img-responsive"/>
                            </div> <br>
                        ';
                    }
                }
            }
        }
    }
    function reArrayFiles(&$file_post) {

        $file_ary = array();
        $file_count = count($file_post['name']);
        $file_keys = array_keys($file_post);
    
        for ($i=0; $i<$file_count; $i++) {
            foreach ($file_keys as $key) {
                $file_ary[$i][$key] = $file_post[$key][$i];
            }
        }
    
        return $file_ary;
    }
    
?>