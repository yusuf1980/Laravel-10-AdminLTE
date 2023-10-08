<div class="form-group">
    <label class="form-label">{{$title}}</label>
    <input type="{{$type}}" name="{{$name}}"
        class="form-control @error($name) is-invalid @enderror">
    @error($name)
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>
