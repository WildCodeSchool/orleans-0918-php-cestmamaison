<?php
/**
 * Created by PhpStorm.
 * User: billyvivant
 * Date: 10/10/18
 * Time: 10:09
 */

namespace Controller;
use Model\Category;
use Model\CategoryManager;

class CategoryController extends AbstractController
{
    const EXTENSION = ['png','jpeg','jpg'];
    const MAX_SIZE = 1048576;
    public function add()
    {
        $errors = [];
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (empty(trim($_POST['name']))) {
                $errors[] = "La catégorie doit être renseignée";
            }
            if (strlen(trim($_POST['name'])) > 255) {
                $errors[] = "La catégorie doit contenir moins de 255 caractères";
            }
            if (empty($_FILES['fichier']['name'])) {
                $errors[] = 'L\'image doit être renseignée';
            }


            $length = filesize($_FILES['fichier']['tmp_name']);
            $ext = pathinfo($_FILES['fichier']['name'], PATHINFO_EXTENSION);
            if ($length > self::MAX_SIZE) {
                $errors[] = 'Votre fichier ne peut exceder 1Mo';
            } elseif ((!in_array($ext, self::EXTENSION)) and (!empty($_FILES['fichier']['name']))) {
                $errors[] = 'Votre fichier peut uniquement posseder l\'extension ' . implode(' , ', self::EXTENSION);
            }


            if (empty($errors)) {
                $fileName = 'image' . uniqid() . '.' . $ext;
                $uploadDir = 'assets/images/CategoryImages/';
                $uploadFile = $uploadDir . basename($fileName);
                move_uploaded_file($_FILES['fichier']['tmp_name'], $uploadFile);

                $categoryManager = new CategoryManager($this->getPdo());
                $category = new Category;
                $category->setName(trim(($_POST['name'])));
                $category->setPicture($fileName);
                $id = $categoryManager->insert($category);

                header('Location:/admin');
                exit();

            }
        }
        return $this->twig->render('Admin/Category/add.html.twig', ['errors' => $errors]);
    }
    public function index()
    {
        $categoryManager = new CategoryManager($this->getPdo());
        $categories = $categoryManager->selectAll();

        return $this->twig->render('Admin/Category/index.html.twig', ['categories' => $categories]);
    }
}
