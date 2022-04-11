//spaghetti code incoming - I didn't have anytime to do optimisations, this file was made 2 days before my self set deadline and 3 days before the real deadline

async function edit(type) {
    // Using a switch statement to save processing time and make the code more efficient
    let initialValue = '';
    let val = '';
    switch (type) {
        case 'account_number':
            initialValue = document.getElementById('account_number').innerHTML;
            val = await Swal.fire({
                title: 'What your bank account number?',
                input: 'text',
                inputLabel: 'This can usually be found on your bank\'s website!',
                inputValue: initialValue,
                showCancelButton: true,
                inputValidator: (value) => {
                    if (!value) return 'You need to write something!';
                    if(value < 00000001 || value > 99999999 || value.length !== 8) return 'Invalid account number!';
                    if(value === initialValue) return 'The name has not changed!';
                }
            })

            if(val.isConfirmed) document.getElementById('account_number').innerHTML = val.value;
            break;

        case 'institution_number':
            initialValue = document.getElementById('institution_number').innerHTML;
            val = await Swal.fire({
                title: 'What your banks financial institution number?',
                input: 'text',
                inputLabel: 'This can usually be found on your bank\'s website!',
                inputValue: initialValue,
                showCancelButton: true,
                inputValidator: (value) => {
                    if (!value) return 'You need to write something!';
                    if(value < 001 || value > 999 || value.length !== 3) return 'Invalid financial institution number!';
                    if(value === initialValue) return 'The name has not changed!';
                }
            })

            if(val.isConfirmed) document.getElementById('institution_number').innerHTML = val.value;
            break;

        case 'transit_number':
            initialValue = document.getElementById('transit_number').innerHTML;
            val = await Swal.fire({
                title: 'What your banks transit number?',
                input: 'text',
                inputLabel: 'This can usually be found on your bank\'s website!',
                inputValue: initialValue,
                showCancelButton: true,
                inputValidator: (value) => {
                    if (!value) return 'You need to write something!';
                    if(value < 000001 || value > 999999 || value.length !== 6) return 'Invalid transit number!';
                    if(value === initialValue) return 'The name has not changed!';
                }
            })

            if(val.isConfirmed) document.getElementById('transit_number').innerHTML = val.value;
            break;

        case 'address_filler':
            initialValue = document.getElementById('memo').innerHTML;
            val = await Swal.fire({
                title: 'Please enter your home address!',
                html:
                    '<input id="swal-input1" class="swal2-input" placeholder="Street Name">' +
                    '<input id="swal-input2" class="swal2-input" placeholder="District">' +
                    '<input id="swal-input3" class="swal2-input" placeholder="Postal Code">',
                focusConfirm: false,
                showCancelButton: true,
                preConfirm: () => {
                    return [
                      document.getElementById('swal-input1').value,
                      document.getElementById('swal-input2').value,
                      document.getElementById('swal-input3').value
                    ]
                  }
            })

            if(val.isConfirmed) {
                let set = true;
                val.value.forEach(item => {
                    if(item === '') set=false;
                })
                if(set) {
                    document.getElementById('street_name').innerHTML = val.value[0]
                    document.getElementById('district').innerHTML = val.value[1]
                    document.getElementById('postcode').innerHTML = val.value[2]
                }
            }
            break;

        case 'memo':
            initialValue = document.getElementById('memo').innerHTML;
            val = await Swal.fire({
                title: 'What would you like the cheque to be about?',
                input: 'text',
                inputLabel: 'Please enter the memo for your cheque!',
                inputValue: initialValue,
                showCancelButton: true,
                inputValidator: (value) => {
                    if (!value) return 'You need to write something!';
                    if(value > 255) return 'Name length is unsupported on this version!';
                    if(value === initialValue) return 'The name has not changed!';
                }
            })

            if(val.isConfirmed) document.getElementById('memo').innerHTML = val.value;
            break;

        case 'bank_address':
            initialValue = document.getElementById('bank_address').innerHTML;
            val = await Swal.fire({
                title: 'What is the address of your bank?',
                input: 'text',
                inputLabel: 'Please enter the address of your bank, this can usually be found on their website!',
                inputValue: initialValue,
                showCancelButton: true,
                inputValidator: (value) => {
                    if (!value) return 'You need to write something!';
                    if(value > 255) return 'Name length is unsupported on this version!';
                    if(value === initialValue) return 'The name has not changed!';
                }
            })

            if(val.isConfirmed) document.getElementById('bank_address').innerHTML = val.value;
            break;

        case 'bank_name':
            initialValue = document.getElementById('bank_name').innerHTML;
            val = await Swal.fire({
                title: 'What is the name of your bank?',
                input: 'text',
                inputLabel: 'Please enter the name of the your bank!',
                inputValue: initialValue,
                showCancelButton: true,
                inputValidator: (value) => {
                    if (!value) return 'You need to write something!';
                    if(value > 255) return 'Name length is unsupported on this version!';
                    if(value === initialValue) return 'The name has not changed!';
                }
            })

            if(val.isConfirmed) document.getElementById('bank_name').innerHTML = val.value;
            break;

        case 'name_of_sender':
            initialValue = document.getElementById('name_of_sender').innerHTML;
            val = await Swal.fire({
                title: 'What is your name?',
                input: 'text',
                inputLabel: 'Please enter your full legal name for the cheque!',
                inputValue: initialValue,
                showCancelButton: true,
                inputValidator: (value) => {
                    if (!value) return 'You need to write something!';
                    if(value > 255) return 'Name length is unsupported on this version!';
                    if(value === initialValue) return 'The name has not changed!';
                }
            })

            if(val.isConfirmed) {
                document.getElementById('name_of_sender').innerHTML = val.value
                document.getElementById('signed').innerHTML = val.value
            }
            break;

        case 'total_paying':
            initialValue = document.getElementById('total_paying').innerHTML;
            val = await Swal.fire({
                title: 'How much are you paying?',
                input: 'text',
                inputLabel: `Please enter the amount of money you are paying ${document.getElementById('paying_to').innerHTML}`,
                inputValue: initialValue,
                showCancelButton: true,
                inputValidator: (value) => {
                    if (!value) return 'You need to write something!';
                    if(isNaN(value)) return 'The amount must be a number!';
                    if(value > 999999999.99) return 'Amount length is unsupported on this version!';
                    if(value === initialValue) return 'The amount has not changed!';
                }
            })

            // SweetAlert seems to always output inputs as a string reguardless of if they're just numbers
            // This method also adds a .00 to the end which makes it look more like a cheque
            if(val.isConfirmed) {
                document.getElementById('total_paying').innerHTML = parseFloat(val.value).toFixed(2);
                document.getElementById('total_paying_long').innerHTML = numToWords(parseFloat(val.value).toFixed(2));
            }
            break;

        case 'paying_to':
            initialValue = document.getElementById('paying_to').innerHTML;
            val = await Swal.fire({
                title: 'Who are you paying?',
                input: 'text',
                inputLabel: 'Please enter the name of the person you are giving this cheque to!',
                inputValue: initialValue,
                showCancelButton: true,
                inputValidator: (value) => {
                    if (!value) return 'You need to write something!';
                    if(value > 255) return 'Name length is unsupported on this version!';
                    if(value === initialValue) return 'The name has not changed!';
                }
            })

            if(val.isConfirmed) document.getElementById('paying_to').innerHTML = val.value;
            break;
    }
}

//script for setting the cheque date automatically
let date = new Date();

//days
let days = Array.from(String(date.getDate()));
document.getElementById('date_d1').innerHTML = days[0];
document.getElementById('date_d2').innerHTML = days[1];
//days

//month
let month = Array.from(String(date.getMonth()+1));
if(month < 10) {
    document.getElementById('date_m1').innerHTML = '0';
    document.getElementById('date_m2').innerHTML = month[0];
} else {
    document.getElementById('date_m1').innerHTML = month[0];
    document.getElementById('date_m2').innerHTML = month[1];
}
//month

//year
let year = Array.from(String(date.getFullYear()));
document.getElementById('date_y1').innerHTML = year[0];
document.getElementById('date_y2').innerHTML = year[1];
document.getElementById('date_y3').innerHTML = year[2];
document.getElementById('date_y4').innerHTML = year[3];
//year