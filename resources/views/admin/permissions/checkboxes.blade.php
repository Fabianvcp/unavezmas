@foreach( $permissions as $id => $name)
    <div class="checkbox">
        <label for="">
            <input name="permissions[]" type="checkbox" value=" {{ $name }}"
                {{ collect(old('permissions'))->contains($name) ? 'checked' : '' }}
                {{ $model->permissions->contains($id) ? 'checked' : '' }}>
            {{ $name }}
        </label>
    </div>
@endforeach
