<script src="{{url('admin/js/jquery.js')}}"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script src="{{url('https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js')}}"></script>
<script src="{{url('https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js')}}"></script>
<script src="{{url('https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js')}}"></script>
<script src="{{url('admin/js/bootstrap.min.js')}}"></script>
<script>
    $(document).ready(function () {
        $('textarea').summernote();
    });
</script>


<!-- swal for delete -->
<script>
$(document).ready(function() {

    const swalWithBootstrapButtons = Swal.mixin({
        customClass: {
            confirmButton: 'btn btn-success',
            cancelButton: 'btn btn-danger'
        },
        buttonsStyling: false
    });

    $('.confirm-delete').click(function(e) {
        e.preventDefault();
        var aboutId = $(this).data('id');
        swalWithBootstrapButtons.fire({
            title: "Are you sure?",
            text: "You won't be able to revert this!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonText: "Yes, delete it!",
            cancelButtonText: "No, cancel!",
            reverseButtons: false
        }).then((result) => {
            if (result.isConfirmed) {

                $(this).closest('form').submit();
            } else if (result.dismiss === Swal.DismissReason.cancel) {
                swalWithBootstrapButtons.fire({
                    title: "Cancelled",
                    text: "Your file is safe :)",
                    icon: "error"
                });
            }
        });
    });
});
</script>

<script>
    $(document).ready(function() {

const swalWithBootstrapButtons = Swal.mixin({
    customClass: {
        confirmButton: 'btn btn-success',
        cancelButton: 'btn btn-danger'
    },
    buttonsStyling: false
});

$('.confirm-delete1').click(function(e) {
    e.preventDefault();
    var aboutId = $(this).data('id');
    swalWithBootstrapButtons.fire({
        title: "Are you sure?",
        text: "You won't be able to revert this!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonText: "Yes, delete it!",
        cancelButtonText: "No, cancel!",
        reverseButtons: false
    }).then((result) => {
        if (result.isConfirmed) {

            $(this).closest('form').submit();
        } else if (result.dismiss === Swal.DismissReason.cancel) {
            swalWithBootstrapButtons.fire({
                title: "Cancelled",
                text: "Your Profile is safe :)",
                icon: "error"
            });
        }
    });
});
});
</script>

<!-- swal for publish -->
<script>
$(document).ready(function() {

const swalWithBootstrapButtons = Swal.mixin({
  customClass: {
    confirmButton: 'btn btn-success',
    cancelButton: 'btn btn-danger'
  },
  buttonsStyling: false
});

$('.confirm-publish').click(function(e) {
  e.preventDefault();

  var aboutId = $(this).data('id');

  swalWithBootstrapButtons.fire({
    title: "Are you sure you want to publish?",
    icon: "success",
    showCancelButton: true,
    confirmButtonText: "Yes, publish",
    cancelButtonText: "No, cancel",
    reverseButtons: false
  }).then((result) => {
    if (result.isConfirmed) {
      $.ajax({
        url: $(this).closest('form').attr('action'),
        type: 'POST',
        data: $(this).closest('form').serialize(),
        success: function(response) {
          swalWithBootstrapButtons.fire({
            title: "Published!",
            text: "Your file has been published.",
            icon: "success"
          }).then(() => {
            window.location.href = window.location.href;
          });
        },
        error: function(jqXHR, textStatus, errorThrown) {
          swalWithBootstrapButtons.fire({
            title: "Error!",
            text: "An error occurred while publishing the file.",
            icon: "error"
          });
        }
      });
    } else if (result.dismiss === Swal.DismissReason.cancel) {

      swalWithBootstrapButtons.fire({
        title: "Cancelled",
        text: "Publishing has been cancelled.",
        icon: "error"
      });
    }
  });
});
});

</script>


<script src="http://cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script>
        {!! Toastr::message() !!}


<!-- swal for user role change -->

<script>
 $(document).ready(function() {
  $('.change-role-btn').click(function(e) {
    e.preventDefault();

    var userId = $(this).data('userId');
    // Improved DOM access and fallback (prioritizes data attribute if available)
    var currentRole = $(this).data('current-role');


    var newRole = $('input[name="new_role"]').val();

    var confirmationText = 'Are you sure you want to change the role?';
    // if (currentRole !== newRole) {
    //   confirmationText += `\nFrom ${currentRole} to ${newRole}`;
    // }

    Swal.fire({
      title: confirmationText,
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Yes, change role!'
    }).then((result) => {
      if (result.isConfirmed) {
        $('#user-role-form-' + userId).submit(); // Submit the form on confirmation
      }
    });
  });
});

</script>



</body>

</html>

