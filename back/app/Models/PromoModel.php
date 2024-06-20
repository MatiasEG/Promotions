<?php

    namespace App\Models;

    use CodeIgniter\Model; // Import the Model class from CodeIgniter

    
    class PromoModel extends Model{

        protected $table = 'promos';
        protected $allowedFields = ['title', 'description', 'img','promo_start_date', 'promo_end_date'];

        public function addPromo($promo){
            $this->insert($promo, false);
        }

        public function getAll(){
            $query = $this->get();
            return $query->getResult();
        }

        public function getPromo($id_promo){
            return $this->find($id_promo);
        }

        public function deletePromo($id_promo){
            return $this->delete($id_promo);
        }

        public function updatePromo($promo, $id_promo){
            return $this->update($id_promo,$promo);
        }
    }
?>