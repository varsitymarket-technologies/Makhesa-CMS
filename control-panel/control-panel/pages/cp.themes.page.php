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
        aspect-ratio: 4 / 2;
        object-fit: cover;
        display: block;
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
            $public_themes = load_local_themes(); 
                foreach ($public_themes as $key => $value) {
                            $template = '
                            <div class="theme-card">
                                <img src="'.$value['image'].'"
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