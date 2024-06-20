<?php

namespace App\Controllers;
use App\Models\PromoModel; // Import the PromoModel class

class Home extends BaseController
{
    protected $promoModel; // Declare a property to hold the loaded model

    public function __construct()
    {
        helper('form');
        //model('PromoModel');
        $this->promoModel = new PromoModel(); // Load the model and assign it to the property

    }

    public function index(): string
    {
        $data_promos['promos'] = $this->promoModel->getAll();
        return view('welcome_message',$data_promos);
    }

    public function addPromo()
    {
        // Handle the form submission
        $promo['title'] = $this->request->getPost('promo_title');
        $promo['description'] = $this->request->getPost('promo_description');
        $promo['promo_start_date'] = $this->request->getPost('promo_start_date');
        $promo['promo_end_date'] = $this->request->getPost('promo_end_date');

        // Handle file upload
        $file = $this->request->getFile('promo_image');
        if ($file->isValid() && !$file->hasMoved()) {
            $newName = $file->getRandomName();
            $file->move(ROOTPATH  . 'public', $newName); // Move file to uploads directory
            $promo['img'] = 'public/' . $newName; // Save file path to database
        } else {
            // Handle file upload error
            $promo['img'] = ''; // or set a default image path
            echo "File upload failed.";
        }

        var_dump($promo);

        $this->promoModel->addPromo($promo);

        // Redirect or load a view to display success message
        return redirect()->to('/');
    }



    function deletePromo($id_promo)
    {
        $promoDetails = $this->promoModel->getPromo($id_promo);
        $imageName = $promoDetails['img'];

        $path = ROOTPATH . $imageName;

        if (file_exists($path) && $imageName!=null) {
            unlink($path); // Delete the file
        }

        $this->promoModel->deletePromo($id_promo);

        // Redirect or load a view to display success message
        return redirect()->to('/');
    }

    function editPromo($id_promo)
    {   
        // Handle the form submission
        $promo['title'] = $this->request->getPost('promo_title');
        $promo['description'] = $this->request->getPost('promo_description');
        $promo['promo_start_date'] = $this->request->getPost('promo_start_date');
        $promo['promo_end_date'] = $this->request->getPost('promo_end_date');
        
        
        $this->promoModel->updatePromo($promo, $id_promo);
        
        // Redirect or load a view to display success message
        return redirect()->to('/');
    }

    public function showImage($imageName)
    {
        $path = FCPATH . $imageName;
        
        var_dump($path);

        if (file_exists($path)) {
            return $this->response->download($path, null);
        } else {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
    }
}
