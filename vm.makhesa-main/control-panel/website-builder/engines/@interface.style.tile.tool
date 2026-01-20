<?php 

$element_structure = []; 
$element_structure['color'] = [
    '<div class="inspector-tools">
        <div class="wrapper">
            <div class="header">
                <p class="inspector-header">Color</p>
            </div>

            <div class="fill-content">
                <div style="border: 1.2px solid {color.value}; background-color: {color.value}; " class="color-input-area">
                    <input name="inspect-color" class="edtinput_styling" type="text" placeholder="{color.value}">
                </div>
            </div>
        </div>
    </div>
    '
]; 

$element_structure['width'] = [
    '<div class="inspector-tools">
        <div class="wrapper">
            <div class="header">
                <p class="inspector-header">Width</p>
            </div>

            <div>
                <div class="input-wrapper">
                    <p></p>
                    <input name="inspect-width" class="edtinput_styling" type="text" value="{width.value}" placeholder="100">
                </div>
            </div>
        </div>
    </div>'
]; 

$element_structure['font-weight'] = [
    '<div class="inspector-tools">
        <div class="wrapper">
            <div class="header">
                <p class="inspector-header">Font Weight</p>
            </div>

            <div>
                <div class="input-wrapper">
                    <p></p>
                    <input name="inspect-font-weight" class="edtinput_styling" type="text" value="{font-weight.value}" placeholder="100">
                </div>
            </div>
        </div>
    </div>'
]; 
$element_structure['font-size'] = [
    '<div class="inspector-tools">
        <div class="wrapper">
            <div class="header">
                <p class="inspector-header">Font Size</p>
            </div>

            <div>
                <div class="input-wrapper">
                    <p></p>
                    <input name="inspect-font-size" class="edtinput_styling" type="text" value="{font-size.value}" placeholder="100">
                </div>
            </div>
        </div>
    </div>'
]; 

function construct_inspector_tile($section,$search,$value){
    global $element_structure; 
    $e = $element_structure; 
    $html = $e[$section]; 
    $e = str_ireplace($search,$value,$html);

    $output = $e[0] ?? null; 
    return $output; 
}

?>