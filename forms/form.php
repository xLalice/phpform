<?php
    class FormInfoClass {
        private $lastName;
        private $firstName;
        private $age;
        private $contactNo;
        private $email;
        private $address;
        private $birthday;
        private $review;
        private $suggestion;

        public function setLastName($lastName) {
            $this->lastName = $lastName;
        }
        public function getLastName() {
            return $this->lastName;
        }

        public function setFirstName($firstName) {
            $this->firstName = $firstName;
        }
        public function getFirstName() {
            return $this->firstName;
        }

        public function setAge($age) {
            $this->age = $age;
        }
        public function getAge() {
            return $this->age;
        }

        public function setContactNo($contactNo) {
            $this->contactNo = $contactNo;
        }
        public function getContactNo() {
            return $this->contactNo;
        }

        public function setAddress($street, $city, $region, $zipcode, $country) {
            $this->address = $street . ', ' . $city . ', ' . $region . ', ' . $zipcode . ', ' . $country;
        }
        public function getAddress() {
            return $this->address;
        }

        public function setBirthday($birthday) {
            $this->birthday = $birthday;
        }
        public function getBirthday() {
            return $this->birthday;
        }

        public function setReview($review) {
            $this->review = $review;
        }
        public function getReview() {
            return $this->review;
        }

        public function setSuggestion($suggestion) {
            $this->suggestion = $suggestion;
        }
        public function getSuggestion() {
            return $this->suggestion;
        }

        public function saveToDatabase($conn) {
            $sql = "INSERT INTO FormSubmissions (lastName, firstName, age, contactNo, address, birthday, review, suggestion) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
        
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("ssisssss", $this->lastName, $this->firstName, $this->age, $this->contactNo, $this->address, $this->birthday, $this->review, $this->suggestion);
        
            $stmt->close();
        }
        
    }

    function connectToDatabase() {
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "customer_survey";
    
        $conn = new mysqli($servername, $username, $password, $dbname);
    
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        return $conn;
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $formInfo = new FormInfoClass();
        $formInfo->setLastName($_POST['lastName']);
        $formInfo->setFirstName($_POST['firstName']);
        $formInfo->setAge($_POST['age']);
        $formInfo->setContactNo($_POST['phone']);
        $formInfo->setAddress($_POST['streetAddress'], $_POST['city'], $_POST['region'], $_POST['zipcode'], $_POST['country']);
        $formInfo->setBirthday($_POST['birthday']);
        $formInfo->setReview($_POST['review']);
        $formInfo->setSuggestion($_POST['suggestion']);

        $conn = connectToDatabase();
        $formInfo->saveToDatabase($conn);
        $conn->close();

        echo '
        <div class="modal" id="myModal" style="display: block;">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Survey complete</h4>
                        <button type="button" class="close" onclick="closeModal()">&times;</button>
                    </div>

                    <div class="modal-body">
                        <div class="result-details">';
        echo '<span class="label">Name:  </span> ' . $formInfo->getFirstName() . ' ' . $formInfo->getLastName() . '<br>';
        echo '<span class="label">Age:  </span>' . $formInfo->getAge() . '<br>';
        echo '<span class="label">Contact No:   </span>' . $formInfo->getContactNo() . '<br>';
        echo '<span class="label">Address:   </span>' . $formInfo->getAddress() . '<br>';
        echo '<span class="label">Birthday:   </span>' . $formInfo->getBirthday() . '<br>';
        echo '<span class="label">Review:   </span>' . $formInfo->getReview() . '<br>';
        echo '<span class="label">Suggestion:   </span>' . $formInfo->getSuggestion() . '<br>';
        echo '</div>
                    </div>

                </div>
            </div>
        </div>';
    }
?>

<script>
    function closeModal() {
        document.getElementById("myModal").style.display = "none";
    }
</script>
