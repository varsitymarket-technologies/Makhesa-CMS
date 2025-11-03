<?php
$internal_page = map_page()[3] ?? false;
if (empty($internal_page)) {
    $internal_page = "library";
}
?>
<style>
    /* Basic Reset and Setup */
    .theme-gallery {
        padding: 20px;
        max-width: 1200px;
        /* Optional: Constrain overall width */
        margin: 0 auto;
        font-family: sans-serif;
    }

    .theme-gallery h2 {
        text-align: center;
        margin-bottom: 40px;
        color: #333;
    }

    /* Theme Container - The core for the grid/flex layout */
    .theme-container {
        display: grid;
        /* Default for mobile: 1 column */
        grid-template-columns: 1fr;
        gap: 30px;
        /* Spacing between cards */
    }

    /* Theme Card Styling */
    .theme-card {
        background-color: #3c3c3c;
        border-radius: 8px;
        overflow: hidden;
        /* Important to keep image inside rounded borders */
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .theme-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.15);
    }

    /* Image Styling */
    .theme-card img {
        width: 100%;
        /* 3:2 aspect ratio is common, but you can adjust this */
        aspect-ratio: 3 / 2;
        object-fit: cover;
        /* Ensures the image covers the area without distortion */
        display: block;
        /* Removes any default bottom spacing for inline elements */
    }

    /* Caption Styling */
    .caption {
        padding: 15px 20px;
        text-align: center;
    }

    .caption h3 {
        margin-top: 0;
        margin-bottom: 5px;
        color: #f1f3f8ff;
        /* Primary color */
    }

    .caption p {
        margin-bottom: 0;
        color: #555;
        font-size: 0.95em;
    }

    /* ------------------------------------------- */
    /* MEDIA QUERIES FOR MOBILE RESPONSIVENESS */
    /* ------------------------------------------- */

    /* Tablet Layout (e.g., screens wider than 600px) */
    @media (min-width: 600px) {
        .theme-container {
            /* 2 columns on tablet */
            grid-template-columns: repeat(2, 1fr);
        }
    }

    /* Desktop Layout (e.g., screens wider than 992px) */
    @media (min-width: 992px) {
        .theme-container {
            /* 4 columns on desktop (or adjust based on your needs) */
            grid-template-columns: repeat(2, 1fr);
        }

        .caption {
            text-align: left;
        }
    }
</style>

<div class="wrapper" style="overflow: auto">
    <?php include_once "blade.navbar.sidebar.php"; ?>
    <div class="main-container" id="application_canvas" style="overflow: visible">
        <div style="padding: 2rem;">

        </div>
        <div class="main-header anim" style="--delay: 0s; text-align: center; padding: 1rem 3rem; position: inherit;">
            <svg style="width: 2rem;" fill="currentColor" xmlns="http://www.w3.org/2000/svg"
                viewBox="0 0 576 512"><!--!Font Awesome Free v7.1.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.-->
                <path
                    d="M21.5 181.1L78.3 67.4C89.2 45.7 111.3 32 135.6 32l304.9 0c24.2 0 46.4 13.7 57.2 35.4l56.8 113.7c3.6 7.2 5.5 15.1 5.5 23.2 0 27.3-21.2 49.7-48 51.6L512 448c0 17.7-14.3 32-32 32s-32-14.3-32-32l0-192-96 0 0 176c0 26.5-21.5 48-48 48l-192 0c-26.5 0-48-21.5-48-48l0-176.1c-26.8-1.9-48-24.3-48-51.6 0-8 1.9-16 5.5-23.2zM128 256l0 112c0 8.8 7.2 16 16 16l128 0c8.8 0 16-7.2 16-16l0-112-160 0z" />
            </svg>
            Theme Library
        </div>
        <?php
        @include_once dirname(dirname(__FILE__)) . DIRECTORY_SEPARATOR . "scripts.php";

        if ($internal_page == "marketplace") {
            $interface = '
                <div>
                    <section class="theme-gallery">
                        <h2>Marketplace Library</h2>

                        <div class="theme-container">';      
            $public_themes = load_public_themes(); 
                foreach ($public_themes as $key => $value) {
                            $template = '
                            <div onclick="window.location = `'. change_page('themes/node/'.$value['id']) .'`" class="theme-card">
                                <img style="object-fit: contain;" src="'.$value['image'].'"
                                    alt="'.$value['title'].'">
                                <div class="caption">
                                    <h3>'.$value['title'].'</h3>
                                    <p>'.$value['description'].'</p>
                                </div>
                            </div>';
                            $interface .= $template;
                            # code...
                }
            $interface .= '
                        </div>
                    </section>
                </div>
            ';

            echo $interface;
        }else if ($internal_page == "library") {
            $interface = '
                <div>
                    <div style="display: flex; flex-direction: row-reverse;">
                        <button  onclick="window.location = `'. change_page('themes/marketplace') .'`">Marketplace</button>
                    </div>
                    <section class="theme-gallery">
                        <h2>Available Library</h2>

                        <div class="theme-container">';      
            $public_themes = load_public_themes(); 
                foreach ($public_themes as $key => $value) {
                            $template = '
                            <div class="theme-card">
                                <img src="data:image/png;base64,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"
                                    alt="'.$value['title'].'">
                                <div class="caption">
                                    <h3>'.$value['title'].'</h3>
                                    <p>'.$value['description'].'</p>
                                </div>
                            </div>';
                            $interface .= $template;
                            # code...
                }
            $interface .= '
                        </div>
                    </section>
                </div>
            ';

            echo $interface;
        }else if ($internal_page == "node") {
            $interface = '
                <div>
                    <section class="theme-gallery">
                        <h2>Website Theme</h2>
                        
                        <div style="display: contents;">
                            <div class="video anim" style="--delay: .4s; margin:0.2rem 0px; ">
                                <div class="video-wrapper"></div>
                        
                                <div class="video-name">
                                    <div class="small-header anim" style="--delay: .3s; margin-bottom:0px">
                                        <span style="font-size:10px; ">Preview Yor Website\'s Designs Before You Change Them.</span><br>
                                        Theme Preview
                                    </div>
                                </div>
                                
                                <div class="video-name">
                                    <iframe id="canvas-engine-frame-holder" style="margin: 0px 0.8rem -8rem 0.8rem; display: block; height: calc(100vh  + calc(100vh * 0.1)) !important; max-width: calc(400vw - 25px); width: 120%; transform: scale(0.8); transform-origin: 0 0; border: 3px solid #6c2bd9; transition: .3s; border-radius: 13px; text-align: center;" src="http://localhost:9000/library/vm_theme_68ff407d27e6a/"></iframe>
                                    <div>
                                        <button>Get Theme</button>
                                    </div>

                                </div>
                                <br>
                            </div>
                        </div>
                    </section>
                </div>
            ';  
            echo $interface ; 

        }
        ?>
        

    </div>
</div>