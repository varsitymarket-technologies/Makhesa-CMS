<?php 

#Formating The Blocks To Respond To The Elemental View 


#Include To The Database 
#HTML STRUCTURE 
# <p style="text-align:right">This is some text in a paragraph.</p>



#Text Elements 

$elements_db = [
    'p' => [
        "element" => '<{element.tag} {element.event} style="{element.style}" class="{element.class}">{element.innerTEXT}</{element.tag}>',
        "tag" => 'p',
        "event" => '',
        "style" => 'font-size:20rem;', 
        "class" => 'introduction', 
        "innerTEXT" => 'SAMPLE TEXT',
    ],
    'breadcrumbs'=>[
        "element" => '
        <{element.tag} {element.event} style="{element.style}" class="{element.class}">
            <ol>
                <li><a href="{element.parent_page}">{element.parent_title}</a></li>
                <li class="current">{element.page}</li>
            </ol>
        </{element.tag}>', 
        "event" => '',
        "tag" => "nav",
        "style" => '', 
        "class" => "breadcrumbs", 
        "parent_page" => "index.html",
        "parent_title" => "Home",
        "page" => "Page Title", 
    ],
    
    'h1' => [
        "element" => '<{element.tag} {element.event} style="{element.style}" class="{element.class}">{element.innerTEXT}</{element.tag}>',
        "tag" => 'h1',
        "event" => '',
        "style" => '', 
        "class" => '', 
        "innerTEXT" => 'Heading 1',
    ], 
    'h2' => [
        "element" => '<{element.tag} {element.event} style="{element.style}" class="{element.class}">{element.innerTEXT}</{element.tag}>',
        "tag" => 'h2',
        "event" => '',
        "style" => '', 
        "class" => '', 
        "innerTEXT" => 'Heading 2',
    ], 
    'h3' => [
        "element" => '<{element.tag} {element.event} style="{element.style}" class="{element.class}">{element.innerTEXT}</{element.tag}>',
        "tag" => 'h3',
        "event" => '',
        "style" => '', 
        "class" => '', 
        "innerTEXT" => 'Heading 3',
    ], 
    'h4' => [
        "element" => '<{element.tag} {element.event} style="{element.style}" class="{element.class}">{element.innerTEXT}</{element.tag}>',
        "tag" => 'h4',
        "event" => '',
        "style" => '', 
        "class" => '', 
        "innerTEXT" => 'Heading 4',
    ], 
    'h5' => [
        "element" => '<{element.tag} {element.event} style="{element.style}" class="{element.class}">{element.innerTEXT}</{element.tag}>',
        "tag" => 'h5',
        "event" => '',
        "style" => '', 
        "class" => '', 
        "innerTEXT" => 'Heading 5',
    ],
    'h6' => [
        "element" => '<{element.tag} {element.event} style="{element.style}" class="{element.class}">{element.innerTEXT}</{element.tag}>',
        "tag" => 'h6',
        "event" => '',
        "style" => '', 
        "class" => '', 
        "innerTEXT" => 'Heading 6',
    ]
]; 


file_put_contents(dirname(dirname(dirname(dirname(__FILE__)))).DIRECTORY_SEPARATOR."website".DIRECTORY_SEPARATOR."web".DIRECTORY_SEPARATOR."hub".DIRECTORY_SEPARATOR."structure".DIRECTORY_SEPARATOR."element.skel",json_encode($elements_db,JSON_PRETTY_PRINT)) ; 

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

function e($data){
    echo $data ; 
    return  ; 
}



# Example Of Element Construction 
e(construct_element('breadcrumbs',$elements_db)); 
e(construct_element('p',$elements_db)); 
e(construct_element('h2',$elements_db)); 
e(construct_element('h3',$elements_db)); 
e(construct_element('h6',$elements_db)); 
?>