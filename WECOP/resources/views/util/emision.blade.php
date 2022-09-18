@if($message = Session::get('emision'))
<div class="alert alert-success alert-block">
    <button type="button" class="close" data-dismiss="alert">×</button>
    <h5>{{ $message }}</h5>
</div>
@endif
