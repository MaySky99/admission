<!DOCTYPE html>
<html>
    <head>
        <title>University of OXFORD</title>

        <link rel="stylesheet" type="text/css" href="css/bootstrap.css">

        <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css" >
		<script type="text/javascript" src="js/jquery.min.js"></script>
        <script type="text/javascript" src="css/bootstrap.min.js"></script>

        <link rel="stylesheet" type="text/css" href="css/font-awesome.min.css" />
        <link rel="stylesheet" type="text/css" href="css/style.css" />

    </head>
    <body>
        
        <?php

            $valid=true;
            include 'db.php';
            require 'header.php';

            $father_status=$mother_status=$other_status="";
            // Complete validation
            $titleComplete=$engNameComplete=$mmNameComplete=$genderComplete=$emailComplete=$syllabusComplete="";
            $studyComplete=$schoolComplete=$levelComplete=$gpaComplete=$majorComplete=$graduationComplete="";
            $birthdayComplete=$nationailityComplete=$citizenshipComplete=$religionComplete=$bloodComplete=$citizen_idComplete=$passportComplete="";
            $addressComplete=$streetComplete=$townComplete=$cityComplete=$zipComplete=$telephoneComplete=$mobileComplete=$facebookComplete="";
            
            $fatherNameComplete=$fatherNationailityComplete=$fatherStatusComplete=$fatherAgeComplete=$fatherOccupationComplete=$fatherPositionComplete="";
            $fatherSameAddressComplete=$fatherAddressComplete=$fatherStreetComplete=$fatherTownComplete=$fatherCityComplete=$fatherZipComplete=$fatherTelephoneComplete=$fatherMobileComplete=""; 
            
            $motherNameComplete=$motherNationailityComplete=$motherStatusComplete=$motherAgeComplete=$motherOccupationComplete=$motherPositionComplete="";
            $motherSameAddressComplete=$motherAddressComplete=$motherStreetComplete=$motherTownComplete=$motherCityComplete=$motherZipComplete=$motherTelephoneComplete=$motherMobileComplete=""; 
            
            $otherNameComplete=$otherNationailityComplete=$otherStatusComplete=$otherAgeComplete=$otherOccupationComplete=$otherPositionComplete="";
            $otherSameAddressComplete=$otherAddressComplete=$otherStreetComplete=$otherTownComplete=$otherCityComplete=$otherZipComplete=$otherTelephoneComplete=$otherMobileComplete=""; 

            $gstatusComplete="";
            
            // to validate inputs
            if ($_SERVER["REQUEST_METHOD"] == "POST") {

                if(!empty($_POST))
                {
                    $title=$_POST['title'];
                    $engname=$_POST['engname'];
                    $mmname=$_POST['mmname'];
                    $email=$_POST['email'];
                    $syllabus=$_POST['syllabus'];
                    $school=$_POST['school'];
                    $level=$_POST['level'];
                    $gpa=$_POST['gpa'];
                    $graduation=$_POST['graduation'];
                    $major=$_POST['major'];
                    $citizen_id=$_POST['citizen_id'];
                    $address=$_POST['address'];
                    $street=$_POST['street'];
                    $town=$_POST['town'];
                    $city=$_POST['city'];
                    $mobile=$_POST['mobile'];
                    $father_name=$_POST['father_name'];
                    $father_address=$_POST['father_address'];
                    $father_street=$_POST['father_street'];
                    $father_town=$_POST['father_town'];
                    $father_city=$_POST['father_city'];
                    $father_mobile=$_POST['father_mobile'];
                    $mother_name=$_POST['mother_name'];
                    $mother_address=$_POST['mother_address'];
                    $mother_street=$_POST['mother_street'];
                    $mother_town=$_POST['mother_town'];
                    $mother_city=$_POST['mother_city'];
                    $mother_mobile=$_POST['mother_mobile'];
                    
                    if(isset($_POST['father_status'])){
                        $father_status=test_input($_POST['father_status']);
                    }
                    if(isset($_POST['mother_status'])){
                        $mother_status=test_input($_POST['mother_status']);
                    }
                    if(isset($_POST['other_status'])){
                        $other_status=test_input($_POST['other_status']);
                    }                    
                    // Applicant
                    if(empty($title))
                    {
                        $titleError='Please choose title';
                        $valid=false;
                    }
                    else{
                        $titleComplete = test_input($_POST["title"]);
                    }

                    if(empty($engname))
                    {
                        $engNameError='Please write English name';
                        $valid=false;
                    }
                    else{
                        $engNameComplete = test_input($_POST["engname"]);
                    }

                    if(empty($mmname))
                    {
                        $mmNameError='Please write Myanmar name';
                        $valid=false;
                    }
                    else{
                        $mmNameComplete= test_input($_POST["mmname"]);
                    }
                    
                    if(isset($_POST['gender'])){
                        $gender=$_POST['gender'];
                        $genderComplete= test_input($_POST['gender']);
                    }

                    if(empty($email))
                    {
                        $emailError='Please write email';
                        $valid=false;
                    }
                    else{
                        $emailComplete= test_input($_POST['email']);
                    }

                    if(empty($syllabus))
                    {
                        $syllabusError='Please choose syllabus';
                        $valid=false;
                    }
                    else{
                        $syllabusComplete= test_input($_POST["syllabus"]);
                    }

                    // Education
                    if(isset($_POST['location'])){
                        $study=$_POST['location'];
                        $studyComplete= test_input($_POST["location"]);
                    }

                    if(empty($school))
                    {
                        $schoolError='Please write school';
                        $valid=false;
                    }
                    else{
                        $schoolComplete= test_input($_POST["school"]);
                    }

                    if(empty($gpa))
                    {
                        $gpaError='Please write mark';
                        $valid=false;
                    }
                    else{
                        $gpaComplete= test_input($_POST["gpa"]);
                    }

                    if(empty($graduation))
                    {
                        $graduationError='Please choose graduation year';
                        $valid=false;
                    }
                    else{
                        $graduationComplete= test_input($_POST["graduation"]);
                    }

                    if(empty($major))
                    {
                        $majorError='Please choose major';
                        $valid=false;
                    }
                    else{
                        $majorComplete= test_input($_POST["major"]);
                    }

                    if(empty($level))
                    {
                        $levelError='Please choose level';
                        $valid=false;
                    }
                    else{
                        $levelComplete= test_input($_POST["level"]);
                    }

                    //Personal Details
                    $birthdate=$_POST['birthdate'];
                    $nation=$_POST['nation'];
                    $citizen=$_POST['citizen'];
                    $religion=$_POST['religion'];
                    $blood=$_POST['blood'];
                    $passport=$_POST['passport'];

                    $birthdayComplete= test_input($_POST["birthdate"]);
                    $nationailityComplete= test_input($_POST["nation"]);
                    $citizenshipComplete= test_input($_POST["citizen"]);
                    $religionComplete= test_input($_POST["religion"]);
                    $bloodComplete= test_input($_POST["blood"]);
                    $passportComplete= test_input($_POST["passport"]);

                    if(empty($citizen_id))
                    {
                        $citizenIDError='Please write citizen_id';
                        $valid=false;
                    }
                    else{
                        $citizen_idComplete= test_input($_POST["citizen_id"]);
                    }

                    //Mailing address
                    if(empty($address))
                    {
                        $addressError='Please write address_no';
                        $valid=false;
                    }
                    else{
                        $addressComplete= test_input($_POST["address"]);
                    }

                    if(empty($street))
                    {
                        $streetError='Please write street';
                        $valid=false;
                    }
                    else{
                        $streetComplete= test_input($_POST["street"]);
                    }

                    if(empty($town))
                    {
                        $townError='Please write township';
                        $valid=false;
                    }
                    else{
                        $townComplete= test_input($_POST["town"]);
                    }

                    if(empty($city))
                    {
                        $cityError='Please write city';
                        $valid=false;
                    }
                    else{
                        $cityComplete= test_input($_POST["city"]);
                    }

                    if(empty($mobile))
                    {
                        $mobileError='Please write mobile';
                        $valid=false;
                    }
                    else{
                        $mobileComplete= test_input($_POST["mobile"]);
                    }

                    $zip=$_POST['zip'];
                    $telephone=$_POST['telephone'];
                    $facebook=$_POST['facebook'];

                    $zipComplete= test_input($_POST["zip"]);

                    $telephoneComplete= test_input($_POST["telephone"]);

                    $facebookComplete= test_input($_POST["facebook"]);


                    //Father information
                    $father_nation=$_POST['father_nation'];
                    $father_age=$_POST['father_age'];
                    $father_occupation=$_POST['father_occupation'];
                    $father_position=$_POST['father_position'];
                    $father_zip=$_POST['father_zip'];
                    $father_telephone=$_POST['father_telephone'];

                    if(empty($father_name))
                    {
                        $fatherNameError='Please write your father name';
                        $valid=false;
                    }
                    else{
                        $fatherNameComplete= test_input($_POST["father_name"]);
                    }

                    $fatherNationailityComplete= test_input($_POST["father_nation"]);

                    if(isset($_POST['father_status'])){
                        $fatherStatusComplete= test_input($_POST['father_status']);
                    }

                    $fatherAgeComplete= test_input($_POST["father_age"]);
                    $fatherOccupationComplete= test_input($_POST["father_occupation"]);
                    $fatherPositionComplete= test_input($_POST["father_position"]);

                    if(isset($_POST['father_same_address'])){
                        $fatherSameAddressComplete= test_input($_POST['father_same_address']);
                    }

                    if(empty($father_address))
                    {
                        $fatherAddressError='Please write your father address';
                        $valid=false;
                    }
                    else{
                        $fatherAddressComplete= test_input($_POST["father_address"]);
                    }

                    if(empty($father_street))
                    {
                        $fatherStreetError='Please write street';
                        $valid=false;
                    }
                    else{
                        $fatherStreetComplete= test_input($_POST["father_street"]);
                    }

                    if(empty($father_town))
                    {
                        $fatherTownError='Please write your father town';
                        $valid=false;
                    }
                    else{
                        $fatherTownComplete= test_input($_POST["father_town"]);
                    }

                    if(empty($father_city))
                    {
                        $fatherCityError='Please write your father city';
                        $valid=false;
                    }
                    else{
                        $fatherCityComplete= test_input($_POST["father_city"]);
                    }

                    if(empty($father_mobile))
                    {
                        $fatherMobileError='Please write your father mobile';
                        $valid=false;
                    }
                    else{
                        $fatherMobileComplete= test_input($_POST["father_mobile"]);
                    }

                    $fatherZipComplete= test_input($_POST["father_zip"]);
                    $fatherTelephoneComplete= test_input($_POST["father_telephone"]);


                    //Mother information
                    $mother_nation=$_POST['mother_nation'];
                    $mother_age=$_POST['mother_age'];
                    $mother_occupation=$_POST['mother_occupation'];
                    $mother_position=$_POST['mother_position'];
                    $mother_zip=$_POST['mother_zip'];
                    $mother_telephone=$_POST['mother_telephone'];

                    if(empty($mother_name))
                    {
                        $motherNameError='Please write your mother name';
                        $valid=false;
                    }
                    else{
                        $motherNameComplete= test_input($_POST["mother_name"]);
                    }

                    $motherNationailityComplete= test_input($_POST["mother_nation"]);

                    if(isset($_POST['mother_status'])){
                        $motherStatusComplete= test_input($_POST['mother_status']);
                    }

                    $motherAgeComplete= test_input($_POST["mother_age"]);
                    $motherOccupationComplete= test_input($_POST["mother_occupation"]);
                    $motherPositionComplete= test_input($_POST["mother_position"]);

                    if(isset($_POST['mother_same_address'])){
                        $motherSameAddressComplete= test_input($_POST['mother_same_address']);
                    }

                    if(empty($mother_address))
                    {
                        $motherAddressError='Please write your mother address';
                        $valid=false;
                    }
                    else{
                        $motherAddressComplete= test_input($_POST["mother_address"]);
                    }

                    if(empty($mother_street))
                    {
                        $motherStreetError='Please write street';
                        $valid=false;
                    }
                    else{
                        $motherStreetComplete= test_input($_POST["mother_street"]);
                    }

                    if(empty($mother_town))
                    {
                        $motherTownError='Please write your mother town';
                        $valid=false;
                    }
                    else{
                        $motherTownComplete= test_input($_POST["mother_town"]);
                    }

                    if(empty($mother_city))
                    {
                        $motherCityError='Please write your mother city';
                        $valid=false;
                    }
                    else{
                        $motherCityComplete= test_input($_POST["mother_city"]);
                    }

                    if(empty($mother_mobile))
                    {
                        $motherMobileError='Please write your mother mobile';
                        $valid=false;
                    }
                    else{
                        $motherMobileComplete= test_input($_POST["mother_mobile"]);
                    }

                    $motherZipComplete= test_input($_POST["mother_zip"]);
                    $motherTelephoneComplete= test_input($_POST["mother_telephone"]);

                    //Guardian information
                    if(isset($_POST['gstatus'])){
                        $gstatus=$_POST['gstatus'];
                        $gstatusComplete= test_input($_POST['gstatus']);
                    }

                    //Other information
                    if(isset($_POST['other_name'])){

                        $other_name=$_POST['other_name'];
                        if(empty($other_name))
                        {
                            $otherNameError='Please write your guardian name';
                            $valid=false;
                        }
                        else{
                            $otherNameComplete= test_input($_POST["other_name"]);
                        }
                    }

                    if(isset($_POST['other_nation'])){
                        $other_nation=$_POST['other_nation'];
                        $otherNationailityComplete= test_input($_POST["other_nation"]);
                    }

                    if(isset($_POST['other_status'])){
                        $otherStatusComplete= test_input($_POST['other_status']);
                    }

                    if(isset($_POST['other_age'])){
                        $other_age=$_POST['other_age'];
                        $otherAgeComplete= test_input($_POST["other_age"]);
                    }

                    if(isset($_POST['other_occupation'])){
                        $other_occupation=$_POST['other_occupation'];
                        $otherOccupationComplete= test_input($_POST["other_occupation"]);
                    }

                    if(isset($_POST['other_position'])){
                        $other_position=$_POST['other_position'];
                        $otherPositionComplete= test_input($_POST["other_position"]);
                    }

                    if(isset($_POST['other_same_address'])){
                        $otherSameAddressComplete= test_input($_POST['other_same_address']);
                    }

                    if(isset($_POST['other_address'])){

                        $other_address=$_POST['other_address'];
                        if(empty($other_address))
                        {
                            $otherAddressError='Please write your guardian address';
                            $valid=false;
                        }
                        else{
                            $otherAddressComplete= test_input($_POST["other_address"]);
                        }
                    }

                    if(isset($_POST['other_street'])){

                        $other_street=$_POST['other_street'];
                        if(empty($other_street))
                        {
                            $otherStreetError='Please write street';
                            $valid=false;
                        }
                        else{
                            $otherStreetComplete= test_input($_POST["other_street"]);
                        }
                    }

                    if(isset($_POST['other_town'])){

                        $other_town=$_POST['other_town'];    
                        if(empty($other_town))
                        {
                            $otherTownError='Please write your guardian town';
                            $valid=false;
                        }
                        else{
                            $otherTownComplete= test_input($_POST["other_town"]);
                        }
                    }

                    if(isset($_POST['other_city'])){

                        $other_city=$_POST['other_city'];
                        if(empty($other_city))
                        {
                            $otherCityError='Please write your guardian city';
                            $valid=false;
                        }
                        else{
                            $otherCityComplete= test_input($_POST["other_city"]);
                        }
                    }

                    if(isset($_POST['other_mobile'])){

                        $other_mobile=$_POST['other_mobile'];
                        if(empty($other_mobile))
                        {
                            $otherMobileError='Please write your guardian mobile';
                            $valid=false;
                        }
                        else{
                            $otherMobileComplete= test_input($_POST["other_mobile"]);
                        }
                    }

                    if(isset($_POST['other_zip'])){
                        $other_zip=$_POST['other_zip'];
                        $otherZipComplete= test_input($_POST["other_zip"]);
                    }

                    if(isset($_POST['other_telephone'])){
                        $other_telephone=$_POST['other_telephone'];
                        $otherTelephoneComplete= test_input($_POST["other_telephone"]);
                    }
        
                    
                }
            }
            function test_input($data) {
                $data = trim($data);
                $data = stripslashes($data);
                $data = htmlspecialchars($data);
                return $data;
            }
            //to connect database
             
        ?>


        <div class="container">
            <form class="form-horizontal" action="application.php" method="post">

                <!-- Application Information -->
                <p class="h3 pb-3 mt-3">Applicant's Information</p>
                    <div class="form-group p-3 pl-5">
                        <div class="form-row mb-4">
                            <div class="col-sm-2 col-md-3">
                                <label class="form-label" for="title">Title:<span class="error">*</span></label>
                            </div>
                            <div class="col-9">
                                <select id="title" name="title" class="form-control">
                                <option <?php if (isset($titleComplete) && $titleComplete=="") echo "selected";?> value="">--Select--</option>
                                <option <?php if (isset($titleComplete) && $titleComplete=="Mr") echo "selected";?> value="Mr" >Mr</option>
                                <option <?php if (isset($titleComplete) && $titleComplete=="Ms") echo "selected";?> value="Ms" >Ms</option>
                                <option <?php if (isset($titleComplete) && $titleComplete=="Mrs") echo "selected";?> value="Mrs">Mrs</option>
                                </select>
                                <?php if (!empty($titleError)): ?>
                                <span class="help-inline"><?php echo $titleError;?></span>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="form-row mb-4">
                            <div class="col-sm-2 col-md-3">
                                <label class="form-label" for="engname">Name(ENG):<span class="error">*</span></label>
                            </div>
                            <div class="col-9  form-contol">
                                <input type="text" id="engname" name="engname" value="<?php echo $engNameComplete; ?>" class="form-control">
                                <?php if (!empty($engNameError)): ?>
                                <span class="help-inline"><?php echo $engNameError; ?></span>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="form-row mb-4">
                            <div class="col-sm-2 col-md-3">
                                <label class="form-label" for="mmname">Name(MM):<span class="error">*</span></label>
                            </div>
                            <div class="col-9">
                                <input type="text" id="mmname" name="mmname" value="<?php echo $mmNameComplete; ?>" class="form-control">
                                <?php if (!empty($mmNameError)): ?>
                                <span class="help-inline"><?php echo $mmNameError;?></span>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="form-row mb-4">
                            <div class="col-sm-2 col-md-3">
                                <label class="form-label" for="gender">Gender:</label>
                            </div>
                            <div class="col-9">
                                <input type="radio" name="gender"  <?php if (isset($genderComplete) && $genderComplete=="male") echo "checked";?> value="male">
                                <label class="form-label" for="gender">Male</label>
                                <input type="radio" name="gender" <?php if (isset($genderComplete) && $genderComplete=="female") echo "checked";?> value="female">
                                <label class="form-label" for="gender">Female</label>
                            </div>
                        </div>
                        <div class="form-row mb-4">
                            <div class="col-sm-2 col-md-3">
                                <label class="form-label" for="email">Email:<span class="error">*</span></label>
                            </div>
                            <div class="col-9">
                                <input type="text" id="email" name="email" value="<?php echo $emailComplete; ?>" class="form-control">
                                <?php if (!empty($emailError)): ?>
                                <span class="help-inline"><?php echo $emailError;?></span>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="form-row mb-4">
                            <div class="col-sm-2 col-md-3">
                                <label class="form-label" for="syllabus">Syllabus:<span class="error">*</span></label>
                            </div>
                            <div class="col-9">
                                <select id="syllabus" name="syllabus" class="form-control">
                                <option <?php if (isset($syllabusComplete) && $syllabusComplete=="") echo "selected";?> value="">--Select--</option>
                                <option <?php if (isset($syllabusComplete) && $syllabusComplete=="civil") echo "selected";?> value="civil" >Civil Engineering</option>
                                <option <?php if (isset($syllabusComplete) && $syllabusComplete=="it") echo "selected";?> value="it" >IT Engineering</option>
                                <option <?php if (isset($syllabusComplete) && $syllabusComplete=="electrical") echo "selected";?> value="electrical">Electrical Engineering</option>
                                </select>
                                <?php if (!empty($syllabusError)): ?>
                                <span class="help-inline"><?php echo $syllabusError;?></span>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                    <div class="bottom"></div>

                
                <!-- Education -->
                <p class="h3 pb-3 mt-3">Education</p>
                    <div class="form-group p-3 pl-5">
                        <div class="form-row mb-4">
                            <div class="col-sm-2 col-md-3">
                                <label class="form-label" for="location">Study in:</label>
                            </div>
                            <div class="col-9">
                                <input type="radio" id="location" name="location" <?php if (isset($studyComplete) && $studyComplete=="myanmar") echo "checked";?> value="myanmar">
                                <label class="form-label" for="location">Myanmar</label>
                                <input type="radio" id="location" name="location" <?php if (isset($studyComplete) && $studyComplete=="abroad") echo "checked";?> value="abroad">
                                <label class="form-label" for="location">Abroad</label>
                                
                            </div>
                        </div>
                        <div class="form-row mb-4">
                            <div class="col-sm-2 col-md-3">
                                <label for="school" class="form-label">School:<span class="error">*</span></label>
                            </div>
                            <div class="col-9">
                                <input type="text" id="school" name="school" value="<?php echo $schoolComplete; ?>" class="form-control">
                                <?php if (!empty($schoolError)): ?>
                                <span class="help-inline"><?php echo $schoolError;?></span>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="form-row mb-4">
                            <div class="col-sm-2 col-md-3">
                                <label for="level" class="form-label">Level of completion:<span class="error">*</span></label>
                            </div>
                            <div class="col-9">
                                <select id="level" name="level" class="form-control">
                                <option <?php if (isset($levelComplete) && $levelComplete=="") echo "selected";?> value="">--Select---</option>
                                <option <?php if (isset($levelComplete) && $levelComplete=="gce_o") echo "selected";?> value="gce_o" >GCE O Level</option>
                                <option <?php if (isset($levelComplete) && $levelComplete=="gce_a") echo "selected";?> value="gce_a" >GCE A Level</option>
                                <option <?php if (isset($levelComplete) && $levelComplete=="grade11") echo "selected";?> value="grade11">Grade 11</option>
                                <option <?php if (isset($levelComplete) && $levelComplete=="igcse") echo "selected";?> value="igcse">IGCSE</option>
                                </select>
                                <?php if (!empty($levelError)): ?>
                                <span class="help-inline"><?php echo $levelError;?></span>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="form-row mb-4">
                            <div class="col-sm-2 col-md-3">
                                <label for="major" class="form-label">Major:<span class="error">*</span></label>
                            </div>
                            <div class="col-9">
                                <select id="major" name="major" class="form-control">
                                <option <?php if (isset($majorComplete) && $majorComplete=="mathematics_and_science") echo "selected";?> value="mathematics_and_science">Mathematics and Science</option>
                                <option <?php if (isset($majorComplete) && $majorComplete=="science") echo "selected";?> value="science" >Science (Biology)</option>
                                <option <?php if (isset($majorComplete) && $majorComplete=="arts") echo "selected";?> value="arts" >Arts</option>
                                <option <?php if (isset($majorComplete) && $majorComplete=="science_and_arts") echo "selected";?> value="science_and_arts">Science and Arts</option>
                                <option <?php if (isset($majorComplete) && $majorComplete=="other") echo "selected";?> value="other">other</option>
                                </select>
                                <?php if (!empty($majorError)): ?>
                                <span class="help-inline"><?php echo $majorError;?></span>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="form-row mb-4">
                            <div class="col-sm-2 col-md-3">
                                <label for="gpa" class="form-label">Marks:<span class="error">*</span></label>
                            </div>
                            <div class="col-9">
                                <input type="number" id="gpa" name="gpa" value="<?php echo $gpaComplete; ?>" class="form-control">
                                <?php if (!empty($gpaError)): ?>
                                <span class="help-inline"><?php echo $gpaError;?></span>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="form-row mb-4">
                            <div class="col-sm-2 col-md-3">
                                <label for="graduation" class="form-label">Graduation in:<span class="error">*</span></label>
                            </div>
                            <div class="col-9">
                                <input type="date" id="graduation" name="graduation" value="<?php echo $graduationComplete; ?>" class="form-control">
                                <?php if (!empty($graduationError)): ?>
                                <span class="help-inline"><?php echo $graduationError;?></span>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                    <div class="bottom"></div>

                
                <!-- Personal Details -->
                <p class="h3 pb-3 mt-3">Personal Details</p>
                    <div class="form-group p-3 pl-5">
                        <div class="form-row mb-4">
                            <div class="col-sm-2 col-md-3">
                                <label for="birthdate" class="form-label">Birth date:</label>
                            </div>
                            <div class="col-9">
                                <input type="date" id="birthdate" name="birthdate" value="<?php echo $birthdayComplete; ?>" class="form-control">
                            </div>
                        </div>
                        <div class="form-row mb-4">
                            <div class="col-sm-2 col-md-3">
                                <label class="form-label" for="nation">Nationaility:</label>
                            </div>
                            <div class="col-3">
                                <input type="text" class="form-control" id="nation" name="nation" value="<?php echo $nationailityComplete; ?>">
                            </div>
                            <div class="col-sm-1 col-md-2">
                                <label class="form-label" for="citizen">Citizenship:</label>
                            </div>
                            <div class="col-2">
                                <input type="text" class="form-control" id="citizen" name="citizen" value="<?php echo $citizenshipComplete; ?>">
                            </div>
                        </div>
                        <div class="form-row mb-4">
                            <div class="col-sm-2 col-md-3">
                                <label class="form-label" for="religion">Religion:</label>
                            </div>
                            <div class="col-9">
                                <select class="form-control"id="religion" name="religion">
                                <option <?php if (isset($religionComplete) && $religionComplete=="Buddhism") echo "selected";?> value="Buddhism">Buddhism</option>
                                <option <?php if (isset($religionComplete) && $religionComplete=="chirstian") echo "selected";?> value="chirstian" >Christian</option>
                                <option <?php if (isset($religionComplete) && $religionComplete=="islam") echo "selected";?> value="islam">Islam</option>
                                <option <?php if (isset($religionComplete) && $religionComplete=="hindu") echo "selected";?> value="hindu">Hindu</option>
                                <option <?php if (isset($religionComplete) && $religionComplete=="other") echo "selected";?> value="other">Other</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-row mb-4">
                            <div class="col-sm-2 col-md-3">
                                <label class="form-label" for="blood">Blood Group:</label>
                            </div>
                            <div class="col-9">
                                <select class="form-control"id="blood" name="blood">
                                <option <?php if (isset($bloodComplete) && $bloodComplete=="A") echo "selected";?> value="A">A</option>
                                <option <?php if (isset($bloodComplete) && $bloodComplete=="B") echo "selected";?> value="B" >B</option>
                                <option <?php if (isset($bloodComplete) && $bloodComplete=="AB") echo "selected";?> value="AB">AB</option>
                                <option <?php if (isset($bloodComplete) && $bloodComplete=="O") echo "selected";?> value="O">O</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-row mb-4">
                            <div class="col-sm-2 col-md-3">
                                <label class="form-label" for="citizen_id">Citizen ID:<span class="error">*</span></label>
                            </div>
                            <div class="col-3">
                                <input class="form-control" type="text" id="citizen_id" name="citizen_id" value="<?php echo $citizen_idComplete; ?>">
                                <?php if (!empty($citizenIDError)): ?>
                                <span class="help-inline"><?php echo $citizenIDError;?></span>
                                <?php endif; ?>
                            </div>
                            <div class="col-sm-1 col-md-2">
                                <label class="form-label" for="passport">If not Mm please insert Passport no:</label>
                            </div>
                            <div class="col-2">
                                <input class="form-control" type="text" id="passport" name="passport" value="<?php echo $passportComplete; ?>">
                            </div>
                        </div>
                    </div>
                    <div class="bottom"></div>
                

                <!-- Mailing Address -->
                <p class="h3 pb-3 mt-3">Mailing Address</p>
                    <div class="form-group p-3 pl-5">
                        <div class="form-row mb-4">
                            <div class="col-sm-2 col-md-3">
                                <label class="form-label" for="address">Address No:<span class="error">*</span></label>
                            </div>
                            <div class="col-9">
                                <input class="form-control" type="text" id="address" name="address" value="<?php echo $addressComplete; ?>">
                                <?php if (!empty($addressError)): ?>
                                <span class="help-inline"><?php echo $addressError;?></span>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="form-row mb-4">
                            <div class="col-sm-2 col-md-3">
                                <label class="form-label" for="street">Street:<span class="error">*</span></label>
                            </div>
                            <div class="col-9">
                                <input class="form-control" type="text" id="street" name="street" value="<?php echo $streetComplete; ?>">
                                <?php if (!empty($streetError)): ?>
                                <span class="help-inline"><?php echo $streetError;?></span>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="form-row mb-4">
                            <div class="col-sm-2 col-md-3">
                                <label class="form-label" for="town">Township:<span class="error">*</span></label>
                            </div>
                            <div class="col-3">
                                <input class="form-control" type="text" id="town" name="town" value="<?php echo $townComplete; ?>">
                                <?php if (!empty($townError)): ?>
                                <span class="help-inline"><?php echo $townError;?></span>
                                <?php endif; ?>
                            </div>
                            <div class="col-sm-1 col-md-2">
                                <label class="form-label" for="city">City:<span class="error">*</span></label>
                            </div>
                            <div class="col-2">
                                <input class="form-control" type="text" id="city" name="city" value="<?php echo $cityComplete; ?>">
                                <?php if (!empty($cityError)): ?>
                                <span class="help-inline"><?php echo $cityError;?></span>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="form-row mb-4">
                            <div class="col-sm-2 col-md-3">
                                <label class="form-label" for="zip">Zip Code:</label>
                            </div>
                            <div class="col-9">
                                <input class="form-control" type="text" id="zip" name="zip" value="<?php echo $zipComplete; ?>">
                            </div>
                        </div>
                        <div class="form-row mb-4">
                            <div class="col-sm-2 col-md-3">
                                <label class="form-label" for="telephone">Telephone:</label>
                            </div>
                            <div class="col-3">
                                <input class="form-control" type="text" id="telephone" name="telephone" value="<?php echo $telephoneComplete; ?>">
                            </div>
                            <div class="col-sm-1 col-md-2">
                                <label class="form-label" for="mobile">Mobile:<span class="error">*</span></label>
                            </div>
                            <div class="col-2">
                                <input class="form-control" type="text" id="mobile" name="mobile" value="<?php echo $mobileComplete; ?>">
                                <?php if (!empty($mobileError)): ?>
                                <span class="help-inline"><?php echo $mobileError;?></span>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="form-row mb-4">
                            <div class="col-sm-2 col-md-3">
                                <label class="form-label" for="facebook">Facebook:</label>
                            </div>
                            <div class="col-9">
                                <input class="form-control" type="text" id="facebook" name="facebook" value="<?php echo $facebookComplete; ?>">
                            </div>
                        </div>
                    </div>
                    <div class="bottom"></div>


                <!-- Father's Information -->
                <p class="h3 pb-3 mt-3">Father's Information</p>
                    <div class="form-group p-3 pl-5">
                        <div class="form-row mb-4">
                            <div class="col-sm-2 col-md-3">
                                <label class="form-label" for="father_name">Name:<span class="error">*</span></label>
                            </div>
                            <div class="col-9">
                                <input class="form-control" type="text" id="father_name" name="father_name" value="<?php echo $fatherNameComplete; ?>">
                                <?php if (!empty($fatherNameError)): ?>
                                <span class="help-inline"><?php echo $fatherNameError;?></span>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="form-row mb-4">
                            <div class="col-sm-2 col-md-3">
                                <label class="form-label" for="father_nation">Nationaility:</label>
                            </div>
                            <div class="col-9">
                                <input type="text" class="form-control" id="father_nation" name="father_nation" value="<?php echo $fatherNationailityComplete; ?>">
                            </div>
                        </div>
                        <div class="form-row mb-4">
                            <div class="col-sm-2 col-md-3">
                                <label class="form-label" for="father_status">Status</label>
                            </div>
                            <div class="col-9">
                                <input type="radio" id="father_status" class="father_living" name="father_status" <?php if (isset($fatherStatusComplete) && $fatherStatusComplete=="living") echo "checked";?> value="living">
                                <label class="form-label" for="father_status">Living</label>
                                <input type="radio" id="father_status" class="father_deceased" name="father_status" <?php if (isset($fatherStatusComplete) && $fatherStatusComplete=="deceased") echo "checked";?> value="deceased">
                                <label class="form-label" for="father_status">Deceased</label>
                            </div>
                        </div>
                        <div class="form-row mb-4">
                            <div class="col-sm-2 col-md-3">
                                <label class="form-label" for="father_age">Age:</label>
                            </div>
                            <div class="col-9">
                                <input class="age-form-control" type="text" id="father_age" name="father_age" value="<?php echo $fatherAgeComplete; ?>">&nbsp; Year
                            </div>
                        </div>
                        <div class="form-row mb-4">
                            <div class="col-sm-2 col-md-3">
                                <label class="form-label" for="father_occupation">Occupation:</label>
                            </div>
                            <div class="col-3">
                                <input class="form-control" type="text" id="father_occupation" name="father_occupation" value="<?php echo $fatherOccupationComplete; ?>">
                            </div>
                            <div class="col-sm-1 col-md-2">
                                <label class="form-label" for="father_position">Position:</label>
                            </div>
                            <div class="col-2">
                                <input class="form-control" type="text" id="father_position" name="father_position" value="<?php echo $fatherPositionComplete; ?>">
                            </div>
                        </div><br><br>
                        <div class="form-row mb-4">
                            <div class="col-sm-2 col-md-3">
                                <label class="form-label" for="father_same_address">Father's address:</label>
                            </div>
                            <div class="col-9">
                                <input type="checkbox" id="father_same_address" name="father_same_address" <?php if (isset($fatherSameAddressComplete) && $fatherSameAddressComplete=="address") echo "checked";?> value="address">
                                <label for="same_address">Same as Applicant's Address</label>
                            </div>
                        </div>
                        <div class="form-row mb-4">
                            <div class="col-sm-2 col-md-3">
                                <label class="form-label" for="father_address">Address No:<span class="father_status_error">*</span></label>
                            </div>
                            <div class="col-9">
                                <input class="form-control" type="text" id="father_address" name="father_address" value="<?php echo $fatherAddressComplete; ?>">
                                <?php
                                    if($father_status=="living"){
                                        if (!empty($fatherAddressError)){ ?>
                                        <span class="help-inline">
                                        <?php   echo $fatherAddressError; ?>
                                        </span>
                                        <?php
                                        }
                                    }
                                    else{
                                    }
                                ?>
                            </div>
                        </div>
                        <div class="form-row mb-4">
                            <div class="col-sm-2 col-md-3">
                                <label class="form-label" for="father_street">Street:<span class="father_status_error">*</span></label>
                            </div>
                            <div class="col-9">
                                <input class="form-control" type="text" id="father_street" name="father_street" value="<?php echo $fatherStreetComplete; ?>">
                                <?php
                                    if($father_status=="living"){
                                        if (!empty($fatherStreetError)){ ?>
                                        <span class="help-inline">
                                        <?php   echo $fatherStreetError; ?>
                                        </span>
                                        <?php
                                        }
                                    }
                                    else{
                                    }
                                ?>
                            </div>
                        </div>
                        <div class="form-row mb-4">
                            <div class="col-sm-2 col-md-3">
                                <label class="form-label" for="father_town">Township:<span class="father_status_error">*</span></label>
                            </div>
                            <div class="col-3">
                                <input class="form-control" type="text" id="father_town" name="father_town" value="<?php echo $fatherTownComplete; ?>">
                                <?php
                                    if($father_status=="living"){
                                        if (!empty($fatherTownError)){ ?>
                                        <span class="help-inline">
                                        <?php   echo $fatherTownError; ?>
                                        </span>
                                        <?php
                                        }
                                    }
                                    else{
                                    }
                                ?>
                            </div>
                            <div class="col-sm-1 col-md-2">
                                <label class="form-label" for="father_city">City:<span class="father_status_error">*</span></label>
                            </div>
                            <div class="col-2">
                                <input class="form-control" type="text" id="father_city" name="father_city" value="<?php echo $fatherCityComplete; ?>">
                                <?php
                                    if($father_status=="living"){
                                        if (!empty($fatherCityError)){ ?>
                                        <span class="help-inline">
                                        <?php   echo $fatherCityError; ?>
                                        </span>
                                        <?php
                                        }
                                    }
                                    else{
                                    }
                                ?>
                            </div>
                            
                        </div>
                        <div class="form-row mb-4">
                            <div class="col-sm-2 col-md-3">
                                <label class="form-label" for="father_zip">Zip Code:</label>
                            </div>
                            <div class="col-9">
                                <input class="form-control" type="text" id="father_zip" name="father_zip" value="<?php echo $fatherZipComplete; ?>">
                            </div>
                        </div>
                        <div class="form-row mb-4">
                            <div class="col-sm-2 col-md-3">
                                <label class="form-label" for="father_telephone">Telephone:</label>
                            </div>
                            <div class="col-3">
                                <input class="form-control" type="number" id="father_telephone" name="father_telephone" value="<?php echo $fatherTelephoneComplete; ?>">
                            </div>
                            <div class="col-sm-1 col-md-2">
                                <label class="form-label" for="father_mobile">Mobile:<span class="father_status_error">*</span></label>
                            </div>
                            <div class="col-2">
                                <input class="form-control" type="number" id="father_mobile" name="father_mobile" value="<?php echo $fatherMobileComplete; ?>">
                                <?php
                                    if($father_status=="living"){
                                        if (!empty($fatherMobileError)){ ?>
                                        <span class="help-inline">
                                        <?php   echo $fatherMobileError; ?>
                                        </span>
                                        <?php
                                        }
                                    }
                                    else{
                                    }
                                ?>
                            </div>
                        </div>
                    </div>
                    <div class="bottom"></div>


                <!-- Mother's Information -->
                <p class="h3 pb-3 mt-3">Mother's Information</p>
                    <div class="form-group p-3 pl-5">
                        <div class="form-row mb-4">
                            <div class="col-sm-2 col-md-3">
                                <label class="form-label" for="mother_name">Name:<span class="error">*</span></label>
                            </div>
                            <div class="col-9">
                                <input class="form-control" type="text" id="mother_name" name="mother_name" value="<?php echo $motherNameComplete; ?>">
                                <?php if (!empty($motherNameError)): ?>
                                <span class="help-inline"><?php echo $motherNameError;?></span>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="form-row mb-4">
                            <div class="col-sm-2 col-md-3">
                                <label class="form-label" for="mother_nation">Nationaility:</label>
                            </div>
                            <div class="col-9">
                                <input type="text" class="form-control" id="mother_nation" name="mother_nation" value="<?php echo $motherNationailityComplete; ?>">
                            </div>
                        </div>
                        <div class="form-row mb-4">
                            <div class="col-sm-2 col-md-3">
                                <label class="form-label" for="mother_status">Status</label>
                            </div>
                            <div class="col-9">
                                <input type="radio" id="mother_status" class="mother_living"  name="mother_status" <?php if (isset($motherStatusComplete) && $motherStatusComplete=="living") echo "checked";?> value="living">
                                <label class="form-label" for="status">Living</label>
                                <input type="radio" id="mother_status" class="mother_deceased"  name="mother_status" <?php if (isset($motherStatusComplete) && $motherStatusComplete=="deceased") echo "checked";?> value="deceased">
                                <label class="form-label" for="status">Deceased</label>
                            </div>
                        </div>
                        <div class="form-row mb-4">
                            <div class="col-sm-2 col-md-3">
                                <label class="form-label" for="mother_age">Age:</label>
                            </div>
                            <div class="col-9">
                                <input class="age-form-control" type="text" id="mother_age" name="mother_age" value="<?php echo $motherAgeComplete; ?>">&nbsp; Year
                            </div>
                        </div>
                        <div class="form-row mb-4">
                            <div class="col-sm-2 col-md-3">
                                <label class="form-label" for="mother_occupation">Occupation:</label>
                            </div>
                            <div class="col-3">
                                <input class="form-control" type="text" id="mother_occupation" name="mother_occupation" value="<?php echo $motherOccupationComplete; ?>">
                            </div>
                            <div class="col-sm-1 col-md-2">
                                <label class="form-label" for="mother_position">Position:</label>
                            </div>
                            <div class="col-2">
                                <input class="form-control" type="text" id="mother_position" name="mother_position" value="<?php echo $motherPositionComplete; ?>">
                            </div>
                        </div><br><br>
                        <div class="form-row mb-4">
                            <div class="col-sm-2 col-md-3">
                                <label class="form-label" for="mother_same_address">Mother's address:</label>
                            </div>
                            <div class="col-9">
                                <input type="checkbox" id="mother_same_address" name="mother_same_address" <?php if (isset($motherSameAddressComplete) && $motherSameAddressComplete=="address") echo "checked";?> value="address">
                                <label for="msame_address">Same as Applicant's Address</label>
                            </div>
                        </div>
                        <div class="form-row mb-4">
                            <div class="col-sm-2 col-md-3">
                                <label class="form-label" for="mother_address">Address No:<span class="mother_status_error">*</span></label>
                            </div>
                            <div class="col-9">
                                <input class="form-control" type="text" id="mother_address" name="mother_address" value="<?php echo $motherAddressComplete; ?>">
                                <?php
                                    if($mother_status=="living"){
                                        if (!empty($motherAddressError)){ ?>
                                        <span class="help-inline">
                                        <?php   echo $motherAddressError; ?>
                                        </span>
                                        <?php
                                        }
                                    }
                                    else{
                                    }
                                ?>
                            </div>
                        </div>
                        <div class="form-row mb-4">
                            <div class="col-sm-2 col-md-3">
                                <label class="form-label" for="mother_street">Street:<span class="mother_status_error">*</span></label>
                            </div>
                            <div class="col-9">
                                <input class="form-control" type="text" id="mother_street" name="mother_street" value="<?php echo $motherStreetComplete; ?>">
                                <?php
                                    if($mother_status=="living"){
                                        if (!empty($motherStreetError)){ ?>
                                        <span class="help-inline">
                                        <?php   echo $motherStreetError; ?>
                                        </span>
                                        <?php
                                        }
                                    }
                                    else{
                                    }
                                ?>
                            </div>
                        </div>
                        <div class="form-row mb-4">
                            <div class="col-sm-2 col-md-3">
                                <label class="form-label" for="mother_town">Township:<span class="mother_status_error">*</span></label>
                            </div>
                            <div class="col-3">
                                <input class="form-control" type="text" id="mother_town" name="mother_town" value="<?php echo $motherTownComplete; ?>">
                                <?php
                                    if($mother_status=="living"){
                                        if (!empty($motherTownError)){ ?>
                                        <span class="help-inline">
                                        <?php   echo $motherTownError; ?>
                                        </span>
                                        <?php
                                        }
                                    }
                                    else{
                                    }
                                ?>
                            </div>
                            <div class="col-sm-1 col-md-2">
                                <label class="form-label" for="mother_city">City:<span class="mother_status_error">*</span></label>
                            </div>
                            <div class="col-2">
                                <input class="form-control" type="text" id="mother_city" name="mother_city" value="<?php echo $motherCityComplete; ?>">
                                <?php
                                    if($mother_status=="living"){
                                        if (!empty($motherCityError)){ ?>
                                        <span class="help-inline">
                                        <?php   echo $motherCityError; ?>
                                        </span>
                                        <?php
                                        }
                                    }
                                    else{
                                    }
                                ?>
                            </div>
                        </div>
                        <div class="form-row mb-4">
                            <div class="col-sm-2 col-md-3">
                                <label class="form-label" for="mother_zip">Zip Code:</label>
                            </div>
                            <div class="col-9">
                                <input class="form-control" type="text" id="mother_zip" name="mother_zip" value="<?php echo $motherZipComplete; ?>">
                            </div>
                        </div>
                        <div class="form-row mb-4">
                            <div class="col-sm-2 col-md-3">
                                <label class="form-label" for="mother_telephone">Telephone:</label>
                            </div>
                            <div class="col-3">
                                <input class="form-control" type="number" id="mother_telephone" name="mother_telephone" value="<?php echo $motherTelephoneComplete; ?>">
                            </div>
                            <div class="col-sm-1 col-md-2">
                                <label class="form-label" for="mother_mobile">Mobile:<span class="mother_status_error">*</span></label>
                            </div>
                            <div class="col-2">
                                <input class="form-control" type="number" id="mother_mobile" name="mother_mobile" value="<?php echo $motherMobileComplete; ?>">
                                <?php
                                    if($mother_status=="living"){
                                        if (!empty($motherMobileError)){ ?>
                                        <span class="help-inline">
                                        <?php   echo $motherMobileError; ?>
                                        </span>
                                        <?php
                                        }
                                    }
                                    else{
                                    }
                                ?>
                            </div>
                        </div>
                    </div>
                    <div class="bottom"></div>


                <!-- Guardian's Information -->
                <p class="h3 pb-3 mt-3">Guardian's Information</p>
                    <div class="form-group p-3 pl-5">
                        <div class="form-row">
                            <div class="col-sm-2 col-md-3">
                                <label class="form-label" for="status">Guardian is:</label>
                            </div>
                            <div class="col-9">
                                <label class="form-label"><input type="radio" name="gstatus" <?php if (isset($gstatusComplete) && $gstatusComplete=="father") echo "checked";?> value="father" id="father" checked>&nbsp; Father</label>
                                <label class="form-label"><input type="radio" name="gstatus" <?php if (isset($gstatusComplete) && $gstatusComplete=="mother") echo "checked";?> value="mother" id="mother">&nbsp;Mother</label>
                                <label class="form-label"><input type="radio" name="gstatus" <?php if (isset($gstatusComplete) && $gstatusComplete=="other") echo "checked";?> value="other" id="other">&nbsp;Other</label>                            
                            </div>
                        </div>
                    </div>
                    <div id="guardianInfo">
                    <?php  
                        if (isset($gstatusComplete) && $gstatusComplete=="other")
                        { ?>
                        <div class="form-group p-3 pl-5">
                            <div class="form-row mb-4">
                                <div class="col-sm-2 col-md-3">
                                    <label class="form-label" for="other_name">Name:<span class="error">*</span></label>
                                </div>
                                <div class="col-9">
                                    <input class="form-control" type="text" id="other_name" name="other_name" value="<?php echo $otherNameComplete; ?>">
                                    <?php if (!empty($otherNameError)): ?>
                                    <span class="help-inline"><?php echo $otherNameError;?></span>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="form-row mb-4">
                                <div class="col-sm-2 col-md-3">
                                    <label class="form-label" for="other_nation">Nationaility:</label>
                                </div>
                                <div class="col-9">
                                    <input type="text" class="form-control" id="other_nation" name="other_nation" value="<?php echo $otherNationailityComplete; ?>">
                                </div>
                            </div>
                            <div class="form-row mb-4">
                                <div class="col-sm-2 col-md-3">
                                    <label class="form-label" for="other_status">Status</label>
                                </div>
                                <div class="col-9">
                                    <input type="radio" id="other_status" class="other_living"  name="other_status" <?php if (isset($otherStatusComplete) && $otherStatusComplete=="living") echo "checked";?> value="living">
                                    <label class="form-label" for="status">Living</label>
                                    <input type="radio" id="other_status" class="other_deceased"  name="other_status" <?php if (isset($otherStatusComplete) && $otherStatusComplete=="deceased") echo "checked";?> value="deceased">
                                    <label class="form-label" for="status">Deceased</label>
                                </div>
                            </div>
                            <div class="form-row mb-4">
                                <div class="col-sm-2 col-md-3">
                                    <label class="form-label" for="other_age">Age:</label>
                                </div>
                                <div class="col-9">
                                    <input class="age-form-control" type="text" id="other_age" name="other_age" value="<?php echo $otherAgeComplete; ?>">&nbsp; Year
                                </div>
                            </div>
                            <div class="form-row mb-4">
                                <div class="col-sm-2 col-md-3">
                                    <label class="form-label" for="other_occupation">Occupation:</label>
                                </div>
                                <div class="col-3">
                                    <input class="form-control" type="text" id="other_occupation" name="other_occupation" value="<?php echo $otherOccupationComplete; ?>">
                                </div>
                                <div class="col-sm-1 col-md-2">
                                    <label class="form-label" for="other_position">Position:</label>
                                </div>
                                <div class="col-2">
                                    <input class="form-control" type="text" id="other_position" name="other_position" value="<?php echo $otherPositionComplete; ?>">
                                </div>
                            </div><br><br>
                            <div class="form-row mb-4">
                                <div class="col-sm-2 col-md-3">
                                    <label class="form-label" for="other_same_address">Mother address:</label>
                                </div>
                                <div class="col-9">
                                    <input type="checkbox" id="other_same_address" name="other_same_address" <?php if (isset($otherSameAddressComplete) && $otherSameAddressComplete=="address") echo "checked";?> value="address">
                                    <label for="msame_address">Same as Applicant Address</label>
                                </div>
                            </div>
                            <div class="form-row mb-4">
                                <div class="col-sm-2 col-md-3">
                                    <label class="form-label" for="other_address">Address No:<span class="other_status_error">*</span></label>
                                </div>
                                <div class="col-9">
                                    <input class="form-control" type="text" id="other_address" name="other_address" value="<?php echo $otherAddressComplete; ?>">
                                    <?php
                                        if($other_status=="living"){
                                            if (!empty($otherAddressError)){ ?>
                                            <span class="help-inline">
                                            <?php   echo $otherAddressError; ?>
                                            </span>
                                            <?php
                                            }
                                        }
                                        else{
                                        }
                                    ?>
                                </div>
                            </div>
                            <div class="form-row mb-4">
                                <div class="col-sm-2 col-md-3">
                                    <label class="form-label" for="other_street">Street:<span class="other_status_error">*</span></label>
                                </div>
                                <div class="col-9">
                                    <input class="form-control" type="text" id="other_street" name="other_street" value="<?php echo $otherStreetComplete; ?>">
                                    <?php
                                        if($other_status=="living"){
                                            if (!empty($otherStreetError)){ ?>
                                            <span class="help-inline">
                                            <?php   echo $otherStreetError; ?>
                                            </span>
                                            <?php
                                            }
                                        }
                                        else{
                                        }
                                    ?>
                                </div>
                            </div>
                            <div class="form-row mb-4">
                                <div class="col-sm-2 col-md-3">
                                    <label class="form-label" for="other_town">Township:<span class="other_status_error">*</span></label>
                                </div>
                                <div class="col-3">
                                    <input class="form-control" type="text" id="other_town" name="other_town" value="<?php echo $otherTownComplete; ?>">
                                    <?php
                                        if($other_status=="living"){
                                            if (!empty($otherTownError)){ ?>
                                            <span class="help-inline">
                                            <?php   echo $otherTownError; ?>
                                            </span>
                                            <?php
                                            }
                                        }
                                        else{
                                        }
                                    ?>
                                </div>
                                <div class="col-sm-1 col-md-2">
                                    <label class="form-label" for="other_city">City:<span class="other_status_error">*</span></label>
                                </div>
                                <div class="col-2">
                                    <input class="form-control" type="text" id="other_city" name="other_city" value="<?php echo $otherCityComplete; ?>">
                                    <?php
                                        if($other_status=="living"){
                                            if (!empty($otherCityError)){ ?>
                                            <span class="help-inline">
                                            <?php   echo $otherCityError; ?>
                                            </span>
                                            <?php
                                            }
                                        }
                                        else{
                                        }
                                    ?>
                                </div>
                            </div>
                            <div class="form-row mb-4">
                                <div class="col-sm-2 col-md-3">
                                    <label class="form-label" for="other_zip">Zip Code:</label>
                                </div>
                                <div class="col-9">
                                    <input class="form-control" type="text" id="other_zip" name="other_zip" value="<?php echo $otherZipComplete; ?>">
                                </div>
                            </div>
                            <div class="form-row mb-4">
                                <div class="col-sm-2 col-md-3">
                                    <label class="form-label" for="other_telephone">Telephone:</label>
                                </div>
                                <div class="col-3">
                                    <input class="form-control" type="number" id="other_telephone" name="other_telephone" value="<?php echo $otherTelephoneComplete; ?>">
                                </div>
                                <div class="col-sm-1 col-md-2">
                                    <label class="form-label" for="other_mobile">Mobile:<span class="other_status_error">*</span></label>
                                </div>
                                <div class="col-2">
                                    <input class="form-control" type="number" id="other_mobile" name="other_mobile" value="<?php echo $otherMobileComplete; ?>">
                                    <?php
                                        if($other_status=="living"){
                                            if (!empty($otherMobileError)){ ?>
                                            <span class="help-inline">
                                            <?php   echo $otherMobileError; ?>
                                            </span>
                                            <?php
                                            }
                                        }
                                        else{
                                        }
                                    ?>
                                </div>
                            </div>
                        </div>
                    <?php 
                    } 
                    ?>
                    </div>
                    <div class="bottom"></div>


                <!-- Submit/Reset button -->
                <div class="form-group p-3 pl-5">
                    <div class="row">
                        <div class="col-sm-2 col-md-3"></div>
                        <div class="col-sm-2 col-md-3">
                            <button class="btn btn-block">Submit</button>
                        </div>
                        <div class="col-sm-2 col-md-3">
                            <button type="reset" class="btn btn-block">Clear</button>
                        </div>
                        <div class="col-sm-2 col-md-3"></div>
                    </div>
                </div>

            </form>
        </div>

        <?php
        require 'footer.php';
        ?>


        <!-- JSON format for other status -->
        <script>

        $(document).ready(function(){

            $('.father_deceased').on('change', function (){
                var ischecked= $(this).is(':checked');
                console.log(ischecked);

                $('.father_status_error').hide();

            });
            $('.father_living').on('change', function (){
                var ischecked= $(this).is(':checked');
                console.log(ischecked);

                $('.father_status_error').show();

            });
            $('.mother_deceased').on('change', function (){
                var ischecked= $(this).is(':checked');
                console.log(ischecked);

                $('.mother_status_error').hide();

            });
            $('.mother_living').on('change', function (){
                var ischecked= $(this).is(':checked');
                console.log(ischecked);

                $('.mother_status_error').show();

            });
            $('.other_deceased').on('change', function (){
                var ischecked= $(this).is(':checked');
                console.log(ischecked);

                $('.other_status_error').hide();

            });
            $('.other_living').on('change', function (){
                var ischecked= $(this).is(':checked');
                console.log(ischecked);

                $('.other_status_error').show();

            });


            $('#father_same_address').on('change', function () {
            var ischecked= $(this).is(':checked');

            if(ischecked){
                var address= $('#address').val();
                var street= $('#street').val();
                var township= $('#town').val();
                var city= $('#city').val();
                var zipcode= $('#zip').val();
                var telephone= $('#telephone').val();

                console.log(city);
        
                $.post("application.php", {address , street, township, city, zipcode, telephone},
                
                    function(){
                        console.log(city);
                        $('#father_address').val(address);
                        $('#father_street').val(street);
                        $('#father_town').val(township);
                        $('#father_city').val(city);
                        $('#father_zip').val(zipcode);
                        $('#father_telephone').val(telephone);

                });
            }
            else(!ischecked)
                $('#father_address').val('');
                $('#father_street').val('');
                $('#father_town').val('');
                $('#father_city').val('');
                $('#father_zip').val('');
                $('#father_telephone').val('');

            
        });

        $('#mother_same_address').on('change', function () {
            var ischecked= $(this).is(':checked');

            if(ischecked){
                var address= $('#address').val();
                var street= $('#street').val();
                var township= $('#town').val();
                var city= $('#city').val();
                var zipcode= $('#zip').val();
                var telephone= $('#telephone').val();

                console.log(city);
        
                $.post("application.php", {address , street, township, city, zipcode, telephone},
                
                    function(){
                        console.log(city);
                        $('#mother_address').val(address);
                        $('#mother_street').val(street);
                        $('#mother_town').val(township);
                        $('#mother_city').val(city);
                        $('#mother_zip').val(zipcode);
                        $('#mother_telephone').val(telephone);

                });
            }
            else(!ischecked)
                $('#mother_address').val('');
                $('#mother_street').val('');
                $('#mother_town').val('');
                $('#mother_city').val('');
                $('#mother_zip').val('');
                $('#mother_telephone').val('');

            
        });

        $("#other_same_address").on("change", function () {
        var ischecked= $(this).is(":checked");

        if(ischecked){
            var address= $("#address").val();
            var street= $("#street").val();
            var township= $("#town").val();
            var city= $("#city").val();
            var zipcode= $("#zip").val();
            var telephone= $("#telephone").val();

            console.log(city);
    
            $.post("application.php", {address , street, township, city, zipcode, telephone},
            
                function(){
                    console.log(city);
                    $("#other_address").val(address);
                    $("#other_street").val(street);
                    $("#other_town").val(township);
                    $("#other_city").val(city);
                    $("#other_zip").val(zipcode);
                    $("#other_telephone").val(telephone);

            });
        }
        else(!ischecked)
            $("#other_address").val("");
            $("#other_street").val("");
            $("#other_town").val("");
            $("#other_city").val("");
            $("#other_zip").val("");
            $("#other_telephone").val("");

         
        });

        $('#other').on('change', function () {

            var gstatus = $(this).val();
            console.log(gstatus);
        
            
            $.ajax({
                type: "POST",
                url: "show_guardian.php",
                // dataType: 'json',
                data: {'gstatus': gstatus },
                success: function (html) {
                    
                    console.log(html);
                    $('#guardianInfo').html(html);
                    
                
                }
            });
        });


        $('#father').on('change', function () {

            var gstatus = $(this).val();
            console.log(gstatus);


            $.ajax({
                type: "POST",
                url: "show_guardian.php",
                // dataType: 'json',
                data: {'gstatus': gstatus },
                success: function (json) {
                    
                    console.log(json);
                    $('#guardianInfo').html(json);
                    
                
                }
            });
        });

        $('#mother').on('change', function () {

            var gstatus = $(this).val();
            console.log(gstatus);


            $.ajax({
                type: "POST",
                url: "show_guardian.php",
                // dataType: 'json',
                data: {'gstatus': gstatus },
                success: function (json) {
                    
                    console.log(json);
                    $('#guardianInfo').html(json);
                    
                
                }
            });
        });

        });

        </script>

    </body>
</html>