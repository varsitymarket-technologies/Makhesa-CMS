<?php
class element {
    private $dictionary; 
    public $dataset; 
    
    public $tag; 
    public $structure; 
    public $contents; 
    public $class; 
    public $attributes;
    public $style; 

    public function create($element){
        $e = $this->extract_data_node($element); 
        
    }
    public function change_dictionary($path){
        $this->dictionary = $path; 
    }

    public function build(){
        $element = $this->structure ?? '<{element.tag} class="{element.class}" {element.attributes} style="{element.style}">{element.contents}</{element.tag}>';
        $element_tag = $this->tag ?? ''; 
        $element_class = $this->class; 
        $element_attributes = $this->attributes; 
        $element_style = $this->style; 
        $element_contents = $this->contents; 
        
        $e = str_ireplace(
            //Searching Values Of The Element Tags 
            ['{element.tag}','{element.class}','{element.attributes}','{element.style}','{element.contents}'],
            //Replacing Values Of The Element Data
            [$element_tag,$element_class,$element_attributes,$element_style,$element_contents],
            //Element Structure To Act as The Backbone
        $element);
        return $e; 
    }

    private function extract_data_node($node_id){
        $file = $this->dictionary.$node_id.".node.json";
        if (file_exists($file)){
            $e = json_decode(file_get_contents($file),JSON_PRETTY_PRINT);
            if (empty($this->class)){
                $this->class = $e['class']; 
            }
            if (empty($this->attributes)){
                $this->attributes = $e['attributes']; 
            }
            if (empty($this->content)){
                $this->content = $e['content']; 
            }
            if (empty($this->style)){
                $this->style = $e['style']; 
            }
            $this->tag = $e['tag']; 
            $this->structure = $e['structure'];
            return true; 
        } 
        return null; 
    }
}

$e = new element();
$e->class = ""; 
$e->change_dictionary('/home/hastings/vm.makhesa/control-panel/website-builder/elements/'); 
$e->create("p"); 
echo $e->build(); 
die(0); 




function create_element(){
    $element = []; 
    $element['class'] = ''; 
    $element['attributes'] = '';
    $element['content'] = '';
    $element['tag'] = '';
    $element['structure'] = '';  
    file_put_contents("/home/hastings/vm.makhesa/control-panel/website-builder/elements/blank",json_encode($element,JSON_PRETTY_PRINT));   
    print_r($element); 
}
  

function construct_element($dataset,$contents,$attributes='',$class='',$style=''){
    $element = $dataset['structure'] ?? '<{element.tag} class="{element.class}" {element.attributes} style="{element.style}">{element.contents}</{element.tag}>';
    $element_tag = $dataset['tag'] ?? ''; 
    $element_class = $class; 
    $element_attributes = $attributes; 
    $element_style = $style; 
    $element_contents = $contents; 
    $e = str_ireplace(
        //Searching Values Of The Element Tags 
        ['{element.tag}','{element.class}','{element.attributes}','{element.style}','{element.contents}'],
        //Replacing Values Of The Element Data
        [$element_tag,$element_class,$element_attributes,$element_style,$element_contents],
        //Element Structure To Act as The Backbone
    $element);
    return $e; 
}

$e = construct_element(['structure'=>'<{element.tag} class="{element.class}" {element.attributes}></{element.tag}>','tag'=>'iframe'],null,'src="/path/to/link/" neofetch="true"'); 
echo $e; 
die(0); 

$element = '<{element.tag} class="{element.class}" {element.attributes} style="{element.style}">{element.contents}</{element.tag}>';
$element_attributes = ''; 
$element_attributes .= 'href="tva" ';
$element_attributes .= 'name="element.section" ';
$element_attributes .= 'title="element_section" ';
$element_style = ''; 
$element_style .= 'font-size:10px; '; 
$element_style .= 'padding:10px; ';
$element_contents = "Testiing The Data For This Element Content"; 

$e = str_ireplace(['{element.tag}','{element.class}','{element.attributes}','{element.style}','{element.contents}'],['p','intro',$element_attributes,$element_style,$element_contents],$element); 
#echo $e; 
?>