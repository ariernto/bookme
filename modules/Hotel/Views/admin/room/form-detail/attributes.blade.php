@if(is_default_lang())
    <div class="row">
        @foreach ($attributes as $attribute)
            <div class="col-md-12">
                <div class="form-group">
                    <label class="control-label"><strong>{{__('Attribute: :name',['name'=>$attribute->name])}}</strong></label>
                    <div class="terms-scrollable">
                        @foreach($attribute->terms as $term)
                            <label class="term-item">
                                <input @if(!empty($selected_terms) and $selected_terms->contains($term->id)) checked @endif type="checkbox" name="terms[]" value="{{$term->id}}">
                                <span class="term-name">{{$term->name}}</span>
                            </label>
                        @endforeach
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    <hr>
@endif