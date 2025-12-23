<?php @include_once "@interface.element.tool"; ?>

<div class="content" style="align-items: normal; padding: 20px; overflow: hidden;">
  <div class="content-area-wrapper">
    <p>Page Contents</p>

    <div id="container-canvas-frame" class="content-area" style="background: inherit;">
      <iframe id="canvas-engine-frame-holder"
        style="height: 100vh !important; max-width: calc(100% - 0px); width: 100vw; transform-origin: 0 0; border: 3px solid #6c2bd9; transition: .3s; border-radius: 13px;"
        src="http://localhost:9000/@preview/10/"></iframe>

      <div id="container-canvas-frame-resizer"></div>
    </div>

    <br>
    <a href="http://localhost:9000/vm-admin/vm-editor/code-editor/10/"
      style="text-decoration: none; border-width:2px; padding: 10px; border-style: solid; border-color: #ffffffff; background-color: #600cdfff; color: white; border-radius: 1rem;">
      <i class="fa-solid fa-code"></i> Code Editor</a>

  </div>
</div>

<!-- 

<style>

#container-canvas-frame {
  position: relative;
  width: 600px;
  height: 400px;
  border: 1px solid #ccc;
  overflow: hidden; /* Prevents scrollbars during resize */
}

iframe {
  width: 100%;
  height: 100%;
  border: none;
}

#container-canvas-frame-resizer {
  position: absolute;
  bottom: 0;
  right: 0;
  width: 20px;
  height: 20px;
  background-color: #3498db; /* Blue resizer */
  cursor: se-resize;
  z-index: 10; /* Ensure it's above the iframe */
}
</style>

<script>
const container = document.getElementById('container-canvas-frame');
const iframe = document.querySelector('iframe');
const resizer = document.getElementById('container-canvas-frame-resizer');

let isResizing = false;
let startX, startY, startWidth, startHeight;

resizer.addEventListener('mousedown', function(e) {
  isResizing = true;
  startX = e.clientX;
  startY = e.clientY;
  startWidth = container.offsetWidth;
  startHeight = container.offsetHeight;
  document.addEventListener('mousemove', resize);
  document.addEventListener('mouseup', stopResize);
});

function resize(e) {
  if (!isResizing) return;

  const width = startWidth + e.clientX - startX;
  const height = startHeight + e.clientY - startY;

  container.style.width = width + 'px';
  container.style.height = height + 'px';
}

function stopResize(e) {
  isResizing = false;
  document.removeEventListener('mousemove', resize);
  document.removeEventListener('mouseup', stopResize);
}
</script>

            -->