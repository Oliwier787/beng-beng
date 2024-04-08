<?php
class User {
    // właściwości klasy user 
    private $id;
    private $email;
    private $password;

    public function __construct(int $id, string $email)
    {
        //this oznacza tworzony właśnie obiekt lub instancję klasy do której się odnosimy
        $this->id = $id;
        $this->email = $email;
    }
    public static function Register(string $email, string $password) {
        //funkcja rejestruje nowego użytkownika do bazy danych
        $db = new mysqli('local','root', '', 'cms' );
        $sql = "INSERT INTO user (email,password) VALUES (?, ?)";
        $q = $db->prepare($sql);
        $passwordHash = password_hash($password, PASSWORD_ARGON2I);
        $q->bind_param("ss", $email,$passwordHash);
        $q->execute();


    }
    public static function Login(string $email, string $password) {
        //funkcja loguje istniejącego użytkownika do bazy danych
        $db = new mysqli('localhost','root', '', 'cms');
        $sql = "SELECT * FROM user WHERE email = ? LIMIT 1";
        $q = $db->prepare($sql);
        $q->bind_param("s", $email);
        $q->execute();
        $result = $q->get_result();
        $row = $result->fetch_assoc();
        //tu muszą się nazwy w nawiasach [] zgadzać z nazwą kolumny w bazie danych
        $id = $row['id'];
        $passwordHash = $row['password'];
        if(password_verify($password, $passwordHash)) {
           //hasło się zgadza
           //zapisz dane użytkownika do sesji
        } else {
           //hasło się nie zgadza
           return false;
        }
        


    }
    public function logout() {
        //funkcja wylogowuje użytkownika 

    }
}

?>