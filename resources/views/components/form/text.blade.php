 <div class="row">
        <div class="col-md-12">
            <div class="form-group {{ $errors->has($name) ? 'has-error' : '' }}">
                <span class="text-danger left">{{ $errors->first($name) }}</span>
                {{ Form::text($name,$value, array_merge(['class' => 'form-control','placeholder'=>$placeholder,'required'=>'required'], $attributes)) }}
            </div>
        </div>
 </div>
