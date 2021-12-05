<?php
    class Genre {
        private $id;
        private $nomGnere;

        public function __construct()
        {
            
        }

        /**
         * Get the value of id
         */ 
        public function getId()
        {
                return $this->id;
        }

        /**
         * Set the value of id
         *
         * @return  self
         */ 
        public function setId($id)
        {
                $this->id = $id;

                return $this;
        }

        /**
         * Get the value of nomGnere
         */ 
        public function getNomGnere()
        {
                return $this->nomGnere;
        }

        /**
         * Set the value of nomGnere
         *
         * @return  self
         */ 
        public function setNomGnere($nomGnere)
        {
                $this->nomGnere = $nomGnere;

                return $this;
        }


        public function __toString()
        {
            return $this->nomGnere;
        }
    }