@extends('admin.app')

@section('style')

@endsection
@section('content')
@include('admin.partials.flash')

  
@endsection


@include('admin.partials.script')
<script>
    setnotificationcountzero();
    function setnotificationcountzero(){
       
        $.get('{{ route('notificationcountsetzero') }}',  function(data)
    {
        
      
    });
    
    }
</script>
@section('script')  @endsection
