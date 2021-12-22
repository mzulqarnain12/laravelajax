
<script type="text/javascript">
    $(document).ready(function($) {

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $('#addNew').click(function() {
            $('#addEditForm').trigger("reset");
            $('#ajaxModel').html("Add New");
            $('#ajax-model').modal('show');
        });

        $('body').on('click', '.edit', function() {

            var id = $(this).data('id');

            // ajax
            $.ajax({
                type: "POST",
                url: "{{ url('edit-a') }}",
                data: {
                    id: id
                },
                dataType: 'json',
                success: function(res) {
                    $('#ajaxModel').html("Edit New");
                    $('#ajax-model').modal('show');
                    $('#id').val(res.id);
                    $('#fullname').val(res.fullname);
                    $('#address').val(res.address);
                    $('#contact').val(res.contact);
                    $('#city').val(res.city);
                    $('#country').val(res.country);
                }
            });

        });



        $('body').on('click', '#btn-save', function(event) {

            var id = $("#id").val();
            var fullname = $("#fullname").val();
            var address = $("#address").val();
            var contact = $("#contact").val();
            var city = $("#city").val();
            var country = $("#country").val();


            $("#btn-save").html('Please Wait...');
            $("#btn-save").attr("disabled", true);

            // ajax
            $.ajax({
                type: "POST",
                url: "{{ url('add-update') }}",
                data: {
                    id: id,
                    fullname: fullname,
                    address: address,
                    contact: contact,
                    city: city,
                    country: country,
                },
                dataType: 'json',
                success: function(res) {
                    window.location.reload();
                    $("#btn-save").html('Submit');
                    $("#btn-save").attr("disabled", false);
                }
            });

        });

    });
    $('body').on('click', '.delete', function() {
        var id = $(this).data('id');
        Swal.fire({
            title: 'Are you sure?',
            text: "Delete Permanently!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete!'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    type: "POST",
                    url: "{{ url('delete-a') }}",
                    data: {
                        id: id
                    },
                    dataType: 'json',
                    success: function(res) {

                        window.location.reload();
                    }
                });
            }
        })
    });
</script>
<script>
    $(document).ready(function() {
        $('#example').DataTable();
    });
</script>