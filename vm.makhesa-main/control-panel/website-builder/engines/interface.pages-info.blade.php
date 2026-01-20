<div class="content" style="align-items: normal; padding: 20px; overflow: hidden;">
    <div class="content-area-wrapper">
        <p>Page Contents</p>

        <div id="container-canvas-frame" class="content-area" style="background: inherit;">
            <iframe id="canvas-engine-frame-holder"
                style="height: 100vh !important; max-width: calc(100% - 0px); width: 100vw; transform-origin: 0 0; border: 3px solid #6c2bd9; transition: .3s; border-radius: 13px;"
                src="<?php echo (__PROTOCOL__ . __DOMAIN_NAME__ . "/@preview/" . ex(4)); ?>/"></iframe>

            <div id="container-canvas-frame-resizer"></div>
        </div>

        <br><br>
        <div style="display: flex;">
            <a href="<?php echo (__PROTOCOL__ . __DOMAIN_NAME__ . "/" . __ADMIN_URL__ . "/vm-editor/canvas/" . ex(4)) ?>/"
                style="margin-right:1rem; text-decoration: none; border-width:2px; padding: 10px; border-style: solid; border-color: #ffffffff; background-color: #600cdfff; color: white; border-radius: 1rem;">
                <i class="fa-solid fa-code"></i> Canvas</a>

            <a href="<?php echo (__PROTOCOL__ . __DOMAIN_NAME__ . "/" . __ADMIN_URL__ . "/vm-editor/code-editor/" . ex(4)) ?>/"
                style="text-decoration: none; border-width:2px; padding: 10px; border-style: solid; border-color: #ffffffff; background-color: #600cdfff; color: white; border-radius: 1rem;">
                <i class="fa-solid fa-code"></i> Code Editor</a>

        </div>

    </div>
</div>