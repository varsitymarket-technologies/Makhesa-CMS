<?php 
#   TITLE   : Elements Module Class
#   DESC    : The Element class module that stores all the data and stucture of the website builder 
#   PROPRIETOR: VARSITYMARKET_TECHNOLOGIES
#   VERSION : 1.0.1.1
#   AUTHOR  : HARDY HASTINGS  
#   RELEASE : 2026/01/11

class element {
    public $dictionary; 
    public $dataset; 
    
    public $tag; 
    public $structure; 
    public $contents; 
    public $class; 
    public $attributes;
    public $style; 
    
    public function __construct(){
        $this->dictionary = dirname(__FILE__).'/'; 
    }

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
        $file = $this->dictionary."node.".$node_id.".json";
        if (file_exists($file)){
            $e = json_decode(file_get_contents($file),JSON_PRETTY_PRINT);
            if (empty($this->class)){
                $this->class = $e['class']; 
            }
            if (empty($this->attributes)){
                $this->attributes = $e['attributes']; 
            }
            if (empty($this->content)){
                $this->contents = $e['content']; 
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


?>