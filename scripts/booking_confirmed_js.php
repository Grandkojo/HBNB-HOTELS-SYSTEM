<script>
    // Get today's date in the format "YYYY-MM-DD"
    function getTodayDate() {
        const today = new Date();
        const year = today.getFullYear();
        const month = String(today.getMonth() + 1).padStart(2, '0');
        const day = String(today.getDate()).padStart(2, '0');
        return `${year}-${month}-${day}`;
    }

    // Set the minimum date to today
    document.getElementById('check_in_date').min = getTodayDate();
</script>

<script>
    document.getElementById('check_in_date').addEventListener('change', function() {
        // Update the min attribute of the check_out_date input based on the selected check-in date
        document.getElementById('check_out_date').min = this.value;
    });

    document.getElementById('check_out_date').addEventListener('change', function() {
        const checkInDate = new Date(document.getElementById('check_in_date').value);
        const checkOutDate = new Date(this.value);

        // If the dates are the same, add a duration input
        if (checkInDate.toDateString() === checkOutDate.toDateString()) {
            const newInput = document.createElement('input');
            newInput.style = 'margin-top: 10px; margin-bottom: 10px;';
            newInput.type = 'number';
            newInput.min = 10;
            newInput.className = 'form-control';
            newInput.max = 23;
            newInput.name = 'duration';
            newInput.id = 'duration';
            newInput.placeholder = 'Hours (min 10, max 23)';
            newInput.required = true;

            let durationsContainer = document.getElementById('durations');

            durationsContainer.innerHTML = '';

            durationsContainer.appendChild(newInput);
            durationsContainer.onkeyup = durationValidity();
        } else {
            document.getElementById('durations').innerHTML = '';
        }
    });
</script>

<script>
    function durationValidity() {
        const message = document.createElement('p');
        message.style = 'color: blue; font-size: 13px';
        message.innerHTML = "Duration must be between 10 and 23"
        let durationInput = document.getElementById('duration');
        let timeoutId;

        durationInput.addEventListener('input', function() {
            clearTimeout(timeoutId);

            timeoutId = setTimeout(function() {
                if (durationInput.value < 10 || durationInput.value > 23) {
                    let validateHours = document.getElementById('checkHours');
                    alert("Duration must be between 10 and 23");
                    return;
                } else {
                    document.getElementById('checkHours').innerHTML = "";
                }
            }, 1000);
        });
    }
</script>


<script>
    let submitform = document.getElementById('bookingForm');
    let submit = document.getElementById('emailsubmission');
    let occupants_no = document.getElementById('occupants');
    let durationInput = document.getElementById('duration');
    let firstname = document.getElementById('firstname');
    let lastname = document.getElementById('lastname');
    let check_in_date = document.getElementById('check_in_date');
    let check_out_date = document.getElementById('check_out_date');
    let email = document.getElementById('email');



    submit.addEventListener('click', function() {
         if (firstname.value == ""){
            alert('Enter your first name');
            return;
        } 
        if (lastname.value == ""){
            alert('Enter your last name');
            return;
        }
        if (occupants_no.value < 1 || occupants_no.value > 5) {
            alert("Occupants number must be between 1 and 5");
            return;
        }
        if (check_in_date.value == ""){
            alert('Enter your check-in date');
            return;
        }
        if (check_out_date.value == ""){
            alert('Enter your check-out date');
            return;
        }
        
        if (email.value == ""){
            alert('Enter your email')
            return;
        }
        
        swal({
            title: "Booking Successful!",
            text: "You will receive a confirmation email shortly...",
            icon: "success",
            buttons: ["CANCEL", "SEND"],
        }).then((result) => {
            if (result) {
                submitform.submit();
                swal("Email Sent!", "Thank you for booking with us!", "success");
            }
        });
    });
</script>