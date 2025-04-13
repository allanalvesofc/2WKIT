<?php


// Modal com botão, com redirecionamento
function MsgBoxR($title, $text, $botton_text, $close_btn_text, $redirect_to_link, $backgroundcolor, $color) 
{
    // Mapas para simplificar valores de título e link
    $titles = [
        "W" => "WARNING",
        "S" => "SUCCESS",
        "E" => "ERROR",
        ""  => "NOTIFICATION FROM SYSTEM"
    ];
    $links = [
        "this" => "",
        "index" => "./index.php",
        "" => ""
    ];

    // Ajustando valores com base nos mapas
    $title = $titles[$title] ?? $title;
    $redirect_to_link = $links[$redirect_to_link] ?? $redirect_to_link;

    // Validação de cores
    if (!preg_match('/^#[0-9A-Fa-f]{6}$/', $backgroundcolor)) {
        $backgroundcolor = "#000";
    }
    if (!preg_match('/^#[0-9A-Fa-f]{6}$/', $color)) {
        $color = "#FFF";
    }

    // Saída do modal
    echo '
    <div id="customModal" class="modal" style="display: block; position: fixed; top: 0; left: 0; width: 100%; height: 100%; background-color: rgba(0, 0, 0, 0.5); z-index: 9999;">
        <div class="modal-content" style="background-color: white; padding: 20px; border-radius: 10px; max-width: 400px; margin: 100px auto; text-align: center; position: relative;">
           
           <!-- Botão de Fechar (X) -->
            <span class="close" onclick="closeModal();" style="position: absolute; top: 10px; right: 20px; font-size: 30px; cursor: pointer;">&times;</span>
            <h2 style="font-size: 24px; color: #4caf50;">' . htmlspecialchars($title) . '</h2>
            <p style="font-size: 16px; color: #555;">' . htmlspecialchars($text) . '</p>
            
            <!-- Botão OK -->
            <button onclick="closeModal(); redirectToLink();" style="background-color: ' . $backgroundcolor . '; color: ' . $color . '; padding: 10px 20px; border: none; border-radius: 5px; cursor: pointer; font-size: 16px; transition: background-color 0.3s;">
                ' . htmlspecialchars($botton_text) . '
            </button>
            
            <!-- Botão SECUNDÁRIO -->
            <button onclick="closeModal();" style="background-color: ' . $backgroundcolor . '; color: ' . $color . '; padding: 10px 20px; border: none; border-radius: 5px; cursor: pointer; font-size: 16px; transition: background-color 0.3s;">
                ' . htmlspecialchars($close_btn_text) . '
            </button>
        </div>
    </div>

    <script>
        // Função para fechar o modal
        function closeModal() {
            document.getElementById("customModal").style.display = "none";
        }

        function redirectToLink() {
            const url = "' . htmlspecialchars($redirect_to_link) . '";
            if (url) {
                window.location.href = url;
            }
        }
    </script>
    ';
}

