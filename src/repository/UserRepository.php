<?php

namespace App\Repository;

use PDO;
use Exception;
use App\Model\User;

require_once __DIR__ . "/../../../vendor/autoload.php";

class UserRepository
{
    public PDO $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    private function instanceUserObject(array $data)
    {
        return new User(
            $data['id'],
            $data['username'],
            $data['username'],
            $data['password'],
            $data['profile_picture']
        );
    }

    public function all()
    {
        $sql = 'SELECT * FROM users;';

        $stmt = $this->pdo->prepare($sql);

        try {
            $stmt->execute();

            $users = $stmt->fetchAll();

            $usersData = array_map(function ($users) {
                $this->instanceUserObject($users);
            }, $users);

            return $usersData;
        } catch (Exception $e) {
            error_log("Couldn't list all users: " . $e->getMessage());
        }
    }

    public function findById(int $id)
    {
        $sql = 'SELECT * FROM users WHERE id = ?;';

        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(1, $id, PDO::PARAM_INT);

        try {
            $stmt->execute();

            return http_response_code(201);
        } catch (Exception $e) {
            error_log("Couldn't find user by id: " . $e->getMessage());
        }
    }

    private function isPostedDataAvailable($username, $email)
    {
        $sql = 'SELECT username, email FROM users WHERE username = :username || email = :email;';

        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':email', $email);

        try {
            $stmt->execute();

            $count = $stmt->fetchAll();

            if ($count === 0) {
                return true;
            }

            return false;
        } catch (Exception $e) {
            error_log(message: "Failed to verify if posted data is available, couldn't continue user registration: " . $e->getMessage());
        }
    }

    public function createUser(User $user)
    {
        $username = $user->getUsername();
        $email = $user->getEmail();

        $is_dataAvailable = $this->isPostedDataAvailable($username, $email);

        if($is_dataAvailable) {
            $sql = "INSERT INTO users(username, email, `password`) VALUES
            (username = ?, email = ?, `password` = ?)";

            $stmt = $this->pdo->prepare($sql);
            $stmt->bindValue(1, $username);
            $stmt->bindValue(2, $email);

            $passwordHash = password_hash($user->getPassword());
            $stmt->bindValue(3, $passwordHash);

            try {
                $stmt->execute();

                return true;
            } catch(Exception $e) {
                error_log(message: "Failed to create user in DB " . $e->getMessage());
            }
        } else {
            return false;
        }

        return false;
    }

    public function validateLogin(array $input_data)
    {
        $sql = 'SELECT COUNT(*) WHERE username = :username || email = :email AND `password` = `:password`;';

        $stmt = $this->pdo->prepare($sql);

        try {
            $stmt->execute();
            $response = $stmt->fetchAll() > 0 ? true : false;

            return $response; 
        } catch (Exception $e) {
            error_log(message: "Failed to login user: " . $e->getMessage());
        }

    }

    public function update()
    {

    }

    public function deleteById(int $id_user)
    {
        $sql = "DELETE FROM usuarios WHERE id = ?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(1, $id_user);

        try {
            $stmt->execute();

            echo json_encode(["status" => "success", "message" => "Usuário deletado com sucesso"]);
        } catch (Exception $e) {
            error_log("Failed to delete user: " . $e->getMessage())
            ;
        }
    }


}