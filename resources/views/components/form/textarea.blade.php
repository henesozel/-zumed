
<div class="row">
    <div class="col-md-12">
        <div class="form-group {{ $errors->has($name) ? 'has-error' : '' }}">
            <span class="text-danger left">{{ $errors->first($name) }}</span>
            {{ Form::textarea($name, $value, array_merge(['class' => 'form-control col-md-7 col-xs-12','placeholder'=>$placeholder,'required'=>'required'], $attributes, ['size' => '30x3'])) }}
        </div>
    </div>
</div>
