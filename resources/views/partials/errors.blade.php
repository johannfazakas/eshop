@if(count($errors->all()))
<div>
    @foreach($errors->all() as $error)
    <p style="color:red">{{ $error }}</p>
    @endforeach
</div>
@endif
