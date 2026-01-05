<?php
    # Construcing The Web Page For The Website 

    #Constructing Individual Elements 
    class vm_web_constructor{
        public $database;
        function __construct(){
            @include_once dirname(dirname(dirname(__FILE__))).DIRECTORY_SEPARATOR."module.database.php"; 
            $file = dirname(dirname(__FILE__)).DIRECTORY_SEPARATOR."scripts".DIRECTORY_SEPARATOR."core.database" ;
            $wbulder_data = new database_manager();
            $wbulder_data->override_connection($file);
            $this->database = $wbulder_data;
        }
        function build_layer($layer_id,$data){
            $layer_id = hash("sha256",$layer_id) ;
            $sql = "SELECT * FROM `tblLayer` WHERE (`layer_id` = '{$layer_id}')";
            $e = $this->database->query($sql) ;
            $html = json_decode($e[0]['layer_data'],JSON_PRETTY_PRINT);
            $layer = ["layer"=>$html];

            $layer["layer"]['data'] = "build_element('p')";
            $layer["layer"]['data'] = $data;

            $layer = $this->construct_element('layer',$layer);
            return $layer;
        }

        function construct_element($tag,$elements_db){
            $data = array_keys($elements_db[$tag]); 
            $constructor = $elements_db[$tag]['element']; 
            foreach ($data as $value) {
            
                if ($value !== 'element'){
                    #Template 
                    $template = "{element.".$value."}";
                    $constructor = str_ireplace($template,$elements_db[$tag][$value],$constructor); 
                }
            }
            return $constructor; 
        }

        function build_element($element_id){
            $sql = "SELECT * FROM `tblelements_cell` WHERE (`id` = '{$element_id}')";
            $e = $this->database->query($sql) ;
            $html = json_decode($e[0]['element_data'],JSON_PRETTY_PRINT);
            $parent_node = $e[0]['element_id'];
            $element = [$parent_node=>$html];
            $element = $this->construct_element($parent_node,$element);
            return $element;
        }

        function elemental_layer_build(){
            $structure_map = [];
            $structure_map[] = [
                'index'=>2,
                'script'=>'build_element',
            ];
            $structure_map[] = [
                'index'=>1,
                'script'=>'build_element',
            ];
            $structure_map[] = [
                'index'=>2,
                'script'=>'build_element',
            ];
            $structure_map[] = [
                'parent'=>'layer',
                'layer'=>'404-Section',
                'node' => [
                    0=>[
                        'index'=>1,
                        'script'=>'build_element'
                    ],
                    1=>[
                        'index'=>1,
                        'script'=>'build_element'
                    ],
                    2=>[
                        'index'=>1,
                        'script'=>'build_element'
                    ],
                    3=>[
                        'index'=>1,
                        'script'=>'build_element'
                    ],
                ]
            ];
            
            $construct = "";

            foreach ($structure_map as $key => $value) {
                if (isset($value['parent'])){
                    $inner_construct = "";
                    foreach ($value['node'] as $k => $inner_v) {
                        $e = $inner_v['script'];
                        $_construct_ = $this->$e($inner_v['index'])."\n";
                        $inner_construct .= $_construct_;
                        # code...
                    }
                    $ex = $this->build_layer($value['layer'],$inner_construct)."\n\t";
                    $construct .=  $ex;
                }else{  
                    $e = $value['script'];
                    $construct .= $this->$e($value['index'])."\n\t";
                }
            }
            return $construct;
        }
    }

    $vm_builder = new vm_web_constructor();
    echo $vm_builder->build_layer("404-Section",$vm_builder->elemental_layer_build());
    #$vm_builder->build_layer("404-Section",
    #    $vm_builder->build_element(1)
    #    ."<br>\n\t".$vm_builder->build_element(2)
    #);
    die(0);



    $page_id = "Contact-Us";



    $site_exe = "@include_once 'te.html';"; 
    #eval($site_exe); 
?>
