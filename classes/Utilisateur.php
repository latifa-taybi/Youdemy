<?php
class Utilisateur {
    protected $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function getUserId($id) {
        $stmt = $this->pdo->prepare("SELECT * FROM utilisateur WHERE id =:id");
        $stmt->execute([
            ':id' =>$id
        ]);
        return $stmt->fetch();
    }

    public function getUsersRole($role) {
        $stmt = $this->pdo->prepare("SELECT * FROM utilisateur WHERE role=:role");
        $stmt->execute([
            ':role'=>$role
        ]);
        return $stmt->fetchAll();
    }

    public function displayUsers($users) {
        foreach ($users as $user) {
            echo "
            <tr class='border-t border-gray-200'>
                <td class='px-6 py-4'>$user[id]</td>
                <td class='px-6 py-4'>$user[nom]</td>
                <td class='px-6 py-4'>$user[email]</td>
                <td class='px-6 py-4'>
                    <span class='bg-green-500 text-white px-2 py-1 rounded-full'>Actif</span>
                </td>
            </tr>
            ";
        }
    }
}
?>