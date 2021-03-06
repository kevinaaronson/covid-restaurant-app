<?php
    class Restaurant
    {
        private $id;
        private $name;
        private $address;
        private $phone;
        private $cuisine_id;
        private $picture;
        private $total_rating;
        private $rating_count;
        private $description;



        function __construct ($id = null, $name, $address, $phone, $cuisine_id, $picture, $total_rating = 0, $rating_count = 0, $description = "")
        {
            $this->id = $id;
            $this->name = $name;
            $this->address = $address;
            $this->phone = $phone;
            $this->cuisine_id = $cuisine_id;
            $this->picture = $picture;
            $this->total_rating = $total_rating;
            $this->rating_count = $rating_count;
            $this->description = $description;
        }


        function getDescription()
        {
            return $this->description;
        }

        function setDescription($description)
        {
            $this->description = $description;
        }

        function getId()
        {
            return $this->id;
        }

        function setName($new_name)
        {
            $this->name = $new_name;
        }

        function getName()
        {
            return $this->name;
        }

        function setAddress($new_address)
        {
            $this->address = $new_address;
        }

        function getAddress()
        {
            return $this->address;
        }

        function setPhone($new_phone)
        {
            $this->phone = $new_phone;
        }

        function getPhone()
        {
            return $this->phone;
        }

        function setCuisineId($new_cuisine_id)
        {
            $this->cuisine_id = $new_cuisine_id;
        }

        function getCuisineId()
        {
            return $this->cuisine_id;
        }

        function setPicture($new_picture)
        {
            $this->picture = $new_picture;
        }

        function getPicture()
        {
            return $this->picture;
        }

        function setTotalRating($new_total_rating)
        {
            $this->total_rating = $new_total_rating;
        }

        function getTotalRating()
        {
            return $this->total_rating;
        }

        function setRatingCount($new_rating_count)
        {
            $this->rating_count = $new_rating_count;
        }

        function getRatingCount()
        {
            return $this->rating_count;
        }

        function getRating()
        {
            $total = $this->getTotalRating();
            $count = $this->getRatingCount();
            if ($count != 0) {
                $average_rating = number_format(($total)/($count), 1);
            } else {
                $average_rating = 0;
            }
            return $average_rating;
        }

        function updateRating($new_rating)
        {
            $total = $this->getTotalRating();
            $count = $this->getRatingCount();
            $total += $new_rating;
            $count += 1;
            $GLOBALS['DB']->exec("UPDATE restaurants SET total_rating = {$total}, rating_count = {$count} WHERE id = {$this->getId()};");
            $this->setTotalRating($total);
            $this->setRatingCount($count);
        }

        function save()
        {
            $GLOBALS['DB']->exec("INSERT INTO restaurants (name, address, phone, cuisine_id, picture, total_rating, rating_count) VALUES ('{$this->getName()}','{$this->getAddress()}','{$this->getPhone()}',{$this->getCuisineId()},'{$this->getPicture()}', {$this->getTotalRating()}, {$this->getRatingCount()});");
            $this->id = $GLOBALS['DB']->lastInsertId();
        }

        static function getAll()
        {
            $returned_restaurants = $GLOBALS['DB']->query("SELECT * FROM restaurants ORDER BY (total_rating)/(rating_count + 1) DESC;");

            $restaurants = array();
            foreach($returned_restaurants as $restaurant) {
                $id = $restaurant['id'];
                $name = $restaurant['name'];
                $address = $restaurant['address'];
                $phone = $restaurant['phone'];
                $cuisine_id = $restaurant['cuisine_id'];
                $picture = $restaurant['picture'];
                $total_rating = $restaurant['total_rating'];
                $rating_count = $restaurant['rating_count'];
                $description = $restaurant['description'];
                $new_restaurant = new Restaurant($id, $name, $address, $phone, $cuisine_id, $picture, $total_rating, $rating_count, $description);
                array_push($restaurants, $new_restaurant);
            }
            return $restaurants;
        }

        static function getTopTen()
        {
            $returned_restaurants = $GLOBALS['DB']->query("SELECT * FROM restaurants ORDER BY (total_rating)/(rating_count + 1) DESC LIMIT 10;");

            $restaurants = array();
            foreach($returned_restaurants as $restaurant) {
                $id = $restaurant['id'];
                $name = $restaurant['name'];
                $address = $restaurant['address'];
                $phone = $restaurant['phone'];
                $cuisine_id = $restaurant['cuisine_id'];
                $picture = $restaurant['picture'];
                $total_rating = $restaurant['total_rating'];
                $rating_count = $restaurant['rating_count'];
                $description = $restaurant['description'];
                $new_restaurant = new Restaurant($id, $name, $address, $phone, $cuisine_id, $picture, $total_rating, $rating_count, $description);
                array_push($restaurants, $new_restaurant);
            }
            return $restaurants;
        }

        static function getMostPopular()
        {
            $returned_restaurants = $GLOBALS['DB']->query("SELECT * FROM restaurants ORDER BY rating_count DESC LIMIT 10;");

            $restaurants = array();
            foreach($returned_restaurants as $restaurant) {
                $id = $restaurant['id'];
                $name = $restaurant['name'];
                $address = $restaurant['address'];
                $phone = $restaurant['phone'];
                $cuisine_id = $restaurant['cuisine_id'];
                $picture = $restaurant['picture'];
                $total_rating = $restaurant['total_rating'];
                $rating_count = $restaurant['rating_count'];
                $description = $restaurant['description'];
                $new_restaurant = new Restaurant($id, $name, $address, $phone, $cuisine_id, $picture, $total_rating, $rating_count, $description);
                array_push($restaurants, $new_restaurant);
            }
            return $restaurants;
        }

        static function deleteAll()
        {
            $GLOBALS['DB']->exec("DELETE FROM restaurants;");
        }

        static function find($search_id)
        {
            $found_restaurant = null;
            $restaurants = Restaurant::getAll();
            foreach($restaurants as $restaurant) {
                $restaurant_id = $restaurant->getId();
                if ($restaurant_id == $search_id) {
                    $found_restaurant = $restaurant;
                }
            }
            return $found_restaurant;
        }

        function updateRestaurant($edit_name, $edit_address, $edit_phone, $edit_cuisine_id, $edit_picture, $edit_description)
        {
            $GLOBALS['DB']->exec("UPDATE restaurants SET name = '{$edit_name}', address = '{$edit_address}', phone = '{$edit_phone}', cuisine_id = '{$edit_cuisine_id}', picture = '{$edit_picture}', description = '{$edit_description}' WHERE id = {$this->getId()};");
            $this->setName($edit_name);
            $this->setAddress($edit_address);
            $this->setPhone($edit_phone);
            $this->setCuisineId($edit_cuisine_id);
            $this->setDescription($edit_description);
        }

        function deleteRestaurant()
        {
            $GLOBALS['DB']->exec("DELETE FROM restaurants WHERE id = {$this->getId()};");
            $GLOBALS['DB']->exec("DELETE FROM reviews WHERE restaurant_id = {$this->getId()};");
        }

        function findReviews()
        {
            $returned_reviews = $GLOBALS['DB']->query("SELECT * FROM reviews WHERE restaurant_id = {$this->getId()} ORDER BY id DESC;");

            $reviews = array();
            foreach($returned_reviews as $review) {
                $id = $review['id'];
                $author = $review['author'];
                $description = $review['description'];
                $rating = $review['rating'];
                $restaurant_id = $review['restaurant_id'];
                $new_review = new Review($id, $author, $description, $rating, $restaurant_id);
                array_push($reviews, $new_review);
            }
            return $reviews;
        }
        function findReservations()
        {
            $returned_reservations = $GLOBALS['DB']->query("SELECT * FROM reservations WHERE restaurant_id = {$this->getId()} ORDER BY id DESC;");

            $reservations = array();
            foreach($returned_reservations as $reservation) {
                $id = $reservation['id'];
                $date = $reservation['date'];
                $time = $reservation['time'];
                $name = $reservation['name'];
                $email = $reservation['email'];
                $party = $reservation['party'];
                $restaurant_id = $reservation['restaurant_id'];
                $new_reservation = new Reservation($id, $date,$time, $name, $email,$party, $restaurant_id);
                array_push($reservations, $new_reservation);
            }
            return $reservations;
        }

        static function searchByName($search_term)
        {
            $allRestaurants = Restaurant::getAll();
            $matches = array();
            foreach($allRestaurants as $restaurant) {
                if (stripos($restaurant->getName(), $search_term) !== false) {
                    array_push($matches, $restaurant);
                }
            }
            return $matches;
        }

        function authenticate()
        {
            if ($stmt = $GLOBALS[DB]->prepare('SELECT id, password FROM restaurants WHERE name = ?')) {
                // Bind parameters (s = string, i = int, b = blob, etc), in our case the username is a string so we use "s"
                $stmt->bind_param('s', $_POST['name']);
                $stmt->execute();
                // Store the result so we can check if the account exists in the database.
                $stmt->store_result();

                if ($stmt->num_rows > 0) {
                    foreach ($stmt as $log){
                        $id = $log['id'];
                        $password = $log['password'];
                    }
                    $stmt->bind_result($id, $password);
                    $stmt->fetch();
                    // Account exists, now we verify the password.
                    // Note: remember to use password_hash in your registration file to store the hashed passwords.
                    if (password_verify($_POST['password'], $password)) {
                        // Verification success! User has loggedin!
                        // Create sessions so we know the user is logged in, they basically act like cookies but remember the data on the server.
                        session_regenerate_id();
                        $_SESSION['loggedin'] = TRUE;
                        $_SESSION['name'] = $_POST['username'];
                        $_SESSION['id'] = $id;
                        header('Location: /home.php');
                    } else {
                        // Incorrect password
                        echo 'Incorrect username and/or password!';
                        header('Location: index.html');
                    }
                } else {
                    // Incorrect username
                    echo 'Incorrect username and/or password!';
                    header('Location: index.html');
                }
                $stmt->close();
            }

        }

        function login()
        {

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
        public function getPassword()
        {
            return $this->password;
        }

        /**
         * @param mixed $password
         */
        public function setPassword($password): void
        {
            $this->password = $password;
        }






    }
?>
