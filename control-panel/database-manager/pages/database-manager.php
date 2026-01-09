<div class="wrapper" style="overflow: auto">
    <div class="main-container" id="application_canvas" style="overflow: visible">

        <div class="main-header anim" style="--delay: 0s; text-align: center; padding: 1rem 3rem">
        </div>

        <style>
            table {
                margin: 0 auto;
                width: 100%;
                border-collapse: collapse;
            }

            th,
            td {
                border: 1px solid #000;
                padding: 10px;
            }

            th {
                color: white;
                background-color: #6934b7;
            }
        </style>

        <div>
            <div class="main-header anim" style="--delay: 0s; text-align: center; padding: 1rem 3rem">
                Manage Your Database
            </div>
        </div>

        <?php
        $ex = ex(5); 
        $sql = "SELECT * FROM sqlite_master WHERE (rootpage='{$ex}') AND (type='table')";
        
        $engine_tables = __DATABASE_WEBSITE__->query($sql); 
        $db_name = $engine_tables[0]['tbl_name']; 
        ?>

        <div style="overflow: auto;">


            <table>
                <tr>
                    <?php
                    $sql = "PRAGMA table_info('{$db_name}')";
                    $engine_tables = __DATABASE_WEBSITE__->query($sql);
                    foreach ($engine_tables as $key => $value) {
                        $template = "<th>" . $value['name'] . "</th>";
                        echo $template;
                    }
                    ?>
                </tr>

                <?php
                $sql = "SELECT * FROM '{$db_name}'";
                $engine_tables = __DATABASE_WEBSITE__->query($sql);
                foreach ($engine_tables as $db_key => $db_value) {
                    $keys = array_keys($db_value);
                    echo "<tr>"; 
                    foreach ($keys as $key => $value) {
                        $template = "<td>" . $db_value[$value] . "</td>";
                        echo $template;
                        # code...
                    }
                    echo "</tr>"; 
                    #print_r($keys);  
                }
                ?>

            </table>
        </div>

    </div>
</div>