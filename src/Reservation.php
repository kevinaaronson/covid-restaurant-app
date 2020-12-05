<?php
    class Reservation
    {
        private $id;
        public $date;
        private $time;
        private $name;
        private $email;
        private $party;
        private $comments;
        private $restaurant_id;

        function __construct ($id = null,  $date, $time, $name, $email, $party, $comments, $restaurant_id)
        {
            $this->id = $id;
            $this->name = $name;
            $this->date = $date;
            $this->time = $time;

            $this->email = $email;
            $this->party = $party;
            $this->comments = $comments;
            $this->restaurant_id = $restaurant_id;
        }
        function save()
        {
            $GLOBALS['DB']->exec("INSERT INTO reservations (date, time, name, email, party, comments, restaurant_id) VALUES ('{$this->getDate()}','{$this->getTime()}','{$this->getName()}',{$this->getEmail()},'{$this->getParty()}', {$this->getComments()}, {$this->getRestaurantId()});");
            $this->id = $GLOBALS['DB']->lastInsertId();
        }




        function emailInfo()
        {

        }

        /**
         * @return mixed
         */
        public function getRestaurantId()
        {
            return $this->restaurant_id;
        }

        /**
         * @param mixed $restaurant_id
         */
        public function setRestaurantId($restaurant_id): void
        {
            $this->restaurant_id = $restaurant_id;
        }

        /**
         * @return mixed|null
         */
        public function getId(): ?mixed
        {
            return $this->id;
        }

        /**
         * @param mixed|null $id
         */
        public function setId(?mixed $id): void
        {
            $this->id = $id;
        }

        /**
         * @return mixed
         */
        public function getDate()
        {
            return $this->date;
        }

        /**
         * @param mixed $date
         */
        public function setDate($date): void
        {
            $this->date = $date;
        }

        /**
         * @return mixed
         */
        public function getTime()
        {
            return $this->time;
        }

        /**
         * @param mixed $time
         */
        public function setTime($time): void
        {
            $this->time = $time;
        }

        /**
         * @return mixed
         */
        public function getName()
        {
            return $this->name;
        }

        /**
         * @param mixed $name
         */
        public function setName($name): void
        {
            $this->name = $name;
        }

        /**
         * @return mixed
         */
        public function getEmail()
        {
            return $this->email;
        }

        /**
         * @param mixed $email
         */
        public function setEmail($email): void
        {
            $this->email = $email;
        }

        /**
         * @return mixed
         */
        public function getParty()
        {
            return $this->party;
        }

        /**
         * @param mixed $party
         */
        public function setParty($party): void
        {
            $this->party = $party;
        }

        /**
         * @return mixed
         */
        public function getComments()
        {
            return $this->comments;
        }

        /**
         * @param mixed $comments
         */
        public function setComments($comments): void
        {
            $this->comments = $comments;
        }



    }