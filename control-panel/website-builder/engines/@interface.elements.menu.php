<?php 




$theme_id = "agency"; 
$e = ['p','h1','h2','blockquote'];
$element = ''; 
foreach ($e as $key => $value) {
    $block_caption = 'title'; 
    $element_id = $value; 
    $element .= '
    <div onclick="loading_block_data(`'.$element_id.'`)" class="component-card">
        <iframe src="/@element/'.$theme_id.'/'.$element_id.'/?element_id=builder&amp;preview=true"></iframe>
        <div class="card-label">'.$block_caption.'</div>
    </div>'; 
}

$element = '<h3 style="color:white; ">Text Elements</h3><br><div class="grid-container" id="grid">'.$element.'</div>'; 
?>

    <div onclick="close_menu_blocks()" style="left:calc(100vw - 6rem); color: white; display: flex; align-items: center; background-color: #515151; padding: 5px; border-radius: 21px; z-index: 1; position: absolute; top: 2vh !important;">
        <div style="width: 1.5rem; filter: invert(1); ">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 640"><!--!Font Awesome Free v7.1.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2026 Fonticons, Inc.--><path d="M183.1 137.4C170.6 124.9 150.3 124.9 137.8 137.4C125.3 149.9 125.3 170.2 137.8 182.7L275.2 320L137.9 457.4C125.4 469.9 125.4 490.2 137.9 502.7C150.4 515.2 170.7 515.2 183.2 502.7L320.5 365.3L457.9 502.6C470.4 515.1 490.7 515.1 503.2 502.6C515.7 490.1 515.7 469.8 503.2 457.3L365.8 320L503.1 182.6C515.6 170.1 515.6 149.8 503.1 137.3C490.6 124.8 470.3 124.8 457.8 137.3L320.5 274.7L183.1 137.4z"/></svg>
        </div>
        Close
    </div>
    <div><?php echo $element ?></div>
