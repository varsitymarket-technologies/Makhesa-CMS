<html>
    <head>
        <title>Code Editor</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        <?php @include "module.engine.php" ; ?>
        <style>
            pre {
                width: 100%;
                height: max-content;
                background-color: #1f1f1f;
                outline:none;
                padding:1rem;
                font-size: 15px;
            }

            code{
                color: #b0c8ed;
                outline: none;
            }

            .anchor{
                width: fit-content;
                padding: 5px;
                background: #000000 !important;
                color: #14a12d !important;
            }
        </style>
        <pre>
        <div class="anchor">&lt;code&gt;</div><code contenteditable="true"><br><?php e(construct_editor_code()); ?>
        <div>&lt;h1&gt; Hello World &lt;/h1&gt; </div>
            <h1> Hello World </h1> 
            <p>Text And tuff <p/>
        </code>
        <div class="anchor">&lt;/code&gt;</div>
        </pre>
    <body/>
<html/>