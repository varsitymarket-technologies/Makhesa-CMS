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

        <div 
            style="background: #0000006b;padding: 1rem 2rem 3rem 2rem;border-radius: 2rem;border-style: solid;border-color: #242424;">
            <div class="small-header" style=" margin-bottom:0px">
                <span style="font-size:10px; ">Welcome To </span><br>
                Theme Page</div>
            <br><span class="" style="font-size: 10px;">Style your website with different designs.</span>
        </div>
        <br>

        <?php
        @include_once dirname(dirname(__FILE__)) . DIRECTORY_SEPARATOR . "scripts.php";

        if ($internal_page == "marketplace") {
            $interface = '
                <div>
                    <section class="theme-gallery">
                        <h2>Marketplace Library</h2>';
            $public_themes = load_public_themes();
            if (empty($public_themes)) {
                $html = ' null data ';
                $html = '<div class="anim" style="display: flex; align-items: center; flex-direction: column;"><h2><svg fill="white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 640" style="height: 15rem;"><!--!Font Awesome Free v7.1.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.--><path d="M160 96C124.7 96 96 124.7 96 160L96 480C96 515.3 124.7 544 160 544L480 544C515.3 544 544 515.3 544 480L544 160C544 124.7 515.3 96 480 96L160 96zM224 176C250.5 176 272 197.5 272 224C272 250.5 250.5 272 224 272C197.5 272 176 250.5 176 224C176 197.5 197.5 176 224 176zM368 288C376.4 288 384.1 292.4 388.5 299.5L476.5 443.5C481 450.9 481.2 460.2 477 467.8C472.8 475.4 464.7 480 456 480L184 480C175.1 480 166.8 475 162.7 467.1C158.6 459.2 159.2 449.6 164.3 442.3L220.3 362.3C224.8 355.9 232.1 352.1 240 352.1C247.9 352.1 255.2 355.9 259.7 362.3L286.1 400.1L347.5 299.6C351.9 292.5 359.6 288.1 368 288.1z"></path></svg></h2><h2>Theme Server Disconected</h2><br>System Failed To Retrieve Theme Data</div>';
                $interface .= $html;

            } else {

                #print_r($public_themes); 
                $interface .= '<div class="theme-container">';
            }
            foreach ($public_themes as $key => $value) {
                $theme_data = json_decode(json_encode($public_themes[$key]), true);

                $ext = change_page('themes/source/' . $theme_data['id']);
                $template = '
                            <div onclick="window.location = `' . $ext . '`" class="theme-card">
                                <img style="object-fit: contain;" src="' . __THEME_SOURCE__ . '/' . $theme_data['image'] . '"
                                    alt="' . $theme_data['title'] . '">
                                <div class="caption">
                                    <h3>' . $theme_data['title'] . '</h3>
                                    <p>' . $theme_data['description'] . '</p>
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
        } else if ($internal_page == "library") {
            $interface = '
                <div>
                    <div style="display: flex; flex-direction: row-reverse;">
                        <button  onclick="window.location = `' . change_page('themes/marketplace') . '`">Marketplace Themes</button>
                    </div>
                    <section class="theme-gallery">
                        <h2>Available Library</h2>

                        <div class="theme-container">';
            $public_themes = load_local_themes();
            foreach ($public_themes as $key => $value) {
                $template = '
                            <div onclick="window.location = `' . change_page('themes/node/'.$value['id'].'') . '`" class="theme-card" >
                                <img src="' . $value['image'] . '"
                                    alt="' . $value['title'] . '">
                                <div class="caption">
                                    <h3>' . $value['title'] . '</h3>
                                    <p>' . $value['description'] . '</p>
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
        } else if ($internal_page == "node") {
            @$preview = node_theme(ex(4)) ?? false;
            $interface = '
                <div>
                    <section class="theme-gallery">
            
                        
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
                                    <div id="node_preview"></div>
                                </div>
                                <br>
                                <div style="display: flex; padding: 20px;">

                                    <button onclick="activate_theme(`' . ex(4) . '`); ">Activate Theme</button>

                                    <button style="margin-left:10px; "> Delete </button>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
            ';
            echo $interface;

        } else if ($internal_page == "source") {
            @$source = (ex(4)) ?? false;
            $interface = '
                <div>
                    <section class="theme-gallery">
            
                        
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
                                    <div id="source_preview">
                                    </div>
                                    <br>
                                    <div>
                                        <button onclick="activate_theme(`' . ex(4) . '`); ">Download Theme</button>
                                    </div>

                                </div>
                                <br>
                            </div>
                        </div>
                    </section>
                </div>
            ';
            echo $interface;

        }

        ?>
        <style>
            .preview-frame {
                width: 100%;
                height: 75vh;
                border-radius: 10px;
            }
        </style>
        <script>
            function construct_preview(data) {

                // 3. Create the iframe element
                const iframe = document.createElement('iframe');
                iframe.className = 'preview-frame flex-grow';
                iframe.id = `preview-2`;
                let container = document.getElementById('node_preview');
                if (container !== null) {
                    iframe.src = '<?php echo __PROTOCOL__ . __DOMAIN_NAME__ ?>/' + data + '';
                    container.appendChild(iframe);

                } else {
                    iframe.src = '<?php echo __THEME_SOURCE__ . "/library/" . $source . "/interface.guide"; ?>';
                    let s_container = document.getElementById('source_preview');
                    s_container.appendChild(iframe);

                }



                // iframe.src = '<?php echo __PROTOCOL__ . __DOMAIN_NAME__ ?>/'+data+''; 
                // iframe.onclick = function() { window.location.href = "/<?php echo __ADMIN_URL__ ?>/vm-editor/page/4/";  }; 

                //let container = document.getElementById('node_preview');
                //container.appendChild(iframe);
            }


            async function activate_theme(theme) {
                operate_loader();

                const data = new URLSearchParams();
                data.append('request', 'activate-theme');
                data.append('id', theme);

                let registration_confirmation = await sendAndReceiveData(data, "<?php echo __PROTOCOL__ . __DOMAIN_NAME__ . '/@scripts/scripts.php'; ?>");
                try {
                    registration_confirmation = JSON.parse(registration_confirmation);
                    operate_loader('stop');
                    if (registration_confirmation.success) {
                        success_feedback('Theme has been activated');
                        // window.location = "<?php echo __PAGE__ . map_page()[2]; ?>/";
                    } else {
                        error_feedback(registration_confirmation.message);
                    }
                } catch (error) {
                    console.error(error);
                    error_feedback();
                    operate_loader('stop');
                }
            }


            construct_preview(`<?php echo $preview; ?>`);
        </script>

    </div>
</div>