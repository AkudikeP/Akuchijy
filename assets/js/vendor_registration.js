$(() => {
    $('form#otp-form').on('submit', (e) => {
        phoneNumber = $('#contact').val();
        switch (true) {
            case phoneNumber == '':
                e.preventDefault();
                showAlert('Please enter your phone number');
                break;

            case isNaN(phoneNumber) || phoneNumber.length != 11:
                e.preventDefault();
                showAlert('Enter a valid Mobile Number (e.g : 08012345678)');
                break;
        }
    })
    $("#nextbut").click((e) => {
        phoneNumber = $('#contact').val();
        switch (true) {
            case phoneNumber == '':
                e.preventDefault();
                showAlert('Please enter your phone number');
                return false();

            case isNaN(phoneNumber) || phoneNumber.length != 11:
                e.preventDefault();
                showAlert('Enter a valid Mobile Number (e.g : 08012345678)');
                return false();
        }
    });
    $("#nextbut1").click((e) => {
        token = $('#token').val();
        switch (true) {
            case token == '':
                e.preventDefault();
                showAlert('Please enter your OTP');
                return false();

            case token.length != 6:
                e.preventDefault();
                showAlert('Enter a valid OTP');
                return false();
        }
    });

    $("#submitbutton").click((e) => {
        token = $('#token').val();
        e.preventDefault();
        switch (true) {
            case token == '':
                showAlert('Please enter your OTP');
                return false();

            case token.length != 6:
                showAlert('Enter a valid OTP');
                return false();

            default:
                $.ajax({
                    url: baseUrl + 'index.php/Vendor/chk_token',
                    type: 'POST',
                    data: $("#chk_token").serialize(),
                    success: (response) => {
                        if (response == 'true') {
                            showAlert('Your mobile number has been verified');
                        }
                        else {
                            showAlert(response);
                            $('#nextbut1').attr('disabled', true);
                            return false();
                        }
                    },
                    error: () => {
                        showAlert('An error occured. Please try again');
                        $('#nextbut1').attr('disabled', true);
                        return false();
                    }
                });
        }
    });
    $('#contact').keyup((e) => {
        if ($(e.target).val().length != 11)
            $('#submit').attr('disabled', true);
        else
            $('#submit').attr('disabled', false);
    })

    isVendor = false;
    $('.nextbut4').attr('disabled', true);

    $('.vendor-type-options').slideUp('d-none');
    $('.type-vendor').on('click', () => {
        $('.vendor-type-options').slideDown();
        isVendor = true;
    });
    $('.type-service-provider').on('click', () => {
        $('.vendor-type-options').slideUp('d-none');
        isVendor = false;
    });

    $('#acc-name').keyup((e) => {
        if ($(e.target).val().length != 0)
        {
            $('.nextbut4').attr('disabled', false);
        }
        else
        {
            $('.nextbut4').attr('disabled', true);
        }
    })

    const banks = ['Access Bank Plc', 'Access (Diamond)', 'Citibank Nigeria Limited', 'Ecobank Nigeria Plc', 'Fidelity Bank Plc', 'FIRST BANK NIGERIA LIMITED', 'First City Monument Bank Plc', 'Globus Bank Limited', 'Guaranty Trust Bank Plc', 'Heritage Bank Ltd', 'Key Stone Bank ', 'Polaris Bank', 'Providus Bank', 'Stanbic IBTC Bank Ltd', 'Standard Chartered Bank Nigeria Ltd', 'Sterling Bank Plc', 'SunTrust Bank Nigeria Limited', 'Titan Trust Bank Ltd', 'Union Bank of Nigeria Plc', 'United Bank For Africa Plc', 'Unity Bank Plc', 'Wema Bank Plc', 'Zenith Bank Plc'];
    bankName = $('#bank-name');
    banks.forEach((element) => {
        const option = document.createElement('option');
        option.value = element;
        option.innerHTML = element;
        $(bankName).append(option);
    });
    $('.nextbut4').click((e) => {
        e.preventDefault();
        switch (true) {
            case $('#acc-name').val() == '':
                showAlert('Account name should not be empty');
                return false();

            case $('#acc-number').val().length != 10:
                showAlert('Account number must be 10 digits');
                return false();

            case $('#acc-number').val() == '':
                showAlert('Re-enter account number');
                return false();

            case $('#acc-number').val() != $('#re-acc-number').val():
                showAlert('Account Number does not match');
                return false();

            case $('#bank-name').val() == '':
                showAlert('Please select a bank');
                return false();

            case $('#sort-code').val() == '':
                showAlert('Please add your bank sort code');
                return false();

            case $('#tin').val() == '':
                showAlert('Please add your tax identification number');
                return false();

            case $('input[name=acc_type]:checked').size() < 1:
                showAlert('Select an account type');
                return false();

            case $('input[name=acc_class]:checked').size() < 1:
                showAlert('Select an account class');
                return false();

            case $('#business-name').val() == '':
                showAlert('Add your business name');
                return false();

            default:
                var formData = new FormData($("#chk_bdetail")[0]);
                $.ajax({
                    url: baseUrl + 'index.php/Vendor/registration_bank',
                    type: 'POST',
                    data: formData,
                    async: false,
                    cache: false,
                    contentType: false,
                    processData: false,
                    success: (response) => {
                        switch (response) {
                            case 'true':
                                return true;

                            default:
                                showAlert(response);
                                return false();
                        }
                    },
                    error: () => {
                        showAlert('An error occured. Please try again');
                        return false();
                    }
                });
        }
    });
    $('.nextbut3').click((e) => {
        e.preventDefault();
        switch (true) {
            case $('#password').val() == '':
                showAlert('Please enter password');
                return false();
                
            case $('#password').val().length < 5:
                    showAlert('Password must contain at least 5 characters');
                    return false();

            case $('#vendor_name').val() == '':
                showAlert('Please Enter Vendor Name');
                return false();

            case $('#email').val() == '':
                showAlert('Please Enter Email.');
                return false();

            case $('#address').val() == '':
                showAlert('Please enter your address.');
                return false();

            case $('#country').val() == '':
                showAlert('Please select country.');
                return false();

            case $('#state').val() == '':
                showAlert('Please a state.');
                return false();

            case $('#city').val() == '':
                showAlert('Please select a city');
                return false();

            case $('input[name=category]:checked').size() < 1:
                showAlert('Select a category');
                return false();

            case isVendor && $('input.vtype:checked').size() < 1:
                showAlert('At least one vendor type must be selected');
                return false();

            case $('#id_type').val() == '':
                showAlert('Please Select ID Type');
                return false();

            case $('#id_proof').get(0).files.length == 0:
                showAlert('No ID proof selected');
                return false();

            default:
                var formData = new FormData($("#chk_pdetail")[0]);
                $.ajax({
                    url: baseUrl + 'index.php/Vendor/registration_insert',
                    type: 'POST',
                    data: formData,
                    async: false,
                    cache: false,
                    contentType: false,
                    processData: false,
                    success: (response) => {
                        if (response == 'true') {
                            return true;
                        }
                        else {
                            showAlert(response);
                            return false();
                        }
                    },
                    error: (response) => {
                        showAlert('An error occured. Please try again');
                        return false();
                    }
                });
        }
    });
    $("#ques_button").click((e) => {
        e.preventDefault();
        switch (true) {
            case $('#question1').val() == '':
                showAlert('Please answer question number 1');
            break;

            case $('#question2').val() == '':
                showAlert('Please answer question number 2');
            break;

            case $('#question3').val() == '':
                showAlert('Please answer question number 3');
            break;

            case $('#question4').val() == '':
                showAlert('Please answer question number 4');
            break;

            case $('#question5').val() == '':
                showAlert('Please answer question number 5');
            break;

            default:
                $.ajax({
                    url: baseUrl + 'index.php/Vendor/insert_question',
                    type: 'POST',
                    data: $("#ques").serialize(),
                    success: (response) => {
                        if (response == 'true') {
                            $.confirm({
                                title: 'Alert',
                                content: 'You will get a confirmation call from Ansvel soon, Once your account will be activated, you will able to access your account.',
                                icon: 'fa fa-question-circle',
                                animation: 'scale',
                                closeAnimation: 'scale',
                                opacity: 0.5,
                                buttons: {
                                    'confirm': {
                                        text: 'Ok',
                                        btnClass: 'btn-info',
                                        action: () => {
                                            window.location.href = baseUrl + 'Vendor';
                                        }
                                    },
                                }
                            });
                        }
                        else {
                            showAlert(response);
                        }
                    },
                    error: () => {
                        showAlert('An error occured. Please try again');
                    }
                });
        }
    });

    function showAlert(msg) {
        $.confirm({
            title: 'Alert',
            content: msg,
            icon: 'fa fa-question-circle',
            animation: 'scale',
            closeAnimation: 'scale',
            opacity: 0.5,
            buttons: {
                'confirm': {
                    text: 'Ok',
                    btnClass: 'btn-info',
                    action: () => {
                    }
                },
            }
        });
    }
})