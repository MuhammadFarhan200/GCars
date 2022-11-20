<script src="{{ asset('backend/js/bootstrap.js') }}"></script>
<script src="{{ asset('backend/js/app.js') }}"></script>
<script src="{{ asset('backend/extensions/jquery/jquery.min.js') }}"></script>
<!-- Need: Apexcharts -->
{{-- <script src="{{ asset('backend/extensions/apexcharts/apexcharts.min.js') }}"></script> --}}
{{-- <script src="{{ asset('backend/js/pages/dashboard.js') }}"></script> --}}
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

<script src="https://unpkg.com/dropzone@5/dist/min/dropzone.min.js"></script>
<script>
  Dropzone.options.myDropzone = {
    paramName: "gambar",
    acceptedFiles: ".jpeg,.jpg,.png,.webp",
    // addRemoveLinks: true,
  };
</script>

<script src="https://cdn.tiny.cloud/1/id3pcel5lcze1le8mq71lrpww5amh6mk8cim5up2ktyy4j94/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
<script>
  tinymce.init({
    selector: 'textarea#myeditorinstance', // Replace this CSS selector to match the placeholder element for TinyMCE
    plugins: 'powerpaste advcode table lists checklist',
    toolbar: 'undo redo | blocks| bold italic | bullist numlist checklist | table',
    height: 300
  });
</script>
