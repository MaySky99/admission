<?php 
session_start();
?>

<?php
$output = '' ;
if(isset($_POST['gstatus']))
{
    
    if($_POST['gstatus']=="other")
    {
        $output = '' ;
        $output .='<div class="form-group p-3 pl-5">
        <div class="form-row mb-4">
            <div class="col-sm-2 col-md-3">
                <label class="form-label" for="other_name">Name:<span class="error">*</span></label>
            </div>
            <div class="col-9">
                <input class="form-control" type="text" id="other_name" name="other_name">
            </div>
        </div>
        <div class="form-row mb-4">
            <div class="col-sm-2 col-md-3">
                <label class="form-label" for="other_nation">Nationaility:</label>
            </div>
            <div class="col-9">
                <input type="text" class="form-control" id="other_nation" name="other_nation">
            </div>
        </div>
        <div class="form-row mb-4">
            <div class="col-sm-2 col-md-3">
                <label class="form-label" for="other_status">Status:</label>
            </div>
            <div class="col-9">
                <input type="radio" id="other_status"  class="other_living" name="other_status" value="living" >
                <label class="form-label" for="other_status">Living</label>
                <input type="radio" id="other_status" class="other_deceased" name="other_status" value="deceased">
                <label class="form-label" for="other_status">Deceased</label>
            </div>
        </div>
        <div class="form-row mb-4">
            <div class="col-sm-2 col-md-3">
                <label class="form-label" for="other_age">Age:</label>
            </div>
            <div class="col-9">
                <input class="age-form-control" type="text" id="other_age" name="other_age">&nbsp; Year
            </div>
        </div>
        <div class="form-row mb-4">
            <div class="col-sm-2 col-md-3">
                <label class="form-label" for="other_occupation">Occupation:</label>
            </div>
            <div class="col-3">
                <input class="form-control" type="text" id="other_occuption" name="other_occuption">
            </div>
            <div class="col-sm-1 col-md-2">
                <label class="form-label" for="other_position">Position:</label>
            </div>
            <div class="col-2">
                <input class="form-control" type="text" id="other_position" name="other_position">
            </div>
        </div><br><br>
        <div class="form-row mb-4">
            <div class="col-sm-2 col-md-3">
                <label class="form-label" for="other_same_address">Guardian Address:</label>
            </div>
            <div class="col-9">
                <input type="checkbox" id="other_same_address" name="other_same_address" value="address">
                <label for="address">Same as Applicant Address</label>
            </div>
        </div>
        <div class="form-row mb-4">
            <div class="col-sm-2 col-md-3">
                <label class="form-label" for="other_address">Address No:<span class="other_status_error">*</span></label>
            </div>
            <div class="col-9">
                <input class="form-control" type="text" id="other_address" name="other_address">
            </div>
        </div>
        <div class="form-row mb-4">
            <div class="col-sm-2 col-md-3">
                <label class="form-label" for="other_street">Street:<span class="other_status_error">*</span></label>
            </div>
            <div class="col-9">
                <input class="form-control" type="text" id="other_street" name="other_street">
            </div>
        </div>
        <div class="form-row mb-4">
            <div class="col-sm-2 col-md-3">
                <label class="form-label" for="other_town">Township:<span class="other_status_error">*</span></label>
            </div>
            <div class="col-3">
                <input class="form-control" type="text" id="other_town" name="other_town">
            </div>
            <div class="col-sm-1 col-md-2">
                <label class="form-label" for="other_city">City:<span class="other_status_error">*</span></label>
            </div>
            <div class="col-2">
                <input class="form-control" type="text" id="other_city" name="other_city">
            </div>
        </div>
        <div class="form-row mb-4">
            <div class="col-sm-2 col-md-3">
                <label class="form-label" for="other_zip">Zip Code:</label>
            </div>
            <div class="col-9">
                <input class="form-control" type="text" id="other_zip" name="other_zip">
            </div>
        </div>
        <div class="form-row mb-4">
            <div class="col-sm-2 col-md-3">
                <label class="form-label" for="other_telephone">Telephone:</label>
            </div>
            <div class="col-3">
                <input class="form-control" type="number" id="other_telephone" name="other_telephone">
            </div>
            <div class="col-sm-1 col-md-2">
                <label class="form-label" for="other_mobile">Mobile:<span class="other_status_error">*</span></label>
            </div>
            <div class="col-2">
                <input class="form-control" type="number" id="other_mobile" name="other_mobile">
            </div>
        </div>
    </div>
    <script>

    $(document).ready(function(){

        $(".other_deceased").on("change", function (){
            var ischecked= $(this).is(":checked");
            console.log(ischecked);

            $(".other_status_error").hide();

        });
        $(".other_living").on("change", function (){
            var ischecked= $(this).is(":checked");
            console.log(ischecked);

            $(".other_status_error").show();

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
    
            $.post("oxford_login.php", {address , street, township, city, zipcode, telephone},
            
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
    });
    </script>';
    }

    
    echo $output;
    
  
}


?>