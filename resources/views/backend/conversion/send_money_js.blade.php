<script>
    function moneyCheck(amount) {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url: "/money_check",
            method: "POST",
            dataType: "json",
            data: {
                amount: amount
            },
            success: function(response) {
                if (response == "success") {
                    $("#amount").after('<label style="color: red">Your Account Balance is low.</label>');
                    $("#submit_btn").attr("disabled", true);
                } else {
                    $("#submit_btn").attr("disabled", false);
                    $("#amount").parent().children(".error").empty("");
                }
            }
        })
    }
</script>
