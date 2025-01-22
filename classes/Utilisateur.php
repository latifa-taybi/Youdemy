<?php
class Utilisateur {
    protected $pdo;
    protected $id;
    protected $nom;
    protected $email;
    protected $mot_de_passe;
    protected $statut;
    protected $role;

    public function __construct($pdo, $id = null, $nom = null, $email = null, $mot_de_passe = null, $statut = null, $role = null) {
        $this->pdo = $pdo;
        $this->id = $id;
        $this->nom = $nom;
        $this->email = $email;
        $this->mot_de_passe = $mot_de_passe;
        $this->statut = $statut;
        $this->role = $role;
    }

    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function getNom() {
        return $this->nom;
    }

    public function setNom($nom) {
        $this->nom = $nom;
    }

    public function getEmail() {
        return $this->email;
    }

    public function setEmail($email) {
        $this->email = $email;
    }

    public function getMotDePasse() {
        return $this->mot_de_passe;
    }

    public function setMotDePasse($mot_de_passe) {
        $this->mot_de_passe = password_hash($mot_de_passe, PASSWORD_BCRYPT);
    }

    public function getStatut() {
        return $this->statut;
    }

    public function setStatut($statut) {
        $this->statut = $statut;
    }

    public function getRole() {
        return $this->role;
    }

    public function setRole($role) {
        $this->role = $role;
    }

    public function afficheName(){
        return 'Bienvenue'.$this->getNom();
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

    public function displayUsers() {
        $stmt = $this->pdo->prepare("SELECT * FROM utilisateur WHERE role=:role");
        $stmt->execute([
            ':role'=>'Enseignant'
        ]);
        $users = $stmt->fetchAll();
        foreach ($users as $user) {
            if($user['role'] == 'Enseignant'){
                $user['statut'] == 'Pending';
                if ($user['statut'] == 'Active') {
                    $avtivation = 'Desactivé';
                    $activationClass = 'bg-red-500';
                } else {
                    $avtivation = 'Active';
                    $activationClass = 'bg-green-500';
                }
            }
            
            echo "
            <tr class='border-t border-gray-200'>
                <td class='px-6 py-4'>$user[id]</td>
                <td class='px-6 py-4'>$user[nom]</td>
                <td class='px-6 py-4'>$user[email]</td>
                <td class='px-6 py-4'>
                    <a href='../administrateur/toggleAcc.php?id=$user[id]'>
                       <button class='$activationClass text-white px-2 py-1 rounded-full'>$avtivation</button>
                    </a>
                </td>
            </tr>
            ";
        }
    }

    public function countUtilisateur($role)
    {
        $stmt=$this->pdo->prepare("SELECT COUNT(*) as nb_total FROM utilisateur WHERE role = :role");
        $stmt->execute([
            ':role'=>$role
        ]);
        return $stmt->fetch();
    }

    public function registre($nom, $email, $motDePasse, $role, $statut) {
        $motDePasse_hash = password_hash($motDePasse, PASSWORD_BCRYPT);
        $stmt = $this->pdo->prepare("INSERT INTO utilisateur (nom, email, mot_de_passe, role, statut) VALUES (:nom, :email, :mot_de_passe, :role, :statut)");
        return $stmt->execute([
            ':nom' => $nom,
            ':email' => $email,
            ':mot_de_passe' => $motDePasse_hash,
            ':role' => $role,
            ':statut' => $statut
        ]);
    }

    public function login($email){
        $stmt = $this->pdo->prepare("SELECT * FROM utilisateur WHERE email=:email");
        $stmt->execute([
            ':email'=>$email
        ]);
        return $stmt->fetch();
    }
}

?>