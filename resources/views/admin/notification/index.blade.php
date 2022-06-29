@extends('admin.app')

@section('style')

@endsection
@section('content')
@include('admin.partials.flash')
  
@endsection
<script>
    setnotificationcountzero();
    function setnotificationcountzero(){
        $.get('{{ route('notificationcountsetzero') }}',  function(data)
    {
      console.log(data);
      if(data == '00'){
      }
      else{
        document.getElementById('shownotification').innerHTML = data;
      }
    });
    }
</script>
@section('script')  @endsection
