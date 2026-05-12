 <script src="{{ asset('admin/plugins/jquery/jquery.min.js') }}"></script>
 <script src="{{ asset('admin/js/custom.js') }}"></script>

 <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
 <script>
     $.ajaxSetup({
         headers: {
             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
         }
     });
 </script>
