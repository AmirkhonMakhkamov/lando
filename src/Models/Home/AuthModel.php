<?php
namespace Lando\App\Models\Home;

class AuthModel {
    private $conn;

    function __construct($conn){
        $this->conn = $conn;
    }

    public function get_user($email, $provider, $provider_id){
        $stmt = $this->conn->prepare("
            SELECT id_user
            FROM users
            WHERE email_user = ?
            AND provider_user = ?
            AND provider_id_user = ?
        ");
        $stmt->bind_param("sss",
            $email,
            $provider,
            $provider_id
        );
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            return intval($row['id_user']);
        }else{
            return 0;
        }
    }

    public function login_user($user_id){
        session_regenerate_id();

        $_SESSION["token"] = TOKEN;
        $_SESSION["user_id"] = base64_encode($user_id);

        header("location: ./");
        exit;
    }

    public function signup_user(
        $first_name,
        $last_name,
        $email,
        $provider,
        $provider_id,
        $password,
        $avatar
    ){
        if (!empty($avatar)) {
            $avatar_dir = "dashboard/storage/uploads/avatar/";
            $newAvatarName = md5($avatar . time()) . '.jpg';
            $avatarTarget = $avatar_dir . $newAvatarName;
            $image_content = file_get_contents($avatar);
            file_put_contents($avatarTarget, $image_content);
        }else{
            $newAvatarName = "";
        }

        $stmt = $this->conn->prepare("
            INSERT INTO users
            (
                fname_user,
                lname_user,
                email_user,
                provider_user,
                provider_id_user,
                password_user,
                avatar_user
            )
            VALUES
            (?, ?, ?, ?, ?, ?, ?)
        ");
        $stmt->bind_param("sssssss",
            $first_name,
            $last_name,
            $email,
            $provider,
            $provider_id,
            $password,
            $newAvatarName
        );
        $result = $stmt->execute();

        if ($result) {
            $last_id = $this->conn->insert_id;
            return $this->login_user($last_id);
        }else{
            return;
        }
    }
}