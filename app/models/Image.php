<?php 
    use Illuminate\Database\Eloquent\SoftDeletingTrait;
	class Image extends Eloquent{
        use SoftDeletingTrait;
		protected $table = 'image';
		protected $fillable = array('path', 'description');
        protected $dates = ['deleted_at'];

		public function product(){
			return $this->belongsTo('Product');
		}


		public function upload($det=NULL){
           
            if(Input::file('uploadImage') != ''){
                $uploadFile = Input::file('uploadImage');
                
                
                //code to crop image
                $valid_exts = array('jpeg', 'jpg', 'png', 'gif');
                $max_file_size = 20000 * 1024; #200kb
                $nw = $nh = 400; # image with # height
                $size = getimagesize($_FILES['uploadImage']['tmp_name']);
                $data = file_get_contents($_FILES['uploadImage']['tmp_name']);
                // echo $path;

                $x = (int) $_POST['x'];
                $y = (int) $_POST['y'];
                $w = (int) $_POST['w'] ? $_POST['w'] : $size[0];
                $h = (int) $_POST['h'] ? $_POST['h'] : $size[1];

                $data = file_get_contents($_FILES['uploadImage']['tmp_name']);
                $vImg = imagecreatefromstring($data);
                $dstImg = imagecreatetruecolor($nw, $nh);
                    // $dstImg1 = imagecreatetruecolor($nw, $nh);
                
                imagecopyresized($dstImg, $vImg, 0, 0, $x, $y, $nw, $nh, $w, $h);
            
            }
			if ($uploadFile->isValid())
			{	
                $company = Company::find(Session::get('company_id'));
                $folderName = $company->folder_name;
                $path = public_path() . '/resources/';
                
                $destinationPath = '';
                if($folderName == ''){
                    $folderName = 'company-'.$company->company_name;
                    $company->folder_name = $folderName;
                    $company->save();
                }
                if(!file_exists($path.$folderName)){
                    mkdir($path.$folderName, 0777, true);
                }

                try {
                 
                    $uploadFile->move($path.$folderName,$uploadFile->getClientOriginalName());
                 
                } catch(Exception $e) {
                 
                    // Handle your error here.
                    // You might want to log $e->getMessage() as that will tell you why the file failed to move.
                    $error['error'] = $e->getMessage();
                    return $error;
                }
                
                
                $forcrop = $uploadFile->getClientOriginalName();
                $nameArray = explode('.', $forcrop);
                $destinationPath = $uploadFile->getClientOriginalName();
                if(Input::file('uploadImage') != ''){
                    imagejpeg($dstImg, $path.$folderName.'/'.$nameArray[0].'_thumb.'.$nameArray[1],100);
                    imagedestroy($dstImg);
                    $destinationPath = $nameArray[0].'_thumb.'.$nameArray[1];
                }

                $img = new Image;
    		
    			$img->path = $destinationPath;
                 $img->save();

				return $img;
			}
			
		}

        public function imgloc($id=null){
            if($id == null || $id == 0){
                return false;
            }else{
                $imgs = $this->where('id', $id)->get();
                $loc=URL::to('resources').'/';
                $company = Company::find(Session::get('company_id'));
                $loc.=$company->folder_name.'/';
                $loc.=$imgs[0]->path;

                return $loc;
            }
        }
	}
?>