
@include('admin.header')

@include('admin.nav')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">

        @yield('content')
        
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

  <footer class="main-footer">
    <strong>Copyright &copy; 2021 Bioskin.</strong>
    All rights reserved.
  </footer>

</div>
<!-- ./wrapper -->

@include('admin.scripts')
@include('admin.datatables-scripts')
<script src="{{asset('js/verify_customer.js')}}"></script>

<script>
document.addEventListener('DOMContentLoaded', function() {

      var multipleCancelButton = new Choices('.choices-multiple', {
        removeItemButton: true,
      });

      $(document).on('change','[name="category_id"]', function(){ 
          if ($(this).find("option:selected").text() == 'Packaging') {
            $('.packaging').hide();
          }
          else {
            $('.packaging').show();
          }
      });

});
</script>

</body>
</html>
