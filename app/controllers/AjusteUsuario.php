<?php
class AjusteUsuario extends Controller
{

    private $userModel;

    public function __construct()
    {
    }

    public function ajuste($data)
    {
        $userID = $_SESSION['user_id'];

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Profile Pic
            $data = [
                'image' => trim($_POST['image']),

                'image_err' => ''
            ];

            $targetDir = "../../public/assets/ProfilePics";
            $fileName = basename($_FILES["image"]["name"]);
            $uniqeuFileName = $userID . "_" . $fileName;
            $targetFilePath = $targetDir . $uniqeuFileName;

            // Verificar tamaño del archivo
            if ($_FILES['image']['size'] > 5000000) {
                $data['image_err'] = 'El archivo supera el limite';
                var_dump('El archivo supera el limite');
            } else {
            }

            
        }

        $this->view('ajusteUsuario');


        
    }
}