// Modal com botão, sem redirecionamento
function MsgBox($title, $text, $botton_text, $close_btn_text, $backgroundcolor, $color) 
{
    // Mapas para simplificar valores de título
    $titles = [
        "W" => "WARNING",
        "S" => "SUCCESS",
        "E" => "ERROR",
        ""  => "NOTIFICATION FROM SYSTEM"
    ];

    // Ajustando valores com base no mapa
    $title = $titles[$title] ?? $title;

    // Validação de cores
    if (!preg_match('/^#[0-9A-Fa-f]{6}$/', $backgroundcolor)) {
        $backgroundcolor = "#000";
    }
    if (!preg_match('/^#[0-9A-Fa-f]{6}$/', $color)) {
        $color = "#FFF";
    }

    // Saída do modal
    echo '
    <div id="customModal" class="modal" style="display: block; position: fixed; top: 0; left: 0; width: 100%; height: 100%; background-color: rgba(0, 0, 0, 0.5); z-index: 9999;">
        <div class="modal-content" style="background-color: white; padding: 20px; border-radius: 10px; max-width: 400px; margin: 100px auto; text-align: center; position: relative;">
           
           <!-- Botão de Fechar (X) -->
            <span class="close" onclick="closeModal();" style="position: absolute; top: 10px; right: 20px; font-size: 30px; cursor: pointer;">&times;</span>
            <h2 style="font-size: 24px; color: #4caf50;">' . htmlspecialchars($title) . '</h2>
            <p style="font-size: 16px; color: #555;">' . htmlspecialchars($text) . '</p>
            
            <!-- Botão OK -->
            <button onclick="closeModal();" style="background-color: ' . $backgroundcolor . '; color: ' . $color . '; padding: 10px 20px; border: none; border-radius: 5px; cursor: pointer; font-size: 16px; transition: background-color 0.3s;">
                ' . htmlspecialchars($botton_text) . '
            </button>
            
            <!-- Botão SECUNDÁRIO -->
            <button onclick="closeModal();" style="background-color: ' . $backgroundcolor . '; color: ' . $color . '; padding: 10px 20px; border: none; border-radius: 5px; cursor: pointer; font-size: 16px; transition: background-color 0.3s;">
                ' . htmlspecialchars($close_btn_text) . '
            </button>
        </div>
    </div>

    <script>
        // Função para fechar o modal
        function closeModal() {
            document.getElementById("customModal").style.display = "none";
        }
    </script>
    ';
}

// Animada com temporizador
function MsgT($title, $text, $duration, $backgroundcolor, $color) 
{
    // Se a cor não for definida, atribuímos uma cor padrão.
    if ($backgroundcolor == "") {
        $backgroundcolor = "#2196f3"; // Azul padrão
    }

    echo '
    <div class="notification" style="position: fixed; top: 10px; left: 50%; transform: translateX(-50%); background-color: ' . $backgroundcolor . '; color: ' . $color . '; padding: 15px; border-radius: 5px; font-size: 16px; z-index: 9999; opacity: 1; transition: opacity 0.5s;">
        <strong>' . htmlspecialchars($title) . '</strong><br>' . htmlspecialchars($text) . '
    </div>

    <script>
        setTimeout(function() {
            const notification = document.querySelector(".notification");
            if (notification) {
                notification.style.opacity = 0;
                setTimeout(function() {
                    notification.remove();
                }, 500); // Remove após o fade-out
            }
        }, ' . ($duration * 1000) . '); // Fecha após o tempo
    </script>
    ';
}

//Animada
function MsgA($title, $text, $duration, $backgroundcolor, $color) 
{
    if ($backgroundcolor == "") {
        $backgroundcolor = "#2196f3"; // Azul padrão
    }

    echo '
    <div class="animated-notification" style="position: fixed; top: 10px; left: 50%; transform: translateX(-50%); background-color: ' . $backgroundcolor . '; color: ' . $color . '; padding: 15px; border-radius: 5px; font-size: 16px; z-index: 9999; opacity: 1; animation: fadeIn 1.5s ease-in-out, fadeOut 5s ease-in-out ' . ($duration) . 's forwards;">
        <strong>' . htmlspecialchars($title) . '</strong><br>' . htmlspecialchars($text) . '
    </div>

    <style>
        @keyframes fadeIn {
            from { opacity: 0; transform: translateX(-50%) translateY(30px); }
            to { opacity: 1; transform: translateX(-50%) translateY(0); }
        }

        @keyframes fadeOut {
            from { opacity: 1; }
            to { opacity: 0; }
        }
    </style>

    <script>
        setTimeout(function() {
            const notification = document.querySelector(".animated-notification");
            if (notification) {
                notification.remove();
            }
        }, ' . (($duration + 5) * 1000) . '); // Fecha após o tempo (incluir 5 segundos de fadeOut)
    </script>
    ';
}



?>