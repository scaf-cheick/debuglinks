@if(Session::has('status') )
	<script> M.toast({html: '{{ Session::get('status') }}'}) </script>
@endif