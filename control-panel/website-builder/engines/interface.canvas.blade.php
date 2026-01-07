<?php @include_once "@interface.element.tool"; ?>
<?php @include_once "@interface.blocks.menu.tool"; ?>

<div class="content" style="align-items: normal; padding: 20px; overflow: hidden;">
  <div class="content-area-wrapper">

    <div style="padding:5px; display: flex; align-content: stretch; justify-content: space-between;">
      <p>Canvas Mode</p>

      <div>
        <div>

        <a onclick="style_mode()"
          style="text-decoration: none; border-width: 2px; padding: 10px; border-style: solid; border-color: transparent; background-color: #600cdfff; color: white; border-radius: 5px; font-size: 12.5px; display:inline-table; ">
          <svg  style="width:14px" fill="currentColor"  xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 640"><!--!Font Awesome Free v7.1.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2026 Fonticons, Inc.--><path d="M290.4 70C288.9 66.4 285.4 64 281.5 64L262.5 64C258.6 64 255 66.4 253.6 70L232.9 121.7C229.7 129.7 218.3 129.7 215.1 121.7L194.4 70C192.9 66.4 189.4 64 185.5 64L176 64C149.5 64 128 85.5 128 112L128 320L512 320L512 112C512 85.5 490.5 64 464 64L358.5 64C354.6 64 351 66.4 349.6 70L328.9 121.7C325.7 129.7 314.3 129.7 311.1 121.7L290.4 70zM128 368L128 384C128 419.3 156.7 448 192 448L256 448L256 512C256 547.3 284.7 576 320 576C355.3 576 384 547.3 384 512L384 448L448 448C483.3 448 512 419.3 512 384L512 368L128 368zM320 528C311.2 528 304 520.8 304 512C304 503.2 311.2 496 320 496C328.8 496 336 503.2 336 512C336 520.8 328.8 528 320 528z"/></svg>
          Style Mode
        </a>

        <a onclick="content_mode()"
          style="text-decoration: none; border-width: 2px; padding: 10px; border-style: solid; border-color: transparent; background-color: #600cdfff; color: white; border-radius: 5px; font-size: 12.5px; display:inline-table; ">
          <svg style="width:14px" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 640"><!--!Font Awesome Free v7.1.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2026 Fonticons, Inc.--><path d="M432.5 82.3L382.4 132.4L507.7 257.7L557.8 207.6C579.7 185.7 579.7 150.3 557.8 128.4L511.7 82.3C489.8 60.4 454.4 60.4 432.5 82.3zM343.3 161.2L342.8 161.3L198.7 204.5C178.8 210.5 163 225.7 156.4 245.5L67.8 509.8C64.9 518.5 65.9 528 70.3 535.8L225.7 380.4C224.6 376.4 224.1 372.3 224.1 368C224.1 341.5 245.6 320 272.1 320C298.6 320 320.1 341.5 320.1 368C320.1 394.5 298.6 416 272.1 416C267.8 416 263.6 415.4 259.7 414.4L104.3 569.7C112.1 574.1 121.5 575.1 130.3 572.2L394.6 483.6C414.3 477 429.6 461.2 435.6 441.3L478.8 297.2L478.9 296.7L343.4 161.2z"/></svg>

          Content Mode
        </a>

        <a onclick="rearrange_mode()"
          style="text-decoration: none; border-width: 2px; padding: 10px; border-style: solid; border-color: transparent; background-color: #600cdfff; color: white; border-radius: 5px; font-size: 12.5px; display:inline-table; ">
          <svg  style="width:14px" fill="currentColor"  xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 640"><!--!Font Awesome Free v7.1.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2026 Fonticons, Inc.--><path d="M290.4 70C288.9 66.4 285.4 64 281.5 64L262.5 64C258.6 64 255 66.4 253.6 70L232.9 121.7C229.7 129.7 218.3 129.7 215.1 121.7L194.4 70C192.9 66.4 189.4 64 185.5 64L176 64C149.5 64 128 85.5 128 112L128 320L512 320L512 112C512 85.5 490.5 64 464 64L358.5 64C354.6 64 351 66.4 349.6 70L328.9 121.7C325.7 129.7 314.3 129.7 311.1 121.7L290.4 70zM128 368L128 384C128 419.3 156.7 448 192 448L256 448L256 512C256 547.3 284.7 576 320 576C355.3 576 384 547.3 384 512L384 448L448 448C483.3 448 512 419.3 512 384L512 368L128 368zM320 528C311.2 528 304 520.8 304 512C304 503.2 311.2 496 320 496C328.8 496 336 503.2 336 512C336 520.8 328.8 528 320 528z"/></svg>
          Rearrange Mode
        </a>

      </div>
      </div>

      <a href="http://localhost:9000/vm-admin/vm-editor/code-editor/10/"
        style="text-decoration: none; border-width:2px; padding: 10px; border-style: solid; border-color: transparent; background-color: #600cdfff; color: white; border-radius: 1rem;">
        <i class="fa-solid fa-file"></i> Save</a>
    </div>


    <div id="container-canvas-frame" class="content-area" style="background: inherit;">
      <iframe id="canvas-engine-frame-holder"
        style="height: 100vh !important; max-width: calc(100% - 0px); width: 100vw; transform-origin: 0 0; border: 3px solid #6c2bd9; transition: .3s; border-radius: 13px;"
        src="/$$vm-editor$$/<?php echo ex(4); ?>/"></iframe>

      <div id="container-canvas-frame-resizer"></div>
    </div>

    <br>
  </div>
</div>

<script>
  function content_mode() {
    document.getElementById(`canvas-engine-frame-holder`).style.display = 'none'; 
    document.getElementById(`canvas-engine-frame-holder`).src = ""; 

    document.getElementById(`canvas-engine-frame-holder`).src='/$$vm-editor$$/<?php echo ex(4); ?>/content/'; 
    document.getElementById(`canvas-engine-frame-holder`).style.display = 'block'; 

    document.getElementById(`interface-style-tool`).style.display = 'none';

  }

  function style_mode(){
    document.getElementById(`canvas-engine-frame-holder`).style.display = 'none'; 
    document.getElementById(`canvas-engine-frame-holder`).src = ""; 

    document.getElementById(`canvas-engine-frame-holder`).src='/$$vm-editor$$/<?php echo ex(4); ?>/style/'; 
    document.getElementById(`canvas-engine-frame-holder`).style.display = 'block'; 

    document.getElementById(`interface-style-tool`).style.display = 'flow';

  }

  function rearrange_mode(){
    document.getElementById(`canvas-engine-frame-holder`).style.display = 'none'; 
    document.getElementById(`canvas-engine-frame-holder`).src = ""; 

    document.getElementById(`canvas-engine-frame-holder`).src='/$$vm-editor$$/<?php echo ex(4); ?>/rearrange/'; 
    document.getElementById(`canvas-engine-frame-holder`).style.display = 'block'; 

    document.getElementById(`interface-style-tool`).style.display = 'none';

  }
</script>