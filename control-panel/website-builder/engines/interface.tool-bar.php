
        <div class="tool-bar">
            <div class="left">
                <div class="menu">
                    <button class="icon-button inline">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <line x1="4" y1="7" x2="20" y2="7" stroke="currentcolor" stroke-width="2"></line>
                            <line x1="4" y1="12" x2="20" y2="12" stroke="currentcolor" stroke-width="2"></line>
                            <line x1="4" y1="17" x2="20" y2="17" stroke="currentcolor" stroke-width="2"></line>
                        </svg>                    
                    </button>
                    <nav>
                        <a href="/<?php  echo(__ADMIN_URL__) ?>/vm-editor/pages/">Pages</a>
                        <hr>
                        <a href="#">Themes</a>
                        <a href="#">Libraries</a>
                        <a href="#">Plugins</a>
                        <hr>

                        <a href="quit/">Quit Session</a>
                    </nav>
                </div>

                <button onclick="window.location=`/<?php echo _page_(1).'';  ?>/dashboard/`" class="icon-button">
                    <i class="fa-solid fa-house"></i>
                </button>

                <button onclick="window.location=`/<?php echo _page_(1).'';  ?>/code.editor/`" class="icon-button">
                    <i class="fa-solid fa-code"></i>
                </button>
            </div>
            <div class="right">
                <button onclick="save_session()" class="icon-button">
                    <i class="fa-solid fa-file"></i>
                </button>

            </div>
        </div>