<?php
/**
 * All right reserved by Perfect Team.
 * Author class: Forbs
 * Contacts: http://mcperfects.com/
 */

define('ROOT', realpath(__DIR__ .'/../'));
require_once(ROOT .'/vendor/autoload.php');

function view($path, $data = [])
{   
    ob_start();
    extract($data);
    include($path);
    $content = ob_get_contents();
    ob_end_clean();

    return $content;
}

function connect($database)
{
    try {
        return new \Engine\Core\Database\Connection($database);
    } catch (PDOException $e) {
        return false;
    }
}

function writeconfig()
{
    file_put_contents(ROOT .'/app/Config/database.php', 
    str_replace([
        'your_host', 'your_port', 'your_user', 
        'your_pass', 'your_name', 'your_pref'
    ], [
        $_POST['db_host'], $_POST['db_port'], 
        $_POST['db_user'], $_POST['db_pass'], 
        $_POST['db_name'], $_POST['db_prefix'],
    ], file_get_contents('./config.example')));

    return false;
}

function viewstep($file = null, $data = [])
{

    $path = __DIR__ .'/views/';
    $file = $path . $file .'.php';
    
    if ($file != null && file_exists($file)) {
        $file = str_replace('@content', view($file, $data), view($path . 'index.php'));
    }

    return $file;
}

$_errors = [];
if (file_exists(ROOT .'/app/Config/database.php')) {
    $database = include(ROOT .'/app/Config/database.php');
}

if (file_exists(ROOT .'/app/Config/app.php')) {
    $app = include(ROOT .'/app/Config/app.php');
}

if (!isset($_GET['step'])) {
    $_GET['step'] = 0;
}


if ($_GET['step'] > 0 && !$db = connect($database)) {
    redirect('/install/index.php');
    exit;
}


switch($_GET['step']) {
    case 0:
        if (!empty($database) && connect($database)) {
            redirect('/install/index.php?step=1');
            exit;
        }

        if (!class_exists('\\PDO')) {
            $errors[] = ['message' => 'На вашем хостинге нет библиотеки PDO. Вы не можете продолжить установку!'];
        }

        if (php_os() !== 'WIN' && !is_writable(ROOT)) {
            $message = 'Необходимо установить права <b>777</b> на папку '.
                basename(ROOT).' и ее дочерние файлы и папки текущие права: '. 
                substr(sprintf('%o', fileperms(ROOT)), -4);
            $_errors[] = ['message' => $message];
        }

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if (empty($_POST['db_host']) OR
                empty($_POST['db_port']) OR
                empty($_POST['db_user']) OR
                empty($_POST['db_name'])
            ) {
                $_errors[] = ['message' => 'Заполните все поля'];
            } else {
                $mysqli = @new MySQLi($_POST['db_host'], $_POST['db_user'], $_POST['db_pass']);

                if ($mysqli->connect_error) {
                    $_errors = [[
                        'message' => "Не могу подключится серверу MySQL... Ошибка: {$mysqli->connect_error} ".
                                     "Код ошибки - {$mysqli->connect_errno}" 
                    ]];
                } else {
                    if (!$mysqli->select_db($_POST['db_name'])) {
                        $_errors = [[
                            'message' => 'Не удалось подключится к базе данных, или она еще не создана. '.
                                         'Создайте ее, и попробуйте снова!'
                        ]];
                    } else {
                        
                        try {
                            $source = file_get_contents('./import.sql');
                            $pdo = new \Engine\Core\Database\Connection($_POST);
                            $pdo->execute($source);
                        
                            writeconfig();
                            redirect('/install/index.php?step=1');
                        } catch (PDOException $p) {
                            $_errors[] = [
                                'message' => 'Не удалось заполнить базу данных необходимыми таблицами.. '.
                                             'Ответ сервера: '. $p->getMessage()
                            ];
                        }
                    }
                }

                $mysqli->close();
            }
        }

        echo viewstep('step_0', array_merge($database?:$_POST, ['errors' => $_errors]));
        break;

    case 1:
        if (count($db->query("SELECT * FROM `settings`")) > 1 &&
            count($db->query("SELECT * FROM `merchant`")) > 0)  {
            redirect('/install/index.php?step=2');
            exit;
        }

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if (empty($_POST['name_site']) OR 
                empty($_POST['merchant'])) {
                $_errors[] = ['message' => 'Заполните все поля'];
            } else {
                $_POST['data'] = serialize($_POST['data']);

                try {
                    $db->execute("INSERT INTO `merchant` (`name`, `data`) 
                                    VALUES (?, ?)", [
                                        $_POST['merchant'], 
                                        $_POST['data'],
                                    ]
                    ); 
                    $db->execute("INSERT INTO `settings` (`key_field`, `value`) 
                                    VALUES ('name_site', ?), 
                                           ('merchant', ?), 
                                           ('ip_address', 'your-ip.com')", [
                                            $_POST['name_site'],
                                            $_POST['merchant']
                                       ]
                    );
                    redirect('/install/index.php?step=2');
                } catch(PDOException $e) {
                    $_errors[] = [
                        'message' => 'Произошла ошибка при сохранении настроек, что-то с БД не так... '.
                                     'Проверьте, есть ли в базе таблица merchant и settings. '.
                                     'Если нет, то начните установку сначала, перейдя по '.
                                     '<a href="/install/index.php">этой</a> ссылке'
                    ];
                }
            }
        }

        echo viewstep('step_1', array_merge($_POST, ['errors' => $_errors], ['merchant' => $app['merchant']]));
        break;

    case 2:
        if (count($db->query("SELECT * FROM `users`"))) {
            redirect('/install/index.php?step=3');
        }

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if (empty($_POST['username']) OR
                empty($_POST['password'])) {
                $_errors[] = [
                    'message' => 'Заполните все поля!'
                ];
            } else {    
                try {
                    $db->execute("INSERT INTO `users` (`username`, `role`, `password`) 
                              VALUES (?, 'admin', ?)", [$_POST['username'], bcrypt($_POST['password'])]);
                    redirect('/install/index.php?step=3');
                } catch (PDOException $e) {
                    $errors[] = [
                        'message' => 'Добавить пользователя не удалось, '.
                                     'проверьте правильность введеных данных от MySQL сервера'
                    ];
                }
            }
        }

        // принимать пользовательские данные и инсёртить в таблицу юзеров в бд....
        echo viewstep('step_2', ['errors' => $_errors]);
        break;

    case 3:
        if (!count($db->query("SELECT * FROM `users`"))) {
            redirect('/install/index.php?step=2');
        }

        echo viewstep('step_3', ['errors' => $_errors]);
        break;
}