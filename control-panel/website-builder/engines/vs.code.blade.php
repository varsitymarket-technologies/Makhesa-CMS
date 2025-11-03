<div class="content" style="align-items: normal; padding: 20px; overflow: hidden;">
    <div class="content-area-wrapper">
        <p> <svg fill="#6130aa" style="width:1rem;" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"><!--!Font Awesome Free v7.1.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.--><path d="M360.8 1.2c-17-4.9-34.7 5-39.6 22l-128 448c-4.9 17 5 34.7 22 39.6s34.7-5 39.6-22l128-448c4.9-17-5-34.7-22-39.6zm64.6 136.1c-12.5 12.5-12.5 32.8 0 45.3l73.4 73.4-73.4 73.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0l96-96c12.5-12.5 12.5-32.8 0-45.3l-96-96c-12.5-12.5-32.8-12.5-45.3 0zm-274.7 0c-12.5-12.5-32.8-12.5-45.3 0l-96 96c-12.5 12.5-12.5 32.8 0 45.3l96 96c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L77.3 256 150.6 182.6c12.5-12.5 12.5-32.8 0-45.3z"/></svg> Code Editor</p>



        <div id="container-canvas-frame" class="content-area" style="background: inherit;">
            <iframe id="canvas-engine-frame-holder" style="height: 100vh !important; max-width: calc(100% - 0px); width: 100vw; transform-origin: 0 0; border: 3px solid #6c2bd9; transition: .3s; border-radius: 13px;" src="http://localhost:8080/control-panel/website-builder/engines/vs.code.editor.php"></iframe>
            
            <div id="container-canvas-frame-resizer"></div>
        </div>

    </div>
</div>

<script>
    function save_session(){
        //Communicate To The Database To execute the saving session. 

        alert('Saving The Session')
    }
</script>