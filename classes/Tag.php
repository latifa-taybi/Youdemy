<?php
class Tag{
    private $pdo;

    public function __construct($pdo){
        $this->pdo=$pdo;
    }

    public function addTag($nom){
        $stmt=$this->pdo->prepare("INSERT INTO tags (nom)VALUES(:nom)");
        return $stmt->execute([
            ':nom'=>$nom
        ]);
    }

    public function getTags(){
        $stmt=$this->pdo->prepare("SELECT * FROM tags");
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function getTageId($id_tag){
        $stmt=$this->pdo->prepare("SELECT * FROM tags WHERE id_tag=:id");
        $stmt->execute([
            'id'=>$id_tag
        ]);
        return $stmt->fetch();
    }

    public function displayTag(){
        $tags = $this->getTags();
        foreach($tags as $tag){
            echo"
            <li class='flex items-center justify-between p-4 bg-gray-50 border border-gray-200 rounded-lg hover:bg-gray-100 transition'>
                <div>
                    <h3 class='font-semibold text-gray-800'>$tag[nom]</h3>
                </div>
                <div class='flex space-x-4'>
                    <button class='text-blue-500 hover:text-blue-700 font-medium flex items-center space-x-2 transition-transform hover:scale-110'>
                        <i class='fas fa-edit'></i>
                    </button>
                    <button class='text-red-500 hover:text-red-700 font-medium flex items-center space-x-2 transition-transform hover:scale-110'>
                        <i class='fas fa-trash-alt'></i>
                    </button>
                </div>
            </li>
            ";
        }

    }


}
?>