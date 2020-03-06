<div class="tab-pane" id="home">
    <div class="col-sm-12">
        <h4>Homepage Category Section</h4>
    </div>

    <div class="form-group">
        <label for="home_products_section1" class="col-sm-2 control-label">Select Options</label>
        <div class="col-sm-10">
            <div class="product-categories-dropdown">
                {!! Form::select('category_section[]', $categories_section, $selected_categories, ['class' => 'form-control full-width select2', 'multiple' => 'multiple']) !!}
            </div>
        </div>
    </div>

    <div class="col-sm-12">
        <h4>Advertisement</h4>
    </div>

    <div class="form-group">

        <div class="col-md-6">
            <label for="first_left_ad_link" class="col-sm-2 control-label">Left Ad</label>
            <div class="product-categories-dropdown">
                <input type="text" name="first_left_ad_link" class="form-control" placeholder="http://www.test-ad.com" id="first_left_ad_link"
                       value="{{ getConfiguration('first_left_ad_link') }}" >
                @if ($errors->has('first_left_ad_link'))
                    <span class="help-block">
                    {{ $errors->first('first_left_ad_link') }}
                </span>
                @endif
                <input type="file" name="first_left_ad" id="first_left_ad" class="form-control">
                @if ($errors->has('first_left_ad'))
                    <span class="help-block">
                    {{ $errors->first('first_left_ad') }}
                </span>
                @endif

                @if(getConfiguration('first_left_ad'))
                    <div class="mt-15 half-width">
                        <img src="{{ url('storage') . '/' . getConfiguration('first_left_ad') }}"
                             class="thumbnail img-responsive">
                    </div>
                @endif
            </div>
        </div>
        <div class="col-md-6">
            <label for="first_right_ad_link" class="col-sm-2 control-label">Right Ad</label>
            <div class="product-categories-dropdown">
                <input type="text"  name="first_right_ad_link" class="col-md-10 form-control" placeholder="http://www.test-ad.com" id="first_right_ad_link"
                       value="{{ getConfiguration('first_right_ad_link') }}" >
                @if ($errors->has('first_right_ad_link'))
                    <span class="help-block">
                    {{ $errors->first('first_right_ad_link') }}
                </span>
                @endif
                <input type="file" name="first_right_ad" id="first_right_ad" class="form-control">
                @if ($errors->has('first_right_ad'))
                    <span class="help-block">
                    {{ $errors->first('first_right_ad') }}
                </span>
                @endif

                @if(getConfiguration('first_right_ad'))
                    <div class="mt-15 half-width">
                        <img src="{{ url('storage') . '/' . getConfiguration('first_right_ad') }}"
                             class="thumbnail img-responsive">
                    </div>
                @endif
            </div>
        </div>
    </div>

    <div class="col-sm-12">
        <h4>Organic Products </h4>
    </div>

    <div class="form-group">
        <label for="home_products_section1" class="col-sm-2 control-label">Select Options</label>
        <div class="col-sm-10">
            <div class="product-categories-dropdown">
                {!! Form::select('products_section_1[]', $categories, $selectedCategories_1, ['class' => 'form-control full-width select2', 'multiple' => 'multiple']) !!}
            </div>
        </div>
    </div>

    <div class="col-sm-12">
        <h4>Advertisement</h4>
    </div>

    <div class="form-group">

        <div class="col-md-6">
            <label for="second_left_ad_link" class="col-sm-2 control-label">Left Ad</label>
            <div class="product-categories-dropdown">
                <input type="text" name="second_left_ad_link" class="form-control" placeholder="http://www.test-ad.com" id="second_left_ad_link"
                       value="{{ getConfiguration('second_left_ad_link') }}" >
                @if ($errors->has('second_left_ad_link'))
                    <span class="help-block">
                    {{ $errors->first('second_left_ad_link') }}
                </span>
                @endif
                <input type="file" name="second_left_ad" id="second_left_ad" class="form-control">
                @if ($errors->has('second_left_ad'))
                    <span class="help-block">
                    {{ $errors->first('second_left_ad') }}
                </span>
                @endif

                @if(getConfiguration('second_left_ad'))
                    <div class="mt-15 half-width">
                        <img src="{{ url('storage') . '/' . getConfiguration('second_left_ad') }}"
                             class="thumbnail img-responsive">
                    </div>
                @endif
            </div>
        </div>
        <div class="col-md-6">
            <label for="second_right_ad_link" class="col-sm-2 control-label">Right Ad</label>
            <div class="product-categories-dropdown">
                <input type="text"  name="second_right_ad_link" class="col-md-10 form-control" placeholder="http://www.test-ad.com" id="second_right_ad_link"
                       value="{{ getConfiguration('second_right_ad_link') }}" >
                @if ($errors->has('second_right_ad_link'))
                    <span class="help-block">
                    {{ $errors->first('second_right_ad_link') }}
                </span>
                @endif
                <input type="file" name="second_right_ad" id="second_right_ad" class="form-control">
                @if ($errors->has('second_right_ad'))
                    <span class="help-block">
                    {{ $errors->first('second_right_ad') }}
                </span>
                @endif

                @if(getConfiguration('second_right_ad'))
                    <div class="mt-15 half-width">
                        <img src="{{ url('storage') . '/' . getConfiguration('second_right_ad') }}"
                             class="thumbnail img-responsive">
                    </div>
                @endif
            </div>
        </div>
    </div>

    <div class="col-sm-12">
        <h4>Categories to show in Homepage </h4>
    </div>

    <div class="form-group">
        <label for="home_products-section1" class="col-sm-2 control-label">Select Options</label>
        <div class="col-sm-10">
            <div class="product-categories-dropdown">
                {!! Form::select('products_section_2[]', $categories, $selectedCategories_2, ['class' => 'form-control full-width select2', 'multiple' => 'multiple']) !!}
            </div>
        </div>
    </div>



    {{--<div class="col-sm-12">
        <h4>Products Section 3 </h4>
    </div>

    <div class="form-group">
        <label for="home_products-section4" class="col-sm-2 control-label">Select Options</label>
        <div class="col-sm-10">
            <div class="product-categories-dropdown">
                {!! Form::select('products_section_4[]', $categories, $selectedCategories_4, ['class' => 'form-control full-width select2', 'multiple' => 'multiple']) !!}
            </div>
        </div>
    </div>--}}
</div>
<!-- /.tab-pane -->