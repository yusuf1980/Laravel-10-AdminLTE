@push('css')
<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/css/bootstrap-datepicker.css" rel="stylesheet">
@endpush


<div class="form-group">
    <label class="form-label">{{$title}}</label>
    <input type="{{$type}}" id="{{$id}}" name="{{$name}}"
        class="form-control @error($name) is-invalid @enderror" value="{{ old($name, $item) }}"
        autocomplete="{{$name}}" >
    @error($name)
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>

@push('js')
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/js/bootstrap-datepicker.js"></script>
<script type="text/javascript">
    $('#date').datepicker({
       format: 'dd-mm-yyyy'
     });
</script>
@endpush
