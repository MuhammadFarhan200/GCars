<script src="{{ asset('backend/js/bootstrap.js') }}"></script>
<script src="{{ asset('backend/js/app.js') }}"></script>
<script src="{{ asset('backend/extensions/jquery/jquery.min.js') }}"></script>
<!-- Need: Apexcharts -->
<script src="{{ asset('backend/extensions/apexcharts/apexcharts.min.js') }}"></script>
<script src="{{ asset('backend/js/pages/dashboard.js') }}"></script>
{{-- SweetAlert2 --}}
<script src="{{ asset('backend/extensions/sweetalert2/sweetalert2.all.min.js') }}"></script>
{{-- DataTable --}}
<script src="{{ asset('DataTables/datatables.min.js') }}"></script>
<script src="{{ asset('backend/js/pages/datatables.js') }}"></script>
<script>
  $(document).ready(function() {
    $('#dataTable').DataTable();
  });

  $(document).on('shown.bs.modal', function(e) {
    $('[autofocus]', e.target).focus();
  });
</script>
@include('sweetalert::alert')
{{-- Selectize --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.14.0/js/selectize.min.js"></script>
<script>
  $("#input-tags").selectize({
    delimiter: ",",
    persist: false,
    create: function(input) {
      return {
        value: input,
        text: input,
      };
    },
  });
</script>
{{-- Text Editor --}}
<script src="{{ asset('backend/js/pages/quill.js') }}"></script>

<script src="{{ asset('backend/extensions/tinymce/tinymce.min.js') }}"></script>
<script src="{{ asset('backend/js/pages/tinymce.js') }}"></script>

<script>
  // Dropzone has been added as a global variable.
  const dropzone = new Dropzone("#my-dropzone", {
    url: "/images/mobil/gambar-mobil"
  });
</script>
