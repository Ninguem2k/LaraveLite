<?php

require_once "./Config/Config.php";

class UserModel
{
    private $pdo;

    public function __construct()
    {
        $this->pdo = new PDO("mysql:host=" . DB_SERVER . ";dbname=" . DB_NAME, DB_USERNAME, DB_PASSWORD);
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    public function login($username, $password)
    {
        $username_err = $password_err = "";

        if (empty(trim($username))) {
            $username_err = "Por favor coloque um nome de usuário.";
        } else {
            $sql = "SELECT id, username, role, password FROM users WHERE username = :username";
            if ($stmt = $this->pdo->prepare($sql)) {
                $stmt->bindParam(":username", $param_username, PDO::PARAM_STR);
                $param_username = trim($username);
                if ($stmt->execute()) {
                    if ($stmt->rowCount() == 1) {
                        if ($row = $stmt->fetch()) {
                            $id = $row["id"];
                            $username = $row["username"];
                            $hashed_password = $row["password"];
                            $role = $row["role"];

                            if (password_verify($password, $hashed_password)) {
                                session_start();
                                $_SESSION["loggedin"] = true;
                                $_SESSION["id"] = $id;
                                $_SESSION["username"] = $username;
                                $_SESSION["role"] = $role;
                                return true;
                            } else {
                                $password_err = "A senha que você digitou não é válida.";
                            }
                        }
                    } else {
                        $username_err = "Nenhuma conta encontrada com esse nome de usuário.";
                    }
                } else {
                    echo "Ops! Algo deu errado. Por favor, tente novamente mais tarde.";
                }
                unset($stmt);
            }
        }
        return array("username_err" => $username_err, "password_err" => $password_err);
    }

    public function registrar($username, $whatsapp, $password, $confirm_password)
    {
        $username_err = $password_err = $confirm_password_err = "";

        if (empty(trim($username))) {
            $username_err = "Por favor coloque um nome de usuário.";
        } elseif (!preg_match('/^[a-zA-Z0-9_]+$/', trim($username))) {
            $username_err = "O nome de usuário pode conter apenas letras, números e sublinhados.";
        } else {
            $sql = "SELECT id FROM users WHERE username = :username";
            if ($stmt = $this->pdo->prepare($sql)) {
                $stmt->bindParam(":username", $param_username, PDO::PARAM_STR);
                $param_username = trim($username);
                if ($stmt->execute()) {
                    if ($stmt->rowCount() == 1) {
                        $username_err = "Este nome de usuário já está em uso.";
                    }
                } else {
                    echo "Ops! Algo deu errado. Por favor, tente novamente mais tarde.";
                }
                unset($stmt);
            }
        }

        if (empty(trim($password))) {
            $password_err = "Por favor insira uma senha.";
        } elseif (strlen(trim($password)) < 6) {
            $password_err = "A senha deve ter pelo menos 6 caracteres.";
        }

        if (empty(trim($confirm_password))) {
            $confirm_password_err = "Por favor, confirme a senha.";
        } else {
            $confirm_password = trim($confirm_password);
            if (empty($password_err) && ($password != $confirm_password)) {
                $confirm_password_err = "A senha não confere.";
            }
        }

        if (empty($username_err) && empty($password_err) && empty($confirm_password_err)) {

            $sql = "INSERT INTO users (username, whatsapp, password) VALUES (:username, :whatsapp, :password)";
            if ($stmt = $this->pdo->prepare($sql)) {
                $stmt->bindParam(":username", $param_username, PDO::PARAM_STR);
                $stmt->bindParam(":whatsapp", $param_whatsapp, PDO::PARAM_STR);
                $stmt->bindParam(":password", $param_password, PDO::PARAM_STR);

                $param_username = $username;
                $param_whatsapp = $whatsapp;
                $param_password = password_hash($password, PASSWORD_DEFAULT);

                if ($stmt->execute()) {
                    return true;
                } else {
                    echo "Ops! Algo deu errado. Por favor, tente novamente mais tarde.";
                }
                unset($stmt);
            }
        }
        return array("username_err" => $username_err, "password_err" => $password_err, "confirm_password_err" => $confirm_password_err);
    }
}
