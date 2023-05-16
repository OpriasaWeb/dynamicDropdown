

//#insert
$(document).ready(function(){

    $('#insert').click(function(e){
        e.preventDefault();

        var lname= $('#lastname').val();

        var fname= $('#firstname').val();
        
        // Insert account
        var fullname = fname + " " + lname;
        var status= $('#status').val();

        // Insert accountdetails
        var islandName = $('select[name="slnd"] option:selected').text();
        var regionName = $('select[name="rgn"] option:selected').text();
        var provinceName = $('select[name="prvnc"] option:selected').text();
        var cityName = $('select[name="ct"] option:selected').text();
        var barangayName = $('select[name="brgy"] option:selected').text();
        var ddrss = $('#address').val();
        var gender = $('#gender').val();
        // var full_address = ddrss + ", " + barangayName + ", " + cityName + ", " + provinceName + ", " + regionName + ", " + islandName;

        // console.log(fullname, status, full_address, gender);

        if(fullname !== ''){
            $.ajax({
                url: "./controller/userHandler.php",
                type: "POST",
                data: {
                    insert: true,
                    fullname: fullname,
                    status: status,
                    island_name: islandName,
                    region_name: regionName,
                    province_name: provinceName,
                    city_name: cityName,
                    barangay_name: barangayName,
                    street: ddrss,
                    gender: gender
                },
                success: function(res){
                    console.log(res);
                }
                // error: function(error) {
                //     // Handle any errors that occur during the AJAX request
                //     console.log('Error: ' + error);
                // }
            })
        } else{
            // Handle the case where one or both fields are empty
            alert('Please enter your first and last name');
        }

        

    })

})

